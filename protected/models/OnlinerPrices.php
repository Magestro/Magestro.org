<?php

/**
 * This is the model class for table "{{onliner_prices}}".
 *
 * The followings are the available columns in table '{{onliner_prices}}':
 * @property integer $id
 * @property string $value
 * @property double $value_from
 * @property double $value_to
 * @property integer $item_id
 * @property string $currency
 * @property string $created
 */
class OnlinerPrices extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{onliner_prices}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('value, value_from, value_to, item_id, currency, created', 'required'),
			array('item_id', 'numerical', 'integerOnly'=>true),
			array('value_from, value_to', 'numerical'),
			array('value', 'length', 'max'=>255),
			array('currency', 'length', 'max'=>3),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, value, value_from, value_to, item_id, currency, created', 'safe', 'on'=>'search'),
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
			'value' => 'Value',
			'value_from' => 'Value From',
			'value_to' => 'Value To',
			'item_id' => 'Item',
			'currency' => 'Currency',
			'created' => 'Created',
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
		$criteria->compare('value',$this->value,true);
		$criteria->compare('value_from',$this->value_from);
		$criteria->compare('value_to',$this->value_to);
		$criteria->compare('item_id',$this->item_id);
		$criteria->compare('currency',$this->currency,true);
		$criteria->compare('created',$this->created,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return OnlinerPrices the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
