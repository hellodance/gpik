<?php

/**
 * This is the model class for table "gp_countries".
 *
 * The followings are the available columns in table 'gp_countries':
 * @property integer $id
 * @property string $countryCode
 * @property string $countryName
 * @property string $currencyCode
 * @property string $capital
 */
class Countries extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'gp_countries';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('countryCode', 'length', 'max'=>2),
			array('countryName', 'length', 'max'=>45),
			array('currencyCode', 'length', 'max'=>3),
			array('capital', 'length', 'max'=>30),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, countryCode, countryName, currencyCode, capital', 'safe', 'on'=>'search'),
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
			'countryCode' => 'Country Code',
			'countryName' => 'Country Name',
			'currencyCode' => 'Currency Code',
			'capital' => 'Capital',
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
		$criteria->compare('countryCode',$this->countryCode,true);
		$criteria->compare('countryName',$this->countryName,true);
		$criteria->compare('currencyCode',$this->currencyCode,true);
		$criteria->compare('capital',$this->capital,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Countries the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
         public function getCountryuserDropDown()
	{
            $data['locations'] = CHtml::listData(Countries::model()->findAll(array('order'=>'countryName')), 'countryCode', 'countryName');
		return $data['locations'];
                
	}
}
