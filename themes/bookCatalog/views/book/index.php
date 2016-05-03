<?php
/* @var $this BookController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Книги',
);
if(!Yii::app()->user->isGuest) {
	$this->menu = array(
		array('label' => 'Создать книгу', 'url' => array('create')),
		array('label' => 'Управление книгами', 'url' => array('admin')),
	);
}
?>
<h1>Книги</h1>
</br>
	<?php
	$this->widget('zii.widgets.CListView', array(
		'dataProvider'=>$dataProvider,
		'itemView'=>'_view',
		'htmlOptions'=>array(
			'class'=>'list-view-book',
		),
	)); ?>
