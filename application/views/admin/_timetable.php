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
                                    <strong><i class="icon-user icon-large"></i>&nbsp;Exams time Table</strong><strong style="float: right;">
                                    <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal1">
                              Add Time table
                            </button>  
</strong>
<?php include ('_modal_add_Exam.php');?>        
                                </div>
                                <?php if(null != $this->session->flashdata('error')){ echo $this->session->flashdata('error');}  ?>
<?php if(null != $this->session->flashdata('danger')){ echo $this->session->flashdata('danger');}  ?>

                                <thead>
                                    <tr>
                                       <th>#</th>
                                        <th>Course name</th>
                                        <th>Course code</th>
                                        <th>Lecturer</th>
                                        <th>Department</th>
                                        
                                        <th>Semester</th>
    
                                        <th>Date</th>
                                        <th>Start</th>
                                        <th>End</th>
                                        <th>Academic Year</th>
                                        <th>Room</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                        
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                $i =1;
                                foreach ($students as $exams) {
                                    # code...
                                
                                ?>
                                <tr>
                                    <td><?= $i?></td>
                                    <td><?=$exams['coursename']?></td>
                                    <td><?=$exams['subject_code']?></td>
                                    <td><?=$exams['lecturer']?></td>
                                    <td><?=$exams['department']?></td>
                                    <!--  -->
                                    <td><?=$exams['semester']?></td>
                                    
                                    <td><?=$exams['day']?></td>
                                    <td><?=$exams['time_start']?></td>
                                    <td><?=$exams['time_end']?></td>
                                    <td><?=$exams['sy']?></td>
                                    <td><?=$exams['room_name']?></td>
                                    <td><a href="<?=base_url('dashboard/exam/edit/'.$exams['id'].'')?>" class="btn btn-success"><i class="fa fa-edit"></i>Edit</a></td>
                                    <td><a href="<?=base_url('deletexam/'.$exams['id'].'')?>" class="btn btn-danger"><i class="fa fa-trash"></i>Delete</a></td>
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