<?php
/* @var $this UsersController */
/* @var $model Users */
?>

<?php 
$details = new UserDetails;
$this->renderPartial('_form_1', array('model'=>$model,'details'=>$details)); ?>