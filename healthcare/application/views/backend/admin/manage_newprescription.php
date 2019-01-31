<!--<button onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/new_prescription/');" 

    class="btn btn-primary pull-right">

        <?php echo get_phrase('new_prescription'); ?>

</button>-->
<?php
$patient_info = $this->db->get_where('patient', array('patient_id' => $patient_id))->result_array();
foreach ($patient_info as $row) {
 ?>
<div class="row">
        <div class="col-md-12">

            <div class="panel panel-primary" data-collapsed="0">

                <div class="panel-heading">
                    <div class="panel-title">
                        <h4><?php echo get_phrase('Patient_details'); ?></h4>
                    </div>
                </div>

                <div class="panel-body">
                    <table class="table table-bordered" width="100%">
					<tr>
						
						  <td><b><?php echo get_phrase('name'); ?> :</b></td>
						<td><p><?php echo $row['name']; ?></p></td>
						<td><b><?php echo get_phrase('mobile'); ?> :</b></td>
						<td><p><?php echo $row['phone']; ?></p></td>
						<td><b><?php echo get_phrase('aadhar_no'); ?> :</b></td>
						<td><p><?php echo $row['aadhar_card']; ?></p></td>
						
						
					</tr>
					
					<tr>
					<td><b><?php echo get_phrase('disease'); ?> :</b></td>
						<td><p><?php $name = $this->db->get_where('disease' , array('disease_id' => $row['disease_id'] ))->row()->name;
                          echo ucwords($name);?></p></td>
						
                        <td><b><?php echo get_phrase('age'); ?> :</b></td>
                        
                        <td><p><?php echo $row['age']; ?></p></td>
						<td><b><?php echo get_phrase('city'); ?> :</b></td>
						<td><p><?php $name = $this->db->get_where('city' , array('city_id' => $row['city_id'] ))->row()->name;
                          echo $name;?></p></td>
						 
					</tr>
					
					
					
					
					</table>					
               
                </div>

            </div>

        </div>
    </div>
<?php } ?>
<div style="clear:both;"></div>

<br>


<table class="table table-bordered table-striped datatable" id="table-2">

    <thead>

        <tr>

            <th><h5><?php echo get_phrase('sr');?></h5></th>
			
			<!--<th><h5><?php echo get_phrase('doctor');?></h5></th>-->

                       <th><h5><?php echo get_phrase('patient');?></h5></th>

			<th><h5><?php echo get_phrase('date');?></h5></th>

                       <th><h5><?php echo get_phrase('view');?></h5></th>
			
			<th><h5><?php echo get_phrase('delete');?></h5></th>

        </tr>

    </thead>



    <tbody>

        <?php $sr=1; foreach ($prescription_info as $row) { ?>   

            <tr>

                <td><?php echo $sr; ?></td>
				
				<!--<td>

                    <?php $name = $this->db->get_where('doctor' , array('doctor_id' => $row['doctor_id'] ))->row()->name;

                        echo $name;?>

                </td>-->
              <td>

                    <?php $name = $this->db->get_where('patient' , array('patient_id' => $row['patient_id'] ))->row()->name;

                        echo ucwords($name);?>

                </td>
				
				
				<td><?php echo $row['timestamp']; ?></td>

                

                <td>

                    <a  onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/show_newprescription/<?php echo $row['newpres_id']?>');" 

                        class="btn btn-default btn-sm btn-icon icon-left">

                            <i class="fa fa-eye"></i>

                            View Prescription

                    </a>

                    </td>

                    <td>
						<a href="<?php echo base_url();?>index.php?doctor/newprescription/delete/<?php echo $row['newpres_id']?>"

                            class="btn btn-danger btn-sm btn-icon icon-left" onclick="return checkDelete();">

                                <i class="entypo-cancel"></i>

                                Delete

                        </a>


                </td>

            </tr>

        <?php $sr++; } ?>

    </tbody>

</table>



<script type="text/javascript">

    jQuery(window).load(function ()

    {

        var $ = jQuery;



        $("#table-2").dataTable({

            "sPaginationType": "bootstrap",

            "sDom": "<'row'<'col-xs-3 col-left'l><'col-xs-9 col-right'<'export-data'T>f>r>t<'row'<'col-xs-3 col-left'i><'col-xs-9 col-right'p>>"

        });



        $(".dataTables_wrapper select").select2({

            minimumResultsForSearch: -1

        });



        // Highlighted rows

        $("#table-2 tbody input[type=checkbox]").each(function (i, el)

        {

            var $this = $(el),

                    $p = $this.closest('tr');



            $(el).on('change', function ()

            {

                var is_checked = $this.is(':checked');



                $p[is_checked ? 'addClass' : 'removeClass']('highlight');

            });

        });



        // Replace Checboxes

        $(".pagination a").click(function (ev)

        {

            replaceCheckboxes();

        });

    });

</script>