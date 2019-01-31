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
<!--                            <div class="addbtn">
                                <button class="btn btn-primary" >Add Subadmin</button>
                             </div>-->
                             <div class="card alert">
                                  <div class="bootstrap-data-table-panel">
                                    <div class="table-responsive">
                                        <form action="<?php echo base_url();?>Vendor/filterfuelReceiptByDate" method="post">
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
                                        <div class="col-md-4" style="margin-top: 29px;">
                                                <div class="basic-form">
                                                    <div class="form-group">
                                                        <label>&nbsp;</label>
                                                        <button type="submit" class="btn btn-info btn-search">Search</button>
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
</body>


</html>