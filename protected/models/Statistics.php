<?php

/**
 * This is the model class for table "statistics".
 *
 * The followings are the available columns in table 'statistics':
 * @property string $issue
 * @property integer $sum_r
 * @property integer $min_r
 * @property integer $max_r
 * @property double $mean_r
 * @property integer $sum_all
 * @property integer $max_all
 * @property integer $min_all
 * @property double $mean_all
 * @property string $redball
 * @property string $blueball
 * @property string $date
 * @property string $binary_r
 * @property string $binary_b
 * @property integer $bit0_r
 * @property integer $bit1_r
 * @property integer $bit0_b
 * @property integer $bit1_b
 * @property string $parity_r
 * @property string $parity_b
 * @property string $id
 *
 * The followings are the available model relations:
 * @property History $issue0
 */
class Statistics extends CActiveRecord
{
    public $percentage;
    public $count_sum;
    
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Statistics the static model class
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
		return 'statistics';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('issue, redball, blueball', 'required'),
			array('sum_r, min_r, max_r, sum_all, max_all, min_all, bit0_r, bit1_r, bit0_b, bit1_b', 'numerical', 'integerOnly'=>true),
			array('mean_r, mean_all', 'numerical'),
			array('issue', 'length', 'max'=>10),
			array('redball', 'length', 'max'=>17),
			array('blueball', 'length', 'max'=>2),
			array('binary_r', 'length', 'max'=>45),
			array('binary_b, parity_r', 'length', 'max'=>6),
			array('parity_b', 'length', 'max'=>1),
			array('date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('issue, sum_r, min_r, max_r, mean_r, sum_all, max_all, min_all, mean_all, redball, blueball, date, binary_r, binary_b, bit0_r, bit1_r, bit0_b, bit1_b, parity_r, parity_b, id', 'safe', 'on'=>'search'),
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
			'history' => array(self::BELONGS_TO, 'History', 'issue'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'issue' => 'Issue',
			'sum_r' => 'Sum R',
			'min_r' => 'Min R',
			'max_r' => 'Max R',
			'mean_r' => 'Mean R',
			'sum_all' => 'Sum All',
			'max_all' => 'Max All',
			'min_all' => 'Min All',
			'mean_all' => 'Mean All',
			'redball' => 'Redball',
			'blueball' => 'Blueball',
			'date' => 'Date',
			'binary_r' => 'Binary R',
			'binary_b' => 'Binary B',
			'bit0_r' => 'Bit0 R',
			'bit1_r' => 'Bit1 R',
			'bit0_b' => 'Bit0 B',
			'bit1_b' => 'Bit1 B',
			'parity_r' => 'Parity R',
			'parity_b' => 'Parity B',
			'id' => 'ID',
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
		$criteria->compare('sum_r',$this->sum_r);
		$criteria->compare('min_r',$this->min_r);
		$criteria->compare('max_r',$this->max_r);
		$criteria->compare('mean_r',$this->mean_r);
		$criteria->compare('sum_all',$this->sum_all);
		$criteria->compare('max_all',$this->max_all);
		$criteria->compare('min_all',$this->min_all);
		$criteria->compare('mean_all',$this->mean_all);
		$criteria->compare('redball',$this->redball,true);
		$criteria->compare('blueball',$this->blueball,true);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('binary_r',$this->binary_r,true);
		$criteria->compare('binary_b',$this->binary_b,true);
		$criteria->compare('bit0_r',$this->bit0_r);
		$criteria->compare('bit1_r',$this->bit1_r);
		$criteria->compare('bit0_b',$this->bit0_b);
		$criteria->compare('bit1_b',$this->bit1_b);
		$criteria->compare('parity_r',$this->parity_r,true);
		$criteria->compare('parity_b',$this->parity_b,true);
		$criteria->compare('id',$this->id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}