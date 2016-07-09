<style>
    .leftactions{width: 40%;margin: 8px;min-height: 200px;float: left; }
    .rightaction{width: 40%;margin: 8px;min-height: 200px;float: left; }
</style>
<div class="leftactions">
    <?php echo TbHtml::linkbutton('Faq Admin',array('url'=> Yii::app()->createUrl('Admin/Faqadmin'),'block' => true, 'color' => TbHtml::BUTTON_COLOR_PRIMARY, 'size'=>TbHtml::BUTTON_SIZE_LARGE)); ?>

    <?php echo TbHtml::linkbutton('Trainers Admin',array('url'=> Yii::app()->createUrl('Admin/Traineradmin'),'block' => true, 'color' => TbHtml::BUTTON_COLOR_PRIMARY, 'size'=>TbHtml::BUTTON_SIZE_LARGE)); ?>
    <?php echo TbHtml::linkbutton('Users Admin',array('url'=> Yii::app()->createUrl('Admin/Useradmin'),'block' => true, 'color' => TbHtml::BUTTON_COLOR_PRIMARY, 'size'=>TbHtml::BUTTON_SIZE_LARGE)); ?>
    <?php echo TbHtml::linkbutton('News Admin',array('url'=> Yii::app()->createUrl('Admin/Newsadmin'),'block' => true, 'color' => TbHtml::BUTTON_COLOR_PRIMARY, 'size'=>TbHtml::BUTTON_SIZE_LARGE)); ?>
    <?php echo TbHtml::linkbutton('Guide Admin',array('url'=> Yii::app()->createUrl('Admin/guideadmin'),'block' => true, 'color' => TbHtml::BUTTON_COLOR_PRIMARY, 'size'=>TbHtml::BUTTON_SIZE_LARGE)); ?>
    
</div>
<div class="rightaction">
<?php echo TbHtml::linkbutton('Quote Management',array('url'=> Yii::app()->createUrl('Admin/quotemanagement'),'block' => true, 'color' => TbHtml::BUTTON_COLOR_PRIMARY, 'size'=>TbHtml::BUTTON_SIZE_LARGE)); ?>
<?php echo TbHtml::linkbutton('Food Management',array('url'=> Yii::app()->createUrl('Admin/foodmanagement'),'block' => true, 'color' => TbHtml::BUTTON_COLOR_PRIMARY, 'size'=>TbHtml::BUTTON_SIZE_LARGE)); ?>
<?php //echo TbHtml::linkbutton('Role Management',array('url'=> Yii::app()->createUrl('Admin/Rolemanagement'),'block' => true, 'color' => TbHtml::BUTTON_COLOR_PRIMARY, 'size'=>TbHtml::BUTTON_SIZE_LARGE)); ?>
<?php echo TbHtml::linkbutton('Work Management',array('url'=> Yii::app()->createUrl('Admin/Workmanagement'),'block' => true, 'color' => TbHtml::BUTTON_COLOR_PRIMARY, 'size'=>TbHtml::BUTTON_SIZE_LARGE)); ?>
    <?php echo TbHtml::linkbutton('Test Admin',
array('block' => true, 'color' => TbHtml::BUTTON_COLOR_PRIMARY, 'size'=>TbHtml::BUTTON_SIZE_LARGE)); ?>
    
</div>