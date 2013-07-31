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
$sum_allSeries=array();
foreach($theoryData as $v)
{
    $xAxis[]=strtotime($v->date)*1000;
    $sum_rSeries[]=array(strtotime($v->date)*1000, (int)$v->sum_r, $v->history->result);
    $sum_allSeries[]=array(strtotime($v->date)*1000, (int)$v->sum_all, $v->history->result);
}

$this->Widget('ext.highstock.HighstockWidget', array(
        'options'=>array(
                'theme'=>'grid',
                'chart'=>array(),
                'rangeSelector'=>array('selected'=>1),
                'title'=>array('text'=>'求和'),
                'xAxis'=>array(
                        'labels'=>array(
                                'formatter'=>'js:function(){return  Highcharts.dateFormat("%Y-%m-%d", this.value);}'
                                ),
                        ),
                'yAxis'=>array(
                        array('title'=>array('text'=>'红/蓝球和')),
                        'plotLines'=>array(
                            array(
                                'value'=>102, 
                                'color'=>'red',
                                'dashStyle'=>'shortdash', 
                                'width'=>2,
                                'label'=>array('text'=>'红球和平均值:102'),
                                ),
                            array(
                                'value'=>110.5,
                                'color'=>'blue',
                                'dashStyle'=>'shortdash',
                                'width'=>2,
                                'label'=>array('text'=>'所有和平均值:110.5'),
                                ),                                
                            ),
                        ),
                'series'=>array(
                        array('name'=>'红球和', 'data'=>$sum_rSeries, 'color'=>'red'),
                        array('name'=>'所有球和', 'data'=>$sum_allSeries, 'color'=>'blue'),
                        ),
                'tooltip'=>array(
                        'formatter'=>'js:function(){
                            var s = "开奖日期: "+Highcharts.dateFormat("%Y-%m-%d", this.x);
                            $.each(this.points, function(i, point) {
                                s += "<br/>"+point.series.name+": "+ point.y;
                            });          
                        
                            for(key in this.points[0].series.options.data)
                            {
                                if(this.points[0].series.options.data[key][0] == this.x)
                                {
                                    s += "<br/>中奖号码: " + this.points[0].series.options.data[key][2];
                                }
                            }
                        
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
?>



<?php
$this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'tables-summary',
        'dataProvider'=>$dataProvider,
        'columns'=>array(
                array(
                        'header'=>Yii::t('default', 'Issue'),
                        'name'=>'issue',
                ),
                array(
                        'header'=>Yii::t('default', 'RedBall'),
                        'name'=>'redball',
                ),
                array(
                        'header'=>Yii::t('default', 'BlueBall'),
                        'name'=>'blueball',
                        'type'=>'raw',
                        'value'=>array($this, 'markInRedBallColumn'),
                ),
                array(
                        'header'=>Yii::t('default', 'SumOfRed'),
                        'name'=>'sum_r',
                ),
                array(
                        'header'=>Yii::t('default', 'SumOfAll'),
                        'name'=>'sum_all',
                ),
        )
));
?>