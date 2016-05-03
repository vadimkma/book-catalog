<?php
/* @var $this CategoryController */
/* @var $model Category */
/* @var $dataProvider Book */

$this->breadcrumbs=array(
	'Рубрики'=>array('index'),
	$model->name,
);
if(!Yii::app()->user->isGuest) {
	$this->menu = array(
		array('label' => 'Создать рубрику', 'url' => array('create')),
		array('label' => 'Изменить рубрику', 'url' => array('update', 'id' => $model->id)),
		array('label' => 'Удалить рубрику', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Вы действительно хотите удалить эту запись?')),
		array('label' => 'Управление рубриками', 'url' => array('admin')),
	);
	?>

	<h1>Просмотр рубрики #<?php echo $model->id; ?></h1>

	<?php $this->widget('zii.widgets.CDetailView', array(
		'data' => $model,
		'attributes' => array(
			'id',
			'name',
			array(
				'name' => 'parent',
				'type' => 'raw',
				'value' => $model->getParentCategory(),
			),
		),
	));
}?>
<h2>Книги в рубрике</h2>
<?php
$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_viewBook',
	'htmlOptions'=>array(
		'class'=>'list-view-book',
	),
)); ?>
