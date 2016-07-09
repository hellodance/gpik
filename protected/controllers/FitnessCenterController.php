<?php
class FitnessCenterController extends Controller
{
    
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/adminlayout';

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
				'actions'=>array('index','view','admin','delete','create','update','toggle','trainerscreate','Trainerdetails'),
				'users'=>array('admin@gympik.com','kanika@gympik.com','amresh@gympik.com','sudhanshu@gympik.com','ajay@gympik.com'),
			),
//			array('allow', // allow authenticated user to perform 'create' and 'update' actions
//				'actions'=>array('create','update'),
//				'users'=>array('@'),
//			),
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
		$model=new FitnessCenter;

		// Uncomment the following line if AJAX validation is needed
		 $this->performAjaxValidation($model);

		if (isset($_POST['FitnessCenter'])) {
			$model->attributes=$_POST['FitnessCenter'];
                        $payments = implode(',', $_POST['FitnessCenter']['pay_method']);
//                        $type = implode(',', $_POST['FitnessCenter']['type']);
                        $model->setAttribute('pay_method',$payments);
                        $model->setAttribute('addby',Yii::app()->user->id);
//                        $model->setAttribute('type', $type);
//                        $opening_time = date("H:i:s", strtotime($_POST['FitnessCenter']['timings_open']));
//                        $close_time = date("H:i:s", strtotime($_POST['FitnessCenter']['timings_close']));
//                        $model->setAttribute('timings_open',$opening_time);
//                        $model->setAttribute('timings_close', $close_time );
			if ($model->save()) {
				$this->redirect(array('admin','id'=>$model->id));
			}
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}
        public function type($data,$row){
            switch ($data->type)
            {
                            case 1:
				     return 'Gym/Fitness club';
                            break;
                            case 2:
				     return 'Aerobics classes';
                            break;
                            case 3:
				     return 'Yoga Centre';
                            break;
                            case 4:
				     return 'Martial arts';
                            break;
			    case 5:
				     return 'Dance Academy';
                            break;
                            case 6:
				     return 'Sports club';
                            case 7:
				     return 'Other';
                            break;
		     }
            
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
		 $this->performAjaxValidation($model);

		if (isset($_POST['FitnessCenter'])) {
			$model->attributes=$_POST['FitnessCenter'];
                        $opening_time = date("H:i", strtotime($_POST['FitnessCenter']['timings_open']));
                        $close_time = date("H:i", strtotime($_POST['FitnessCenter']['timings_close']));
                        if(!empty($_POST['FitnessCenter']['pay_method'])){
//                        $type = implode(',', $_POST['FitnessCenter']['type']);
                        $payments = implode(',', $_POST['FitnessCenter']['pay_method']);
                        $model->setAttribute('pay_method',$payments);
//                        $model->setAttribute('type', $type);
                        $model->setAttribute('updateby',Yii::app()->user->id);
                        }
                       
                        
//                        echo $opening_time;die;
//                        $model->setAttribute();
			if ($model->save()) {
				$this->redirect(array('admin','id'=>$model->id));
			}
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}
         /**
     * Update the status of the Fitness on click on toggle button via Fitness Grid view
     * @param $id integer ID of the particular model.
     */
    public function actionToggle($id) {
        $model = $this->loadModel($id);
        if ($model->status == 1) {
            $model->updateByPk($id, array('status' => '0'));
        } else {
            $model->updateByPk($id, array('status' => '1'));
        }
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
            $this->redirect('admin');
		$dataProvider=new CActiveDataProvider('FitnessCenter');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new FitnessCenter('search');
		$model->unsetAttributes();  // clear any default values
		if (isset($_GET['FitnessCenter'])) {
			$model->attributes=$_GET['FitnessCenter'];
		}

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return FitnessCenter the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=FitnessCenter::model()->findByPk($id);
		if ($model===null) {
			throw new CHttpException(404,'The requested page does not exist.');
		}
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param FitnessCenter $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax']==='fitness-center-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        /**
	 * Performs the AJAX validation.
	 * @param TrainerProfile $model the model to be validated
	 */
	protected function performTrainerAjaxValidation($model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax']==='trainer-profile-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
         /**
	 * Performs the AJAX validation.
	 * @param TrainerDetails $model the model to be validated
	 */
	protected function performTrainerDetailsAjaxValidation($model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax']==='trainer-profile-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        public function actionTrainersCreate(){
            $details =new TrainerDetails;
            $model = new Users;
            if (isset($_POST['ajax']) && $_POST['ajax']==='trainer-profile-form') {
			echo CActiveForm::validate(array($model,$details));
			Yii::app()->end();
		}
            if (isset($_POST['TrainerDetails'])) {
                    $transaction = Yii::app()->db->beginTransaction();
                        $model->attributes=$_POST['Users'];
                        $password = trim($_POST['Users']['password']);
                        $encpass = md5($password);
                        $model->setAttribute('password',$encpass);
                        $model->setAttribute('username',trim($_POST['Users']['email']));
                        $model->setAttribute('activation_key',0);
                        $model->setAttribute('mas_role_id',2);
                        $model->setAttribute('status',1);
                        $model->setAttribute('log',1);
                        
			if ($model->save()) {
                                $details->attributes=$_POST['TrainerDetails'];
                                $details->setAttribute('user_id',$model->id);
                                $details->setAttribute('gender',1);
                                $details->setAttribute('addby',Yii::app()->user->id);
//                                $details->setAttribute('type_id',1);
                                if($details->save()){
                                    $transaction->commit();
                                $this->redirect(array('FitnessCenter/trainerdetails/'.$model->id));}else{
                                    $transaction->rollback();
                                    throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
                                 }
			}
		}
            $this->render('trainers',array('details'=>$details,'model'=>$model));
        }
        /**
         * Save the user Trainer profile from backdoor
         */
        public function actionTrainerdetails($id){
           $details = TrainerDetails::model()->findByAttributes(array('user_id'=>$id));
           $details->setScenario('details');
           $avtar = $details->avtar;
//            $details->setScenario('profile');
            if(isset($_POST['ajax']) && $_POST['ajax']==='trainer-profile-forms')
                    {
                      echo CActiveForm::validate(array($details));
                      Yii::app()->end();
                    }
                     
            if (isset($_POST['TrainerDetails'])) {
                    $details->attributes=$_POST['TrainerDetails'];
                    $details->dob = date('Y/m/d H:i:s', strtotime($_POST['TrainerDetails']['dob']) );
                    if($_FILES['TrainerDetails']['name']['avtar'] != ''){
                        
                        $details->avtar = CUploadedFile::getInstanceByName('TrainerDetails[avtar]');
                            if ($details->avtar instanceof CUploadedFile) 
                                        {
                                 
                                        $imagename =   $details->user_id . '_' . $_FILES['TrainerDetails']['name']['avtar'];
                                        $thumbimagename = 'avtar' .'/thumb/'.  $details->user_id . '_' . $_FILES['TrainerDetails']['name']['avtar'];
                                        $details->avtar->saveAs('avtar' .'/'.$imagename);
                                        copy('avtar' .'/'.$imagename,$thumbimagename);
                                        //list($width, $height, $type, $attr) = getimagesize($filename);
                                        $image = Yii::app()->image->load('avtar'.'/'.$imagename);
                                        $image->resize(200, 200,Image::HEIGHT);
                                        $image->save();
                                        $image = Yii::app()->image->load($thumbimagename);
                                        $image->resize(100, 110);
                                        $image->save();
                                        $details->avtar = $imagename;
                                        //Update the avtar on ajax calls
                                        if($details->updateByPk($details->id,array('avtar'=>$imagename))){
                                            return $details->avtar;
                                            $avtar = $details->avtar;
                                        }else{ }
                                        
					}
                    }
                    
                    
                    if($details->validate()){ 
                        
                       $details->avtar = $avtar;
                       $details->status = 1;
                        if ($details->save()) {
                            Yii::app()->user->setFlash(TbHtml::ALERT_COLOR_SUCCESS,'<strong>Great!</strong> Registration Process is now completed.');
                            $this->redirect(array('Admin/TrainerAdmin'));
                            }else{ 
                                Yii::app()->user->setFlash(TbHtml::ALERT_COLOR_ERROR,'<strong>Oh Snap!</strong> Error occured.');
                                                                    Yii::app()->end(); 
                                   }
                              }
                          $this->render('_trainerprofileform',array('details'=>$details,'model'=>$model,'id'=>$id));

                       }
                       $this->render('_trainerprofileform',array('details'=>$details,'model'=>$model,'id'=>$id));
                       
         }
}