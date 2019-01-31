<?php
//$bed_info = $this->db->get_where('bed')->result_array();

$single_bed_allotment_info = $this->db->get_where('bed_allotment', array('bed_allotment_id' => $param2))->result_array();
foreach ($single_bed_allotment_info as $row) {
    $bed_info = $this->db->get_where('bed', array('bed_id' => $row['bed_id']))->result_array();
    $patient_info   = $this->db->get_where('patient' , array('patient_id' => $row['patient_id'] ))->result_array();
   
?>

     <div id="prescription_print">
        <table width="100%" border="0">
            <tr>
                <td align="left" valign="top">
                    <?php foreach ($patient_info as $row2){ ?>
                        <?php echo 'Patient Name: '.$row2['name']; ?><br>
                        <?php echo 'Age: '.$row2['age']; ?><br>
                        <?php echo 'Sex: '.$row2['sex']; ?><br>
                    <?php } ?>
                </td>
                <td align="right" valign="top">
                    <?php $name = $this->db->get_where('doctor' , array('doctor_id' => $row['doctor_id'] ))->row()->name;
                          echo 'Doctor Name: '.$name;?><br>
                           <?php $phone = $this->db->get_where('doctor' , array('doctor_id' => $row['doctor_id'] ))->row()->phone;
                          echo 'Contact: '.$phone;?><br>
                    
                </td>
            </tr>
        </table>
        <hr>
        <div class="row">
        <div class="col-md-12">

            <div class="panel panel-primary" data-collapsed="0">

                <div class="panel-heading">
                    <div class="panel-title">
                        <h3><?php echo get_phrase('Discharge_detail'); ?></h3>
                    </div>
                </div>

                <div class="panel-body">
                            
                        <b><?php echo get_phrase('bed_number'); ?> :</b>
                        
                        <p><?php $name = $this->db->get_where('bed' , array('bed_id' => $row['bed_id'] ))->row()->bed_number;
                          echo $name;?></p>
                        
                        <hr>
                            
                        <b><?php echo get_phrase('admit_date'); ?> :</b>
                        
                        <p><?php echo $row['allotment_timestamp']; ?></p>
                        
                        <hr>
                        
                        <b><?php echo get_phrase('discharge_date'); ?> :</b>
                        
                        <p><?php echo $row['discharge_timestamp']; ?></p>
                        
                        <hr>
                        
                        <b><?php echo get_phrase('consultancy'); ?> :</b>
                        
                        <p><?php echo $row['consultancy']; ?></p>
                        <hr>
                        
                        <b><?php echo get_phrase('surgery_date'); ?> :</b>
                        
                        <p><?php echo $row['surgery_date']; ?></p>
                        <hr>
                        
                        <b><?php echo get_phrase('drug_allergies'); ?> :</b>
                        
                        <p><?php echo $row['drug_allergies']; ?></p>
                        <hr>
                        
                        <b><?php echo get_phrase('final_dignosis'); ?> :</b>
                        
                        <p><?php echo $row['final_dignosis']; ?></p>
                        <hr>
                        
                        <b><?php echo get_phrase('chief_complaints'); ?> :</b>
                        
                        <p><?php echo $row['chief_complaints']; ?></p>
                         <hr>
                        
                        <b><?php echo get_phrase('temperature'); ?> :</b>
                        
                        <p><?php echo $row['temperature']; ?></p>
                         <hr>
                        
                        <b><?php echo get_phrase('pulse'); ?> :</b>
                        
                        <p><?php echo $row['pulse']; ?></p>
                        <hr>
                        
                        <b><?php echo get_phrase('blood_pressure'); ?> :</b>
                        
                        <p><?php echo $row['blood_pressure']; ?></p>
                        <hr>
                        
                        <b><?php echo get_phrase('clinical_examination'); ?> :</b>
                        
                        <p><?php echo $row['clinical_exam']; ?></p>
                        <hr>
                        
                        <b><?php echo get_phrase('investigation_detail'); ?> :</b>
                        
                        <p><?php echo $row['investigation_detail']; ?></p>
                        <hr>
                        
                        <b><?php echo get_phrase('consultation_reference'); ?> :</b>
                        
                        <p><?php echo $row['consultation_ref']; ?></p>
                        <hr>
                        
                        <b><?php echo get_phrase('treatment_given'); ?> :</b>
                        
                        <p><?php echo $row['treatment_given']; ?></p>
                         <hr>
                        
                        <b><?php echo get_phrase('condition_of_discharge'); ?> :</b>
                        
                        <p><?php echo $row['condition_of_discharge']; ?></p>
                         <hr>
                        
                        <b><?php echo get_phrase('advice'); ?> :</b>
                        
                        <p><?php echo $row['advice']; ?></p>
                         <hr>
                        
                        <b><?php echo get_phrase('mediation'); ?> :</b>
                        
                        <p><?php echo $row['mediation']; ?></p>


                       

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





<link rel="stylesheet" href="assets/css/neon-theme.css" type="text/css" />
<link rel="stylesheet" href="assets/js/datatables/responsive/css/datatables.responsive.css" type="text/css" />
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