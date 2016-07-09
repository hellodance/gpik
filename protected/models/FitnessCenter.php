<?php

/**
 * This is the model class for table "gp_fitness_center".
 *
 * The followings are the available columns in table 'gp_fitness_center':
 * @property integer $id
 * @property string $name
 * @property integer $type
 * @property string $custom_type
 * @property string $url
 * @property string $address
 * @property integer $phone
 * @property string $area
 * @property string $speciality
 * @property integer $total_trainers
 * @property integer $gender
 * @property string $timings_open
 * @property string $timings_close
 * @property string $facilities
 * @property double $mem_fee
 * @property double $reg_fee
 * @property integer $pay_method
 * @property string $adddate
 * @property integer $status
 */
class FitnessCenter extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'gp_fitness_center';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, type,phone, address,pay_method, area, gender', 'required'),
			array('phone, total_trainers,floors, gender,pincode, status', 'numerical', 'integerOnly'=>true),
			array('mem_fee, reg_fee', 'numerical'),
                        array('phone', 'unique','on'=>'insert', ),
                        array('url', 'url','defaultScheme' => 'http'),
			array('name, area, facilities', 'length', 'max'=>255),
			array('speciality,address2, timings_open,timings_close,custom_type,city_id', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, type, url, address,address2,pincode,floors, phone, area, speciality, total_trainers, gender, timings_open,timings_close, facilities, mem_fee, reg_fee, pay_method, adddate, status', 'safe', 'on'=>'search'),
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
                        'city' => array(self::BELONGS_TO, 'Citylist', 'city_id'),
                        'locality' => array(self::BELONGS_TO, 'Locality', 'area'),
                        'area' =>array(self::BELONGS_TO, 'Locality' , 'area')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'type' => 'Type',
			'url' => 'Url',
			'address' => 'Address 1',
                        'address2' => 'Other Locality',
                        'city_id'=>'City',
                        'floors' => 'No. of Floors',
			'phone' => 'Phone',
			'area' => 'Locality',
			'speciality' => 'Speciality',
			'total_trainers' => 'Total Fitness Professionals',
			'gender' => 'Gender',
			'timings_open' => 'From',
                        'timings_close'=>'To',
			'facilities' => 'Facilities',
			'mem_fee' => 'Membership Fee',
			'reg_fee' => 'Registration Fee',
			'pay_method' => 'Pay Method',
			'adddate' => 'Adddate',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('type',$this->type,true);
                $criteria->compare('custom_type',$this->custom_type,true);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('address',$this->address,true);
                $criteria->compare('city_id',$this->city_id,true);
		$criteria->compare('phone',$this->phone);
		$criteria->compare('area',$this->area,true);
		$criteria->compare('speciality',$this->speciality,true);
		$criteria->compare('total_trainers',$this->total_trainers);
		$criteria->compare('gender',$this->gender);
		$criteria->compare('timings_open',$this->timings_open,true);
                $criteria->compare('timings_close',$this->timings_close,true);
		$criteria->compare('facilities',$this->facilities,true);
		$criteria->compare('mem_fee',$this->mem_fee);
		$criteria->compare('reg_fee',$this->reg_fee);
		$criteria->compare('pay_method',$this->pay_method);
		$criteria->compare('adddate',$this->adddate,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return FitnessCenter the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
