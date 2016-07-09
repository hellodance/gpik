<?php 
Yii::import('zii.widgets.CPortlet');
 
class Header extends CPortlet
{
    protected function renderContent()
	{
                 $form=new LoginForm;
                    if(isset($_POST['LoginForm']))
                    {
                        $form->attributes=$_POST['LoginForm'];
                        if($form->validate())
                            $this->controller->refresh();
                    }
		//echo $homepage; die;
		$this->render('Header',array('form'=>$form));
	}
	
}
