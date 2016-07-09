<?php

/**
 * This is the model class for table "gp_trainer_client_msg".
 *
 * The followings are the available columns in table 'gp_trainer_client_msg':
 * @property integer $id
 * @property integer $from_sender
 * @property integer $to_receiver
 * @property string $message
 * @property integer $for_msg
 * @property string $senddate
 * @property integer $replied_stat
 * @property integer $status
 * @property integer $reqtojoin
 * @property string $subject
 */
class TrainerClientMsg extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'gp_trainer_client_msg';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
//			array('from_sender, to_receiver, message, for_msg, senddate, subject', 'required'),
                    array('message,subject', 'required','on'=>'reply'),
			array('from_sender, to_receiver, for_msg, replied_stat, status, reqtojoin', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, from_sender, to_receiver, message, for_msg, senddate, replied_stat, status, reqtojoin, subject', 'safe', 'on'=>'search'),
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
			'from_sender' => 'From Sender',
			'to_receiver' => 'To Receiver',
			'message' => 'Message',
			'for_msg' => 'For Msg',
			'senddate' => 'Senddate',
			'replied_stat' => 'Replied Stat',
			'status' => 'Status',
			'reqtojoin' => 'Reqtojoin',
			'subject' => 'Subject',
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
		$criteria->compare('from_sender',$this->from_sender);
		$criteria->compare('to_receiver',$this->to_receiver);
		$criteria->compare('message',$this->message,true);
		$criteria->compare('for_msg',$this->for_msg);
		$criteria->compare('senddate',$this->senddate,true);
		$criteria->compare('replied_stat',$this->replied_stat);
		$criteria->compare('status',$this->status);
		$criteria->compare('reqtojoin',$this->reqtojoin);
		$criteria->compare('subject',$this->subject,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TrainerClientMsg the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        public function notifysearch() {
        $sql = 'SELECT tcm.id as id,tcm.reqtojoin as reqtojoin ,tcm.status as status, tcm.message, tcm.from_sender , tcm.to_receiver, tcm.senddate, tcm.subject, touser.email AS Recipientemail, foruser.email AS Senderemail
                                          FROM gp_trainer_client_msg AS tcm LEFT JOIN gp_users AS touser ON touser.id = tcm.to_receiver LEFT JOIN gp_users AS foruser ON foruser.id = tcm.from_sender
                                          WHERE reqtojoin = 1';
        return $dataProvider = new CSqlDataProvider($sql, array(
            'totalItemCount' => $count,
            'sort' => array(
                'attributes' => array(
                //'id', 'username', 'email',
                ),
            ),
        ));
        //print_r($dataProvider);die;
        $dataProvider->getData();
    }
}
