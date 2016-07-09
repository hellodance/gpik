<?php 
Yii::import('zii.widgets.CPortlet');
 
class Footer extends CPortlet
{
    protected function renderContent()
	{
        $model=new Subsribers;
//		if(isset($_POST['Subsribers']))
//		{ 
//				  echo CActiveForm::validate($model);
//				  Yii::app()->end();
//		}
		//echo $homepage; die;
		$this->render('Footer',array('model'=>$model));
	}
	
}
