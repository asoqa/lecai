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

<!-- 
<?php echo CHtml::beginForm('#', 'post', array("id"=>"select_redballs_form")); ?>
<div>
    <div class="ball">
        <?php echo CHtml::textField('r1', '', array('maxlength'=>2, 'size'=>2));?>
    </div>
    <div class="ball">
        <?php echo CHtml::textField('r2', '', array('maxlength'=>2, 'size'=>2));?>
    </div>
    <div class="ball">
        <?php echo CHtml::textField('r3', '', array('maxlength'=>2, 'size'=>2));?>
    </div>      
    <div class="ball">
        <?php echo CHtml::textField('r4', '', array('maxlength'=>2, 'size'=>2));?>
    </div>
    <div class="ball">
        <?php echo CHtml::textField('r5', '', array('maxlength'=>2, 'size'=>2));?>
    </div>
    <div class="ball">
        <?php echo CHtml::textField('r6', '', array('maxlength'=>2, 'size'=>2));?>
    </div>
    <div class="ball">
        <?php echo CHtml::textField('b1', '', array('maxlength'=>2, 'size'=>2));?>
    </div>                  
</div>
<div class="action">
		<?php 
    		echo CHtml::ajaxSubmitButton(Yii::t('default', '生成'),
    		        CHtml::normalizeUrl(array('statistics/guess')),
                    array(
                            'type'=>'POST',
                            'dataType'=>'json',
                            'success'=>'js:function(json) {
                                $("#r1").attr("value", json[0]);
                                $("#r2").attr("value", json[1]);
                                $("#r3").attr("value", json[2]);
                                $("#r4").attr("value", json[3]);
                                $("#r5").attr("value", json[4]);
                                $("#r6").attr("value", json[5]);
                                $("#b1").attr("value", json[6]);
                            }'
                    ),
    		        array(
    		                'id'=>'ajaxSubmitBtn',
    		                'name'=>'ajaxSubmitBtn'
    		        ));
        ?>
</div>
<?php echo CHtml::endForm(); ?>
 -->

<?php echo CHtml::label('<b>请选择红球和蓝球</b>', 'select_label');?>
<section id="c-wrapper" class="clearfix">
<article class="c-grid-main">
<section id="J-mojo-bet" class="mojo-bet mt10">
<div class="bd">
<div id="ssq_pt" class="abacus mode4">
<div>
<div class="bd" id="yui_3_3_0_1_1371556152065364">
							<!--
								- 由于一个row里面有两个ball-list,因此将rel属性置于ball-list内
							-->
    <div class="row" id="yui_3_3_0_1_1371556152065363">
								<div class="indicate"><span class="bit">选择号码</span><span rel="[当前遗漏] 指该号码自上次开出之后没有出现的次数" class="omit">当前遗漏</span></div>
								<!--
									- rel属性是该行的序号，从0开始
								-->
								<ul rel="0" class="ball-list" id="yui_3_3_0_1_1371556152065239">
									<li><span class="ball">01</span><em>2</em></li>
									<li><span class="ball">02</span><em>1</em></li>
									<li><span class="ball">03</span><em>3</em></li>
									<li><span class="ball">04</span><em>2</em></li>
									<li><span class="ball">05</span><em>8</em></li>
									<li><span class="ball">06</span><em>7</em></li>
									<li><span class="ball">07</span><em>0</em></li>
									<li><span class="ball">08</span><em>11</em></li>
									<li><span class="ball">09</span><em>2</em></li>
									<li><span class="ball">10</span><em>6</em></li>
									<li><span class="ball">11</span><em>11</em></li>
									<li><span class="ball">12</span><em>8</em></li>
									<li><span class="ball">13</span><em>1</em></li>
									<li><span class="ball">14</span><em class="big">15</em></li>
									<li><span class="ball">15</span><em>2</em></li>
									<li><span class="ball">16</span><em>0</em></li>
									<li><span class="ball">17</span><em>0</em></li>
									<li><span class="ball">18</span><em>0</em></li>
									<li><span class="ball">19</span><em>4</em></li>
									<li><span class="ball">20</span><em>1</em></li>
									<li><span class="ball">21</span><em>11</em></li>
									<li><span class="ball">22</span><em>2</em></li>
									<li><span class="ball">23</span><em>4</em></li>
									<li><span class="ball">24</span><em>10</em></li>
									<li><span class="ball">25</span><em>1</em></li>
									<li><span class="ball">26</span><em>12</em></li>
									<li><span class="ball">27</span><em>1</em></li>
									<li><span class="ball">28</span><em>12</em></li>
									<li><span class="ball">29</span><em>4</em></li>
									<li><span class="ball">30</span><em>0</em></li>
									<li><span class="ball">31</span><em>6</em></li>
									<li><span class="ball">32</span><em>3</em></li>
									<li><span class="ball">33</span><em>0</em></li>
								</ul>
								<ul class="ball-list extra" id="yui_3_3_0_1_1371556152065308">
									<li><span class="ball">01</span><em>36</em></li>
									<li><span class="ball">02</span><em>4</em></li>
									<li><span class="ball">03</span><em>19</em></li>
									<li><span class="ball">04</span><em>21</em></li>
									<li><span class="ball">05</span><em>11</em></li>
									<li><span class="ball">06</span><em>0</em></li>
									<li><span class="ball">07</span><em>3</em></li>
									<li><span class="ball">08</span><em class="big">44</em></li>
									<li><span class="ball">09</span><em>10</em></li>
									<li><span class="ball">10</span><em>29</em></li>
									<li><span class="ball">11</span><em>31</em></li>
									<li><span class="ball">12</span><em>5</em></li>
									<li><span class="ball">13</span><em>17</em></li>
									<li><span class="ball">14</span><em>15</em></li>
									<li><span class="ball">15</span><em>9</em></li>
									<li><span class="ball">16</span><em>13</em></li>
								</ul>
							</div>
						</div>
