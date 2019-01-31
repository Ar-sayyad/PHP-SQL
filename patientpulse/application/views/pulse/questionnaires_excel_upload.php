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
                                                                  
                                 <button data-toggle="modal" onclick="showAjaxModal('<?php echo base_url();?>home/popup/pulse/uploadHospitalData');" class="btn btn-primary" style="float: right" ><i class="zmdi zmdi-cloud-upload"></i> Upload Data</button>
                                 <a href="<?php echo base_url();?>Theme/assets/upload/downloads/questionFile.xlsx" class="btn btn-info" style="float: right" ><i class="zmdi zmdi-download"></i> Download Format</a>
                                                             <!--<button data-toggle="modal" onclick="showAjaxModal('<?php echo base_url();?>home/popup/pulse/addHospital');" class="btn btn-success" > <i class="zmdi zmdi-plus-circle-o"></i> Add Hospital</button>-->
                                                           </div>
                                                               <div class="col-md-12">
                                                                    <div class="card">
                                                                            <div class="card-body p-b-0">                                                                                
                                                                                
                                                                                 <div class="bootstrap-data-table-panel">
                                                                                <div class="table-responsive">
                                                                               <table id="bootstrap-data-table-export" class="table table-striped table-bordered">                                                                             
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th style="width:3%">
                                                                                                Sr.No
                                                                                            </th>
                                                                                            <th style="width:20%">
                                                                                                 Questions
                                                                                            </th>
                                                                                             <th style="width:15%">
                                                                                               Answers
                                                                                            </th>
                                                                                                                                                                              
                                                                                            <th style="width:10%">
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
                                                                                                <h5 class="question">  Will You get to the Emergency Room?</h5>
                                                                                            </td>
                                                                                            <td> 
                                                                                                  <h5>
                                                                                                   <ul>
                                                                                                       <li>
                                                                                                           A) Yes
                                                                                                       </li>
                                                                                                       <li>
                                                                                                            B) No
                                                                                                       </li>
                                                                                                       <li>
                                                                                                          C) Don't Know
                                                                                                       </li>
                                                                                                       <li>
                                                                                                           D) NOTA
                                                                                                       </li>
                                                                                                   </ul>  
                                                                                               
                                                                                               </h5>
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
                                                                                              <h5 class="question">   How is the work environment and culture like at Medical Center Hospital?</h5>
                                                                                            </td>
                                                                                            <td>
                                                                                               <h5>
                                                                                                   <ul>
                                                                                                       <li>
                                                                                                           A) Excellent
                                                                                                       </li>
                                                                                                       <li>
                                                                                                            B) Good
                                                                                                       </li>
                                                                                                       <li>
                                                                                                          C) Average
                                                                                                       </li>
                                                                                                       <li>
                                                                                                           D) Bad
                                                                                                       </li>
                                                                                                   </ul>  
                                                                                               
                                                                                               </h5>
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
                                                                                             <h5 class="question"> Is Good features included in the private patient rooms?</h5>
                                                                                            </td>
                                                                                            <td>
                                                                                               <h5>
                                                                                                   <ul>
                                                                                                       <li>
                                                                                                           A) Yes
                                                                                                       </li>
                                                                                                       <li>
                                                                                                            B) No
                                                                                                       </li>
                                                                                                       <li>
                                                                                                          C) Don't Know
                                                                                                       </li>
                                                                                                       <li>
                                                                                                           D) NOTA
                                                                                                       </li>
                                                                                                   </ul>  
                                                                                               
                                                                                               </h5>
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
                                                                                               <h5 class="question"> Is clinician or staff member warm and friendly?</h5>
                                                                                            </td>
                                                                                            <td>
                                                                                               <h5>
                                                                                                   <ul>
                                                                                                       <li>
                                                                                                           A) Yes
                                                                                                       </li>
                                                                                                       <li>
                                                                                                            B) No
                                                                                                       </li>
                                                                                                       <li>
                                                                                                          C) Don't Know
                                                                                                       </li>
                                                                                                       <li>
                                                                                                           D) NOTA
                                                                                                       </li>
                                                                                                   </ul>  
                                                                                               
                                                                                               </h5>
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
                                                                                              <h5 class="question">  Did this clinician or staff member answer all your questions to your satisfaction?</h5>
                                                                                            </td>
                                                                                            <td>
                                                                                                <h5>
                                                                                                   <ul>
                                                                                                       <li>
                                                                                                           A) Yes
                                                                                                       </li>
                                                                                                       <li>
                                                                                                            B) No
                                                                                                       </li>
                                                                                                       <li>
                                                                                                          C) Don't Know
                                                                                                       </li>
                                                                                                       <li>
                                                                                                           D) NOTA
                                                                                                       </li>
                                                                                                   </ul>  
                                                                                               
                                                                                               </h5>
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
                                                                                                <h5 class="question">  How knowledgeable was the staff at this hospital?</h5>
                                                                                            </td>
                                                                                            <td>
                                                                                               <h5>
                                                                                                   <ul>
                                                                                                       <li>
                                                                                                           A)  Extremely knowledgeable
                                                                                                       </li>
                                                                                                       <li>
                                                                                                            B) Very knowledgeable
                                                                                                       </li>
                                                                                                       <li>
                                                                                                          C) Moderately knowledgeable
                                                                                                       </li>
                                                                                                       <li>
                                                                                                           D) Slightly knowledgeable
                                                                                                       </li>
                                                                                                       <li>
                                                                                                           E) Not at all knowledgeable
                                                                                                       </li>
                                                                                                   </ul>  
                                                                                               
                                                                                               </h5>
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
                                                                                                <h5 class="question"> How professionally did the staff at this hospital behave?</h5>
                                                                                            </td>
                                                                                            <td>
                                                                                               <h5>
                                                                                                   <ul>
                                                                                                       <li>
                                                                                                           A)  Extremely professionally
                                                                                                       </li>
                                                                                                       <li>
                                                                                                            B)   Quite professionally
                                                                                                       </li>
                                                                                                       <li>
                                                                                                          C)  Moderately professionally
                                                                                                       </li>
                                                                                                       <li>
                                                                                                           D) Slightly professionally
                                                                                                       </li>
                                                                                                       <li>
                                                                                                           E) Not at all professionally
                                                                                                       </li>
                                                                                                   </ul>  
                                                                                               
                                                                                               </h5>
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
                                                                                               <h5 class="question">  How easy was it to talk to the staff at this hospital about your medical condition(s)?</h5>
                                                                                            </td>
                                                                                            <td>
                                                                                               <h5>
                                                                                                   <ul>
                                                                                                       <li>
                                                                                                           A)  Extremely easy
                                                                                                       </li>
                                                                                                       <li>
                                                                                                            B)   Quite easy
                                                                                                       </li>
                                                                                                       <li>
                                                                                                          C)  Moderately easy
                                                                                                       </li>
                                                                                                       <li>
                                                                                                           D) Slightly easy
                                                                                                       </li>
                                                                                                       <li>
                                                                                                           E) Not at all easy
                                                                                                       </li>
                                                                                                   </ul>  
                                                                                               
                                                                                               </h5>
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
                                                                                                <h5 class="question"> How often did you receive conflicting information from the staff at this hospital?</h5>
                                                                                            </td>
                                                                                            <td>
                                                                                                 <h5>
                                                                                                   <ul>
                                                                                                       <li>
                                                                                                           A)  Extremely often
                                                                                                       </li>
                                                                                                       <li>
                                                                                                            B)   Quite often
                                                                                                       </li>
                                                                                                       <li>
                                                                                                          C)  Moderately often
                                                                                                       </li>
                                                                                                       <li>
                                                                                                           D) Slightly often
                                                                                                       </li>
                                                                                                       <li>
                                                                                                           E) Not at all often
                                                                                                       </li>
                                                                                                   </ul>  
                                                                                               
                                                                                               </h5>
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
                                                                                                <h5 class="question"> Overall, how hygienic do you feel this hospital is?</h5>
                                                                                            </td>
                                                                                            <td>
                                                                                             <h5>
                                                                                                   <ul>
                                                                                                       <li>
                                                                                                           A)  Extremely hygienic
                                                                                                       </li>
                                                                                                       <li>
                                                                                                            B)   Quite hygienic
                                                                                                       </li>
                                                                                                       <li>
                                                                                                          C)  Moderately hygienic
                                                                                                       </li>
                                                                                                       <li>
                                                                                                           D) Slightly hygienic
                                                                                                       </li>
                                                                                                       <li>
                                                                                                           E) Not at all hygienic
                                                                                                       </li>
                                                                                                   </ul>  
                                                                                               
                                                                                               </h5>
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
