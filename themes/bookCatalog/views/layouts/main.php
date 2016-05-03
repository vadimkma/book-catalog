<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="language" content="en">

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/main.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/form.css">


	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
	<div class="wrapper" id="page">
		<div id="inner">
			<div id="header">
				<div class="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
				<div id="nav">
					<?php $this->widget('zii.widgets.CMenu',array(
						'items'=>array(
							array('label'=>'Главная', 'url'=>array('/site/index')),
							array('label'=>'Книги', 'url'=>array('/book', 'view'=>'index')),
							array('label'=>'Рубрики', 'url'=>array('/category', 'view'=>'index'),'visible'=>!Yii::app()->user->isGuest),
							array('label'=>'Авторы', 'url'=>array('/autor', 'view'=>'index'),'visible'=>!Yii::app()->user->isGuest),
							array('label'=>'Издательства', 'url'=>array('/publisher', 'view'=>'index'),'visible'=>!Yii::app()->user->isGuest),
							array('label'=>'Авторизация', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
							array('label'=>'Выйти ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
						),
					)); ?>
				</div>
				<!-- end nav -->
				<div class="banner">
				</div>
			</div>
			<!-- end header -->


			<div id="body-content">




				<div id="category-sidebar">
					<div class="title">
						Рубрики
					</div>
					<ul>
						<?php
						$dataProviderCat = new Category();
						$categoryTree = $dataProviderCat->getTreeArray();
						$categoryTree = $dataProviderCat->showCat($categoryTree);
						echo $categoryTree; ?>
					</ul>
				</div>
				<div class="content-page">
					<?php if(isset($this->breadcrumbs)):?>
						<?php $this->widget('zii.widgets.CBreadcrumbs', array(
							'links'=>$this->breadcrumbs,
						)); ?><!-- breadcrumbs -->
					<?php endif?>
					<div style="clear: both"></div>
					</br>
					<?php echo $content; ?>
				</div>

				<!-- end .inner -->
			</div>

			<!-- end body -->
			<div class="clear"></div>
		</div>
		<!-- end inner -->
		<div id="footer"> © 2016 Книжный каталог<br/>
			<?php echo Yii::powered(); ?>
		</div>
	</div>
	<!-- end wrapper -->

</body>
</html>
