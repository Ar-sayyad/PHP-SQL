<?php //include('skin.php');?>

<footer id="footer-bar" class="row">
<p id="footer-copyright" class="col-xs-12">
  &copy;AutoIT
</p>
</footer>
</div>
</div>
</div>
</div>
 
  
 


<script src="<?php echo base_url();?>partnerIT/js/snap.svg-min.js"></script>
<script src="<?php echo base_url();?>partnerIT/js/notificationFx.js"></script>
<script src="<?php echo base_url();?>partnerIT/js/demo-skin-changer.js"></script>  
<script src="<?php echo base_url();?>partnerIT/js/jquery.js"></script>
<script src="<?php echo base_url();?>partnerIT/js/bootstrap.js"></script>
<script src="<?php echo base_url();?>partnerIT/js/jquery.nanoscroller.min.js"></script>
<script src="<?php echo base_url();?>partnerIT/js/demo.js"></script>  
 
<script src="<?php echo base_url();?>partnerIT/js/jquery.dataTables.js"></script>
<script src="<?php echo base_url();?>partnerIT/js/dataTables.fixedHeader.js"></script>
<script src="<?php echo base_url();?>partnerIT/js/dataTables.tableTools.js"></script>
<script src="<?php echo base_url();?>partnerIT/js/jquery.dataTables.bootstrap.js"></script>
<script src="<?php echo base_url();?>partnerIT/js/modernizr.custom.js"></script>
<script src="<?php echo base_url();?>partnerIT/js/classie.js"></script>
<script src="<?php echo base_url();?>partnerIT/js/modalEffects.js"></script>
<script src="<?php echo base_url();?>partnerIT/js/scripts.js"></script>
<script src="<?php echo base_url();?>partnerIT/js/pace.min.js"></script>
<script src="<?php echo base_url();?>parterIT/js/neon-custom-ajax.js"></script>
 <script>
    function checkDelete()
    {
        var chk=confirm("Are You Sure To Delete This !");
        if(chk)
        {
          return true;  
        }
        else{
            return false;
        }
    }
</script>
<script>
		(function() {		
			
			//Slide On Top effect
			var bttnSlideOnTop = document.getElementById( 'notification-trigger-slide-on-top' );

			// make sure..
			bttnSlideOnTop.disabled = false;

			bttnSlideOnTop.addEventListener( 'click', function() {
				// simulate loading (for demo purposes only)
				classie.add( bttnSlideOnTop, 'active' );
				classie.remove( bttnSlideOnTop, 'active' );
				
				// create the notification
				var notification = new NotificationFx({
					message : '<span class="icon fa fa-bullhorn fa-2x"></span><p>You have some interesting news in your inbox. Go <a href="#">check it out</a> now.</p>',
					layout : 'bar',
					effect : 'slidetop',
					type : 'error', // notice, warning or error
					onClose : function() {
						bttnSlideOnTop.disabled = false;
					}
				});

				// show the notification
				notification.show();
				
				// disable the button (for demo purposes only)
				this.disabled = true;
			} );
			
			
		})();
	</script>
<script>
    $(".html5editor").wysihtml5();
</script>

<?php if ($this->session->flashdata('message') != ""){ ?>
    <script>
        toastr.info('<?php echo $this->session->flashdata('message');?>');
    </script>
<?php } ?> 

<script>
	$(document).ready(function() {
		$('#addUserButton').click(function(){
                   // alert("hello");
			$('#res').html("<img width='20' src='<?php echo base_url();?>/partnerIT/img/loader.GIF'>");
               $firstname = $('#firstname').val();
               $lastname = $('#lastname').val();
			   $user_type = $('#user_type').val();
			   $useremail = $('#useremail').val();
			   $Address = $('#Address').val();
			   $usercontact = $('#usercontact').val();
			   $password = $('#password').val();
			   $confirm = $('#confirm').val();
               if($firstname == '' || $lastname == '')
               {
				   $('#res').html("<span style='color:red;text-transform:capitalize;font-size:14px'>Enter All Details..!</span>");
                   return false;
               }
//               $(this).attr('disabled','disabled');
               $.post('<?php echo base_url();?>index.php/TestApp/create',{ firstname:$firstname,lastname:$lastname,email:$useremail,address:$Address,user_type:$user_type,contact:$usercontact,password:$password,confirm:$confirm},function(data){
                  //alert(data);
				  $('#res').html("<h5><span style='color:red;text-transform:capitalize;font-size:14px'>"+data+"</span></h5>");
                  /*if(data==1) 
                  {	
                  	  $('#res').html("<h5><span style='color:green;text-transform:capitalize;font-size:14px'>Login Success..!</span><br><img width='20' src='<?php echo base_url();?>/partnerIT/img/loader.GIF'><br><span style='font-size:14px'>Redirecting.....</span></h5>");
                      window.location="<?php echo base_url();?>";

                      //window.location="index.php";
                  }else{
//                    
                      $('#res').html("<h5><span style='color:red;text-transform:capitalize;font-size:14px'>Invalid login Details.</span></h5>");
                  }*/
               });
		});
		
		var table = $('#table-example').dataTable({
			'info': false,
			'sDom': 'lTfr<"clearfix">tip',
			'oTableTools': {
	            'aButtons': [
	                {
	                    'sExtends':    'collection',
	                    'sButtonText': '<i class="fa fa-cloud-download"></i>&nbsp;&nbsp;&nbsp;<i class="fa fa-caret-down"></i>',
	                    'aButtons':    [ 'csv', 'xls', 'pdf', 'copy', 'print' ]
	                }
	            ]
	        }
		});
		
	    var tt = new $.fn.dataTable.TableTools( table );
		$( tt.fnContainer() ).insertBefore('div.dataTables_wrapper');
		
		var tableFixed = $('#table-example-fixed').dataTable({
			'info': false,
			'pageLength': 50
		});
		
		new $.fn.dataTable.FixedHeader( tableFixed );
	});
	</script>
