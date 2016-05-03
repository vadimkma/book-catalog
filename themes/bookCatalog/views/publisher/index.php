<?php
/* @var $this PublisherController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Издательства',
);
$this->menu=array(
	array('label'=>'Создать издательство', 'url'=>array('create')),
	array('label'=>'Управление издательствами', 'url'=>array('admin')),
);
?>

<h1>Издательства</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
