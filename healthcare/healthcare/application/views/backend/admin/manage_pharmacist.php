<button onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/add_pharmacist/');" 

    class="btn btn-primary pull-right">

        <?php echo get_phrase('add_chemist'); ?>

</button>

<div style="clear:both;"></div>

<br>

<table class="table table-bordered table-striped datatable" id="table-2">

    <thead>

        <tr>

            <th><h5><?php echo get_phrase('Sr.');?></h5></th>
			
			<th><h5><?php echo get_phrase('type');?></h5></th>
			
			<th><h5><?php echo get_phrase('name');?></h5></th>

            <th><h5><?php echo get_phrase('Mobile');?></h5></th>
			
			<th><h5><?php echo get_phrase('email');?></h5></th>
			
            <th><h5><?php echo get_phrase('city');?></h5></th>

            <!--<th><h5><?php echo get_phrase('licence');?></h5></th>-->

            <th><h5><?php echo get_phrase('option');?></h5></th>

        </tr>

    </thead>



    <tbody>

        <?php $sr=1; foreach ($pharmacist_info as $row) { ?>   

            <tr>

                <td><?php echo $sr;?></td>
				
				<td><?php $name = $this->db->get_where('type' , array('type_id' => $row['type_id'] ))->row()->name;

                        echo ucwords($name);?></td>
						

                <td><?php echo ucwords($row['name']);?></td>
				
				<td><?php echo $row['phone']?></td>

                <td><?php echo $row['email']?></td>

                <td>

                    <?php $name = $this->db->get_where('city' , array('city_id' => $row['city_id'] ))->row()->name;

                        echo ucwords($name);?>

                </td>

                <!--<td><?php echo $row['licence_no']?></td>-->

                <td>

					<a  onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/view_chemist/<?php echo $row['pharmacist_id']?>');" 

                        class="btn btn-default btn-sm btn-icon icon-left">

                            <i class="entypo-eye"></i>

                            View

                    </a>
					
                    <a  onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/edit_pharmacist/<?php echo $row['pharmacist_id']?>');" 

                        class="btn btn-default btn-sm btn-icon icon-left">

                            <i class="entypo-pencil"></i>

                            Edit

                    </a>

                    <a href="<?php echo base_url();?>index.php?admin/pharmacist/delete/<?php echo $row['pharmacist_id']?>" 

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