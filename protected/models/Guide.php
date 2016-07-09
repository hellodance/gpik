<?php

/**
 * This is the model class for table "gp_guide".
 *
 * The followings are the available columns in table 'gp_guide':
 * @property integer $id
 * @property string $title
 * @property string $article
 * @property string $excerpt
 * @property string $thumb
 * @property string $author
 * @property string $date
 * @property string $rating
 * @property integer $status
 */
class Guide extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'gp_guide';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, article,excerpt', 'required'),
			array('status', 'numerical', 'integerOnly'=>true),
			array('title, author, rating', 'length', 'max'=>255),
			array('thumb, date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, article, thumb, author, date, rating, status', 'safe', 'on'=>'search'),
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
			'title' => 'Title',
			'article' => 'Article',
                        'excerpt' => 'Excerpt',
			'thumb' => 'Thumb',
			'author' => 'Author',
			'date' => 'Date',
			'rating' => 'Rating',
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('article',$this->article,true);
                $criteria->compare('excerpt',$this->excerpt,true);
		$criteria->compare('thumb',$this->thumb,true);
		$criteria->compare('author',$this->author,true);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('rating',$this->rating,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        public function activesearch()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('article',$this->article,true);
                $criteria->compare('excerpt',$this->excerpt,true);
		$criteria->compare('thumb',$this->thumb,true);
		$criteria->compare('author',$this->author,true);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('rating',$this->rating,true);
		$criteria->compare('status',1);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Guide the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
