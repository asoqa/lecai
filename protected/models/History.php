<?php

/**
 * This is the model class for table "history".
 *
 * The followings are the available columns in table 'history':
 * @property string $issue
 * @property string $date
 * @property string $result
 * @property double $sale
 * @property double $pricebool
 * @property string $rb1
 * @property string $rb2
 * @property string $rb3
 * @property string $rb4
 * @property string $rb5
 * @property string $rb6
 * @property string $bb1
 * @property integer $prize1_count
 * @property integer $prize1_amount
 * @property integer $prize2_count
 * @property integer $prize2_amount
 * @property integer $prize3_count
 * @property integer $prize3_amount
 * @property integer $prize4_count
 * @property integer $prize4_amount
 * @property integer $prize5_count
 * @property integer $prize5_amount
 * @property integer $prize6_count
 * @property integer $prize6_amount
 *
 * The followings are the available model relations:
 * @property Statistics[] $statistics
 */
class History extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return History the static model class
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
		return 'history';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('issue, date, result', 'required'),
			array('prize1_count, prize1_amount, prize2_count, prize2_amount, prize3_count, prize3_amount, prize4_count, prize4_amount, prize5_count, prize5_amount, prize6_count, prize6_amount', 'numerical', 'integerOnly'=>true),
			array('sale, pricebool', 'numerical'),
			array('issue', 'length', 'max'=>10),
			array('result', 'length', 'max'=>20),
			array('rb1, rb2, rb3, rb4, rb5, rb6, bb1', 'length', 'max'=>2),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('issue, date, result, sale, pricebool, rb1, rb2, rb3, rb4, rb5, rb6, bb1, prize1_count, prize1_amount, prize2_count, prize2_amount, prize3_count, prize3_amount, prize4_count, prize4_amount, prize5_count, prize5_amount, prize6_count, prize6_amount', 'safe', 'on'=>'search'),
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
			'statistics' => array(self::HAS_MANY, 'Statistics', 'issue'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'issue' => 'Issue',
			'date' => 'Date',
			'result' => 'Result',
			'sale' => 'Sale',
			'pricebool' => 'Pricebool',
			'rb1' => 'Rb1',
			'rb2' => 'Rb2',
			'rb3' => 'Rb3',
			'rb4' => 'Rb4',
			'rb5' => 'Rb5',
			'rb6' => 'Rb6',
			'bb1' => 'Bb1',
			'prize1_count' => 'Prize1 Count',
			'prize1_amount' => 'Prize1 Amount',
			'prize2_count' => 'Prize2 Count',
			'prize2_amount' => 'Prize2 Amount',
			'prize3_count' => 'Prize3 Count',
			'prize3_amount' => 'Prize3 Amount',
			'prize4_count' => 'Prize4 Count',
			'prize4_amount' => 'Prize4 Amount',
			'prize5_count' => 'Prize5 Count',
			'prize5_amount' => 'Prize5 Amount',
			'prize6_count' => 'Prize6 Count',
			'prize6_amount' => 'Prize6 Amount',
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

		$criteria->compare('issue',$this->issue,true);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('result',$this->result,true);
		$criteria->compare('sale',$this->sale);
		$criteria->compare('pricebool',$this->pricebool);
		$criteria->compare('rb1',$this->rb1,true);
		$criteria->compare('rb2',$this->rb2,true);
		$criteria->compare('rb3',$this->rb3,true);
		$criteria->compare('rb4',$this->rb4,true);
		$criteria->compare('rb5',$this->rb5,true);
		$criteria->compare('rb6',$this->rb6,true);
		$criteria->compare('bb1',$this->bb1,true);
		$criteria->compare('prize1_count',$this->prize1_count);
		$criteria->compare('prize1_amount',$this->prize1_amount);
		$criteria->compare('prize2_count',$this->prize2_count);
		$criteria->compare('prize2_amount',$this->prize2_amount);
		$criteria->compare('prize3_count',$this->prize3_count);
		$criteria->compare('prize3_amount',$this->prize3_amount);
		$criteria->compare('prize4_count',$this->prize4_count);
		$criteria->compare('prize4_amount',$this->prize4_amount);
		$criteria->compare('prize5_count',$this->prize5_count);
		$criteria->compare('prize5_amount',$this->prize5_amount);
		$criteria->compare('prize6_count',$this->prize6_count);
		$criteria->compare('prize6_amount',$this->prize6_amount);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}