<?php include('header.php');?>

<div id="page-wrapper" class="container">
<div class="row">

<?php include('navigation.php');?>



<div class="row">
<div class="col-md-12">
<div class="main-box">
<header class="main-box-header clearfix">
<h2 class="pull-left"><b>Test Details</b></h2>
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
<th>Application</th>
<th>No of Test Cases</th> 
</tr>
</thead>
<tbody>
<?php $test_info = $this->test_model->get_test_case_count();
  foreach ($test_info as $row) {     
     ?>   
<tr>
<td>
<h5 style="color: #03a9f4"><b><?php echo $this->test_model->get_test_application($row['application_id']);?></b></h5>
</td>
<td>
<b><?php echo $this->test_model->get_test_application_count($row['application_id']);?></b>
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
<div class="row">
<div class="col-md-12">
<div class="main-box">
<header class="main-box-header clearfix">
<h2 class="pull-left"><b>Latest Execution Summary</b></h2>
</header>
<div class="main-box-body clearfix">
<div class="row">

<div class="col-md-4">
<div class="table-responsive clearfix"> 
<table class="table table-bordered tbl1">
<tbody>
   
<tr>
<td>
<h6 style="color: #03a9f4"><b>Run Name</b></h5>
</td>
<td>
    <b><?php echo $runname= $this->test_model->get_last_excutor_name();?></b>

</td> 
</tr>
 <tr>
<td>
<h6 style="color: #03a9f4"><b>Executed By</b></h5>
</td>
<td>
 <b><?php echo $this->test_model->get_last_excutor_email();?></b>
</td> 
</tr>
<tr>
<td>
<h6 style="color: #03a9f4"><b>Executed On</b></h5>
</td>
<td>
 <b><?php echo $this->test_model->get_last_excutor_time();?></b>
</td> 
</tr>
</tbody>
</table>
</div>
</div>
<div class="col-md-4">
 <div class="table-responsive clearfix">
 	 
<table class="table table-bordered tbl1">
<tbody>
<tr>
<td>
<h6 style="color: #03a9f4"><b>Test Case Executed</b></h5>
</td>
<td>
<b><?php $runner_id = $this->test_model->get_last_runner_id();
 echo $this->test_model->get_test_excuted($runner_id);?></b>
</td> 
</tr>
 <tr>
<td>
<h6 style="color: #03a9f4"><b>Passed</b></h5>
</td>
<td>
<b><?php echo $this->test_model->get_test_passed($runner_id);?></b>
</td> 
</tr>
<tr>
<td>
<h6 style="color: #03a9f4"><b>Failed</b></h5>
</td>
<td>
<b><?php echo $this->test_model->get_test_failed($runner_id);?></b>
</td> 
</tr>
</tbody>
</table>
</div>
</div>
<div class="col-md-4">
 <div id="highchartdiv1"></div>
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