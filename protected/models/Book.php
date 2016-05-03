<?php

/**
 * This is the model class for table "book".
 *
 * The followings are the available columns in table 'book':
 * @property integer $id
 * @property string $name
 * @property string $photo
 * @property string $date_publish
 */
class Book extends CActiveRecord
{
	public $del_image=false;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'book';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, date_publish', 'required'),
			array('name, photo, date_publish', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, photo, date_publish', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(

			'buf_book'=> array(self::HAS_MANY, 'book2category', 'id_book'),
			'category'=> array(self::HAS_MANY, 'Category', 'id_category', 'through' =>'buf_book'),

			'buf_book2'=> array(self::HAS_MANY, 'Book2autor', 'id_book'),
			'autor'=> array(self::HAS_MANY, 'Autor', 'id_autor', 'through' =>'buf_book2'),

			'buf_publisher'=> array(self::HAS_MANY, 'Book2publisher', 'id_book'),
			'publisher'=> array(self::HAS_MANY, 'Publisher', 'id_publisher', 'through' =>'buf_publisher'),

			//'publisher' => array(self::BELONGS_TO, 'Publisher', 'id_publisher'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Название',
			'photo' => 'Фото',
			'id_publisher' => 'Издательство',
			'date_publish' => 'Дата издания',
			'autors' => 'Авторы',
			'category' => 'Рубрика',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('photo',$this->photo,true);
		$criteria->compare('date_publish',$this->date_publish,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function getPhotoUrl()
	{
		return (file_exists($_SERVER["DOCUMENT_ROOT"].Yii::app()->request->baseUrl."/images/".$this->photo) && !empty($this->photo) ) ?
			Yii::app()->request->baseUrl."/images/".$this->photo :
			Yii::app()->request->baseUrl."/images/no_photo.gif";
	}

	public static function getPhotoUrlStatic($data)
	{
		return (file_exists($_SERVER["DOCUMENT_ROOT"].Yii::app()->request->baseUrl."/images/".$data->photo) && !empty($data->photo) ) ?
			Yii::app()->request->baseUrl."/images/".$data->photo :
			Yii::app()->request->baseUrl."/images/no_photo.gif";
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Book the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
