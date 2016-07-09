<?php

/**
 * This is the model class for table "gp_trainer_details".
 *
 * The followings are the available columns in table 'gp_trainer_details':
 * @property integer $id
 * @property integer $user_id
 * @property integer $type_id
 * @property string $fname
 * @property string $lname
 * @property string $mobile
 * @property string $description
 * @property string $address
 * @property string $address_2
 * @property string $home
 * @property string $street
 * @property integer $city_id
 * @property string $area
 * @property integer $pincode
 * @property string $country_id
 * @property string $homephone
 * @property string $dob
 * @property integer $gender
 * @property string $emp_1
 * @property string $emp_2
 * @property integer $exp_1
 * @property integer $exp_2
 * @property integer $tot_exp
 * @property integer $fees
 * @property string $certification_1
 * @property string $certification_2
 * @property string $edu_1
 * @property string $edu_2
 * @property integer $grp_active
 * @property string $fb_link
 * @property integer $status
 * @property string $log
 * @property string $avtar
 */
class TrainerDetails extends CActiveRecord
{
    
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'gp_trainer_details';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, type_id, fname, lname,mobile, gender,', 'required'),
                        array('user_id, type_id, fname, lname, mobile', 'required', 'on'=>'trainercreate'),
                        array('user_id, fname, lname, gender, address,address_2,street,pincode,city_id,country_id,dob','required', 'on'=>'profile'),
                        array('second_type_id,exp_1, tot_exp, emp_1, fees, grp_active, gender, fees,certification_1,edu_1','required', 'on'=>'details'),
			array('user_id, type_id, city_id, mobile,pincode, gender, exp_1, exp_2, tot_exp, fees, grp_active, status', 'numerical', 'integerOnly'=>true),
			array('fname, lname, address, address_2, home, street, area,certification_1, certification_2, edu_1, edu_2, fb_link, avtar', 'length', 'max'=>255),
			array('mobile, homephone', 'length', 'max'=>20),
			array('country_id', 'length', 'max'=>11),
			array('log', 'length', 'max'=>10),
                        array('fb_link', 'url','defaultScheme' => 'http'),
                        array('fees', 'length', 'min'=>3,'on'=>'details'),
                        array('description', 'length', 'min'=>100,'on'=>'profile'),
			array('description,emp_2,avtar', 'safe'),
                        array('avtar', 'safe','on'=>'profile'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_id, type_id,second_type_id, fname, lname, mobile, description, address, address_2, home, street, city_id, area, pincode, country_id, homephone, dob, gender, emp_1, emp_2, exp_1, exp_2, tot_exp, fees, certification_1, certification_2, edu_1, edu_2, grp_active, fb_link, status, log, avtar', 'safe', 'on'=>'search'),
                    array('id, user_id, type_id,second_type_id, fname, lname, mobile, description, address, address_2, home, street, city_id, area, pincode, country_id, homephone, dob, gender, emp_1, emp_2, exp_1, exp_2, tot_exp, fees, certification_1, certification_2, edu_1, edu_2, grp_active, fb_link, status, log, avtar', 'safe', 'on'=>'Adminsearch'),
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
                        'primary_type' => array(self::BELONGS_TO, 'TrainerType', 'type_id'),
                        'sec_type' => array(self::BELONGS_TO, 'TrainerType', 'second_type_id'),
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
			'type_id' => 'Type',
                        'second_type_id' => 'Secondary Skills',
			'fname' => 'First Name',
			'lname' => 'Last Name',
			'mobile' => 'Mobile No.',
			'description' => 'Description',
			'address' => 'Address 1',
			'address_2' => 'Address 2',
			'home' => 'Home',
			'street' => 'Locality',
			'city_id' => 'City',
			'area' => 'Area*',
			'pincode' => 'Pincode',
			'country_id' => 'Country',
			'homephone' => 'Homephone',
			'dob' => 'Dob',
			'gender' => 'Gender',
			'emp_1' => 'Employer 1',
			'emp_2' => 'Employer 2',
			'exp_1' => 'Year Experience',
			'exp_2' => 'Year Experience',
			'tot_exp' => 'No. of Year Exp.',
			'fees' => 'Consultation Fee',
			'certification_1' => 'Certifications',
			'certification_2' => '',
			'edu_1' => 'Education*',
			'edu_2' => '',
			'grp_active' => 'Ready for Group Activities ',
			'fb_link' => 'Facebook Link',
			'status' => 'Status',
			'log' => 'Log',
			'avtar' => 'Avtar',
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
		$criteria->compare('type_id',$this->type_id);
                $criteria->compare('second_type_id',$this->second_type_id);
		$criteria->compare('fname',$this->fname,true);
		$criteria->compare('lname',$this->lname,true);
		$criteria->compare('mobile',$this->mobile,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('address_2',$this->address_2,true);
		$criteria->compare('home',$this->home,true);
		$criteria->compare('street',$this->street,true);
		$criteria->compare('city_id',$this->city_id);
		$criteria->compare('area',$this->area,true);
		$criteria->compare('pincode',$this->pincode);
		$criteria->compare('country_id',$this->country_id,true);
		$criteria->compare('homephone',$this->homephone,true);
		$criteria->compare('dob',$this->dob,true);
		$criteria->compare('gender',$this->gender);
		$criteria->compare('emp_1',$this->emp_1,true);
		$criteria->compare('emp_2',$this->emp_2,true);
		$criteria->compare('exp_1',$this->exp_1);
		$criteria->compare('exp_2',$this->exp_2);
		$criteria->compare('tot_exp',$this->tot_exp);
		$criteria->compare('fees',$this->fees);
		$criteria->compare('certification_1',$this->certification_1,true);
		$criteria->compare('certification_2',$this->certification_2,true);
		$criteria->compare('edu_1',$this->edu_1,true);
		$criteria->compare('edu_2',$this->edu_2,true);
		$criteria->compare('grp_active',$this->grp_active);
		$criteria->compare('fb_link',$this->fb_link,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('log',$this->log,true);
		$criteria->compare('avtar',$this->avtar,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        public function Adminsearch()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		
		$criteria->compare('fname',$this->fname,true);
		$criteria->compare('lname',$this->lname,true);
		$criteria->compare('mobile',$this->mobile,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('address_2',$this->address_2,true);
		$criteria->compare('home',$this->home,true);
		$criteria->compare('street',$this->street,true);
		$criteria->compare('city_id',$this->city_id);
		$criteria->compare('area',$this->area,true);
		$criteria->compare('pincode',$this->pincode);
		$criteria->compare('country_id',$this->country_id,true);
		$criteria->compare('homephone',$this->homephone,true);
		$criteria->compare('dob',$this->dob,true);
		$criteria->compare('gender',$this->gender);
		$criteria->compare('emp_1',$this->emp_1,true);
		$criteria->compare('emp_2',$this->emp_2,true);
		$criteria->compare('exp_1',$this->exp_1);
		$criteria->compare('exp_2',$this->exp_2);
		$criteria->compare('tot_exp',$this->tot_exp);
		$criteria->compare('fees',$this->fees);
		$criteria->compare('certification_1',$this->certification_1,true);
		$criteria->compare('certification_2',$this->certification_2,true);
		$criteria->compare('edu_1',$this->edu_1,true);
		$criteria->compare('edu_2',$this->edu_2,true);
		$criteria->compare('grp_active',$this->grp_active);
		$criteria->compare('fb_link',$this->fb_link,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('log',$this->log,true);
		$criteria->compare('avtar',$this->avtar,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TrainerDetails the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
    /**
     * Get Locality type dropdown
     */
    public function getlocalityDropDown()
	{
            $data['locations'] = CHtml::listData(TrainerDetails::model()->findAll(array('order'=>'street')), 'street', 'street');
            return $data['locations'];
                
	}
        /**
     * Get Trainer type dropdown
     */
    public function gettrainerDropDown()
	{
            $data['locations'] = CHtml::listData(TrainerType::model()->findAll(array('order'=>'type_name')), 'id', 'type_name');
            return $data['locations'];
                
	}
        public function trainsearch(){
           	if($_POST &&  Yii::app()->request->isAjaxRequest)
		{
                   
			$type = $_POST['search_type_id'];
			$gender = $_POST['gender'];
                        $street = $_POST['street'];
                        $city = $_POST['city_id'];
                        //Yii::app()->session['city'] = $_POST['city_id'];
                        
                        $criteria=new CDbCriteria;
                        $criteria->compare('id',$this->id);
                        $criteria->compare('type_id',$type, false, 'OR');
                        $criteria->compare('second_type_id',$type, false, 'OR');
                        $criteria->compare('city_id',$city, false,'AND');
                        $criteria->compare('street',$street,true, 'OR');
                        $criteria->compare('status',1,false,'AND');
                        if($gender == 2){  }else{
                             $criteria->compare('gender',$gender);
                        }
                        if ($criteria){ 
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                        'pagination'=>array('pageSize'=>6),
		));}
               
		}
		else 
		{
                    $criteria=new CDbCriteria;
                        $cityy = Yii::app()->session['city'];
                        $type = Yii::app()->session['type_id'];
			$gender = Yii::app()->session['gender'];
                        $street =  Yii::app()->session['street'] ;
                        if($cityy == 999999){ 
                                    $criteria->compare('type_id',$type, false, 'OR');
                                    $criteria->compare('second_type_id',$type, false, 'OR');
                                    $criteria->compare('street',$street,true, 'OR');
                                     if($gender == 2){  }else{
                                                $criteria->compare('gender',$gender);
                                           }
                                    $criteria->compare('status',1,false,'AND');
                                    return new CActiveDataProvider($this, array(
                                    'criteria'=>$criteria,
                                        'pagination'=>array('pageSize'=>6),
                                    ));
                                    
                        }
                        $criteria->compare('type_id',$type, false, 'OR');
                        $criteria->compare('second_type_id',$type, false, 'OR');
                        $criteria->compare('city_id',$cityy, false,'AND');
                        $criteria->compare('street',$street,true, 'OR');
                         if($gender == 2){  }else{
                             $criteria->compare('gender',$gender);
                        }
                        $criteria->compare('status',1,false,'AND');
//                        echo '<pre>';
//                        print_r($criteria);
//
//                        echo '</pre>';
                        return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                            'pagination'=>array('pageSize'=>6),
		));
		}
        }
        
}
