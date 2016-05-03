<?php
/* @var $this BookController */
/* @var $model Book */

$this->breadcrumbs=array(
	'Книги'=>array('index'),
	'Создание',
);

$this->menu=array(
	array('label'=>'Список книг', 'url'=>array('index')),
	array('label'=>'Управление книгами', 'url'=>array('admin')),
);
?>

<h1>Создание книги</h1>

<?php $this->renderPartial('_form', array('model'=>$model, 'list'=>$list)); ?>