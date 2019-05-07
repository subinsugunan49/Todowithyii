<?php
class TaskgroupController extends RController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	 {
  		 return array(
            'rights'
        );
    }

    /**
	 * Displays  all models.
	 @return $taskgrouplist the array of Task Group List
	 */
	public function actionIndex()
	{
		$model=new Taskgroup();
		$taskgrouplist=$model->getAll_taskgrouplist();
		$this->render('index',array(
			'taskgrouplist'=>$taskgrouplist,
		));
		
	}

	/**
	 * Displays a particular model details and listing all tasks based on group ID.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$model=$this->loadModel($id);

		$modelcategory=new Category;
		$taskcategory=$modelcategory->getTaskCategory($model->category_id);

		
		$task_group_details=$model->getAll_tasklist($id);
        $tasklist_html=$model->tasklist_html($task_group_details);


		$this->render('view',array(
			'model'=>$model,
			'data'=>$tasklist_html,
			'taskcategory'=>$taskcategory
 
		));
	}

	/**
	 * Creates a new model-Task Group.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{

		$model=new Taskgroup;
		$categoryModel=new Category; //Get LIst Of task Category

		if(isset($_POST['Taskgroup']))
		{
			$model->attributes=$_POST['Taskgroup'];

			$model->created_by=Yii::app()->user->getId();


			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('_form',array(
			'model'=>$model,
			'categoryModel'=>$categoryModel
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the same page.
	 * @param integer $_POST['id'] the ID of the model to be deleted
	 @return Message
	 */
	public function actionDelete()
	{
		if(isset($_POST['id']) && $_POST['id']){
		 
		  $id  = $_POST['id'];
		  $model=$this->loadModel($id);

		  $model->status ='deleted';
    
		  if($model->save())
		  {
			  echo "Deleted succesfully";
		  }
		 else
		 echo "Somting went wrong";
	  }
	  else
	  {
		 echo "Invalid Request";  
	  }
	}

	
	
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Taskgroup the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Taskgroup::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

}
