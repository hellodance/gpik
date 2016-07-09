<?php
 
// this file must be stored in:
// protected/components/WebUser.php
 
class WebUser extends CWebUser {
 
  // Store model to not repeat query.
  private $_model;
 
  // Return first name.
  // access it by Yii::app()->user->first_name
 /*function getFirst_Name(){
    $user = $this->loadUser(Yii::app()->user->id);
    return $user->first_name;
  }*/
 
  // This is a function that checks the field 'role'
  // in the User model to be equal to 1, that means it's admin
  // access it by Yii::app()->user->isAdmin()
 function isAdmin(){
    $user = $this->loadUser(Yii::app()->user->id);
    return intval($user->mas_role_id) == 1;
    
  }
  
  public  function isTrainer(){
      $user = $this->loadUser(Yii::app()->user->id);
      return intval($user->mas_role_id) == 2;
  }
  function isUser(){
      $user = $this->loadUser(Yii::app()->user->id);
      return intval($user->mas_role_id) == 3;
  }
    function adminEmail(){
     $setting = Settings::model()->findByAttributes(array('attribute'=>'admin_email'));
     return $setting->value;
  }
  function getProfile_Image(){
      $users= $this->loadUser(Yii::app()->user->id);
      if($users->mas_role_id == 3){
        $model  = UserDetails::model()->findByAttributes(array('user_id'=>Yii::app()->user->id));
        }
      else{
      if($users->mas_role_id == 2)
          $model  = TrainerDetails::model()->findByAttributes(array('user_id'=>$users->id));
      }
       
      return $model->avtar;
  }

  // Load user model.
  protected function loadUser($id=null)
      {
	
	  if($this->_model===null)
	  {
	      if($id!==null)
		  $this->_model=Users::model()->findByPk($id);
	  }
	  return $this->_model;
      }
}
