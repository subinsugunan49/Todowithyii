<?php
/* @var $this TaskdetailsController */
/* @var $modeltaskdetails Taskdetails */
/* @var $form CActiveForm */
?>
<?php
$base_url= Yii::app()->request->baseUrl."/";
$action=$base_url.'index.php?r=taskdetails/create';
$formHtml ='';
$formHtml .= '<div id="modal-addtaskform" class="modal hide fade parking-popup" 	tabindex="-1" data-width="400" aria-hidden="true"  style="display: none;width: 1000px;margin-left: -528px;">';
  
 $formHtml .= '<h4>Task Details</h4>
                <form class="form-horizontal no-margin" id="form-add-task" method="post">
                              <ul class="parking-popup-description">
		                         	 <li class="clearfix">
		                                <div class="left">Things to do</div>
		                              <div class="right">
                                  <input type="hidden" name="Taskdetails[id]" id="taskid">
		                        				<input class="m-wrap span6" name="Taskdetails[title]" required placeholder="" id="tasktitle">
										 	</div>

		                         	   </li>

		                         	  <li class="clearfix">
                                          <div class="left">Remarks</div>
                                          <div class="right">
                                          <textarea placeholder="Comments / Notes"   cols="20"  name="Taskdetails[remarks]" rows="5" maxlength="200" " id="tasknotes"></textarea>
                                            
                                          </div>
                                        </li>

		                         	  
                                      
                                        <li class="clearfix">
                                          <ul class="add-project-btns clearfix">
                                            <li>
                                              <input type="submit" class="btn red" value="Save">
                                            </li>
                                            <li> <a href="'.$base_url.'/taskgroup/view/id/'.$groupid.'" class="btn red" id="">CANCEL</a> </li>
                                          </ul>
                                        </li>
                                      </ul>
                                </form>
                                </div>';
       echo $formHtml;
 ?>
<script type="text/javascript">
	$("document").ready(function(){

	 $("#form-add-task").submit(function(){

    if($("#taskid").val()){
      var action='update';
    }else {
       var action='create';
    }

	 	var data = {
    		  "Taskdetails[task_group_id]":<?php echo $groupid ?>
    	};

    	data = $("#form-add-task").serialize() + "&" + $.param(data);

	 	var ajxUrl = '<?php echo $base_url ?>Taskdetails/'+action;
	      $.ajax(
	      {
	        type:"POST",
	        url: ajxUrl,
	        dataType: "json",
	        data: data,
	        success: function(data) { 
	         	if (data["status"] == 'success') {
	         		location.reload();
	         	}
	        }
	    
	      });
	      return false;
	 });
});

</script>
<!-- form -->