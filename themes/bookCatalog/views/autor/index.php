<?php
/* @var $this AutorController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Авторы',
);

$this->menu=array(
	array('label'=>'Создать автора', 'url'=>array('create')),
	array('label'=>'Управление авторами', 'url'=>array('admin')),
);
?>

<h1>Авторы</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
