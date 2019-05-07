<?php
$base_url= Yii::app()->request->baseUrl."/";
?>
<style>
.btn.red {
    color: white;
    text-shadow: none;
    background-color: #3f98f9;
}
</style>
<div class="container-fluid" id="roles">
    <h3 class="page-title"><?php echo Rights::t('core', 'Roles'); ?></h3>
    <?php
    foreach(Yii::app()->user->getFlashes() as $key => $message) {
    
    echo '<div class="alert alert-'.$key.'">
    <button data-dismiss="alert" class="close"></button>';
    echo $message .'</div>';
    }
    ?>      
    <p>
		<?php echo Rights::t('core', 'A role is group of permissions to perform a variety of tasks and operations, for example the authenticated user.'); ?><br />
		<?php echo Rights::t('core', 'Roles exist at the top of the authorization hierarchy and can therefore inherit from other roles, tasks and/or operations.'); ?>
	</p>
    
    <p>
	<a class="btn red" style="color:#FFF" href="<?php echo $base_url?>index.php/rights/authItem/create/type/2">Create a new role</a>
	
	
                <div class="portlet box">
							<div class="portlet-title table-title-custom">
								<div class="caption"><?php echo Rights::t('core', 'Roles'); ?>
                                </div>
							</div>
                            <div class="tab-content">
  								<?php $this->widget('zii.widgets.grid.CGridView', array(
	    'dataProvider'=>$dataProvider,
	    'template'=>'{items}',
	    'emptyText'=>Rights::t('core', 'No roles found.'),
	    'htmlOptions'=>array('class'=>'grid-view role-table'),
		'itemsCssClass'=>'table-custom',
	    'columns'=>array(
    		array(
    			'name'=>'name',
    			'header'=>Rights::t('core', 'Name'),
    			'type'=>'raw',
    			'htmlOptions'=>array('class'=>'name-column'),
    			'value'=>'$data->getGridNameLink()',
    		),
    		array(
    			'name'=>'description',
    			'header'=>Rights::t('core', 'Description'),
    			'type'=>'raw',
    			'htmlOptions'=>array('class'=>'description-column'),
    		),
    		array(
    			'name'=>'bizRule',
    			'header'=>Rights::t('core', 'Business rule'),
    			'type'=>'raw',
    			'htmlOptions'=>array('class'=>'bizrule-column'),
    			'visible'=>Rights::module()->enableBizRule===true,
    		),
    		array(
    			'name'=>'data',
    			'header'=>Rights::t('core', 'Data'),
    			'type'=>'raw',
    			'htmlOptions'=>array('class'=>'data-column'),
    			'visible'=>Rights::module()->enableBizRuleData===true,
    		),
    		array(
    			'header'=>'&nbsp;',
    			'type'=>'raw',
    			'htmlOptions'=>array('class'=>'actions-column'),
    			'value'=>'$data->getDeleteRoleLink()',
    		),
	    )
	)); ?>
						 </div>
                        </div>
              
				<!-- END PAGE CONTENT-->
   </div>


	

	

	<p class="info"><?php echo Rights::t('core', 'Values within square brackets tell how many children each item has.'); ?></p>

