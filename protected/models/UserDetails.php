<?php

/**
 * This is the model class for table "gp_user_details".
 *
 * The followings are the available columns in table 'gp_user_details':
 * @property integer $id
 * @property integer $user_id
 * @property string $avtar
 * @property string $fname
 * @property string $lname
 * @property string $mobile_no
 * @property string $description
 * @property string $street
 * @property string $address
 * @property string $address_2
 * @property string $city
 */
class UserDetails extends CActiveRecord
{
   
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'gp_user_details';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fname,dob, lname,mobile_no, pincode,curweight,goalweight,height,dob,street, address, address_2,city_id, country_id', 'required'),
			array('user_id, mobile_no, curweight, goalweight,pincode, height', 'numerical', 'integerOnly'=>true),
                        array('mobile_no','length', 'min'=>10 ),
                        array('qid', 'required','on'=>'medical'),
                        array('mobile_no','length', 'max'=>12 ),
			array('fname, lname, mobile_no, street, city_id', 'length', 'max'=>255),
			array('description', 'length', 'max'=>2000),
                       
                        array('description', 'checker'), // Custom validation method in this object
                        
                        array('avtar,,address_2,gender','safe'),
                        array('id, user_id, avtar, fname, lname, mobile_no,address_2, description, street, address, city_id, country_id, pincode, dob,gender, curweight, goalweight, height, qid, status', 'safe', 'on'=>'search'),
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
			'users' => array(self::BELONGS_TO, 'Users', 'user_id'),
                        'city' => array(self::BELONGS_TO, 'Citylist', 'city_id'),
                        'locality' => array(self::BELONGS_TO, 'Locality', 'street'),
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
			'avtar' => 'Avtar',
			'fname' => 'First Name',
			'lname' => 'Last Name',
			'mobile_no' => 'Mobile No.',
			'description' => 'Description',
			'street' => 'Locality',
			'address' => 'Address 1',
                        'address_2' => 'Address 2',
			'city_id' => 'City',
                        'country_id' => 'Country',
                        'pincode' => 'Pincode',
                        'dob' => 'DOB',
                        'gender' => 'Gender',
                        'curweight' => 'Current Weight',
                        'goalweight' => 'Goal Weight',
                        'height' => 'Current Height',
                        'qid' => 'Question',
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
		$criteria->compare('avtar',$this->avtar,true);
		$criteria->compare('fname',$this->fname,true);
		$criteria->compare('lname',$this->lname,true);
		$criteria->compare('mobile_no',$this->mobile_no,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('street',$this->street,true);
		$criteria->compare('address',$this->address,true);
                $criteria->compare('address_2',$this->address_2,true);
		$criteria->compare('city_id',$this->city_id,true);
                $criteria->compare('country_id',$this->country_id,true);
                $criteria->compare('pincode',$this->pincode,true);
                $criteria->compare('dob',$this->dob,true);
                $criteria->compare('gender',$this->gender,true);
                $criteria->compare('curweight',$this->curweight,true);
                $criteria->compare('goalweight',$this->goalweight,true);
                $criteria->compare('height',$this->height,true);
                $criteria->compare('qid',$this->qid,true);
                $criteria->compare('status',$this->status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        public function checker($attribute,$params) {
            
            if (!empty($this->$attribute))
                    {
                         $pattern = '/^(?=.*[0-9]).{0,}$/';
                       if(is_numeric($this->$attribute))
                        {
                            $this->addError($attribute,'Please reconsider.Description must be a small introduction.');
                        }
                    }

	}
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return UserDetails the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        /**
         * Get the gender dropdown values
         */
        public function getGender(){
            
        }
         /**
     * Get Locality type dropdown
     */
    public function getlocalityDropDown()
	{
            $data['locations'] = CHtml::listData(UserDetails::model()->findAll(array('order'=>'street')), 'street', 'street');
            return $data['locations'];
                
	}
}
