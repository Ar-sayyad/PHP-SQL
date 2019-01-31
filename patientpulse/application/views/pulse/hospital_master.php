<?php include 'includes/header.php'; ?>
<style>
    div.dataTables_wrapper div.dataTables_filter {
    text-align: right;
    margin-top: -50px;
}
</style>
<body>
	<div id="app_wrapper">
		<?php include 'includes/topbar.php'; ?>
            
		<?php include 'includes/sidebar.php'; ?>
            
			<section id="content_outer_wrapper">
				<div id="content_wrapper">
                                    
					<?php include 'includes/titlebar.php'; ?>
                                    
					<div id="content" class="container-fluid">
						<div class="content-body">
                                                    
                                                        <div class="row">
                                                            <div class="addbtn">
                                                             <button data-toggle="modal" onclick="showAjaxModal('<?php echo base_url();?>home/popup/pulse/addHospital');" class="btn btn-success" style="float: right" > <i class="zmdi zmdi-plus-circle-o"></i> Add Hospital</button>
                                                           </div>
                                                                <div class="col-md-12">
                                                                    <div class="card">
                                                                            <div class="card-body p-b-0">                                                                                
                                                                                
                                                                                 <div class="bootstrap-data-table-panel">
                                                                                <div class="table-responsive">
                                                                               <table id="bootstrap-data-table-export" class="table table-striped table-bordered">                                                                             
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th style="width:5%">
                                                                                                Sr.No
                                                                                            </th>
                                                                                            <th style="width:20%">
                                                                                                Name
                                                                                            </th>
                                                                                             <th style="width:15%">
                                                                                                Email
                                                                                            </th>
                                                                                            <th style="width:20%">
                                                                                                Address
                                                                                            </th>                                                                                           
                                                                                            <th style="width:15%">
                                                                                                Contact
                                                                                            </th>
                                                                                            <th style="width:10%">
                                                                                                Website
                                                                                            </th>
                                                                                            <th style="width:15%">
                                                                                                Actions
                                                                                            </th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td>
                                                                                               <h5>1</h5>
                                                                                            </td>
                                                                                            <td>
                                                                                                <h5>All India Institute of Medical Science, Delhi</h5>
                                                                                            </td>
                                                                                            <td> 
                                                                                                <h5>info@aiims.com</h5>
                                                                                            </td>
                                                                                            <td>
                                                                                              <h5>Ansari Nagar, New Delhi- 110029</h5>
                                                                                            </td>
                                                                                            <td>
                                                                                                <h5>+ 91-11-2658850</h5>
                                                                                            </td>
                                                                                            <td>
                                                                                                <a target="_blank" href="http://www.aiims.edu/" class="btn btn-info btn-sm">View Website</a>
                                                                                            </td>
                                                                                            
                                                                                            <td style="text-align: left"> 
                                                        <a style="cursor:pointer" rel="tooltip" title="Edit" class="btn btn-primary btn-link btn-sm" onclick="showAjaxModal('<?php echo base_url();?>home/popup/pulse/under/');">
                                                      <i class="zmdi zmdi-edit"></i>
                                                        </a>
                                                        
                                                        <a rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm" onclick="return checkDelete();" href="<?php echo base_url(); ?>budget/delete/">
                                                          <i class="zmdi zmdi-close"></i>
                                                      
                                                        </a>
                                                    </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                                                               <h5>2</h5>
                                                                                            </td>
                                                                                            <td>
                                                                                              <h5> Manipal HospitaL, bangalore</h5>
                                                                                            </td>
                                                                                            <td>
                                                                                                <h5>info@manipalhealth.com</h5>
                                                                                            </td>
                                                                                            <td>
                                                                                              <h5>Bangalore, 560 017 Karnataka</h5>
                                                                                            </td>
                                                                                            <td>
                                                                                               <h5> + 91 80 2502 4444</h5>
                                                                                            </td>
                                                                                            <td>
                                                                                                <a target="_blank" href="http://www.manipalhospital.org/" class="btn btn-info btn-sm">View Website</a>
                                                                                            </td>
                                                                                            <td style="text-align: left"> 
                                                        <a style="cursor:pointer" rel="tooltip" title="Edit" class="btn btn-primary btn-link btn-sm" onclick="showAjaxModal('<?php echo base_url();?>home/popup/pulse/under/');">
                                                      <i class="zmdi zmdi-edit"></i>
                                                        </a>
                                                        
                                                        <a rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm" onclick="return checkDelete();" href="<?php echo base_url(); ?>budget/delete/">
                                                          <i class="zmdi zmdi-close"></i>
                                                      
                                                        </a>
                                                    </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                                                               <h5> 3</h5>
                                                                                            </td>
                                                                                            <td>
                                                                                             <h5>Apollo Hospitals, Chennai</h5>
                                                                                            </td>
                                                                                            <td>
                                                                                               <h5>info@apollohospitals.com</h5>
                                                                                            </td>
                                                                                            <td>
                                                                                           <h5>21,Greams Lane Off Greams Road Chennai-600006 Tamilnadu</h5>

                                                                                            </td>
                                                                                            <td>
                                                                                               <h5>+ 91 80 2526 6757</h5>
                                                                                            </td>
                                                                                            <td>
                                                                                                <a target="_blank" href="http://www.apollohospitals.com/" class="btn btn-info btn-sm">View Website</a>
                                                                                              
                                                                                            </td>
                                                                                             <td style="text-align: left"> 
                                                        <a style="cursor:pointer" rel="tooltip" title="Edit" class="btn btn-primary btn-link btn-sm" onclick="showAjaxModal('<?php echo base_url();?>home/popup/pulse/under/');">
                                                      <i class="zmdi zmdi-edit"></i>
                                                        </a>
                                                        
                                                        <a rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm" onclick="return checkDelete();" href="<?php echo base_url(); ?>budget/delete/">
                                                          <i class="zmdi zmdi-close"></i>
                                                      
                                                        </a>
                                                    </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                                                              <h5> 4</h5>
                                                                                            </td>
                                                                                            <td>
                                                                                               <h5>Christian Medical College, Vellore.</h5>
                                                                                            </td>
                                                                                            <td>
                                                                                                <h5>pro@cmcvellore.ac.in</h5>
                                                                                            </td>
                                                                                            <td>
                                                                                               <h5>Thorapadi P.O., Vellore - 632002</h5>
                                                                                            </td>
                                                                                            <td>
                                                                                               <h5> 0416-2282010</h5>
                                                                                            </td>
                                                                                            <td>
                                                                                                 <a target="_blank" href="http://www.cmch-vellore.edu/ContactUs/tabid/76/ContactUs/tabid/76/Default.aspx" class="btn btn-info btn-sm">View Website</a>
                                                                                               
                                                                                            </td>
                                                                                             <td style="text-align: left"> 
                                                        <a style="cursor:pointer" rel="tooltip" title="Edit" class="btn btn-primary btn-link btn-sm" onclick="showAjaxModal('<?php echo base_url();?>home/popup/pulse/under/');">
                                                      <i class="zmdi zmdi-edit"></i>
                                                        </a>
                                                        
                                                        <a rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm" onclick="return checkDelete();" href="<?php echo base_url(); ?>budget/delete/">
                                                          <i class="zmdi zmdi-close"></i>
                                                      
                                                        </a>
                                                    </td>
                                                                                        </tr>
                                                                                         <tr>
                                                                                            <td>
                                                                                               <h5> 5</h5>
                                                                                            </td>
                                                                                            <td>
                                                                                              <h5>Lilavati Hospital, Mumbai.</h5>
                                                                                            </td>
                                                                                            <td>
                                                                                               <h5>info@lilavatihospital.com</h5>
                                                                                            </td>
                                                                                            <td>
                                                                                                <h5>A - 791, Bandra Reclamation, Opp, MET College, Bandra (WEST), Mumbai suburban,  Maharashtra 400050</h5>
                                                                                            </td>
                                                                                            <td>
                                                                                                <h5>022 2642 1111</h5>
                                                                                            </td>
                                                                                            <td>
                                                                                                 <a target="_blank" href="http://lilavatihospital.com/web/" class="btn btn-info btn-sm">View Website</a>
                                                                                             
                                                                                            </td>
                                                                                             <td style="text-align: left"> 
                                                        <a style="cursor:pointer" rel="tooltip" title="Edit" class="btn btn-primary btn-link btn-sm" onclick="showAjaxModal('<?php echo base_url();?>home/popup/pulse/under/');">
                                                      <i class="zmdi zmdi-edit"></i>
                                                        </a>
                                                        
                                                        <a rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm" onclick="return checkDelete();" href="<?php echo base_url(); ?>budget/delete/">
                                                          <i class="zmdi zmdi-close"></i>
                                                      
                                                        </a>
                                                    </td>
                                                                                        </tr>
                                                                                         <tr>
                                                                                            <td>
                                                                                               <h5> 6</h5>
                                                                                            </td>
                                                                                            <td>
                                                                                                <h5>Post Graduate Institute of Medical Education and Research, Chandigarh.</h5>
                                                                                            </td>
                                                                                            <td>
                                                                                               <h5> pgimer@chd.nic.in </h5>
                                                                                            </td>
                                                                                            <td>
                                                                                                <h5>PGIMER, Sector-12, Chandigarh,Pin- 160 012, India</h5>
                                                                                            </td>
                                                                                            <td>
                                                                                                <h5>0091-172-2746018</h5>
                                                                                            </td>
                                                                                            <td>
                                                                                                 <a target="_blank" href="http://pgimer.nic.in/code/contactus.htm" class="btn btn-info btn-sm">View Website</a>
                                                                                                
                                                                                            </td>
                                                                                             <td style="text-align: left"> 
                                                        <a style="cursor:pointer" rel="tooltip" title="Edit" class="btn btn-primary btn-link btn-sm" onclick="showAjaxModal('<?php echo base_url();?>home/popup/pulse/under/');">
                                                      <i class="zmdi zmdi-edit"></i>
                                                        </a>
                                                        
                                                        <a rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm" onclick="return checkDelete();" href="<?php echo base_url(); ?>budget/delete/">
                                                          <i class="zmdi zmdi-close"></i>
                                                      
                                                        </a>
                                                    </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                                                               <h5> 7</h5>
                                                                                            </td>
                                                                                            <td>
                                                                                                <h5>Breach Candy Hospital, Mumbai</h5>
                                                                                            </td>
                                                                                            <td>
                                                                                                <h5>info@breachcandyhospital.com </h5>
                                                                                            </td>
                                                                                            <td>
                                                                                               <h5>Bhulabhai Desai Marg, Breach Candy
