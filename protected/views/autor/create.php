<?php
/* @var $this AutorController */
/* @var $model Autor */

$this->breadcrumbs=array(
	'Autors'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Autor', 'url'=>array('index')),
	array('label'=>'Manage Autor', 'url'=>array('admin')),
);
?>

<h1>Create Autor</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>