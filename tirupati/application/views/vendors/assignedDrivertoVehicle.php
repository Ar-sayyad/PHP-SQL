<?php include 'header-top.php';?>

<body>

    <!-- # sidebar -->
    <?php include 'sidebar.php';?>
    <!-- /# sidebar -->


    <!-- # header -->
    <?php include 'header.php';?>
    <!-- /# header -->
    
    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
               <!---page title-->
                <?php include 'page-title.php';?>
                <!---/page-title--->
                <!-- /# row -->
                <section id="main-content">
                     <!---system messages---->                    
                    <?php include 'system_msgs.php';?>
                    <!---/system messages---->
                    
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="addbtn">
                                <button data-toggle="modal" onclick="showAjaxModal('<?php echo base_url();?>Subadmin/popup/myadmin/assignDriverToVehicle');" class="btn btn-primary" >Assign Driver to Vehicle</button>
                             </div>
                              <div class="card alert">
                                <div class="bootstrap-data-table-panel">
                                    <div class="table-responsive">
                                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>SR.</th>
                                                    <th>Vehicle No.</th>
                                                    <th>Driver Name</th>
                                                    <th>Contact No.</th>
                                                    <th style="text-align: left">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $sr=1; foreach($assignedDrivers_info as $row){?>
                                                <tr>
                                                    <td><?php echo $sr;?></td>
                                                    <td><?php echo $row->vehicle_no;?></td>
                                                    <td><?php echo $row->driver_name;?></td>
                                                    <td><?php echo $row->driver_contact;?></td>
                                                    <td style="text-align: left">
                                                        <a data-toggle="tooltip" title="Release Vehicle" href="<?php echo base_url(); ?>Subadmin/assignedDrivers/delete/<?php echo $row->assign_id;?>" class="table-link danger">
                                                        <span class="fa-stack" onclick="return checkDelete();">
                                                        <i class="fa fa-square fa-stack-2x"></i> 
                                                        <i class="ti-share-alt ti-release fa-stack-1x fa-inverse"></i>
                                                        </span>
                                                        </a>
                                                        <?php if($row->is_active==0){ ?>
                                                        <a data-toggle="tooltip" title="Unblock Vehicle" href="<?php echo base_url(); ?>Subadmin/assignedDrivers/block/<?php echo $row->assign_id;?>/1" class="table-link danger">
                                                        <span class="fa-stack" onclick="return checkBlock();">
                                                        <i class="fa fa-square fa-stack-2x"></i> 
                                                        <i class="ti-power-off ti-clos fa-stack-1x fa-inverse"></i>
                                                        </span>
                                                        </a>
                                                        <?php }else{ ?>
                                                         <a data-toggle="tooltip" title="Block Vehicle" href="<?php echo base_url(); ?>Subadmin/assignedDrivers/block/<?php echo $row->assign_id;?>/0" class="table-link danger">
                                                        <span class="fa-stack" onclick="return checkBlock();">
                                                        <i class="fa fa-square fa-stack-2x"></i> 
                                                        <i class="ti-check-box ti-unblock fa-stack-1x fa-inverse"></i>
                                                        </span>
                                                        </a>
                                                        <?php } ?>
                                                        <?php if($row->fill_count==0){ ?>
                                                        <a style="cursor:pointer" class="table-link success">
                                                        <span class="tooltiptext">Not Filled Yet</span>
                                                        <span class="fa-stack">
                                                        <i class="fa fa-square fa-stack-2x"></i> 
                                                        <i class="ti-timer ti-queue fa-stack-1x fa-inverse"></i>
                                                        </span>
                                                        </a>
                                                        <?php }else{ ?>
                                                        <a style="cursor:pointer" class="table-link success">
                                                         <span class="tooltiptext">Fuel Filled Today</span>
                                                        <span class="fa-stack">
                                                        <i class="fa fa-square fa-stack-2x"></i> 
                                                        <i class="ti-thumb-up ti-filled fa-stack-1x fa-inverse"></i>
                                                        </span>
                                                        </a>
                                                        <?php } ?>
                                                        
                                                        <?php if($row->block==0){ ?>
                                                        <a style="cursor:pointer" class="table-link success">
                                                        <span class="tooltiptext">Available</span>
                                                        <span class="fa-stack">
                                                        <i class="fa fa-square fa-stack-2x"></i> 
                                                        <i class="ti-check ti-avail fa-stack-1x fa-inverse"></i>
                                                        </span>
                                                        </a>
                                                        <?php }else{ ?>
                                                        <a  href="<?php echo base_url(); ?>Subadmin/assignedDrivers/reassign/<?php echo $row->assign_id;?>/0" style="cursor:pointer" class="table-link success">
                                                         <span class="tooltiptext">Reassign</span>
                                                        <span class="fa-stack">
                                                        <i class="fa fa-square fa-stack-2x"></i> 
                                                        <i class="ti-back-right ti-reassign fa-stack-1x fa-inverse"></i>
                                                        </span>
                                                        </a>
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                                <?php $sr++; }?>    
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- /# card 
                        </div>
                        <!-- /# column -->
                    </div>
                    <!-- /# row -->

                    <!-- /# row -->
                    <!--FOOTER CONTENTS--->
                     <?php include 'footer-contents.php';?>
                    <!---/FOOTER CONTENTS-->
                </section>
            </div>
        </div>
    </div>



     <!-- # footer -->
    <?php include 'footer.php';?>
    <!-- /# footer -->

    <script>
       $(document).ready(function() {
           function hidetab(){    
            $('#mssg').hide();
          }
            setTimeout(hidetab,4000);
       });
    </script>
</body>


</html>