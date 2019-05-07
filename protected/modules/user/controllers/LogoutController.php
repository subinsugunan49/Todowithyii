<?php

class LogoutController extends Controller
{
	public $defaultAction = 'logout';
	
	
	/**
	 * Logout the current user and redirect to returnLogoutUrl.
	 */
	public function actionLogout()
	{
		
 		$base_url= Yii::app()->request->baseUrl."/";
		Yii::app()->user->logout();
		session_start();
		session_destroy();
		$this->redirect($base_url.Yii::app()->controller->module->returnLogoutUrl[0]);
	}

}