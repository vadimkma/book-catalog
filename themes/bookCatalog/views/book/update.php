<?php
/* @var $this BookController */
/* @var $model Book */

$this->breadcrumbs=array(
	'Книги'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Изменение',
);

$this->menu=array(
	array('label'=>'Список книг', 'url'=>array('index')),
	array('label'=>'Создание книги', 'url'=>array('create')),
	array('label'=>'Просмотр книги', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Управление книгами', 'url'=>array('admin')),
);
?>

<h1>Изменение книги <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model, 'list'=>$list)); ?>
