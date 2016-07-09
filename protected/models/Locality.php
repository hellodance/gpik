<?php

/**
 * This is the model class for table "gp_locality".
 *
 * The followings are the available columns in table 'gp_locality':
 * @property integer $id
 * @property integer $city_id
 * @property string $locality
 * @property integer $status
 */
class Locality extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'gp_locality';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('locality', 'required'),
			array('city_id, status', 'numerical', 'integerOnly'=>true),
			array('locality', 'length', 'max'=>40),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, city_id, locality, status', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'city_id' => 'City',
			'locality' => 'Locality',
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
		$criteria->compare('city_id',$this->city_id);
		$criteria->compare('locality',$this->locality,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Locality the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        public function getlocalityDropDown()
	{
            $data['locations'] = CHtml::listData(Locality::model()->findAll(array('order'=>'locality')), 'id', 'locality');
            return $data['locations'];
                
	}
        public function getlocality($id)
	{
                $data['locations'] = CHtml::listData(Locality::model()->findAll(array('order'=>'city_name')), 'city_id', 'locality');
		return $data['locations'];
	}
        public function getlocalitytype($id)
	{
                $data = Locality::model()->findAllByAttributes(array('city_id'=>$id));
               foreach ($data as $locality){
                   $locali[] = $locality->locality;
               }
		return $locali;
	}
}
