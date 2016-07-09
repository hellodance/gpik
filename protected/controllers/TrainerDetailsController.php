<?php

class TrainerDetailsController extends Controller
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
				'actions'=>array('index','view','search','trainerprofiles'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create',
                                    'update',
                                    'trainerprofiles',
                                    'addworkout',
                                    'editworkout',
                                    'addfood',
                                    'toggle',
                                    'getEvents',
                                    'AddEvent',
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
		$model=new TrainerDetails;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['TrainerDetails'])) {
			$model->attributes=$_POST['TrainerDetails'];
			if ($model->save()) {
				$this->redirect(array('view','id'=>$model->id));
			}
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

		if (isset($_POST['TrainerDetails'])) {
			$model->attributes=$_POST['TrainerDetails'];
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
	public function actionDelete($id)
	{
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
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('TrainerDetails');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new TrainerDetails('search');
		$model->unsetAttributes();  // clear any default values
		if (isset($_GET['TrainerDetails'])) {
			$model->attributes=$_GET['TrainerDetails'];
		}

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return TrainerDetails the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=TrainerDetails::model()->findByPk($id);
		if ($model===null) {
			throw new CHttpException(404,'The requested page does not exist.');
		}
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param TrainerDetails $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax']==='trainer-details-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        /**
         * Renders the trainer details page
         */
        public function actionTrainerprofiles($id){
            $this->layout = 'trainer_profile';
           $model = TrainerDetails::model()->findByPk($id);
           Yii::app()->user->setFlash('success',null); 
           $country = Countries::model()->findByAttributes(array('countryCode'=>$model->country_id));
           $this->render('trainer_details',array('model'=>$model,'country'=>$country));
        }
        /**
         * User dashboard action to add the particular workout saves the values in the database accounted with the calories
         */
        public function actionAddworkout(){
            if(isset($_POST)){
            $typeid = $_POST['worktypeid'];
            $exerciseid= $_POST['exerciseid'];
            $date =  date('Y/m/d H:i:s', strtotime($_POST['date']) );
            $model = new UserWorkouts;
            $userid = Yii::app()->user->id;
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
            $model->setAttribute('name',$workouts->name);
            $model->setAttribute('duration',$duration);
            $model->setAttribute('adddate',$date);
            $model->setAttribute('distance',$_POST['distance']);
            $model->setAttribute('speed',$_POST['speed']);
            $model->setAttribute('incline',$_POST['incline']);
            $model->setAttribute('level',$_POST['level']);
            $model->setAttribute('calories',$calorie);
            $model->setAttribute('iscomplete',1);
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
                        $model->setAttribute('status',0);
                        if(isset($_POST['customcalories'])){
                        $model->setAttribute('custom_calories',$_POST['customcalories']);}
                }
                $valid = $model->validate();
            if($model->save(false)){
                
                $this->redirect(array('users/userdashboard'));
                }
            }
        }
         /**
         * User dashboard action to add the particular workout saves the values in the database accounted with the calories
         */
        public function actionEditworkout($id){
            if(isset($_POST)){
            $typeid = $_POST['worktypeid'];
            $exerciseid= $_POST['exerciseid'];
            $date =  date('Y/m/d H:i:s', strtotime($_POST['date_new']) );
            $model = UserWorkouts::model()->findByPk($id);
            $userid = Yii::app()->user->id;
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
            $model->setAttribute('name',$workouts->name);
            $model->setAttribute('duration',$duration);
            $model->setAttribute('adddate',$date);
            $model->setAttribute('distance',$_POST['distance']);
            $model->setAttribute('speed',$_POST['speed']);
            $model->setAttribute('incline',$_POST['incline']);
            $model->setAttribute('level',$_POST['level']);
            $model->setAttribute('calories',$calorie);
            $model->setAttribute('iscomplete',1);
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
                        $model->setAttribute('status',0);
                        if(isset($_POST['customcalories'])){
                        $model->setAttribute('custom_calories',$_POST['customcalories']);}
                }
                $valid = $model->validate();
            if($model->save(false)){
                
                $this->redirect(array('users/userdashboard'));
                }
            }
        }
        
        /**
         * User dashboard action to add the particular food entry saves the values in the database accounted with the calories
         */
        public function actionAddfood(){
            if(isset($_POST)){
            $typeid = $_POST['foodtypeid'];
            $foodid= $_POST['foodid'];
            $serveunit = $_POST['mealsize'];
            $date =  date('Y/m/d H:i:s', strtotime($_POST['mealdate']) );
            $fooddetails = FoodItems::model()->findByPk($foodid);
            $calorie = $serveunit * $fooddetails->calories;
            $model = new UserFoodintake;
            $userid = Yii::app()->user->id;
            $user = UserDetails::model()->findByAttributes(array('user_id'=>$userid));
            $model->setAttribute('user_id',$userid);
            $model->setAttribute('foodtype_id',$typeid);
            $model->setAttribute('fooditem_id',$foodid);
            $model->setAttribute('name',$fooddetails->item);
            $model->setAttribute('mealtype',$_POST['mealtype']);
            $model->setAttribute('adddate',$date);
            $model->setAttribute('mealsize',$serveunit);
            $model->setAttribute('calories',$calorie);
            $model->setAttribute('status',0);
//            echo'<pre>';
//            print_r($model->attributes);
            if($model->save(false)){
                $url = Yii::app()->createUrl('users/userdashboard')."#calories";
                $this->redirect($url);
                //$this->redirect(array('users/userdashboard'));
                }
            }
        }
        
         /**
         * User dashboard action to add the particular food entry saves the values in the database accounted with the calories
         */
        public function actionEditfood($id){
            if(isset($_POST)){
            $typeid = $_POST['foodtypeid'];
            $foodid= $_POST['foodid'];
            $serveunit = $_POST['mealsize'];
            $date =  date('Y/m/d H:i:s', strtotime($_POST['mealdate']) );
            $fooddetails = FoodItems::model()->findByPk($foodid);
            $calorie = $serveunit * $fooddetails->calories;
            $model = UserFoodintake::model()->findByPk($id);
            $userid = Yii::app()->user->id;
            $user = UserDetails::model()->findByAttributes(array('user_id'=>$userid));
            $model->setAttribute('user_id',$userid);
            $model->setAttribute('foodtype_id',$typeid);
            $model->setAttribute('fooditem_id',$foodid);
            $model->setAttribute('name',$fooddetails->item);
            $model->setAttribute('mealtype',$_POST['mealtype']);
            $model->setAttribute('adddate',$date);
            $model->setAttribute('mealsize',$serveunit);
            $model->setAttribute('calories',$calorie);
            $model->setAttribute('status',0);
//            echo'<pre>';
//            print_r($model->attributes);
            if($model->save(false)){
                $url = Yii::app()->createUrl('users/userdashboard')."#calories";
                $this->redirect($url);
                //$this->redirect(array('users/userdashboard'));
                }
            }
        }
        
        
        /**
         * Toggle the users workout status to 2 or 3 on ajax call via toggle button in the user dashboard
         */
        public function actionToggle($id){
            $workouts = UserWorkouts::model()->findByPk($id);
            if($workouts->iscomplete == 1){
                UserWorkouts::model()->updateByPk($id, array('iscomplete'=>0));
            }else{
                UserWorkouts::model()->updateByPk($id, array('iscomplete'=>1));
            }
            
        }
        /**
         * Fetch and return the Events to the trainer dashboard events tab
         * @return json array of json events objects
         */
        public function actiongetEvents(){
            $a = Events::model()->findAll();
            $start = $_REQUEST['from'] / 1000;
            $end   = $_REQUEST['to'] / 1000;
            $out = array();
            $out1 = array();
            foreach($a as $row) {
                $out[] = array(
                    'id' => $row->id,
                    'title' => $row->title,
                    'url' => $row->url,
//                    'class'=> 'event-important',
                    'start' => strtotime($row->start_from),
                    'end' => strtotime($row->end_to)
                );
            }
             $out1[] = array("success"=>1);
//             array_merge($out1,$out);
            echo CJSON::encode($out);
            Yii::app()->end();
        }
         /**
         * Add the Events to the trainer dashboard events tab click on a calendar date
         * 
         */
        public function actionAddevent(){
           if(isset($_POST['event_title'])){
              $model = new Events;
              $date = date('Y-m-d h:i:s',  strtotime($_POST['evdate']));
              $model->setAttribute('title', trim($_POST['event_title']));
              $model->setAttribute('description', trim($_POST['event_description']));
              $model->setAttribute('start_from', $date);
              $model->setAttribute('created_by', Yii::app()->user->id);
              if($model->save()){
                   $this->redirect(array('users/traindashboard','id'=>Yii::app()->user->id,'#'=>'calendars'));
              }else{
                   $this->redirect(array('users/traindashboard','id'=>Yii::app()->user->id,'#'=>'calendars'));
              }
           }
            
//          Yii::app()->end();
        }
        
}