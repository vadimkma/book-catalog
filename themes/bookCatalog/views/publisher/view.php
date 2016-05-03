<?php
/* @var $this PublisherController */
/* @var $model Publisher */

$this->breadcrumbs=array(
	'Издательства'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Список издательств', 'url'=>array('index')),
	array('label'=>'Создать издательство', 'url'=>array('create')),
	array('label'=>'Изменить издательство', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить издательство', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Вы действительно хотите удалить эту запись?')),
	array('label'=>'Управление издательствами', 'url'=>array('admin')),
);
?>

<h1>Просмотр издательства #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'address',
		'phone',
	),
)); ?>
