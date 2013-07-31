<?php

class StatisticsController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

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
				'actions'=>array('create','update', 'admin', 'sumreport', 'redballreport', 'blueballreport', 'guess', 'sumanalysis'),
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
		$model=new Statistics;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Statistics']))
		{
			$model->attributes=$_POST['Statistics'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->issue));
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

		if(isset($_POST['Statistics']))
		{
			$model->attributes=$_POST['Statistics'];
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
		$dataProvider=new CActiveDataProvider('Statistics',array(
		        'pagination'=>false,
		        ));
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Statistics('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Statistics']))
			$model->attributes=$_GET['Statistics'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function actionSumReport()
	{
	    $dataProvider=new CActiveDataProvider('Statistics',array(
	            'pagination'=>false,
	    ));
	    $this->render('sum',array(
	            'dataProvider'=>$dataProvider,
	    ));
	}
	
	public function actionRedBallReport()
	{
	    $selectRedBalls=array();
	    $selectTypes=array();
	    if(isset($_POST['redball']))
	    {
	        $selectRedBalls=$_POST['redball'];
	        Yii::app()->user->setState('selectRedBalls', $selectRedBalls);
//             Yii::log(__METHOD__ . ' ' . $_POST['redballs'], "error", get_class($this));
	    } 
	    
	    if(isset($_POST['blueballs']))
	    {
	        $selectBlueBalls=$_POST['blueballs'];
	        Yii::app()->user->setState('selectBlueBalls', $selectBlueBalls);
	        //             Yii::log(__METHOD__ . ' ' . $_POST['redballs'], "error", get_class($this));
	    }
	    	    
	    if(isset($_POST['type']))
	    {
	        $selectTypes=$_POST['type'];
	        Yii::app()->user->setState('selectTypes', $selectTypes);
	    }
	        
	    if(isset($_POST['interval']))
	    {
	        $intervalRounds=$_POST['interval'];
	        Yii::app()->user->setState('r_intervalRounds', $intervalRounds);
	    }
	    	    
	    $dataProvider=new CActiveDataProvider('Statistics',array(
	            'pagination'=>false,
	    ));
	    
	    $ballsDataProvider=new CActiveDataProvider('Balls',array(
	            'criteria'=>array(
	                    'condition'=>'ball like "r%"',
	            ),
	            'pagination'=>false,
	    ));
	    	    
	    $this->render('redball',array(
	            'dataProvider'=>$dataProvider,
	            'balls'=>$selectRedBalls,
	            'ballsDataProvider'=>$ballsDataProvider,
	    ));
	}	
		
	public function actionBlueBallReport()
	{
	    $selectTypes=array();
	     
	    if(isset($_POST['blueballs']))
	    {
	        $selectBlueBalls=$_POST['blueballs'];
	        Yii::app()->user->setState('selectBlueBalls', $selectBlueBalls);
	        //             Yii::log(__METHOD__ . ' ' . $_POST['redballs'], "error", get_class($this));
	    }
	
	    if(isset($_POST['type']))
	    {
	        $selectTypes=$_POST['type'];
	        Yii::app()->user->setState('selectTypes', $selectTypes);
	    }

	    if(isset($_POST['interval']))
	    {
	        $intervalRounds=$_POST['interval'];
	        Yii::app()->user->setState('intervalRounds', $intervalRounds);
	    }
	    
	    $statisticsDataProvider=new CActiveDataProvider('Statistics',array(
	            'pagination'=>false,
	    ));
	    
	    $ballsDataProvider=new CActiveDataProvider('Balls',array(
	            'criteria'=>array(
	                    'condition'=>'ball like "b%"',
	            ),	            
	            'pagination'=>false,
	    ));	    
	    
	    $this->render('blueball',array(
	            'statisticsDataProvider'=>$statisticsDataProvider,
	            'ballsDataProvider'=>$ballsDataProvider,	            
	    ));
	}
	
	public function actionSumAnalysis()
	{
	    $lastIssues=0;
	    $lastId=0;
	    $lastIdStart=0;
	    
	    if(isset($_POST['last_issue_text']))
	    {
	        $lastIssues=intval($_POST['last_issue_text']);
	        Yii::app()->user->setState('lastIssues', $lastIssues);
	    }
	    
	    if(Yii::app()->request->isAjaxRequest)
	    {
    	    $lastIssues=Yii::app()->user->getState('lastIssues');
	    }
	    	    
	    $models=Statistics::model()->findAllBySql('select id from lecai.statistics order by id desc limit 1');
	    if(isset($models[0]->id))
	        $lastId=intval($models[0]->id);
	    if(empty($lastIssues))
	    {
	        $lastIdStart=1;
	        Yii::app()->user->setState('lastIssues', $lastId);
	    }
	    else    
    	    $lastIdStart=$lastId-$lastIssues+1;

	    Yii::log(__METHOD__ . ' ' . $lastId . ' ' . $lastIssues, "error", get_class($this));
	    	  
	    
	    $statSql='select * from lecai.statistics where id>='.$lastIdStart.' order by id desc';
	    $models=Statistics::model()->findAllBySql($statSql);
	    $statisticsDataProvider=new CArrayDataProvider($models);
	    
	    //实际和值分布
	    $sumSql='select count(*) as count_sum, sum_r from lecai.statistics where id>='.$lastIdStart.' group by sum_r order by count_sum desc';
	    $models=Statistics::model()->findAllBySql($sumSql);
//         $totalSumCounts=Statistics::model()->count();	 
	    $totalSumCounts=empty($lastIssues) ? Statistics::model()->count() : $lastIssues;
	    foreach($models as $model)
	    {
	        $model->percentage=(float)($model->count_sum/$totalSumCounts)*100;
	    }
	    
	    $sort=new CSort();
	    $sort->attributes = array(
	            'defaultOrder'=>'count_sum desc',
	            'sum_r'=>array(
	                    'asc'=>'sum_r',
	                    'desc'=>'sum_r desc',
	            ),
	            'count_sum'=>array(
	                    'asc'=>'count_sum',
	                    'desc'=>'count_sum desc',
	            ),
	    );	    
	    $groupSumDataProvider=new CArrayDataProvider($models, array(
	            'pagination'=>false,
                'sort'=>$sort,
	            ));
	     
	    //理论和值分布
	    $theorySumSql='select t.key as sum_r, value as count_sum from lecai.theory_resource t where type="SUM_R_COUNT" order by (count_sum+0) desc';
	    $models=TheoryResource::model()->findAllBySql($theorySumSql);
	    $result=TheoryResource::model()->findAllBySql('select value from lecai.theory_resource t where type="COMBINATION_COUNT" and t.key="redball"');
	    $totalSumCounts=$result[0]->value;
	    foreach($models as $model)
	    {
	        $model->percentage=(float)($model->count_sum/$totalSumCounts)*100;
	    }
	    $theoryGroupSumDataProvider=new CArrayDataProvider($models, array(
	            'pagination'=>false,
	            'sort'=>$sort,
	            ));
	    
	    $this->render('sum_analysis',array(
	            'statisticsDataProvider'=>$statisticsDataProvider,
	            'groupSumDataProvider'=>$groupSumDataProvider,
	            'theoryGroupSumDataProvider'=>$theoryGroupSumDataProvider,
	    ));	
	}
	
	public function actionGuess()
	{
	    $this->layout='column1';
	    $balls=array();
	    $sum=0;
	    
	    if(Yii::app()->request->isAjaxRequest && !empty($_POST))
	    {
	        $balls=CJSON::decode($_POST['model']);
	        foreach($balls as $ball)
	        {
	            if($ball[0]=='r')
	            {
	                $tmp=substr($ball, 1);
	                $sum = $sum + intval($tmp);
	            }
	        }
	        Yii::app()->user->setState('balls', $_POST['model']);
	        Yii::app()->user->setState('sum', $sum);
	        
	        exit(1);
	    }
	    /*
	    Rules::$excludeRedballsRule=array(1,2,3,4,5,6,7);
	    Rules::$sumRedBallsRule=array('min'=>105, 'max'=>105);
	    Rules::run();
	    */
	    
	    $models=array();
	    //sum
	    $sum=intval(Yii::app()->user->getState('sum'));
	    if(isset($sum))
	    {
    	    $sumSql='select * from lecai.statistics where sum_r='.$sum;
    	    $models=Statistics::model()->findAllBySql($sumSql);
	    }
	    $sumDataProvider=new CArrayDataProvider($models, array(
	            'pagination'=>false,
	    ));

	    Yii::app()->user->setState('sum', 0);
	    
	    //count
	    $models=array();
	    $balls=Yii::app()->user->getState('balls');
	    if(isset($balls))
	    {
    	    $balls=CJSON::decode($balls);
    	    $models=Statistics::model()->findAllBySql('select issue, redball, blueball from lecai.statistics');
    	    foreach($models as $key=>$model)
    	    {
    	        $historyBalls=explode(':', $model->redball);
    	        array_walk($historyBalls, array(&$this, "convertRedball"));
    	        array_push($historyBalls, 'b'.$model->blueball);
    	        $tmp=array_intersect($balls, $historyBalls);
    	        if(count($tmp)<= 1)
    	        {
    	            unset($models[$key]);
    	        }
    	    }	    
    	    $models=array_values($models);
	    }
	    $sameBallDataProvider=new CArrayDataProvider($models, array(
	            'pagination'=>false,
	    ));
	    	     
	    $this->render('guess',array(
	            'balls'=>$balls,
	            'sumDataProvider'=>$sumDataProvider,
	            'sameBallDataProvider'=>$sameBallDataProvider,
	    ));
	}
	
	private function convertRedball(&$value)
	{
	    $value='r'.$value;
	}
	
	protected function markInRedBallColumn($data, $row)
	{
	    $cell=$data->blueball;
	    if(strstr($data->redball, $data->blueball))
	    {
	        $cell='<font color="red">' . $cell . '</font>';
	    }
	    return $cell;
	}
	
	protected function markSameBallsColumn($data, $row)
	{
	    $cell=$data->redball;
	     
	    $balls=Yii::app()->user->getState('balls');
	    if(isset($balls))
	    {
    	    $balls=CJSON::decode($balls);
	     
    	    foreach($balls as $k=>$ball)
    	    {
    	        $ball=substr($ball, 1);
    	        $cell=str_replace($ball, '<font color="red">'.$ball.'</font>', $cell);
    	    }
	    }
	    
	    return $cell;
	}	
		
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Statistics the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Statistics::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Statistics $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='statistics-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
