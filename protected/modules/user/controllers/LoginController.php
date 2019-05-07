<?php
class LoginController extends Controller
{
    public $defaultAction = 'login';
    /**  
    * Displays the login page 
    */
    public function actionLogin()
    {
        if (Yii::app()->user->isGuest) {
            $model = new UserLogin;
            if (isset($_POST['UserLogin'])) {
                $_POST['UserLogin']['g_recaptcha'] ='norobot'; //$_POST['g-recaptcha-response'];
                if (isset($_POST['g-recaptcha-response']))
                    $captcha = $_POST['g-recaptcha-response'];
                $model->attributes = $_POST['UserLogin'];
                // validate user input and redirect to previous page if valid
                if ($model->validate()) {
                    $this->lastViset();
                    if (Yii::app()->user->returnUrl == '/index.php')
                        $this->redirect('index.php?r=taskgroup');
                    else
                        $this->redirect(Yii::app()->user->returnUrl);
                }
            }
            // display the login form
            $this->render('/user/login', array(
                'model' => $model
            ));
        } else if (Yii::app()->user->id) {
           
            $this->redirect('index.php?r=taskgroup/');
        }
        ;
    }
    private function lastViset()
    {
        $lastVisit               = User::model()->notsafe()->findByPk(Yii::app()->user->id);
        $lastVisit->lastvisit_at = date("Y-m-d H:i:s"); //time();
        $lastVisit->save();
        if ($lastVisit->save()) {
            $lastVisit->lastvisit_at;
        } else {
            $lastVisit->lastvisit_at;
            // echo time();	
        }
        //exit;
    }
}