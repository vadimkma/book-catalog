<?php
/* @var $this PublisherController */
/* @var $model Publisher */

$this->breadcrumbs=array(
	'Издательства'=>array('index'),
	'Управление',
);

$this->menu=array(
	array('label'=>'Список издательств', 'url'=>array('index')),
	array('label'=>'Создать издательство', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#publisher-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Управление издательствами</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'publisher-grid',
	'dataProvider'=>$model->search(),
	'columns'=>array(
		'id',
		'name',
		'address',
		'phone',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