Mumbai, Maharashtra 400026</h5>
                                                                                            </td>
                                                                                            <td>
                                                                                               <h5>022 23667788</h5>
                                                                                            </td>
                                                                                            <td>
                                                                                                <a target="_blank" href="http://www.breachcandyhospital.org/contact-emergency.html" class="btn btn-info btn-sm">View Website</a>
                                                                                                
                                                                                            </td>
                                                                                             <td style="text-align: left"> 
                                                        <a style="cursor:pointer" rel="tooltip" title="Edit" class="btn btn-primary btn-link btn-sm" onclick="showAjaxModal('<?php echo base_url();?>home/popup/pulse/under/');">
                                                      <i class="zmdi zmdi-edit"></i>
                                                        </a>
                                                        
                                                        <a rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm" onclick="return checkDelete();" href="<?php echo base_url(); ?>budget/delete/">
                                                          <i class="zmdi zmdi-close"></i>
                                                      
                                                        </a>
                                                    </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                                                             <h5>  8</h5>
                                                                                            </td>
                                                                                            <td>
                                                                                               <h5>LV Prasad Eye Institute, Hyderabad</h5>
                                                                                            </td>
                                                                                            <td>
                                                                                               <h5>info@lvpei.com </h5>
                                                                                            </td>
                                                                                            <td>
                                                                                              <h5>  Road No 2, Sri Nagar Colony
