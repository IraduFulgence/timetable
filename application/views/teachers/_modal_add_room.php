<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                          
                                            <div class="alert alert-info"><strong><center>Add Room </center></strong></div>
                                        </div>
                                        <div class="modal-body">
                              <form  method="post" enctype="multipart/form-data" action="<?=base_url('addroom')?>">
                                
                              
								
								 <div class="control-group">
                                           <label class="control-label" for="inputEmail">Room Name:</label>
                                           <input type="text" name="name" class = "form-control" >
                                </div>
                               
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Room Capacity:</label>
                                    <div class="controls">
                                        <input type="text" class = "form-control"  name="capacity" >
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