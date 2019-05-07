<?php $this->breadcrumbs = array(
	'Rights'=>Rights::getBaseUrl(),
	Rights::t('core', 'Permissions'),
); ?>

<style>
.revoke-link{
color: #ea160a;
}
</style>
<div id="permissions">

	

	

<div class="container-fluid">
  
  
 		
              <div class="portlet box red">
                <div class="portlet-title table-title-custom">
                  <div class="caption"><h2><?php echo Rights::t('core', 'Permissions'); ?></h2></div>
                </div>
                <div class="portlet-body flip-scroll manage-team-adjust">
                  <div class="portlet-body ">
                    <p>
						<?php echo Rights::t('core', 'Here you can view and manage the permissions assigned to each role.'); ?><br />
                        <?php echo Rights::t('core', 'Authorization items can be managed under {roleLink}', array(
                            '{roleLink}'=>CHtml::link(Rights::t('core', 'Roles'), array('authItem/roles')),
                           
                        )); ?>
                    </p>
                
                    <p><?php echo CHtml::link(Rights::t('core', 'Generate items for controller actions'), array('authItem/generate'), array(
                        'class'=>'generator-link',
                    )); ?></p>
                      
                </div>
                <!-- content --> 
              </div>
            </div>
            <!--team search--> 


	
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
										'emptyText'=>Rights::t('core', 'No authorization items found.'),
										'htmlOptions'=>array('class'=>'grid-view permission-table'),
										'itemsCssClass'=>'table-custom',
										'columns'=>$columns,
									)); ?>
                                    </div>
                            </div>
                   </div>
	<p class="info">*) <?php echo Rights::t('core', 'Hover to see from where the permission is inherited.'); ?></p>
</div></div>
	<script type="text/javascript">

		/**
		* Attach the tooltip to the inherited items.
		*/
		jQuery('.inherited-item').rightsTooltip({
			title:'<?php echo Rights::t('core', 'Source'); ?>: '
		});

		/**
		* Hover functionality for rights' tables.
		*/
		$('#rights tbody tr').hover(function() {
			$(this).addClass('hover'); // On mouse over
		}, function() {
			$(this).removeClass('hover'); // On mouse out
		});

	</script>

</div>
