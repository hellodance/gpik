<?php
/**
 * based on FB docs and 
 * http://rijitechsolutions.com
 * @author Sudhanshu Saxena
 * @copyright 2013 Sudhanshu saxena
 * @package fb.identity
 */
class FbUserIdentity extends CBaseUserIdentity
{
        private $handshake_code = null;
        private $return_url = null;
        
        private $access_token = null;   
        private $fb_data = array();
        
        public $fb_id;
        public $fb_name;        
        
        /**
         * creates an instance. Requires handshake code
         * provided from Facebook at handshake initialization
         */
        public function __construct($handshakeCode, $returnUrl)
        {
                $this->handshake_code = $handshakeCode;         
                $this->return_url = $returnUrl;
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
                
                $url = "https://graph.facebook.com/oauth/access_token"
                ."?client_id=".Yii::app()->params['FB_APP_ID']
                ."&redirect_uri={$this->return_url}"
                ."&client_secret=".Yii::app()->params['FB_SECRET_KEY']
                ."&code=".$this->handshake_code;
                
                $response = file_get_contents($url);
                if (empty($response))                   
                        throw new CHttpException(500, 'Problem in Authorization!');
                $response = str_replace("access_token=","", $response);
                
                $this->access_token = $response;
                
                
                // retrieve user ID
                $url = "https://graph.facebook.com/me?access_token=".$response;
                $response = file_get_contents($url);
                if (empty($response))                   
                        throw new CHttpException(500, 'Internal Server Error!');
                        
                $data = json_decode($response);
                $this->fb_id = $data->id;               
                $this->fb_data = $data;
                $this->fb_name = $data->name;
                $this->setState('fbname', $data->name);                         
                
                if (!empty($this->fb_id) && ($this->fb_id > 0))
                {                                       
                        $this->errorCode=self::ERROR_NONE;                      
                }
        else
            $this->errorCode=self::ERROR_UNKNOWN_IDENTITY;
        
                    
        
                return !$this->errorCode;
        }
}