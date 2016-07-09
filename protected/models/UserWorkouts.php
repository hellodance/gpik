<?php

/**
 * This is the model class for table "gp_user_workouts".
 *
 * The followings are the available columns in table 'gp_user_workouts':
 * @property integer $id
 * @property integer $user_id
 * @property integer $worktype_id
 * @property string $name
 * @property string $time
 * @property double $duration
 * @property double $distance
 * @property string $adddate
 * @property double $speed
 * @property double $incline
 * @property double $level
 * @property double $calories
 * @property text $intake_note
 * @property text $workout_note
 * @property integer $status
 */
class UserWorkouts extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'gp_user_workouts';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id,duration, worktype_id', 'required'),
			array('user_id, worktype_id, status', 'numerical', 'integerOnly'=>true),
			array('duration, distance, speed, incline, level, calories', 'numerical'),
			array('name', 'length', 'max'=>255),
			array('time, adddate,intake_note,workout_note', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
                    array('id, user_id,worktype, worktype_id, name,intake_note,workout_note,set1,set2,set3,set4,set5,set6, time, duration, distance, adddate, speed, incline, level, calories, status', 'safe', 'on'=>'search'),
                    array('id, user_id,worktype, worktype_id, name,intake_note,workout_note,set1,set2,set3,set4,set5,set6, time, duration, distance, adddate, speed, incline, level, calories, status', 'safe', 'on'=>'getweightWorkouts'),
                    array('id, user_id,worktype, worktype_id, name,intake_note,workout_note,set1,set2,set3,set4,set5,set6, time, duration, distance, adddate, speed, incline, level, calories, status', 'safe', 'on'=>'getWorkouts'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
                    'worktype' => array(self::BELONGS_TO, 'Worktype', 'worktype_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'user_id' => 'User',
			'worktype_id' => 'Worktype',
			'name' => 'Name',
			'time' => 'Time',
			'duration' => 'Duration',
			'distance' => 'Distance',
			'adddate' => 'Adddate',
			'speed' => 'Speed',
			'incline' => 'Incline',
			'level' => 'Level',
			'calories' => 'Calories',
			'status' => 'Status',
                        'intake_note'=>'User Notes',
                        'workout_note'=>'User Notes',
                        'set1'=>'Set-1',
                        'set2'=>'Set-2',
                        'set3'=>'Set-3',
                        'set4'=>'Set-4',
                        'set5'=>'Set-5',
                        'set6'=>'Set-6',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('worktype_id',$this->worktype_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('time',$this->time,true);
		$criteria->compare('duration',$this->duration);
		$criteria->compare('distance',$this->distance);
		$criteria->compare('adddate',$this->adddate,true);
		$criteria->compare('speed',$this->speed);
		$criteria->compare('incline',$this->incline);
		$criteria->compare('level',$this->level);
		$criteria->compare('calories',$this->calories);
                $criteria->compare('intake_note',$this->intake_note);
                $criteria->compare('workout_note',$this->workout_note);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return UserWorkouts the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        /**
         * Fetch the grid data for the user dashboard cardio workout grid
         * @return array Array of object contains data for user cardio workouts
         */
        public function getWorkouts()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
                $criteria->with='worktype';
		$criteria->compare('id',$this->id);
		$criteria->compare('user_id',Yii::app()->user->id);
                $now = new CDbExpression("CURDATE()");
                $criteria->addCondition('DATE(t.adddate) = '.$now.'');
                $criteria->addInCondition('worktype.type',array(2,3,4,5,6)); 
                return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        /**
         * Fetch the grid data for the trainer dashboard
         * @param string $date For the particular date
         * @param integer $userid Client Id for the fetching grid
         * @return array Array of object contains data for clients cardio workouts
         */
        public function getLegalWorkouts($date,$userid)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
                $criteria->with='worktype';
		$criteria->compare('id',$this->id);
		$criteria->compare('user_id',$userid);
                $now = new CDbExpression("CURDATE()");
                $criteria->addCondition('DATE(t.adddate) = "'.$date.'"');
                $criteria->addInCondition('worktype.type',array(2,3,4,5,6)); 
                return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        /**
         * Fetch the grid data for the user dashboard workout grid
         * @return array Array of object contains data for user weight workouts
         */
        public function getweightWorkouts()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
                $criteria->with='worktype';
                $criteria->compare('id',$this->id);
		$criteria->compare('user_id',Yii::app()->user->id);
                $now = new CDbExpression("CURDATE()");
                $criteria->addCondition('DATE(t.adddate) = '.$now.''); 
		$criteria->compare('worktype.type',1);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        /**
         * Fetch the grid data for the trainer dashboard
         * @param string $date For the particular date
         * @param integer $userid Client Id for the fetching grid
         * @return array Array of object contains data for clients weight workouts
         */
         public function getLegalweightWorkouts($date,$userid)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
                $criteria->with='worktype';
                $criteria->compare('id',$this->id);
		$criteria->compare('user_id',$userid);
                $now = new CDbExpression("CURDATE()");
                $criteria->addCondition('DATE(t.adddate) = "'.$date.'"'); 
		$criteria->compare('worktype.type',1);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        public function getCaloriegraph()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.
                
		 $criteria = new CDbCriteria;
                 $criteria->compare('user_id',Yii::app()->user->id);
                 $criteria->select = 'id, name,calories';
                 $now = new CDbExpression("CURDATE()");
                $criteria->addCondition('DATE(t.adddate) = '.$now.''); 
                 $rows = self::model()->findAll($criteria);
                 $data = array();
                 foreach($rows as $row){
                     $data[]= $row->calories ;
                 }
                 
                 if($data)
                 return array_sum($data);
                 else
                     return 'No data';
		
		
	}
        public function getweightCaloriegraph()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.
                
		 $criteria = new CDbCriteria;
                 $criteria->compare('user_id',Yii::app()->user->id);
                 $criteria->select = 'id, name,custom_calories';
                 $now = new CDbExpression("CURDATE()");
                $criteria->addCondition('DATE(t.adddate) = '.$now.''); 
                 $rows = self::model()->findAll($criteria);
                 $data = array();
                 foreach($rows as $row){
                     $data[]= $row->custom_calories ;
                 }
                 
                 if($data)
                 return array_sum($data);
                 else
                     return 'No data';
		
		
	}
        public function gettotalduration(){
                $criteria=new CDbCriteria;
                $criteria->with='worktype';
		$criteria->compare('id',$this->id);
		$criteria->compare('user_id',Yii::app()->user->id);
                $now = new CDbExpression("CURDATE()");
                $criteria->addCondition('DATE(t.adddate) = '.$now.'');
                $criteria->addInCondition('worktype.type',array(2,3,4,5,6));
                $rows = self::model()->findAll($criteria);
                foreach($rows as $row){
                     $data[]= $row->duration ;
                 }
                 if($data)
                 return array_sum($data);
                 else
                     return 'No data';
        }
        /**
         * Calculate the total duration time(mins) by the user for cardio exercises.
         * @param string $date For the particular date
         * @param integer $userid Client Id for the fetching grid
         * @return string $data for clients total duration in cardio exercises
         */
         public function getlegaltotalduration($date,$userid){
                $criteria=new CDbCriteria;
                $criteria->with='worktype';
		$criteria->compare('id',$this->id);
		$criteria->compare('user_id',$userid);
                $now = new CDbExpression("CURDATE()");
                $criteria->addCondition('DATE(t.adddate) = "'.$date.'"');
                $criteria->addInCondition('worktype.type',array(2,3,4,5,6));
                $rows = self::model()->findAll($criteria);
                foreach($rows as $row){
                     $data[]= $row->duration ;
                 }
                 if($data)
                 return array_sum($data);
                 else
                     return 'No data';
        }
        /**
         * Calculate the total calories burned by the user for cardio exercises.
         * @return string total burned calories by the cardio workout.
         */
        public function gettotalcalories(){
                $criteria=new CDbCriteria;
                $criteria->with='worktype';
		$criteria->compare('id',$this->id);
		$criteria->compare('user_id',Yii::app()->user->id);
                $now = new CDbExpression("CURDATE()");
                $criteria->addCondition('DATE(t.adddate) = '.$now.''); 
                $criteria->addInCondition('worktype.type',array(2,3,4,5,6));
                $rows = self::model()->findAll($criteria);
                foreach($rows as $row){
                     $data[]= $row->calories ;
                 }
                if($data)
                 return array_sum($data);
                 else
                     return '';
        }
        /**
         * Calculate the total calories burned by the user for cardio exercises.
         * @param string $date For the particular date
         * @param integer $userid Client Id for the fetching grid
         * @return string $data for clients total calories burned in cardio exercises
         */
        public function getlegaltotalcalories($date,$userid){
                $criteria=new CDbCriteria;
                $criteria->with='worktype';
		$criteria->compare('id',$this->id);
		$criteria->compare('user_id',$userid);
                $now = new CDbExpression("CURDATE()");
                $criteria->addCondition('DATE(t.adddate) = "'.$date.'"'); 
                $criteria->addInCondition('worktype.type',array(2,3,4,5,6));
                $rows = self::model()->findAll($criteria);
                foreach($rows as $row){
                     $data[]= $row->calories ;
                 }
                if($data)
                 return array_sum($data);
                 else
                     return '';
        }
         public function getweighttotalcalories(){
                $criteria=new CDbCriteria;
                $criteria->with='worktype';
                $criteria->compare('id',$this->id);
		$criteria->compare('user_id',Yii::app()->user->id);
                $now = new CDbExpression("CURDATE()");
                $criteria->addCondition('DATE(t.adddate) = '.$now.''); 
		$criteria->compare('worktype.type',1);
                $rows = self::model()->findAll($criteria);
                foreach($rows as $row){
                     $data[]= $row->custom_calories ;
                 }
                 if($data)
                 return array_sum($data);
                 else
                     return '';
        }
        public function getweighttotalduration(){
               $criteria=new CDbCriteria;
                $criteria->with='worktype';
                $criteria->compare('id',$this->id);
		$criteria->compare('user_id',Yii::app()->user->id);
                $now = new CDbExpression("CURDATE()");
                $criteria->addCondition('DATE(t.adddate) = '.$now.''); 
		$criteria->compare('worktype.type',1);
                $rows = self::model()->findAll($criteria);
                foreach($rows as $row){
                     $data[]= $row->duration ;
                 }
                 if($data)
                 return array_sum($data);
                 else
                     return 'No data';
        }
        /**
         * Fetch the grid data for the trainer dashboard
         * @param string $date For the particular date
         * @param integer $userid Client Id for the fetching grid
         * @return array Array of object contains data for clients cardio workouts
         */
        public function getRangeWorkouts($sdate,$edate,$userid)
	{
            $date = new DateTime();
            $curdate = new DateTime();
            $date->add(DateInterval::createFromDateString('-30 days'));
            $dated = $date->format('Y-m-d');
            $curdate= $curdate->format('Y-m-d');
//            $sql = " SELECT * FROM `gp_user_workouts` `t` LEFT OUTER JOIN `gp_worktype` `worktype` ON (`t`.`worktype_id`=`worktype`.`id`) WHERE (((user_id=175) AND (DATE(t.adddate) BETWEEN '2013-12-01' AND '2013-12-28')) AND (worktype.type IN (2, 3, 4, 5, 6))) LIMIT 0 , 30";
//            return new CSqlDataProvider($sql, array('keyField' => 'id'));
		// @todo Please modify the following code to remove attributes that should not be searched.
                $criteria=new CDbCriteria;
                $criteria->with='worktype';
                $criteria->together = true;
		$criteria->compare('id',$this->id);
		$criteria->compare('user_id',$userid);
//                $now = new CDbExpression("CURDATE()");
//                $criteria->addCondition('DATE(t.adddate) = "'.$edate.'"');
                $criteria->addBetweenCondition('DATE(t.adddate)', $dated, $curdate, 'AND');
                 $criteria->addInCondition('worktype.type',array(2)); 
                 $criteria->group='t.adddate';
                   $rows = self::model()->findAll($criteria); 
                   return $rows;
//                return new CActiveDataProvider($this, array(
//			'criteria'=>$criteria,'pagination'=>array('pageSize'=>30),
//		));
	}
        /**
         * Fetch the grid data for the trainer dashboard
         * @param string $date For the particular date
         * @param integer $userid Client Id for the fetching grid
         * @return array Array of object contains data for clients cardio workouts
         */
        public function getcardioRangeWorkouts($sdate,$edate,$userid)
	{
            // @todo Please modify the following code to remove attributes that should not be searched.
                $criteria=new CDbCriteria;
                $criteria->with='worktype';
                $criteria->together = true;
		$criteria->compare('id',$this->id);
		$criteria->compare('user_id',$userid);
//                $now = new CDbExpression("CURDATE()");
                $criteria->addCondition('DATE(t.adddate) = "'.$edate.'"');
//                $criteria->addBetweenCondition('DATE(t.adddate)', $dated, $edate, 'AND');
                 $criteria->addInCondition('worktype.type',array(2)); 
                 
//                 $criteria->group='t.adddate';
                return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,'pagination'=>array('pageSize'=>30),
		));
	}
        /**
         * Fetch the grid data for the trainer dashboard
         * @param string $date For the particular date
         * @param integer $userid Client Id for the fetching grid
         * @return array Array of object contains data for clients cardio workouts
         */
        public function getweightRangeWorkouts($sdate,$edate,$userid)
	{
            // @todo Please modify the following code to remove attributes that should not be searched.
                $criteria=new CDbCriteria;
                $criteria->with='worktype';
                $criteria->together = true;
		$criteria->compare('id',$this->id);
		$criteria->compare('user_id',$userid);
//                $now = new CDbExpression("CURDATE()");
                $criteria->addCondition('DATE(t.adddate) = "'.$edate.'"');
//                $criteria->addBetweenCondition('DATE(t.adddate)', $dated, $edate, 'AND');
                 $criteria->addInCondition('worktype.type',array(1)); 
                 
//                 $criteria->group='t.adddate';
                return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,'pagination'=>array('pageSize'=>30),
		));
	}
         public function getStatusDropdown()
            {
            if($this->status == 0){
                return CHtml::dropDownlist('status',$this->iscomplete,array('1'=>'Yes'), array(
                    'class'     => 'status','disabled' => true,
                    'data-id'   => $this->id,
                ));
                }  else {
                    $stats = array(
                    1 => 'Yes',
                    0 => 'No',
                );
                return CHtml::dropDownlist('status',$this->iscomplete,$stats, array(
                    'class'     => 'status',
                    'data-id'   => $this->id,
            ));
            }
            }
        /**Progress tab functions**/
        public function getprogressburned($week){
            if($week == 1){
            $date = new DateTime();
            $curdate = new DateTime();
            $date->add(DateInterval::createFromDateString('-6 days'));
            $dated = $date->format('Y-m-d');
            $curdate= $curdate->format('Y-m-d');
                $criteria=new CDbCriteria;
                //$current = new CDbExpression('CURDATE()');
                //$criteria->with='worktype';
		//$criteria->compare('id',$this->id);
                $criteria->select = "*,sum(calories) as calories";
		$criteria->compare('user_id',Yii::app()->user->id);
                //$now = new CDbExpression("NOW(Y-m-d)");
                $now = new CDbExpression('NOW()',array('Y-m-d'=>''));
//                $criteria->addCondition('DATE(t.adddate) = '.$now.''); 
//                $criteria->addInCondition('worktype.type',array(2,3,4,5,6));
                $criteria->addBetweenCondition('adddate',"'$dated'",$curdate);
                $criteria->group='adddate';
                $rows = self::model()->findAll($criteria);
                $begin = new DateTime( $dated );
                $end = new DateTime( $curdate+1 );

                $interval = DateInterval::createFromDateString('1 day');
                $period = new DatePeriod($begin, $interval, $end);
    
        $j = 0;
        foreach ( $period as $dt ){
           $offset = $dt->format( "Y-m-d H:i:s" );
            foreach($rows as $k=>$row){
                if($row->adddate == $offset)
                $data[$j]= floatval($row->calories); 
                $data[$j] .= '';
                
                           }
                         $j++;    
                       }
                if($data)
                    
                 return array_map('floatval', $data);
                 else
                  return 'No data';}
            if($week == 2){
            $date = new DateTime();
            $curdate = new DateTime();
            $date->add(DateInterval::createFromDateString('-13 days'));
            $dated = $date->format('Y-m-d');
            $curdate= $curdate->format('Y-m-d');
                $criteria=new CDbCriteria;
                //$current = new CDbExpression('CURDATE()');
                //$criteria->with='worktype';
		//$criteria->compare('id',$this->id);
                $criteria->select = "*,sum(calories) as calories";
		$criteria->compare('user_id',Yii::app()->user->id);
                //$now = new CDbExpression("NOW(Y-m-d)");
                $now = new CDbExpression('NOW()',array('Y-m-d'=>''));
//                $criteria->addCondition('DATE(t.adddate) = '.$now.''); 
//                $criteria->addInCondition('worktype.type',array(2,3,4,5,6));
                $criteria->addBetweenCondition('adddate',"'$dated'",$curdate);
                $criteria->group='adddate';
                $rows = self::model()->findAll($criteria);
                $begin = new DateTime( $dated );
                $end = new DateTime( $curdate+1 );

                $interval = DateInterval::createFromDateString('1 day');
                $period = new DatePeriod($begin, $interval, $end);
    
        $j = 0;
        foreach ( $period as $dt ){
           $offset = $dt->format( "Y-m-d H:i:s" );
            foreach($rows as $k=>$row){
                if($row->adddate == $offset)
                $data[$j]= floatval($row->calories); 
                $data[$j] .= '';
                
                           }
                         $j++;    
                       }
                if($data)
                    
                 return array_map('floatval', $data);
               
            }
            if($week == 3){
            $date = new DateTime();
            $curdate = new DateTime();
            $date->add(DateInterval::createFromDateString('-20 days'));
            $dated = $date->format('Y-m-d');
            $curdate= $curdate->format('Y-m-d');
                $criteria=new CDbCriteria;
                //$current = new CDbExpression('CURDATE()');
                //$criteria->with='worktype';
		//$criteria->compare('id',$this->id);
                $criteria->select = "*,sum(calories) as calories";
		$criteria->compare('user_id',Yii::app()->user->id);
                //$now = new CDbExpression("NOW(Y-m-d)");
                $now = new CDbExpression('NOW()',array('Y-m-d'=>''));
//                $criteria->addCondition('DATE(t.adddate) = '.$now.''); 
//                $criteria->addInCondition('worktype.type',array(2,3,4,5,6));
                $criteria->addBetweenCondition('adddate',"'$dated'",$curdate);
                $criteria->group='adddate';
                $rows = self::model()->findAll($criteria);
                $begin = new DateTime( $dated );
                $end = new DateTime( $curdate+1 );

                $interval = DateInterval::createFromDateString('1 day');
                $period = new DatePeriod($begin, $interval, $end);
    
        $j = 0;
        foreach ( $period as $dt ){
           $offset = $dt->format( "Y-m-d H:i:s" );
            foreach($rows as $k=>$row){
                if($row->adddate == $offset)
                $data[$j]= floatval($row->calories); 
                $data[$j] .= '';
                
                           }
                         $j++;    
                       }
                if($data)
                    
                 return array_map('floatval', $data);
               
            }
            if($week == 4){
            $date = new DateTime();
            $curdate = new DateTime();
            $date->add(DateInterval::createFromDateString('-29 days'));
            $dated = $date->format('Y-m-d');
            $curdate= $curdate->format('Y-m-d');
                $criteria=new CDbCriteria;
                //$current = new CDbExpression('CURDATE()');
                //$criteria->with='worktype';
		//$criteria->compare('id',$this->id);
                $criteria->select = "*,sum(calories) as calories";
		$criteria->compare('user_id',Yii::app()->user->id);
                //$now = new CDbExpression("NOW(Y-m-d)");
                $now = new CDbExpression('NOW()',array('Y-m-d'=>''));
//                $criteria->addCondition('DATE(t.adddate) = '.$now.''); 
//                $criteria->addInCondition('worktype.type',array(2,3,4,5,6));
                $criteria->addBetweenCondition('adddate',"'$dated'",$curdate);
                $criteria->group='adddate';
                $rows = self::model()->findAll($criteria);
                $begin = new DateTime( $dated );
                $end = new DateTime( $curdate+1 );

                $interval = DateInterval::createFromDateString('3 day');
                $period = new DatePeriod($begin, $interval, $end);
    
        $j = 0;
        foreach ( $period as $dt ){
           $offset = $dt->format( "Y-m-d H:i:s" );
            foreach($rows as $k=>$row){
                if($row->adddate == $offset)
                $data[$j]= floatval($row->calories); 
                $data[$j] .= '';
                
                           }
                         $j++;    
                       }
                if($data)
                    
                 return array_map('floatval', $data);
               
            }
            if($week == 8){
            $date = new DateTime();
            $curdate = new DateTime();
            $date->add(DateInterval::createFromDateString('-59 days'));
            $dated = $date->format('Y-m-d');
            $curdate= $curdate->format('Y-m-d');
                $criteria=new CDbCriteria;
                //$current = new CDbExpression('CURDATE()');
                //$criteria->with='worktype';
		//$criteria->compare('id',$this->id);
                $criteria->select = "*,sum(calories) as calories";
		$criteria->compare('user_id',Yii::app()->user->id);
                //$now = new CDbExpression("NOW(Y-m-d)");
                $now = new CDbExpression('NOW()',array('Y-m-d'=>''));
//                $criteria->addCondition('DATE(t.adddate) = '.$now.''); 
//                $criteria->addInCondition('worktype.type',array(2,3,4,5,6));
                $criteria->addBetweenCondition('adddate',"'$dated'",$curdate);
                $criteria->group='adddate';
                $rows = self::model()->findAll($criteria);
                $begin = new DateTime( $dated );
                $end = new DateTime( $curdate+1 );

                $interval = DateInterval::createFromDateString('3 day');
                $period = new DatePeriod($begin, $interval, $end);
    
        $j = 0;
        foreach ( $period as $dt ){
           $offset = $dt->format( "Y-m-d H:i:s" );
            foreach($rows as $k=>$row){
                if($row->adddate == $offset)
                $data[$j]= floatval($row->calories); 
                $data[$j] .= '';
                
                           }
                         $j++;    
                       }
                if($data)
                    
                 return array_map('floatval', $data);
               
            }
            if($week == 12){
            $date = new DateTime();
            $curdate = new DateTime();
            $date->add(DateInterval::createFromDateString('-89 days'));
            $dated = $date->format('Y-m-d');
            $curdate= $curdate->format('Y-m-d');
                $criteria=new CDbCriteria;
                //$current = new CDbExpression('CURDATE()');
                //$criteria->with='worktype';
		//$criteria->compare('id',$this->id);
                $criteria->select = "*,sum(calories) as calories";
		$criteria->compare('user_id',Yii::app()->user->id);
                //$now = new CDbExpression("NOW(Y-m-d)");
                $now = new CDbExpression('NOW()',array('Y-m-d'=>''));
//                $criteria->addCondition('DATE(t.adddate) = '.$now.''); 
//                $criteria->addInCondition('worktype.type',array(2,3,4,5,6));
                $criteria->addBetweenCondition('adddate',"'$dated'",$curdate);
                $criteria->group='adddate';
                $rows = self::model()->findAll($criteria);
                $begin = new DateTime( $dated );
                $end = new DateTime( $curdate+1 );

                $interval = DateInterval::createFromDateString('7 day');
                $period = new DatePeriod($begin, $interval, $end);
    
        $j = 0;
        foreach ( $period as $dt ){
           $offset = $dt->format( "Y-m-d H:i:s" );
            foreach($rows as $k=>$row){
                if($row->adddate == $offset)
                $data[$j]= floatval($row->calories); 
                $data[$j] .= '';
                
                           }
                         $j++;    
                       }
                if($data)
                    
                 return array_map('floatval', $data);
               
            }
            if($week == 24){
            $date = new DateTime();
            $curdate = new DateTime();
            $date->add(DateInterval::createFromDateString('-179 days'));
            $dated = $date->format('Y-m-d');
            $curdate= $curdate->format('Y-m-d');
                $criteria=new CDbCriteria;
                //$current = new CDbExpression('CURDATE()');
                //$criteria->with='worktype';
		//$criteria->compare('id',$this->id);
                $criteria->select = "*,sum(calories) as calories";
		$criteria->compare('user_id',Yii::app()->user->id);
                //$now = new CDbExpression("NOW(Y-m-d)");
                $now = new CDbExpression('NOW()',array('Y-m-d'=>''));
//                $criteria->addCondition('DATE(t.adddate) = '.$now.''); 
//                $criteria->addInCondition('worktype.type',array(2,3,4,5,6));
                $criteria->addBetweenCondition('adddate',"'$dated'",$curdate);
                $criteria->group='adddate';
                $rows = self::model()->findAll($criteria);
                $begin = new DateTime( $dated );
                $end = new DateTime( $curdate+1 );

                $interval = DateInterval::createFromDateString('14 day');
                $period = new DatePeriod($begin, $interval, $end);
    
        $j = 0;
        foreach ( $period as $dt ){
           $offset = $dt->format( "Y-m-d H:i:s" );
            foreach($rows as $k=>$row){
                if($row->adddate == $offset)
                $data[$j]= floatval($row->calories); 
                $data[$j] .= '';
                
                           }
                         $j++;    
                       }
                if($data)
                    
                 return array_map('floatval', $data);
               
            }
            if($week == 38){
            $date = new DateTime();
            $curdate = new DateTime();
            $date->add(DateInterval::createFromDateString('-269 days'));
            $dated = $date->format('Y-m-d');
            $curdate= $curdate->format('Y-m-d');
                $criteria=new CDbCriteria;
                //$current = new CDbExpression('CURDATE()');
                //$criteria->with='worktype';
		//$criteria->compare('id',$this->id);
                $criteria->select = "*,sum(calories) as calories";
		$criteria->compare('user_id',Yii::app()->user->id);
                //$now = new CDbExpression("NOW(Y-m-d)");
                $now = new CDbExpression('NOW()',array('Y-m-d'=>''));
//                $criteria->addCondition('DATE(t.adddate) = '.$now.''); 
//                $criteria->addInCondition('worktype.type',array(2,3,4,5,6));
                $criteria->addBetweenCondition('adddate',"'$dated'",$curdate);
                $criteria->group='adddate';
                $rows = self::model()->findAll($criteria);
                $begin = new DateTime( $dated );
                $end = new DateTime( $curdate+1 );

                $interval = DateInterval::createFromDateString('30 day');
                $period = new DatePeriod($begin, $interval, $end);
    
        $j = 0;
        foreach ( $period as $dt ){
           $offset = $dt->format( "Y-m-d H:i:s" );
            foreach($rows as $k=>$row){
                if($row->adddate == $offset)
                $data[$j]= floatval($row->calories); 
                $data[$j] .= '';
                
                           }
                         $j++;    
                       }
                if($data)
                    
                 return array_map('floatval', $data);
               
            }
            if($week == 52){
            $date = new DateTime();
            $curdate = new DateTime();
            $date->add(DateInterval::createFromDateString('-360 days'));
            $dated = $date->format('Y-m-d');
            $curdate= $curdate->format('Y-m-d');
                $criteria=new CDbCriteria;
                //$current = new CDbExpression('CURDATE()');
                //$criteria->with='worktype';
		//$criteria->compare('id',$this->id);
                $criteria->select = "*,sum(calories) as calories";
		$criteria->compare('user_id',Yii::app()->user->id);
                //$now = new CDbExpression("NOW(Y-m-d)");
                $now = new CDbExpression('NOW()',array('Y-m-d'=>''));
//                $criteria->addCondition('DATE(t.adddate) = '.$now.''); 
//                $criteria->addInCondition('worktype.type',array(2,3,4,5,6));
                $criteria->addBetweenCondition('adddate',"'$dated'",$curdate);
                $criteria->group='adddate';
                $rows = self::model()->findAll($criteria);
                $begin = new DateTime( $dated );
                $end = new DateTime( $curdate+1 );

                $interval = DateInterval::createFromDateString('30 day');
                $period = new DatePeriod($begin, $interval, $end);
    
        $j = 0;
        foreach ( $period as $dt ){
           $offset = $dt->format( "Y-m-d H:i:s" );
            foreach($rows as $k=>$row){
                if($row->adddate == $offset)
                $data[$j]= floatval($row->calories); 
                $data[$j] .= '';
                
                           }
                         $j++;    
                       }
                if($data)
                    
                 return array_map('floatval', $data);
               
            }
                 
        }
        public function getprogressconsumed($week){
            if($week == 1){
            $date = new DateTime();
            $curdate = new DateTime();
            $date->add(DateInterval::createFromDateString('-6 days'));
            $dated = $date->format('Y-m-d');
            $curdate= $curdate->format('Y-m-d');
                $criteria=new CDbCriteria;
                $criteria->select = "*,sum(calories) as calories";
		$criteria->compare('user_id',Yii::app()->user->id);
                $criteria->addBetweenCondition('adddate',"'$dated'",$curdate);
                $criteria->group='adddate';
                $rows = UserFoodintake::model()->findAll($criteria);
                
                $begin = new DateTime( $dated );
                $end = new DateTime( $curdate+1 );

                $interval = DateInterval::createFromDateString('1 day');
                $period = new DatePeriod($begin, $interval, $end);
    
        $j = 0;
        foreach ( $period as $dt ){
           $offset = $dt->format( "Y-m-d H:i:s" );
            foreach($rows as $k=>$row){
                if($row->adddate == $offset)
                $data[$j]= floatval($row->calories); 
                $data[$j] .= '';
                
                           }
                         $j++;    
                       }
                if($data)
                    
                 return array_map('floatval', $data);
                 else
            return 'No data';}
            if($week == 2){
                $date = new DateTime();
            $curdate = new DateTime();
            $date->add(DateInterval::createFromDateString('-13 days'));
            $dated = $date->format('Y-m-d');
            $curdate= $curdate->format('Y-m-d');
                $criteria=new CDbCriteria;
                $criteria->select = "*,sum(calories) as calories";
		$criteria->compare('user_id',Yii::app()->user->id);
                $criteria->addBetweenCondition('adddate',"'$dated'",$curdate);
                $criteria->group='adddate';
                $rows = UserFoodintake::model()->findAll($criteria);
                
                $begin = new DateTime( $dated );
                $end = new DateTime( $curdate+1 );

                $interval = DateInterval::createFromDateString('1 day');
                $period = new DatePeriod($begin, $interval, $end);
    
        $j = 0;
        foreach ( $period as $dt ){
           $offset = $dt->format( "Y-m-d H:i:s" );
            foreach($rows as $k=>$row){
                if($row->adddate == $offset)
                $data[$j]= floatval($row->calories); 
                $data[$j] .= '';
                
                           }
                         $j++;    
                       }
                if($data)
                    
                 return array_map('floatval', $data);
                 else
            return 'No data';
            }
            if($week == 3){
                $date = new DateTime();
            $curdate = new DateTime();
            $date->add(DateInterval::createFromDateString('-20 days'));
            $dated = $date->format('Y-m-d');
            $curdate= $curdate->format('Y-m-d');
                $criteria=new CDbCriteria;
                $criteria->select = "*,sum(calories) as calories";
		$criteria->compare('user_id',Yii::app()->user->id);
                $criteria->addBetweenCondition('adddate',"'$dated'",$curdate);
                $criteria->group='adddate';
                $rows = UserFoodintake::model()->findAll($criteria);
                
                $begin = new DateTime( $dated );
                $end = new DateTime( $curdate+1 );

                $interval = DateInterval::createFromDateString('1 day');
                $period = new DatePeriod($begin, $interval, $end);
    
        $j = 0;
        foreach ( $period as $dt ){
           $offset = $dt->format( "Y-m-d H:i:s" );
            foreach($rows as $k=>$row){
                if($row->adddate == $offset)
                $data[$j]= floatval($row->calories); 
                $data[$j] .= '';
                
                           }
                         $j++;    
                       }
                if($data)
                    
                 return array_map('floatval', $data);
                 else
            return 'No data';
            }
            if($week == 4){
                $date = new DateTime();
            $curdate = new DateTime();
            $date->add(DateInterval::createFromDateString('-29 days'));
            $dated = $date->format('Y-m-d');
            $curdate= $curdate->format('Y-m-d');
                $criteria=new CDbCriteria;
                $criteria->select = "*,sum(calories) as calories";
		$criteria->compare('user_id',Yii::app()->user->id);
                $criteria->addBetweenCondition('adddate',"'$dated'",$curdate);
                $criteria->group='adddate';
                $rows = UserFoodintake::model()->findAll($criteria);
                
                $begin = new DateTime( $dated );
                $end = new DateTime( $curdate+1 );

                $interval = DateInterval::createFromDateString('3 day');
                $period = new DatePeriod($begin, $interval, $end);
    
        $j = 0;
        foreach ( $period as $dt ){
           $offset = $dt->format( "Y-m-d H:i:s" );
            foreach($rows as $k=>$row){
                if($row->adddate == $offset)
                $data[$j]= floatval($row->calories); 
                $data[$j] .= '';
                
                           }
                         $j++;    
                       }
                if($data)
                    
                 return array_map('floatval', $data);
                 else
            return 'No data';
            }
            if($week == 8){
                $date = new DateTime();
            $curdate = new DateTime();
            $date->add(DateInterval::createFromDateString('-59 days'));
            $dated = $date->format('Y-m-d');
            $curdate= $curdate->format('Y-m-d');
                $criteria=new CDbCriteria;
                $criteria->select = "*,sum(calories) as calories";
		$criteria->compare('user_id',Yii::app()->user->id);
                $criteria->addBetweenCondition('adddate',"'$dated'",$curdate);
                $criteria->group='adddate';
                $rows = UserFoodintake::model()->findAll($criteria);
                
                $begin = new DateTime( $dated );
                $end = new DateTime( $curdate+1 );

                $interval = DateInterval::createFromDateString('3 day');
                $period = new DatePeriod($begin, $interval, $end);
    
        $j = 0;
        foreach ( $period as $dt ){
           $offset = $dt->format( "Y-m-d H:i:s" );
            foreach($rows as $k=>$row){
                if($row->adddate == $offset)
                $data[$j]= floatval($row->calories); 
                $data[$j] .= '';
                
                           }
                         $j++;    
                       }
                if($data)
                    
                 return array_map('floatval', $data);
                 else
            return 'No data';
            }
            if($week == 12){
                $date = new DateTime();
            $curdate = new DateTime();
            $date->add(DateInterval::createFromDateString('-89 days'));
            $dated = $date->format('Y-m-d');
            $curdate= $curdate->format('Y-m-d');
                $criteria=new CDbCriteria;
                $criteria->select = "*,sum(calories) as calories";
		$criteria->compare('user_id',Yii::app()->user->id);
                $criteria->addBetweenCondition('adddate',"'$dated'",$curdate);
                $criteria->group='adddate';
                $rows = UserFoodintake::model()->findAll($criteria);
                
                $begin = new DateTime( $dated );
                $end = new DateTime( $curdate+1 );

                $interval = DateInterval::createFromDateString('7 day');
                $period = new DatePeriod($begin, $interval, $end);
    
        $j = 0;
        foreach ( $period as $dt ){
           $offset = $dt->format( "Y-m-d H:i:s" );
            foreach($rows as $k=>$row){
                if($row->adddate == $offset)
                $data[$j]= floatval($row->calories); 
                $data[$j] .= '';
                
                           }
                         $j++;    
                       }
                if($data)
                    
                 return array_map('floatval', $data);
                 else
            return 'No data';
            }
            if($week == 24){
                $date = new DateTime();
            $curdate = new DateTime();
            $date->add(DateInterval::createFromDateString('-179 days'));
            $dated = $date->format('Y-m-d');
            $curdate= $curdate->format('Y-m-d');
                $criteria=new CDbCriteria;
                $criteria->select = "*,sum(calories) as calories";
		$criteria->compare('user_id',Yii::app()->user->id);
                $criteria->addBetweenCondition('adddate',"'$dated'",$curdate);
                $criteria->group='adddate';
                $rows = UserFoodintake::model()->findAll($criteria);
                
                $begin = new DateTime( $dated );
                $end = new DateTime( $curdate+1 );

                $interval = DateInterval::createFromDateString('14 day');
                $period = new DatePeriod($begin, $interval, $end);
    
        $j = 0;
        foreach ( $period as $dt ){
           $offset = $dt->format( "Y-m-d H:i:s" );
            foreach($rows as $k=>$row){
                if($row->adddate == $offset)
                $data[$j]= floatval($row->calories); 
                $data[$j] .= '';
                
                           }
                         $j++;    
                       }
                if($data)
                    
                 return array_map('floatval', $data);
                 else
            return 'No data';
            }
            if($week == 38){
                $date = new DateTime();
            $curdate = new DateTime();
            $date->add(DateInterval::createFromDateString('-269 days'));
            $dated = $date->format('Y-m-d');
            $curdate= $curdate->format('Y-m-d');
                $criteria=new CDbCriteria;
                $criteria->select = "*,sum(calories) as calories";
		$criteria->compare('user_id',Yii::app()->user->id);
                $criteria->addBetweenCondition('adddate',"'$dated'",$curdate);
                $criteria->group='adddate';
                $rows = UserFoodintake::model()->findAll($criteria);
                
                $begin = new DateTime( $dated );
                $end = new DateTime( $curdate+1 );

                $interval = DateInterval::createFromDateString('30 day');
                $period = new DatePeriod($begin, $interval, $end);
    
        $j = 0;
        foreach ( $period as $dt ){
           $offset = $dt->format( "Y-m-d H:i:s" );
            foreach($rows as $k=>$row){
                if($row->adddate == $offset)
                $data[$j]= floatval($row->calories); 
                $data[$j] .= '';
                
                           }
                         $j++;    
                       }
                if($data)
                    
                 return array_map('floatval', $data);
                 else
            return 'No data';
            }
            if($week == 52){
                $date = new DateTime();
            $curdate = new DateTime();
            $date->add(DateInterval::createFromDateString('-360 days'));
            $dated = $date->format('Y-m-d');
            $curdate= $curdate->format('Y-m-d');
                $criteria=new CDbCriteria;
                $criteria->select = "*,sum(calories) as calories";
		$criteria->compare('user_id',Yii::app()->user->id);
                $criteria->addBetweenCondition('adddate',"'$dated'",$curdate);
                $criteria->group='adddate';
                $rows = UserFoodintake::model()->findAll($criteria);
                
                $begin = new DateTime( $dated );
                $end = new DateTime( $curdate+1 );

                $interval = DateInterval::createFromDateString('30 day');
                $period = new DatePeriod($begin, $interval, $end);
    
        $j = 0;
        foreach ( $period as $dt ){
           $offset = $dt->format( "Y-m-d H:i:s" );
            foreach($rows as $k=>$row){
                if($row->adddate == $offset)
                $data[$j]= floatval($row->calories); 
                $data[$j] .= '';
                
                           }
                         $j++;    
                       }
                if($data)
                    
                 return array_map('floatval', $data);
                 else
            return 'No data';
            }
        }
        public function getprogressburneddate($week){
            if($week == 1){
                
            $date = new DateTime();
            $curdate = new DateTime();
            $date->add(DateInterval::createFromDateString('-6 days'));
            $dated = $date->format('Y-m-d');
            $curdate= $curdate->format('Y-m-d');
                 $begin = new DateTime( $dated );
                $end = new DateTime( $curdate+1 );

                $interval = DateInterval::createFromDateString('1 day');
                $period = new DatePeriod($begin, $interval, $end);
                
               foreach ( $period as $dt ){
                  
                    $data[]=  $dt->format( 'D,jS' );
                 }
                if($data)
                 return $data;
                 else
                     return 'No data';
            }
            if($week == 2){
                    $date = new DateTime();
                    $curdate = new DateTime();
                    $date->add(DateInterval::createFromDateString('-13 days'));
                    $dated = $date->format('Y-m-d');
                    $curdate= $curdate->format('Y-m-d');
                    $begin = new DateTime( $dated );
                    $end = new DateTime( $curdate+1 );

                    $interval = DateInterval::createFromDateString('1 day');
                    $period = new DatePeriod($begin, $interval, $end);
                
               foreach ( $period as $dt ){
                  
                    $data[]=  $dt->format( 'D' );
                 }
                if($data)
                 return $data;
                 else
                     return 'No data';
                 }
            if($week == 3){
                    $date = new DateTime();
                    $curdate = new DateTime();
                    $date->add(DateInterval::createFromDateString('-20 days'));
                    $dated = $date->format('Y-m-d');
                    $curdate= $curdate->format('Y-m-d');
                    $begin = new DateTime( $dated );
                    $end = new DateTime( $curdate+1 );

                    $interval = DateInterval::createFromDateString('1 day');
                    $period = new DatePeriod($begin, $interval, $end);
                
               foreach ( $period as $dt ){
                  
                    $data[]=  $dt->format( 'D' );
                 }
                if($data)
                 return $data;
                 else
                     return 'No data';
                 }
            if($week == 4){
                    $date = new DateTime();
                    $curdate = new DateTime();
                    $date->add(DateInterval::createFromDateString('-29 days'));
                    $dated = $date->format('Y-m-d');
                    $curdate= $curdate->format('Y-m-d');
                    $begin = new DateTime( $dated );
                    $end = new DateTime( $curdate+1 );

                    $interval = DateInterval::createFromDateString('3 day');
                    $period = new DatePeriod($begin, $interval, $end);
                
               foreach ( $period as $dt ){
                  
                    $data[]=  $dt->format( 'd-M' );
                 }
                if($data)
                 return $data;
                 else
                     return 'No data';
                 }
            if($week == 8){
                    $date = new DateTime();
                    $curdate = new DateTime();
                    $date->add(DateInterval::createFromDateString('-59 days'));
                    $dated = $date->format('Y-m-d');
                    $curdate= $curdate->format('Y-m-d');
                    $begin = new DateTime( $dated );
                    $end = new DateTime( $curdate+1 );

                    $interval = DateInterval::createFromDateString('3 day');
                    $period = new DatePeriod($begin, $interval, $end);
                
               foreach ( $period as $dt ){
                  
                    $data[]=  $dt->format( 'd-M' );
                 }
                if($data)
                 return $data;
                 else
                     return 'No data';
                 }
            if($week == 12){
                    $date = new DateTime();
                    $curdate = new DateTime();
                    $date->add(DateInterval::createFromDateString('-89 days'));
                    $dated = $date->format('Y-m-d');
                    $curdate= $curdate->format('Y-m-d');
                    $begin = new DateTime( $dated );
                    $end = new DateTime( $curdate+1 );

                    $interval = DateInterval::createFromDateString('7 day');
                    $period = new DatePeriod($begin, $interval, $end);
                
               foreach ( $period as $dt ){
                  
                    $data[]=  $dt->format( 'd-M' );
                 }
                if($data)
                 return $data;
                 else
                     return 'No data';
                 }
            if($week == 24){
                    $date = new DateTime();
                    $curdate = new DateTime();
                    $date->add(DateInterval::createFromDateString('-179 days'));
                    $dated = $date->format('Y-m-d');
                    $curdate= $curdate->format('Y-m-d');
                    $begin = new DateTime( $dated );
                    $end = new DateTime( $curdate+1 );

                    $interval = DateInterval::createFromDateString('14 day');
                    $period = new DatePeriod($begin, $interval, $end);
                
               foreach ( $period as $dt ){
                  
                    $data[]=  $dt->format( 'd-M' );
                 }
                if($data)
                 return $data;
                 else
                     return 'No data';
                 }
            if($week == 38){
                    $date = new DateTime();
                    $curdate = new DateTime();
                    $date->add(DateInterval::createFromDateString('-269 days'));
                    $dated = $date->format('Y-m-d');
                    $curdate= $curdate->format('Y-m-d');
                    $begin = new DateTime( $dated );
                    $end = new DateTime( $curdate+1 );

                    $interval = DateInterval::createFromDateString('30 day');
                    $period = new DatePeriod($begin, $interval, $end);
                
               foreach ( $period as $dt ){
                  
                    $data[]=  $dt->format( 'd-M' );
                 }
                if($data)
                 return $data;
                 else
                     return 'No data';
                 }
            if($week == 52){
                    $date = new DateTime();
                    $curdate = new DateTime();
                    $date->add(DateInterval::createFromDateString('-360 days'));
                    $dated = $date->format('Y-m-d');
                    $curdate= $curdate->format('Y-m-d');
                    $begin = new DateTime( $dated );
                    $end = new DateTime( $curdate+1 );

                    $interval = DateInterval::createFromDateString('30 day');
                    $period = new DatePeriod($begin, $interval, $end);
                
               foreach ( $period as $dt ){
                  
                    $data[]=  $dt->format( 'd-M' );
                 }
                if($data)
                 return $data;
                 else
                     return 'No data';
                 }
        }
        public function getprogressall($type,$week){
            if($week == 1){
            $date = new DateTime();
            $curdate = new DateTime();
            $date->add(DateInterval::createFromDateString('-6 days'));
            $dated = $date->format('Y-m-d');
            $curdate= $curdate->format('Y-m-d');
                $criteria=new CDbCriteria;
                //$current = new CDbExpression('CURDATE()');
                //$criteria->with='worktype';
		//$criteria->compare('id',$this->id);
                $criteria->select = "*,sum(calories) as calories";
		$criteria->compare('user_id',Yii::app()->user->id);
                //$now = new CDbExpression("NOW(Y-m-d)");
                $now = new CDbExpression('NOW()',array('Y-m-d'=>''));
//                $criteria->addCondition('DATE(t.adddate) = '.$now.''); 
//                $criteria->addInCondition('worktype.type',array(2,3,4,5,6));
                $criteria->addBetweenCondition('adddate',"'$dated'",$curdate);
                $criteria->group='adddate';
                $rows = self::model()->findAll($criteria);
                $begin = new DateTime( $dated );
                $end = new DateTime( $curdate+1 );

                $interval = DateInterval::createFromDateString('1 day');
                $period = new DatePeriod($begin, $interval, $end);
    
        $j = 0;
        foreach ( $period as $dt ){
           $offset = $dt->format( "Y-m-d H:i:s" );
            foreach($rows as $k=>$row){
                if($row->adddate == $offset)
                $data[$j]= floatval($row->calories); 
                $data[$j] .= '';
                
                           }
                         $j++;    
                       }
                if($data)
                    
                 return array_map('floatval', $data);
                 else
                  return 'No data';}
            if($week == 2){
            $date = new DateTime();
            $curdate = new DateTime();
            $date->add(DateInterval::createFromDateString('-13 days'));
            $dated = $date->format('Y-m-d');
            $curdate= $curdate->format('Y-m-d');
                $criteria=new CDbCriteria;
                //$current = new CDbExpression('CURDATE()');
                //$criteria->with='worktype';
		//$criteria->compare('id',$this->id);
                $criteria->select = "*,sum(calories) as calories";
		$criteria->compare('user_id',Yii::app()->user->id);
                //$now = new CDbExpression("NOW(Y-m-d)");
                $now = new CDbExpression('NOW()',array('Y-m-d'=>''));
//                $criteria->addCondition('DATE(t.adddate) = '.$now.''); 
//                $criteria->addInCondition('worktype.type',array(2,3,4,5,6));
                $criteria->addBetweenCondition('adddate',"'$dated'",$curdate);
                $criteria->group='adddate';
                $rows = self::model()->findAll($criteria);
                $begin = new DateTime( $dated );
                $end = new DateTime( $curdate+1 );

                $interval = DateInterval::createFromDateString('1 day');
                $period = new DatePeriod($begin, $interval, $end);
    
        $j = 0;
        foreach ( $period as $dt ){
           $offset = $dt->format( "Y-m-d H:i:s" );
            foreach($rows as $k=>$row){
                if($row->adddate == $offset)
                $data[$j]= floatval($row->calories); 
                $data[$j] .= '';
                
                           }
                         $j++;    
                       }
                if($data)
                    
                 return array_map('floatval', $data);
               
            }
            if($week == 3){
            $date = new DateTime();
            $curdate = new DateTime();
            $date->add(DateInterval::createFromDateString('-20 days'));
            $dated = $date->format('Y-m-d');
            $curdate= $curdate->format('Y-m-d');
                $criteria=new CDbCriteria;
                //$current = new CDbExpression('CURDATE()');
                //$criteria->with='worktype';
		//$criteria->compare('id',$this->id);
                $criteria->select = "*,sum(calories) as calories";
		$criteria->compare('user_id',Yii::app()->user->id);
                //$now = new CDbExpression("NOW(Y-m-d)");
                $now = new CDbExpression('NOW()',array('Y-m-d'=>''));
//                $criteria->addCondition('DATE(t.adddate) = '.$now.''); 
//                $criteria->addInCondition('worktype.type',array(2,3,4,5,6));
                $criteria->addBetweenCondition('adddate',"'$dated'",$curdate);
                $criteria->group='adddate';
                $rows = self::model()->findAll($criteria);
                $begin = new DateTime( $dated );
                $end = new DateTime( $curdate+1 );

                $interval = DateInterval::createFromDateString('1 day');
                $period = new DatePeriod($begin, $interval, $end);
    
        $j = 0;
        foreach ( $period as $dt ){
           $offset = $dt->format( "Y-m-d H:i:s" );
            foreach($rows as $k=>$row){
                if($row->adddate == $offset)
                $data[$j]= floatval($row->calories); 
                $data[$j] .= '';
                
                           }
                         $j++;    
                       }
                if($data)
                    
                 return array_map('floatval', $data);
               
            }
            if($week == 4){
            $date = new DateTime();
            $curdate = new DateTime();
            $date->add(DateInterval::createFromDateString('-29 days'));
            $dated = $date->format('Y-m-d');
            $curdate= $curdate->format('Y-m-d');
                $criteria=new CDbCriteria;
                //$current = new CDbExpression('CURDATE()');
                //$criteria->with='worktype';
		//$criteria->compare('id',$this->id);
                $criteria->select = "*,sum(calories) as calories";
		$criteria->compare('user_id',Yii::app()->user->id);
                //$now = new CDbExpression("NOW(Y-m-d)");
                $now = new CDbExpression('NOW()',array('Y-m-d'=>''));
//                $criteria->addCondition('DATE(t.adddate) = '.$now.''); 
//                $criteria->addInCondition('worktype.type',array(2,3,4,5,6));
                $criteria->addBetweenCondition('adddate',"'$dated'",$curdate);
                $criteria->group='adddate';
                $rows = self::model()->findAll($criteria);
                $begin = new DateTime( $dated );
                $end = new DateTime( $curdate+1 );

                $interval = DateInterval::createFromDateString('3 day');
                $period = new DatePeriod($begin, $interval, $end);
    
        $j = 0;
        foreach ( $period as $dt ){
           $offset = $dt->format( "Y-m-d H:i:s" );
            foreach($rows as $k=>$row){
                if($row->adddate == $offset)
                $data[$j]= floatval($row->calories); 
                $data[$j] .= '';
                
                           }
                         $j++;    
                       }
                if($data)
                    
                 return array_map('floatval', $data);
               
            }
            if($week == 8){
            $date = new DateTime();
            $curdate = new DateTime();
            $date->add(DateInterval::createFromDateString('-59 days'));
            $dated = $date->format('Y-m-d');
            $curdate= $curdate->format('Y-m-d');
                $criteria=new CDbCriteria;
                //$current = new CDbExpression('CURDATE()');
                //$criteria->with='worktype';
		//$criteria->compare('id',$this->id);
                $criteria->select = "*,sum(calories) as calories";
		$criteria->compare('user_id',Yii::app()->user->id);
                //$now = new CDbExpression("NOW(Y-m-d)");
                $now = new CDbExpression('NOW()',array('Y-m-d'=>''));
//                $criteria->addCondition('DATE(t.adddate) = '.$now.''); 
//                $criteria->addInCondition('worktype.type',array(2,3,4,5,6));
                $criteria->addBetweenCondition('adddate',"'$dated'",$curdate);
                $criteria->group='adddate';
                $rows = self::model()->findAll($criteria);
                $begin = new DateTime( $dated );
                $end = new DateTime( $curdate+1 );

                $interval = DateInterval::createFromDateString('3 day');
                $period = new DatePeriod($begin, $interval, $end);
    
        $j = 0;
        foreach ( $period as $dt ){
           $offset = $dt->format( "Y-m-d H:i:s" );
            foreach($rows as $k=>$row){
                if($row->adddate == $offset)
                $data[$j]= floatval($row->calories); 
                $data[$j] .= '';
                
                           }
                         $j++;    
                       }
                if($data)
                    
                 return array_map('floatval', $data);
               
            }
            if($week == 12){
            $date = new DateTime();
            $curdate = new DateTime();
            $date->add(DateInterval::createFromDateString('-89 days'));
            $dated = $date->format('Y-m-d');
            $curdate= $curdate->format('Y-m-d');
                $criteria=new CDbCriteria;
                //$current = new CDbExpression('CURDATE()');
                //$criteria->with='worktype';
		//$criteria->compare('id',$this->id);
                $criteria->select = "*,sum(calories) as calories";
		$criteria->compare('user_id',Yii::app()->user->id);
                //$now = new CDbExpression("NOW(Y-m-d)");
                $now = new CDbExpression('NOW()',array('Y-m-d'=>''));
//                $criteria->addCondition('DATE(t.adddate) = '.$now.''); 
//                $criteria->addInCondition('worktype.type',array(2,3,4,5,6));
                $criteria->addBetweenCondition('adddate',"'$dated'",$curdate);
                $criteria->group='adddate';
                $rows = self::model()->findAll($criteria);
                $begin = new DateTime( $dated );
                $end = new DateTime( $curdate+1 );

                $interval = DateInterval::createFromDateString('7 day');
                $period = new DatePeriod($begin, $interval, $end);
    
        $j = 0;
        foreach ( $period as $dt ){
           $offset = $dt->format( "Y-m-d H:i:s" );
            foreach($rows as $k=>$row){
                if($row->adddate == $offset)
                $data[$j]= floatval($row->calories); 
                $data[$j] .= '';
                
                           }
                         $j++;    
                       }
                if($data)
                    
                 return array_map('floatval', $data);
               
            }
            if($week == 24){
            $date = new DateTime();
            $curdate = new DateTime();
            $date->add(DateInterval::createFromDateString('-179 days'));
            $dated = $date->format('Y-m-d');
            $curdate= $curdate->format('Y-m-d');
                $criteria=new CDbCriteria;
                //$current = new CDbExpression('CURDATE()');
                //$criteria->with='worktype';
		//$criteria->compare('id',$this->id);
                $criteria->select = "*,sum(calories) as calories";
		$criteria->compare('user_id',Yii::app()->user->id);
                //$now = new CDbExpression("NOW(Y-m-d)");
                $now = new CDbExpression('NOW()',array('Y-m-d'=>''));
//                $criteria->addCondition('DATE(t.adddate) = '.$now.''); 
//                $criteria->addInCondition('worktype.type',array(2,3,4,5,6));
                $criteria->addBetweenCondition('adddate',"'$dated'",$curdate);
                $criteria->group='adddate';
                $rows = self::model()->findAll($criteria);
                $begin = new DateTime( $dated );
                $end = new DateTime( $curdate+1 );

                $interval = DateInterval::createFromDateString('14 day');
                $period = new DatePeriod($begin, $interval, $end);
    
        $j = 0;
        foreach ( $period as $dt ){
           $offset = $dt->format( "Y-m-d H:i:s" );
            foreach($rows as $k=>$row){
                if($row->adddate == $offset)
                $data[$j]= floatval($row->calories); 
                $data[$j] .= '';
                
                           }
                         $j++;    
                       }
                if($data)
                    
                 return array_map('floatval', $data);
               
            }
            if($week == 38){
            $date = new DateTime();
            $curdate = new DateTime();
            $date->add(DateInterval::createFromDateString('-269 days'));
            $dated = $date->format('Y-m-d');
            $curdate= $curdate->format('Y-m-d');
                $criteria=new CDbCriteria;
                //$current = new CDbExpression('CURDATE()');
                //$criteria->with='worktype';
		//$criteria->compare('id',$this->id);
                $criteria->select = "*,sum(calories) as calories";
		$criteria->compare('user_id',Yii::app()->user->id);
                //$now = new CDbExpression("NOW(Y-m-d)");
                $now = new CDbExpression('NOW()',array('Y-m-d'=>''));
//                $criteria->addCondition('DATE(t.adddate) = '.$now.''); 
//                $criteria->addInCondition('worktype.type',array(2,3,4,5,6));
                $criteria->addBetweenCondition('adddate',"'$dated'",$curdate);
                $criteria->group='adddate';
                $rows = self::model()->findAll($criteria);
                $begin = new DateTime( $dated );
                $end = new DateTime( $curdate+1 );

                $interval = DateInterval::createFromDateString('30 day');
                $period = new DatePeriod($begin, $interval, $end);
    
        $j = 0;
        foreach ( $period as $dt ){
           $offset = $dt->format( "Y-m-d H:i:s" );
            foreach($rows as $k=>$row){
                if($row->adddate == $offset)
                $data[$j]= floatval($row->calories); 
                $data[$j] .= '';
                
                           }
                         $j++;    
                       }
                if($data)
                    
                 return array_map('floatval', $data);
               
            }
            if($week == 52){
            $date = new DateTime();
            $curdate = new DateTime();
            $date->add(DateInterval::createFromDateString('-360 days'));
            $dated = $date->format('Y-m-d');
            $curdate= $curdate->format('Y-m-d');
                $criteria=new CDbCriteria;
                //$current = new CDbExpression('CURDATE()');
                //$criteria->with='worktype';
		//$criteria->compare('id',$this->id);
                $criteria->select = "*,sum(calories) as calories";
		$criteria->compare('user_id',Yii::app()->user->id);
                //$now = new CDbExpression("NOW(Y-m-d)");
                $now = new CDbExpression('NOW()',array('Y-m-d'=>''));
//                $criteria->addCondition('DATE(t.adddate) = '.$now.''); 
//                $criteria->addInCondition('worktype.type',array(2,3,4,5,6));
                $criteria->addBetweenCondition('adddate',"'$dated'",$curdate);
                $criteria->group='adddate';
                $rows = self::model()->findAll($criteria);
                $begin = new DateTime( $dated );
                $end = new DateTime( $curdate+1 );

                $interval = DateInterval::createFromDateString('30 day');
                $period = new DatePeriod($begin, $interval, $end);
    
        $j = 0;
        foreach ( $period as $dt ){
           $offset = $dt->format( "Y-m-d H:i:s" );
            foreach($rows as $k=>$row){
                if($row->adddate == $offset)
                $data[$j]= floatval($row->calories); 
                $data[$j] .= '';
                
                           }
                         $j++;    
                       }
                if($data)
                    
                 return array_map('floatval', $data);
               
            }
        }
        public function dropdownCalsGraph($type,$period = null){
              $duration =  $this->getprogressall($type,$period);
              $consumed = $this->getprogressconsumed($period);
              if($type == 1){
                  return $duration;
              }
               if($type == 2){
                  return $consumed;
              }
            }
        public function datedownCalsGraph($date,$month,$year,$type){
              $burnt =  $this->dateCaloriegraph($date,$month,$year)+$this->dateweightCaloriegraph($date,$month,$year);
              $consumed = $this->dateintakeCaloriegraph($date,$month,$year);
//              $compared = $this->datebothCaloriegraph($date,$month,$year);
              $compared = array();
              $compared[0] = $burnt;
              $compared[1] = $consumed;
              if($type == 1){
                  return $burnt;
              }
               if($type == 2){
                  return $consumed;
              }
              if($type == 3){
                  return $compared;
              }
            }
            public function datebothCaloriegraph($date,$month,$year){
                $date = $year.'-'.$month.'-'.$date.' 00:00:00';
                $criteria = new CDbCriteria;
                $criteria->compare('user_id',Yii::app()->user->id);
                $criteria->select = 'id, name,calories,custom_calories';
                $criteria->addCondition('DATE(t.adddate) = "'.$date.'"'); 
                $rows1 = self::model()->findAll($criteria);
                
                
                $criteria2 = new CDbCriteria;
                $criteria2->compare('user_id',Yii::app()->user->id);
                $criteria2->select = 'id, name,calories';
                $criteria2->addCondition('DATE(t.adddate) = "'.$date.'"'); 
                $rows2 = UserFoodintake::model()->findAll($criteria2);
                $data = array();
                 foreach($rows1 as $row){
                     $data[]= $row->calories ;
                 }
                  if($data)
                  return array_sum($data);
                 else
                  return '';
            }
            /**
             * Get the graph cardio through the calendar date click on user dashboard
             */
             public function dateCaloriegraph($date,$month,$year){
		$date = $year.'-'.$month.'-'.$date.' 00:00:00';
                $criteria = new CDbCriteria;
                $criteria->compare('user_id',Yii::app()->user->id);
                $criteria->select = 'id, name,calories,custom_calories';
                
                $criteria->addCondition('DATE(t.adddate) = "'.$date.'"'); 
                $rows = self::model()->findAll($criteria);
                $data = array();
                 foreach($rows as $row){
                     $data[]= $row->calories ;
                 }
                 
                 if($data)
                  return array_sum($data);
                 else
                  return '';
		
		
            }
            /**
             * Get the graph Weight through the calendar date click on user dashboard
             */
            public function dateweightCaloriegraph($date,$month,$year){
		$date = $year.'-'.$month.'-'.$date.' 00:00:00';
                $criteria = new CDbCriteria;
                $criteria->compare('user_id',Yii::app()->user->id);
                $criteria->select = 'id, name,custom_calories';
                $criteria->addCondition('DATE(t.adddate) = "'.$date.'"'); 
                 $rows = self::model()->findAll($criteria);
                 $data = array();
                 foreach($rows as $row){
                     $data[]= $row->custom_calories ;
                 }
                 
                 if($data)
                 return array_sum($data);
                 else
                     return '';
		
		
            }
            /**
             * Return the food intake data through date selection via user dashboard
             */
            public function dateintakeCaloriegraph($date,$month,$year)
            {
                    $date = $year.'-'.$month.'-'.$date.' 00:00:00';
                    $criteria = new CDbCriteria;
                    $criteria->compare('user_id',Yii::app()->user->id);
                    $criteria->select = 'id, name,calories';
                    $criteria->addCondition('DATE(t.adddate) = "'.$date.'"'); 
                     $rows = UserFoodintake::model()->findAll($criteria);
                     $data = array();
                     foreach($rows as $row){
                         $data[]= $row->calories ;
                     }
                     return array_sum($data);


            }
            
}
