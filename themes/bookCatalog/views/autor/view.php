<?php
/* @var $this AutorController */
/* @var $model Autor */

$this->breadcrumbs=array(
	'Авторы'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Список авторов', 'url'=>array('index')),
	array('label'=>'Создать автора', 'url'=>array('create')),
	array('label'=>'Изменить автора', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить автора', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Вы действительно хотите удалить эту запись?')),
	array('label'=>'Управление авторами', 'url'=>array('admin')),
);
?>

<h1>Просмотр автора #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'surname',
	),
)); ?>
