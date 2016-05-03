<?php
/* @var $this AutorController */
/* @var $model Autor */

$this->breadcrumbs=array(
	'Авторы'=>array('index'),
	'Создание',
);

$this->menu=array(
	array('label'=>'Список авторов', 'url'=>array('index')),
	array('label'=>'Управление авторами', 'url'=>array('admin')),
);
?>

<h1>Создание автора</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>