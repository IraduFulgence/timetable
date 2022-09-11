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
                                    <strong><i class="icon-user icon-large"></i>&nbsp;Teachers Table</strong><strong style="float: right;">
                                    <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                              Add Subject
                            </button>

</strong>
<?php include ('_modal_subject.php');?>    
                                <?php if(null != $this->session->flashdata('error')){ echo $this->session->flashdata('error');}  ?>
                                <?php if(null != $this->session->flashdata('danger')){ echo $this->session->flashdata('danger');}  ?>
                                <?php if(null != $this->session->flashdata('info')){ echo $this->session->flashdata('info');}  ?>
  
                                <thead>
                                    <tr>
                                       <th>#</th>
                                        <th>Subject Title</th>
                                        <th>Subject code</th>
                                        <th>Faculty</th>
                                        <th>Semester</th>
                                        <th>Level/Year</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                        
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                $i =1;
                                foreach ($students as $subjects) {
                                    # code...
                                
                                ?>
                                <tr>
                                    <td><?= $i?></td>
                                    <td><?=$subjects['title']?></td>
                                    <td><?=$subjects['code']?></td>
                                    
                                    <td><?=$subjects['faculity']?></td>
                                    <td><?=$subjects['semester']?></td>
                                    <td><?=$subjects['level']?></td>
                                    
                                    <td><a href="<?=base_url('dashboard/subjects/edit/'.$subjects['id'].'')?>" class="btn btn-success"><i class="fa fa-edit"></i>Edit</a></td>
                                    <td><a href="<?=base_url('deletesubject/'.$subjects['id'].'')?>" class="btn btn-danger"><i class="fa fa-trash"></i>Delete</a></td>
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