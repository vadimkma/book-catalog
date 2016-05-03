<?php
/* @var $this SiteController */
/* @var $dataProvider CActiveDataProvider */

$this->pageTitle=Yii::app()->name;
?>
<?php
	$this->widget('zii.widgets.CListView', array(
		'dataProvider'=>$dataProvider,
		'itemView'=>'_viewBook',
		'htmlOptions'=>array(
			'class'=>'list-view-book',
		),
	)); ?>

