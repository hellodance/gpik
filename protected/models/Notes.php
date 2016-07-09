<?php

/**
 * This is the model class for table "gp_notes".
 *
 * The followings are the available columns in table 'gp_notes':
 * @property integer $id
 * @property integer $from
 * @property integer $to
 * @property string $note
 * @property integer $for
 * @property integer $onto
 * @property string $adddate
 * @property string $modifydate
 * @property integer $status
 */
class Notes extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'gp_notes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('from, to, for, onto, adddate', 'required'),
			array('from, to, for, onto, status', 'numerical', 'integerOnly'=>true),
			array('note, modifydate', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, from, to, note, for, onto, adddate, modifydate, status', 'safe', 'on'=>'search'),
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
			'from' => 'From',
			'to' => 'To',
			'note' => 'Note',
			'for' => 'For',
			'onto' => 'Onto',
			'adddate' => 'Adddate',
			'modifydate' => 'Modifydate',
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
		$criteria->compare('from',$this->from);
		$criteria->compare('to',$this->to);
		$criteria->compare('note',$this->note,true);
		$criteria->compare('for',$this->for);
		$criteria->compare('onto',$this->onto);
		$criteria->compare('adddate',$this->adddate,true);
		$criteria->compare('modifydate',$this->modifydate,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Notes the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
