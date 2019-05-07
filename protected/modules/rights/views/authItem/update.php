<div class="container-fluid">
  
  
  <div class="">
    <div class="">
      <div class="portlet box red">
        <div class="portlet-title table-title-custom">
          <div class="caption"> <h5><?php echo Rights::t('core', 'Add Child'); ?></h5></div>
        </div>
        <div class="portlet-body flip-scroll manage-team-adjust">
          <div class="portlet-body form">
            
              <!-- END PAGE LEVEL STYLES -->
            <div id="content" style="border-color:#006;"> 
              
              <!-- BEGIN LOGO --> 
              
              <!-- END LOGO --> 
              <!-- BEGIN LOGIN -->
              
                  <?php if( $childFormModel!==null ): ?>

					<?php $this->renderPartial('_childForm', array(
						'model'=>$childFormModel,
						'itemnameSelectOptions'=>$childSelectOptions,
					)); ?>

				<?php else: ?>

					<p class="info"><?php echo Rights::t('core', 'No children available to be added to this item.'); ?>

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
					'dataProvider'=>$childDataProvider,
					'template'=>'{items}',
					'hideHeader'=>true,
					'emptyText'=>Rights::t('core', 'This item has no children.'),
					'htmlOptions'=>array('class'=>'table table-hover'),
					'itemsCssClass'=>'table table-striped table-bordered table-advance table-hover',

					'columns'=>array(
    					array(
    						'name'=>'name',
    						'header'=>Rights::t('core', 'Name'),
    						'type'=>'raw',
    						'htmlOptions'=>array('class'=>'name-column'),
    						'value'=>'$data->getNameLink()',
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
    						'value'=>'$data->getRemoveChildLink()',
    					),
					)
				)); ?>
                                        </div>
                                </div>
                       </div>
  
</div>
</div>