Hyderabad, Andhra Pradesh</h5>
                                                                                            </td>
                                                                                            <td>
                                                                                                <h5>040 30612514</h5>
                                                                                            </td>
                                                                                            <td>
                                                                                                <a target="_blank" href="http://www.lvpei.org/" class="btn btn-info btn-sm">View Website</a>
                                                                                               
                                                                                            </td>
                                                                                             <td style="text-align: left"> 
                                                        <a style="cursor:pointer" rel="tooltip" title="Edit" class="btn btn-primary btn-link btn-sm" onclick="showAjaxModal('<?php echo base_url();?>home/popup/pulse/under/');">
                                                      <i class="zmdi zmdi-edit"></i>
                                                        </a>
                                                        
                                                        <a rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm" onclick="return checkDelete();" href="<?php echo base_url(); ?>budget/delete/">
                                                          <i class="zmdi zmdi-close"></i>
                                                      
                                                        </a>
                                                    </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                                                               <h5> 9</h5>
                                                                                            </td>
                                                                                            <td>
                                                                                                <h5>Escorts Heart Institute and Research Centre, Delhi</h5>
                                                                                            </td>
                                                                                            <td>
                                                                                                <h5>info@ehirc.com</h5>
                                                                                            </td>
                                                                                            <td>
                                                                                                <h5>Okhla Rd, Okhla
