<?php
/* @var $this TaskgroupController */
/* @var $task_group_list All To-Do Task Group list */

$base_url = Yii::app()->request->baseUrl . "/";
?>
<div class="container-fluid it-heading clearfix">
  <div class="it-dashboard-header clearfix">
    <h2>To-Do List</h2>

    <a class="btn btn-2"  href="<?php echo $base_url;?>index.php?r=taskgroup/create"><i id="icon" class="icon-plus" ></i>Add Task Group</a> 
     
         
  </div>
  <p style="display:display" id="btn"> </p>
  
    <div class="row-fluid">
      <div class="span12">
      
         <!-- BEGIN SAMPLE TABLE PORTLET-->
         <div class="portlet box secondary-color-light">
            <div class="portlet-title table-title-custom">
               <div class="caption">To-Do Group List
               </div>
            </div>
            <div class="tab-content  stationery-table no-margin-top">
               <div id="leave_type-grid" class="grid-view">
                  <div class="summary"></div>
                  <table class="table table-with-display-result">
                     <thead>
                        <tr>
                           <th id="leave_type-grid_c1">Title</th>
                           <th id="leave_type-grid_c1">Category</th>
                           <th id="leave_type-grid_c1">Created On</th>
                           <th id="leave_type-grid_c1">Total Task</th>                           
                           <th id="leave_type-grid_c2">View</th>
                           <th >Action</th>
                        </tr>
                     </thead>
                     <tbody>
                     
                     <?php
                         $htmlTable='';
                      if ($taskgrouplist) {
                         
                        foreach ($taskgrouplist as $rowdata){
  
                         $htmlTable .= '
                         <tr class="odd">
                           <td >'.$rowdata['taskgroupname'].'</td>
                           <td >'.$rowdata['task_category'].'</td>
                           <td >'.$rowdata['createdat'].'</td>
                           <td >'.$rowdata['total_task'].'</td>
                           <td ><a class="" style="text-align:center;float:none;"  href="'.$base_url.'index.php?r=taskgroup/view/id/'.$rowdata['group_id'].'">View Tasks</a></td>
                           <td >';
                          $htmlTable .= ' <a class="trash-icon-new hide-inner-image" title="Delete" onclick="javascript:action_delete('.$rowdata['group_id'].')" href="#"> </a>';

                          $htmlTable .= '</td>
                        </tr>';
                        
                     } 
                   } 
                     echo $htmlTable;
                     ?>
                     
                       
                     </tbody>
                  </table>
                                 
               </div>
            </div>
         </div>
         <!-- END SAMPLE TABLE PORTLET-->
      </div>
   </div>
   
</div>

<script>

function status_change(id)
{

	var testURL = '<?php echo $base_url;?>index.php?r=shareholder/changeStatus';

	$.ajax(

	{

		type:"POST",

		url: testURL,

		datatype:"html",

		data:"id="+id,

		success: function(data) { 

			$("#stat_"+id).html(data);}

	});



}

function action_delete(id)
        {
        
            if(!confirm('Are you sure you want to delete this item?')) return false;
            var testURL = '<?php echo $base_url?>index.php?r=taskgroup/delete';
            $.ajax(
            {
                type:"POST",
                url: testURL,
                datatype:"html",
                data:"id="+id,
                success: function(data) { 
                alert(data);
                location.reload();
        
                }
        
            });
        }

</script> 
