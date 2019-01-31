<?php include 'header-top.php';?>

<body>
<?php $vendor_info = $this->db->get('tbl_vendor')->result_array();?>
<?php $vehicle_info = $this->db->get('tbl_vehicle')->result_array();?>
    <!-- # sidebar -->
    <?php include 'sidebar.php';?>
    <!-- /# sidebar -->


    <!-- # header -->
    <?php include 'header.php';?>
    <!-- /# header -->
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
                                                      <select  name="vehicle_no" id="vehicle_no" class="selectpicker" data-show-subtext="true" data-live-search="true">
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
                                      <b> <span> Total Entries: <?php echo $count;?> </span></b>
                                        
                                            </form>
                                        
                                        <table class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>SR.</th>
                                                   <!--  <th>Fuel Pump Info.</th> -->
                                                    <th>Vehicle No.</th>
                                                  <!--   <th>Driver Info.</th>
                                                    <th>Supervisor Info.</th> -->
                                                    <th>Cost(<i class="fa fa-inr"></i>)</th>
                                                   <!--   <th>Fuel Qty(Ltr.)</th> -->
                                                    <th>Uploaded Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $sr=1; $cnt=0; foreach($fuel_Receipt_info as $row){?>
                                                <tr>
                                                    <td><?php echo $sr;?></td>
                                                 <!--    <td><?php echo $row->vendor_name;?><br>
                                                        <?php echo $row->vendor_contact;?></td> -->
                                                    <td><?php echo $row->vehicle_no;?></td>
                                                  <!--   <td><?php echo $row->driver_name;?><br>
                                                        <?php echo $row->driver_contact;?></td> -->
                                                   <!--  <td><?php echo $row->supervisor_name;?><br>
                                                        <?php echo $row->supervisor_contact;?></td> -->
                                                    <td><?php echo number_format($row->filled_cost,2);?></td>
                                                  <!--   <td><?php  $row->fuel_limit;?></td> -->
                                                    <td><?php echo $row->createdAt;?></td>
                                                    
                                                </tr>
                                                <?php $sr++; 
                                                 $cnt= $cnt+$row->filled_cost;
                                                $fuel_cnt = $fuel_cnt+$row->fuel_limit;
                                                }?>    
                                                 <thead>
                                                <tr>
                                                    <th colspan="1">
                                                        Total Entries : <?php echo $sr-1;?>
                                                    </th>
                                                    <th colspan="1" style="">
                                                        Totals:
                                                    </th>
                                                    <th>
                                                        <i class="fa fa-inr"></i><?php echo number_format($cnt,2);?>
                                                    </th>
                                                    
                                                     <th>
                                                        &nbsp;
                                                    </th>
                                                </tr>
                                                </thead>
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
  <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js">
</script>
</body>


</html>