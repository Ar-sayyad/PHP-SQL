<div id="nav-col">
<section id="col-left" class="col-left-nano">
<div id="col-left-inner" class="col-left-nano-content">
<div id="user-left-box" class="clearfix hidden-sm hidden-xs dropdown profile2-dropdown">
<!--<img alt="" src="<?php echo base_url();?>/partnerIT/img/samples/scarlet-159.png"/>-->
<div class="user-box">
<span class="name">
<a href="#" class="dropdown-toggle" data-toggle="dropdown">
<?php echo $this->session->userdata('name');?>
<i class="fa fa-angle-down"></i>
</a>
<ul class="dropdown-menu">
<li><a href="<?php echo base_url();?>index.php/Admin/profile/"><i class="fa fa-user"></i>Profile</a></li> 
<li><a href="<?php echo base_url();?>index.php/Admin/logout/"><i class="fa fa-power-off"></i>Logout</a></li>
</ul>
</span>
</div>
</div>
<div class="collapse navbar-collapse navbar-ex1-collapse" id="sidebar-nav">
<ul class="nav nav-pills nav-stacked">
<li class="nav-header nav-header-first hidden-sm hidden-xs">

</li>

<?php if($page_title=='Dashboard'){?>
<li class="active">
<?php } else { ?><li> <?php }?>
<a href="<?php echo base_url();?>index.php/">
<i class="fa fa-dashboard"></i>
<span>Dashboard</span> 
</a>
</li>


<?php if($page_title=='Company'){?>
<li class="active">
<?php } else { ?><li> <?php }?>
<a href="<?php echo base_url();?>index.php/Admin/company/">
<i class="fa fa-building"></i>
<span>Company</span> 
</a>
</li>


<?php if($page_title=='User Profile'){?>
<li class="active">
<?php } else { ?><li> <?php }?>
<a href="<?php echo base_url();?>index.php/Admin/profile/">
<i class="fa fa-user"></i>
<span>Profile</span> 
</a>
</li> 
</ul>
</div>
</div>
</section>
<div id="nav-col-submenu"></div>
</div>
<div id="content-wrapper">
<div class="row">
<div class="col-lg-12">
<div class="row">
<div class="col-lg-12">
<ol class="breadcrumb">
<li><a href="#">Home</a></li>
<li class="active"><span><?php echo $page_title;?></span></li>
</ol>
<h1><?php echo $page_title;?></h1>
</div>
</div>