</div>
</div>
</div>
</section>
</article>
</section>

<?php echo CHtml::beginForm('#', 'post', array("id"=>"analysis_balls")); ?>
<div>
    		<?php 
        		echo CHtml::ajaxSubmitButton(Yii::t('default', '分析'),
        		        CHtml::normalizeUrl(array('statistics/guess')),
                        array(
                                'type'=>'POST',
                                'data'=>'js:"&model="+getSelect()',
                                'dataType'=>'json',
                                'success'=>'js:function(json) {
                                    $("#same-sum-issues").yiiGridView.update("same-sum-issues");
                                    $("#same-balls-issues").yiiGridView.update("same-balls-issues");	
                                }'
                        ),
        		        array(
        		                'id'=>'nextBtn',
        		                'name'=>'nextBtn'
        		        ));
            ?>
    		<?php 
    	    	echo CHtml::resetButton(Yii::t('default', '重置'), array('id'=>'selection-reset-button'));
            ?>
</div>
<?php echo CHtml::endForm(); ?>
1.该和值历史出现的热度排名
<br/>
2.该和值理论出现的热度排名
<br/>
<h1>相同和的情况</h1>
<?php 
$this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'same-sum-issues',
        'dataProvider'=>$sumDataProvider,
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

<br/>
<h1>相同球的情况</h1>
<?php 
$this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'same-balls-issues',
        'dataProvider'=>$sameBallDataProvider,
        'columns'=>array(
                array(
                        'header'=>Yii::t('default', 'Issue'),
                        'name'=>'issue',
                ),
                array(
                        'header'=>Yii::t('default', 'RedBall'),
                        'name'=>'redball',
                        'type'=>'raw',
                        'value'=>array($this, 'markSameBallsColumn'),
                ),
                array(
                        'header'=>Yii::t('default', 'BlueBall'),
                        'name'=>'blueball',
                ),
        )
));
?>


<script type="text/javascript">
var select=new Array();

jQuery(document).ready(function(){
    $(".ball").click(function(){
    	var isSelected=$(this).parent().attr('class');
    	if(!isSelected)
    	{
        	$(this).parent().attr('class', 'selected');
        	switch($(this).parent().parent().attr('class'))
        	{
        	    case 'ball-list extra':
        	    	select.push('b'+$(this).text());
        	        break;
        	    case 'ball-list':
        	    	select.push('r'+$(this).text());
        	        break;
        	}
    	}
    	else {
    		$(this).parent().attr('class', '');
    		for(x in select)
    		{
            	switch($(this).parent().parent().attr('class'))
            	{
            	    case 'ball-list extra':
                		if(select[x]==('b'+$(this).text()))
                		{
                			select.splice(x, 1);
                		}
                		break;
            	    case 'ball-list':
                		if(select[x]==('r'+$(this).text()))
                		{
                			select.splice(x, 1);
                		}                	    
            	        break;
            	}        		
    		}
    	}
    });

    $('#selection-reset-button').click(function(){
	    select=new Array();
    	$(".ball").each( function(i,o) {
    	    $(o).parent().attr('class', '');
    	});
    });    
});

function getSelect()
{
	return JSON.stringify(select);
}
</script>