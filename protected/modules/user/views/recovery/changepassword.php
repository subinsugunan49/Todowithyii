
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


<?php 
$base_url= Yii::app()->request->baseUrl."/";
$appearance_setting=new WebsiteSettings;
$appearance_model=$appearance_setting->loadModel(1);
?>
<link href="<?php echo $base_url; ?>/css/pages/login.css" rel="stylesheet" type="text/css"/>
<body class="login" style="">

        
<div class="content">


<div class="logo">
            <img src="<?php echo Yii::app()->baseUrl.$appearance_model->logo_img_path?>" alt=""> 
        </div>
<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Change Password");
$this->breadcrumbs=array(
	UserModule::t("Login") => array('/user/login'),
	UserModule::t("Change Password"),
);
?>
<div class="form-vertical login-form">


<?php echo CHtml::beginForm('','post',array('class'=>'change_password-form')); ?>
<h3><?php echo UserModule::t("Change Password"); ?></h3>

	
	<?php echo CHtml::errorSummary($form); ?>
	
	<div class="control-group">
				<div class="controls">
					
	<?php echo CHtml::activePasswordField($form,'password',array('class'=>'m-wrap placeholder-no-fix error','placeholder'=>'New Password')); ?>
	
    				
                   
    			</div>
	</div>
	
	<div class="control-group">
				<div class="controls">
					
	<?php echo CHtml::activePasswordField($form,'verifyPassword',array('class'=>'m-wrap placeholder-no-fix','placeholder'=>'Retype Password')); ?>
    				
                </div>
	</div>
	
	
	<div class="form-actions">
	<?php echo CHtml::submitButton(UserModule::t("Save"),array('class'=>'btn green pull-right')); ?>
	</div>

<?php echo CHtml::endForm(); ?>
		</div><!-- form -->
	</div>


<!-- END COPYRIGHT -->
	<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
	<!-- BEGIN CORE PLUGINS -->   <script src="<?php echo $base_url; ?>assets/plugins/jquery-1.10.1.min.js" type="text/javascript"></script>
	<script src="<?php echo $base_url; ?>assets/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
	<!-- IMPORTANT! Load jquery-ui-1.10.1.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
	<script src="<?php echo $base_url; ?>assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>      
	<script src="<?php echo $base_url; ?>assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?php echo $base_url; ?>assets/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js" type="text/javascript" ></script>
	<!--[if lt IE 9]>
	<script src="<?php echo $base_url; ?>assets//plugins/excanvas.min.js"></script>
	<script src="<?php echo $base_url; ?>assets//plugins/respond.min.js"></script>  
	<![endif]-->   
	<script src="<?php echo $base_url; ?>assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
	<script src="<?php echo $base_url; ?>assets/plugins/jquery.blockui.min.js" type="text/javascript"></script>  
	<script src="<?php echo $base_url; ?>assets/plugins/jquery.cookie.min.js" type="text/javascript"></script>
	<script src="<?php echo $base_url; ?>assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript" ></script>
	<!-- END CORE PLUGINS -->
	<!-- BEGIN PAGE LEVEL PLUGINS -->
	<script src="<?php echo $base_url; ?>assets/plugins/jquery-validation/dist/jquery.validate.min.js" type="text/javascript"></script>	
	<script type="text/javascript" src="<?php echo $base_url; ?>assets//plugins/select2/select2.min.js"></script>     
	<!-- END PAGE LEVEL PLUGINS -->
	<!-- BEGIN PAGE LEVEL SCRIPTS -->
	<script src="<?php echo $base_url; ?>assets/scripts/app.js" type="text/javascript"></script>
	<script src="<?php echo $base_url; ?>assets/scripts/changepassword.js" type="text/javascript"></script> 
	<!-- END PAGE LEVEL SCRIPTS --> 
	<script>
		jQuery(document).ready(function() {     
		  App.init();
		  Login.init();
		
		 
		
		});
	</script>




</body>


