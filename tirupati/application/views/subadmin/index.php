<?php include 'header-top.php';?>
<style>
    .highcharts-credits{
        display: none;
    }
</style>
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

                  <div id="containerr" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                <!---/page-title--->
                               
                <section id="main-content">
                    <div class="row">                       
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="stat-widget-eight">
                                    <div class="stat-header">
                                        <div class="header-title pull-left">Total Supervisors</div>
                                        
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="stat-content">
                                        <div class="pull-left">
                                            <i style="font-size:40px" class="fa fa-user-circle color-success"></i>
                                            <span class="stat-digit">
                                                <?php  $this->db->from('tbl_supervisor');
                                                      echo $this->db->count_all_results(); ?>
                                            </span>
                                        </div>
                                        
                                    </div>
                                    <div class="clearfix"></div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="stat-widget-eight">
                                    <div class="stat-header">
                                        <div class="header-title pull-left">Total Vendors</div>
                                        
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="stat-content">
                                        <div class="pull-left">
                                            <i style="font-size:40px" class="fa fa-users color-success"></i>
                                            <span class="stat-digit">
                                                <?php  $this->db->from('tbl_vendor');
                                                      echo $this->db->count_all_results(); ?>
                                               </span>
                                        </div>
                                        
                                    </div>
                                    <div class="clearfix"></div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="stat-widget-eight">
                                    <div class="stat-header">
                                        <div class="header-title pull-left">Total Drivers</div>
                                        
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="stat-content">
                                        <div class="pull-left">
                                            <i style="font-size:40px" class="ti-wheelchair color-success"></i>
                                            <span class="stat-digit"> 
                                                <?php  $this->db->from('tbl_driver');
                                                      echo $this->db->count_all_results(); ?>
                                            </span>
                                        </div>
                                        
                                    </div>
                                    <div class="clearfix"></div>
                                   
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="stat-widget-eight">
                                    <div class="stat-header">
                                        <div class="header-title pull-left">Total Vehicles</div>
                                        
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="stat-content">
                                        <div class="pull-left">
                                            <i style="font-size:40px" class="ti-truck color-success"></i>
                                            <span class="stat-digit"> 
                                                <?php  $this->db->from('tbl_vehicle');
                                                      echo $this->db->count_all_results(); ?>
                                            </span>
                                        </div>
                                       
                                    </div>
                                    <div class="clearfix"></div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="stat-widget-eight">
                                    <div class="stat-header">
                                        <div class="header-title pull-left">Vehicle Owners</div>
                                        
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="stat-content">
                                        <div class="pull-left">
                                            <i style="font-size:40px" class="ti-user color-success"></i>
                                            <span class="stat-digit"> 
                                                <?php  $this->db->from('vehicle_owner');
                                                      echo $this->db->count_all_results(); ?>
                                            </span>
                                        </div>
                                        
                                    </div>
                                    <div class="clearfix"></div>
                                   
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="stat-widget-eight">
                                    <div class="stat-header">
                                        <div class="header-title pull-left">Subadmin</div>
                                        
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="stat-content">
                                        <div class="pull-left">
                                            <i style="font-size:40px" class="fa fa-user-secret color-success"></i>
                                            <span class="stat-digit"> 
                                                <?php  $this->db->from('tbl_subadmin');
                                                      echo $this->db->count_all_results(); ?>
                                            </span>

                                        </div>
                                        
                                    </div>
                                    <div class="clearfix"></div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="stat-widget-eight">
                                    <div class="stat-header">
                                        <div class="header-title pull-left">Vehicles for Fuel</div>
                                        
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="stat-content">
                                        <div class="pull-left">
                                             <i style="font-size:40px" class="ti-truck color-success"></i>
                                            <span class="stat-digit"> 
                                                <?php $this->db->where('status',0);
                                                $this->db->from('fuel_mgt');
                                                      echo $this->db->count_all_results(); ?>
                                            </span>
                                        </div>
                                       
                                    </div>
                                    <div class="clearfix"></div>
                                   
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="stat-widget-eight">
                                    <div class="stat-header">
                                        <div class="header-title pull-left">Fuel Receipts</div>
                                        
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="stat-content">
                                        <div class="pull-left">
                                            <i style="font-size:40px" class="ti-receipt color-success"></i>
                                            <span class="stat-digit"> 
                                                <?php //$this->db->where('status',0);
                                                $this->db->from('fuel_receipt');
                                                      echo $this->db->count_all_results(); ?>
                                            </span>
                                        </div>
                                       
                                    </div>
                                    <div class="clearfix"></div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                  
                    
                 
                  
                    <!-- /# row -->
                    <!--FOOTER CONTENTS--->
                     <?php include 'footer-contents.php';?>
                    <!---/FOOTER CONTENTS-->
                </section>
            </div>
        </div>
    </div>

  

<script>
Highcharts.chart('containerr', {
    chart: {
        type: 'column'
    },
    title: {
        text: ''
    },
    subtitle: {
        text: 'Todays Sale By Vendor.'
    },
    xAxis: {
        type: 'category'
    },
    yAxis: {
        title: {
            text: 'Todays  Fuel Cost'
        }

    },
    legend: {
        enabled: false
    },
    plotOptions: {
        series: {
            borderWidth: 0,
            dataLabels: {
                enabled: true,
                format: 'Rs.{point.y:.1f}'
            }
        }
    },

    tooltip: {
        pointFormat: '<span style="color:{point.color}">Todays Sale of {point.name} Rs:</span><b>{point.y:.2f}</b><br/>'
    },

    series: [{
        name: 'Vendor',
        colorByPoint: true,

        data:  [ <?php echo $maainseries;?> ]
    }],
    
});
</script>

     <!-- # footer -->
    <?php include 'footer.php';?>
    <!-- /# footer -->
    <script src="<?php echo base_url();?>mypanel/assets/js/lib/chart-js/Chart.bundle.js"></script>
    <script src="<?php echo base_url();?>mypanel/assets/js/lib/chart-js/chartjs-init.js"></script>
</body>


</html>