<?php
/* @var $this PublisherController */
/* @var $model Publisher */

$this->breadcrumbs=array(
	'Издательства'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Изменение',
);

$this->menu=array(
	array('label'=>'Список издательств', 'url'=>array('index')),
	array('label'=>'Создать издательство', 'url'=>array('create')),
	array('label'=>'Просмотр издательства', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Управление издательствами', 'url'=>array('admin')),
);
?>

<h1>Изменение издательства <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>