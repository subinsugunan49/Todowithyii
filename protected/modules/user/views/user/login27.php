<link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap-toggle-buttons/static/stylesheets/bootstrap-toggle-buttons.css" />
	<link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap-daterangepicker/daterangepicker.css" />
	<link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap-datetimepicker/css/datetimepicker.css" />
	<link rel="stylesheet" type="text/css" href="assets/plugins/jquery-multi-select/css/multi-select-metro.css" />
	<link href="assets/plugins/bootstrap-modal/css/bootstrap-modal.css" rel="stylesheet" type="text/css"/>
	<link href="assets/plugins/bootstrap-switch/static/stylesheets/bootstrap-switch-metro.css" rel="stylesheet" type="text/css"/>

<!-- BEGIN PAGE LEVEL STYLES -->
	<link href="assets/css/pages/login.css" rel="stylesheet" type="text/css"/>
	<!-- END PAGE LEVEL STYLES -->
    <div id="content">
    
	<?php 
		$base_url=Yii::app()->request->baseUrl."/";
		$appearance_setting=new WebsiteSettings;
		$appearance_model=$appearance_setting->loadModel(1);  
		 $previous=explode('/',Yii::app()->request->urlReferrer);
		 $error_msg ='';
		
		 if(isset($previous['4'])&& (isset($_GET['reg'])))
		 {
		if($previous['4']=='index.php?r=Registration' &&$previous['5']=='create')
		{
			 $error_msg='Your registeration is successfull.Please Check your mail.';
		}
		 }
    ?>
	<!-- BEGIN LOGO -->
	<div class="logo">
		<img src="<?php echo Yii::app()->baseUrl.$appearance_model->logo_img_path?>" alt="Logo"> 
	</div>
	<!-- END LOGO -->
	<!-- BEGIN LOGIN -->
	<div class="content">
		<!-- BEGIN LOGIN FORM -->
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

	<h3 class="form-title"><?php echo UserModule::t("Login to your account"); ?></h3>
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
             
<?php echo $form->error($model,'username_password'); ?>
<?php echo $form->error($model,'status' ); ?>
	<div class="control-group">
		<?php echo $form->labelEx($model,'username',array('class'=>'control-label visible-ie8 visible-ie9 error required')); ?>
        <div class="controls">
					<div class="input-icon left input-border-color">
						<i class="icon-user"></i>
		<?php echo $form->textField($model,'username',array('class'=>'m-wrap placeholder-no-fix error','placeholder'=>'Username','autocomplete'=>'off','name'=>'UserLogin[username]')); ?>
        			</div>
        </div>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'password',array('class'=>'control-label visible-ie8 visible-ie9 error required')); ?>
        <div class="controls">
					<div class="input-icon left input-border-color">
						<i class="icon-lock"></i>
		<?php echo $form->passwordField($model,'password',array('class'=>'m-wrap placeholder-no-fix error','placeholder'=>'Password','name'=>'UserLogin[password]')); ?>
        			</div>
        </div>
	</div>

	<div class="form-actions">
		<?php echo $form->checkBox($model,'rememberMe',array('class'=>'checkbox')); ?>
		<?php echo $form->label($model,'rememberMe',array('class'=>'checkbox')); ?>
		<?php echo $form->error($model,'rememberMe'); ?>
	
		<?php //echo CHtml::submitButton('Login',array('class'=>'btn green pull-right')); ?>
        <button class="btn red pull-right" type="submit">
				Login <i class="m-icon-swapright m-icon-white"></i>
				</button>
	</div>


			<div class="forget-password">
            
				<h4>Forgot your password ?</h4>
				<p>
					no worries, click 
                     <!--<a id="forget-password" href="javascript:;">here</a> -->
                    <?php echo CHtml::link('here','javascript:;',array('id'=>'forget-password')); ?>
					to reset your password.
				</p>
			</div>
            
            
            
            <div class="forget-password">
            
				<h4>New User?</h4>
			
                   Click  <a id="forget-password" href="<?php echo $base_url;?>index.php?r=Registration/create">here</a>to register
                   
				
			</div>
			<!--<div class="create-account">
				<p>
					
					<a href="javascript:;" id="register-btn" >Attendence register</a>
				</p>
			</div>-->
            <?php $this->endWidget(); ?>
             				<!-- END LOGIN FORM --> 
             
             
             
             
                                    
		<!-- BEGIN FORGOT PASSWORD FORM -->
        <?php if(Yii::app()->user->hasFlash('recoveryMessage')): ?>
		<div class="success">
			<?php echo Yii::app()->user->getFlash('recoveryMessage'); ?>
		</div>
		<?php else: ?>
        
        <?php $form=new UserRecoveryForm;?>
        <?php echo CHtml::beginForm(Yii::app()->request->baseUrl.'/index.php?r=user/recovery', 'post', array('class' => 'form-vertical forget-form','novalidate'=>'novalidate')) ; ?>
        
			<h3>Forget Password ?</h3>
			<p>Enter your e-mail address below to reset your password.</p>
          
            <?php echo CHtml::errorSummary($form); ?>
			<div class="control-group">
				<div class="controls">
					<div class="input-icon left input-border-color">
						<i class="icon-envelope"></i>
                        
                        <?php echo CHtml::activeTextField($form,'login_or_email',array('class'=>'m-wrap placeholder-no-fix','placeholder'=>'Email','autocomplete'=>'off','name'=>'UserRecoveryForm[login_or_email]')) ?>
					</div>
				</div>
			</div>
			<div class="form-actions">
				<button type="button" id="back-btn" class="btn">
				<i class="m-icon-swapleft"></i> Back
				</button>
				<?php //echo CHtml::button('Back',array('class'=>'btn','id'=>'back-btn'));?>
                <?php echo CHtml::submitButton(UserModule::t("Restore"),array('class'=>'btn green pull-right')); ?>
                        
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
			
            
									
									<div class="control-group">
										<label class="control-label">Colors</label>
										<div class="controls">
											
											<div class="switch" data-on="info" data-off="success">
												<input type="checkbox" checked class="toggle"/>
											</div>
											<div class="switch" data-on="success" data-off="warning">
												<input type="checkbox" checked class="toggle"/>
											</div>
											<div class="switch" data-on="warning" data-off="danger">
												<input type="checkbox" checked class="toggle"/>
											</div>
											
											<div class="switch" data-on="default" data-off="primary">
												<input type="checkbox" checked class="toggle"/>
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
	<!-- END LOGIN -->
	
	<!-- BEGIN PAGE LEVEL PLUGINS -->
	<script src="assets/plugins/jquery-validation/dist/jquery.validate.min.js" type="text/javascript"></script>	
	<script type="text/javascript" src="assets/plugins/select2/select2.min.js"></script>     
	<!-- END PAGE LEVEL PLUGINS -->
	<!-- BEGIN PAGE LEVEL SCRIPTS -->
	<script src="assets/scripts/app.js" type="text/javascript"></script>
	<script src="assets/scripts/login.js" type="text/javascript"></script> 
    	<script src="assets/plugins/bootstrap-switch/static/js/bootstrap-switch.js" type="text/javascript" ></script>
	<script src="assets/plugins/jquery-tags-input/jquery.tagsinput.min.js" type="text/javascript" ></script>

	<!-- END PAGE LEVEL SCRIPTS --> 
	<script>
		jQuery(document).ready(function() {     
		  App.init();
		  Login.init();
		 FormComponents.init();
		 
		
		});
	</script>
	<!-- END JAVASCRIPTS -->

	<!-- END JAVASCRIPTS -->

</div><!-- content -->
