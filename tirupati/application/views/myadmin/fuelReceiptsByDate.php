<?php include 'header-top.php';?>

<body>

    <!-- # sidebar -->
    <?php include 'sidebar.php';?>
    <!-- /# sidebar -->

<head>
    <style type="text/css">
        .table-responsive {
    min-height: 500px;
     overflow-x: none; 
}
btn-search {
    width: 50%;
    padding: 7px;
    font-size: 19px;
    margin-top: -43px!important;
}
    </style>
</head>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />
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
                    <?php $vendor_info = $this->db->get('tbl_vendor')->result_array();?>
    <?php $vehicle_info = $this->db->get('tbl_vehicle')->result_array();?>
                    <div class="row">
                        <div class="col-lg-20">
<!--                            <div class="addbtn">
                                <button class="btn btn-primary" >Add Subadmin</button>
                             </div>-->
                             <div class="card alert">
                                  <div class="bootstrap-data-table-panel">
                                    <div class="table-responsive">
                                        <form action="<?php echo base_url();?>Adminity/filterfuelReceiptByDate" method="post">
                                        <div class="col-md-4">
                                                <div class="basic-form">
                                                    <div class="form-group">
                                                        <label>From</label>
                                                        <input type="text" name="fromdate" required="" class="form-control calendar bg-ash" placeholder="dd/mm/yyyy" id="text-calendar">
                                                        <span class="ti-calendar form-control-feedback booking-system-feedback m-t-30"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        
                                        <div class="col-md-4">
                                                <div class="basic-form">
                                                    <div class="form-group">
                                                        <label>To</label>
                                                        <input type="text" name="todate" required="" class="form-control calendar bg-ash" placeholder="dd/mm/yyyy" id="text-calendar">
                                                        <span class="ti-calendar form-control-feedback booking-system-feedback m-t-30"></span>
                                                    </div>
                                                </div>
                                            </div>

                                             <div class="col-md-4">
                                                <div class="basic-form">
                                                    <div class="form-group">
                                                        <label>Vendor Name</label>
                                                      <select class="form-control etype" name="vendor" id="vendor_id">
                                                    <option value=""> ---Select Vendor--- </option>
                                                    <?php
                                                    foreach($vendor_info as $drv)
                                                    {
                                                     
                                                       
                                                        ?>
                                                     <option value="<?php echo $drv['vendor_id'];?>"><?php echo $drv['vendor_name'].' - ['.$drv['vendor_contact'].']';?></option>
                                                    <?php 
                                                    }
                                                    ?>
                                                </select> 
                                                    </div>
                                                </div>
                                            </div>


                                           


                                             <div class="col-md-4">
                                                <div class="basic-form">
                                                    <div class="form-group">
                                                        <label>Vehicle Name</label>
                                                      <select  class="selectpicker" data-show-subtext="true" data-live-search="true" name="vehicle_no" id="vehicle_no">
                                                <option value=""> ---Select Vehicle--- </option>
                                                    <?php
                                                    foreach($vehicle_info as $vehicle)
                                                    {
                                                     
                                                       
                                                        ?>
                                                     <option value="<?php echo $vehicle['vehicle_id'];?>"><?php echo $vehicle['vehicle_no'];?></option>
                                                    <?php 
                                                    }
                                                    ?>
                                                </select>


                                                   
                                                    </div>
                                                </div>
                                            </div>
                                        <div class="col-md-4" style="margin-top: 29px;">
                                                <div class="basic-form">
                                                    <div class="form-group">
                                                        <label>&nbsp;</label>
                                                        <button type="submit" class="btn btn-info btn-search" style=" margin-top: -43px!important;">Search</button>
                                                    </div>
                                                </div>
                                        </div>
                                            </form>
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
    
     <script src="<?php echo base_url();?>mypanel/assets/js/lib/calendar-2/moment.latest.min.js"></script>
    <!-- scripit init-->
    <script src="<?php echo base_url();?>mypanel/assets/js/lib/calendar-2/semantic.ui.min.js"></script>
    <!-- scripit init-->
    <script src="<?php echo base_url();?>mypanel/assets/js/lib/calendar-2/prism.min.js"></script>
    <!-- scripit init-->
    <script src="<?php echo base_url();?>mypanel/assets/js/lib/calendar-2/pignose.calendar.min.js"></script>
    <!-- scripit init-->
    <script src="<?php echo base_url();?>mypanel/assets/js/lib/calendar-2/pignose.init.js"></script>

     <script>
       $(document).ready(function() {
           function hidetab(){    
            $('#mssg').hide();
          }
            setTimeout(hidetab,4000);
       });
    </script>

   
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>
</body>


</html>