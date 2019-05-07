<?php

class TaskdetailsController extends RController
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
	 * Creates a new model.
	 * If creation is successful, then return sucess message.
	 */
	public function actionCreate()
	{
		$model=new Taskdetails;
		
		if(isset($_POST['Taskdetails']))
		{
			$model->attributes=$_POST['Taskdetails'];
			if($model->save()){

				Yii::app()->user->setFlash('success', "Task Added successfully");
				$return["message"] ='Task Added successfully';   
                $return["status"] ='success';	
                echo json_encode($return);	
                die();	
			}
		}

	  $return["message"] ='Someting Went Wrong';
	  $return["status"] ='error';	

	  echo json_encode($return);
	  die();
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate()
	{
		
		if(isset($_POST['Taskdetails']))
		{
			$id=$_POST['Taskdetails']['id']; 
		    $model=$this->loadModel($id);
			$model->attributes=$_POST['Taskdetails'];
			if($model->save()){

				Yii::app()->user->setFlash('success', "Task Updated successfully");
				$return["message"] ='Task Updated successfully';   
                $return["status"] ='success';	
                echo json_encode($return);	
                die();	
			}
		}

	  $return["message"] ='Someting Went Wrong';
	  $return["status"] ='error';	

	  echo json_encode($return);
	  die();
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be return message.
	 * @param integer $_POST['id'] the ID of the model to be deleted.
	 */
	public function actionDelete()
	{
		if(isset($_POST['id']) && $_POST['id']){

			$id=$_POST['id'];
		 
		  if($this->loadModel($id)->delete()){
			  echo "success";
		  }
		 else
		 echo "error";
	  }
	  else  {
		 echo "error";  
	  }
	}


   /**
	 * Returns the Json Array  based on the primary key given in the post ajax variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Taskdetails the loaded model
	 */
public function actionChangetaskstatus()
	{
		if(isset($_POST['id']) && isset($_POST['status']) &&  $_POST['id'] && $_POST['status']) {
			
		    $id=$_POST['id'];
		    $model=$this->loadModel($id);

		    if($_POST['status'] == 'true') {
		    	$status='completed';		    	
		    	$model->completed_on=date('Y-m-d');	
		    }else{

		    	$status='pending';
		    	$model->completed_on='0000-00-00';
		    }
		    $model->status=$status;
		    	
		    if ($model->save()) {
		    	
		         $return["message"] ='Success Updated';
			     $return["status"] ='success';	

	 			 echo json_encode($return);
	  			 die();	
		    }
	    }

         $return["message"] ='Something went Wrong';
	     $return["status"] ='error';	

			 echo json_encode($return);
			 die();	
		
	}


	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Taskdetails the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Taskdetails::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	/**
	 * Returns the data  based on the primary key given in the POST variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param json Data  Id,Title,Remarks the  of the task model to be loaded in Edit Pop Up Form
	 * @return Taskdetails the loaded model
	 */
	public function actionGetTaskdetails()
	{
		if(isset($_POST['id']) && $_POST['id']) {
		$id =	$_POST['id'];
		$model=$this->loadModel($id);

		$return['title']=$model->title;
		$return['remarks']=$model->remarks;
		$return['id']=$model->id;

		echo json_encode($return);
			 die();	
	 }
		
	}

}
