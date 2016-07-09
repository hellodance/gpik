<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Contact Us';
$this->breadcrumbs=array(
	'Contact',
);
?>
<?php $this->setPageTitle("Gympik- An end-to-end free online platform to help improving lifestyle choices.");?>
<div class="row-fluid">

    <div class="span12">
      <h1>Contact Us</h1>
    </div>
  </div>
  <div class="row-fluid">
    <div class="span7">
      <p>If you are interested in our services or you have any question? Please fill out the form below or e-mail us at <a href="mailto:contact@gympik.com">contact@gympik.com</a> and we will get back to you promptly regarding your request.</p>
      <?php $this->widget('bootstrap.widgets.TbAlert', array(
                'fade'=>true,
//                'closeText'=>'<div class="ok">ok</div>', //'<button type="button" class="close">×</button>',
//               'htmlOptions'=> array('class'=>'tbmain-alert')
                )); ?>
            <?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
                'id'=>'contact-form',
                    'enableClientValidation'=>true,
                    'clientOptions'=>array(
                            'validateOnSubmit'=>true,
                    ),'htmlOptions'=>array('class'=>'form-horizontal contact')
    )); ?>
     
    <fieldset>
     
    
     
   <?php echo $form->textFieldControlGroup($model, 'name',array('placeholder' => 'Name')); ?>
   <?php echo $form->textFieldControlGroup($model, 'email',array('placeholder' => 'Email')); ?>  
   <?php echo $form->textFieldControlGroup($model, 'telephone',array('placeholder' => 'Telephone')); ?>
   <?php echo $form->textAreaControlGroup($model, 'body',array('span' => 7, 'rows' => 3,'style'=>'width:83%')); ?>
       
     
    <div class="controls">           	         
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
    <?php $this->endWidget(); ?>
      
    </div>
    <div class="span5 contact-detail">
    	<div class="map">
            <iframe width="100%" height="206" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.co.in/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=4th+cross,+J.+P.+Nagar,+Phase+1st,+Bangalore+-+560078&amp;aq=&amp;sll=26.885211,75.790558&amp;sspn=0.369906,0.676346&amp;ie=UTF8&amp;hq=&amp;hnear=4th+Cross+Rd,+Vysya+Bank+Colony,+Phase+1,+J+P+Nagar,+Bangalore,+Bangalore+Urban,+Karnataka+560078&amp;t=m&amp;ll=12.915895,77.583733&amp;spn=0.068935,0.145912&amp;z=12&amp;output=embed"></iframe><br /><small><a href="https://maps.google.co.in/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=4th+cross,+J.+P.+Nagar,+Phase+1st,+Bangalore+-+560078&amp;aq=&amp;sll=26.885211,75.790558&amp;sspn=0.369906,0.676346&amp;ie=UTF8&amp;hq=&amp;hnear=4th+Cross+Rd,+Vysya+Bank+Colony,+Phase+1,+J+P+Nagar,+Bangalore,+Bangalore+Urban,+Karnataka+560078&amp;t=m&amp;ll=12.915895,77.583733&amp;spn=0.068935,0.145912&amp;z=12" style="color:#0000FF;text-align:left">View Larger Map</a></small>
        </div>
      	<ul>
        	<li>
            	<address>
                <strong>Gympik Health Solutions Pvt. Ltd.</strong><br/>
                14th cross, J. P. Nagar, Phase 1st,<br/>        
                Bangalore - 560078<br/>
              	India.
              </address>
            </li>
            <li>
            	<div class="phone"><i></i>+91 80506 32100</div>
                <div class="email"><i></i>contact@gympik.com</div>
            </li>
        </ul>
    </div>
  </div>

