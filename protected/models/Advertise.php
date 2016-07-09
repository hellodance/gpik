<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class Advertise extends CFormModel
{
	public $fname;
        public $lname;
	public $email;
	public $telephone;
        public $mobile;
        public $company;
        public $website;
        public $comment;
	public $verifyCode;

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
                        
			// name, email, subject and body are required
			array('fname,lname, email,company,mobile', 'required'),
			// email has to be a valid email address
			array('email', 'email'),
                        array('comment', 'length', 'max'=>180),
                        array('telephone,mobile', 'numerical', 'integerOnly'=>true),
                        array('telephone,mobile', 'length', 'max'=>16),
                        array('mobile', 'length', 'min'=>10),
                        array('telephone', 'length', 'min'=>7),
                        array('website', 'url', 'defaultScheme' => 'http'),
                        // verifyCode needs to be entered correctly
			//array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
		);
	}

	/**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
	public function attributeLabels()
	{
		return array(
			'verifyCode'=>'Verification Code',
                        'fname'=>'First Name',
                        'lname'=>'Last Name',
                        'telephone'=>'Telephone',
                        'comment'=>'Additional Comments'
		);
	}
        //custom function 
                public function num_required($attribute_name,$params){
                     if(empty($this->telephone) && empty($this->mobile)){
                             $this->addError('mobile',
                                 'Please enter Telephone number or Mobile number');
                     }
                }
}