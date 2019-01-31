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

                <!---/page-title--->
                               
                <section id="main-content">
                    <div class="row">                       
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="stat-widget-eight">
                                    <div class="stat-header">
                                        <div class="header-title pull-left">Current Fuel Rate</div>
                                        
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="stat-content">
                                        <div class="pull-left">
                                            <i style="font-size:40px" class="fa fa-inr color-success"></i>
                                           
                                               <span class="stat-digit">
                                                <?php  $vendor_id = $this->session->userdata('log_admin_id');
                                                $this->db->where('vendor_id',$vendor_id);
                                               $rate= $this->db->get('tbl_vendor')->row()->todays_rate;
                                                  ?>
                                                   <a style="cursor:pointer" onclick="showAjaxModal('<?php echo base_url();?>Vendor/popup/vendors/editVendorRate/<?php echo $vendor_id;?>');"><?php echo $rate;?></a>
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
                                        <div class="header-title pull-left">Total Fillers</div>
                                        
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="stat-content">
                                        <div class="pull-left">
                                            <i style="font-size:40px" class="ti-user color-success"></i>
                                            <span class="stat-digit">
                                                <?php $vendor_id = $this->session->userdata('log_admin_id');
                                                $this->db->where('vendor_id',$vendor_id);
                                                $this->db->from('filler_boy');
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
                                                <?php
                                                $vendor_id = $this->session->userdata('log_admin_id');
                                                $this->db->where('vendor_id',$vendor_id);
                                                $this->db->where('status',0);
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
                                                $vendor_id = $this->session->userdata('log_admin_id');
                                                $this->db->where('vendor_id',$vendor_id);
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


     <!-- # footer -->
    <?php include 'footer.php';?>
    <!-- /# footer -->
<!--    <script src="<?php echo base_url();?>mypanel/assets/js/lib/chart-js/Chart.bundle.js"></script>
    <script src="<?php echo base_url();?>mypanel/assets/js/lib/chart-js/chartjs-init.js"></script>-->
</body>


</html>