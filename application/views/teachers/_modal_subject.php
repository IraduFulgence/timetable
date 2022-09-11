<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                          
                                            <div class="alert alert-info"><strong><center>Add Subject </center></strong></div>
                                        </div>
                                        <div class="modal-body">
                              <form  method="post" enctype="multipart/form-data" action="<?=base_url('addsubject')?>">
                               
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Title:</label>
                                    <div class="controls">
                                        <input type="text" class = "form-control"  name="title"  placeholder="" >
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Subject Code:</label>
                                    <div class="controls">
                                        <input type="text" name="code" class = "form-control" placeholder="">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Faculty:</label>
                                    <div class="controls">
                                        <input type="text" name="faculity" class = "form-control" placeholder="">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Level/Year:</label>
                                    <div class="controls">
                                        <input type="text" name="level" class = "form-control" placeholder="">
                                    </div>
                                </div>
								  <div class="control-group">
                                    <label class="control-label" for="inputPassword">Semester:</label>
                                    <div class="controls">
                                        <input type="text" name="semester" class = "form-control" placeholder="">
                                    </div>
                                </div>
								

                              
								<div class = "modal-footer">
											 <button type="submit" class="btn btn-primary">Save</button>
											<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                           

								</div>
							
									   </div>
                                     
                                          
                                      
                                    </div>
									
									  </form>  
			  
                                </div>
                            </div>