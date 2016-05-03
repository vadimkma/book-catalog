<?php
/* @var $this CategoryController */
/* @var $dataProvider Category */

$this->breadcrumbs=array(
	'Categories'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Category', 'url'=>array('index')),
	array('label'=>'Create Category', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#category-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Categories</h1>


<?php
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'category-grid',
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		'id',
		'name',
		array(
			'name'=>'parent',
			'type'=>'raw',
			'value'=> 'Category::model()->fnParentCategory($data);',
		),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
