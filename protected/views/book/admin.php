<?php
/* @var $this BookController */
/* @var $model Book */

$this->breadcrumbs=array(
	'Books'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Book', 'url'=>array('index')),
	array('label'=>'Create Book', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#book-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Books</h1>


<?php
$fnAutors =function($data){ foreach ($data->autor as $autor){ echo  $autor->name.' '.$autor->surname.'<br> ';  }};
$fnCategories =function($data){ foreach ($data->category as $category){ echo  $category->name.'<br> ';  }};
$fnPublishers = function($data){ foreach ($data->publisher as $publisher){ echo  $publisher->name.'<br> ';  }};
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'book-grid',
	'dataProvider'=>$model->search(),
	'columns'=>array(
		'id',
		'name',
		array(
			'name'=>'photo',
			'type'=>'image',
			'value'=> 'Book::getPhotoUrlStatic($data)',
		),
		array(
			'name'=>'autors',
			'type'=>'text',
			'value'=> $fnAutors,
		),
		array(
			'name'=>'category',
			'type'=>'text',
			'value'=> $fnCategories,
		),
		array(
			'name'=>'id_publisher',
			'type'=>'text',
			'value'=> $fnPublishers,
		),
		'date_publish',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
