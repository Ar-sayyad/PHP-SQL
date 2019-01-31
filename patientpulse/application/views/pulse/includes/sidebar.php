<aside id="app_sidebar-left">
			<nav id="app_main-menu-wrapper" class="scrollbar">
				<div class="sidebar-inner sidebar-push">
					<div class="card profile-menu" id="profile-menu">
						<header class="card-heading card-img alt-heading">
							<div class="profile">
								<header class="card-heading card-background" id="card_img_02">
									<img src="<?php echo base_url();?>Theme/assets/img/profiles/18.jpg" alt="" class="img-circle max-w-75 mCS_img_loaded">
								</header>
								<a href="javascript:void(0)" class="info" ><span>Admin</span></a>
							</div>
						</header>
						
					</div>
					<ul class="nav nav-pills nav-stacked">
						<li class="sidebar-header">NAVIGATION</li>
						<?php if($title=='Dashboard'){?><li class="active"><?php }else{ ?><li><?php } ?>
                                                    <a href="<?php echo base_url();?>"><i class="zmdi zmdi-view-dashboard"></i> Dashboard</a>
                                                </li>
                                                <?php if($title=='Hospitals' || $title=='Hospital Users' || $title=='Hospital Excel Upload'){?>
                                                <li class="nav-dropdown active open">
                                                <?php }else{ ?>
                                                  <li class="nav-dropdown">
                                                <?php } ?>						
                                                    <a href="#"><i class="zmdi zmdi-hospital-alt"></i>Hospital Master</a>
							<ul class="nav-sub">
								<?php if($title=='Hospitals'){?><li class="active"><?php }else{ ?><li><?php } ?>
                                                                    <a href="<?php echo base_url();?>Hospitals"><i class="zmdi zmdi-hospital"></i> Hospitals</a></li>
								<?php if($title=='Hospital Users'){?><li class="active"><?php }else{ ?><li><?php } ?>
                                                                    <a href="<?php echo base_url();?>Hospitals/Access"><i class="zmdi zmdi-account-box"></i> Hospital Users</a></li>
                                                                <?php if($title=='Hospital Excel Upload'){?><li class="active"><?php }else{ ?><li><?php } ?>
                                                                    <a href="<?php echo base_url();?>Hospitals/DataUpload"><i class="zmdi zmdi-cloud-upload"></i> Excel Upload</a></li>
							</ul>
						</li>
                                                <?php if($title=='Data Operators' || $title=='Data Flow' || $title=='Operator Excel Upload'){?>
                                                <li class="nav-dropdown active open">
                                                <?php }else{ ?>
                                                  <li class="nav-dropdown">
                                                <?php } ?>	
                                                    <a href="#"><i class="zmdi zmdi-accounts-add"></i>Data Operators</a>
							<ul class="nav-sub">
<!--                                                                <?php if($title=='Dashboard'){?><li class="active"><?php }else{ ?><li><?php } ?>
                                                                    <a href="<?php echo base_url();?>Operators/Roles"><i class="zmdi zmdi-account-box-phone"></i> Roles</a></li>-->
								<?php if($title=='Data Operators'){?><li class="active"><?php }else{ ?><li><?php } ?>
                                                                    <a href="<?php echo base_url();?>Operators"><i class="zmdi zmdi-account-box"></i> Data Operators</a></li>
								<?php if($title=='Data Flow'){?><li class="active"><?php }else{ ?><li><?php } ?>
                                                                    <a href="<?php echo base_url();?>Operators/Dataflow"><i class="zmdi zmdi-swap"></i> Data Flow</a></li>
