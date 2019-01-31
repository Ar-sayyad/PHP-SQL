<div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
        <div class="nano">
            <div class="nano-content">
                <ul>
                     <li class="label">Dashboard</li>
                     <?php if($page_title=='Dashboard'){?>
                    <li class="active">
                    <?php } else { ?><li> <?php }?>
                        <a href="<?php echo base_url();?>" class="">
                            <i class="ti-home"></i> Dashboard </a>
                       
                    </li>
                    
                     <li class="label">Basic</li>
                     <?php if($page_title=='Vehicle Owner' || $page_title=='Vehicles' || $page_title=='Drivers' || $page_title=='Fuel Pumps' || $page_title=='Supervisors' || $page_title=='Subadmin'){?>
                            <li class="active open">
                            <?php } else { ?><li> <?php }?>
                        <a class="sidebar-sub-toggle"><i class="ti-plus"></i>Basic Entries<span class="badge badge-primary">4</span><span class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                             <?php if($page_title=='Vehicle Owner'){?>
                            <li class="active">
                            <?php } else { ?><li> <?php }?>
                                <a href="<?php echo base_url();?>Subadmin/vehicleOwners"><i class="ti-user"></i>Vehicle Owners</a>
                            </li>
                            <?php if($page_title=='Vehicles'){?>
                            <li class="active">
                            <?php } else { ?><li> <?php }?>
                                <a href="<?php echo base_url();?>Subadmin/vehicles"><i class="ti-truck"></i>Vehicles</a>
                            </li>
                            <?php if($page_title=='Drivers'){?>
                            <li class="active">
                            <?php } else { ?><li> <?php }?>
                                <a href="<?php echo base_url();?>Subadmin/drivers"><i class="ti-wheelchair"></i>Drivers</a>
                            </li> 
                            <!--<?php if($page_title=='Fuel Pumps'){?>
                            <li class="active">
                            <?php } else { ?><li> <?php }?>
                                <a href="<?php echo base_url();?>Subadmin/vendors"><i class="ti-layout-tab-v"></i>Fuel Pumps</a>
                            </li>-->
                            <?php if($page_title=='Supervisors'){?>
                            <li class="active">
                            <?php } else { ?><li> <?php }?>
                                <a href="<?php echo base_url();?>Subadmin/supervisors"><i class="fa fa-user-circle"></i>Supervisors</a>
                            </li>
<!--                             <?php if($page_title=='Subadmin'){?>
                            <li class="active">
                            <?php } else { ?><li> <?php }?>
                                <a href="<?php echo base_url();?>Subadmin/subadmin"><i class="fa fa-user-secret"></i>Subadmin</a></li>-->
                        </ul>
                    </li>
                    
                     <li class="label">Assignment</li>
                    <?php if($page_title=='Assigned Driver to Vehicle'){?>
                            <li class="active">
                            <?php } else { ?><li> <?php }?>
                        <a href="<?php echo base_url();?>Subadmin/assignedDrivers" class="">
                            <i class="ti-direction-alt"></i> Assign Driver to Vehicle</a>
                            <ul>
                                <li>
                                    <a href="<?php echo base_url();?>Subadmin/assignedDrivers"><i class="ti-direction-alt"></i>Assign Driver to Vehicle</a>
                                </li>
                            </ul>
                    </li>
                                        
                      <?php if($page_title=='Assigned Vehicles to Fuel'){?>
                            <li class="active">
                            <?php } else { ?><li> <?php }?>
                        <a href="<?php echo base_url();?>Subadmin/vehiclestoFuel" class="">
                            <i class="ti-truck"></i> Assigned Vehicles to Fuel</a>
                            <ul>
                                <li>
                                    <a href="<?php echo base_url();?>Subadmin/vehiclestoFuel"><i class="ti-truck"></i> Assigned Vehicles to Fuel</a>
                                </li>
                            </ul>
                    </li>
                <!--      <?php if($page_title=='Fuel Receipts'){?>
                           <li class="active">
                            <?php } else { ?><li> <?php }?>
                        <a href="<?php echo base_url();?>Subadmin/fuelReceipts" class="">
                            <i class="ti-receipt"></i> Fuel Receipts</a>
                            <ul>
                                <li>
                                    <a href="<?php echo base_url();?>Subadmin/fuelReceipts"><i class="ti-receipt"></i> Fuel Receipts</a>
                                </li>
                            </ul>
                    </li>
                    
               <li class="label">Reports</li>
                    
                     <?php if($page_title=='Fuel Receipts By Date'){?>
                            <li class="active">
                            <?php } else { ?><li> <?php }?>
                        <a href="<?php echo base_url();?>Subadmin/fuelReceiptByDate" class="">
                            <i class="ti-calendar"></i> Fuel Receipts By Date</a>
                            <ul>
                                <li>
                                    <a href="<?php echo base_url();?>Subadmin/fuelReceiptByDate"><i class="ti-calendar"></i> Fuel Receipts By Date</a>
                                </li>
                            </ul>
                    </li>
                    -->
                                       
                     <li class="label">My Profile</li>
                      <?php if($page_title=='Profile Setting'){?>
                            <li class="active">
                            <?php } else { ?><li> <?php }?>
                        <a href="<?php echo base_url();?>Subadmin/profile" class="">
                            <i class="ti-settings"></i> Profile Setting</a>
                            <ul>
                                <li>
                                    <a href="<?php echo base_url();?>Subadmin/profile"><i class="ti-settings"></i> Profile Setting</a>
                                </li>
                            </ul>
                    </li>
                   
                    <li><a href="<?php echo base_url();?>Subadmin/logout"><i class="ti-power-off"></i> Logout</a></li>
                </ul>
            </div>
        </div>
    </div>