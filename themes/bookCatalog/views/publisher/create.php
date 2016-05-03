<?php
/* @var $this PublisherController */
/* @var $model Publisher */

$this->breadcrumbs=array(
	'Издательства'=>array('index'),
	'Создание',
);

$this->menu=array(
	array('label'=>'Список издательств', 'url'=>array('index')),
	array('label'=>'Управление издательствами', 'url'=>array('admin')),
);
?>

<h1>Создание издательства</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>