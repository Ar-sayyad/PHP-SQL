<?php include 'header-top.php';?>
<style>
    .highcharts-credits{
        display: none;
    }
</style>
<body>
<?php $vendor_info = $this->db->get('tbl_vendor')->result_array();?>



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
                     <div class="row">
                        <div class="col-lg-12">
<!--                            <div class="addbtn">
                                <button class="btn btn-primary" >Add Subadmin</button>
                             </div>-->
                             <div class="card alert">
                                  <div class="bootstrap-data-table-panel">
                                    <div class="table-responsive">
                                        <form action="<?php echo base_url();?>Adminity" method="post">
                                        <div class="col-md-4">
                                                <div class="basic-form">
                                                    <div class="form-group">
                                                        <label>From</label>
                                                        <input type="date" name="fromdate" required="" class="form-control bg-ash">
                                                    </div>
                                                </div>
                                            </div>

                                             <div class="col-md-4">
                                                <div class="basic-form">
                                                    <div class="form-group">
                                                        <label>Vendor Name</label>
                                                      <select class="form-control etype" name="vendor_id" id="vendor_id" required="">
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

                  <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
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

<script>
Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'vendor Report'
    },
    subtitle: {
        text: '.'
    },
    xAxis: {
        type: 'category'
    },
    yAxis: {
        title: {
            text: 'Total percent market share'
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
                format: '{point.y:.1f}'
            }
        }
    },

    tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}</b> of total<br/>'
    },

    series: [{
        name: 'Month',
        colorByPoint: true,
        data: [{
            name: 'January',
            y: <?php echo $jan; ?>,
            drilldown: 'January'
        }, {
            name: 'February',
            y: <?php echo $feb; ?>,
            drilldown: 'February'
        }, {
            name: 'March',
            y: <?php echo $mar; ?>,
            drilldown: 'March'
        }, {
            name: 'April',
            y: <?php echo $apr; ?>,
            drilldown: 'April'
        }, {
            name: 'May',
            y: <?php echo $may; ?>,
            drilldown: 'May'
        }, {
            name: 'June',
            y:<?php echo $jun; ?>,
            drilldown: 'June'
        },{
            name: 'July',
            y: <?php echo $jul; ?>,
            drilldown: 'July'
        },{
            name: 'August',
            y: <?php echo $aug; ?>,
            drilldown: 'August'
        },
        {
            name: 'September',
            y: <?php echo $sep; ?>,
            drilldown: 'September'
        },
         {
            name: 'October',
            y: <?php echo $oct; ?>,
            drilldown: 'October'
        },
         {
            name: 'November',
            y: <?php echo $nov; ?>,
            drilldown: 'November'
        },
         {
            name: 'December',
            y: <?php echo $dec; ?>,
            drilldown: 'December'
        }]
    }],
    drilldown: {
        series: [<?php echo $maain;?>]
    }
});


 
</script>

     <!-- # footer -->
    <?php include 'footer.php';?>
    <!-- /# footer -->
    <script src="<?php echo base_url();?>mypanel/assets/js/lib/chart-js/Chart.bundle.js"></script>
    <script src="<?php echo base_url();?>mypanel/assets/js/lib/chart-js/chartjs-init.js"></script>


     <script src="<?php echo base_url();?>mypanel/assets/js/lib/calendar-2/moment.latest.min.js"></script>
    <!-- scripit init-->
    <script src="<?php echo base_url();?>mypanel/assets/js/lib/calendar-2/semantic.ui.min.js"></script>
    <!-- scripit init-->
    <script src="<?php echo base_url();?>mypanel/assets/js/lib/calendar-2/prism.min.js"></script>
    <!-- scripit init-->
    <script src="<?php echo base_url();?>mypanel/assets/js/lib/calendar-2/pignose.calendar.min.js"></script>
    <!-- scripit init-->
    <script src="<?php echo base_url();?>mypanel/assets/js/lib/calendar-2/pignose.init.js"></script>

</body>


</html>