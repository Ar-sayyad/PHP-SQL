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
                                                             <button data-toggle="modal" onclick="showAjaxModal('<?php echo base_url();?>home/popup/pulse/under');" class="btn btn-success" style="float: right" > <i class="zmdi zmdi-plus-circle-o"></i> Add Hospital User</button>
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
                                                                                            <th style="width:25%">
                                                                                                Address
                                                                                            </th>                                                                                           
                                                                                            <th style="width:15%">
                                                                                                Contact
                                                                                            </th>                                                                                            
                                                                                            <th style="width:20%">
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
                                                                                                <h5>DR. SHRIPAD CHODANKAR</h5>
                                                                                            </td>
                                                                                            <td> 
                                                                                                <h5>info@wyx.com</h5>
                                                                                            </td>
                                                                                            <td>
                                                                                              <h5>Panacea Point, A/202, Mrud Kishor, Dattapada Road, Borivali West, Mumbai - 400092</h5>
                                                                                            </td>
                                                                                            <td>
                                                                                                <h5>+ 91-11-2658850</h5>
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
                                                                                              <h5> DR. MONISHA RAWAT</h5>
                                                                                            </td>
                                                                                            <td>
                                                                                                <h5>info@xyzcom</h5>
                                                                                            </td>
                                                                                            <td>
                                                                                              <h5>Monisha Mantra, B-13, New Silver Oak, Vasant Garden, Mulund West, Mumbai - 400080</h5>
                                                                                            </td>
                                                                                            <td>
                                                                                               <h5> + 91 80 2502 4444</h5>
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
                                                                                             <h5>DR. HAMANT WAGH</h5>
                                                                                            </td>
                                                                                            <td>
                                                                                               <h5>info@apollohospitals.com</h5>
                                                                                            </td>
                                                                                            <td>
                                                                                           <h5>Jaslok Hospital And Medical Research Institute, 15, Dr.G.Deshmukh Marg, Pedder Road, Mumbai - 400026</h5>

                                                                                            </td>
                                                                                            <td>
                                                                                               <h5>+ 91 80 2526 6757</h5>
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
                                                                                               <h5>DR. ASMITA ADSUL</h5>
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
                                                                                              <h5>DR. NISHEETA</h5>
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
                                                                                                <h5>DR. VISHVAMITRA BHERWANI</h5>
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
                                                                                                <h5>DR. VASANTI DEDHIA</h5>
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
                                                                                               <h5>DR. VANDANA D PAMNANI</h5>
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
                                                                                                <h5>DR. BAPAT RAJANI P</h5>
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
                                                                                                <h5>DR. K S YAMUNA</h5>
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
