


			<div class="content"> 
                <!-- BEGIN LOGIN FORM -->
                
                <div class="success"> </div>
                <?php $form=$this->beginWidget('CActiveForm'); ?>
                  <div class="row-fluid">
                    <div class="span4">
                      <div class="control-group">
                       
                        <div class="controls">
                         <?php echo $form->dropDownList($model, 'itemname', $itemnameSelectOptions); ?>
                        </div>
                        
                        <?php echo $form->error($model, 'itemname'); ?>
                      </div>
                    </div>
                    
                    <div class="span4">
                      <div class="control-group">
                       
                        <div class="controls">
                        <input type="submit" name="yt0" value="Add" class="btn red">
                        </div>
                        
                       
                      </div>
                    </div>
                  </div>
                  
                  
               <?php $this->endWidget(); ?>
              </div>