New Delhi, Delhi 110020</h5>
                                                                                            </td>
                                                                                            <td>
                                                                                               <h5> 011 2682 5002</h5>
                                                                                            </td>
                                                                                            <td>
                                                                                                <a target="_blank" href="http://www.ehirc.com/" class="btn btn-info btn-sm">View Website</a>
                                                                                                
                                                                                            </td>
                                                                                             <td style="text-align: left"> 
                                                        <a style="cursor:pointer" rel="tooltip" title="Edit" class="btn btn-primary btn-link btn-sm" onclick="showAjaxModal('<?php echo base_url();?>home/popup/pulse/under/');">
                                                      <i class="zmdi zmdi-edit"></i>
                                                        </a>
                                                        
                                                        <a rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm" onclick="return checkDelete();" href="<?php echo base_url(); ?>budget/delete/">
                                                          <i class="zmdi zmdi-close"></i>
                                                      
                                                        </a>
                                                    </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                                                               <h5> 10</h5>
                                                                                            </td>
                                                                                            <td>
                                                                                                <h5>Aditya Birla Memorial Hospital, Maharashtra</h5>
                                                                                            </td>
                                                                                            <td>
                                                                                               <h5> info@adityabirlahospital.com</h5>
                                                                                            </td>
                                                                                            <td>
                                                                                              <h5> Aditya Birla Hospital Marg
Pimpri Chinchwad, Maharashtra 411033</h5>
                                                                                            </td>
                                                                                            <td>
                                                                                               <h5> 020 30717786</h5>
                                                                                            </td>
                                                                                            <td>
                                                                                                <a target="_blank" href="http://www.adityabirlahospital.com/" class="btn btn-info btn-sm">View Website</a>
                                                                                                
                                                                                            </td>
                                                                                             <td style="text-align: left"> 
                                                        <a style="cursor:pointer" rel="tooltip" title="Edit" class="btn btn-primary btn-link btn-sm" onclick="showAjaxModal('<?php echo base_url();?>home/popup/pulse/under/');">
                                                      <i class="zmdi zmdi-edit"></i>
                                                        </a>
                                                        
                                                        <a rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm" onclick="return checkDelete();" href="<?php echo base_url(); ?>budget/delete/">
                                                          <i class="zmdi zmdi-close"></i>
                                                      
                                                        </a>
                                                    </td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>     
                        
                                                                                     </div>
                                                                                </div>
                                                                            </div>									
                                                                    </div>									
                                                            </div>
                                                            
                                                           
                                                        </div>
						</div>
					</div>
					<!-- ENDS $content -->
				</div>
				
                            <?php include 'includes/footer.php'; ?>
                            
			</section>
			
		</div>
		
		 <?php include 'includes/footer-min.php'; ?>
    
	</body>
</html>
