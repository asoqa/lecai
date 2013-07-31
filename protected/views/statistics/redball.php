<?php
/* @var $this StatisticsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Statistics',
);

$this->menu=array(
	array('label'=>'Create Statistics', 'url'=>array('create')),
	array('label'=>'Manage Statistics', 'url'=>array('admin')),
);
?>

<h1>单球统计</h1>

<?php echo CHtml::beginForm('#', 'post', array("id"=>"select_redballs_form")); ?>
<div><?php echo CHtml::label('请选择红球', 'rlabel');?></div>
<div>
<?php 
$defaultSelected=Yii::app()->user->getState('selectRedBalls');
if(!isset($defaultSelected))
    $defaultSelected='01';

echo CHtml::checkBoxList('redball',
        $defaultSelected,
        array(
                '01'=>'01', '02'=>'02', '03'=>'03', '04'=>'04', '05'=>'05', '06'=>'06', '07'=>'07', '08'=>'08', '09'=>'09', '10'=>'10',
                '11'=>'11', '12'=>'12', '13'=>'13', '14'=>'14', '15'=>'15', '16'=>'16', '17'=>'17', '18'=>'18', '19'=>'19', '20'=>'20',
                '21'=>'21', '22'=>'22', '23'=>'23', '24'=>'24', '25'=>'25', '26'=>'26', '27'=>'27', '28'=>'28', '29'=>'29', '30'=>'30',
                '31'=>'31', '32'=>'32', '33'=>'33'
        ),
        array(
                'separator'=>'',
                'labelOptions'=>array('style'=> 'padding-left:1px;'),
        )
);
?>
</div>
<div><?php echo CHtml::label('请选择报表类型', 'slabel');?></div>
<div>
<?php 
$defaultType=Yii::app()->user->getState('selectTypes');
if(!isset($defaultType))
    $defaultType=0;
echo CHtml::checkBoxList('type',
        $defaultType,
        array(
                '轮数', '天数'
        ),
        array(
                'separator'=>'',
                'labelOptions'=>array('style'=> 'padding-left:1px;'),
        )
);
?>
</div>
<div><?php echo CHtml::label('请选择间隔轮次', 'ilabel');?></div>
<div>
<?php 
$defaultIntervalRounds=Yii::app()->user->getState('r_intervalRounds');
if(!isset($defaultIntervalRounds))
    $defaultIntervalRounds=33;
echo CHtml::textfield('interval',$defaultIntervalRounds);
?>
</div>
<div class="action">
<?php 
echo CHtml::submitButton('Report');
?>
</div>
<?php echo CHtml::endForm(); ?>

<?php 
//http://www.humblesoftware.com/envision/demos/finance
//http://www.fusioncharts.com/demos/gallery/#scroll-charts
$theoryData=$dataProvider->getData();
$seriesOptions=makeSeries($theoryData, $balls, 'redball', $defaultType);

$this->Widget('ext.highstock.HighstockWidget', array(
        'options'=>array(
                'theme'=>'grid',
                'chart'=>array(),
                'rangeSelector'=>array('selected'=>1),
                'title'=>array('text'=>'红球'.implode(' ',$balls).'出现频率'),
                'xAxis'=>array(
                        'labels'=>array(
                                'formatter'=>'js:function(){return  Highcharts.dateFormat("%Y-%m-%d", this.value);}'
                        ),
                ),
                'yAxis'=>array(
                        array('title'=>array('text'=>'间隔')),
                ),
                'series'=>$seriesOptions,
                'tooltip'=>array(
                        'shared'=>false,
                        'formatter'=>'js:function(){
                            var s = "开奖日期: "+Highcharts.dateFormat("%Y-%m-%d", this.x);
                            s += "<br/>"+this.series.name+": "+this.y;
                            for(key in this.series.options.data)
                            {
                                if(this.series.options.data[key][0] == this.x)
                                {
                                    s += "<br/>中奖号码: " + this.series.options.data[key][2];
                                }
                            }     
                            s += "<br/>红球: "+this.series.options.tooltipText;             
                            return s;
                        }'
                ),
                'plotOptions'=>array(
                        'series'=>array(
                                'dataGrouping'=>array(
                                        'enabled'=>false
                                ),
                        )
                )
        )));
unset($seriesOptions);
?>

<?php 
$eachBallSeries=array();
foreach($theoryData as $v)
{
    $redball=explode(':', $v->redball);
    foreach($redball as $r)
    {
        $index=(int)$r-1;
        $eachBallSeries[$index][]=array(strtotime($v->date)*1000, (int)$r);
    }
}

$seriesOptions=array();
foreach($eachBallSeries as $series)
{
    $seriesOptions[]=array(
        'lineWidth'=>0, 
        'marker'=>array('enabled'=>true, 'radius'=>2, 'fillColor'=>'blue', 'symbol'=>'circle'), 
        'name'=>'红球号码', 
        'data'=>$series
    );
}


$this->Widget('ext.highstock.HighstockWidget', array(
        'options'=>array(
                'theme'=>'grid',
                'rangeSelector'=>array('selected'=>1),
                'title'=>array('text'=>'红球散点图'),
                'xAxis'=>array(
                        'labels'=>array(
                                'formatter'=>'js:function(){return  Highcharts.dateFormat("%Y-%m-%d", this.value);}'
                        ),
                ),
                'yAxis'=>array(
                        array('title'=>array('text'=>'球号')),
                ),
                'series'=>$seriesOptions,
                'tooltip'=>array(
                        'shared'=>false,
                        'formatter'=>'js:function(){
                                            var s = "开奖日期: "+Highcharts.dateFormat("%Y-%m-%d", this.x);
                                            s += "<br/>"+this.series.name+": "+this.y;
                                            return s;
                                        }'
                ),
                'plotOptions'=>array(
                        'series'=>array(
                                'dataGrouping'=>array(
                                        'enabled'=>false
                                ),
                        )
                )
        )));
unset($eachBallSeries);
unset($seriesOptions);
?>

<?php 
$redballCount=array();
$seriesOptions=array();
$redBallSeries=array();
foreach($theoryData as $k=>$v)
{
    $redballArray=explode(':', $v->redball);
    if(($k+1) % $defaultIntervalRounds > 0)
    {
        foreach($redballArray as $redball)
        {
            if(in_array($redball, $balls))
            {
                $redballCount[$redball]=isset($redballCount[$redball]) ? $redballCount[$redball]+1 : 0;
            }
        }
    } else {
        foreach($balls as $ball)
        {
            if(isset($redballCount[$ball]))
                $redBallSeries[$ball][]=$redballCount[$ball];
            else
                $redBallSeries[$ball][]=0;
        }
        unset($redballCount);
    }
}

foreach($balls as $ball)
{
    $seriesOptions[]=array('name'=>'红球'.$ball, 'data'=>$redBallSeries[$ball]);
}

$xAxis=array();
if(!empty($balls))
    $xAxis=array_keys($redBallSeries[$balls[0]]);

$this->Widget('ext.highcharts.HighchartsWidget', array(
        'options'=>array(
                'chart'=>array('type'=>'column'),
                'title'=>array('text'=>'每'.$defaultIntervalRounds.'轮红球'.implode(' ',$balls).'出现次数'),
                'xAxis'=>array(
                        'categories'=>$xAxis,
                ),
                'yAxis'=>array(
                        array('title'=>array('text'=>'次数')),
                ),
                'series'=>$seriesOptions,
                'plotOptions'=>array(
                        'series'=>array(
                                'dataGrouping'=>array(
                                        'enabled'=>false
                                ),
                        )
                )
        )));

unset($seriesOptions);
unset($redBallSeries);
unset($xAxis);
?>

<?php 
$redballPieSeries=array();
foreach($ballsDataProvider->data as $r)
{
    $radio=$r->count/count($theoryData);
    $redballPieSeries[]=array($r->ball, $radio);
}

$this->Widget('ext.highcharts.HighchartsWidget', array(
        'options'=>array(
                'chart'=>array(
                    'plotBackgroundColor'=>null,
                    'plotBorderWidth'=>null,
                    'plotShadow'=>false,
                ),
                'plotOptions'=>array(
                    'pie'=>array(
                        'allowPointSelect'=>true,
                        'cursor'=>'pointer',
                        'dataLabels'=>array(
                            'enabled'=>true,
                            'color'=>'#000000',
                            'connectorColor'=>'#000000',
                            'formatter'=>'js:function(){
                                return "<b>"+this.point.name+"</b>:"+this.percentage+" %";
                            }
                            '
                        ),
                    ),
                ),
                'title' => array('text' => '红球次数分布'),
                'series' => array(
                    array('type'=>'pie', 'name'=>'红球分布', 'data'=>$redballPieSeries)
                ),
        )
));
unset($redballPieSeries);
?>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'tables-summary',
        'dataProvider'=>$ballsDataProvider,
        'columns'=>array(
                array(
                        'header'=>Yii::t('default', 'Ball'),
                        'name'=>'ball',
                ),
                array(
                        'header'=>Yii::t('default', 'MeanRounds'),
                        'name'=>'mean_rounds',
                ),
                array(
                        'header'=>Yii::t('default', 'MaxRounds'),
                        'name'=>'max_rounds',
                ),
                array(
                        'header'=>Yii::t('default', 'CurrentRounds'),
                        'name'=>'current_rounds',
                ),
                /*
                array(
                        'header'=>Yii::t('default', 'MeanDays'),
                        'name'=>'mean_days',
                ),
                array(
                        'header'=>Yii::t('default', 'MaxDays'),
                        'name'=>'max_days',
                ),
                array(
                        'header'=>Yii::t('default', 'CurrentDays'),
                        'name'=>'current_days',
                ),
                array(
                        'header'=>Yii::t('default', 'Count'),
                        'name'=>'count',
                ),
                */
        )
));
?>

