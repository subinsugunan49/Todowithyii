<?php
/* @var $this TaskgroupController */
/* @var $data Taskgroup */
$base_url= Yii::app()->request->baseUrl."/";
?><style>
   .edit-icon-new {
    
    width: 16px;
    height: 20px;
    display: inline-block;
    margin: 0 39px;
    background-size: 41px auto;
}
</style>

<div class="container-fluid it-heading clearfix">
   <!-- BEGIN PAGE HEADER-->
   <div class="row-fluid">
      <div class="span12">
         <!-- BEGIN STYLE CUSTOMIZER -->
         <!-- END BEGIN STYLE CUSTOMIZER -->  
         <!-- BEGIN PAGE TITLE & BREADCRUMB-->
         <div class="it-dashboard-header clearfix">
            <h2>To-Do Task Group  Details</h2>
            <a class="btn btn-2 active" style="color: #ffffff;"  onclick="modalopen();">
              <i id="icon" class=""></i>Add New Task</a>
            
         </div>
        <p style="display:display" id="btn">   </p>
                 <!-- END PAGE TITLE & BREADCRUMB-->
      </div>
   </div>
   <!-- END PAGE HEADER-->
   <!-- BEGIN PAGE CONTENT-->
            <?php
                    $this->renderPartial('//taskdetails/_form',array('groupid'=>$model->id )); 
            ?>

    
      <div class="row-fluid">
      <div class="span12">
        <div class="other-details-widget">
          <h3 style="color:#E91E63">To-Do Task Summary-<?php echo $model->taskgroupname ?>         
          
          </h3>
          <ul class="team-description ">
            <li> Task Group Title : <span><?php echo $model->taskgroupname ?></span> </li>
            <li> Task Category : <span><?php echo $taskcategory ?></span> </li>
            <li> Created On <br><span><?php echo date('d-m-Y',strtotime($model->created_on)); ?></span> </li>
            <li> Total Task List : <span><?php echo $data['total_task'] ?></span> </li>           
            <li> Completed  :<br>  <span><?php echo $data['completedtask'] ?></span></li>
            <li> Pending : <span><?php echo $data['pendingtask'] ?></span> </li>       
           <li style="width: 80%;"> Description : <span><?php echo $model->description ?></span></li>
        </div>
      </div>
  </div>
   
   <div class="row-fluid">
      <div class="span12">
      
           <?php
            foreach(Yii::app()->user->getFlashes() as $key => $message) {
            echo '<div class="alert alert-'.$key.'">
            <button data-dismiss="alert" class="close"></button>';
            echo $message .'</div>';
             }
         ?>   
         <!-- BEGIN SAMPLE TABLE PORTLET-->
         <div class="portlet box secondary-color-light">
            <div class="portlet-title table-title-custom">
               <div class="caption">Task List

               </div>
               
            </div>
            <div class="tab-content  stationery-table no-margin-top">
               <div id="leave_type-grid" class="grid-view">
                  <div class="summary"></div>
                  <table class="table table-with-display-result">
                     <thead>
                        <tr>
                          
                           <th id="leave_type-grid_c1">Task Title</th>
                           <th id="leave_type-grid_c1">Created On</th>
                           <th id="leave_type-grid_c1">Status</th>
                           <th id="leave_type-grid_c1">Completed Date</th>
                           <th id="leave_type-grid_c1">Action</th>
                           <th id="leave_type-grid_c1"></th>
                          
                        </tr>
                     </thead>
                     <tbody>
                     
                     <?php echo $data['table_list']; ?>
                        
                    
                     </tbody>
                  </table>             
               </div>
            </div>
         </div>
         <!-- END SAMPLE TABLE PORTLET-->
      </div>
   </div>
   <!-- END PAGE CONTENT-->
</div>



<!--- Profile Picture Pop Up -->

<link href="<?php echo $base_url ?>assets/plugins/bootstrap-switch/static/stylesheets/bootstrap-switch-metro.css" rel="stylesheet" type="text/css"/>




<script src="<?php echo $base_url; ?>assets/scripts/teamvalidation.js" type="text/javascript"></script> 
<script type="text/javascript" src="<?php echo $base_url; ?>assets/plugins/select2/select2.min.js"></script>
    
 <script src="<?php echo $base_url; ?>assets/plugins/bootstrap-switch/static/js/bootstrap-switch.js" type="text/javascript" ></script>
<!--- End  Profile Picture Pop Up -->
<?php echo 

$formHtml = '<div id="edit-modal-addtaskform" class="modal hide fade parking-popup"  tabindex="-1" data-width="400" aria-hidden="true"  style="display: none;width: 1000px;margin-left: -528px;">  

    <div id="form-content">
    </div>
 </div>';
       echo $formHtml;


 ?>
<script>
     function modaleditopen(taskid){

         var testURL = '<?php echo $base_url ?>taskdetails/getTaskdetails';
         var data = {
          "id": taskid };
            $.ajax(
            {
              type:"POST",
              url: testURL,
              dataType: "json",
              data:data,
              success: function(data) { 

                $("#taskid").val(data['id']);
                $("#tasktitle").val(data['title']);
                $("#tasknotes").val(data['remarks']);

                $('#modal-addtaskform').modal('show');
             
               }
          
            });

         
         
      }
    function modalopen(id){
         $('#modal-addtaskform').modal('show');
      }

    $('.switch').on('switch-change', function (e, state) {
   
     var taskid=$(this).attr('data-id');
     var data = {
          "id": taskid,
          "status":state.value
      };
         var testURL = '<?php echo $base_url ?>taskdetails/changetaskstatus';
            $.ajax(
            {
              type:"POST",
              url: testURL,
              dataType: "json",
              data:data,
              success: function(data) { 

                location.reload(); 
             
            }
          
            });
});
function action_delete(id)
        {
        
            if(!confirm('Are you sure you want to delete this item?')) return false;
            var testURL = '<?php echo $base_url?>index.php?r=taskdetails/delete';
            $.ajax(
            {
                type:"POST",
                url: testURL,
                datatype:"html",
                data:"id="+id,
                success: function(data) { 
                  if(data == 'error')
                   alert("Something went wrong");
                 
                location.reload();
        
                }
        
            });
        }
</script>