<?php
/**
 * based on FB docs and 
 * http://rijitechsolutions.com
 * @author Sudhanshu Saxena
 * @copyright 2013 Sudhanshu saxena
 * @package fb.identity
 */
class facebookIdentity extends CBaseUserIdentity
{
        private $handshake_code = null;
        private $return_url = null;
        private $_id;
        private $access_token = null;   
        private $fb_data = array();
        
        public $fb_id;
        public $fb_name;        
        
        /**
         * creates an instance. Requires handshake code
         * provided from Facebook at handshake initialization
         */
        public function __construct($handshakeCode, $token)
        {
                $this->handshake_code = $handshakeCode;         
                $this->return_url = $token;
        }
        
        public function getId()
        {
                return $this->fb_id;    
        }
        
        public function getName()
        {
                return $this->fb_name;  
        }
        public function getData()
        {
                return $this->fb_data; 
        }
        public function authenticate()
        {       
                // needed for logout    
                Yii::app()->user->setState("__fb_handshake_code", $this->handshake_code);
                 $response = Yii::app()->facebook->api('/me') ;
                if (empty($response))                   
                        throw new CHttpException(500, 'Internal Server Error!');
                $data = json_decode(json_encode($response), FALSE);
                $user= Users::model()->findByAttributes(array('fb_id'=>$data->id));
                $this->fb_id = $data->id;   
                
                $this->fb_data = $data;
                $this->fb_name = $data->name;
                //$this->setState('fbname', $data->name);                         
                Yii::app()->user->setState('fbname', $data->name); 
                Yii::app()->user->setState('id', $user->id); 
                //$this->__set('fbname', $data->name);     
                if (!empty($this->fb_id) && ($this->fb_id > 0))
                {                
                    
                        $this->errorCode=self::ERROR_NONE;                      
                }
        else
            $this->errorCode=self::ERROR_UNKNOWN_IDENTITY;
        
                    
        
                return !$this->errorCode;
        }
     
}