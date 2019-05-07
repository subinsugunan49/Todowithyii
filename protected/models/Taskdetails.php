<?php

/**
 * This is the model class for table "taskdetails".
 *
 * The followings are the available columns in table 'taskdetails':
 * @property integer $id
 * @property string $title
 * @property string $created_on
 * @property string $completed_on
 * @property string $status
 */
class Taskdetails extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Taskdetails the static model class
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
		return 'taskdetails';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title,task_group_id', 'required'),
			array('title', 'length', 'max'=>200),
			array('remarks', 'length', 'max'=>500),
			array('status', 'length', 'max'=>11),
			array('completed_on,remarks', 'safe'),
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
			'created_on' => 'Created On',
			'completed_on' => 'Completed On',
			'remarks' => 'Remarks',
			'status' => 'Status',
		);
	}

	
}