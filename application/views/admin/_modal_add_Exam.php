<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                          
                                            <div class="alert alert-info"><strong><center>Add Exam </center></strong></div>
                                        </div>
                                        <div class="modal-body">
                              <form  method="post" enctype="multipart/form-data" action="<?= base_url('addtable')?>">
                                
                                <hr>
								
								 <div class="control-group">
                                           <label class="control-label" for="inputEmail">Day:</label>
                                          <input type="date" name="date" id="" class="form-control">
		
                                 </div>
                                 <!-- <div class="control-group">
                                           <label class="control-label" for="inputEmail">Number of students:</label>
                                          <input type="number" name="students" id="" class="form-control">
		
                                 </div>
                                -->
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Time Start:</label>
                                    <div class="controls">
                                       <select type="text" name="time_start" class = "form-control" placeholder="Category" >
                                         <option>--Select--</option>
		<option value="7:00am">7:00am</option>
		<option value="8:00am">8:00am</option>
		<option value="9:00am">9:00am</option>
		<option value="10:am">10:00am</option>
		<option value="11:00am">11:00am</option>
		<option value="12:00pm">12:00pm</option>
		<option value="1:00pm">1:00pm</option>
		<option value="2:00pm">2:00pm</option>
		<option value="3:00pm">3:00pm</option>
		<option value="4:00pm">4:00pm</option>
		<option value="5:00pm">5:00pm</option>
		<option value="6:00pm">6:00pm</option>
		<option value="7:00pm">7:00pm</option>
		<option value="8:00pm">8:00pm</option></select>
                                    </div>
                                </div>
                               
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Time End:</label>
                                    <div class="controls">
									<select type="text" name="time_end" class = "form-control" placeholder="Category" >
                                        <option>--Select--</option>
		<option value="7:30am">7:00am</option>
		<option value="8:00am">8:00am</option>
		<option value="9:00am">9:00am</option>
		<option value="10:am">10:00am</option>
		<option value="11:00am">11:00am</option>
		<option value="12:00pm">12:00pm</option>
		<option value="1:00pm">1:00pm</option>
		<option value="2:00pm">2:00pm</option>
		<option value="3:00pm">3:00pm</option>
		<option value="4:00pm">4:00pm</option>
		<option value="5:00pm">5:00pm</option>
		<option value="6:00pm">6:00pm</option>
		<option value="7:00pm">7:00pm</option>
		<option value="8:00pm">8:00pm</option></select>
		</div>
                                </div>
								
								
								 <div class="control-group">
                                    <label class="control-label" for="inputPassword">Teacher:</label>
                                    <div class="controls">
									<select type="text" name="fname" class = "form-control" placeholder="Category" >
                                      <option>--Select--</option>
	<?php
    foreach ($teachers as $teacher) {
        # code...
    
    ?>
    <option value="<?= $teacher['email']?>"><?= $teacher['Firstname']?> &nbsp;<?= $teacher['Lastname']?></option>
    <?php }?>	
</select>
                                    </div>
                                </div>
								<div class="control-group">
                                    <label class="control-label" for="inputPassword">Department:</label>
                                    <div class="controls">
									<select name="department" class = "form-control" placeholder="Category" id="department">
                                      <option value="SOFTWARE ENGINEERING DAY">SOFTWARE ENGINEERING DAY</option>
                                      <option value="NETWORKING DAY">NETWORKING DAY</option>
                                      <option value="INFORMATION MANAGEMENT DAY">INFORMATION MANAGEMENT DAY</option>
	</select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">semester:</label>
                                    <div class="controls">
									<select type="text" name="semester" class = "form-control" placeholder="Category">
                                      <option value="1">1</option>
									 <option value="2">2</option>
                                     <option value="3">3</option>
                                     <option value="4">4</option>
                                     <option value="5">5</option>
                                     <option value="6">6</option>
                                     <option value="7">7</option>
                                     <option value="8">8</option>
	</select>
                                    </div>
                                </div>
								
								
								  <div class="control-group">
                                    <label class="control-label" for="inputPassword">Subject:</label>
                                    <div class="controls">
									<select type="text" name="subject_code" class = "form-control" placeholder="Category" >
                                       <option>--Select--</option>
                                       <?php
    foreach ($subjects as $subject) {
        # code...
    
    ?>
    <option value="<?= $subject['code']?>"><?= $subject['title']?></option>
    <?php }?>	
	</select>
                                    </div>
                                </div>
								
								  <!-- <div class="control-group">
                                    <label class="control-label" for="inputPassword">Room:</label>
                                    <div class="controls">
									<select type="text" name="room_name" class = "form-control" placeholder="Category" >
                                        <option>--Select--</option>
                                        <?php
    foreach ($rooms as $room) {
        # code...
    
    ?>
    <option value="<?= $room['name']?>"><?= $room['name']?></option>
    <?php }?>
	</select>
                                    </div>
                                </div> -->
								
								
								  
								  <div class="control-group">
                                    <label class="control-label" for="inputPassword">Academic Year:</label>
                                    <div class="controls">
									<input type="text" name="sy" id="" class="form-control" placeholder="academic year">
                                    </div>
                                </div>
								

                                
								<div class = "modal-footer">
											 <button name = "go" class="btn btn-primary">Save</button>
											<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                           

								</div>
							
									   </div>
                                     
                                          
                                      
                                    </div>
									
									  </form>  
									  
									  
									  
									  
									  
									  
                                </div>
                            </div>
<script>
function getsubjects(i){
		
        $.ajax({
          
          url: '<?= base_url() ?>/getsubjects/' + i.value,
         method:"GET",
     
     success:function(data){
      console.log(data);
      $('select[name="district"]').html(data); 
        
     }
        });
          }
</script>