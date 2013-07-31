<?php

/**
 * This is the model class for table "balls".
 *
 * The followings are the available columns in table 'balls':
 * @property string $ball
 * @property double $mean_rounds
 * @property integer $max_rounds
 * @property integer $current_rounds
 * @property double $mean_days
 * @property integer $max_days
 * @property integer $current_days
 * @property integer $count
 */
class Balls extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Balls the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'balls';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ball', 'required'),
			array('max_rounds, current_rounds, max_days, current_days, count', 'numerical', 'integerOnly'=>true),
			array('mean_rounds, mean_days', 'numerical'),
			array('ball', 'length', 'max'=>3),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ball, mean_rounds, max_rounds, current_rounds, mean_days, max_days, current_days, count', 'safe', 'on'=>'search'),
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
			'ball' => 'Ball',
			'mean_rounds' => 'Mean Rounds',
			'max_rounds' => 'Max Rounds',
			'current_rounds' => 'Current Rounds',
			'mean_days' => 'Mean Days',
			'max_days' => 'Max Days',
			'current_days' => 'Current Days',
			'count' => 'Count',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('ball',$this->ball,true);
		$criteria->compare('mean_rounds',$this->mean_rounds);
		$criteria->compare('max_rounds',$this->max_rounds);
		$criteria->compare('current_rounds',$this->current_rounds);
		$criteria->compare('mean_days',$this->mean_days);
		$criteria->compare('max_days',$this->max_days);
		$criteria->compare('current_days',$this->current_days);
		$criteria->compare('count',$this->count);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}