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
                                                             <button data-toggle="modal" onclick="showAjaxModal('<?php echo base_url();?>home/popup/pulse/under');" class="btn btn-success" style="float: right" > <i class="zmdi zmdi-plus-circle-o"></i> Add Category</button>
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
                                                                                                 Category Name
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
                                                                                                <h5>Category Name A</h5>
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
                                                                                                <h5>Category Name B</h5>
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
                                                                                                <h5>Category Name C</h5>
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
                                                                                                <h5>Category Name D</h5>
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
                                                                                                <h5>Category Name E</h5>
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
                                                                                                <h5>Category Name F</h5>
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
                                                                                                <h5>Category Name G</h5>
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
                                                                                                <h5>Category Name H</h5>
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
                                                                                                <h5>Category Name I</h5>
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
                                                                                                <h5>Category Name J</h5>
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
