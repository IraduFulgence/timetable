<body>
    <div id="wrapper">
     <?php include_once('_snav.php'); ?>
        <?php include_once('_sidebar.php'); ?>
        <div id="page-wrapper" >
            <div id="page-inner">
			 <div class="row">
                    <div class="col-md-12">
                       
						<div class="hero-unit-table">   
                            <?php 
                            foreach ($students as $teacher) {
                                # code...
                            
                            ?>
                            <form class="form" method="post" enctype="multipart/form-data" action="<?=base_url('updatestudent')?>">
                                <div class="alert alert-info"><strong>Edit Student</strong> </div>
                                <hr>
                                <input type="hidden" name="id" value="<?= $teacher['id']?>">
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">FirstName</label>
                                    <div class="controls">
                                        <input type="text" name="Firstname" class ="form-control" value="<?= $teacher['Firstname']?>">
                                    </div>
                                </div>
                                
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">LastName</label>
                                    <div class="controls">
                                        <input type="text"  name="Lastname"  class ="form-control" value="<?= $teacher['Lastname']?>">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Email</label>
                                    <div class="controls">
                                        <input type="email" name="email" class ="form-control" value="<?= $teacher['email']?>">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Department</label>
                                    <div class="controls">
                                        <input type="text" name="faculity" class = "form-control"  value="<?= $teacher['faculity']?>">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Level</label>
                                    <div class="controls">
                                        <input type="text" name="level"  class = "form-control" value="<?= $teacher['level']?>">
                                    </div>
                                </div>

                               
								
									<hr/>

                                <div class="control-group">
                                    <div class="controls">

                                        <button type="submit"  class="btn btn-success"><i class="icon-save icon-large"></i>&nbsp;Update</button>
										
                                    </div>
                                </div>
                            </form>
                            <?php }?>
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