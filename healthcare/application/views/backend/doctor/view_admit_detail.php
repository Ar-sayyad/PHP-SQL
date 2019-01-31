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
                    <?php $pname = $this->db->get_where('patient' , array('patient_id' => $row['patient_id'] ))->row()->name;
                          echo 'Patient Name: '.$pname;?><br>
                       <?php $age= $this->db->get_where('patient' , array('patient_id' => $row['patient_id'] ))->row()->age;
                          echo 'Age: '.$age;?><br>
                          <?php $sex= $this->db->get_where('patient' , array('patient_id' => $row['patient_id'] ))->row()->age;
                          echo 'Sex: '.$sex;?><br>
                 
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
                        <h3><?php echo get_phrase('admit_detail'); ?></h3>
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
                        
                        <b><?php echo get_phrase('refered_by'); ?> :</b>
                        
                        <p><?php echo $row['refered_by']; ?></p>
                        <hr>
                        
                                               
                        <b><?php echo get_phrase('provisional_diagnosis'); ?> :</b>
                        
                        <p><?php echo $row['provisional_diagnosis']; ?></p>
                        <hr>
                        <b><?php echo get_phrase('final_diagnosis'); ?> :</b>
                        
                        <p><?php echo $row['final_diagnosis']; ?></p>
                       
                        <hr>
                        <b><?php echo get_phrase('relative'); ?> :</b>
                        
                        <p><?php echo $row['relative']; ?></p>
                        <hr>
                        
                        <b><?php echo get_phrase('relation_with_patient'); ?> :</b>
                        
                        <p><?php echo $row['relation_with_patient']; ?></p>
                        <hr>
                        
                        
                        <b><?php echo get_phrase('relative_phone'); ?> :</b>
                        
                        <p><?php echo $row['relative_phone']; ?></p>

                       

                </div>

            </div>

        </div>
    </div>
<?php } ?>
</div>
    <br>

    <a onClick="PrintElem('#prescription_print')" class="btn btn-primary btn-icon icon-left hidden-print">
        Print
        <i class="entypo-doc-text"></i>
    </a>





<script type="text/javascript">

    function PrintElem(elem)
    {
        Popup($(elem).html());
    }

    function Popup(data)
    {
        var mywindow = window.open('', 'prescription', 'height=400,width=600');
        mywindow.document.write('<html><head><title>Prescription</title>');
        mywindow.document.write('<link rel="stylesheet" href="assets/css/neon-theme.css" type="text/css" />');
        mywindow.document.write('<link rel="stylesheet" href="assets/js/datatables/responsive/css/datatables.responsive.css" type="text/css" />');
        mywindow.document.write('</head><body >');
        mywindow.document.write(data);
        mywindow.document.write('</body></html>');

        mywindow.print();
        mywindow.close();

        return true;
    }

</script>