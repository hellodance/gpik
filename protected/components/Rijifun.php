<?php

class Rijifun extends CController
{
    
    /**
     * This function is to get all the City
     */
    
        public function getCountryuserDropDown()
	{
            $data['locations'] = CHtml::listData(Countries::model()->findAll(array('order'=>'countryName')), 'id', 'countryName');
            return $data['locations'];
                
	}
    
         public function getCityuserDropDown()
	{

		$data['locations'] = CHtml::listData(Citylist::model()->findAll(array('order'=>'city_name')), 'city_name', 'city_name');
		return $data['locations'];
	}
        #get Current Date
        public function CurrentDate()
        {
            $datestring = "%Y-%m-%d %h:%i:%s %A";
            $time = time();
            $entrydate= date($datestring, $time);
            return $entrydate;
        }//End of Function
        /**
* Return 1 if the status is 0 and VICE-VERSA
*/
    public function updateStatus($status,$model){
       
        if($status == 0){
            $model->status = 1;
            return 1;
        }else{
            $model->status = 0;
            return 0;
        }
    }
    /**
     * Get Trainer type dropdown
     */
    public function gettrainerDropDown()
	{
            $data['locations'] = CHtml::listData(TrainerType::model()->findAll(array('order'=>'type_name')), 'id', 'type_name');
            return $data['locations'];
                
	}
         /**
     * Get Locality type dropdown
     */
    public function getlocalityDropDown()
	{
            $data['locations'] = CHtml::listData(TrainerDetails::model()->findAll(array('order'=>'street')), 'street', 'street');
            return $data['locations'];
                
	}
}
?>
