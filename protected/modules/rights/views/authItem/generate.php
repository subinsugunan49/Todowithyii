<?php
$base_url= Yii::app()->request->baseUrl."/";
?>

<div class="container-fluid" id="generator">
    <h3 class="page-title"><?php echo Rights::t('core', 'Generate items'); ?></h3>
    <?php
    foreach(Yii::app()->user->getFlashes() as $key => $message) {
    
    echo '<div class="alert alert-'.$key.'">
    <button data-dismiss="alert" class="close"></button>';
    echo $message .'</div>';
    }
    ?>      
                              
                                <p><?php echo Rights::t('core', 'Please select which items you wish to generate.'); ?></p>
                   <div class="portlet box">
							<div class="portlet-title table-title-custom">
								<div class="caption"><?php echo Rights::t('core', 'Generate items'); ?>  </div>
							</div>
                            <div class="tab-content">
                            <?php $form=$this->beginWidget('CActiveForm'); ?>
                            <table class="items generate-item-table table-custom" border="0" cellpadding="0" cellspacing="0">

                                <tbody>
            
                                    <tr class="application-heading-row">
                                        <th colspan="3"><?php echo Rights::t('core', 'Application'); ?></th>
                                    </tr>
            
                                    <?php $this->renderPartial('_generateItems', array(
                                        'model'=>$model,
                                        'form'=>$form,
                                        'items'=>$items,
                                        'existingItems'=>$existingItems,
                                        'displayModuleHeadingRow'=>true,
                                        'basePathLength'=>strlen(Yii::app()->basePath),
                                    )); ?>
            
                                </tbody>

							</table>
                            <div class="row">

							<?php echo CHtml::link(Rights::t('core', 'Select all'), '#', array(
                            'onclick'=>"jQuery('.generate-item-table').find(':checkbox').attr('checked', 'checked'); return false;",
                            'class'=>'selectAllLink')); ?>
                            /
                            <?php echo CHtml::link(Rights::t('core', 'Select none'), '#', array(
                            'onclick'=>"jQuery('.generate-item-table').find(':checkbox').removeAttr('checked'); return false;",
                            'class'=>'selectNoneLink')); ?>
                            
                            </div>
                            
                            <div class="row">
                            
                            <?php echo CHtml::submitButton(Rights::t('core', 'Generate')); ?>
                            
                            </div>

                           	<?php $this->endWidget(); ?>
						    </div>
                        </div>
              
				<!-- END PAGE CONTENT-->
   </div>



