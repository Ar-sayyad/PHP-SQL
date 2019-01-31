
function validateEmail(emailField)
{

        var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

        if (reg.test(emailField) == false) 
        {
        	
           $('#msg').html("Enter Valid Email Id");
                    	$('#msg').removeClass("hidden"); 
                    	setTimeout(function(){
                        						flushdata();
                    				}, 3000);
            return false;
        }
        else
        {
        	return true; 
        }
} 




function validateLength(data)
{
	
	if(data.length < 2)
	{
        	
           $('#msg').html("The Password field must be at least 3 characters in length.");
                    	$('#msg').removeClass("hidden");
                    	setTimeout(function(){
                        						flushdata();
                    				}, 3000);
            return false;
    }
    else
    { 
    	return true;
    }
	
}

 function isNumberKey(evt)
    {
     // alert("hi");
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57) )
            return false;

          return true;
    }

 

function ValidateAlpha(evt)
  {
    //alert("hiii");
      var keyCode = (evt.which) ? evt.which : evt.keyCode
      if ((keyCode < 65 || keyCode > 90) && (keyCode < 97 || keyCode >= 123) && keyCode != 32 && keyCode != 9 && keyCode != 8)
      return false;
      return true;
  }

  // function valid_time(evt)
  // {
  //   //alert("hiii");
  //     var keyCode = (evt.which) ? evt.which : evt.keyCode
  //     if ((keyCode)||(keyCode == 9))
  //     return false;
  //     return true;
  // }

 

function validate_mobile(contact_number)
  {
    //alert(document.getElementById('mobile_no').value);
    var mobile_no=$('#contact_number').val();
    var pattern = '^[7-9][0-9]{9}$';

    if(mobile_no.match(pattern))
    {
      
      return true;

    }
    else
    {    
    $("#mobile_no_err").show();  
      return false;
     // $this->form_validation->set_message('validate_mobile','Invalid Mobile Number');    
    }
  }





 
  
