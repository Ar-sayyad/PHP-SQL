    <script type="text/javascript">
	function showAjaxModal(url)
	{
            $.post(url, { id: '1' }, function(data){
            
			if(data)
			{
                            jQuery('#modal_ajax .modal-body').html(data);
				//$("#popup").html(data);
			}
                    });
                     jQuery('#modal_ajax .modal-body').html('<div style="text-align:center;margin-top:20%;"><img src="<?php echo base_url();?>Theme/assets/img/loading.gif" style="height:80px;" /></div>');
//		
//		// LOADING THE AJAX MODAL
                    jQuery('#modal_ajax').modal('show', {backdrop: 'true'});
//                
       
	}        
     
	
	</script>
    
    <!-- (Ajax Modal)-->
    <div class="modal fade" id="modal_ajax" style="">
        <div class="modal-dialog" style="width: 900px;">
            <div class="modal-content" style="width: 100%;">
                
                <div class="modal-header">
                    <button type="button" class="card-close close" data-dismiss="modal" aria-hidden="true" data-dismiss="alert"><i class="zmdi zmdi-close"></i></button>
                    <h4 class="modal-title"><i class="zmdi zmdi-plus-circle-o" style="font-size:25px;font-weight: bold;"></i> Patient Pulse
                        <div class="success_msg" style="display: none"></div><div class="error_msg" style="display: none"></div> 
                          <div class="succes_msg" style="display: none"></div><div class="erro_msg" style="display: none"></div> 
                    </h4>                   
                </div>
                
                <div class="modal-body" style="min-height:750px; overflow:auto;margin-top: -20px;">                
                    
                    
                </div>
                
<!--                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>-->
            </div>
        </div>
    </div>
    
    
   

    
    
    <script type="text/javascript">
	function confirm_modal(delete_url , post_refresh_url)
	{
		$('#preloader-delete').html('');
		jQuery('#modal_delete').modal('show', {backdrop: 'static'});
		document.getElementById('delete_link').setAttribute("onClick" , "delete_data('" + delete_url + "' , '" + post_refresh_url + "')" );
		document.getElementById('delete_link').focus();
	}
        
	 function checkDelete()
    {
        var chk=alert("Are You Sure To Delete This !  \nUnder Development..!");
        if(chk)
        {
          return true;  
        }
        else{
            return false;
        }
    }
    
     function hidetab(){    
            //$('#mssg').hide();
            $('.success_msg').hide();
            $('.error_msg').hide();  
             $('.succes_msg').hide();
            $('.erro_msg').hide();  
          }
            //setTimeout(hidetab,5000);
</script>
    
    <!-- (Normal Modal)-->
    