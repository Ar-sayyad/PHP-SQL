<?php
if(!empty($_SESSION['email'])){
$status = $_POST["status"];
$firstname = $_POST["firstname"];
$amount = $_POST["amount"];
$txnid = $_POST["txnid"];
$posted_hash = $_POST["hash"];
$key = $_POST["key"];
$productinfo = $_POST["productinfo"];
$email = $_POST["email"];
$salt = $_SESSION['salt'];

/**data insertion***/

$data['fname'] = ucfirst(strtolower($_SESSION['firstName']));
$data['lname'] = ucfirst(strtolower($_SESSION['lastName']));
$data['email'] = $_SESSION['email'];
$data['mobile'] = $_SESSION['mobile'];
$data['date'] = date('d-m-Y');
$data['pass_id'] = $_SESSION['pass_id'];
$data['pass_price'] = $_SESSION['earlybird'];
//$data['price'] = $_SESSION['price'];
$data['no_of_pass'] = $_SESSION['tickets'];
$data['amount'] = $_SESSION['totalCost'];
$data['status'] = $status;
$data['txnid'] = $txnid;

$insert = $this->db->insert('booking',$data); 

$category = $_SESSION['category'];
//$package_id = $_SESSION['package_id'];



If (isset($_POST["additionalCharges"])) {
    $additionalCharges = $_POST["additionalCharges"];
    $retHashSeq = $additionalCharges . '|' . $salt . '|' . $status . '|||||||||||' . $email . '|' . $firstname . '|' . $productinfo . '|' . $amount . '|' . $txnid . '|' . $key;
} else {

    $retHashSeq = $salt . '|' . $status . '|||||||||||' . $email . '|' . $firstname . '|' . $productinfo . '|' . $amount . '|' . $txnid . '|' . $key;
}
$hash = hash("sha512", $retHashSeq);

/*if ($hash != $posted_hash) {
    echo "Invalid Transaction. Please try again";
} else {*/
if($insert){?>
<html>
    <title>Booking Confirmation</title>
<head>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<section id="main-content">
        <div class="container">
            <div class="row">
                        <div class="col-md-12">
                            <div class="card alert">
                                <div class="card-body">
                                    <div class="card-header m-b-20">
                                        <h4>Booking Confirmation</h4>                                        
                                    </div>
                                </div>
                                <div class="row">
                                     <table class="table table-bordered" style="">
                                    <thead>
                                        <tr>
                                            <th colspan="2">
                                                <img src="<?php echo base_url();?>evanta/assets/img/bg/home-static-1.jpg" width="100%">
                                            </th>
                                        </tr>
                                        <tr>
                                            <th> Transaction ID</th>
                                            <td><?php echo $txnid;?></td>
                                        </tr>
                                        <tr>
                                            <th>Name</th>
                                            <td><?php echo ucfirst(strtolower($_SESSION['firstName']))." ".ucfirst(strtolower($_SESSION['lastName']));?></td>
                                        </tr>
                                        <tr>
                                            <th>Contact No.</th>
                                            <td><?php echo $_SESSION['mobile'];?></td>
                                        </tr>                                       
                                        <tr>
                                            <th>Email</th>
                                            <td><?php echo $_SESSION['email'];?></td>
                                        </tr>
                                        <tr>
                                            <th>Tickets</th>
                                            <td><?php echo $_SESSION['tickets'];?></td>
                                        </tr>
                                        <tr>
                                            <th>
                                                Amount
                                            </th>
                                            <td><?php echo $_SESSION['totalCost'];?></td>
                                        </tr>
                                        <tr>
                                <th>
                                    <?php echo $category;?>
                                </th>
                                <td>                                    
                                        <?php $pass = $this->db->get_where('passes',array('pass_id' => $_SESSION['pass_id']))->result_array();
                                            foreach ($pass as $pasr)
                                            {
                                                $counter = $pasr['counter'];
                                                $availables = $pasr['availables'];
                                                
                                                $pack_entries = json_decode($pasr['package_id']);
                                                foreach ($pack_entries as $package_id)
                                                { 
                                                ?>
                                            -<?php echo $package_name = $this->db->get_where('packages',array('package_id' => $package_id))->row()->package_name;?>
                                            <br>                            
                                        <?php }
                                        }
                                        $counter = $counter + $_SESSION['tickets'];
                                        $availables = $availables - $_SESSION['tickets'];
                                        $dat['counter'] = $counter;
                                        $dat['availables'] = $availables;
                                        $this->db->where('pass_id',$_SESSION['pass_id']);
                                        $this->db->update('passes',$dat); 
                                        ?>
                                    
                                </td>
                            </tr>                                        
                                       
                                    </thead>
                                    
                                </table>                                   
                                    <div class="modal-footer">
                                        <button type="button" onClick="PrintElem('main-content')" class="btn btn-info btn-lg  border-none sbmt-btn"><i class="ti-printer"></i> Print</button>
                                            
                                        </div> 
                                </div>                                
                              
                            </div>
                        </div>
                    </div>
            
            <a href="<?php   echo base_url();?>"><h5>Home Page</h5></a> 
        </div>                 
                    
         
       
   </section>
</body>
</html>

<?php session_destroy(); 
 } 
}else{
     redirect(base_url());
}
?> 
<script type="text/javascript">
 function PrintElem(el){
    
	var restorepage = document.body.innerHTML;
	var printcontent = document.getElementById(el).innerHTML;
	document.body.innerHTML = printcontent;
        
	window.print();
        
	document.body.innerHTML = restorepage;
        window.location.reload();
      // return true;
}
</script>  