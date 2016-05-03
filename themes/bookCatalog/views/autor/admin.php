<?php
/* @var $this AutorController */
/* @var $model Autor */

$this->breadcrumbs=array(
	'Авторы'=>array('index'),
	'Управление',
);

$this->menu=array(
	array('label'=>'Список авторов', 'url'=>array('index')),
	array('label'=>'Создать автора', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#autor-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Управление авторами</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'autor-grid',
	'dataProvider'=>$model->search(),
	'columns'=>array(
		'id',
		'name',
		'surname',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
