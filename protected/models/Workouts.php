<?php

/**
 * This is the model class for table "gp_workouts".
 *
 * The followings are the available columns in table 'gp_workouts':
 * @property integer $id
 * @property integer $worktype_id
 * @property string $name
 * @property string $intensity
 * @property double $met
 * @property integer $status
 */
class Workouts extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'gp_workouts';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('worktype_id, name,intensity', 'required'),
			array('worktype_id, status', 'numerical', 'integerOnly'=>true),
			array('met', 'numerical'),
			array('name, intensity', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, worktype_id, name, intensity, met, status', 'safe', 'on'=>'search'),
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
			'worktype_id' => 'Worktype',
			'name' => 'Name',
			'intensity' => 'Intensity',
			'met' => 'Met',
			'status' => 'Status',
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
		$criteria->compare('worktype_id',$this->worktype_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('intensity',$this->intensity,true);
		$criteria->compare('met',$this->met);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Workouts the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
