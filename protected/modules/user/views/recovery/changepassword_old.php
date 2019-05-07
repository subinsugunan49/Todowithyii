<body class="login" style=""><div id="content">
        <div class="logo">
            <img src="images/logo.jpg" alt=""> 
        </div>
<div class="content">
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
					<div class="input-icon left">
						<i class="icon-lock"></i>
	<?php echo CHtml::activePasswordField($form,'password',array('class'=>'m-wrap placeholder-no-fix','placeholder'=>'New Password')); ?>
	
    				</div>
                    <p class="hint"><?php echo UserModule::t("Minimal password length 4 symbols."); ?></p>
    			</div>
	</div>
	
	<div class="control-group">
				<div class="controls">
					<div class="input-icon left">
						<i class="icon-lock"></i>
	<?php echo CHtml::activePasswordField($form,'verifyPassword',array('class'=>'m-wrap placeholder-no-fix','placeholder'=>'Retype Password')); ?>
    				</div>
                </div>
	</div>
	
	
	<div class="form-actions">
	<?php echo CHtml::submitButton(UserModule::t("Save"),array('class'=>'btn green pull-right')); ?>
	</div>

<?php echo CHtml::endForm(); ?>
		</div><!-- form -->
	</div>
</div>

<!-- END COPYRIGHT -->
	<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
	<!-- BEGIN CORE PLUGINS -->   <script src="assets/plugins/jquery-1.10.1.min.js" type="text/javascript"></script>
	<script src="assets/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
	<!-- IMPORTANT! Load jquery-ui-1.10.1.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
	<script src="assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>      
	<script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="assets/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js" type="text/javascript" ></script>
	<!--[if lt IE 9]>
	<script src="assets/plugins/excanvas.min.js"></script>
	<script src="assets/plugins/respond.min.js"></script>  
	<![endif]-->   
	<script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
	<script src="assets/plugins/jquery.blockui.min.js" type="text/javascript"></script>  
	<script src="assets/plugins/jquery.cookie.min.js" type="text/javascript"></script>
	<script src="assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript" ></script>
	<!-- END CORE PLUGINS -->
	<!-- BEGIN PAGE LEVEL PLUGINS -->
	<script src="assets/plugins/jquery-validation/dist/jquery.validate.min.js" type="text/javascript"></script>	
	<script type="text/javascript" src="assets/plugins/select2/select2.min.js"></script>     
	<!-- END PAGE LEVEL PLUGINS -->
	<!-- BEGIN PAGE LEVEL SCRIPTS -->
	<script src="assets/scripts/app.js" type="text/javascript"></script>
	<script src="assets/scripts/changepassword.js" type="text/javascript"></script> 
	<!-- END PAGE LEVEL SCRIPTS --> 
	<script>
		jQuery(document).ready(function() {     
		  App.init();
		  Login.init();
		
		 
		
		});
	</script>




</body>


