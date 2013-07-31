<?php
include("simple_html_dom.php");

class HistoryController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
    
	private $combination=array();
	
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update', 'admin', 'updatedate', 'delete', 'statistics', 'savecombination', 'collect'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new History;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['History']))
		{
			$model->attributes=$_POST['History'];
			if($model->save())
			{
			    $this->execStatistics(true);
				$this->redirect(array('view','id'=>$model->issue));
			}
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['History']))
		{
			$model->attributes=$_POST['History'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->issue));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('History');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}
	
	public function actionCollect()
	{
	    /*
	    $ch=curl_init();
	    $url = "http://17500.cn/ssq/details.php?issue=2013080";
	    curl_setopt($ch, CURLOPT_URL, $url);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	    $result = curl_exec($ch);
	    curl_close($ch);
	    print CHtml::decode($result);
	    */
	    $html=file_get_html("http://17500.cn/ssq/details.php?issue=2013080");
	    foreach($html->find("tr") as $tr)
	    {
	        print $tr;
	    }
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new History('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['History']))
			$model->attributes=$_GET['History'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return History the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=History::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param History $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='history-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	private function saveStatistic($post, $isNewRecord)
	{
	    $statModel=new Statistics;
	    
	    $attributes=array();
	    $attributes['issue']=$post['issue'];
	    $attributes['date']=$post['date'];
	    
	    $balls=explode(':', $post['result']);
	    
	    if(!empty($balls))
	    {
                //存储红球字符串
                $attributes['redball']=substr($post->result, 0, 17);
	    
	            //对红篮球求和、平均、最大、最小, 前提history表中的result字段红球已经顺序排列
	            $attributes['sum_all']=array_sum($balls);
	            $attributes['mean_all']=$attributes['sum_all']/count($balls);
	            $attributes['min_all']=$balls[0];
	            $attributes['max_all']=$balls[count($balls)-1];
	    
	            //弹出蓝球
	            $blueBall=array_pop($balls);
	    
                //存储蓝球字符串
	            $attributes['parity_b']=$blueBall % 2 ? '1' : '0';
                $attributes['blueball']=substr($post->result, 18, 2);
                $attributes['binary_b']=decbin($blueBall);
                $attributes['bit0_b']=substr_count($attributes['binary_b'], "0");
                $attributes['bit1_b']=substr_count($attributes['binary_b'], "1");                
	    
	            //对所有红球求和、平均、最大、最小
	            $attributes['sum_r']=array_sum($balls);
	            $attributes['mean_r']=$attributes['sum_r']/count($balls);
	            $attributes['min_r']=$balls[0];
	            $attributes['max_r']=$balls[count($balls)-1];
	            
	            //二进制处理
	            $p='';
                foreach($balls as $ball)
                {
                    if($ball % 2 === 0)
                        $p=$p . '0' ;
                    else
                        $p=$p . '1';
                }
                $attributes['parity_r']=$p;
	            array_walk($balls, array(&$this, "convertBinary"));
	            $attributes['binary_r']=implode(':', $balls);
	            $c1=0;
	            $c0=0;
	            foreach($balls as $ball)
	            {
	                $c1+=substr_count($ball, "1");
	                $c0+=substr_count($ball, "0");
	            }
	            $attributes['bit0_r']=$c0;
	            $attributes['bit1_r']=$c1;	            
	    }
	    
	    $statModel->attributes=$attributes;
	    $statModel->isNewRecord=$isNewRecord;
	    $statModel->save();	    
	}
	
	private function saveBalls(&$models, $isNewRecord)
	{
	    $balls=array(
    	'r01', 'r02', 'r03', 'r04', 'r05', 'r06', 'r07', 'r08', 'r09', 'r10', 
    	'r11', 'r12', 'r13', 'r14', 'r15', 'r16', 'r17', 'r18', 'r19', 'r20', 
    	'r21', 'r22', 'r23', 'r24', 'r25', 'r26', 'r27', 'r28', 'r29', 'r30',
    	'r31', 'r32', 'r33', 'b01', 'b02', 'b03', 'b04', 'b05', 'b06', 'b07', 
    	'b08', 'b09', 'b10', 'b11', 'b12', 'b13', 'b14', 'b15', 'b16');
	    
	    //号码, 平均出现轮次间隔，最大出现轮次间隔，当前轮次间隔，平均出现天数间隔，最大出现天数间隔，当前天数间隔，总出现次数
	    for($i=0;$i<49;++$i)
	    {
	        $ballType=$balls[$i][0];
	        $currentBall=substr($balls[$i], 1, 2);
	
	        $prevDate=$models[0]->date;
	        $round=0;
	        $ballSeriesByRounds=array();
	        $ballSeriesByDays=array();
	        $iCount=0;
	        foreach($models as $model)
	        {
	            $b='';
	            switch($ballType)
	            {
	                case 'r':
    	                $b=substr($model->result, 0, 17);
    	                break;
	                case 'b':
	                    $b=substr($model->result, 18, 2);
	                    break;	                    
	            }
	            
	            if(strstr($b, $currentBall))
	            {
	                //天数
	                $intervalDays=(strtotime($model->date) - strtotime($prevDate))/86400;
	                $ballSeriesByDays[]=$intervalDays;
	                $prevDate=$model->date;

	                //轮次
	                $ballSeriesByRounds[]=$round;
	                $round=0;

	                //次数
	                ++$iCount;
	            }
	            ++$round;
	        }
	
	        //轮次统计
	        $currentRounds=1;
	        if($round>0)
	            $currentRounds=$round;
	
	        if(empty($ballSeriesByRounds) || empty($ballSeriesByDays))
	        {
	            return;
	        }
	        
	        sort($ballSeriesByRounds);
	        $meanRounds=array_sum($ballSeriesByRounds) / count($ballSeriesByRounds);
	        $maxRounds=array_pop($ballSeriesByRounds);
	        $eachBall=array('ball'=>$balls[$i], 'mean_rounds'=>$meanRounds, 'max_rounds'=>$maxRounds, 'current_rounds'=>$currentRounds);
	         
	        //天数统计
	        $currentDays=1;
	        if(strcmp($prevDate, $models[count($models)-1]->date) !== 0)
	            $currentDays=(strtotime($models[count($models)-1]->date) - strtotime($prevDate))/86400;
	         
	        sort($ballSeriesByDays);
	        $meanDays=array_sum($ballSeriesByDays) / count($ballSeriesByDays);
	        $maxDays=array_pop($ballSeriesByDays);
	        $eachBall['mean_days']=$meanDays;
	        $eachBall['max_days']=$maxDays;
	        $eachBall['current_days']=$currentDays;
	
	        //统计出现次数
	        $eachBall['count']=$iCount;
	        
	        $ballModel=new Balls;
	        $ballModel->attributes=$eachBall;
	        $ballModel->isNewRecord=$isNewRecord;
	        $ballModel->save();
	    }
	}
	
	public function saveCombinations($model, $isNewRecord)
	{
	        $this->combination=array();
	        	        
	        $redball=substr($model->result, 0, 17);
	        $redballArray=explode(':', $redball);
	        
	        //6个球中的两两组合
	        $this->combination($redballArray, 2);
	        
	        //6个球中的三个组合
	        $this->combination($redballArray, 3);
	        
	        //6个求种的四个组合
	        $this->combination($redballArray, 4);

	        foreach($this->combination as $c)
	        {
	            $c=substr($c, 1);
	            $length=substr_count($c, ':')+1;
	            $eachCombination=array();
	            $eachCombination['issue']=$model->issue;
	            $eachCombination['combination']=$c;
	            $eachCombination['is_continous']=$this->isContinous($c);
	            $eachCombination['length']=$length;
	            
	            $combinationModel=new HistoryCombination;
	            $combinationModel->attributes=$eachCombination;
	            $combinationModel->isNewRecord=$isNewRecord;
	            $combinationModel->save();	            
	        }
	}
	
	private function isContinous($c)
	{
	    $ret=1;
	    
	    if(isset($c))
	    {
	        $balls=explode(':', $c);
	        while(count($balls)>1)
	        {
	            $tmp=array_shift($balls);
	            if(($balls[0]-$tmp)!==1)
	            {
	                $ret=0;
	                break;
	            }
	        }
	    }
	    
	    return $ret;
	}
	
	private function combination($arr, $len=0, $combination='')
	{
	    $arr_len = count($arr);
	    if($len == 0){
	        $this->combination[]=$combination;
	    }else{
	        for($i=0; $i<$arr_len-$len+1; $i++){
	            $tmp = array_shift($arr);
// 	            $combination[]=$tmp;
	            $this->combination($arr, $len-1, $combination.':'.$tmp);
	        }
	    }
	}	
		
	public function execStatistics($isNewRecord)
	{
        $models=History::model()->findAll();
        
        if($isNewRecord===true)
        {
            if(!empty($models))
            {
                $this->saveStatistic($models[count($models)-1], true);
                $this->saveCombinations($models[count($models)-1], true);
            }
        } 
        
        $this->saveBalls($models, false);
	}
	
	public function actionReStatistics()
	{
	    $this->reStatistics();
	    $this->reSaveBalls();
	}	
	
	private function reStatistics()
	{
	    Statistics::model()->deleteAll();
	     
	    $models=History::model()->findAll();
	    foreach ($models as $r)
	    {
	        $this->saveStatistic($r, true);
	    }	    
	}
	
	private function reSaveBalls()
	{
	    Balls::model()->deleteAll();
	    
	    $models=History::model()->findAll();
	    $this->saveBalls($models, false);
	}
	
	private function reSaveCombination()
	{
	    set_time_limit(0);
	       
	    HistoryCombination::model()->deleteAll();
	    
	    $models=History::model()->findAll();
	    foreach($models as $model)
	    {	    
	        $this->saveCombinations($model, true);
	    }
	}
	
	private function convertBinary(&$value)
	{
	    $value=decbin($value);
	}
}
