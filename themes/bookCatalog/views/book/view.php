<?php
/* @var $this BookController */
/* @var $model Book */

$this->breadcrumbs=array(
	'Книги'=>array('index'),
	$model->name,
);
if(!Yii::app()->user->isGuest) {
	$this->menu = array(
		array('label' => 'Список книг', 'url' => array('index')),
		array('label' => 'Создание книги', 'url' => array('create')),
		array('label' => 'Изменение книги', 'url' => array('update', 'id' => $model->id)),
		array('label' => 'Удаление книги', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Вы действительно хотите удалить эту запись?')),
		array('label' => 'Управление книгами', 'url' => array('admin')),
	);
}
?>

<h1>Просмотр книги #<?php echo $model->id; ?></h1>

<?php
$fnAutors = function($data){ $autorStr=""; foreach ($data->autor as $autor){ $autorStr=$autorStr.$autor->name.' '.$autor->surname.', ';  } return $autorStr; };
$fnCategories = function($data){ $categoryStr=""; foreach ($data->category as $category){ $categoryStr=$categoryStr.$category->name.'';  } return $categoryStr;};
$fnPublishers = function($data){ $publisherStr=""; foreach ($data->publisher as $publisher){ $publisherStr=$publisherStr.$publisher->name.'';  } return $publisherStr;};
$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'name',
		array(
			'name'=>'photo',
			'type'=>'image',
			'value'=> Book::getPhotoUrlStatic($model),
		),
		array(
			'name'=>'autors',
			'type'=>'text',
			'value'=> $fnAutors,
		),
		array(
			'name'=>'category',
			'type'=>'text',
			'value'=> $fnCategories,
		),
		array(
			'name'=>'id_publisher',
			'type'=>'text',
			'value'=> $fnPublishers,
		),
		'date_publish',
	),
)); ?>
