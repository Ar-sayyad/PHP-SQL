<header id="app_topnavbar-wrapper">
			<nav role="navigation" class="navbar topnavbar">
				<div class="nav-wrapper">
					<div id="logo_wrapper" class="nav navbar-nav">
						<ul>
                                                    <li class="logo-icon">
								<a href="<?php echo base_url();?>">
									
									<h1 class="brand-text" ><i class="zmdi zmdi-plus-circle-o" style="font-size:25px;font-weight: bold;"></i> Patient Pulse</h1>
								</a>
							</li>
							
						</ul>
					</div>
					<ul class="nav navbar-nav left-menu ">
						<li class="menu-icon">
							<a href="javascript:void(0)" role="button" data-toggle-state="app_sidebar-menu-collapsed" data-key="leftSideBar">
								<i class="mdi mdi-backburger"></i>
							</a>
						</li>
					</ul>
					<ul class="nav navbar-nav left-menu">
						<li>
							<a href="javascript:void(0)" class="nav-link" data-toggle-profile="profile-open">
								<i class="zmdi zmdi-account"></i>
							</a>
						</li>
						
						
					</ul>
					<ul class="nav navbar-nav pull-right">
						<li>
							<a href="javascript:void(0)" data-navsearch-open>
								<i class="zmdi zmdi-search"></i>
							</a>
						</li>
						
						<li class="dropdown hidden-xs hidden-sm">
							<a href="javascript:void(0)" data-toggle="dropdown" aria-expanded="false">
								<span class="badge mini status danger"></span>
								<i class="zmdi zmdi-notifications"></i>
							</a>
							<ul class="dropdown-menu dropdown-lg-menu dropdown-menu-right dropdown-alt">
								<li class="dropdown-menu-header">
									<ul class="card-actions icons  left-top">
										<li class="withoutripple">
											<a href="javascript:void(0)" class="withoutripple">
												<i class="zmdi zmdi-settings"></i>
											</a>
										</li>
									</ul>
									<h5>NOTIFICATIONS</h5>
									<ul class="card-actions icons right-top">
										<li>
											<a href="javascript:void(0)">
												<i class="zmdi zmdi-check-all"></i>
											</a>
										</li>
									</ul>
								</li>
								<li>
									<div class="card">
										<a href="javascript:void(0)" class="pull-right dismiss" data-dismiss="close">
											<i class="zmdi zmdi-close"></i>
										</a>
										<div class="card-body">
											<ul class="list-group ">
												<li class="list-group-item ">
													<span class="pull-left"><img src="<?php echo base_url();?>Theme/assets/img/profiles/11.jpg" alt="" class="img-circle max-w-40 m-r-10 "></span>
													<div class="list-group-item-body">
														<div class="list-group-item-heading">Dakota Johnson</div>
														<div class="list-group-item-text">Do you want to grab some sushi for lunch?</div>
													</div>
												</li>
											</ul>
										</div>
									</div>
								</li>
								<li>
									<div class="card">
										<a href="javascript:void(0)" class="pull-right dismiss" data-dismiss="close">
											<i class="zmdi zmdi-close"></i>
										</a>
										<div class="card-body">
											<ul class="list-group ">
												<li class="list-group-item ">
													<span class="pull-left"><img src="<?php echo base_url();?>Theme/assets/img/profiles/07.jpg" alt="" class="img-circle max-w-40 m-r-10 "></span>
													<div class="list-group-item-body">
														<div class="list-group-item-heading">Todd Cook</div>
														<div class="list-group-item-text">Let's schedule a meeting with our design team at 10am.</div>
													</div>
												</li>
											</ul>
										</div>
									</div>
								</li>
								<li>
									<div class="card">
										<a href="javascript:void(0)" class="pull-right dismiss" data-dismiss="close">
											<i class="zmdi zmdi-close"></i>
										</a>
										<div class="card-body">
											<ul class="list-group ">
												<li class="list-group-item ">
													<span class="pull-left"><img src="<?php echo base_url();?>Theme/assets/img/profiles/05.jpg" alt="" class="img-circle max-w-40 m-r-10 "></span>
													<div class="list-group-item-body">
														<div class="list-group-item-heading">Jennifer Ross</div>
														<div class="list-group-item-text">We're looking to hire two more protypers to our team.</div>
													</div>
												</li>
											</ul>
										</div>
									</div>
								</li>
								<li class="dropdown-menu-footer">
									<a href="javascript:void(0)">
										All notifications
									</a>
								</li>
							</ul>
						</li>
						
						
					</ul>
				</div>
				<form role="search" action="#" class="navbar-form" id="navbar_form">
					<div class="form-group">
						<input type="text" placeholder="Search and press enter..." class="form-control" id="navbar_search" autocomplete="off">
						<i data-navsearch-close class="zmdi zmdi-close close-search"></i>
					</div>
					<button type="submit" class="hidden btn btn-default">Submit</button>
				</form>
			</nav>
		</header>