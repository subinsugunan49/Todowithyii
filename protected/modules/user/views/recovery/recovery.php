<?php 

$base_url= Yii::app()->request->baseUrl."/";

$appearance_setting=new WebsiteSettings;

$appearance_model=$appearance_setting->loadModel(1);

?>



<link href="<?php echo $base_url; ?>assets/css/pages/login.css" rel="stylesheet" type="text/css"/>



<div id="content">

        

<div class="content">


	  <div class="logo">
                <img src="<?php echo Yii::app()->baseUrl?>/assets/images/logo.png" alt="Logo"> 
      </div>


<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Restore");

$this->breadcrumbs=array(

	UserModule::t("Login") => array('/user/login'),

	UserModule::t("Restore"),

);

?>

<div class="form-vertical login-form">

<?php if(Yii::app()->user->hasFlash('recoveryMessage')):

{ ?>

<div class="success">

<?php echo Yii::app()->user->getFlash('recoveryMessage'); ?>

<div class="form-actions">

<a href="<?php echo $base_url;?>" class="btn" id="back-btn"><i class="m-icon-swapleft"></i> Click here to login</a>

</div>

<?php



}

?>

</div>

<?php else: ?>

<?php echo CHtml::beginForm('','post',array('class'=>'recovery-form')); ?>

<?php /*?><h2><?php echo UserModule::t("Restore"); ?></h2><?php */?>



			<h3 class="form-title">Enter your e-mail address below to reset your password.</h3>

	

	

    <div class="control-group">

				<div class="controls">

					<div class="input-icon input-border-color">


		<?php //echo CHtml::activeLabel($form,'login_or_email'); ?>

		<?php echo CHtml::activeTextField($form,'login_or_email',array('class'=>'m-wrap placeholder-no-fix')) ?>

		

        </div><!--<p class="hint"><?php //echo UserModule::t("Please enter your login or email addres."); ?></p>-->

        </div>

	</div>

	<?php /*?><div class="help-inline help-small no-left-padding">

	<?php echo CHtml::errorSummary($form); ?>

</div><?php */?>	

	<div class="form-actions">

    	<?php //echo CHtml::button('Back',array('submit' => Yii::app()->user->returnUrl),array('class'=>'btn','id'=>'back-btn'));?>

        
        
        <a href="<?php echo Yii::app()->request->baseUrl?>" class="btn" id="back-btn">Back</a>

        <div style="height:13px;"></div>

		<?php echo CHtml::submitButton(UserModule::t("Restore"),array('class'=>'btn green pull-right')); ?>

	</div>



<?php echo CHtml::endForm(); ?>

<?php endif; ?>

</div><!-- form -->



</div>

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

	<script src="<?php echo $base_url; ?>assets/plugins/excanvas.min.js"></script>

	<script src="<?php echo $base_url; ?>assets/plugins/respond.min.js"></script>  

	<![endif]-->   

	<script src="<?php echo $base_url; ?>assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>

	<script src="<?php echo $base_url; ?>assets/plugins/jquery.blockui.min.js" type="text/javascript"></script>  

	<script src="<?php echo $base_url; ?>assets/plugins/jquery.cookie.min.js" type="text/javascript"></script>

	<script src="<?php echo $base_url; ?>assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript" ></script>

	<!-- END CORE PLUGINS -->

	<!-- BEGIN PAGE LEVEL PLUGINS -->

	<script src="<?php echo $base_url; ?>assets/plugins/jquery-validation/dist/jquery.validate.min.js" type="text/javascript"></script>	

	<script type="text/javascript" src="<?php echo $base_url; ?>assets/plugins/select2/select2.min.js"></script>     

	<!-- END PAGE LEVEL PLUGINS -->

	<!-- BEGIN PAGE LEVEL SCRIPTS -->

	<script src="<?php echo $base_url; ?>assets/scripts/app.js" type="text/javascript"></script>

	<script src="<?php echo $base_url; ?>assets/scripts/recovery.js" type="text/javascript"></script> 

	<!-- END PAGE LEVEL SCRIPTS --> 

	<script>

		jQuery(document).ready(function() {     

		  App.init();

		  Login.init();

		

		 

		

		});

	</script>



</body>