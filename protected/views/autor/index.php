<?php
/* @var $this AutorController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Autors',
);

$this->menu=array(
	array('label'=>'Create Autor', 'url'=>array('create')),
	array('label'=>'Manage Autor', 'url'=>array('admin')),
);
?>

<h1>Autors</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
