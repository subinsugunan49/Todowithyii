<?php

/**
 * This is the model class for table "category".
 *
 * The followings are the available columns in table 'category':
 * @property string $id
 * @property string $name
 * @property string $status
 */
class Category extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Category the static model class
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
		return 'category';
	}


	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @param integer $task_category_id the  ID of the model to be loaded
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function getTaskCategory($task_category_id)
	{
		
		 $categorylist=Category::model()->findByPk($task_category_id);

		 if($categorylist===null)
			throw new CHttpException(404,'The requested value doesnot exist.');
		return $categorylist->name;

	}
}