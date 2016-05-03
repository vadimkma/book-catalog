<?php
/* @var $this BookController */
/* @var $model Book */
/* @var $form CActiveForm */
/* @var $list ArrayObject */
?>

<div class="form">

	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'book-form',
		'htmlOptions'=>array('enctype'=>'multipart/form-data'),
		// Please note: When you enable ajax validation, make sure the corresponding
		// controller action is handling ajax validation correctly.
		// There is a call to performAjaxValidation() commented in generated controller code.
		// See class documentation of CActiveForm for details on this.
		'enableAjaxValidation'=>false,
	)); ?>

	<p class="note">Поля с <span class="required">*</span> обязательные.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'photo'); ?>

		<?php
		if(!$model->isNewRecord) {
			echo '<br/>'.CHtml::image($model->getPhotoUrl(), $model->name, array('style' => 'height: 200px'))."<br/>";
			echo '<b>Удалить изображение</b><br/>';
			echo $form->checkBox($model, 'del_image');
			echo '<br/>';
		}
		?>
		<?php //echo $form->textField($model,'photo',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->fileField($model, 'photo'); // CHtml::activeFileField($model, 'photo'); ?>
		<?php echo $form->error($model,'photo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'autors'); ?>
		<?php //echo $form->checkBoxList($model,'autor', $list['autor']); ?>
		<?php
		// Multiple data
		$this->widget('ext.select2.ESelect2',array(
			'name'=>'autor',
			'data'=>$list['autor'],
			'value'=>$model->autor,
			'htmlOptions'=>array(
				'multiple'=>'multiple',
			),
		));
		?>
		<?php echo $form->error($model,'autors'); ?>

	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'category'); ?>
		<?php echo $form->dropDownList($model,'category', $list['category']); ?>
		<?php echo $form->error($model,'category'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_publisher'); ?>
		<?php echo $form->dropDownList($model,'publisher', $list['publisher']); ?>
		<?php echo $form->error($model,'id_publisher'); ?>
	</div>

	<div class="row">

		<?php echo $form->labelEx($model,'date_publish'); ?>
		<?php
		$this->widget('ext.my97DatePicker.JMy97DatePicker',array(
			'name'=>CHtml::activeName($model,'date_publish'),
			'value'=>$model->date_publish,
			'options'=>array('dateFmt'=>'yyyy-MM-dd'),
		));?>
		<?php echo $form->error($model,'date_publish'); ?>


		<?php //echo $form->labelEx($model,'date_publish'); ?>
		<?php //echo $form->textField($model,'date_publish',array('size'=>60,'maxlength'=>255)); ?>
		<?php // echo $form->error($model,'date_publish'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить'); ?>
	</div>

	<?php $this->endWidget(); ?>

</div><!-- form -->