<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
        const ERROR_USERNAME_NOT_ACTIVE = 3;
        private $_id;
	public function authenticate()
	{
            $ctiteria = new CDbCriteria;
		$ctiteria->condition = "email = '".$this->username."' OR username = '".$this->username."'";
                $records=Users::model()->findAll($ctiteria);
                $counter = count($records);
               if($counter == 1){
                   
                            if($records[0]===null)
                            $this->errorCode=self::ERROR_USERNAME_INVALID;
                                    else if ($records[0]->status != 1)
                                    $this->errorCode=self::ERROR_USERNAME_NOT_ACTIVE;

                            else if($records[0]->password !== md5($this->password))
                            $this->errorCode=self::ERROR_PASSWORD_INVALID;
                            else
                            { 
                                $this->_id = $records[0]->id;
                                $this->setState('title', $records[0]->email);
                                $this->errorCode=self::ERROR_NONE;
                            }
                            return !$this->errorCode;
                            }
        
                if($counter == 2){
                        foreach( $records as $record){
                            if($record->fb_id){ 
                                 /*$this->errorCode = 'Use your Fb login';
                                if($record===null)
                            $this->errorCode=self::ERROR_USERNAME_INVALID;
                                else if ($record->status != 1)
                                        $this->errorCode=self::ERROR_USERNAME_INVALID;

                        else if($record->password !== md5($this->password))
                            $this->errorCode=self::ERROR_PASSWORD_INVALID;
                        else
                        {
                            $this->_id = $record->id;
                            $this->setState('title', $record->email);
                            $this->setState('facebookauthenticate', '1');
                            $this->errorCode=self::ERROR_NONE;
                        }
                        return $this->errorCode;*/
                            }else{
                        if($record===null)
                            $this->errorCode=self::ERROR_USERNAME_INVALID;
                                else if ($record->status != 1)
                                        $this->errorCode=self::ERROR_USERNAME_INVALID;

                        else if($record->password !== md5($this->password))
                            $this->errorCode=self::ERROR_PASSWORD_INVALID;
                        else
                        {
                            $this->_id = $record->id;
                            $this->setState('title', $record->email);
                            $this->errorCode=self::ERROR_NONE;
                        }
                        return !$this->errorCode;
                            }
                        }
                        }
        
        }
	public function getId()
	{
	    return $this->_id;
	}
}