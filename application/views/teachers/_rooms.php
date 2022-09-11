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
                                    <strong><i class="icon-user icon-large"></i>&nbsp;Rooms Table </strong><strong style="float:right;">
							 <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                              Add Room
                            </button>

</strong>
<?php include ('_modal_add_room.php');?>                
                                </div>
                                <?php if(null != $this->session->flashdata('error')){ echo $this->session->flashdata('error');}  ?>
                                <?php if(null != $this->session->flashdata('danger')){ echo $this->session->flashdata('danger');}  ?>
                                <?php if(null != $this->session->flashdata('info')){ echo $this->session->flashdata('info');}  ?>
                                <thead>
                                    <tr>
                                       <th>#</th>
                                        <th>Room Name</th>
                                        <th>Room Capacity</th>
                                        
                                        <th>Edit</th>
                                        <th>Delete</th>
                                        
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                $i =1;
                                foreach ($students as $room) {
                                    # code...
                                
                                ?>
                                <tr>
                                    <td><?= $i?></td>
                                    <td><?=$room['name']?></td>
                                    <td><?=$room['capacity']?></td>
                                   
                                    <td><a href="<?=base_url('dashboard/rooms/edit/'.$room['id'].'')?>" class="btn btn-success"><i class="fa fa-edit"></i>Edit</a></td>
                                    <td><a href="<?=base_url('deleteroom/'.$room['id'].'')?>" class="btn btn-danger"><i class="fa fa-trash"></i>Delete</a></td>
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
    <!-- Button trigger modal -->

<!-- Modal -->


</body>
</html>