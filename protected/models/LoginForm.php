<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class LoginForm extends CFormModel
{
	public $email;
	public $password;
	public $rememberMe;

	private $_identity;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			// username and password are required
			array('email, password', 'required'),
                        array('email', 'email','message'=>'Please enter a valid email address.'),
			// rememberMe needs to be a boolean
			array('rememberMe', 'boolean'),
			// password needs to be authenticated
			array('password', 'authenticate'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'rememberMe'=>'Check me out',
                        'email'=>'Email Address',
                 );
	}
            public function authenticate($attribute,$params)
                {
                    if(!$this->hasErrors())
                    {
                        $this->_identity=new UserIdentity($this->email,$this->password);
                        if(!$this->_identity->authenticate())
                        {
                            if(($this->_identity->errorCode == 1) or ($this->_identity->errorCode == 2))
                                $this->addError('password',Yii::t('zii','Incorrect Password!'));
                            elseif($this->_identity->errorCode ==3)
                                $this->addError('email',Yii::t('zii','Account is currently not active'));
                            else
                                $this->addError('email',Yii::t('zii','This email is not registered with gympik, please register or login with Facebook credentials.'));
                        }
                    }
                }
	/**
	 * Authenticates the password.
	 * This is the 'authenticate' validator as declared in rules().
	 
	public function authenticate($attribute,$params)
	{
		if(!$this->hasErrors())
		{
			$this->_identity=new UserIdentity($this->email,$this->password);
                        
			if($this->_identity->authenticate())
				$this->addError('email','Invalid email.');
//                            $this->addError('password','Incorrect username or password.');
		}
	}
*/
	/**
	 * Logs in the user using the given username and password in the model.
	 * @return boolean whether login is successful
	 */
	public function login()
	{
		if($this->_identity===null)
		{
                    
			$this->_identity=new UserIdentity($this->email,$this->password);
                        $this->_identity->authenticate();
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
