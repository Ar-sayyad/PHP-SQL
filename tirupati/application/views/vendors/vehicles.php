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
                                <button data-toggle="modal" onclick="showAjaxModal('<?php echo base_url();?>Subadmin/popup/myadmin/addVehicle');"  class="btn btn-primary" >Add Vehicle</button>
                             </div>
                             <div class="card alert">
                                <div class="bootstrap-data-table-panel">
                                    <div class="table-responsive">
                                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>SR.</th>
                                                    <th>Vehicle No.</th>
                                                    <th>Owner Name</th>
                                                    <th>Fuel Limit</th>
                                                    <th style="text-align: left">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $sr=1; foreach($vehicle_info as $row){?>
                                                <tr>
                                                    <td><?php echo $sr;?></td>
                                                    <td><?php echo $row->vehicle_no;?></td>
                                                    <td><?php echo ucwords($this->tadmin_model->getVehicleOwnerName($row->vehicle_owner_id));?></td>
                                                    <td><?php echo $row->fuel_limit;?></td>
                                                    <td style="text-align: left">
                                                        <a style="cursor:pointer" onclick="showAjaxModal('<?php echo base_url();?>Subadmin/popup/myadmin/viewVehicle/<?php echo $row->vehicle_id;?>');" class="table-link">
                                                        <span  class="fa-stack">
                                                        <i class="fa fa-square fa-stack-2x"></i>
                                                        <i class="ti-eye ti-eyes fa-stack-1x fa-inverse"></i>
                                                        </span>
                                                        </a>
                                                        
                                                        <a style="cursor:pointer" onclick="showAjaxModal('<?php echo base_url();?>Subadmin/popup/myadmin/editVehicle/<?php echo $row->vehicle_id;?>');" class="table-link">
                                                        <span  class="fa-stack">
                                                        <i class="fa fa-square fa-stack-2x"></i>
                                                        <i class="ti-pencil-alt ti-pencil-al fa-stack-1x fa-inverse"></i>
                                                        </span>
                                                        </a>
                                                        
                                                        <!--<a  href="<?php echo base_url(); ?>Subadmin/vehicles/delete/<?php echo $row->vehicle_id;?>" class="table-link danger">
                                                        <span class="fa-stack" onclick="return checkDelete();">
                                                        <i class="fa fa-square fa-stack-2x"></i>
                                                        <i class="ti-close ti-clos fa-stack-1x fa-inverse"></i>
                                                        </span>
                                                        </a>-->
                                                    </td>
                                                </tr>
                                                <?php $sr++; }?>    
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- /# card -->
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