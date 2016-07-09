<?php 
Yii::import('zii.widgets.CPortlet');
 
class Stature extends CPortlet
{
    protected function renderContent()
	{
		//echo $homepage; die;
		$this->render('Stature');
	}
	
}