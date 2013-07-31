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


<?php echo CHtml::beginForm('#', 'post', array("id"=>"last_issue")); ?>
<div class="complex">
最近
<?php 
$lastIssues=Yii::app()->user->getState('lastIssues');
if(!isset($lastIssues))
    $lastIssues=100;
echo CHtml::textfield('last_issue_text',$lastIssues, array('size'=>6));
?>
轮&nbsp;&nbsp;
<?php 
echo CHtml::submitButton('筛选');
?>
</div>

<?php echo CHtml::endForm(); ?>
<br/>

<h1>和值明细表</h1>

<?php 
$this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'tables-summary',
        'dataProvider'=>$statisticsDataProvider,
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

<h1>红球和值实际/理论分布图表</h1>
<?php 
$theoryData=$theoryGroupSumDataProvider->data;
$actualData=$groupSumDataProvider->data;
$xAxis=array();
$theorySeries=array();
$theoryCountTips=array();
//绘制理论曲线
foreach($theoryData as $v)
{
    $xAxis[]=$v->sum_r;
}
asort($xAxis);
foreach($xAxis as $k=>$v)
{
    $theorySeries[$k]=$theoryData[$k]->percentage;
    $theoryCountTips[$k]=$theoryData[$k]->count_sum;
}
$xAxis=array_values($xAxis);
$theorySeries=array_values($theorySeries);
$theoryCountTips=array_values($theoryCountTips);

//绘制实际曲线
$actualSeries=array_fill(0, 183, null);
$actualCountTips=array_fill(0, 183, null);
foreach($actualData as $v)
{
    $key=array_search($v->sum_r, $xAxis);
    $actualSeries[$key]=$v->percentage;
    $actualCountTips[$key]=$v->count_sum;
}
$seriesOptions[]=array('name'=>'理论分布', 'data'=>$theorySeries, 'tooltipText'=>$theoryCountTips);
$seriesOptions[]=array('name'=>'实际分布', 'data'=>$actualSeries, 'tooltipText'=>$actualCountTips);


$this->Widget('ext.highcharts.HighchartsWidget', array(
        'options'=>array(
                'chart'=>array('type'=>'area'),
                'title'=>array('text'=>'红球和值实际/理论分布图'),
                'xAxis'=>array(
                        'categories'=>$xAxis,
                        'tickInterval'=>10,
                ),
                'yAxis'=>array(
                        array('title'=>array('text'=>'百分比')),
                ),
                'series'=>$seriesOptions,
                'tooltip'=>array(
                        'shared'=>false,
                        'formatter'=>'js:function(){
                            var s = "红球和值: "+this.x;
                            s += "<br/>"+this.series.name+": "+this.y+"%";
                            s += "<br/>出现次数: "+this.series.options.tooltipText[this.point.x];
                            return s;
                         }'
                ),
                'plotOptions'=>array(
                        'area'=>array(
                                'marker'=>array(
                                    'enabled'=>true,
                                    'symbol'=>'circle',
                                    'radius'=>2,
                                    'status'=>array('hover'=>array('enabled'=>true)),
                            )
                        )
                )
        )));

unset($theoryCountTips);
unset($actualCountTips);
unset($theorySeries);
unset($actualSeries);
unset($xAxis);
unset($seriesOptions);
?>
<?php 
$this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'red_sum_count',
        'dataProvider'=>$groupSumDataProvider,
        'columns'=>array(
                array(
                        'header'=>Yii::t('default', '红球和'),
                        'name'=>'sum_r',
                ),
                array(
                        'header'=>Yii::t('default', '出现次数'),
                        'name'=>'count_sum',
                ),
                array(
                        'header'=>Yii::t('default', '次数百分比'),
                        'name'=>'percentage',
                ),
        )
));

$this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'red_sum_count_theory',
        'dataProvider'=>$theoryGroupSumDataProvider,
        'columns'=>array(
                array(
                        'header'=>Yii::t('default', '红球和'),
                        'name'=>'sum_r',
                ),
                array(
                        'header'=>Yii::t('default', '出现次数'),
                        'name'=>'count_sum',
                ),
                array(
                        'header'=>Yii::t('default', '次数百分比'),
                        'name'=>'percentage',
                ),
        )
));
?>

<h1>筛选出可能的和值情况</h1>
规则：
     * 3. 在最近100期内出现次数最多的前20%的情况内
     * 4. 在最近100期内出现次数最少的前20%的情况内
     * 5. 在理论情况下出现次数最多的前20%的情况内
     * 6. 在最近100期出险率低于理论值10%的情况内
     * 7. 在最近100期出险率高于理论值10%的情况内
