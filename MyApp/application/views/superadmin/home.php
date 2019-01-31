<?php include('header.php');?>

<div id="page-wrapper" class="container">

<style>
#content-wrapper{
	    min-height: 750px !important;
}
</style>
<?php include('navigation.php');?>


<div class="row">
<div class="col-md-12">
<div class="main-box">
<header class="main-box-header clearfix">
<h2 class="pull-left">Company Details</h2>
</header>
<div class="main-box-body clearfix">
<div class="row">
<div class="col-md-6">
 <div id="highchartdiv"></div>
</div>
<div class="col-md-6">
 <div class="table-responsive clearfix">
<table class="table table-bordered tbl1">
<thead>
<tr>
<th>Companies</th>
<th>No of Test Cases</th> 
</tr>
</thead>
<tbody>
<?php $company_info = $this->test_model->get_company_count();
  foreach ($company_info as $row) {     
     ?>   
<tr>
<td>
<h6 style="color: #03a9f4"><b><?php echo $this->test_model->get_company_name($row['company_id']);?></b></h6>
</td>
<td>
<b><?php echo $this->test_model->get_company_test_count($row['company_id']);?></b>
</td> 
</tr>
<?php } ?>
 
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

<?php //include('skin.php');?>

<?php include('footer.php');?>