<?php

/**
 * This is the model class for table "gp_user_foodintake".
 *
 * The followings are the available columns in table 'gp_user_foodintake':
 * @property integer $id
 * @property integer $user_id
 * @property integer $foodtype_id
 * @property integer $fooditem_id
 * @property string $name
 * @property integer $mealtype
 * @property string $mealsize
 * @property double $calories
 * @property string $adddate
 * @property string $intake_note
 * @property integer $status
 */
class UserFoodintake extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'gp_user_foodintake';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, foodtype_id, fooditem_id, name, mealtype, mealsize', 'required'),
			array('user_id, foodtype_id, fooditem_id, mealtype, status', 'numerical', 'integerOnly'=>true),
			array('calories', 'numerical'),
			array('name, mealsize', 'length', 'max'=>255),
			array('adddate, intake_note', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_id, foodtype_id, fooditem_id, name, mealtype, mealsize, calories, adddate, intake_note, status', 'safe', 'on'=>'search'),
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
                    'foodtype' => array(self::BELONGS_TO, 'Foodtype', 'foodtype_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'user_id' => 'User',
			'foodtype_id' => 'Foodtype',
			'fooditem_id' => 'Fooditem',
			'name' => 'Name',
			'mealtype' => 'Mealtype',
			'mealsize' => 'Mealsize',
			'calories' => 'Calories',
			'adddate' => 'Adddate',
			'intake_note' => 'Intake Note',
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
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('foodtype_id',$this->foodtype_id);
		$criteria->compare('fooditem_id',$this->fooditem_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('mealtype',$this->mealtype);
		$criteria->compare('mealsize',$this->mealsize,true);
		$criteria->compare('calories',$this->calories);
		$criteria->compare('adddate',$this->adddate,true);
		$criteria->compare('intake_note',$this->intake_note,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return UserFoodintake the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        public function getfoodintakes(){
            {
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('user_id',Yii::app()->user->id);
                $now = new CDbExpression("CURDATE()");
                $criteria->addCondition('DATE(t.adddate) = '.$now.'');
		$criteria->compare('foodtype_id',$this->foodtype_id);
		$criteria->compare('fooditem_id',$this->fooditem_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('mealtype',$this->mealtype);
		$criteria->compare('mealsize',$this->mealsize,true);
		$criteria->compare('calories',$this->calories);
		$criteria->compare('adddate',$this->adddate,true);
		$criteria->compare('intake_note',$this->intake_note,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
            }
        }
        public function getCaloriegraph()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.
                
		 $criteria = new CDbCriteria;
                 $criteria->compare('user_id',Yii::app()->user->id);
                 $criteria->select = 'id, name,calories';
                 $now = new CDbExpression("CURDATE()");
                $criteria->addCondition('DATE(t.adddate) = '.$now.'');
                 $rows = self::model()->findAll($criteria);
                 $data = array();
                 foreach($rows as $row){
                     $data[]= $row->calories ;
                 }
                 return array_sum($data);
		
		
	}
}
