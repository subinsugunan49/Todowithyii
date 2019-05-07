<?php $this->breadcrumbs = array(
	'Rights'=>Rights::getBaseUrl(),
	Rights::t('core', 'Assignments')=>array('assignment/view'),
	$model->getName(),
); ?>


<div class="container-fluid" id="userAssignments">
  
  
  <div class="">
    <div class="">
      <div class="portlet box red">
        <div class="portlet-title table-title-custom">
          <div class="caption"><h3><?php echo Rights::t('core', 'Assign item'); ?></h3></div>
        </div>
        <div class="portlet-body flip-scroll manage-team-adjust">
          <div class="portlet-body form">
            
              <!-- END PAGE LEVEL STYLES -->
            <div id="content" style="border-color:#006;"> 
              
           

		

		<?php if($formModel!==null): ?>

			<div class="form">

				<?php $this->renderPartial('_form', array(
					'model'=>$formModel,
					'itemnameSelectOptions'=>$assignSelectOptions,
				)); ?>

			</div>

		<?php else: ?>

			<p class="info"><?php echo Rights::t('core', 'No assignments available to be assigned to this user.'); ?>

		<?php endif; ?>

	
            <!-- END REGISTRATION FORM --> 
          </div>
          <!-- END LOGIN --> 
          
        </div>
        <!-- content --> 
      </div>
    </div>
    <!--team search--> 
    
  </div>
   <div class="tab-content">
                               
                                <div class="portlet box secondary-color-light">
                                    <div class="portlet-title table-title-custom">
                                    	<div class="caption"><h4><?php echo Rights::t('core', 'Children'); ?></h4></div>
                                    </div>
                                    <div id="Team-grid" class="grid-view">
                                        <?php
											foreach(Yii::app()->user->getFlashes() as $key => $message) {
											echo '<div class="alert alert-'.$key.'">
											<button data-dismiss="alert" class="close"></button>';
											echo $message .'</div>';
                                        	}
                                        ?>
                                    <?php $this->widget('zii.widgets.grid.CGridView', array(
			'dataProvider'=>$dataProvider,
			'template'=>'{items}',
			'hideHeader'=>true,
			'emptyText'=>Rights::t('core', 'This user has not been assigned any items.'),
			'itemsCssClass'=>'table-custom',
			'columns'=>array(
    			array(
    				'name'=>'name',
    				'header'=>Rights::t('core', 'Name'),
    				'type'=>'raw',
    				'htmlOptions'=>array('class'=>'name-column'),
    				'value'=>'$data->getNameText()',
    			),
    			array(
    				'name'=>'type',
    				'header'=>Rights::t('core', 'Type'),
    				'type'=>'raw',
    				'htmlOptions'=>array('class'=>'type-column'),
    				'value'=>'$data->getTypeText()',
    			),
    			array(
    				'header'=>'&nbsp;',
    				'type'=>'raw',
    				'htmlOptions'=>array('class'=>'actions-column'),
    				'value'=>'$data->getRevokeAssignmentLink()',
    			),
			)
		)); ?>
                                        </div>
                                </div>
                       </div>
  
</div>
</div>

<div >

	

