<?php  
define('MERCHANT_KEY', 'duMPGPHe');
define('SALT', 'EdHyvx4rBw');
//define('PAYU_BASE_URL', 'https://test.payu.in');    //Testing url
define('PAYU_BASE_URL', 'https://secure.payu.in');  //actual URL
define('SUCCESS_URL', base_url().'Events/success');  //have complete url
define('FAIL_URL', base_url());    //add complete url 
$txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);

$email = $_POST['email'];//session
$mobile = $_POST['mobile'];//session
$firstName = $_POST['firstName'];//session
$lastName = $_POST['lastName'];//session
$totalCost = $_POST['totalCost'];//session
$tickets = $_POST['tickets'];//session
$earlybird = $_POST['earlybird'];//session
$price = $_POST['price'];//session
$pass_id = $_POST['pass_id'];//session

$_SESSION['firstName'] = $firstName;
$_SESSION['lastName'] = $lastName;
$_SESSION['email'] = $email;
$_SESSION['mobile'] = $mobile;
$_SESSION['pass_id'] = $pass_id;
$_SESSION['earlybird'] = $earlybird;
$_SESSION['price'] = $price;
$_SESSION['tickets'] = $tickets;
$_SESSION['totalCost'] = $totalCost;
$_SESSION['category'] = $_POST['category'];
$_SESSION['salt'] = SALT;
$hash         = '';
//Below is the required format need to hash it and send it across payumoney page. UDF means User Define Fields.
//$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
$hash_string = MERCHANT_KEY."|".$txnid."|".$totalCost."|"."productinfo|".$firstName."|".$email."|||||||||||".SALT;
$hash = strtolower(hash('sha512', $hash_string));
$action = PAYU_BASE_URL . '/_payment'; 

?>
<form action="<?php echo $action; ?>" method="post" name="payuForm" id="payuForm" style="display: none">
    <input type="text" name="key" value="<?php echo MERCHANT_KEY; ?>" />
     <input type="text" name="salt" value="<?php echo SALT; ?>" />
    <input type="text" name="hash" value="<?php echo $hash ?>"/>
    <input type="text" name="txnid" value="<?php echo $txnid ?>" />
    <input name="amount" type="number" value="<?php echo $totalCost; ?>" />
    <input type="text" name="firstname" id="firstname" value="<?php echo $firstName; ?>" />
    <input type="email" name="email" id="email" value="<?php echo $email; ?>" />
    <input type="text" name="phone" value="<?php echo $mobile; ?>" />
    <textarea name="productinfo"><?php echo "productinfo"; ?></textarea>
    <input type="text" name="surl" value="<?php echo SUCCESS_URL; ?>" />
    <input type="text" name="furl" value="<?php echo  FAIL_URL?>"/>
    <input type="text" name="service_provider" value="payu_paisa"/>
    <input type="text" name="lastname" id="lastname" value="<?php echo $lastName ?>" />
    <input type="submit">
</form>
<script type="text/javascript">
    var payuForm = document.forms.payuForm;
    payuForm.submit();
</script>