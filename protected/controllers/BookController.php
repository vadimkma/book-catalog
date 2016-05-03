<?php

class BookController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Book;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Book']))
		{

			$model->attributes=$_POST['Book'];

			if($model->save()) {

				if(isset($_POST['autor'])){
					foreach($_POST['autor'] as $autor){
						$modelB2A = new Book2autor();
						$modelB2A->id_autor = intVal($autor);
						$modelB2A->id_book = $model->id;
						$modelB2A->save();
					}
				}


				$modelB2C = new Book2category();
				$modelB2C->id_category = intVal($_POST['Book']['category']);
				$modelB2C->id_book = $model->id;
				$modelB2C->save();

				$modelB2P = new Book2publisher();
				$modelB2P->id_publisher = intVal($_POST['Book']['publisher']);
				$modelB2P->id_book = $model->id;
				$modelB2P->save();

				$photo= $model->photo;
				$model->photo=CUploadedFile::getInstance($model,'photo');
				if ($model->photo!=NULL) {
					$file_name =  $model->photo;
					$model->photo->saveAs(dirname(__FILE__).'/../../images/'.$file_name);
					$model->save(FALSE);
					$model->photo=$photo;
				}
				$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$list=[];
		$modelsC = Category::model()->findAll(array('order' => 'name'));
		$list['category'] = CHtml::listData($modelsC, 'id', 'name');
		$list['category'][0]="Главная";
		$modelsA = Autor::model()->findAll(array('order' => 'name'));
		$list['autor'] = CHtml::listData($modelsA, 'id', 'surname');
		$modelsP = Publisher::model()->findAll(array('order' => 'name'));
		$list['publisher'] = CHtml::listData($modelsP, 'id', 'name');

		$this->render('create',array(
			'model'=>$model,
			'list'=>$list,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		$fileName=$model->photo;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Book']))
		{
			$model->attributes=$_POST['Book'];
			$model->del_image=boolval($_POST['Book']['del_image']);
			if(!$model->del_image){
				$model->photo=$fileName;
			}


			if($model->save()) {

				Book2autor::model()->deleteAllByAttributes(
					array('id_book'=>$model->id)
				);
				if(isset($_POST['autor'])){
					foreach($_POST['autor'] as $autor){
						$modelB2A = new Book2autor();
						$modelB2A->id_autor = intVal($autor);
						$modelB2A->id_book = $model->id;
						$modelB2A->save();
					}
				}

				Book2category::model()->deleteAllByAttributes(
					array('id_book'=>$model->id)
				);
				$modelB2C = new Book2category();
				$modelB2C->id_category = intVal($_POST['Book']['category']);
				$modelB2C->id_book = $model->id;
				$modelB2C->save();

				Book2publisher::model()->deleteAllByAttributes(
					array('id_book'=>$model->id)
				);
				$modelB2P = new Book2publisher();
				$modelB2P->id_publisher = intVal($_POST['Book']['publisher']);
				$modelB2P->id_book = $model->id;
				$modelB2P->save();


				$photo= $model->photo;
				$model->photo=CUploadedFile::getInstance($model,'photo');
				if ($model->photo!=NULL) {
					$file_name =  $model->photo;
					$model->photo->saveAs(dirname(__FILE__).'/../../images/'.$file_name);
					$model->save();
					$model->photo=$photo;
				}

				$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$list=[];
		$modelsC = Category::model()->findAll(array('order' => 'name'));
		$list['category'] = CHtml::listData($modelsC, 'id', 'name');
		$list['category'][0]="Главная";
		$modelsA = Autor::model()->findAll(array('order' => 'name'));
		$list['autor'] = CHtml::listData($modelsA, 'id', 'surname');
		$modelsP = Publisher::model()->findAll(array('order' => 'name'));
		$list['publisher'] = CHtml::listData($modelsP, 'id', 'name');

		$this->render('update',array(
			'model'=>$model,
			'list'=>$list,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		Book2autor::model()->deleteAll("id_book = :id_book", array(':id_book'=>$id));
		Book2category::model()->deleteAll("id_book = :id_book", array(':id_book'=>$id));
		Book2publisher::model()->deleteAll("id_book = :id_book", array(':id_book'=>$id));
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{

		/*foreach (Book::model()->findAll() as $spl)
		{
			$arr_spl=$spl->autor;
			foreach($spl->autor as $autor){
				var_dump($autor->name);
			}

		}*/

		$dataProvider=new CActiveDataProvider('Book');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Book('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Book']))
			$model->attributes=$_GET['Book'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Book the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Book::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Book $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='book-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
