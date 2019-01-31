<?php include 'modal.php';?>
<!--<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>-->


<div class="header">
        <div class="pull-left">
            <div class="logo"><a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>mypanel/assets/img/logo.png" alt="Tirupati Travels" /></a></div>
            <div class="hamburger sidebar-toggle">
                <span class="line"></span>
                <span class="line"></span>
                <span class="line"></span>
            </div>
        </div>
        <div class="pull-right p-r-15">
            <ul>
<!--                <li class="header-icon dib"><i class="fa fa-inr"></i>
                    <div class="drop-down"  style="height: 500px;overflow: scroll;">
                        <div class="dropdown-content-heading">
                            <span class="text-left">Todays Fuel Rate(<i class='fa fa-inr'></i>)</span>
                        </div>
                        <div class="dropdown-content-body">
                            <ul>
                                <?php $vendors = $this->db->get('tbl_vendor')->result_array();
                                    foreach($vendors as $vend){
                                        if(!empty($vend['profile_pic'])){
                                            $pro_img =  base_url().'assets/uploads/vendors/'.$vend['profile_pic'];
                                        }else{
                                             $pro_img =  base_url().'mypanel/assets/images/avatar/3.jpg';
                                        }
                                        
                                ?>
                                <li> 
                                    <a href="#">
                                        
                                        <img class="pull-left m-r-10 avatar-img" src="<?php echo $pro_img;?>" alt="" />
                                        <div class="notification-content">
                                            <small class="notification-timestamp pull-right"><?php echo $vend['rate_date'];?></small>
                                            <div class="notification-heading"><?php echo $vend['vendor_name'];?></div>
                                            <div class="notification-heading">
                                                <span> <i class="fa fa-inr"></i><?php echo $vend['todays_rate'];?></span>                                               
                                            </div>
                                            <div class="notification-text" style="float:right">
                                                <button class="btn editbtn btn-info" onclick="showAjaxModal('<?php echo base_url();?>Vendor/popup/myadmin/editVendorRate/<?php echo $vend['vendor_id'];?>');" id="edit_rate<?php echo $vend['vendor_id'];?>">Edit Rate
                                                </button>
                                            </div>
                                            <div class="notification-text" ><?php echo $vend['vendor_contact'];?></div>
                                            
                                        </div>
                                    </a>
                                </li>
                                    <?php } ?>
                               
                            </ul>
                        </div>
                    </div>
                </li>-->
                
                <li class="header-icon dib">
                    <img class="avatar-img" src="<?php echo base_url();?>assets/uploads/vendors/<?php echo $this->session->userdata('log_image');?>" alt="" /> 
                    <span class="user-avatar"><?php echo $this->session->userdata('log_admin_name');?> <i class="ti-angle-down f-s-10"></i></span>
                    <div class="drop-down dropdown-profile">                        
                        <div class="dropdown-content-body">
                            <ul>
                                <li><a href="<?php echo base_url();?>Vendor/profile"><i class="ti-user"></i> <span>Profile</span></a></li>
                                <li><a href="<?php echo base_url();?>Vendor/profile"><i class="ti-settings"></i> <span>Setting</span></a></li>
                                <li><a href="<?php echo base_url();?>Vendor/logout"><i class="ti-power-off"></i> <span>Logout</span></a></li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>