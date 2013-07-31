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

<h1>Statistics</h1>

<?php 
/*
$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); 
*/
?>

<?php 
//http://www.humblesoftware.com/envision/demos/finance
//http://www.fusioncharts.com/demos/gallery/#scroll-charts
$theoryData=$dataProvider->getData();
$xAxis=array();
$sum_rSeries=array();
$issueSeries=array();
$ballSeries=array();
foreach($theoryData as $v)
{
    $xAxis[]=strtotime($v->date)*1000+1;
    $sum_rSeries[]=array(strtotime($v->date)*1000+1, (int)$v->sum_all);
}

$this->Widget('ext.highstock.HighstockWidget', array(
        'options'=>array(
                'theme'=>'grid',
                'rangeSelector'=>array('selected'=>2),
                'title'=>array('text'=>'ball'),
                'xAxis'=>array(
                        'labels'=>array(
                                'formatter'=>'js:function(){return  Highcharts.dateFormat("%Y-%m-%d", this.value);}'
                        ),
                ),
                'yAxis'=>array(
                        array('title'=>array('text'=>'ball'), 'height'=>200),
                        array('title'=>array('text'=>'sum'), 'offset'=>0, 'height'=>100),
                        ),
                'series'=>array(
                        array('type'=>'column', 'name'=>'sum', 'data'=>$sum_rSeries, 'dataGrouping'=>array('units'=>array(array('week', 1)))),
                        ),
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
                                        'enabled'=>true
                                        ),
                                )
                        )
        )));
/*
Yii::app()->clientscript->registerScript('highstock',"
var usdeur = [
[Date.UTC(2003,8,24),0.8709],
[Date.UTC(2003,8,25),0.872],
[Date.UTC(2003,8,26),0.8714],
[Date.UTC(2011,4,10),0.6945]
];
",CClientScript::POS_HEAD);
*/
// $this->Widget('ext.highcharts.HighchartsWidget', array(
//         'options'=>array(
//                 'title' => array('text' => 'Sum'),
//                 'xAxis' => array(
//                         'categories' => $xAxis
//                 ),
//                 'yAxis' => array(
//                         'title' => array('text' => 'sum_r')
//                 ),
//                 'series' => array(
//                         array('name'=>'sum_r', 'data'=>$sum_rSeries),
// //                         array('name' => 'Jane', 'data' => array(1, 0, 4)),
// //                         array('name' => 'John', 'data' => array(5, 7, 3))
//                 )
//         )
// ));
?>

<?php 

?>