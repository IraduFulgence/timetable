<body>
    <div id="wrapper">
     <?php include_once('_snav.php'); ?>
        <?php include_once('_sidebar.php'); ?>
        <div id="page-wrapper" >
            <div id="page-inner">
			 <div class="row">
                    <div class="col-md-12">
                       
						<div class="hero-unit-table">   
                           
                            <form class="form" method="post" enctype="multipart/form-data" action="<?=base_url('addlecturer')?>">
                                <div class="alert alert-info"><strong>New Lecturer</strong> </div>
                                <hr>
                                
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">FirstName</label>
                                    <div class="controls">
                                        <input type="text" name="Firstname" class ="form-control">
                                    </div>
                                </div>
                                
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">LastName</label>
                                    <div class="controls">
                                        <input type="text"  name="Lastname"  class ="form-control">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Email</label>
                                    <div class="controls">
                                        <input type="email" name="email" class ="form-control">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Department</label>
                                    <div class="controls">
                                        <input type="text" name="faculity" class = "form-control">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Semester</label>
                                    <div class="controls">
                                        <input type="text" name="level"  class = "form-control">
                                    </div>
                                </div>
                               
								
									<hr/>

                                <div class="control-group">
                                    <div class="controls">

                                        <button type="submit"  class="btn btn-success"><i class="icon-save icon-large"></i>&nbsp;Register</button>
										
                                    </div>
                                </div>
                            </form>
                            
                        </div>
                    </div>
                </div> 
                
				
				</div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
    </div>
    <?php include_once('_scripts.php'); ?>
</body>
</html>