<script type="text/javascript">
function getSelectedCheckboxes()
{
	var selected='';
	$("#redball :checkbox").each(function(){
	    if($(this).attr('checked'))
	    	selected+=$(this).val()+" ";
	});		
	return selected;
}	
</script>

<?php 
function makeSeries($data, $balls, $ballType, $defaultType)
{
    $seriesOptions=array();
    foreach($balls as $ball)
    {
        $prevDate=$data[0]->date;
        $round=0;
        $ballSeriesByDays=array();
        $ballSeriesByRounds=array();
    
        foreach($data as $v)
        {
            if(strstr($v->$ballType, $ball))
            {
                $intervalDays=(strtotime($v->date) - strtotime($prevDate))/86400;
                $prevDate=$v->date;
    
                $intervalRounds=$round;
                $round=0;
                //         print $v->date . "=>" . $intervalRounds . " ";
                //         print $v->date . "=>" . $intervalDays . " ";
                foreach($defaultType as $type)
                {
                    switch($type)
                    {
                        case 0:
                            $ballSeriesByRounds[]=array(strtotime($v->date)*1000, $intervalRounds, $v->history->result);
                            break;
                        case 1:
                            $ballSeriesByDays[]=array(strtotime($v->date)*1000, $intervalDays, $v->history->result);
                            break;
                    }
                }
            }
    
            ++$round;
        }
    
        foreach($defaultType as $type)
        {
            switch($type)
            {
                case 0:
                    $seriesOptions[]=array('name'=>'轮数间隔', 'data'=>$ballSeriesByRounds, 'tooltipText'=>$ball);
                    break;
                case 1:
                    $seriesOptions[]=array('name'=>'天数间隔', 'data'=>$ballSeriesByDays, 'tooltipText'=>$ball);
                    break;
            }
        }
    }
    return $seriesOptions;
}

?>

