<?php

class UsersController extends Controller
{
    public $avatarPath = 'avtar';
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters(){
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}
        /**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules(){
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','create','trainercreate','activate'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create',
                                    'update',
                                    'firstprofile',
                                    'avtarupload',
                                    'saveprofile',
                                    'medicalprofile',
                                    'trainerprofile',
                                    'savetrainerprofile',
                                    'traindashboard',
                                    'userdashboard',
                                    'DeleteCardioworkout',
                                    'DeleteFoodintake',
                                    'Randomquote',
                                    'Randomfoodquote',
                                    'EditFirstprofile',
                                    'edittrainerprofile',
                                    'Editworkout',
                                    'Editfood',
                                    ),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
        /**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id){
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
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
        /**
         * User Activation Code
         */
        public function actionActivate(){
		$ackkey = $_REQUEST['act_key'];
		$user = Users::model()->findByAttributes(array('activation_key'=>$ackkey));
		
		if($user == null){
			throw new CHttpException(404,'You are not authorize to acess this page.');
		}else{
                    	$user->status = 1;
			$user->activation_key = 0;
                        if($user->save(false)){
			$userdetails = TrainerDetails::model()->findByAttributes(array('user_id'=>$user->id));
                        if($userdetails->updateByPk($userdetails->id, array('status'=>1))){
                         Yii::app()->user->setFlash(TbHtml::ALERT_COLOR_SUCCESS,'<strong>Congratulations!</strong> Account activated successfully.You can now Sign-in to your account.');
                            $this->redirect(array('site/index'));  
                         //$this->redirect(array('users/firstprofile','id'=>$user->id));
                            }
                        }
                          
            }
            Yii::app()->user->setFlash(TbHtml::ALERT_COLOR_ERROR,'<strong>Oh Snap!</strong> An Error occured.');
             $this->redirect(array('site/index'));
        }
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'FirstProfile' page.
	 */
	public function actionCreate(){
		$model=new Users('usercreate');
                $details = new UserDetails;
                $code = $this->createRandomString();
		// Uncomment the following line if AJAX validation is needed
		    if(isset($_POST['ajax']) && $_POST['ajax']==='users-form')
                    {
                      echo CActiveForm::validate(array($model, $details));
                      Yii::app()->end();
                    }
		if (isset($_POST['Users'])) {
                    $model->attributes=$_POST['Users'];
                            if($model->validate()){
                                    if (isset($_POST['istrainer'])){
                                       $model->activation_key = $code;
                                       $model->mas_role_id = 2;
                                       $model->trainer_id = 0;
                                       $model->username = $_POST['Users']['email'];
                                       $model->password = md5($_POST['Users']['password']);
                                           if ($model->save(false)) {
                                           //$details = new TrainerDetails;
                                           $details = new TrainerDetails('trainercreate');
                                           $details->setScenario('trainercreate');
                                             
                                           //$details->attributes=$_POST['UserDetails'];
                                           $details->fname= $_POST['UserDetails']['fname'];
                                           $details->lname= $_POST['UserDetails']['lname'];
                                           $details->mobile = $_POST['UserDetails']['mobile_no'];
                                           $details->type_id = $_POST['type_id'];
                                           $details->user_id = $model->id;
                                               if ($details->save(false))  {
                                               /**
                                                * Code for sending welcome Mail 
                                                */
                                               $model_emailtemplate	=	Emailtemplate::model()->findByPk(4);
                                                                                   $body		=	$model_emailtemplate->body;
                                                                                   $message 	= 	new YiiMailMessage;
                                                                                   $register_body	=	$body;
                                                                                   $register_body	=	str_replace('$name', $details->fname, $register_body);
                                                                                   $register_body	=	str_replace('$act_url', Yii::app()->params["siteUrl"].'/site/activate?act_key='.$code, $register_body);
                                                                                   $register_body	=	str_replace('$key_url', Yii::app()->params["siteUrl"].'/site/activate?act_key='.$code, $register_body);
                                                                                   $register_body	=	str_replace('$username', $model->email, $register_body);
                                                                                   $register_body	=	str_replace('$password', $_POST['Users']['password'], $register_body);
                                                                                   $message = new YiiMailMessage;
                                                                                   $message->setBody($register_body, 'text/html');
                                                                                   $message->subject = 'Welcome to Gympik';
                                                                                   $message->to = $model->email;//'sudhanshu.s@rijitechsolutions.com';
                                                                                   $message->from = 'test@area51.co.in';//Yii::app()->user->adminEmail();''contact@gympik.com ;
                                                                                   if(Yii::app()->mail->send($message)){
                                                                                       $message2 = new YiiMailMessage;
                                                                                       $message2->setBody($register_body, 'text/html');
                                                                                       $message2->subject = 'Welcome to Gympik';
                                                                                       $message2->to = 'ajay.pandey@gympik.com';
                                                                                       $message2->from = 'contact@gympik.com';//Yii::app()->user->adminEmail();
//                                                                                       Yii::app()->mail->send($message2);
                                                                                           Yii::app()->user->setFlash(TbHtml::ALERT_COLOR_SUCCESS,
                                                                                                                       '<strong>Registration Successful.</strong>Please check your email, including junk and spam folders, for activation link.');
                                                                           //$this->redirect(array('view','id'=>$model->id));
                                                                           //$this->redirect(Yii::app()->user->returnUrl);
                                                                            $this->redirect(array('site/index'));
                                                                           }else{ Yii::app()->user->setFlash(TbHtml::ALERT_COLOR_ERROR,'<strong>Account Created Successfully!</strong> Cannot send activation code due to invalid mail. ');
                                                                                        $this->redirect(Yii::app()->user->returnUrl); }
                                   }
                                       }


                       } else{    
                                           $model->activation_key = $code;
                                           $model->mas_role_id = 3;
                                           $model->trainer_id = 0;
                                           $model->username = $_POST['Users']['email'];
                                           $model->password = md5($_POST['Users']['password']);
                                            if ($model->save(false)) {
                                                $details = new UserDetails;
                                                //$details->attributes=$_POST['UserDetails'];
                                                $details->fname= $_POST['UserDetails']['fname'];
                                                $details->lname= $_POST['UserDetails']['lname'];
                                                $details->mobile_no = $_POST['UserDetails']['mobile_no'];
                                                $details->user_id = $model->id;
                                                if ($details->save(false)) {
                                                    /**
                                                     * Code for sending welcome Mail 
                                                     */
                                                   $model_emailtemplate	=	Emailtemplate::model()->findByPk(2);
                                                                                            $body		=	$model_emailtemplate->body;
                                                                                            $message 	= 	new YiiMailMessage;
                                                                                            $register_body	=	$body;
                                                                                            $register_body	=	str_replace('$name', $details->fname, $register_body);
                                                                                            $register_body	=	str_replace('$act_url', Yii::app()->params["siteUrl"].'/site/activate?act_key='.$code, $register_body);
                                                                                            $register_body	=	str_replace('$key_url', Yii::app()->params["siteUrl"].'/site/activate?act_key='.$code, $register_body);
                                                                                            $register_body	=	str_replace('$username', $model->email, $register_body);
                                                                                            $register_body	=	str_replace('$password', $_POST['Users']['password'], $register_body);
                                                                                            $message = new YiiMailMessage;
                                                                                            $message->setBody($register_body, 'text/html');
                                                                                            $message->subject = 'Welcome to Gympik';
                                                                                            $message->to = $model->email;
                                                                                            $message->from = 'contact@gympik.com';
                                                                                            if(Yii::app()->mail->send($message)){
                                                                                                Yii::app()->user->setFlash(TbHtml::ALERT_COLOR_SUCCESS,'<strong>Registration Successful.</strong> Please check your email, including junk and spam folders, for activation link.');
                                                                                                 $this->redirect(Yii::app()->user->returnUrl);
                                                                                                        }else{Yii::app()->user->setFlash(TbHtml::ALERT_COLOR_ERROR,'<strong>Registration Successful!</strong> Cannot send activation code due to invalid mail. ');
                                                                                                 $this->redirect(Yii::app()->user->returnUrl);}



                                                }
                                            }
                                        }
                                    }
		//$this->render('create',array(	'model'=>$model,));
            }
               
            Yii::app()->user->setFlash(TbHtml::ALERT_COLOR_ERROR,'<strong>Oh snap!</strong> Please fill the form correctly.');
          $this->redirect(array('site/index'));
        }
        /**
         * Medical form submission
         */
        public function actionMedicalProfile(){
            $model = new UserDetails('medical');
            /*
            if(isset($_POST['ajax']) && $_POST['ajax']==='medical-form')
                    {
                        
                      echo CActiveForm::validate(array($model));
                      Yii::app()->end();
                    }
                  
                                      $option = $_POST['UserDetails']['qid'];
                                        $id = Yii::app()->user->id;
                                        $pk = UserDetails::model()->findByAttributes(array('user_id'=>$id));
                                        $keys = array();
                                        if(!empty($option)){
                                        foreach($option as $opt){
                                            $keys[] = $opt;
                                                }
                                                $counter = count($keys);
                                                if($counter == 1){
                                                    echo 'joo'; exit;
                                               $optionval = implode(', ', $keys);
                                               UserDetails::model()->updateByPk( $pk->id, array('qid'=>$optionval));
                                               Yii::app()->user->setFlash(TbHtml::ALERT_COLOR_SUCCESS,'<strong>Great!</strong> Successfully Registered.');
                                                $this->redirect(array('firstprofile','id'=>Yii::app()->user->id));}
                                                else{
                                                     Yii::app()->user->setFlash(TbHtml::ALERT_COLOR_WARNING,
                                                                                            '<strong>Warning!</strong> Medical History Form is not filled .');
                                                                            $this->redirect(array('firstprofile','id'=>Yii::app()->user->id));
                                                }
                                                // $this->redirect(Yii::app()->user->returnUrl);
                                            }
                                   
           
            
            else{     
                 Yii::app()->user->setFlash(TbHtml::ALERT_COLOR_WARNING,
                                '<strong>Warning!</strong> Medical History Form is not filled .');
                $this->redirect(array('firstprofile','id'=>Yii::app()->user->id));
            }
            */
            }
        /**
         * Save the user profile on first run pop-up form
         */
        public function actionSaveprofile(){
            $id= Yii::app()->user->id;
            
            $model = UserDetails::model()->findByAttributes(array('user_id'=>$id));
             if(isset($_POST['YII_CSRF_TOKEN']) )
                    {
                  
                   
            $avtar = $model->avtar;
            if (isset($_POST['UserDetails'])) {
                    
                    $model->attributes=$_POST['UserDetails'];
                    if($_FILES['UserDetails']['name']['avtar'] != ''){
                        $model->avtar = CUploadedFile::getInstanceByName('UserDetails[avtar]');
                            if ($model->avtar instanceof CUploadedFile) 
                                        {
                                        $imagename = $model->user_id . '_' . $_FILES['UserDetails']['name']['avtar'];
                                        $thumbimagename = 'avtar' .'/thumb/'.  $model->user_id . '_' . $_FILES['UserDetails']['name']['avtar'];
                                        $model->avtar->saveAs('avtar' .'/'.$imagename);
                                        copy('avtar'.'/'.$imagename,$thumbimagename);
                                        //list($width, $height, $type, $attr) = getimagesize($filename);
                                        $image = Yii::app()->image->load('avtar'.'/'.$imagename);
                                        $image->resize(200, 200,Image::HEIGHT);
                                        $image->save();
                                        $image = Yii::app()->image->load($thumbimagename);
                                        $image->resize(100, 110);
                                        $image->save();
                                        $model->avtar = $imagename;
                                        //Update the avtar on ajax calls
                                        if($model->updateByPk($model->id,array('avtar'=>$imagename))){
                                            return $model->avtar;
                                        }else{ }
                                        
					}
                    }else $model->avtar = $avtar;
                    $model->dob = date('Y/m/d H:i:s', strtotime($_POST['UserDetails']['dob']) );
                        if($model->validate()){
                            if ($model->save()) {
                                
                                     Yii::app()->user->setFlash(TbHtml::ALERT_COLOR_SUCCESS,'<strong>Great!</strong> Successfully Registered.');
                                    if(!empty($_POST['UserDetails']['qid'])) {
                                        
                                     $option = $_POST['UserDetails']['qid'];
                                        $id = Yii::app()->user->id;
                                        $pk = UserDetails::model()->findByAttributes(array('user_id'=>$id));
                                        $keys = array();
                                        if(!empty($option)){
                                        foreach($option as $opt){
                                            $keys[] = $opt;
                                                }
                                                
                                                $counter = count($keys);
                                                if($counter == 6){

                                                $optionval = implode(', ', $keys);
                                               UserDetails::model()->updateByPk( $pk->id, array('qid'=>$optionval));
                                               Yii::app()->user->setFlash(TbHtml::ALERT_COLOR_SUCCESS,'<strong>Great!</strong> Successfully Registered.');
                                                echo '{"UserDetails_qid":["success"]}';die;
                                               $this->redirect(array('firstprofile','id'=>Yii::app()->user->id));
                                                
                                                }
                                                else{
                                                    
                                                    echo '{"UserDetails_qid":["Some Question left blank."]}';
                                                    die;
                                                     Yii::app()->user->setFlash(TbHtml::ALERT_COLOR_WARNING,
                                                                                            '<strong>Warning!</strong> Medical History Form is not filled .');
                                                                                            $this->refresh();
                                                                            $this->redirect(array('firstprofile','id'=>Yii::app()->user->id));
                                                }
                                                // $this->redirect(Yii::app()->user->returnUrl);
                                    }
                                     //$this->redirect(Yii::app()->user->returnUrl);
                                    //$this->redirect(array('view','id'=>$model->id));
                                     $this->redirect('medicalprofile',array('qid'=>$_POST['UserDetails']['qid']));
                                     }
                                     /*else{
                                         echo '{"UserDetails_qid":["Some Question left blank."]}';
                                                    die;
                                     }*/
                                }else {  
                             Yii::app()->user->setFlash(TbHtml::ALERT_COLOR_ERROR,'<strong>Oh snap!</strong> Please fill the form correctly.');
                               $this->redirect(Yii::app()->user->returnUrl);    
                                }
                             }
             }
              echo CActiveForm::validate(array($model));
                        Yii::app()->end();
                        
                    }
                    
        }
        /**
         * Save the user Trainer profile on first run pop-up form
         */
        public function actionSaveTrainerprofile(){
           $id= Yii::app()->user->id;
           $model = TrainerDetails::model()->findByAttributes(array('user_id'=>$id));
           $avtar = $model->avtar;
            $model->setScenario('profile');
            if(isset($_POST['ajax']) && $_POST['ajax']==='trainer-profile-form')
                    {
                      echo CActiveForm::validate(array($model));
                      
                      Yii::app()->end();
                    }
            if (isset($_POST['TrainerDetails'])) {
                    
                    $model->attributes=$_POST['TrainerDetails'];
                    if($_FILES['TrainerDetails']['name']['avtar'] != ''){
                        $model->avtar = CUploadedFile::getInstanceByName('TrainerDetails[avtar]');
                            if ($model->avtar instanceof CUploadedFile) 
                                        {
                                 
                                        $imagename = $model->user_id . '_' . $_FILES['TrainerDetails']['name']['avtar'];
                                        $thumbimagename = 'avtar' .'/thumb/'.  $model->user_id . '_' . $_FILES['TrainerDetails']['name']['avtar'];
                                        $model->avtar->saveAs('avtar' .'/'.$imagename);
                                        copy('avtar' .'/'.$imagename,$thumbimagename);
                                        //list($width, $height, $type, $attr) = getimagesize($filename);
                                        $image = Yii::app()->image->load('avtar'.'/'.$imagename);
                                        $image->resize(200, 200,Image::HEIGHT);
                                        $image->save();
                                        $image = Yii::app()->image->load($thumbimagename);
                                        $image->resize(100, 110);
                                        $image->save();
                                        $model->avtar = $imagename;
                                        //Update the avtar on ajax calls
                                        if($model->updateByPk($model->id,array('avtar'=>$imagename))){
                                            return $model->avtar;
                                            $avtar = $model->avtar;
                                        }else{ }
                                        
					}
                    }
                    
                    $model->dob = date('Y/m/d H:i:s', strtotime($_POST['TrainerDetails']['dob']) );
                    if($model->validate()){ 
                        
                       $model->avtar = $avtar;
                           if ($model->save()) {
                               
                                    if($_POST['qid'] == 1) {
                                       
                                        $details = TrainerDetails::model()->findByAttributes(array('user_id'=>$id));     
                                        //var_dump$details->setScenario('details');
                                            $details->setScenario('details');
                                            $details->attributes=$_POST['TrainerDetails'];
                                            $details->status = 1;
                                            $details->avtar = $avtar;
                                                 if(isset($_POST['ajax']) && $_POST['ajax']==='trainer-details-form')
                                                    {
                                                      echo CActiveForm::validate(array($details));

                                                      Yii::app()->end();
                                                    }
                                                if ($details->save()) {
                                                        
//                                                            Yii::app()->user->setFlash(TbHtml::ALERT_COLOR_SUCCESS,'<strong>Great!</strong> Registration Process is now completed.');
                                                            echo '{"TrainerDetails_qid":["success"]}';die;
                                                            }
                                                            else{  echo CActiveForm::validate(array($details));
                                                                    Yii::app()->end(); 
                                                                 }
                                                            } 
                                                        
                                                }
                                            }
                           echo CActiveForm::validate(array($model));
                              Yii::app()->end();

                       }
         }
        /**
         * Run the trainer Profile Popup
         */
        public function actionTrainerProfile(){
            $id= Yii::app()->user->id;
             $this->layout ='profile';
            $model = Users::model()->findByPk($id);
            $details = TrainerDetails::model()->findByAttributes(array('user_id'=>$model->id));
            $this->render('trainerprofile',array('model'=>$model,'details'=>$details));
        }
        /**
         * Create the trainer Base Profile
         */
        public function actionTrainerCreate(){
            $model=new Users;
            $details = new TrainerDetails('trainercreate');
            $code = $this->createRandomString();
             if(isset($_POST['ajax']) && $_POST['ajax']==='trainer-details-form')
                    {
                      echo CActiveForm::validate(array($model, $details));
                      
                      Yii::app()->end();
                    }
            if (isset($_POST['Users'])) {
                    $model->attributes=$_POST['Users'];
                        if($model->validate()){
                            $model->activation_key = $code;
                            $model->mas_role_id = 2;
                            $model->trainer_id = 0;
                            $model->username = $_POST['Users']['email'];
                            $model->password = md5($_POST['Users']['password']);
                                if ($model->save(false)) {
                                //$details = new TrainerDetails;
                                $details->setScenario('trainercreate');
                                //$details->attributes=$_POST['UserDetails'];
                                $details->fname= $_POST['TrainerDetails']['fname'];
                                $details->lname= $_POST['TrainerDetails']['lname'];
                                $details->mobile = $_POST['TrainerDetails']['mobile'];
                                $details->type_id = $_POST['TrainerDetails']['type_id'];
                                $details->user_id = $model->id;
                                    if ($details->save(false))  {
                                    /**
                                     * Code for sending welcome Mail 
                                     */
                                    $model_emailtemplate	=	Emailtemplate::model()->findByPk(4);
									$body		=	$model_emailtemplate->body;
									$message 	= 	new YiiMailMessage;
                                                                        $register_body	=	$body;
									$register_body	=	str_replace('$name', $details->fname, $register_body);
                                                                        $register_body	=	str_replace('$act_url', Yii::app()->params["siteUrl"].'/site/activate?act_key='.$code, $register_body);
                                                                        $register_body	=	str_replace('$key_url', Yii::app()->params["siteUrl"].'/site/activate?act_key='.$code, $register_body);
                                                                        $register_body	=	str_replace('$username', $model->email, $register_body);
                                                                        $register_body	=	str_replace('$password', $_POST['Users']['password'], $register_body);
									$message = new YiiMailMessage;
									$message->setBody($register_body, 'text/html');
									$message->subject = 'Welcome to Gympik';
									$message->to = $model->email;//'sudhanshu.s@rijitechsolutions.com';
									$message->from = 'contact@gympik.com';//Yii::app()->user->adminEmail();'test@area51.co.in';
                                                                        if(Yii::app()->mail->send($message)){
                                                                            $message2 = new YiiMailMessage;
                                                                            $message2->setBody($register_body, 'text/html');
                                                                            $message2->subject = 'Welcome to Gympik';
                                                                            $message2->to = 'ajay.pandey@gympik.com';
                                                                            $message2->from = 'contact@gympik.com';//Yii::app()->user->adminEmail();
                                                                            Yii::app()->mail->send($message2);
                                                                                Yii::app()->user->setFlash(TbHtml::ALERT_COLOR_SUCCESS,
                                                                                                            '<strong>Registration Successful.</strong>Please check your email, including junk and spam folders, for activation link.');
                                                                //$this->redirect(array('view','id'=>$model->id));
                                                                //$this->redirect(Yii::app()->user->returnUrl);
                                                                 $this->redirect(array('site/index'));
                                                                }else{ Yii::app()->user->setFlash(TbHtml::ALERT_COLOR_ERROR,'<strong>Account Created Successfully!</strong> Cannot send activation code due to invalid mail. ');
                                                                             $this->redirect(Yii::app()->user->returnUrl); }
			}
                            }
                            
                        }
            }
             Yii::app()->user->setFlash(TbHtml::ALERT_COLOR_ERROR,'<strong>Oh snap!</strong> Please fill the form correctly.');
            $this->redirect(Yii::app()->user->returnUrl);
        }
        /**
         * Runs the User on first login
         */
        public function actionFirstprofile(){
            $id= Yii::app()->user->id;
            $this->layout ='profile';
            $model = Users::model()->findByPk($id);
            $details = UserDetails::model()->findByAttributes(array('user_id'=>$model->id));
            $this->render('firstprofile',array('model'=>$model,'details'=>$details));
        }
        /**
         * Runs the User on first login
         */
        public function actionEditFirstprofile(){
            $id= Yii::app()->user->id;
            $this->layout ='dashboard';
            $model = Users::model()->findByPk($id);
            $details = UserDetails::model()->findByAttributes(array('user_id'=>$model->id));
            $this->render('editprofile',array('model'=>$model,'details'=>$details));
        }
        /**
         * Runs the User on first login
         */
        public function actionEditTrainerProfile(){
            $id= Yii::app()->user->id;
            $this->layout ='dashboard';
            $model = Users::model()->findByPk($id);
            $details = TrainerDetails::model()->findByAttributes(array('user_id'=>$model->id));
            $this->render('edit_trainerprofile',array('model'=>$model,'details'=>$details));
        }
        /**
         * Upload the avatar to the user profile
         */
        public function actionAvtarupload(){
            $usermodel= new UserDetails;
            $id = Yii::app()->user->id;
            if(isset($_POST['UserDetails']))
		{
                    //Avtar image manipulation
                    $avtarimage = $usermodel->avtar;
                    $usermodel->attributes = $_POST['Users'];
//                   
			if($_FILES['UserDetails']['name']['avtar'] != '')
			{ 
                           
                            $usermodel->avtar = CUploadedFile::getInstanceByName('UserDetails[avtar]');
                                if ($usermodel->avtar instanceof CUploadedFile) 
                                        {
                                        $imagename = $usermodel->user_id . '_' . $_FILES['UserDetails']['name']['avtar'];
                                        $thumbimagename = 'avtar' .'/thumb/'.  $usermodel->user_id . '_' . $_FILES['UserDetails']['name']['avtar'];
                                        $usermodel->avtar->saveAs('avtar' .'/'.$imagename);
                                        copy('avtar' .'/'.$imagename,$thumbimagename);
                                        //list($width, $height, $type, $attr) = getimagesize($filename);
                                        $image = Yii::app()->image->load('avtar'.'/'.$imagename);
                                        $image->resize(200, 200,Image::HEIGHT);
                                        $image->save();
                                        $image = Yii::app()->image->load($thumbimagename);
                                        $image->resize(100, 110);
                                        $image->save();
                                        $usermodel->avtar = $imagename;
                                        $model = UserDetails::model()->findByAttributes(array('user_id'=>$id));
                                        //Update the avtar on ajax calls
                                        if($model->updateByPk($model->id,array('avtar'=>$imagename))){
                                            return $usermodel->avtar;
                                                }else{ return false;}
                                            }
                            }
			else
			{
				$usermodel->avtar = $avtarimage;
			}
                }
        }
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id){
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['Users'])) {
			$model->attributes=$_POST['Users'];
			if ($model->save()) {
				$this->redirect(array('view','id'=>$model->id));
			}
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}
        /**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id){
		if (Yii::app()->request->isPostRequest) {
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if (!isset($_GET['ajax'])) {
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
			}
		} else {
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		}
	}
        /**
	 * Lists all models.
	 */
	public function actionIndex(){
		$dataProvider=new CActiveDataProvider('Users');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}
        /**
	 * Manages all models.
	 */
	public function actionAdmin(){
		$model=new Users('search');
		$model->unsetAttributes();  // clear any default values
		if (isset($_GET['Users'])) {
			$model->attributes=$_GET['Users'];
		}

		$this->render('admin',array(
			'model'=>$model,
		));
	}
        /**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Users the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id){
		$model=Users::model()->findByPk($id);
		if ($model===null) {
			throw new CHttpException(404,'The requested page does not exist.');
		}
		return $model;
	}
        /**
	 * Performs the AJAX validation.
	 * @param Users $model the model to be validated
	 */
	protected function performAjaxValidation($model){
		if (isset($_POST['ajax']) && $_POST['ajax']==='users-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        /**
         * Render the trainers dashboard
         */
        public function actionTrainDashboard($id){
            $this->layout = 'dashboard';
            $users = '';
            $dietnotes = new Notes;
            $allworkouts = UserWorkouts::model()->findAll(array('condition'=>'user_id='.$id.' AND adddate BETWEEN date(NOW()) AND DATE_ADD(date(NOW()), INTERVAL 7 DAY) group by adddate')); 
            $clients = TrainerClients::model()->findAllByAttributes(array('trainer_id'=>$id)) ;
            $messages = TrainerClientMsg::model()->findAllByAttributes(array('to_receiver'=>Yii::app()->user->id));
            $events = Events::model()->findAll();
            foreach ($clients as $client){
                $users = UserDetails::model()->findAllByAttributes(array('user_id'=>$client->user_id));
                    foreach($users as $user){
                      $userdetails[]=$user;  
                    }
            }
            $this->render('trainerdashboard',array('usermessages'=>$messages,'dietnote'=>$dietnotes,'allworks'=>$allworkouts,'clients'=>$clients,'users'=>$userdetails,'events'=>$events));
        }
        /**
         * Render the Users dashboard
         */
        public function actionUserDashboard(){
            $this->layout = 'dashboard';
            $work  = new Worktype;
            $date = $date = date('Y-m-d 00:00:00');
            $measure = new UserMeasurements;
            $id = Yii::app()->user->id;
            $worknote = Notes::model()->findByAttributes(array('to'=>$id,'onto'=>2,'adddate'=>$date));
            $foodnote = Notes::model()->findByAttributes(array('to'=>$id,'onto'=>1,'adddate'=>$date));
            $workouts = UserWorkouts::model()->findByAttributes(array('user_id'=>$id));
            $allworkouts = UserWorkouts::model()->findAllByAttributes(array('user_id'=>$id),array('order'=>'adddate DESC'));
            $allfoods = UserFoodintake::model()->findAllByAttributes(array('user_id'=>$id),array('order'=>'adddate DESC'));
            $record = Users::model()->findByPk(Yii::app()->user->id);
            $userdetails = UserDetails::model()->findByAttributes(array('user_id'=>$record->id));
               /**Checking fields to be fully filled or not*/
               foreach ($userdetails->attributes as $k=>$v)
                                                            {
                                                              if (isset($k))
                                                              {
                                                              $arr[] = $v;
                                                            }
                                                         }
                                                          $counter1 = count(array_filter($arr));
                                                           if($counter1 < 16){
                                                               $this->redirect(array('users/firstprofile','id'=>$record->id));
                                                            }
              $this->render('userdashboard',array('work'=>$work,'allfoods'=>$allfoods,'allworks'=>$allworkouts,'worknote'=>$worknote,'foodnote'=>$foodnote,'workout'=>$workouts,'measure'=>$measure));
        }
        /**
         * Delete the particualr Workout of the user based on the primary key via workout dasboard grid.
         * @param integer $id Primary key of the particular workout
         */
        public function actionDeleteCardioworkout($id){
            if (Yii::app()->request->isPostRequest) {
			// we only allow deletion via POST request
                $model = UserWorkouts::model()->findByPk($id);
              
                $model->delete();
            }
        }
        /**
         * Delete the particualr Food intake of the user based on the primary key via foodintake dasboard grid.
         * @param integer $id Primary key of the particular food item
         */
        public function actionDeleteFoodintake($id){
            if (Yii::app()->request->isPostRequest) {
			// we only allow deletion via POST request
                $model = UserFoodintake::model()->findByPk($id);
                $model->delete();
            }
        }
        public function gridSet1Column($data,$row){
            if($data->set1 == ','){
                return 'N/A - N/A';
            }else{
                $dataset = explode(',', $data->set1);
                $setd1 =  $dataset[0] ==''?'N/A': $dataset[0];
                $setd2 =  $dataset[1] ==''?'N/A': $dataset[1];
               return $setd1.' - '.$setd2;
            }
        }
        public function gridSet2Column($data,$row){
            if($data->set2 == ','){
                return 'N/A - N/A';
            }else{
                $dataset2 = explode(',', $data->set2);
               $setd1 =  $dataset2[0] ==''?'N/A': $dataset2[0];
                $setd2 =  $dataset2[1] ==''?'N/A': $dataset2[1];
               return $setd1.' - '.$setd2;
            }
         }
        public function gridSet3Column($data,$row){
            if($data->set3 == ','){
                return 'N/A - N/A';
            }else{
                $dataset3 = explode(',', $data->set3);
               $setd1 =  $dataset3[0] ==''?'N/A': $dataset3[0];
                $setd2 =  $dataset3[1] ==''?'N/A': $dataset3[1];
               return $setd1.' - '.$setd2;
            }
        }
        public function gridSet4Column($data,$row){
            if($data->set4 == ','){
                return 'N/A - N/A';
            }else{
                $dataset4 = explode(',', $data->set4);
               $setd1 =  $dataset4[0] ==''?'N/A': $dataset4[0];
                $setd2 =  $dataset4[1] ==''?'N/A': $dataset4[1];
               return $setd1.' - '.$setd2;
            }
        }
        public function gridSet5Column($data,$row){
            if($data->set5 == ','){
                return 'N/A - N/A';
            }else{
                $dataset5 = explode(',', $data->set5);
               $setd1 =  $dataset5[0] ==''?'N/A': $dataset5[0];
                $setd2 =  $dataset5[1] ==''?'N/A': $dataset5[1];
               return $setd1.' - '.$setd2;
            }
        }
        public function gridSet6Column($data,$row){
            if($data->set6 == ','){
                return 'N/A - N/A';
            }else{
                $dataset6 = explode(',', $data->set6);
               $setd1 =  $dataset6[0] ==''?'N/A': $dataset6[0];
                $setd2 =  $dataset6[1] ==''?'N/A': $dataset6[1];
               return $setd1.' - '.$setd2;
            }
            
            
	}
        /**
         * Retrieve the Worktout quotes and display randomly on users dashboard first tab
         */
        public function actionRandomquote(){
            $max = Dashboardquote::model()->count();
            $offset = rand(0,$max);
            $quotes = Dashboardquote::model()->find(array('offset'=>$offset));
            if($quotes){
            echo $quotes->quote;}
            else{ echo 'Do you know you can lose up to 300% more weight with a combined diet and exercise plan than either alone?';}
        }
        /**
         * Retrieve the Food quotes and display randomly on users dashboard second tab
         */
        public function actionRandomfoodquote(){
            $max = Dashboardquote::model()->count();
            $offset = rand(1,$max);
            $quotes = Dashboardquote::model()->find(array('offset'=>$offset));
            if($quotes){
            echo $quotes->quote; }
            else{ echo 'Do you know you can lose up to 300% more weight with a combined diet and exercise plan than either alone?';}
        }
        /**
         * User dashboard action to Edit the particular workout saves the values in the database accounted with the calories
         */
        public function actionEditworkout($id){
            $this->layout='dashboard';
            $pid= Yii::app()->user->id;
            $this->layout ='dashboard';
            $model = Users::model()->findByPk($pid);
            $details = UserDetails::model()->findByAttributes(array('user_id'=>$model->id));
            $workoutmodel = UserWorkouts::model()->findByPk($id);
           
            $this->render('editworkout',array('workout'=>$workoutmodel,'model'=>$model,'details'=>$details));
        }
         /**
         * User dashboard action to Edit the particular Food entry saves the values in the database accounted with the calories
         */
        public function actionEditfood($id){
            $this->layout='dashboard';
            $pid= Yii::app()->user->id;
            $this->layout ='dashboard';
            $model = Users::model()->findByPk($pid);
            $details = UserDetails::model()->findByAttributes(array('user_id'=>$model->id));
            $foodmodel = UserFoodintake::model()->findByPk($id);
           
            $this->render('editfood',array('food'=>$foodmodel,'model'=>$model,'details'=>$details));
        }
        public function mealtype($data,$row){
//            $mealtype = array(1=>'Breakfast',2=>'Morning Snack',3=>'Lunch',4=>'Afternoon Snack',5=>'Dinner',6=>'Evening Snack');
//           return CHtml::listData($mealtype, '',$data->mealtype);
            switch($data->mealtype)
		     {
                            case 1:
				     return 'Breakfast';
                            break;
                            case 2:
				     return 'Morning Snack';
                            break;
                            case 3:
				     return 'Lunch';
                            break;
                            case 4:
				     return 'Afternoon Snack';
                            break;
			    case 5:
				     return 'Dinner';
                            break;
                            case 6:
				     return 'Evening Snack';
                            break;
		     }
	}
}