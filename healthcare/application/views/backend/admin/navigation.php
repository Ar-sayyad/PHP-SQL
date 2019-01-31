<div class="sidebar-menu">

    <header class="logo-env" >



        <!-- logo -->

        <div class="logo" style="">

            <a href="<?php echo base_url(); ?>">

                <img src="assets/images/white.png"  style="max-height:110px;"/>

            </a>

        </div>



        <!-- logo collapse icon -->

        <div class="sidebar-collapse" style="">

            <a href="#" class="sidebar-collapse-icon with-animation">



                <i class="entypo-menu"></i>

            </a>

        </div>



        <!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->

        <div class="sidebar-mobile-menu visible-xs">

            <a href="#" class="with-animation">

                <i class="entypo-menu"></i>

            </a>

        </div>

    </header>

    <div class="sidebar-user-info">



        <div class="sui-normal">

            <a href="#" class="user-link">

                <img src="<?php echo $this->crud_model->get_image_url($this->session->userdata('login_type'), $this->session->userdata('login_user_id'));?>" alt="" class="img-circle" style="height:44px;">



                <span><?php echo get_phrase('welcome'); ?>,</span>

                <strong><?php

                    echo $this->db->get_where($this->session->userdata('login_type'), array($this->session->userdata('login_type') . '_id' =>

                        $this->session->userdata('login_user_id')))->row()->name;

                    ?>

                </strong>

            </a>

        </div>



        <div class="sui-hover inline-links animate-in"><!-- You can remove "inline-links" class to make links appear vertically, class "animate-in" will make A elements animateable when click on user profile -->				

            <a href="<?php echo base_url(); ?>index.php?<?php echo $account_type; ?>/profile">

                <i class="entypo-pencil"></i>

                <?php echo get_phrase('edit_profile'); ?>

            </a>



            <a href="<?php echo base_url(); ?>index.php?<?php echo $account_type; ?>/profile">

                <i class="entypo-lock"></i>

                <?php echo get_phrase('change_password'); ?>

            </a>



            <span class="close-sui-popup">×</span><!-- this is mandatory -->			

        </div>

    </div>





    <div style="border-top:1px solid rgba(69, 74, 84, 0.7);"></div>	

    <ul id="main-menu" class="">

        <!-- DASHBOARD -->

        <li class="<?php if ($page_name == 'dashboard') echo 'active'; ?> ">

            <a href="<?php echo base_url(); ?>index.php?admin/dashboard">

                <i class="fa fa-desktop"></i>

                <span><?php echo get_phrase('dashboard'); ?></span>

            </a>

        </li>

        
        

        <li class="<?php if ($page_name == 'manage_doctor') echo 'active'; ?>">

            <a href="<?php echo base_url(); ?>index.php?admin/doctor">

                <i class="fa fa-user-md"></i>

                <span><?php echo get_phrase('doctor'); ?></span>

            </a>

        </li>

        

        <!--<li class="<?php if ($page_name == 'manage_patient') echo 'active'; ?> ">

            <a href="<?php echo base_url(); ?>index.php?admin/patient">

                <i class="fa fa-user"></i>

                <span><?php echo get_phrase('patient'); ?></span>

            </a>

        </li>-->

       <li class="<?php if ($page_name == 'manage_pharmacist') echo 'active'; ?> ">

            <a href="<?php echo base_url(); ?>index.php?admin/pharmacist">

                <i class="fa fa-medkit"></i>

                <span><?php echo get_phrase('Chemist'); ?></span>

            </a>

        </li>
		
		<!--<li class="<?php if ($page_name == 'manage_newprescription') echo 'active'; ?> ">

            <a href="<?php echo base_url(); ?>index.php?admin/prescription">

                <i class="fa fa-file-text-o"></i>

                <span><?php echo get_phrase('prescription'); ?></span>

            </a>

        </li>-->
		
		
        <li class="<?php if ($page_name == 'manage_graph' || $page_name =='manage_disease_graph'
								|| $page_name =='manage_patient_graph' )						

                        echo 'opened active';?> ">

            <a href="#">

                <i class="entypo-target"></i>

                <span><?php echo get_phrase('Analytics'); ?></span>

            </a>

            <ul>
		
		<li class="<?php if ($page_name == 'manage_graph') echo 'active'; ?> ">

            <a href="<?php echo base_url(); ?>index.php?admin/graph">

                <i class="fa fa-user-md"></i>

                <span><?php echo get_phrase('doctor'); ?></span>

            </a>

        </li>
		<li class="<?php if ($page_name == 'manage_patient_graph') echo 'active'; ?> ">

            <a href="<?php echo base_url(); ?>index.php?admin/patient_graph">

                <i class="fa fa-user"></i>

                <span><?php echo get_phrase('patient'); ?></span>

            </a>

        </li>
		
		<!--<li class="<?php if ($page_name == 'manage_disease_graph') echo 'active'; ?> ">

            <a href="<?php echo base_url(); ?>index.php?admin/disease_graph">

                <i class="fa fa-medkit"></i>

                <span><?php echo get_phrase('disease'); ?></span>

            </a>

        </li>-->
		</ul>
		</li>

        

        

        

        <li class="<?php if ($page_name == 'manage_medicine' || $page_name =='manage_speciality'
								|| $page_name == 'manage_disease'|| $page_name == 'manage_city'
								|| $page_name == 'manage_state' || $page_name == 'manage_receptionist') 

                        echo 'opened active';?> ">

            <a href="#">

                <i class="entypo-target"></i>

                <span><?php echo get_phrase('monitor_healthcare'); ?></span>

            </a>

            <ul>
			
			 <li class="<?php if ($page_name == 'manage_receptionist') echo 'active'; ?> ">

            <a href="<?php echo base_url(); ?>index.php?admin/receptionist">

                <i class="entypo-dot"></i>

                <span><?php echo get_phrase('operator'); ?></span>

            </a>

        </li>
		
		
			
			
			<li class="<?php if ($page_name == 'manage_disease') echo 'active'; ?> ">
            <a href="<?php echo base_url(); ?>index.php?admin/disease">
                 <i class="entypo-dot"></i>
                <span><?php echo get_phrase('disease'); ?></span>
            </a>
        </li>
		<li class="<?php if ($page_name == 'manage_medicine') echo 'active'; ?> ">
            <a href="<?php echo base_url(); ?>index.php?admin/medicine">
                 <i class="entypo-dot"></i>
                <span><?php echo get_phrase('medicine'); ?></span>
            </a>
        </li>
		
		<li class="<?php if ($page_name == 'manage_speciality') echo 'active'; ?> ">
            <a href="<?php echo base_url(); ?>index.php?admin/speciality">
                 <i class="entypo-dot"></i>
                <span><?php echo get_phrase('speciality'); ?></span>
            </a>
        </li>
        </li>
                
          <li class="<?php if ($page_name == 'manage_city') echo 'active'; ?> ">
            <a href="<?php echo base_url(); ?>index.php?admin/city">
                 <i class="entypo-dot"></i>
                <span><?php echo get_phrase('city'); ?></span>
            </a>
        </li>
		
		<li class="<?php if ($page_name == 'manage_state') echo 'active'; ?> ">
            <a href="<?php echo base_url(); ?>index.php?admin/state">
                 <i class="entypo-dot"></i>
                <span><?php echo get_phrase('state'); ?></span>
            </a>
        </li>
        
        
             

            </ul>

        </li>

        

        


        <!-- SETTINGS -->

        <li class="<?php if ($page_name == 'system_settings' || $page_name == 'manage_language' ||

                            $page_name == 'sms_settings') echo 'opened active';?> ">

            <a href="#">

                <i class="fa fa-wrench"></i>

                <span><?php echo get_phrase('settings'); ?></span>

            </a>

            <ul>

                <li class="<?php if ($page_name == 'system_settings') echo 'active'; ?> ">

                    <a href="<?php echo base_url(); ?>index.php?admin/system_settings">

                        <span><i class="fa fa-h-square"></i> <?php echo get_phrase('system_settings'); ?></span>

                    </a>

                </li>

               <!-- <li class="<?php if ($page_name == 'manage_language') echo 'active'; ?> ">

                    <a href="<?php echo base_url(); ?>index.php?admin/manage_language">

                        <span><i class="fa fa-globe"></i> <?php echo get_phrase('language_settings'); ?></span>

                    </a>

                </li>-->

                <!--<li class="<?php if ($page_name == 'sms_settings') echo 'active'; ?> ">

                    <a href="<?php echo base_url(); ?>index.php?admin/sms_settings">

                        <span><i class="entypo-paper-plane"></i> <?php echo get_phrase('sms_settings'); ?></span>

                    </a>

                </li>-->

            </ul>

        </li>



        <!-- ACCOUNT -->

        <li class="<?php if ($page_name == 'manage_profile') echo 'active'; ?> ">

            <a href="<?php echo base_url(); ?>index.php?admin/manage_profile">

                <i class="entypo-lock"></i>

                <span><?php echo get_phrase('account'); ?></span>

            </a>

        </li>







    </ul>



</div>