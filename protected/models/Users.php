<?php

/**
 * This is the model class for table "gp_users".
 *
 * The followings are the available columns in table 'gp_users':
 * @property integer $id
 * @property integer $mas_role_id
 * @property integer $trainer_id
 * @property integer $featured
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $activation_key
 * @property integer $status
 * @property string $log
 */
class Users extends CActiveRecord
{
        public $username;
	
	public $rememberMe;

	private $_identity;
    // hold the password confirmation
    public $repeat_password;
    //will hold the encrypted password for update actions.
    public $initialPassword;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'gp_users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('email,password', 'required'),
                        array('email','email'),
                        array('email', 'unique','message'=>'An account is already registered with this e-mail'),
//                        array('email', 'unique','on'=>'usercreate'),
                        array('repeat_password', 'safe'),
                        //array('repeat_password','required', 'on'=>'insert'),
                        array('password','length', 'min'=>8 ),
                        array('repeat_password', 'compare', 'compareAttribute'=>'password','on'=>'usercreate'),
                        array('repeat_password', 'compare', 'compareAttribute'=>'password','on'=>'TrainersCreate'),
//                        array('repeat_password', 'compare', 'compareAttribute'=>'password',),
			array('mas_role_id, trainer_id,mobile, featured, status', 'numerical', 'integerOnly'=>true),
			array('username, email, password, activation_key, log', 'length', 'max'=>255),
                       
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
                        array('id,userdetail, mas_role_id, fb_id, trainer_id, featured, username, email,mobile, password, activation_key, status, log', 'safe', 'on'=>'search'),
//                      array('id, mas_role_id, fb_id, trainer_id, featured, username, email,mobile, password, activation_key, status, log', 'safe', 'on'=>'search'),
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
			'masrole' => array(self::BELONGS_TO, 'Masroles', 'mas_role_id'),
			'userdetail' =>array(self::HAS_ONE, 'UserDetails','user_id'),
                        'trainerdetail' =>array(self::HAS_ONE, 'TrainerDetails','user_id'),
                );
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'mas_role_id' => 'Mas Role',
			'trainer_id' => 'Trainer',
                        'fb_id' => 'FB Id',
			'featured' => 'Featured',
			'username' => 'Username',
			'email' => 'Email',
                        'mobile' => 'Mobile',
			'password' => 'Password',
                        'repeat_password' => 'Confirm Password',
			'activation_key' => 'Activation Key',
			'status' => 'Status',
			'log' => 'Log',
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
		$criteria->compare('mas_role_id',$this->mas_role_id);
		$criteria->compare('trainer_id',$this->trainer_id);
                $criteria->compare('fb_id',$this->fb_id);
		$criteria->compare('featured',$this->featured);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('email',$this->email,true);
                $criteria->compare('mobile',$this->mobile,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('activation_key',$this->activation_key,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('log',$this->log,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        public function adminsearch()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
                $criteria->with=array('userdetail');
		$criteria->compare('id',$this->id);
		$criteria->compare('mas_role_id',3);
		$criteria->compare('trainer_id',$this->trainer_id);
                $criteria->compare('fb_id',$this->fb_id);
		$criteria->compare('featured',$this->featured);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('email',$this->email,true);
                $criteria->compare('mobile',$this->mobile,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('activation_key',$this->activation_key,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('log',$this->log,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Users the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        /**
	 * Logs in the user using the given username and password in the model.
	 * @return boolean whether login is successful
	 */
	public function fblogin($id,$token)
	{
		if($this->_identity===null)
		{
                        $model = Users::model()->findByPk($id);
                        $username = $model->email;
                        
                        $identity =new facebookIdentity($username,$token);
			if($identity->authenticate())
                        {
                            Yii::app()->user->login($identity);
                        }else{ throw new CHttpException(402, 'Authentication Error!'); }
		}
		if($this->_identity->errorCode===UserIdentity::ERROR_NONE)
		{
			$duration=$this->rememberMe ? 3600*24*30 : 0; // 30 days
			Yii::app()->user->login($this->_identity,$duration);
			return true;
		}
		else
			return false;
	}
      
}
