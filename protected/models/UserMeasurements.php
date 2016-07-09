<?php

/**
 * This is the model class for table "gp_user_measurements".
 *
 * The followings are the available columns in table 'gp_user_measurements':
 * @property integer $id
 * @property integer $user_id
 * @property double $weight
 * @property double $arms
 * @property double $calves
 * @property double $chest
 * @property double $forearms
 * @property double $hips
 * @property double $neck
 * @property double $thighs
 * @property double $waist
 * @property string $adddate
 * @property string $mnotes
 * @property integer $status
 * @property string $reserve
 */
class UserMeasurements extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'gp_user_measurements';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id', 'required'),
			array('user_id, status', 'numerical', 'integerOnly'=>true),
			array('weight, arms, calves, chest, forearms, hips, neck, thighs, waist', 'numerical'),
                        array('weight, arms, calves, chest, forearms, hips, neck, thighs, waist', 'length', 'max'=>3),
			array('reserve', 'length', 'max'=>255),
			array('adddate, mnotes', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_id, weight, arms, calves, chest, forearms, hips, neck, thighs, waist, adddate, mnotes, status, reserve', 'safe', 'on'=>'search'),
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
                    'users' => array(self::BELONGS_TO, 'Users', 'user_id'),
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
			'weight' => 'Weight',
			'arms' => 'Arms',
			'calves' => 'Calves',
			'chest' => 'Chest',
			'forearms' => 'Forearms',
			'hips' => 'Hips',
			'neck' => 'Neck',
			'thighs' => 'Thighs',
			'waist' => 'Waist',
			'adddate' => 'Adddate',
			'mnotes' => 'Notes',
			'status' => 'Status',
			'reserve' => 'Reserve',
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
		$criteria->compare('weight',$this->weight);
		$criteria->compare('arms',$this->arms);
		$criteria->compare('calves',$this->calves);
		$criteria->compare('chest',$this->chest);
		$criteria->compare('forearms',$this->forearms);
		$criteria->compare('hips',$this->hips);
		$criteria->compare('neck',$this->neck);
		$criteria->compare('thighs',$this->thighs);
		$criteria->compare('waist',$this->waist);
		$criteria->compare('adddate',$this->adddate,true);
		$criteria->compare('mnotes',$this->mnotes,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('reserve',$this->reserve,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return UserMeasurements the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        public function Usercurweight()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('user_id',Yii::app()->user->id);
		$criteria->compare('weight',$this->weight);
		$now = new CDbExpression("CURDATE()");
                $criteria->addCondition('DATE(t.adddate) = '.$now.'');

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
