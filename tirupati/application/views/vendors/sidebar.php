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
                     <?php if($page_title=='Fuel Fillers'){?>
                            <li class="active">
                            <?php } else { ?><li> <?php }?>
                                <a href="<?php echo base_url();?>Vendor/fuelFillers"><i class="ti-user"></i>Fuel Fillers</a>
                            </li>
                     <li class="label">Assignment</li>
<!--                    <?php if($page_title=='Assigned Driver to Vehicle'){?>
                            <li class="active">
                            <?php } else { ?><li> <?php }?>
                        <a href="<?php echo base_url();?>Vendor/assignedDrivers" class="">
                            <i class="ti-direction-alt"></i> Assign Driver to Vehicle</a>
                            <ul>
                                <li>
                                    <a href="<?php echo base_url();?>Vendor/assignedDrivers"><i class="ti-direction-alt"></i>Assign Driver to Vehicle</a>
                                </li>
                            </ul>
                    </li>-->
                                        
                      <?php if($page_title=='Assigned Vehicles to Fuel'){?>
                            <li class="active">
                            <?php } else { ?><li> <?php }?>
                        <a href="<?php echo base_url();?>Vendor/vehiclestoFuel" class="">
                            <i class="ti-truck"></i> Assigned Vehicles to Fuel</a>
                            <ul>
                                <li>
                                    <a href="<?php echo base_url();?>Vendor/vehiclestoFuel"><i class="ti-truck"></i> Assigned Vehicles to Fuel</a>
                                </li>
                            </ul>
                    </li>
                      <?php if($page_title=='Fuel Receipts'){?>
                           <li class="active">
                            <?php } else { ?><li> <?php }?>
                        <a href="<?php echo base_url();?>Vendor/fuelReceipts" class="">
                            <i class="ti-receipt"></i> Fuel Receipts</a>
                            <ul>
                                <li>
                                    <a href="<?php echo base_url();?>Vendor/fuelReceipts"><i class="ti-receipt"></i> Fuel Receipts</a>
                                </li>
                            </ul>
                    </li>
                    
               <li class="label">Reports</li>
                    
                     <?php if($page_title=='Fuel Receipts By Date'){?>
                            <li class="active">
                            <?php } else { ?><li> <?php }?>
                        <a href="<?php echo base_url();?>Vendor/fuelReceiptByDate" class="">
                            <i class="ti-calendar"></i> Fuel Receipts By Date</a>
                            <ul>
                                <li>
                                    <a href="<?php echo base_url();?>Vendor/fuelReceiptByDate"><i class="ti-calendar"></i> Fuel Receipts By Date</a>
                                </li>
                            </ul>
                    </li>
                    
                                       
                     <li class="label">My Profile</li>
                      <?php if($page_title=='Profile Setting'){?>
                            <li class="active">
                            <?php } else { ?><li> <?php }?>
                        <a href="<?php echo base_url();?>Vendor/profile" class="">
                            <i class="ti-settings"></i> Profile Setting</a>
                            <ul>
                                <li>
                                    <a href="<?php echo base_url();?>Vendor/profile"><i class="ti-settings"></i> Profile Setting</a>
                                </li>
                            </ul>
                    </li>
                   
                    <li><a href="<?php echo base_url();?>Vendor/logout"><i class="ti-power-off"></i> Logout</a></li>
                </ul>
            </div>
        </div>
    </div>