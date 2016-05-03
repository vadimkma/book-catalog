<?php
/* @var $this AutorController */
/* @var $model Autor */

$this->breadcrumbs=array(
	'Авторы'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Изменение',
);

$this->menu=array(
	array('label'=>'Список авторов', 'url'=>array('index')),
	array('label'=>'Создать автора', 'url'=>array('create')),
	array('label'=>'Показать автора', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Управление авторами', 'url'=>array('admin')),
);
?>

<h1>Изменение автора <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>