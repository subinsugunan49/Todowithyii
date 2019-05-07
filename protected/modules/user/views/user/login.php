<?php
$base_url=Yii::app()->request->baseUrl."/";
?>
<link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>assets/plugins/bootstrap-toggle-buttons/static/stylesheets/bootstrap-toggle-buttons.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>assets/plugins/bootstrap-daterangepicker/daterangepicker.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>assets/plugins/bootstrap-datetimepicker/css/datetimepicker.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>assets/plugins/jquery-multi-select/css/multi-select-metro.css" />
	<link href="<?php echo $base_url; ?>assets/plugins/bootstrap-modal/css/bootstrap-modal.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo $base_url; ?>assets/plugins/bootstrap-switch/static/stylesheets/bootstrap-switch-metro.css" rel="stylesheet" type="text/css"/>

<!-- BEGIN PAGE LEVEL STYLES -->
	<link href="<?php echo $base_url; ?>assets/css/pages/login.css" rel="stylesheet" type="text/css"/>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>assets/loginscript/css/normalize.css?v=1.2.2" />
	<link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>assets/loginscript/css/component.css?v=1.2.2" />
	<link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>assets/loginscript/css/animate.css?v=1.2.2" />
	<link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>assets/loginscript/css/font-awesome.css?v=1.2.2" />
	<link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>assets/loginscript/css/style.css?v=1.5.5" />

    
  
    <script type="text/javascript">
      var onloadCallback = function() {
        grecaptcha.render('html_element', {
          'sitekey' : '6LfSF4IUAAAAAIRqhUFoLQDVWDkdKOo63GZa8P2b'
        });
      };
    </script>

   

	<!-- END PAGE LEVEL STYLES -->
     
  
    
	<?php 
		/*$base_url=Yii::app()->request->baseUrl."/";
		$appearance_setting=new WebsiteSettings;
		$appearance_model=$appearance_setting->loadModel(1);  
		 $previous=explode('/',Yii::app()->request->urlReferrer);
		 $error_msg ='';
		
		 if(isset($_GET['reg']))
		 {
		if($previous['4']=='index.php?r=Registration' &&$previous['5']=='create')
		{
			 $error_msg='Thank you for registering with rel8. HR manager will review your request in couple of days.';
		}
		 }*/
		 $error_msg='';
    ?>
	
	<!-- BEGIN LOGIN -->
    <div id="large" class="large-header animated fadeIn" style="height:100vh;">
    
    <canvas id="demo-canvas" style="position: fixed; top:0; height:100vh;"></canvas>
	<div class="content" >
    
   
		<!-- BEGIN LOGIN FORM -->
        	
            <!-- BEGIN LOGO -->
                
            <!-- END LOGO -->
            
	<?php if(Yii::app()->user->hasFlash('loginMessage')): ?>
    
    <div class="success">
        <?php echo Yii::app()->user->getFlash('loginMessage'); ?>
    </div>
    
    <?php endif; ?>
    
    
      <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>false,
	),
	'htmlOptions'=>array('class'=>'form-vertical login-form')
)); ?>

	<h3 class="form-title">Enter your  login details below<?php /*?><?php echo UserModule::t("Login to your account"); ?><?php */?></h3>
    <?php if($error_msg !='')
								{
									
								$styl1='style=""';
								$styl2='style=""';
								}
								else
								{
								$styl1='style="display:none;"';
								$styl2='style="display:none;"';
								}
								?>

                            <div  id="errorblock" <?php echo $styl1?> class="text-block">
                 <div  id="Users_password_id" <?php echo $styl2?> class="errorMessage log-err-blk">
                 

                 <?php echo $error_msg;?></div></div>
                 <?php if(Yii::app()->user->hasFlash('recoveryMessage')): ?>
                        <div class="alert alert-success">
                            <?php echo Yii::app()->user->getFlash('recoveryMessage'); ?>
                        </div>
    			 <?php endif; ?>
             
				<?php echo $form->error($model,'username_password'); ?>
                <?php echo $form->error($model,'status' ); ?>
                <?php echo $form->error($model,'g_recaptcha' ); ?>
                <div class="control-group">
                    <?php echo $form->labelEx($model,'username',array('class'=>'control-label visible-ie8 visible-ie9 error required')); ?>
                    <div class="controls">
                                <div class="input-icon input-border-color">
                    <?php echo $form->textField($model,'username',array('class'=>'m-wrap placeholder-no-fix error','placeholder'=>'Username','autocomplete'=>'off','name'=>'UserLogin[username]')); ?>
                                </div>
                    </div>
                </div>

            <div class="control-group">
                <?php echo $form->labelEx($model,'password',array('class'=>'control-label visible-ie8 visible-ie9 error required')); ?>
                <div class="controls">
                            <div class="input-icon input-border-color">
                <?php echo $form->passwordField($model,'password',array('class'=>'m-wrap placeholder-no-fix error','placeholder'=>'Password','name'=>'UserLogin[password]')); ?>
                            </div>
                </div>
            </div>
    
            <!-- <div class\="control-group">
                <div class="controls">
                	<div class="input-icon input-border-color">
                       
                      <div class="g-recaptcha" data-sitekey="6LfSF4IUAAAAAIRqhUFoLQDVWDkdKOo63GZa8P2b"></div>
                       
					</div>
                </div>
            </div> -->
            
            <div class="clearfix"></div>
            

	<div class="form-actions">
		<?php //echo $form->checkBox($model,'rememberMe',array('class'=>'checkbox')); ?>
		<?php //echo $form->label($model,'rememberMe',array('class'=>'checkbox')); ?>
		<?php //echo $form->error($model,'rememberMe'); ?>
	
		<?php //echo CHtml::submitButton('Login',array('class'=>'btn green pull-right')); ?>
        <button class="btn" type="submit">Login</button>
	</div>
    
    
    
    
   <?php /*?> <div class="forget-password">
        <p>
            <!--<a id="forget-password" href="javascript:;">here</a> -->
            <?php echo CHtml::link('Forgot Password?','javascript:;',array('id'=>'forget-password')); ?>
        </p>
    </div>
<?php */?>

			
            
            
            
            <?php /*?><div class="forget-password">
            
				<h4>New User? <a id="forget-password" href="<?php echo $base_url;?>index.php?r=Registration/create">Register Now.</a></h4>
			
                 
				
			</div><?php */?>
			<!--<div class="create-account">
				<p>
					
					<a href="javascript:;" id="register-btn" >Attendence register</a>
				</p>
			</div>-->
           
            <div class="forget-password login-365">
            <?php /*?><p><a id="forget-password" href="<?php echo $base_url;?>/index.php?r=oauth">Office 365 login</a></p>
           <?php */?> 
            
             <div class="clr"></div>
            </div>		 
			
			<?php $this->endWidget(); ?>	<!-- END LOGIN FORM --> 
         
             
             
                                    
		<!-- BEGIN FORGOT PASSWORD FORM -->
       
        
        <?php $form=new UserRecoveryForm;?>
        <?php echo CHtml::beginForm(Yii::app()->request->baseUrl.'/index.php?r=user/recovery', 'post', array('class' => 'form-vertical forget-form','novalidate'=>'novalidate')) ; ?>
         <?php if(Yii::app()->user->hasFlash('recoveryMessage')): ?>
		<div class="success">
			<?php echo Yii::app()->user->getFlash('recoveryMessage'); ?>
		</div>
		<?php else: ?>
			<h3 class="form-title">Please insert your email address</h3>
          
            <?php echo CHtml::errorSummary($form); ?>
			<div class="control-group">
				<div class="controls">
					<div class="input-icon input-border-color">
                        <?php echo CHtml::activeTextField($form,'login_or_email',array('class'=>'m-wrap placeholder-no-fix','placeholder'=>'Email','autocomplete'=>'off','name'=>'UserRecoveryForm[login_or_email]')) ?>
					</div>
				</div>
			</div>
			<div class="form-actions">
				<!--<button type="button" id="back-btn" class="btn">
				<i class="m-icon-swapleft"></i> Back
				</button>-->
				<?php //echo CHtml::button('Back',array('class'=>'btn','id'=>'back-btn'));?>
                <?php echo CHtml::submitButton(UserModule::t("Submit"),array('class'=>'btn')); ?>
                        
			</div>
		<?php echo CHtml::endForm(); ?>
        <?php endif; ?>
		<!-- END FORGOT PASSWORD FORM -->
		<!-- BEGIN REGISTRATION FORM -->
		
        
         <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'action'=>'index.php?r=user/Login/Attendance',
	'enableClientValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>false,
	),
	'htmlOptions'=>array('class'=>'form-vertical register-form')
)); ?>
			<h3 >Attendance </h3>
			<div class="control-group">
		<?php echo $form->labelEx($model,'username',array('class'=>'control-label visible-ie8 visible-ie9 error required')); ?>
        <div class="controls" >
					<div class="input-icon left">
						<i class="icon-user"></i>
		<?php echo $form->textField($model,'username',array('class'=>'m-wrap placeholder-no-fix error','placeholder'=>'Username','autocomplete'=>'off','name'=>'UserLogin[username]')); ?>
        			</div>
        </div>
	</div>
			
			
			<div class="control-group">
		<?php echo $form->labelEx($model,'password',array('class'=>'control-label visible-ie8 visible-ie9 error required')); ?>
        <div class="controls">
					<div class="input-icon left">
						<i class="icon-lock"></i>
		<?php echo $form->passwordField($model,'password',array('class'=>'m-wrap placeholder-no-fix error','placeholder'=>'Password','name'=>'UserLogin[password]')); ?>
        			</div>
        </div>
	</div>
			
            
									
									
									
									
									
								
			
			<div class="form-actions">
				<button id="register-back-btn" type="button" class="btn">
				<i class="m-icon-swapleft"></i> <a href="<?php echo $base_url; ?>index.php?r=site/logout"> OUT</a>
				</button>
				<button type="submit" id="register-submit-btn" class="btn green pull-right">
				IN <i class="m-icon-swapright m-icon-white"></i>
				</button>            
			</div>
		<?php $this->endWidget(); ?>
		<!-- END REGISTRATION FORM -->
	</div>
    
    </div>
    
    
  
	<!-- END LOGIN -->
	
	<!-- BEGIN PAGE LEVEL PLUGINS -->
	<script src="<?php echo $base_url; ?>assets/plugins/jquery-validation/dist/jquery.validate.min.js" type="text/javascript"></script>	
	<script type="text/javascript" src="<?php echo $base_url; ?>assets/plugins/select2/select2.min.js"></script>     
	<!-- END PAGE LEVEL PLUGINS -->
	<!-- BEGIN PAGE LEVEL SCRIPTS -->
	<script src="<?php echo $base_url; ?>assets/scripts/app.js" type="text/javascript"></script>
	<script src="<?php echo $base_url; ?>assets/scripts/login.js" type="text/javascript"></script> 
    	<script src="<?php echo $base_url; ?>assets/plugins/bootstrap-switch/static/js/bootstrap-switch.js" type="text/javascript" ></script>
	<script src="<?php echo $base_url; ?>assets/plugins/jquery-tags-input/jquery.tagsinput.min.js" type="text/javascript" ></script>
    <!-- END PAGE LEVEL SCRIPTS --> 
    
	<?php /*?><script src="<?php echo $base_url; ?>assets/loginscript/js/TweenLite.min.js"></script>
	<script src="<?php echo $base_url; ?>assets/loginscript/js/EasePack.min.js"></script>
	<script src="<?php echo $base_url; ?>assets/loginscript/js/rAF.js"></script>
	<script src="<?php echo $base_url; ?>assets/loginscript/js/bg-animation.js"></script>
	<script src="<?php echo $base_url; ?>assets/loginscript/js/classie.js"></script>
  <?php */?>  
  

	<!-- END PAGE LEVEL SCRIPTS --> 
	<script>
		jQuery(document).ready(function() {     
		  App.init();
		  Login.init();
		
		});
	</script>
	<!-- END JAVASCRIPTS -->

	<!-- END JAVASCRIPTS -->

</div><!-- content -->
