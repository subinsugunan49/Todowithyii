<?php

/**
 * This is the model class for table "taskgroup".
 *
 * The followings are the available columns in table 'taskgroup':
 * @property integer $id
 * @property string $taskgroupname
 * @property string $description
 * @property integer $created_by
 * @property string $created_on
 * @property string $remind_on
 * @property string $status
 */
class Taskgroup extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Taskgroup the static model class
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
		return 'taskgroup';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('taskgroupname,category_id, created_by', 'required'),
			array('created_by', 'numerical', 'integerOnly'=>true),
			array('taskgroupname', 'length', 'max'=>200),
			array('status', 'length', 'max'=>9),
			array('description, remind_on', 'safe'),
			array('id, taskgroupname, description, created_by, created_on, remind_on, status', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'taskgroupname' => 'Task/Work Group Title',
			'description' => 'Description',
			'created_by' => 'Created By',
			'created_on' => 'Created On',
			'remind_on' => 'Remind On',
			'status' => 'Status',
			'category_id'=>'Category'
		);
	}
  /**
	 * Retrieves a list of Taks Group models.
	 * @return  $queryResult List of Array items ,that can return the models based on the search/filter conditions.
	 */
	public function getAll_taskgrouplist()
	{
		$queryResult=array();
		$queryAppd='';
		$paramAppd=array(':status'=>'deleted');
		
		$queryResult = Yii::app()->db->createCommand()

			->select("tg.taskgroupname,DATE_FORMAT(tg.created_on, '%d-%m-%Y') as createdat,tg.id as group_id,c.name as task_category,tg.status,td.*,count(td.id) as total_task")
			->from('taskgroup tg')
			->join('category c','c.id=tg.category_id')
			->leftjoin('taskdetails td','tg.id=td.task_group_id')
			->where('tg.status != :status'. $queryAppd, $paramAppd)
			->group('tg.id')
			->order('tg.id desc')
			->queryAll();

        return $queryResult;
	}
/**
	 * Retrieves a list of Task Details List Array based on the Task Group Id .
	 * @param integer $group_id the Task Group ID of the model to be loaded.
	 * @return List of Array items ,that can return the models based on the $group_id
	 */
	public function getAll_tasklist($group_id)
	{
		$queryResult=array();
		$queryAppd='';
		$paramAppd=array(':status'=>'deleted','group_id'=>$group_id);
		
		$queryResult = Yii::app()->db->createCommand()

			->select("td.*")
			->from('taskgroup tg')
			->join('category c','c.id=tg.category_id')
			->join('taskdetails td','tg.id=td.task_group_id')
			->where('tg.status != :status AND tg.id = :group_id'. $queryAppd, $paramAppd)
			->order('td.id desc')
			->queryAll();
        return $queryResult;
	}
 /**
	 * Html view of   list of tasks  based on the current search/filter conditions.
	 * @param Array $task_group_details the List  of the Task model to be display
	 * @return List of Array items ,that can be summary details and table list
	 */
	function tasklist_html($task_group_details){
		$pendingtask =0;
		$completedtask=0;
		$table_list='';
		$sn=0;

		try{
			
			foreach ($task_group_details as $key => $rowdata) {
				$completedon='';
			
				if ($rowdata['status'] == 'pending') {
					$pendingtask ++;
					$status='<span class="label label-badge-warning">Pending</span>';
					$switchchecked='';

				}elseif($rowdata['status'] == 'completed'){

					$completedtask ++;
					$completedon=date('d-m-Y',strtotime($rowdata['completed_on']));
					$status='<span class="label label-success">Completed</span>';
					$switchchecked='checked';

				}
				++$sn;
				 $table_list .='<tr class="odd" >
									
		                            <td>'.$rowdata['title'].'</td>
		                            <td>'.date('d-m-Y',strtotime($rowdata['created_on'])).'</td>            
		                            <td>'.$status.'</td>
		                            <td>'.$completedon.'</td>
		                            <td> 
		                            <div class="switch switch-small" data-on-label="Completed" data-off-label="Pending" data-id="'.$rowdata['id'].'">
                                  <input type="checkbox"   class="toggle"  '.$switchchecked.' />
                                     </div>
                                    </td>
                          <td class="button-column">
                          <a class="edit-icon-new hide-inner-image" title="Edit" onclick="javascript:modaleditopen('.$rowdata['id'].')" href="#"> </a> ';
                          $table_list .= '  <a class="trash-icon-new hide-inner-image"  title="Delete" onclick="javascript:action_delete('.$rowdata['id'].')" href="#"> </a>
                          </td>
                                  </tr>';
		
			}


			$return['pendingtask']=$pendingtask;
			$return['completedtask']=$completedtask;
			$return['table_list']=$table_list;
			$return['total_task']=$sn;

			return $return;
			
		}
	 catch(Exception $e) {

	 	return null;
	 }
	
	}//End Function
}