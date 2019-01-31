<?php

$patient_info = $this->db->get_where('patient', array('patient_id' => $param2))->result_array();
foreach ($patient_info as $row) {
 ?>

     <div id="prescription_print">
       
        <div class="row">
        <div class="col-md-12">

            <div class="panel panel-primary" data-collapsed="0">

                <div class="panel-heading">
                    <div class="panel-title">
                        <h3><?php echo get_phrase('patient_details'); ?></h3>
                    </div>
                </div>

                <div class="panel-body">
                            
                       
                            
                        <b><?php echo get_phrase('name'); ?> :</b>
                        
                        <p><?php echo $row['name']; ?></p>                        
                                             
                        <hr>
                        
                        <b><?php echo get_phrase('mobile'); ?> :</b>
                        
                        <p><?php echo $row['phone']; ?></p>
                        <hr>
						<b><?php echo get_phrase('gender'); ?> :</b>
                        
                        <p><?php if($row['gender']==1){ echo 'Male'; } elseif($row['gender']==2) { echo 'Female'; }; ?></p>
                        <hr>
						<b><?php echo get_phrase('age'); ?> :</b>
                        
                        <p><?php echo $row['age']; ?></p>
                        <hr>
                        
						 <b><?php echo get_phrase('aadhar_no'); ?> :</b>
                        
                        <p><?php echo $row['aadhar_card']; ?></p>
                        <hr>
						
                        <b><?php echo get_phrase('city'); ?> :</b>
                        
                        <p><?php $name = $this->db->get_where('city' , array('city_id' => $row['city_id'] ))->row()->name;
                          echo $name;?></p>
                       
                        <hr>
                         <b><?php echo get_phrase('disease'); ?> :</b>
                        
                        <p><?php $name = $this->db->get_where('disease' , array('disease_id' => $row['disease_id'] ))->row()->name;
                          echo $name;?></p>
                        
                        <hr>
                        
                      
                       

                </div>

            </div>

        </div>
    </div>
<?php } ?>
</div>
    <br>

  <a onClick="PrintElem('prescription_print')" class="btn btn-primary btn-icon icon-left hidden-print">

        Print

        <i class="entypo-doc-text"></i>

    </a>





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