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
                                   
</strong>
       
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
                                        <th>Level</th>
                                        <th>Semester</th>
                            
                                        <th>Date</th>
                                        <th>Start</th>
                                        <th>End</th>
                                        <th>Academic Year</th>
                                        
                                        
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                $i =1;
                                foreach ($examtime as $exams) {
                                    # code...
                                
                                ?>
                                <tr>
                                    <td><?= $i?></td>
                                    <td><?=$exams['coursename']?></td>
                                    <td><?=$exams['subject_code']?></td>
                                    <td><?=$exams['lecturer']?></td>
                                    <td><?=$exams['department']?></td>
                                    <td><?=$exams['level']?></td>
                                    <td><?=$exams['semester']?></td>
        
                                    <td><?=$exams['day']?></td>
                                    <td><?=$exams['time_start']?></td>
                                    <td><?=$exams['time_end']?></td>
                                    <td><?=$exams['sy']?></td>
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