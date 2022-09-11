<body>
    <div id="wrapper">
     <?php include_once('_snav.php'); ?>
        <?php include_once('_sidebar.php'); ?>
        <div id="page-wrapper" >
            <div id="page-inner">
			 <div class="row">
                    <div class="col-md-12">
                       
						<div class="hero-unit-table">   
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <div class="alert alert-info">
                                    <strong><i class="icon-user icon-large"></i>&nbsp;Students Table</strong><strong style="float: right;">
                                    <form class="row" method="post" action="<?=base_url('uploadstudents')?>" enctype="multipart/form-data">
  <div class="col-md-6">
   
    <input type="file" class="form-control" name="uploadFile">
  </div>

  <div class="col-md-6">
    <input type="submit" class="btn btn-primary mb-3" name="submit" value="Upload students"/>
  </div>
</form>
</strong>
                                    
                                </div>
                                <?php if(null != $this->session->flashdata('error')){ echo $this->session->flashdata('error');}  ?>
<?php if(null != $this->session->flashdata('danger')){ echo $this->session->flashdata('danger');}  ?>

                                <thead>
                                    <tr>
                                       <th>#</th>
                                        <th>First Name</th>
                                        <th>Middle Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Faculty</th>
                                        <th>Level</th>
                                        <th>Status</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                        
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                $i =1;
                                foreach ($students as $student) {
                                    # code...
                                
                                ?>
                                <tr>
                                    <td><?= $i?></td>
                                    <td><?=$student['Firstname']?></td>
                                    <td><?=$student['Middlename']?></td>
                                    <td><?=$student['Lastname']?></td>
                                    <td><?=$student['email']?></td>
                                    <td><?=$student['faculity']?></td>
                                    <td><?=$student['level']?></td>
                                    <td><?=$student['status']?></td>
                                    <td><a href="<?=base_url('dashboard/students/edit/'.$student['id'].'')?>" class="btn btn-success"><i class="fa fa-edit"></i>Edit</a></td>
                                    <td><a href="<?=base_url('deletestudent/'.$student['id'].'')?>" class="btn btn-danger"><i class="fa fa-trash"></i>Delete</a></td>
                                </tr>
                                <?php $i++; }?> 
                                </tbody>
                            </table>
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