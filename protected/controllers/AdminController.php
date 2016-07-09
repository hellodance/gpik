<?php

class AdminController extends Controller {

    public $layout = '//layouts/adminlayout';

    public function filters() {
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
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array( 'index', 
                                    'createfaq', 
                                    'Faqadmin', 
                                    'deletefaq', 
                                    'updatefaq',
                                    'faqtoggle', 
                                    'newsadmin', 
                                    'newstoggle', 
                                    'createnews', 
                                    'deletenews', 
                                    'updatenews', 
                                    'admin', 
                                    'guidetoggle', 
                                    'guideadmin', 
                                    'createguide', 
                                    'updateguide', 
                                    'deleteguide', 
                                    'traineradmin', 
                                    'Trainertoggle', 
                                    'Updatetrainer', 
                                    'Useradmin', 
                                    'Usertoggle', 
                                    'Updateuser', 
                                    'Foodmanagement', 
                                    'Notifymsg', 
                                    'Assigntrainer', 
                                    'Notifytoggle', 
                                    'Foodtypeadmin',
                                    'deletetrainer',
                                    'deleteuser',
                                    'getGenders',
                                    'Saveguideimg',
                                    'Addfoodtype',
                                    'Addfooditem',
                                    'Updatefooditem',
                                    'Foodtoggle',
                                    'Foodtypetoggle',
                                    'Updatefoodtype',
                                    'Deletefoodtype',
                                    'Deletefooditems',
                                    'Quotemanagement',
                                    'Quotetoggle',
                                    'Addquote',
                                    'Updatequote',
                                    'Deletequote',
                                    'saveavtar',
                                    'Rolemanagement','Addrole','Updaterole','Deleterole','Workmanagement',
                                    'Worktoggle','Updateworkouts','Addworktype','Addworkouts','Worktypeadmin',
                                    'Updateworktype','Worktypetoggle','Deleteworktype','Deleteworkouts'),
                'users'=>array('admin@gympik.com','kanika@gympik.com','amresh@gympik.com','sudhanshu@gympik.com','ajay@gympik.com'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create','update'),
                'users' => array('admin@gympik.com'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin','delete'),
                'users' => array('admin@gympik.com'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function actionIndex() {

        $this->render('index');
    }

    /**
     * Render the Admin Board to manage actions.
     */
    public function actionAdmin() {
        TrainerClientMsg::model()->findAllByAttributes(array('reqtojoin'=>0));
        $this->render('admin');
    }

    /**
     * Creates a new Faq model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreatefaq() {
        $model = new GpFaq;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['GpFaq'])) {
            $model->attributes = $_POST['GpFaq'];
            if ($model->save()) {
                $this->redirect('faqadmin');
            }
        }

        $this->render('createfaq', array(
            'model' => $model,
        ));
    }

    /**
     * Manages Faq models.
     */
    public function actionFaqadmin() {
        $model = new GpFaq('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['GpFaq'])) {
            $model->attributes = $_GET['GpFaq'];
        }

        $this->render('faqadmin', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDeletefaq($id) {
        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            GpFaq::model()->findByPk($id)->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax'])) {
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
            }
        } else {
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
        }
    }
    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDeletetrainer($id) {
        $trainers = TrainerDetails::model()->findByPk($id);
        $users = Users::model()->findByPk($trainers->user_id);
        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
           if( TrainerDetails::model()->findByPk($id)->delete(false)){
               $users->delete();
           }

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax'])) {
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
            }
        } else {
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
        }
    }
    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDeleteuser($id) {
        $details = UserDetails::model()->findByPk($id);
        $users = Users::model()->findByPk($details->user_id);
        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
           if( UserDetails::model()->findByPk($id)->delete(false)){
               $users->delete();
           }

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax'])) {
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
            }
        } else {
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
        }
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdatefaq($id) {
        $model = GpFaq::model()->findByPk($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['GpFaq'])) {
            $model->attributes = $_POST['GpFaq'];
            if ($model->save()) {
                $this->redirect(array('faqadmin', 'id' => $model->id));
            }
        }

        $this->render('updatefaq', array(
            'model' => $model,
        ));
    }

    /**
     * Update the status of the Faq on click on toggle button via faq Grid view
     * @param $id integer ID of the particular model.
     */
    public function actionFaqtoggle($id) {
        $model = GpFaq::model()->findByPk($id);
        if ($model->status == 1) {
            GpFaq::model()->updateByPk($id, array('status' => '0'));
        } else {
            GpFaq::model()->updateByPk($id, array('status' => '1'));
        }
    }

