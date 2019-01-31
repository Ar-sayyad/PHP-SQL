<?php include 'header-top.php';?>
<html>
<body>
	<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>
<!-- # sidebar -->
    <?php include 'sidebar.php';?>
    <!-- /# sidebar -->
<?php $vendor_info = $this->db->get('tbl_vendor')->result_array();?>
<?php $supervisor_info = $this->db->get('tbl_supervisor')->result_array();?>
    <!-- # header -->
    <?php include 'header.php';?>
    <!-- /# header -->
 <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
		<?php include 'page-title.php';?>
            	<div class="row">
                        <div class="col-lg-12">
<!--                            <div class="addbtn">
                                <button class="btn btn-primary" >Add Subadmin</button>
                             </div>-->
                             <div class="card alert">
                                  <div class="bootstrap-data-table-panel">
                                    <div class="table-responsive">
                                        <form action="<?php echo base_url();?>Adminity/monthwise" method="post">
                                      

                                             <div class="col-md-4">
                                                <div class="basic-form">
                                                    <div class="form-group">
                                                        <label>Vendor Name</label>
                                                      <select class="form-control etype" name="vendor" id="vendor_id">
                                                    <option value=""> ---Select Vendor--- </option>
                                                    <?php
                                                    foreach($vendor_info as $drv)
                                                    {
                                                     
                                                       
                                                        ?>
                                                     <option value="<?php echo $drv['vendor_id'];?>"><?php echo $drv['vendor_name'].' - ['.$drv['vendor_contact'].']';?></option>
                                                    <?php 
                                                    }
                                                    ?>
                                                </select> 
                                                    </div>
                                                </div>
                                            </div>

                                              <div class="col-md-4">
                                                <div class="basic-form">
                                                    <div class="form-group">



                                                    	
                                                        <label>Supervisor Name</label>
                                                      <select class="form-control etype" name="supervisor" id="supervisor_id" >
                                                    <option value=""> ---Select Supervisor--- </option>
                                                    <?php
                                                    foreach($supervisor_info as $drv)
                                                    {
                                                     
                                                       
                                                        ?>
                                                     <option value="<?php echo $drv['supervisor_id'];?>"><?php echo $drv['supervisor_name'].' - ['.$drv['supervisor_contact'].']';?></option>
                                                    <?php 
                                                    }
                                                    ?>
                                                </select> 
                                                    </div>
                                                </div>
                                            </div>
                                        
                                      
                                        <div class="col-md-4" style="margin-top: 29px;">
                                                <div class="basic-form">
                                                    <div class="form-group">
                                                        <label>&nbsp;</label>
                                                        <button type="submit" class="btn btn-info btn-search">Search</button>
                                                    </div>
                                                </div>
                                        </div>
                                            </form>
                                    </div>
                                  </div>
                            </div>
                            <!-- /# card -->
                        </div>
                        <!-- /# column -->
                    </div>

            	<div class="row">
<div class="col-md-12">
<div class="main-box">
<header class="main-box-header clearfix">
<h2 class="pull-left"><b>Month Wise Summary</b></h2>
</header>
<div class="main-box-body clearfix">
<div class="row">

<div class="col-md-4">
 <div class="table-responsive clearfix">
 	 
<table class="table table-bordered tbl1">
<tbody>

 <tr>
<td>
<h6 style="color: #03a9f4"><b>Current_Month</b></h5> 
</td>
<td>
<b>
	<?php  echo $current_month;?>
</b>
</td> 
</tr>
<tr>
<td>
<h6 style="color: #03a9f4"><b>Previous_Month</b></h5>
</td>
<td>
<b>
	<?php  echo $next_month;?>
</b>
</td> 
</tr>
</tbody>
</table>
</div>
</div>
<div class="col-md-4">
  <div id="containerr" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
  
</div>
</div>
</div>
       <!--FOOTER CONTENTS--->
                     <?php include 'footer-contents.php';?>
                    <!---/FOOTER CONTENTS-->


                      <?php include 'footer.php';?>


<script>

	Highcharts.chart('containerr', {
    chart: {
        type: 'pie',
        options3d: {
            enabled: true,
            alpha: 40,
            beta: 0
        }
    },
    title: {
        text: false
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'

    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            depth: 40,
            dataLabels: {
                enabled: true,
                format: '{point.name}'
            }
        }
    },
             credits: {
      enabled: false
  },
    series: [{
        type: 'pie',
        name: 'Percentage',
        data: [
            ['Now_Month', <?php echo $current_month;?>],
             ['Previous_Month', <?php echo $next_month;?>]
            
        ]
    }]
});
	</script>
                      </body>
                      </html>