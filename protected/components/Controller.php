<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();
	
	
	// public function beforeAction()
	// {
		
	// 	 $decoded = Yii::app()->JWT->verify('eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJTdGF0aW9uTWFzdGVySWQiOiIxMzI4IiwiU3RhdGlvbklkIjoiMTIiLCJVc2VyRW1haWwiOiJlOEBnbWFpbC5jb20iLCJkYXRlIjoiMjAxOC0xMC0xNCAxNDo1MyIsIm51bWJlciI6IjEzMjgifQ.44w47XjUeDDQ4Gr7dBgs2MEOO_1cYA_eInyblKMuFL0');
 //    			 echo '<pre>';
 //    			 print_r($decoded);
 //    			 echo '</pre>';
    			
		
	// 	return true;
		
	// }
	
}