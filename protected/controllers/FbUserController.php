<?php
/**
 * @author Sudhanshu Saxena
 * @copyright 2013 Sudhanshu Saxena
 * @package fb.core.user
 */
class FbUserController extends Controller 
{       
        public function actionIndex()
        {
                $this->redirect(
                        "https://graph.facebook.com/oauth/authorize" 
                        ."?type=web_server"
                        ."&redirect_uri=".Yii::app()->params['FB_HANDSHAKE_URL']
                        ."&client_id=".Yii::app()->params['FB_APP_ID']
                );
        }
        
        /**
         * action called by Facebook, after the user accepted the application
         */
        public function actionHandshake()
        {
                if (!isset($_REQUEST['code']))
                {
                        if (isset($_REQUEST['error_description']))
                                $error = $_REQUEST['error_description'];
                        else
                                $error = "Auth error";
                        throw new CHttpException(403, $error);
                }
                        
                        
                $identity = new FbUserIdentity($_REQUEST['code'], Yii::app()->params['FB_HANDSHAKE_URL']);
                
                if ($identity->authenticate()) 
                {       $code = $_REQUEST['code'];
                        $data = $identity->getData();
//                        echo '<pre>';
//                        print_r($data);die;
                        $model=new Users;
                        
				$model->attributes = $data;
				//$model->attributes=$_POST['UserRegister'];
                                $model->username =  $data->username;
                                $model->email = $data->email;
                                $model->fb_id = $data->id;
				$password = '123';
				$model->password = md5($password);
				$userrole = Masroles::model()->findByAttributes(array('name'=>'User'));
				$model->mas_role_id = $userrole->id;
				$model->activation_key = $code;
				$model->status = 0;
				$model->trainer_id = 0;
                                $model->featured = 0;
                                
				/* Code from Activation link start here
				$user->status = 1;
				$user->activation_key = 0;
				$user->mas_role_id = 2;
				$user->trainer_id = 0;
                                 */
                                if($model->save(false)){
                                /**
                                 * Code for sending welcome Mail 
                                 */
                                $model_emailtemplate	=	Emailtemplate::model()->findByPk(1);
									$body		=	$model_emailtemplate->body;
									$message 	= 	new YiiMailMessage;
									$register_body	=	$body;
									$register_body	=	str_replace('$user', $data->name, $register_body);
									$create_registerbody	=	'<div>Welcome and thank you for joining Gympic.</div>
				
																	<div>Your Activation URL:</div>
                                                                                                                                        <div><a href="http://localhost/gympic/site/fbactivate">Click to Activate</a></div>OR Copy the link/code below and run on your browser.
																	<br />
                                                                                                                                        http://localhost/gympic/site/fbactivate?code='.$code.'
																	<br />
																	<div>Your credentails are:</div>
																	<br />
																	<div><a href="http://localhost/gympic/site/login">http://localhost/gympic/site/login</a></div>
																	<div>Username: '.$data->username.'</div>
																	<div>Password: '.$password.'</div>
																	<br /><br /><br />
																	 
																	
																	
																	<div>Gympic is not only an Fitness tool but also a complete solution for your fitness.</div>
																	<br />
																	<div>What to do Next?</div>
																	<br />
																	<ol>
																	<li> Login to your admin area to control everything.  Go to settings tab and see what things can be controlled.</li>
																	
																	<li> Update your profile . </li>
																	
																	<li> Keep updating your daily schedules. </li>
																	
																	<li> Easy to understand and track your course. </li>
																	</ol>
																	<br />
																	<br />
																	
																	<div>And, yes, If you have any kind of questions, please feel free to contact us anytime at care@gympic.com</div>
																	
																	<div>Thanks for your support and if you like our service, please do not forget to tell your friend about us</div>';
									$register_body			=	str_replace('$body', $create_registerbody, $register_body);
									$register_body			=	str_replace('$site', 'Team Gympic', $register_body);
									
									$message = new YiiMailMessage;
									$message->setBody($register_body, 'text/html');
									$message->subject = 'Welcome to Gympic';
									$message->to = 'sudhanshu.s@rijitechsolutions.com';//$model->email;
									$message->from = 'marjss21@gmail.com';//Yii::app()->user->adminEmail();
                                                                        if(Yii::app()->mail->send($message)){
                                                                             Yii::app()->user->setFlash('success', "Account Created Successfully!.");
                                                                                    $this->redirect(Yii::app()->user->returnUrl);
                                                                                    }else{
                                                                                        Yii::app()->user->setFlash('error', "Username Or Email already exist!.");
                                                                                         $this->redirect(Yii::app()->user->returnUrl);
                                                                                    }
                                                                                    Yii::app()->user->setFlash('success', "Account Created Successfully!.");echo'not mailed';
                                                                                        $this->redirect(Yii::app()->user->returnUrl);
                                                                            
                                        
			}
		
                        Yii::app()->user->login($identity);
                        
                       // $this->redirect('/');
                }
        }
        /**
	 *Create random string for activation key
	 * @param integer $id the ID of the model to be displayed
	 */
	private function createRandomString() {
		$chars = "abcdefghijkmnopqrstuvwxyz023456789";
		srand((double)microtime()*1000000);
		$i = 0;
		$pass = '' ;
		while ($i <= 19)
		{
		    $num = rand() % 33;
		    $tmp = substr($chars, $num, 1);
		    $pass = $pass . $tmp;
		    $i++;
		}
		return $pass;
        }
        
}