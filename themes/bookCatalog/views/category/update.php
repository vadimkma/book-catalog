<?php
/* @var $this CategoryController */
/* @var $model Category */
/* @var $category Category */

$this->breadcrumbs=array(
	'Рубрики'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Изменение',
);

$this->menu=array(
	array('label'=>'Создать рубрику', 'url'=>array('create')),
	array('label'=>'Просмотреть рубрику', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Управление рубриками', 'url'=>array('admin')),
);
?>

<h1>Update Category <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model, 'category'=> $category)); ?>