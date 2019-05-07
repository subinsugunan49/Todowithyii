<?php
/* @var $this TaskgroupController */
/* @var $categoryModel Task Category Model */
/* @var $model Taskgroup */
/* @var $form CActiveForm */
 $base_url= Yii::app()->request->baseUrl."/"; 
?>
<style>
   .user_add_details {
   float: left;
   padding: 0 0 6px 0;
   }
   .control-label{
   text-transform:none;
   }
</style>
<!-- BEGIN PAGE CONTAINER-->
<div class="container-fluid">
   
   <br>

   <div class="row-fluid">
      <div class="span12">
         
         <?php
            foreach(Yii::app()->user->getFlashes() as $key => $message) {
            echo '<div class="alert alert-'.$key.'">
            <button data-dismiss="alert" class="close"></button>';
            echo $message .'</div>';
             }
         ?>
         <div class="tab-pane active" id="tab_1">
            <div class="portlet box secondary-color-light clearfix">
               <div class="portlet-title table-title-custom">

                <?php if($model->isNewRecord){?>
                  <div class="caption">Add New To-Do Task Group </div>
               
                 <?php } else {?>
                <div class="caption">Edit To-Do Task Group </div>
                 <?php } ?>
 
                  <div class="tools"> </div>
               </div>
                 <p style="display:display" id="btn">   </p>
               <div class="portlet-body form portlet-body-padding">
                  <!-- BEGIN FORM-->
                  <?php $form=$this->beginWidget('CActiveForm', array(
                     'id'=>'Team-form',                     
                     'enableAjaxValidation'=>false,                 
                     'htmlOptions'=>array('class'=>'horizontal-form',                    
                     'enctype' => 'multipart/form-data',)  
                     )); 
					
					 ?>
                   <?php
                     if($form->errorSummary($model)) {
                     ?>
	                  <div class="alert alert-error">
	                     <button class="close" data-dismiss="alert"></button>
	                     <?php echo $form->errorSummary($model); ?>
	                     
	                  </div>
                   <?php
                     }
                       ?>
                  <div class="alert alert-error hide">
                     <button class="close" data-dismiss="alert"></button>
                     You have some form errors. Please check below. 
                  </div>
                  <div class="alert alert-success hide">
                     <button class="close" data-dismiss="alert"></button>
                     Your form validation is successful! 
                  </div>
                  
                   <div class="row-fluid">
                     <div class="span8 ">
                        <div class="control-group">
                           <?php echo $form->labelEx($model,'taskgroupname',array('class'=>'control-label')); ?>
                           <div class="controls">
                            <?php echo $form->textField($model,'taskgroupname',array('class'=>'m-wrap span8','id'=>'firstName','placeholder'=>'Task Group Name ','name'=>'Taskgroup[taskgroupname]','required'=>'required')); ?> <span class="help-inline"></span> <span class="help-block"></span>
                           </div>
                        </div>
                     </div>
                     
                  </div>
                   <div class="row-fluid">
                      
                    <div class="span8">
                        <div class="control-group">
                           <?php echo $form->labelEx($model,'category_id',array('class'=>'control-label')); ?>
                           <div class="controls">
                            
                           <?php   
                               
                   $categorylist=CHtml::listData(Category::model()->findAllByAttributes(array('status'=>'published')),'id','name');       
                     
                    echo $form->dropDownList($model,'category_id',$categorylist,array('class'=>'span8 chosen','empty'=>'Select Category','required'=>'required'));?>
                            <span class="help-inline"></span> <span class="help-block"></span>
                           </div>
                        </div>
                     </div>
                                     
            </div>
              
                  <div class="row-fluid">
                      <div class="span8 ">
                        <div class="control-group">
                           <?php echo $form->labelEx($model,'description',array('class'=>'control-label')); ?>
                           <div class="controls"> 
                            <?php echo $form->textArea($model,'description',array('rows'=>'10','class'=>'m-wrap span8','placeholder'=>'Description')); ?> 
                           <span class="help-block"></span>
                           </div>
                        </div>
                     </div>
                     
                  </div>
               </div>
               <div class="form-actions portlet-body-padding" > <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn red primary-color-dark link-default-color','id'=>'btn_ids')); ?>
                  <?php if($model->isNewRecord){?>
                  <button class="btn" type="reset">Reset</button>
                  <?php }else{?>
                  <a href="<?php echo $base_url;?>index.php?r=shareholder" class="btn">Cancel</a>
                  <?php }?>
               </div>
               <?php $this->endWidget(); ?>
               <!-- END FORM--> 
            </div>
         </div>
      </div>
   </div>
</div>
<!-- END PAGE CONTENT-->
</div>
</div>
</div>
<!-- BEGIN PAGE LEVEL PLUGINS --> 
<script src="<?php echo $base_url; ?>assets/plugins/jquery-validation/dist/jquery.validate.min.js" type="text/javascript"></script> 

<script src="<?php echo $base_url; ?>assets/scripts/teamvalidation.js" type="text/javascript"></script> 

<!-- END PAGE LEVEL SCRIPTS --> 
<!-- END PAGE LEVEL SCRIPTS --> 
 <script>
   jQuery(document).ready(function() {     
   
     Team.init();
      });
   
</script>