<!--                                                                <?php if($title=='Operator Excel Upload'){?><li class="active"><?php }else{ ?><li><?php } ?>
                                                                    <a href="<?php echo base_url();?>Operators/DataUpload"><i class="zmdi zmdi-cloud-upload"></i> Excel Upload</a></li>-->
							</ul>
						</li>
                                                
                                              <?php if($title=='Categories' || $title=='Questionnaires' || $title=='Questionnaires Excel Upload'){?>
                                                <li class="nav-dropdown active open">
                                                <?php }else{ ?>
                                                  <li class="nav-dropdown">
                                                <?php } ?>	
                                                    <a href="#"><i class="zmdi zmdi-help-outline"></i>Questionnaires</a>
							<ul class="nav-sub">
								<?php if($title=='Categories'){?><li class="active"><?php }else{ ?><li><?php } ?>
                                                                    <a href="<?php echo base_url();?>Questionnaires/category"><i class="zmdi zmdi-menu"></i> Categories</a></li>
                                                                <?php if($title=='Questionnaires'){?><li class="active"><?php }else{ ?><li><?php } ?>
                                                                    <a href="<?php echo base_url();?>Questionnaires"><i class="zmdi zmdi-help"></i> Questionnaires </a></li>
                                                                <?php if($title=='Questionnaires Excel Upload'){?><li class="active"><?php }else{ ?><li><?php } ?>
                                                                    <a href="<?php echo base_url();?>Questionnaires/DataUpload"><i class="zmdi zmdi-cloud-upload"></i> Excel Upload</a></li>
							</ul>
						</li>
                                                
                                                  <?php if($title=='Demographics' || $title=='NPS Score' || $title=='Data Cuts' || $title=='Trends' || $title=='Comparison'){?>
                                                <li class="nav-dropdown active open">
                                                <?php }else{ ?>
                                                  <li class="nav-dropdown">
                                                <?php } ?>
                                                    <a href="#"><i class="zmdi zmdi-chart"></i> Analytics Section</a>
                                                    <ul class="nav-sub">
                                                       <?php if($title=='Demographics'){?><li class="active"><?php }else{ ?><li><?php } ?>
                                                           <a href="<?php echo base_url();?>Analytics/Demographics"><i class="zmdi zmdi-accounts-alt"></i> Demographics</a></li>
                                                        <?php if($title=='NPS Score'){?><li class="active"><?php }else{ ?><li><?php } ?>
                                                            <a href="<?php echo base_url();?>Analytics/NpsScore"><i class="zmdi zmdi-format-list-numbered"></i> NPS Score</a></li>
                                                        <?php if($title=='Data Cuts'){?><li class="active"><?php }else{ ?><li><?php } ?>
                                                            <a href="<?php echo base_url();?>Analytics/DataCuts"><i class="zmdi zmdi-keyboard"></i> Data Cuts</a></li>
                                                        <?php if($title=='Trends'){?><li class="active"><?php }else{ ?><li><?php } ?>
                                                            <a href="<?php echo base_url();?>Analytics/Trends"><i class="zmdi zmdi-trending-up"></i> Trends</a></li>
                                                        <?php if($title=='Comparison'){?><li class="active"><?php }else{ ?><li><?php } ?>
                                                            <a href="<?php echo base_url();?>Analytics/Comparison"><i class="zmdi zmdi-chart"></i> Comparison</a></li>
                                                    </ul>
						</li>
                                                
                                                <li class="nav-dropdown">
                                                    <a href="#"><i class="zmdi zmdi-receipt"></i> Reports Section</a>
							<ul class="nav-sub">
                                                                <li><a href="<?php echo base_url();?>Reports/HospitalReport"><i class="zmdi zmdi-file-text"></i> Trending Hospital Reports</a></li>
								<li><a href="<?php echo base_url();?>Reports/monthlyTrendReport"><i class="zmdi zmdi-file-text"></i> Monthly Trend Reports</a></li>
                                                                <li><a href="<?php echo base_url();?>Reports/scoreonDimensions"><i class="zmdi zmdi-file-text"></i> Stakeholder Dimensions Score</a></li>
                                                                <li><a href="<?php echo base_url();?>Reports/NpsTrendScore"><i class="zmdi zmdi-receipt"></i> NPS Trend Score</a></li>
                                                                <li><a href="<?php echo base_url();?>Reports/topDriversNps"><i class="zmdi zmdi-receipt"></i> Top Drivers of NPS</a></li>
                                                                <li><a href="<?php echo base_url();?>Reports/DemographicsReports"><i class="zmdi zmdi-receipt"></i> Demographics Reports</a></li>
                                                                <li><a href="<?php echo base_url();?>Reports/DataCutsReports"><i class="zmdi zmdi-receipt"></i> Data Cuts Reports</a></li>
                                                                <li><a href="<?php echo base_url();?>Reports/Questionnaires"><i class="zmdi zmdi-receipt"></i> Questionnaires Detail Score</a></li>
                                                                <li><a href="<?php echo base_url();?>Reports/LowestAvgQuestions"><i class="zmdi zmdi-receipt"></i> Lowest Average Score Questions</a></li>
                                                                <li><a href="<?php echo base_url();?>Reports/HighestAvgQuestions"><i class="zmdi zmdi-receipt"></i> Highest Average Score Questions</a></li>
							</ul>
						</li>
                                                
                                                <li class="nav-dropdown">
                                                    <a href="#"><i class="zmdi zmdi-accounts-list-alt"></i> Profile Settings</a>
							<ul class="nav-sub">
								<li><a href="<?php echo base_url();?>Profile/Profile"><i class="zmdi zmdi-account"></i> My Profile</a></li>
                                                                <li><a href="<?php echo base_url();?>Profile/Messages"><i class="zmdi zmdi-email"></i> Messages</a></li>
                                                                <li><a href="<?php echo base_url();?>Profile/Settings"><i class="zmdi zmdi-settings"></i> Account Settings</a></li>                                                                
							</ul>
						</li>
                                                 <li><a href="<?php echo base_url();?>Home/Logout"><i class="zmdi zmdi-sign-in"></i> Sign Out</a></li>               
						</ul>
					</div>
				</nav>
			</aside>

<?php include 'modal.php';?>