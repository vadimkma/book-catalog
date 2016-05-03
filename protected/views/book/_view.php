<?php
/* @var $this BookController */
/* @var $data Book */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('photo')); ?>:</b>
	<?php
	$img_src=(file_exists($_SERVER["DOCUMENT_ROOT"].Yii::app()->request->baseUrl."/images/".$data->photo) && !empty($data->photo) ) ? Yii::app()->request->baseUrl."/images/".$data->photo
		: Yii::app()->request->baseUrl."/images/no_photo.gif";
	?>
	<?php echo CHtml::image($img_src); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_publisher')); ?>:</b>
	<?php
	foreach($data->publisher as $publisher){
		echo $publisher->name;
	}
	?>
	<?php // echo CHtml::encode($data->publisher->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('autors')); ?>:</b>
	<?php
	foreach($data->autor as $autor){
		echo $autor->name." ".$autor->surname.", ";
	}
	?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('category')); ?>:</b>
	<?php
	foreach($data->category as $category){
		echo $category->name;
	}
	?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_publish')); ?>:</b>
	<?php echo CHtml::encode($data->date_publish); ?>
	<br />


</div>