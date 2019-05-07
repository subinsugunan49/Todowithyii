
<style>
#rights .flashes {
    /* width: 910px; */
    /* height: 40px; */
    /* position: absolute; */
    top: 60px;
    /* left: 20px; */
}
</style>
<?php $this->breadcrumbs = array(
	'Rights'=>Rights::getBaseUrl(),
	Rights::t('core', 'Assignments'),
); ?>



	

	

<?php
/* @var $this DesignationController */
/* @var $dataProvider CActiveDataProvider */


?>




<?php
/* @var $this TaskController */
/* @var $model Task */

$base_url= Yii::app()->request->baseUrl."/";


?>

<div class="container-fluid">
				
                
    <?php /*?><h3 class="page-title">Designation</h3>
    <ul class="breadcrumb">
    <li>
    <i class="icon-home"></i>
    <a href="<?php echo $base_url; ?>index.php?r=AdminDashboard">Home</a> 
    <i class="icon-angle-right"></i>
    </li>
    <li><?php echo Rights::t('core', 'Assignments'); ?></li>
    
    </ul><?php */?>

    
    
    
    <?php
    foreach(Yii::app()->user->getFlashes() as $key => $message) {
    
    echo '<div class="alert alert-'.$key.'">
    <button data-dismiss="alert" class="close"></button>';
    echo $message .'</div>';
    }
    ?>      
	<h2><?php echo Rights::t('core', 'Assignments'); ?></h2>

	<p>
		<?php echo Rights::t('core', 'Here you can view which permissions has been assigned to each user.'); ?>
	</p>

                
                
                <div class="portlet box">
							<div class="portlet-title table-title-custom">
								<div class="caption"><?php echo Rights::t('core', 'Assignments'); ?></div>
								<?php /*?><div class="tools">
									<a href="javascript:;" class="collapse"></a>
									<a href="#portlet-config" data-toggle="modal" class="config"></a>
									<a href="javascript:;" class="reload"></a>
									<a href="javascript:;" class="remove"></a>
								</div><?php */?>
							</div>
                            
                            
                            <div class="tab-content" id="assignments">
		
	<?php //echo '<pre>';print_r($model->search());exit;?>							
  <?php $this->widget('zii.widgets.grid.CGridView', array(
	    'dataProvider'=>$dataProvider,
	    'template'=>"{items}\n{pager}",
	    'emptyText'=>Rights::t('core', 'No users found.'),
	    'htmlOptions'=>array('class'=>'grid-view assignment-table'),
		'itemsCssClass'=>'table-custom',
	    'columns'=>array(
    		array(
    			'name'=>'name',
    			'header'=>Rights::t('core', 'Name'),
    			'type'=>'raw',
    			'htmlOptions'=>array('class'=>'name-column'),
    			'value'=>'$data->getAssignmentNameLink()',
    		),
    		array(
    			'name'=>'assignments',
    			'header'=>Rights::t('core', 'Roles'),
    			'type'=>'raw',
    			'htmlOptions'=>array('class'=>'role-column'),
    			'value'=>'$data->getAssignmentsText(CAuthItem::TYPE_ROLE)',
    		),
			array(
    			'name'=>'assignments',
    			'header'=>Rights::t('core', 'Tasks'),
    			'type'=>'raw',
    			'htmlOptions'=>array('class'=>'task-column'),
    			'value'=>'$data->getAssignmentsText(CAuthItem::TYPE_TASK)',
    		),
			array(
    			'name'=>'assignments',
    			'header'=>Rights::t('core', 'Operations'),
    			'type'=>'raw',
    			'htmlOptions'=>array('class'=>'operation-column'),
    			'value'=>'$data->getAssignmentsText(CAuthItem::TYPE_OPERATION)',
    		),
	    )
	)); ?>
                                
                                
			
						</div></div>
                
                
                
				<!-- END PAGE CONTENT-->
			</div>