    /**
     * Manages News models.
     */
    public function actionNewsadmin() {
        $model = new News('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['News'])) {
            $model->attributes = $_GET['News'];
        }

        $this->render('newsadmin', array(
            'model' => $model,
        ));
    }

    /**
     * Update the status of the Faq on click on toggle button via faq Grid view
     * @param $id integer ID of the particular model.
     */
    public function actionNewstoggle($id) {
        $model = News::model()->findByPk($id);
        if ($model->status == 1) {
            News::model()->updateByPk($id, array('status' => '0'));
        } else {
            News::model()->updateByPk($id, array('status' => '1'));
        }
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdatenews($id) {
        $model = News::model()->findByPk($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['News'])) {
            $model->attributes = $_POST['News'];
            if ($model->save()) {
                $this->redirect(array('newsadmin', 'id' => $model->id));
            }
        }

        $this->render('updatenews', array(
            'model' => $model,
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreatenews() {
        $model = new News;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['News'])) {
            $model->attributes = $_POST['News'];
            if ($model->save()) {
                $this->redirect(array('newsadmin', 'id' => $model->id));
            }
        }

        $this->render('createnews', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDeletenews($id) {
        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            News::model()->findByPk($id)->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax'])) {
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
            }
        } else {
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
        }
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreateguide() {
        $model = new Guide;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Guide'])) {
            $model->attributes = $_POST['Guide'];
            $model->setAttribute('thumb',$_POST['guideThumb']);
            if ($model->save()) {
                $this->redirect(array('guideadmin','id' => $model->id));
            }
        }

        $this->render('createguide', array(
            'model' => $model,
        ));
    }

    /**
     * Manages News models.
     */
    public function actionGuideadmin() {
        $model = new Guide('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Guide'])) {
            $model->attributes = $_GET['Guide'];
        }

