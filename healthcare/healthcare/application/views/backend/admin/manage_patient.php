<!--<button onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/add_patient/');" 

    class="btn btn-primary pull-right">

        <?php echo get_phrase('add_patient'); ?>

</button>-->

<div style="clear:both;"></div>

<br>

<table class="table table-bordered table-striped datatable" id="table-2">

    <thead>

        <tr>

            <th><?php echo get_phrase('sr');?></th>

            <th><?php echo get_phrase('name');?></th>
			
			<th><?php echo get_phrase('phone');?></th>

            <th><?php echo get_phrase('aadhar_no');?></th>            

            <th><?php echo get_phrase('city');?></th>
			
			<!--<th><?php echo get_phrase('age');?></th>-->
			
			<th><?php echo get_phrase('disease');?></th>

                <th><?php echo get_phrase('prescription');?></th>

            <th><?php echo get_phrase('options');?></th>

        </tr>

    </thead>



    <tbody>

        <?php $sr=1; foreach ($patient_info as $row) { ?>   

            <tr>

                <td><?php echo $sr;?></td>

                <td><?php echo ucwords($row['name']);?></td>

                <td><?php echo $row['phone']?></td>

                <td><?php echo $row['aadhar_card']?></td>

                <td><?php $name = $this->db->get_where('city' , array('city_id' => $row['city_id'] ))->row()->name;

                        echo ucwords($name);?></td>
						
				<!--<td><?php echo $row['age']?></td>-->

                <td><?php $name = $this->db->get_where('disease' , array('disease_id' => $row['disease_id'] ))->row()->name;

                        echo ucwords($name);?></td>
        <td>
                  <a href="<?php echo base_url();?>index.php?admin/prescript/<?php echo $row['patient_id']?>" 

                        class="btn btn-default btn-sm btn-icon icon-left">

                            <i class="entypo-eye"></i>

                            prescription

                    </a>
</td>


                <td>
					
					<a  onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/view_patient/<?php echo $row['patient_id']?>');" 

                        class="btn btn-default btn-sm btn-icon icon-left">

                            <i class="entypo-eye"></i>

                            view

                    </a>
					
                    <a  onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/edit_patient/<?php echo $row['patient_id']?>');" 

                        class="btn btn-default btn-sm btn-icon icon-left">

                            <i class="entypo-pencil"></i>

                            Edit

                    </a>

                    <a href="<?php echo base_url();?>index.php?admin/patient/delete/<?php echo $row['patient_id']?>" 

                        class="btn btn-danger btn-sm btn-icon icon-left" onclick="return checkDelete();">

                            <i class="entypo-cancel"></i>

                            Delete

                    </a>

                </td>

            </tr>

        <?php  $sr++; } ?>

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