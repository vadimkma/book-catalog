<?php

/**
 * This is the model class for table "category".
 *
 * The followings are the available columns in table 'category':
 * @property integer $id
 * @property string $name
 * @property integer $id_parent
 */
class Category extends CActiveRecord
{

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'category';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name', 'required'),
			array('id_parent', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, id_parent', 'safe', 'on'=>'search'),
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
			'book' =>array(self::HAS_MANY, 'Book', 'id_category'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Рубрика',
			'id_parent' => 'Родительская рубрика',
			'parent' => 'Родительская рубрика',
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
		$criteria->compare('id_parent',$this->id_parent);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function fnParentCategory($data){
		$parentCategory = Category::model()->findByPk($data->id_parent);
		if($parentCategory == NULL){
			echo "";
		}else{
			echo $parentCategory->name;
		}
	}
	public function getParentCategory(){
		$parentCategory = Category::model()->findByPk($this->id_parent);
		if($parentCategory == NULL){
			return "";
		}else{
			return $parentCategory->name;
		}
	}

	public static function getTreeArray() {
		$tree = array();
		$dataset = array();
		$categories = Category::model()->findAll();
		//
		foreach($categories as $category){
			$newData = array();
			$newData['id']=$category->id;
			$newData['name']=$category->name;
			if( $category->id_parent == NULL){
				$newData['parent']=0;
			}else {
				$newData['parent'] = $category->id_parent;
			}
			$dataset[$category->id] = $newData;
		}
		foreach ($dataset as $id => &$node) {
			//Если нет вложений
			if (!$node['parent']){
				$tree[$id] = &$node;
			}else{
				//Если есть потомки то перебераем массив
				$dataset[$node['parent']]['childs'][$id] = &$node;
			}
		}
		return $tree;
	}

	public static function getTreeTpl($item) {
		$menu = '<li>'. CHtml::link(CHtml::encode($item['name']), array('category/view', 'id'=>$item['id'])) .'</li>';
		if(isset($item['childs'])){
			$menu .= '<ul>'. self::showCat($item['childs']) .'</ul>';
		}
		$menu .= '</li>';
		return $menu;
	}

	public static function showCat($data){
			$string = '';
			foreach($data as $item){
				$string .=  self::getTreeTpl($item);
			}
	return $string;
	}




	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Category the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
