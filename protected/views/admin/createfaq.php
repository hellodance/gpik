<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - FAQ';
$this->breadcrumbs=array('Faq');
?>

<h1>FAQ</h1>

<?php $this->renderPartial('_faqform', array('model'=>$model)); ?>
