<?php

/**
 * This is the model class for table "{{wx_movie}}".
 *
 * The followings are the available columns in table '{{wx_movie}}':
 * @property integer $id
 * @property string $title
 * @property string $director
 * @property string $actor
 * @property string $info
 * @property string $img
 * @property string $cp
 * @property string $type
 * @property string $classify
 * @property string $action
 * @property string $param
 * @property integer $addTime
 * @property string $orders
 */
class WxMovie extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{wx_movie}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('addTime', 'numerical', 'integerOnly'=>true),
			array('title, type', 'length', 'max'=>100),
			array('director', 'length', 'max'=>50),
			array('actor, action, orders', 'length', 'max'=>255),
			array('info, img, param', 'length', 'max'=>600),
			array('cp', 'length', 'max'=>2),
			array('classify', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, director, actor, info, img, cp, type, classify, action, param, addTime, orders', 'safe', 'on'=>'search'),
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
			'title' => '片名',
			'director' => '导演',
			'actor' => '演员',
			'info' => '简介',
			'img' => '图片',
			'cp' => '牌照方',
			'type' => '上传类型',
			'classify' => '分类',
			'action' => '跳转的action',
			'param' => 'Param',
			'addTime' => '添加时间',
			'orders' => '排序',
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
		$criteria->compare('director',$this->director,true);
		$criteria->compare('actor',$this->actor,true);
		$criteria->compare('info',$this->info,true);
		$criteria->compare('img',$this->img,true);
		$criteria->compare('cp',$this->cp,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('classify',$this->classify,true);
		$criteria->compare('action',$this->action,true);
		$criteria->compare('param',$this->param,true);
		$criteria->compare('addTime',$this->addTime);
		$criteria->compare('orders',$this->orders,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return WxMovie the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

