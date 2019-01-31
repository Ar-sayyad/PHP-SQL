<?php include 'includes/header.php'; ?>

  <?php include 'includes/charts.php'; ?>  
<style>
    .hosp_sect,.data_sect,.quest_sect,.nps_sect{
          height: 160px;
    box-shadow: 3px 3px 4px 1px #979797;
    border-radius: 3px;
    color: #fff;
    border: 2px solid #fff;
    } 
    .nps_scores,.trend_nps,.demographics,.monthly_data,.score_dimensions,.demoavg_data,.npschart_data{
        box-shadow: 1px 1px 3px 0px #ccc;
        border-radius: 0px;
        border: 1px solid #ccc;
    }
    .hosp_sect h1, .data_sect h1, .quest_sect h1, .nps_sect h1{
       color: #ffffff;
    font-size: 35px;
    margin-right: 6px;
    float: right;
    }
    .hosp_sect h2, .data_sect h2, .quest_sect h2, .nps_sect h2{
        color: #ffffff;
    font-size: 20px;
    padding-bottom: 36px;
    font-weight: 500;
    }
    .hosp_sect h3, .data_sect h3, .quest_sect h3, .nps_sect h3{
        color: #ffffff;
        font-weight: 500;
        margin-top: 15px;
    }
    .hosp_sect{
       background-color: #c047d4;
    }
    .data_sect{        
        background-color: #2196F3;      
    }
    .quest_sect{
            background-color: #7c6eeb;
    }
    .nps_sect{
          background-color: #4eb955;
    }
    hr {
        margin-top: 0px;
        margin-bottom: 3px;
        height: 1px;
        width: 100%;
        background: #E3ECF7;
    }
    #nps_scores,#trend_nps,#demographics{
         width: 100%;
        height: 300px;
    }
    #score_dimensions,#demoavg_data,#demoavg_data,#demoavg_data,#npschart_data{
         width: 100%;
        height: 250px;
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
							
							<!-- ENDS $dashboard_content -->
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                    <div class="card nps_scores">
                                                                            <div class="card-body p-b-0">
                                                                                <img  style="width: 100%; height:700px;"  src="<?php echo base_url();?>Theme/assets/img/graph/data.png" alt=""/>
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
