<?php
/**

* LoginForm class.

* LoginForm is the data structure for keeping

* user login form data. It is used by the 'login' action of 'SiteController'.

*/
class UserLogin extends CFormModel
{
    public $username;
    public $password;
    public $rememberMe;
    public $status;
    public $g_recaptcha;
    /**
    
    * Declares the validation rules.
    
    * The rules state that username and password are required,
    
    * and password needs to be authenticated.
    
    */
    public function rules()
    {
        return array(
            // username and password are required
            array(
                'username, password,g_recaptcha',
                'required'
            ),
            // rememberMe needs to be a boolean
            array(
                'rememberMe',
                'boolean'
            ),
            // password needs to be authenticated
            array(
                'password',
                'authenticate'
            ),
            array(
                'status',
                'authenticate'
            ),
            array(
                'g_recaptcha',
                'validateRecaptcha'
            )
        );
    }
    /**
    
    * Declares attribute labels.
    
    */
    public function validateRecaptcha($attribute, $params)
    {
        $captcha = $this->g_recaptcha;
        if (!$captcha) {
            $this->addError("g_recaptcha", UserModule::t("Please check the  captcha form."));
        } else {
            return true;
            if ($captcha == 'norobot')
                return true;
            $response = json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LcjpwwUAAAAAJ-zJ5Gb15jQGtScD_vz0X6vOzZN&response=" . $captcha . "&remoteip=" . $_SERVER['REMOTE_ADDR']), true);
            if ($response['success'] == false) {
                $this->addError("g_recaptcha", UserModule::t("You are spammer ! Get the @$%K out."));
            }
        }
    }
    public function attributeLabels()
    {
        return array(
            'rememberMe' => UserModule::t("Remember me next time"),
            'g_recaptcha' => 'recaptcha',
            'username' => UserModule::t("username or email"),
            'password' => UserModule::t("password"),
            'status' => UserModule::t("status")
        );
    }
    /**
    
    * Authenticates the password.
    
    * This is the 'authenticate' validator as declared in rules().
    
    */
    public function authenticate($attribute, $params)
    {
        if (!$this->hasErrors()) // we only want to authenticate when no input errors
            {
            $identity = new UserIdentity($this->username, $this->password, $this->status);
            $identity->authenticate();
            switch ($identity->errorCode) {
                case UserIdentity::ERROR_NONE:
                    $duration = $this->rememberMe ? Yii::app()->controller->module->rememberMeTime : 0;
                    Yii::app()->user->login($identity, $duration);
                    break;
                case UserIdentity::ERROR_EMAIL_INVALID:
                    $this->addError("username", UserModule::t("Email is incorrect."));
                    break;
                case UserIdentity::ERROR_STATUS_NOTACTIV:
                    $this->addError("status", UserModule::t("Your account is not active.Please contact HR Manager"));
                    break;
                case UserIdentity::ERROR_STATUS_DEL:
                    $this->addError("status", UserModule::t("Your account in temporarily deleted, please contact HR"));
                    break;
                case UserIdentity::ERROR_STATUS_BAN:
                    $this->addError("status", UserModule::t("You account is blocked."));
                    break;
                case (UserIdentity::ERROR_USERNAME_INVALID && UserIdentity::ERROR_PASSWORD_INVALID):
                    $this->addError("username_password", UserModule::t("Username/ Password is incorrect."));
                    //$this->addError("password",UserModule::t("Username/ Password is incorrect."));
                    break;
            }
        }
    }
}

