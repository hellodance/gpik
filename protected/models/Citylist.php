<?php

/**
 * This is the model class for table "gp_citylist".
 *
 * The followings are the available columns in table 'gp_citylist':
 * @property integer $city_id
 * @property string $city_name
 * @property string $latitude
 * @property string $longitude
 * @property string $state
 */
class Citylist extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'gp_citylist';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('city_id, city_name, latitude, longitude, state', 'required'),
			array('city_id', 'numerical', 'integerOnly'=>true),
			array('city_name, state', 'length', 'max'=>50),
			array('latitude, longitude', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('city_id, city_name, latitude, longitude, state', 'safe', 'on'=>'search'),
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
                     'citytrains' => array(self::HAS_MANY, 'TrainerDetails', 'city_id'),
                    'cityuserss' => array(self::HAS_MANY, 'UserDetails', 'city_id')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'city_id' => 'City',
			'city_name' => 'City Name',
			'latitude' => 'Latitude',
			'longitude' => 'Longitude',
			'state' => 'State',
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

		$criteria->compare('city_id',$this->city_id);
		$criteria->compare('city_name',$this->city_name,true);
		$criteria->compare('latitude',$this->latitude,true);
		$criteria->compare('longitude',$this->longitude,true);
		$criteria->compare('state',$this->state,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Citylist the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        public function getCityuserDropDown()
	{
                $data['locations'] = CHtml::listData(Citylist::model()->findAll(array('order'=>'city_name')), 'city_id', 'city_name');
		return $data['locations'];
	}
        public function getstate()
	{
                $data['locations'] = CHtml::listData(Citylist::model()->findAll(array('order'=>'state')), 'city_id', 'state');
		return $data['locations'];
	}
        public function getComboCityuserDropDown()
	{
                $data['locations'] = CHtml::listData(Citylist::model()->findAllByAttributes(array(),'city_id <> 428 and city_id <> 29 and city_id <> 145 and city_id <> 278 and city_id <> 596 and city_id <> 817 ORDER BY city_name'), 'city_id', 'city_name');
		return $data['locations'];
	}
}
