<?php

class UserWorkoutsController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
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
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create',
                                    'update',
                                    'DeletelegalCardioworkout',
                                    'Editdistance',
                                    'Editspeed',
                                    'Editincline',
                                    'Editlevel',
                                    'getdata',
                                    'getFooddata',
                                    'Addnotes',
                                    'Addfoodnotes',
                                    'getProgress',
                                    'getcalData',
                                    'getweightcalData',
                                    'gettotalweightcalData',
                                    'gettotalcalData',
                                    'Usersworkouts',
                                    'Addlegalworkout',
                                    'Adddietnotes',
                                    'Addworkoutnotes',
                                    'Clientprofile',
                                    'Rangeworkouts',
                                    'Clientmessages',
                                    'SendReply',
                                    'Requesttrainer',
                                    'AssignClient',
                                    'Caldropburntdata',
                                    'Caldropburntdataprogressburneddate',
                                    'Caldropintakedata',
                                    'Caldateburntdata',
                                    'burneddata',
                                    'consumedddata',
                                    'processdate'
                                    ),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','Editdistance'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
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
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new UserWorkouts;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['UserWorkouts']))
		{
			$model->attributes=$_POST['UserWorkouts'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['UserWorkouts']))
		{
			$model->attributes=$_POST['UserWorkouts'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}
        /**
         * Delete the particualr Workout of the user based on the primary key via trainer dasboard grid.
         * @param integer $id Primary key of the particular workout
         */
        public function actionDeletelegalCardioworkout($id){
             if (Yii::app()->request->isAjaxRequest){
             $this->loadModel($id)->delete();
             }
           
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
//		if(!isset($_GET['ajax']))
//			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        }
	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('UserWorkouts');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new UserWorkouts('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['UserWorkouts']))
			$model->attributes=$_GET['UserWorkouts'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return UserWorkouts the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=UserWorkouts::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param UserWorkouts $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-workouts-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        /**
         * Edit the current Distance in the dashboard grid
         */
        public function actionEditdistance()
        {
            if(isset($_POST['pk'])){
            $model = UserWorkouts::model()->findByPk($_POST['pk']);
            $model->distance = $_POST['value'];
            if($model->validate()){
                $model->save();
                }
                else{
                    throw new CHttpException(400,$model->getError('distance'));
                    Yii::app()->end();
                }
            }
        }
         /**
         * Edit the current Speed in the dashboard grid
         */
        public function actionEditspeed()
        {
            if(isset($_POST['pk'])){
            $model = UserWorkouts::model()->findByPk($_POST['pk']);
            $model->speed = $_POST['value'];
            if($model->validate()){
                $model->save();
                }
                else{
                    throw new CHttpException(400,$model->getError('speed'));
                    Yii::app()->end();
                }
            }
        }
        /**
         * Edit the current Speed in the dashboard grid
         */
        public function actionEditincline()
        {
            if(isset($_POST['pk'])){
            $model = UserWorkouts::model()->findByPk($_POST['pk']);
            $model->incline = $_POST['value'];
            if($model->validate()){
                $model->save();
                }
                else{
                    throw new CHttpException(400,$model->getError('incline'));
                    Yii::app()->end();
                }
            }
        }
        /**
         * Edit the current Speed in the dashboard grid
         */
        public function actionEditlevel()
        {
            if(isset($_POST['pk'])){
            $model = UserWorkouts::model()->findByPk($_POST['pk']);
            $model->level = $_POST['value'];
            if($model->validate()){
                $model->save();
                }
                else{
                    throw new CHttpException(400,$model->getError('level'));
                    Yii::app()->end();
                }
            }
        }
        public function actiongetData(){
            $data[] = UserWorkouts::model()->getCaloriegraph();
            $result[]= array('name'=>'Burned','data'=>$data);
           // echo $result;
            echo CJSON::encode($data);
            Yii::app()->end();              
        }
        /**
         * Update the Calorie bar graph on dynamic update the data send the Weight graph data.
         */
        public function actiongetweightcalData(){
            $data[] = UserWorkouts::model()->getweightCaloriegraph();
            $result[]= array('name'=>'Burned','data'=>$data);
           // echo $result;
            echo CJSON::encode($data);
            Yii::app()->end();              
        }
        public function actiongetFooddata(){
            $data[] = UserFoodintake::model()->getCaloriegraph();
            //$result[]= array('name'=>'Intake','data'=>$data);
           // echo $result;
            echo CJSON::encode($data);
            Yii::app()->end();              
        }
         
        public function actiongetProgress(){
            $week = $_POST['week'];
            $burned =  array();
            $consumed =array();
            $consumed = UserWorkouts::model()->getprogressconsumed($week);
            $burned = UserWorkouts::model()->getprogressburned($week);
            $output= array_merge($burned,$consumed);
            echo CJSON::encode($output);
        }
         /**
         * Update the total weight column in the Userdashboard cardio grid chart
         */
        public function actiongetcalData(){
            echo UserWorkouts::model()->gettotalcalories();
        }
        /**
         * Update the total weight column in the Userdashboard weight grid chart
         */
         public function actiongettotalweightcalData(){
            echo UserWorkouts::model()->getweighttotalcalories();
        }
        /**
         * Send the client a message from the respective trainer via the trainer dashboard.
         */
        public function actionSendReply(){
            $model = new TrainerClientMsg('reply');
            
            if(isset($_POST['subject']) && isset($_POST['message'])){
               $model->setAttribute('to_receiver', intval($_POST['user_id']));
               $model->setAttribute('from_sender', intval(Yii::app()->user->id));
               $model->setAttribute('subject', trim($_POST['subject']));
               $model->setAttribute('message', trim($_POST['message']));
               $model->setAttribute('replied_stat', 1);
               $model->setAttribute('for_msg', 2);
               $error = CActiveForm::validate($model);
                                if($error!='[]'){
                                    echo $error;
                                Yii::app()->end();}else{
               if($model->save(false)){
                   echo CJSON::encode(array(
                                  'status'=>'success'
                             ));
                   /**Mail send to admin on request join trainer**/
                    $model_emailtemplate =  Emailtemplate::model()->findByPk(1);
                                            $body		=	$model_emailtemplate->body;
                                            $message 	= 	new YiiMailMessage;
                                            $register_body	=	$body;
                                            $bod = '<tr><td>Reply Send By:'.Yii::app()->user->id.'</td></tr><tr><td>
                                                                Reply Send to User: '.$_POST["user_id"].'
                                                                </td></tr><tr><td>Message: '.trim($_POST["message"]).'</td></tr>';
                                            $register_body	=	str_replace('$user', 'Admin', $register_body);
                                            $register_body	=	str_replace('$body', $bod, $register_body);
                                            $register_body	=	str_replace('$site', 'Team Gympik', $register_body);
                                            $message = new YiiMailMessage;
                                            $message->setBody($register_body, 'text/html');
                                            $message->subject = 'Reply By the Trainer on user message';
                                            $message->to = 'ajay.pandey@gympik.com';
                                            $message->from = 'contact@gympik.com';
                                            Yii::app()->mail->send($message);
                         Yii::app()->end();
               }else{
                  
                                }}
            }else{
                $model->setScenario('reply');
               $this->performAjaxValidation($model);
                
                $error = CActiveForm::validate($model);
                                if($error!='[]')
                                    echo $error;
                                Yii::app()->end();
            }
        }
        /**
         * Send the Admin a flag from the respective trainer via the trainer dashboard requesting to add particular client/user.
         */
        public function actionAssignClient(){
            $model = new TrainerClientMsg('reply');
            
            if(isset($_POST['subject']) && isset($_POST['message'])){
               $model->setAttribute('to_receiver', intval($_POST['user_id']));
               $model->setAttribute('from_sender', intval(Yii::app()->user->id));
               $model->setAttribute('subject', trim('Request to join this client'));
               $model->setAttribute('message', trim($_POST['message']));
               $model->setAttribute('replied_stat', 1);
               $model->setAttribute('for_msg', 3);
               $model->setAttribute('reqtojoin', 1);
               $error = CActiveForm::validate($model);
                                if($error!='[]'){
                                    echo $error;
                                Yii::app()->end();}else{
               if($model->save(false)){
                   echo CJSON::encode(array(
                                  'status'=>'success'
                             ));
                   /**Mail send to admin on request join trainer**/
                    $model_emailtemplate =  Emailtemplate::model()->findByPk(1);
                                            $body		=	$model_emailtemplate->body;
                                            $message 	= 	new YiiMailMessage;
                                            $register_body	=	$body;
                                            $bod = '<tr><td>Reply Send By:'.Yii::app()->user->id.'</td></tr><tr><td>
                                                                Reply Send to User: '.$_POST["user_id"].'
                                                                </td></tr><tr><td>Message: '.trim($_POST["message"]).'</td></tr>';
                                            $register_body	=	str_replace('$user', 'Admin', $register_body);
                                            $register_body	=	str_replace('$body', $bod, $register_body);
                                            $register_body	=	str_replace('$site', 'Team Gympik', $register_body);
                                            $message = new YiiMailMessage;
                                            $message->setBody($register_body, 'text/html');
                                            $message->subject = 'Reply By the Trainer on user message';
                                            $message->to = 'ajay.pandey@gympik.com';
                                            $message->from = 'contact@gympik.com';
//                                            Yii::app()->mail->send($message);
                         Yii::app()->end();
               }else{
                  
                                }}
            }else{
                $model->setScenario('reply');
               $this->performAjaxValidation($model);
                
                $error = CActiveForm::validate($model);
                                if($error!='[]')
                                    echo $error;
                                Yii::app()->end();
            }
        }
        /**
         * Send the client a message from the respective trainer via the trainer dashboard.
         */
        public function actionRequesttrainer(){
            $model = new TrainerClientMsg('reply');
            
            if(isset($_POST['subject']) && isset($_POST['message'])){
               $model->setAttribute('to_receiver', intval($_POST['user_id']));
               $model->setAttribute('from_sender', intval(Yii::app()->user->id));
               $model->setAttribute('subject', trim($_POST['subject']));
               $model->setAttribute('message', trim($_POST['message']));
               $model->setAttribute('replied_stat', 0);
               $model->setAttribute('for_msg', 2);
               $error = CActiveForm::validate($model);
                                if($error!='[]'){
                                    echo $error;
                                Yii::app()->end();}else{
               if($model->save(false)){
                   echo CJSON::encode(array(
                                  'status'=>'success'
                             ));
                   /**Mail send to admin on request join trainer**/
                    $model_emailtemplate =  Emailtemplate::model()->findByPk(1);
                                            $body		=	$model_emailtemplate->body;
                                            $message 	= 	new YiiMailMessage;
                                            $register_body	=	$body;
                                            $bod = '<tr><td>Request Send By:'.Yii::app()->user->id.'</td></tr><tr><td>
                                                                Request Send to Trainer: '.$_POST["user_id"].'
                                                                </td></tr><tr><td>Message: '.trim($_POST["message"]).'</td></tr>';
                                            $register_body	=	str_replace('$user', 'Admin', $register_body);
                                            $register_body	=	str_replace('$body', $bod, $register_body);
                                            $register_body	=	str_replace('$site', 'Team Gympik', $register_body);
                                            $message = new YiiMailMessage;
                                            $message->setBody($register_body, 'text/html');
                                            $message->subject = 'New Request to Join Trainer';
                                            $message->to = 'ajay.pandey@gympik.com';
                                            $message->from = 'contact@gympik.com';
//                                            Yii::app()->mail->send($message);
                         Yii::app()->end();

                    
               }else{
                  
                                }}
            }else{
                $model->setScenario('reply');
               $this->performAjaxValidation($model);
                
                $error = CActiveForm::validate($model);
                                if($error!='[]')
                                    echo $error;
                                Yii::app()->end();
            }
        }
        /**
         * Get the client messages and render the messages all into the trainer dashboard via the message tab
         */
        public function actionClientmessages(){
            $messages = TrainerClientMsg::model()->findAllByAttributes(array('to_receiver'=>Yii::app()->user->id));
            $clients = TrainerClients::model()->findAllByAttributes(array('trainer_id'=>Yii::app()->user->id));
            $this->renderPartial('messages',array('messages'=>$messages,'clients'=>$clients));
        }
        /**
         * Return the total calories burned Cardio+Weight
         */
        public function actiongettotalcalData(){
             $data[] = UserWorkouts::model()->gettotalcalories()+ UserWorkouts::model()->getweighttotalcalories();
            echo CJSON::encode($data);
            Yii::app()->end();     
            
        }
        /**
         * Get the user workouts list calling by trainer through trainer dashboard
         */
        public function actionUsersworkouts(){
           if(isset($_POST['id'])){
            $id = $_POST['id'];
            //$workouts = UserWorkouts::model()->findAllByAttributes(array('user_id'=>$id));
            $workouts = UserWorkouts::model()->findAll(array('condition'=>'user_id='.$id.' AND adddate BETWEEN date(NOW()) AND DATE_ADD(date(NOW()), INTERVAL 7 DAY) group by adddate'));  
//                if($workouts){
                        /**Passing the data via json format**/
//                         $out = array();
//                            foreach ($workouts as $work) {
//                             $out[] = array(
//                                            'label' => $work->name,  
//                                            'value' => $work->name,
//                                            'id' => $work->id,
//                                            'category'=>'');}
//                                $datas =  CJSON::encode($out);
                               
//                                echo $datas;
//                    }else{
                        $this->renderPartial('worktraingrid',array('workouts'=>$workouts),false,true);
                    }
           if (Yii::app()->request->isAjaxRequest){
               Yii::app()->end();
             $this->redirect('worktraingrid',array('workouts'=>$workouts),false,true);
             }
        }
         /**
         * Get the user workouts list calling by trainer through trainer dashboard
         */
        public function actionRangeworkouts(){
           if(isset($_POST['enddate'])){
               $var1 = $_POST['startdate'];
               $var2 = $_POST['enddate'];
               $date1 = str_replace('/', '-', $var1);
               $date2 = str_replace('/', '-', $var2);
            $startdate = date('Y-m-d',strtotime($date1));
            $enddate = date('Y-m-d',strtotime($date2));
            $id = $_POST['id'];
            $data = UserWorkouts::model()->getRangeWorkouts($startdate,$enddate,$id);
         Yii::app()->end();
            //$workouts = UserWorkouts::model()->findAllByAttributes(array('user_id'=>$id));
            $workouts = UserWorkouts::model()->findAll(array('condition'=>'user_id='.$id.' AND adddate BETWEEN date(NOW()) AND DATE_ADD(date(NOW()), INTERVAL 7 DAY) group by adddate'));  
//                if($workouts){
                        /**Passing the data via json format**/
//                         $out = array();
//                            foreach ($workouts as $work) {
//                             $out[] = array(
//                                            'label' => $work->name,  
//                                            'value' => $work->name,
//                                            'id' => $work->id,
//                                            'category'=>'');}
//                                $datas =  CJSON::encode($out);
                               
//                                echo $datas;
//                    }else{
                        $this->renderPartial('worktraingrid',array('workouts'=>$workouts));
                    }
           
                else{
                    throw new Exception('No data found', 404 );
           }
        }
        /**
         * User dashboard action to add the particular workout saves the values in the database accounted with the calories
         */
        public function actionAddlegalworkout(){
            if(isset($_POST)){
            $typeid = $_POST['worktypeid'];
            $exerciseid= $_POST['exerciseid'];
            $date =  date('Y/m/d H:i:s', strtotime($_POST['date']) );
            $model = new UserWorkouts;
            $userid = $_POST['userid'];
            $user = UserDetails::model()->findByAttributes(array('user_id'=>$userid));
            $now      = new DateTime();
            $birthday = new DateTime($user->dob);
            $interval = $now->diff($birthday);
            $age = $interval->format('%y');
            $workouts = Workouts::model()->findByPk($exerciseid);
            $durationfull = $_POST['datetime_hour']*60 + $_POST['datetime_min'] + ($_POST['datetime_sec']/60);
            $duration = round($durationfull,2);
            $hourswork = round($duration/60,2);
            /**calorie counter**/
            
		//Calorie Burn = (BMR / 24) x MET x T ;
		if($user->gender == 1){ 
                    $bmr =  13.75 * $user->curweight+(5*$user->height)-(6.76 * $age)+66;}
                    else{	
		    $bmr =  9.56 * $user->curweight+(1.85*$user->height)-(4.68 * $age)+655;
		}
            
            $calorie = ($bmr/24)* $workouts->met * $hourswork;
            /**calorie counter ends**/
            $model->setAttribute('user_id',$userid);
            $model->setAttribute('worktype_id',$typeid);
            $model->setAttribute('workout_id',$exerciseid);
            $model->setAttribute('name',$_POST['servv']);
            $model->setAttribute('duration',$duration);
            $model->setAttribute('adddate',$date);
            $model->setAttribute('distance',$_POST['distance']);
            $model->setAttribute('speed',$_POST['speed']);
            $model->setAttribute('incline',$_POST['incline']);
            $model->setAttribute('level',$_POST['level']);
            $model->setAttribute('calories',$calorie);
            $model->setAttribute('iscomplete',0);
            if(isset($_POST['exercisetype'])){
                        $set1 =$_POST['set1w'].','.$_POST['set1r'];
                        $set2 =$_POST['set2w'].','.$_POST['set2r'];
                        $set3 =$_POST['set3w'].','.$_POST['set3r'];
                        $set4 =$_POST['set4w'].','.$_POST['set4r'];
                        $set5 =$_POST['set5w'].','.$_POST['set5r'];
                        $set6 =$_POST['set6w'].','.$_POST['set6r'];
                        $model->setAttribute('set1',$set1);
                        $model->setAttribute('set2',$set2);
                        $model->setAttribute('set3',$set3);
                        $model->setAttribute('set4',$set4);
                        $model->setAttribute('set5',$set5);
                        $model->setAttribute('set6',$set6);
                        $model->setAttribute('status',1);
                        if(isset($_POST['customcalories'])){
                        $model->setAttribute('custom_calories',$_POST['customcalories']);}
                }
                $valid = $model->validate();
            if($model->save(false)){
                
                $this->redirect(array('users/traindashboard','id'=>Yii::app()->user->id));
                }
            }
        }
        /**
         * Add the diet note posted by the trainer from the client tab via ajax post
         */
        public function actionAdddietnotes(){
             if(!empty($_POST['dietnotes'])){
                 
                 $user_id = $_POST['user_id'];
                 $trainer_id = Yii::app()->user->id;
                 $date = date('Y-m-d 00:00:00',  strtotime($_POST['mdate']));
                 
                 $note = Notes::model()->findByAttributes(array('to'=>$user_id,'adddate'=>$date,'onto'=>1));
                  
                 if($note){
                    $curdate = date('Y-m-d 00:00:00');
                    $note->setAttribute('note',trim($_POST['dietnotes']));
                    $note->setAttribute('modifydate',$curdate);
                    if($note->save()){
                                  echo 'Plan saved successfully.';
//                                  Yii::app()->user->setFlash(TbHtml::ALERT_COLOR_SUCCESS,'<strong>Submitted Successfully!</strong>.');
                                                //$this->redirect(array('users/userdashboard','id'=>Yii::app()->user->id));
                                                          
                                 }else{
                        
                                        echo '<h5>Please add some workouts for this date before making diet plan.</h5>';
                        }
                 }else{
                    $model = new Notes;
                    $model->setAttribute('note',trim($_POST['dietnotes']));
                    $model->setAttribute('to',trim($user_id));
                    $model->setAttribute('from',trim($trainer_id));
                    $model->setAttribute('adddate',trim($date));
                    $model->setAttribute('onto',1);
                    $model->setAttribute('for',2);
                      if($model->save()){
                                  echo 'Plan saved successfully.';
//                                  Yii::app()->user->setFlash(TbHtml::ALERT_COLOR_SUCCESS,'<strong>Submitted Successfully!</strong>.');
                                                //$this->redirect(array('users/userdashboard','id'=>Yii::app()->user->id));
                                                          
                                 }else{
                        
                                        echo '<h5>Please add some workouts for this date before making diet plan.</h5>';
                        }
                           
                        
                 }
             }else { echo 'Please Write Something.'; }
        
        }
        /**
         * Add the diet note posted by the trainer from the client tab via ajax post
         */
        public function actionAddworkoutnotes(){
             if(!empty($_POST['worknotes'])){
                 $user_id = $_POST['user_id'];
                 $trainer_id = Yii::app()->user->id;
                 $date = date('Y-m-d 00:00:00',  strtotime($_POST['mdate']));
                 $note = Notes::model()->findByAttributes(array('to'=>$user_id,'adddate'=>$date,'onto'=>2));
                  
                 if($note){
                    $curdate = date('Y-m-d 00:00:00');
                    $note->setAttribute('note',trim($_POST['worknotes']));
                    $note->setAttribute('modifydate',$curdate);
                    if($note->save()){
                                  echo 'Workout Note saved successfully.';
//                                  Yii::app()->user->setFlash(TbHtml::ALERT_COLOR_SUCCESS,'<strong>Submitted Successfully!</strong>.');
                                                //$this->redirect(array('users/userdashboard','id'=>Yii::app()->user->id));
                                                          
                                 }else{
                        
                                        echo '<h5>Please add some workouts for this date before Posting Note.</h5>';
                        }
                 }else{
                    $model = new Notes;
                    $model->setAttribute('note',trim($_POST['worknotes']));
                    $model->setAttribute('to',trim($user_id));
                    $model->setAttribute('from',trim($trainer_id));
                    $model->setAttribute('adddate',trim($date));
                    $model->setAttribute('onto',2);
                    $model->setAttribute('for',2);
                      if($model->save()){
                                  echo 'Note saved successfully.';
//                                  Yii::app()->user->setFlash(TbHtml::ALERT_COLOR_SUCCESS,'<strong>Submitted Successfully!</strong>.');
                                                //$this->redirect(array('users/userdashboard','id'=>Yii::app()->user->id));
                                                          
                                 }else{
                        
                                        echo '<h5>Please add some workouts for this date before Posting Note.</h5>';
                        }
                    }    
                        
                 }else { echo 'Please Write Something.'; }
        
        }
        /**
         * Add User workoutNotes
         */
        public function actionAddnotes(){
            if(!empty($_POST['notes'])){
               $userid = Yii::app()->user->id;
               $trainer = TrainerClients::model()->findByAttributes(array('user_id'=>$userid));
               if($trainer){
               $date = date('Y-m-d 00:00:00');
                    $note = Notes::model()->findByAttributes(array('from'=>$userid,'adddate'=>$date,'onto'=>2));
                    if($note){
                        $curdate = date('Y-m-d 00:00:00');
                        $note->setAttribute('note',trim($_POST['notes']));
                        $note->setAttribute('modifydate',$curdate);
                        if($note->save()){
                            echo' <div class="alert alert-success in alert-block fade"><a type="button" data-dismiss="alert" class="close" href="#"><div class="ok"><button type="button" name="yt5" class="btn btn-primary">OK</button></div></a><strong>Your Note has been updated successfully.</strong></div>';
                            Yii::app()->end();
                        }else {echo' <div class="alert alert-error in alert-block fade"><a type="button" data-dismiss="alert" class="close" href="#"><div class="ok"><button type="button" name="yt5" class="btn btn-primary">OK</button></div></a><strong>Some error occured.Please try again later.</strong></div>';
                        Yii::app()->end();
                        }
                    }else{
                    $model = new Notes;
                    $model->setAttribute('from',$userid);
                    $model->setAttribute('to',$trainer->trainer_id);
                    $model->setAttribute('note',trim($_POST['notes']));
                    $model->setAttribute('for',1);
                    $model->setAttribute('adddate',$date);
                    $model->setAttribute('status',1);
                    $model->setAttribute('onto',2);
                    $valid = $model->validate();
                    if($valid){  $model->save();  echo' <div class="alert alert-success in alert-block fade"><a type="button" data-dismiss="alert" class="close" href="#"><div class="ok"><button type="button" name="yt5" class="btn btn-primary">OK</button></div></a><strong>Your Note has been saved successfully.</strong></div>';
                        }else{echo' <div class="alert alert-error in alert-block fade"><a type="button" data-dismiss="alert" class="close" href="#"><div class="ok"><button type="button" name="yt5" class="btn btn-primary">OK</button></div></a><strong>Some error occured.Please try again later.</strong></div>';}
               }}else{
                   echo' <div class="alert alert-error in alert-block fade"><a type="button" data-dismiss="alert" class="close" href="#"><div class="ok"><button type="button" name="yt5" class="btn btn-primary">OK</button></div></a><strong>Your didnt have any trainer yet.</strong></div>';
               }
          }else { echo' <div class="alert alert-error in alert-block fade"><a type="button" data-dismiss="alert" class="close" href="#"><div class="ok"><button type="button" name="yt5" class="btn btn-primary">OK</button></div></a><strong>Please write something to post.</strong></div>'; }
        }
        /**
         * Add User Foodintake Notes
         */
        public function actionAddfoodnotes(){
           if(!empty($_POST['notes'])){
               $userid = Yii::app()->user->id;
               $trainer = TrainerClients::model()->findByAttributes(array('user_id'=>$userid));
               if($trainer){
               $date = date('Y-m-d 00:00:00');
                    $note = Notes::model()->findByAttributes(array('from'=>$userid,'adddate'=>$date,'onto'=>1));
                    if($note){
                        $curdate = date('Y-m-d 00:00:00');
                        $note->setAttribute('note',trim($_POST['notes']));
                        $note->setAttribute('modifydate',$curdate);
                        if($note->save()){
                            echo' <div class="alert alert-success in alert-block fade"><a type="button" data-dismiss="alert" class="close" href="#"><div class="ok"><button type="button" name="yt5" class="btn btn-primary">OK</button></div></a><strong>Your Note has been updated successfully.</strong></div>';
                            Yii::app()->end();
                        }else {echo' <div class="alert alert-error in alert-block fade"><a type="button" data-dismiss="alert" class="close" href="#"><div class="ok"><button type="button" name="yt5" class="btn btn-primary">OK</button></div></a><strong>Some error occured.Please try again later.</strong></div>';
                        Yii::app()->end();
                        }
                    }else{
                    $model = new Notes;
                    $model->setAttribute('from',$userid);
                    $model->setAttribute('to',$trainer->trainer_id);
                    $model->setAttribute('note',trim($_POST['notes']));
                    $model->setAttribute('for',1);
                    $model->setAttribute('adddate',$date);
                    $model->setAttribute('status',1);
                    $model->setAttribute('onto',1);
                    $valid = $model->validate();
                    if($valid){  $model->save();  echo' <div class="alert alert-success in alert-block fade"><a type="button" data-dismiss="alert" class="close" href="#"><div class="ok"><button type="button" name="yt5" class="btn btn-primary">OK</button></div></a><strong>Your Note has been saved successfully.</strong></div>';
                        }else{echo' <div class="alert alert-error in alert-block fade"><a type="button" data-dismiss="alert" class="close" href="#"><div class="ok"><button type="button" name="yt5" class="btn btn-primary">OK</button></div></a><strong>Some error occured.Please try again later.</strong></div>';}
               }}else{
                   echo' <div class="alert alert-error in alert-block fade"><a type="button" data-dismiss="alert" class="close" href="#"><div class="ok"><button type="button" name="yt5" class="btn btn-primary">OK</button></div></a><strong>Your didnt have any trainer yet.</strong></div>';
               }
          }else { echo' <div class="alert alert-error in alert-block fade"><a type="button" data-dismiss="alert" class="close" href="#"><div class="ok"><button type="button" name="yt5" class="btn btn-primary">OK</button></div></a><strong>Please write something to post.</strong></div>'; }
        }
        /**
         * Runs the client profile
         */
        public function actionClientprofile(){
            $this->layout = 'clients';
            $id= $_POST['id'];
           
//            $this->layout ='profile';
            $model = Users::model()->findByPk($id);
            $details = UserDetails::model()->findByAttributes(array('user_id'=>$model->id));
            
          $this->renderPartial('client_form',array('model'=>$model,'details'=>$details),false,true);
        }
        /**
         * Response send the graph data through the dropdown on User dashboard
         */
        public function actionCaldropburntdata(){
            if(isset($_POST['drop']))
                $duration = $_POST['duration'];
                $data = UserWorkouts::model()->dropdownCalsGraph($_POST['drop'],$duration);
       
            echo CJSON::encode($data);
            Yii::app()->end();  
        }
        public function actionCaldropburntdataprogressburneddate(){
            if(isset($_POST['duration']))
                $duration = intval($_POST['duration']);
                $data = UserWorkouts::model()-> getprogressburneddate($duration);
       
            echo CJSON::encode($data);
            Yii::app()->end();  
        }
        /**
         * Response send the graph data through the dropdown on User dashboard
         */
        public function actionCaldropintakedata(){
            if(isset($_POST['drop']))
                $duration = $_POST['duration'];
                $data = UserWorkouts::model()->getprogressconsumed($duration);
            echo CJSON::encode($data);
            Yii::app()->end();  
        }
         /**
         * Response send the graph data through the datepicker on User dashboard
         */
        public function actionCaldateburntdata(){
            if(isset($_POST['drop']))
                $date = $_POST['dd'];
                $month = $_POST['mm'];
                $year = $_POST['yy'];
                $type = $_POST['drop'];
                $data = UserWorkouts::model()->datedownCalsGraph($date,$month,$year,$type);
                
            echo CJSON::encode($data);
            Yii::app()->end();  
        }
        public function actionburneddata(){
            if($_POST['dur'])
          echo CJSON::encode(UserWorkouts::model()-> getprogressburned($_POST['dur']));
        }
        public function actionconsumedddata(){
            if($_POST['dur'])
          echo CJSON::encode(UserWorkouts::model()-> getprogressconsumed($_POST['dur']));
        }
         public function actionprocessdate(){
            if($_POST['dur'])
          echo CJSON::encode(UserWorkouts::model()-> getprogressburneddate($_POST['dur']));
        }
}
