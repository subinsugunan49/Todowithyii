<?php
class RecoveryController extends Controller
{
    public $defaultAction = 'recovery';
    /**
     * Recovery password
     */
    public function actionRecovery()
    {
        $form = new UserRecoveryForm;
        if (Yii::app()->user->id) {
            $this->redirect(Yii::app()->controller->module->returnUrl);
        } else {
			
            $email    = ((isset($_GET['email'])) ? $_GET['email'] : '');
            $activkey = ((isset($_GET['activkey'])) ? $_GET['activkey'] : '');
            if ($email && $activkey) {
                $form2 = new UserChangePassword;
                $find  = User::model()->notsafe()->findByAttributes(array(
                    'username' => $email
                ), 'status !=2');
				
				
                if (isset($find) && $find->activkey == $activkey) {
                    if (isset($_POST['UserChangePassword'])) {
                        $form2->attributes = $_POST['UserChangePassword'];
                        if ($form2->validate()) {
                            $find->password = Yii::app()->controller->module->encrypting($form2->password);
                            $find->activkey = Yii::app()->controller->module->encrypting(microtime() . $form2->password);
                            if ($find->status == 0) {
                                $find->status = 1;
                            }
                            $find->password = md5($form2->password);
                            $find->save();
                            $this->actionMailfun($email);
                            Yii::app()->user->setFlash('recoveryMessage', UserModule::t("New password is saved."));
                            $this->redirect(Yii::app()->request->baseUrl);
                        }
                    }
                    $this->render('changepassword', array(
                        'form' => $form2
                    ));
                } else {
					
					
                    Yii::app()->user->setFlash('recoveryMessage', UserModule::t("Incorrect recovery link."));
					//echo "ssss";echo Yii::app()->controller->module->recoveryUrl;
				
				$this->redirect(array('recovery'));

                   // $this->redirect(Yii::app()->controller->module->recoveryUrl);
                }
            } else {
                if (isset($_POST['UserRecoveryForm'])) {
                    $form->attributes = $_POST['UserRecoveryForm'];
                    if ($form->validate()) {
                        $user = User::model()->notsafe()->findByAttributes(array(
                            'username' => $_POST['UserRecoveryForm']['login_or_email']
                        ), 'status !=2');
                        if ($user) {
							
                            $activation_url   = 'http://' . $_SERVER['HTTP_HOST'] . Yii::app()->request->baseUrl . "/index.php?r=user/recovery&activkey=$user->activkey&email=$user->username";
                            $subject          = UserModule::t("You have requested the password recovery", array(
                                '{site_name}' => Yii::app()->name
                            ));
                            //////////////////////////////
                            $row['firstname'] = ucfirst($user->firstname);
                            $row['email']     = $user->username;
                            $message          = '<br />
								A request to reset password was received from your {site_name} Account - <a href="mailto:' . $user->username . '" target="_blank">' . $user->username . '</a> <br />  <br />
								<strong><a href="' . $activation_url . '" target="_blank">Use this link to reset your password and login.</a></strong> <br />
								<br />
								</div>
								<div>
								<br />
								<strong>Note:</strong> This link is valid for 1 hour from the time it was sent to you and can be used to change your password only once.<br />
								<br />';
                            $message_user     = $this->renderPartial('application.views.emailtemplates.view', array(
                                'row' => $row,
                                'message' => $message
                            ), true);
                            $emaiContent      = Yii::app()->sendgrid->createEmail();
                            $emaiContent->setHtml($message_user)->setSubject($subject)->addTo($row['email'])->setFrom(Yii::app()->params->adminEmail);
                           if( Yii::app()->sendgrid->send($emaiContent))
                     		 Yii::app()->user->setFlash('recoveryMessage', UserModule::t("Please check your email. An instructions was sent to your email address."));
                            $this->refresh();
                        }
                    } //
                    else {
                        echo "Something went wrong";
                    }
                }
                $this->render('recovery', array(
                    'form' => $form
                ));
            }
        }
    }
    public function actionMailfun($email)
    {
		$user    = User::model()->notsafe()->findByAttributes(array(
            'username' => $email
        ),'status!=2');
		
							$row['firstname'] = ucfirst($user->firstname);
                            $row['email']     = $emai;
                            $message          = ' Your new password saved successfully.';
                            $message_user     = $this->renderPartial('application.views.emailtemplates.view', array(
                                'row' => $row,
                                'message' => $message
                            ), true);
							$subject='Your password saved successfully';
                            $emaiContent      = Yii::app()->sendgrid->createEmail();
                            $emaiContent->setHtml($message_user)->setSubject($subject)->addTo($row['email'])->setFrom(Yii::app()->params->adminEmail);
		return;
		
	}
}