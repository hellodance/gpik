<?php

/**
 * This is the model class for table "gp_food_items".
 *
 * The followings are the available columns in table 'gp_food_items':
 * @property integer $id
 * @property integer $food_typeid
 * @property string $item
 * @property string $serve_unit
 * @property double $calories
 * @property double $fat
 * @property double $carbs
 * @property double $protien
 * @property integer $status
 */
class FoodItems extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'gp_food_items';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('food_typeid, item,calories', 'required'),
                        array('item','unique'),
			array('food_typeid, status', 'numerical', 'integerOnly'=>true),
			array('calories, fat, carbs, protien', 'numerical'),
			array('serve_unit', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id,fdtype, food_typeid, item, serve_unit, calories, fat, carbs, protien, status', 'safe', 'on'=>'search'),
                    array('id,fdtype, food_typeid, item, serve_unit, calories, fat, carbs, protien, status', 'safe', 'on'=>'foodtypesearch'),
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
			'fdtype' =>array(self::BELONGS_TO, 'Foodtype','food_typeid'),
                );
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'food_typeid' => 'Food Typeid',
			'item' => 'Item',
			'serve_unit' => 'Serve Unit',
			'calories' => 'Calories',
			'fat' => 'Fat',
			'carbs' => 'Carbs',
			'protien' => 'Protien',
			'status' => 'Status',
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
		$criteria->compare('food_typeid',$this->food_typeid);
		$criteria->compare('item',$this->item,true);
		$criteria->compare('serve_unit',$this->serve_unit,true);
		$criteria->compare('calories',$this->calories);
		$criteria->compare('fat',$this->fat);
		$criteria->compare('carbs',$this->carbs);
		$criteria->compare('protien',$this->protien);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        
        
        public function foodtypesearch()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
                $criteria->with = array('fdtype');
		$criteria->compare('id',$this->id);
		$criteria->compare('fdtype.id',$this->food_typeid);
		$criteria->compare('item',$this->item,true);
		$criteria->compare('calories',$this->calories);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        
        

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return FoodItems the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