        $this->render('guideadmin', array(
            'model' => $model,
        ));
    }

    /**
     * Update the status of the Guide on click on toggle button via faq Grid view
     * @param $id integer ID of the particular model.
     */
    public function actionGuidetoggle($id) {
        $model = Guide::model()->findByPk($id);
        if ($model->status == 1) {
            Guide::model()->updateByPk($id, array('status' => '0'));
        } else {
            Guide::model()->updateByPk($id, array('status' => '1'));
        }
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdateguide($id) {
        $model = Guide::model()->findByPk($id);
        
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        if(!empty($_POST['guideThumb'])){
            if($model->thumb!=''){
                unlink('guide/'.$model->thumb);
            }
        }
        if (isset($_POST['Guide'])){ 
            $model->setAttribute('title',$_POST['Guide']['title']);
            $model->setAttribute('article',$_POST['Guide']['article']);
            $model->setAttribute('excerpt',$_POST['Guide']['excerpt']);
            if(!empty($_POST['guideThumb'])){
                //echo "hi";die;
                $model->setAttribute('thumb',$_POST['guideThumb']);
            }else{
                //echo "hello";die;
                $model->setAttribute('thumb',$model->thumb);
            }
            if ($model->save()) {
                $this->redirect(array('guideadmin'));
            }
        }

        $this->render('updateguide', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDeleteguide($id) {
        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            Guide::model()->findByPk($id)->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax'])) {
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
            }
        } else {
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
        }
    }
    
    
    
    public function actionSaveguideimg(){
            $model = new Guide();
            $avtar = $model->thumb;
            if (isset($_POST['Guide'])) {
                    
                    $model->attributes=$_POST['Guide'];
                    if($_FILES['Guide']['name']['thumb'] != ''){
                         $model->thumb = CUploadedFile::getInstanceByName('Guide[thumb]');
                            if ($model->thumb instanceof CUploadedFile) 
                                        {
                                        $imagename = 'guide' .'/'. $_FILES['Guide']['name']['thumb'];
                                        $model->thumb->saveAs($imagename);
                                        //list($width, $height, $type, $attr) = getimagesize($filename);
                                        $image = Yii::app()->image->load($imagename);
                                        $image->resize(600, 400,Image::HEIGHT);
                                        $image->save();
                                        $model->thumb = $imagename;
                                        //Update the avtar on ajax calls
                                        if($model->updateByPk($model->id,array('thumb'=>$imagename))){
                                            return $model->thumb;
                                        }else{ }
                                        
					}
                    }else $model->thumb = $avtar;
                   
             }
              echo CActiveForm::validate(array($model));
                        Yii::app()->end();
                        
                    
                    
        }
    
    public function actionTraineradmin() {
        $models = new TrainerDetails('Adminsearch');
        $models->unsetAttributes();  // clear any default values
        if (isset($_GET['TrainerDetails'])) {
            $models->attributes = $_GET['TrainerDetails'];
        }

        $this->render('traineradmin', array(
            'model' => $models,
        ));
    }

    public function actionTrainertoggle($id) {
        $model = TrainerDetails::model()->findByPk($id);
        if ($model->status == 1) {
            TrainerDetails::model()->updateByPk($id, array('status' => '0'));
        } else {
            TrainerDetails::model()->updateByPk($id, array('status' => '1'));
        }
    }

    public function actionUpdatetrainer($id) {
        $model = TrainerDetails::model()->findByPk($id);
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        //echo "<pre>";print_r($_POST);die;
        if (isset($_POST['TrainerDetails'])) {
            $dob =date('Y/m/d H:i:s', strtotime($_POST['TrainerDetails']['dob']) );
            $model->attributes = $_POST['TrainerDetails'];
            $model->setAttribute('second_type_id',$_POST['TrainerDetails']['second_type_id']);
            $model->setAttribute('dob',$dob);
            $model->setAttribute('emp_1',$_POST['TrainerDetails']['emp_1']);
            $model->setAttribute('emp_2',$_POST['TrainerDetails']['emp_2']);
            $model->setAttribute('exp_1',$_POST['TrainerDetails']['exp_1']);
            $model->setAttribute('exp_2',$_POST['TrainerDetails']['exp_2']);
            $model->setAttribute('fb_link',$_POST['TrainerDetails']['fb_link']);
            $model->setAttribute('avtar',$_POST['avtar']);
            if ($model->save()) {
                $this->redirect(array('traineradmin'));
            }
        }

        $this->render('updatetrainer', array(
            'model' => $model,
        ));
    }
     public function actionsaveavtar($id){
          $model = TrainerDetails::model()->findByPk($id);
         if($_FILES['TrainerDetails']['name']['avtar'] != ''){
                        $model->avtar = CUploadedFile::getInstanceByName('TrainerDetails[avtar]');
                            if ($model->avtar instanceof CUploadedFile) 
                                        {
                                        $imagename = $model->user_id . '_' . $_FILES['TrainerDetails']['name']['avtar'];
                                        $thumbimagename = 'avtar' .'/thumb/'.  $model->user_id . '_' . $_FILES['TrainerDetails']['name']['avtar'];
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
    }
    public function actionUseradmin() {
        $model = new UserDetails('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['UserDetails'])) {
            $model->attributes = $_GET['UserDetails'];
        }

        $this->render('usersadmin', array(
            'model' => $model,
        ));
    }
    public function getGenders($data,$row) {
       if($data->gender == '1'){
                return 'Male';
            }
           if($data->gender == '0'){
                return 'Female';
            } 
            
    }

    public function actionUpdateuser($id) {
        $model = Users::model()->findByPk($id);
        $userdetail = UserDetails::model()->findByAttributes(array('user_id' => $id));
        if (isset($_POST['Users'])) {
            $model->setAttribute('email', $_POST['Users']['email']);
            $userdetail->setAttribute('fname', $_POST['UserDetails']['fname']);
            $userdetail->setAttribute('lname', $_POST['UserDetails']['lname']);
            $userdetail->setAttribute('mobile_no', $_POST['UserDetails']['mobile_no']);
            $userdetail->setAttribute('description', $_POST['UserDetails']['description']);
            $userdetail->setAttribute('address', $_POST['UserDetails']['address']);
            $userdetail->setAttribute('city_id', $_POST['UserDetails']['city_id']);
            $userdetail->setAttribute('pincode', $_POST['UserDetails']['pincode']);
            if ($model->save()) {
                if ($userdetail->save()) {
                    $this->redirect(array('useradmin'));
                }
            }
        }
        $this->render('updateuser', array(
            'model' => $model,
        ));
    }

    public function actionUsertoggle($id) {
        $model = Users::model()->findByPk($id);
        if ($model->status == 1) {
            Users::model()->updateByPk($id, array('status' => '0'));
        } else {
            Users::model()->updateByPk($id, array('status' => '1'));
        }
    }
    /**
     * Get the listing of food items in admin panel
     */
    public function actionFoodmanagement() {
        $model = new FoodItems;
        $fdtypemodel = new Foodtype;
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['FoodItems'])) {
            $model->attributes = $_GET['FoodItems'];
        }
        $this->render('foodmanagement', array(
            'model' => $model, 'fdtypemodel' => $fdtypemodel
        ));
    }
   
    
    /**@List Food Type*/
    public function actionFoodtypeadmin() {
        $model = new Foodtype;
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Foodtype'])) {
            $model->attributes = $_GET['Foodtype'];
        }
        $this->render('foodtype', array(
            'model' => $model,
        ));
    }
    
    
    /**@Update Food Type*/
    public function actionAddfoodtype() {
        $model = new Foodtype;
        if(isset($_POST['ajax']) && $_POST['ajax']==='foodtype-form'){
          echo CActiveForm::validate(array($model));
          Yii::app()->end();
        }
        if (isset($_POST['Foodtype'])) {
            $model->attributes = $_POST['Foodtype'];
            $model->setAttribute('adddate',date('Y-m-d H:i:s'));
            if ($model->save()) {
                $this->redirect(array('foodmanagement'));
            }
        }
        echo CActiveForm::validate(array($model));
          Yii::app()->end();
    }
   
    /**@Add Food Items*/
    public function actionAddfooditem() {
        $model = new Fooditems;
        if(isset($_POST['ajax']) && $_POST['ajax']==='fooditem-form'){
          echo CActiveForm::validate(array($model));
          Yii::app()->end();
        }
        if (isset($_POST['FoodItems'])) {
            $model->attributes = $_POST['FoodItems'];
            if ($model->save()) {
                $this->redirect(array('foodmanagement'));
            }
        }
        echo CActiveForm::validate(array($model));
          Yii::app()->end();
    }
    
    /**@Update Food Items*/
    
    public function actionUpdatefooditem($id) {
        $model = Fooditems::model()->findByPk($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        if (isset($_POST['FoodItems'])) {
            $model->attributes = $_POST['FoodItems'];
            if ($model->save()) {
                $this->redirect(array('foodmanagement'));
            }
        }

        $this->render('updatefooditem', array(
            'model' => $model,
        ));
    }
    
    /**@Update Food Type*/     
    public function actionUpdatefoodtype($id) {
        $model = Foodtype::model()->findByPk($id);
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        if (isset($_POST['Foodtype'])) {
            $model->attributes = $_POST['Foodtype'];
            if ($model->save()) {
                $this->redirect(array('Foodtypeadmin'));
            }
        }
        
        $this->render('updatefoodtype', array(
            'model' => $model,
        ));
    }
    
    /*Delete Food Items*/
    public function actionDeletefooditems($id) {
        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            Fooditems::model()->findByPk($id)->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax'])) {
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
            }
        } else {
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
        }
    }
    
    
    /*Delete Food Type*/
    public function actionDeletefoodtype($id) {
        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            Foodtype::model()->findByPk($id)->delete();
            $fooditems = Fooditems::model()->findAllByAttributes(array('food_typeid'=>$id));
            if(!empty($fooditems)){
                foreach($fooditems as $food){
                    $food->delete();
                }
            }
            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax'])) {
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
            }
        } else {
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
        }
    }
    
        
    /**@Change Status of Food Items*/     
    public function actionFoodtoggle($id) {
        $model = Fooditems::model()->findByPk($id);
        if ($model->status == 1) {
            Fooditems::model()->updateByPk($id, array('status' => '0'));
        } else {
            Fooditems::model()->updateByPk($id, array('status' => '1'));
        }
    }
    
    
    
    /**@Change status of Food Type*/
    public function actionFoodtypetoggle($id) {
        $model = Foodtype::model()->findByPk($id);
        if ($model->status == 1) {
            Foodtype::model()->updateByPk($id, array('status' => '0'));
        } else {
            Foodtype::model()->updateByPk($id, array('status' => '1'));
        }
    }
    
    
    /* List Quotes */
    public function actionQuotemanagement() {
        $model = new Dashboardquote('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Dashboardquote'])) {
            $model->attributes = $_GET['Dashboardquote'];
        }
        $this->render('quotemanagement', array(
            'model' => $model
        ));
    }
    
    public function subquote($data,$row){
        return substr($data->quote,0,50)."...";
    }
    
    
    /**@Add Food Items*/
    public function actionAddquote() {
        $model = new Dashboardquote;
        if(isset($_POST['ajax']) && $_POST['ajax']==='quote-form'){
          echo CActiveForm::validate(array($model));
          Yii::app()->end();
        }
        if(isset($_POST['Dashboardquote'])){
            $model->setAttribute('quote',$_POST['Dashboardquote']['quote']);
            $model->setAttribute('showon',$_POST['Dashboardquote']['showon']);
            if($model->save()){
                $this->redirect(array('Quotemanagement'));
            }    
        }
        echo CActiveForm::validate(array($model));
        Yii::app()->end();
    }
    
    
    /**@Update Quote*/     
    public function actionUpdatequote($id) {
        $model = Dashboardquote::model()->findByPk($id);
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        if (isset($_POST['Dashboardquote'])){
           $model->setAttribute('quote',$_POST['Dashboardquote']['quote']);
           $model->setAttribute('showon',$_POST['Dashboardquote']['showon']);
           if($model->save()){
               $this->redirect(array('Quotemanagement'));
           }
        }
        $this->render('updatequote', array('model'=>$model));
    }
    
    /**@Delete Quote*/
     public function actionDeletequote($id) {
        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            Dashboardquote::model()->findByPk($id)->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax'])) {
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
            }
        } else {
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
        }
    }
    
    
    /**@Change status of Quote Type*/
    public function actionQuotetoggle($id) {
        $model = Dashboardquote::model()->findByPk($id);
        if ($model->status == 1) {
            Dashboardquote::model()->updateByPk($id, array('status' => '0'));
        } else {
            Dashboardquote::model()->updateByPk($id, array('status' => '1'));
        }
    }
    
    /**
         * Listing of Messages for assignment of user/trainer
         */
    
    public function actionNotifymsg() {
        $model = new TrainerClientMsg('notifysearch');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['UsersDetail'])) {
            $model->attributes = $_GET['UsersDetail'];
        }

        $this->render('notifymsg', array(
            'model' => $model,
        ));
    }
    /**
     * Assign a particular trainer to his requested client
     * @param integer $id Primary key of TrainerClient message table
     */
    public function actionAssigntrainer($id) {
        $model = TrainerClientMsg::model()->findByPk($id);
        $trainerid = Users::model()->findByPk($model->from_sender);
        $clientid = Users::model()->findByPk($model->to_receiver);
        date_default_timezone_set('Asia/Kolkata');
        $date = date('Y-m-d H:i(worry)');
        $assinedmodel = new TrainerClients;
        $assinedmodel->setAttribute('trainer_id', $trainerid->id);
        $assinedmodel->setAttribute('user_id', $clientid->id);
        $assinedmodel->setAttribute('adddate', $date);
        $assinedmodel->setAttribute('status', 1);
        if ($assinedmodel->save(false)) {
            $model->setAttribute('reqtojoin', 3);
            if ($model->save(false)) {
                echo 'success';
            } else {
                echo 'error';
            }
        }

//            $this->render('assigntrainer',array('model'=>$model,));
    }
    /**
     * Making the particualr message State Active/ Inactive at admin panel
     * @param Integer $id Primary key of TrainerClient message table
     */
    public function actionNotifytoggle($id) {
        $model = TrainerClientMsg::model()->findByPk($id);
        if ($model->status == 1) {
            TrainerClientMsg::model()->updateByPk($id, array('status' => '0'));
        } else {
            TrainerClientMsg::model()->updateByPk($id, array('status' => '1'));
        }
    }
    
    /* List role */
    public function actionRolemanagement(){
        $model = new Masroles('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Masroles'])) {
            $model->attributes = $_GET['Masroles'];
        }
        $this->render('rolemanagement', array(
            'model' => $model
        ));
    }
    
    /* Add role */
    public function actionAddrole() {
        $model = new Masroles;
        if(isset($_POST['ajax']) && $_POST['ajax']==='role-form'){
          echo CActiveForm::validate(array($model));
          Yii::app()->end();
        }
        if (isset($_POST['Masroles'])){
            $model->attributes = $_POST['Masroles'];
            if ($model->save()) {
                $this->redirect(array('rolemanagement'));
            }
        }
        echo CActiveForm::validate(array($model));
          Yii::app()->end();
    }
    
    /* Update Role*/
    public function actionUpdaterole($id) {
        $model = Masroles::model()->findByPk($id);
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        if (isset($_POST['Masroles'])) {
            $model->attributes = $_POST['Masroles'];
            if ($model->save()) {
                $this->redirect(array('rolemanagement'));
            }
        }
        
        $this->render('updaterole', array(
            'model' => $model,
        ));
    }

    
    /**@Delete Role*/
     public function actionDeleterole($id) {
        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            Masroles::model()->findByPk($id)->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax'])) {
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
            }
        } else {
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
        }
    }
    
    
    
    /**
     * Get the listing of Work Out in admin panel
     */
    public function actionWorkmanagement() {
        $model = new Workouts;
        $wktypemodel = new Worktype;
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Workouts'])) {
            $model->attributes = $_GET['Workouts'];
        }
        $this->render('workmanagement', array(
            'model' => $model, 'wktypemodel' => $wktypemodel
        ));
    }
   
    
    /**@List Food Type*/
    public function actionWorktypeadmin() {
        $model = new Worktype;
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Worktype'])) {
            $model->attributes = $_GET['Worktype'];
        }
        $this->render('worktype', array(
            'model' => $model,
        ));
    }
    
    
    /**@Update Food Type*/
    public function actionAddworktype() {
        $model = new Worktype;
        if(isset($_POST['ajax']) && $_POST['ajax']=='worktype-form'){
          echo CActiveForm::validate(array($model));
          Yii::app()->end();
        }
        if (isset($_POST['Worktype'])) {
            $model->attributes = $_POST['Worktype'];
            $model->setAttribute('adddate',date('Y-m-d H:i:s'));
            if ($model->save()) {
                $this->redirect(array('workmanagement'));
            }
        }
        echo CActiveForm::validate(array($model));
          Yii::app()->end();
    }
   
    /**@Add Food Items*/
    public function actionAddworkouts() {
        $model = new Workouts;
        if(isset($_POST['ajax']) && $_POST['ajax']==='workouts-form'){
          echo CActiveForm::validate(array($model));
          Yii::app()->end();
        }
        if (isset($_POST['Workouts'])) {
            $model->attributes = $_POST['Workouts'];
            if ($model->save()) {
                $this->redirect(array('workmanagement'));
            }
        }
        echo CActiveForm::validate(array($model));
          Yii::app()->end();
    }
    
    /**@Update Food Items*/
    
    public function actionUpdateworkouts($id) {
        $model = Workouts::model()->findByPk($id);
        
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        if (isset($_POST['Workouts'])) {
            $model->attributes = $_POST['Workouts'];
            if ($model->save()) {
                $this->redirect(array('workmanagement'));
            }
        }

        $this->render('updateworkout', array(
            'model' => $model,
        ));
    }
    
    /**@Update Food Type*/     
    public function actionUpdateworktype($id) {
        $model = Worktype::model()->findByPk($id);
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        if (isset($_POST['Worktype'])) {
            $model->attributes = $_POST['Worktype'];
            if ($model->save()) {
                $this->redirect(array('worktypeadmin'));
            }
        }
        
        $this->render('updateworktype', array(
            'model' => $model,
        ));
    }
    
    /*Delete Food Items*/
    public function actionDeleteworkouts($id) {
        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            Workouts::model()->findByPk($id)->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax'])) {
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
            }
        } else {
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
        }
    }
   
    
    /*Delete Food Type*/
    public function actionDeleteworktype($id) {
        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            Worktype::model()->findByPk($id)->delete();
            $workout = Workouts::model()->findAllByAttributes(array('worktype_id'=>$id));
            if(!empty($workout)){
                foreach($workout as $work){
                    $work->delete();
                }
            }
            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax'])) {
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
            }
        } else {
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
        }
    }
    
        
    /**@Change Status of Food Items*/     
    public function actionWorktoggle($id) {
        $model = Workouts::model()->findByPk($id);
        if ($model->status == 1) {
            Workouts::model()->updateByPk($id, array('status' => '0'));
        } else {
            Workouts::model()->updateByPk($id, array('status' => '1'));
        }
    }
    
    
    
    /**@Change status of Food Type*/
    public function actionWorktypetoggle($id) {
        $model = Worktype::model()->findByPk($id);
        if ($model->status == 1) {
            Worktype::model()->updateByPk($id, array('status' => '0'));
        } else {
            Worktype::model()->updateByPk($id, array('status' => '1'));
        }
    }
     
}

?>