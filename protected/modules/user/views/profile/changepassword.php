
<div class="container-fluid">
				<!-- BEGIN PAGE HEADER-->   
				<div class="row-fluid">
					<div class="span12">
                    
                    <h3 class="page-title">
							Change Password</h3>
						
						<ul class="breadcrumb">
							<li>
								<i class="icon-home"></i>
								<a href="<?php echo Yii::app()->request->baseUrl?>">Home</a> 
								<i class="icon-angle-right"></i>
							</li>
				<li><a href="<?php echo Yii::app()->request->baseUrl;?>/index.php?r=/user_profiles/index">Change Password</a></li>
						</ul>
					</div>
             </div>
           </div>



<div class="container-fluid">
<div class="portlet box red">

							<div class="portlet-title">
								<div class="caption"><i class="icon-globe"></i>Change Password</div>
								
							</div>
							<div class="portlet-body">
                        
                        <div id="portlet_tab1" class="tab-pane active">
											<!-- BEGIN FORM-->
											<?php $form=$this->beginWidget('CActiveForm', array(
                                            'id'=>'hr-time-off-form',
                                            'enableAjaxValidation'=>false,
											'htmlOptions'=>array('class'=>'form-horizontal')
                                            )); ?>
												<div class="control-group">
													 <?php echo $form->labelEx($model,'oldPassword',array('class'=>'control-label')); ?>
													<div class="controls">
                                          <?php echo $form->passwordField($model,'oldPassword',array('class'=>'m-wrap large')); ?>
												<span class="help-inline">
                                                   <?php echo $form->error($model,'oldPassword'); ?></span>
													</div>
												</div>
                                                
                                                <div class="control-group">
                                                 <?php echo $form->labelEx($model,'password',array('class'=>'control-label')); ?>
													
													<div class="controls">
                                                    
                      <?php echo $form->passwordField($model,'password',array('class'=>'m-wrap large')); ?>    
						
                        <span class="help-inline"> </span>	
					<span class="help-inline"> <?php echo $form->error($model,'password'); ?> </span>	
                    							
                    </div>
					</div>
												
										
												<div class="control-group">
													<?php echo $form->labelEx($model,'verifyPassword',array('class'=>'control-label')); ?>
													<div class="controls">
														<?php echo $form->passwordField($model,'verifyPassword',array('class'=>'m-wrap large')); ?>
														<span class="help-inline"></span>
                                                        <span class="help-inline"> <?php echo $form->error($model,'verifyPassword'); ?></span>
													</div>
												</div>
                                                
                                                
                                                
                                            <div class="form-actions">    
                                                
                                                
												
													<?php echo CHtml::submitButton(UserModule::t("Change Password"),array('class'=>'btn green')); ?>					
                                                    
                                                    
                                                    <button class="btn" type="reset">Cancel</button>
												</div>
										<?php $this->endWidget();?>
											<!-- END FORM-->  
										</div>
                                        </div>
                                        </div>
                                        
                                        
     </div>                                   
                                        
                                        