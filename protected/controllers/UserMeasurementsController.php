<?php

class UserMeasurementsController extends Controller
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
				'actions'=>array('create','update','addmeasurements','deletemeasurement','editweight','editarms','editcalves','editchest','editforearms','edithips','editneck','editthighs','addnotes'),
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
		$model=new UserMeasurements;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['UserMeasurements'])) {
			$model->attributes=$_POST['UserMeasurements'];
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

		if (isset($_POST['UserMeasurements'])) {
			$model->attributes=$_POST['UserMeasurements'];
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
		$dataProvider=new CActiveDataProvider('UserMeasurements');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new UserMeasurements('search');
		$model->unsetAttributes();  // clear any default values
		if (isset($_GET['UserMeasurements'])) {
			$model->attributes=$_GET['UserMeasurements'];
		}

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return UserMeasurements the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=UserMeasurements::model()->findByPk($id);
		if ($model===null) {
			throw new CHttpException(404,'The requested page does not exist.');
		}
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param UserMeasurements $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax']==='user-measurements-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        /**
         * Add new measurement record to the users on the current date (if already exist then update the old record)
         */
        public function actionAddmeasurements(){


		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['UserMeasurements'])) {
                    
                    $model = UserMeasurements::model()->findByAttributes(array('user_id'=>Yii::app()->user->id,'adddate'=>date('Y-m-d H:i:s', strtotime($_POST['measuredate']))));
                    $date = date('Y-m-d H:i:s', strtotime($_POST['measuredate']));
                    $weight = $model->weight;
                    if($model->adddate == $date){
                        
                                $model->attributes=$_POST['UserMeasurements'];
                                if(!empty($_POST['UserMeasurements']['weight'])){
                                    $model->setAttribute('weight',$_POST['UserMeasurements']['weight']);
                                }else{
                                    $model->setAttribute('weight',$weight);
                                }
                                $model->setAttribute('user_id',Yii::app()->user->id);
                                $model->setAttribute('adddate',date('Y/m/d H:i:s', strtotime($_POST['measuredate']) ));
                                    if ($model->save())
                                                $url = Yii::app()->createUrl('users/userdashboard')."#measurement";
                                                $this->redirect($url);
                                                //$this->redirect(array('users/userdashboard'));
                                                //$this->redirect(array('users/userdashboard','id'=>Yii::app()->user->id));
                                                          
                    }else{
                        $model=new UserMeasurements;
                        $model->attributes=$_POST['UserMeasurements'];
                        $model->setAttribute('user_id',Yii::app()->user->id);
                        $model->setAttribute('adddate',date('Y/m/d H:i:s', strtotime($_POST['measuredate']) ));
                        if($model->validate()){
                                if ($model->save()) {
                                        $url = Yii::app()->createUrl('users/userdashboard')."#measurement";
                                            $this->redirect($url);
                                            //$this->redirect(array('users/userdashboard'));
                                        //$this->redirect(array('users/userdashboard','id'=>Yii::app()->user->id));
                                }
                        
                            }
                        }
                 }
        }
        /**
         * Delete the measurement recode via measurement grid on the dashboard option
         * @param $id(int) Primary key of the particular
         */
        public function actionDeletemeasurement($id){
            if (Yii::app()->request->isPostRequest) {
			// we only allow deletion via POST request
                $model = UserMeasurements::model()->findByPk($id);
                $model->delete();
            }
        }
        /**
         * Edit the current Weight in the dashboard grid
         */
        public function actionEditweight()
        {
            if(isset($_POST['pk'])){
            $model = UserMeasurements::model()->findByPk($_POST['pk']);
            $model->weight = $_POST['value'];
            if($model->validate()){
                $model->save();
                }
                else{
                    throw new CHttpException(400,$model->getError('weight'));
                    Yii::app()->end();
                }
            }
        }
         /**
         * Edit the current Arms in the dashboard grid
         */
        public function actionEditarms()
        {
            if(isset($_POST['pk'])){
            $model = UserMeasurements::model()->findByPk($_POST['pk']);
            $model->arms = $_POST['value'];
            if($model->validate()){
                $model->save();
                }
                else{
                    throw new CHttpException(400,$model->getError('arms'));
                    Yii::app()->end();
                }
            }
        }
        /**
         * Edit the current Calves in the dashboard grid
         */
        public function actionEditcalves()
        {
            if(isset($_POST['pk'])){
            $model = UserMeasurements::model()->findByPk($_POST['pk']);
            $model->calves = $_POST['value'];
            if($model->validate()){
                $model->save();
                }
                else{
                    throw new CHttpException(400,$model->getError('calves'));
                    Yii::app()->end();
                }
            }
        }
        /**
         * Edit the current Chest in the dashboard grid
         */
        public function actionEditchest()
        {
            if(isset($_POST['pk'])){
            $model = UserMeasurements::model()->findByPk($_POST['pk']);
            $model->chest = $_POST['value'];
            if($model->validate()){
                $model->save();
                }
                else{
                    throw new CHttpException(400,$model->getError('chest'));
                    Yii::app()->end();
                }
            }
        }
        /**
         * Edit the current Forearms in the dashboard grid
         */
        public function actionEditforearms()
        {
            if(isset($_POST['pk'])){
            $model = UserMeasurements::model()->findByPk($_POST['pk']);
            $model->forearms = $_POST['value'];
            if($model->validate()){
                $model->save();
                }
                else{
                    throw new CHttpException(400,$model->getError('forearms'));
                    Yii::app()->end();
                }
            }
        }
        /**
         * Edit the current Hips in the dashboard grid
         */
        public function actionEdithips()
        {
            if(isset($_POST['pk'])){
            $model = UserMeasurements::model()->findByPk($_POST['pk']);
            $model->hips = $_POST['value'];
            if($model->validate()){
                $model->save();
                }
                else{
                    throw new CHttpException(400,$model->getError('hips'));
                    Yii::app()->end();
                }
            }
        }
        /**
         * Edit the current Neck in the dashboard grid
         */
        public function actionEditneck()
        {
            if(isset($_POST['pk'])){
            $model = UserMeasurements::model()->findByPk($_POST['pk']);
            $model->neck = $_POST['value'];
            if($model->validate()){
                $model->save();
                }
                else{
                    throw new CHttpException(400,$model->getError('neck'));
                    Yii::app()->end();
                }
            }
        }
        /**
         * Edit the current thighs in the dashboard grid
         */
        public function actionEditthighs()
        {
            if(isset($_POST['pk'])){
            $model = UserMeasurements::model()->findByPk($_POST['pk']);
            $model->thighs = $_POST['value'];
            if($model->validate()){
                $model->save();
                }
                else{
                    throw new CHttpException(400,$model->getError('thighs'));
                    Yii::app()->end();
                }
            }
        }
        /**
         * Add User Notes
         */
        public function actionAddnotes(){
            if(!empty($_POST['notes'])){
           $model = UserMeasurements::model()->findByAttributes(array('user_id'=>Yii::app()->user->id,'adddate'=>date('Y-m-d H:i:s', strtotime($_POST['mdate']))));
                    $date = date('Y-m-d H:i:s', strtotime($_POST['mdate']));
                    
                    if($model->adddate == $date){
                                $model->setAttribute('mnotes',trim($_POST['notes']));
                                  $model->save();
                                  echo 'Note saved successfully.';
//                                  Yii::app()->user->setFlash(TbHtml::ALERT_COLOR_SUCCESS,'<strong>Submitted Successfully!</strong>.');
                                                //$this->redirect(array('users/userdashboard','id'=>Yii::app()->user->id));
                                                          
                    } else {
                        $model=new UserMeasurements;
                        $model->attributes=$_POST['UserMeasurements'];
                        $model->setAttribute('user_id',Yii::app()->user->id);
                        $model->setAttribute('adddate',date('Y/m/d H:i:s', strtotime($_POST['mdate']) ));
                        $model->setAttribute('mnotes',trim($_POST['notes']));
                        if($model->validate()){
                                if ($model->save()) {
                                        echo '<h3>Note saved successfully.</h3>';
                                       // $this->redirect(array('users/userdashboard','id'=>Yii::app()->user->id));
                                }
                        
                            }
                        }
                 }else { echo 'Please Write Something.'; }
        }
}