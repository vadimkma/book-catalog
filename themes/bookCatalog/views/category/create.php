<?php
/* @var $this CategoryController */
/* @var $model Category */
/* @var $category Category */

$this->breadcrumbs=array(
	'Рубрики'=>array('index'),
	'Создание',
);

$this->menu=array(
	array('label'=>'Управление рубриками', 'url'=>array('admin')),
);
?>

<h1>Create Category</h1>
<?php $this->renderPartial('_form', array('model'=>$model, 'category'=> $category )); ?>