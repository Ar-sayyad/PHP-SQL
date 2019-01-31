

<div style="clear:both;"></div>

<br>

<table class="table table-bordered table-striped datatable" id="table-2">

    <thead>

        <tr>

            <th><?php echo get_phrase('sr');?></th>

            <th><?php echo get_phrase('name');?></th>

            <th><?php echo get_phrase('email');?></th>

            <th><?php echo get_phrase('phone');?></th>
			
			<th><?php echo get_phrase('login');?></th>
        </tr>

    </thead>



    <tbody>

        <?php $sr=1; foreach ($operator_list_info as $row) { ?>   

            <tr>

                <td class="text-center"><?php echo $sr; ?></td>
                        <td>
						<?php $name = $this->db->get_where('doctor' , array('doctor_id' => $row['doctor_id'] ))->row()->name;

                        echo ucwords($name);?>
                           
                        </td>
                        <td>
                            <?php $email = $this->db->get_where('doctor' , array('doctor_id' => $row['doctor_id'] ))->row()->email;

                        echo $email;?>
                        </td>
                        <td>
                            <?php $phone = $this->db->get_where('doctor' , array('doctor_id' => $row['doctor_id'] ))->row()->phone;

                        echo $phone;?>
                        </td>
						<td>
						<a onclick="validate()" 

                        class="btn btn-default btn-sm btn-icon icon-left login" dname="<?php echo $name;?>" id="<?php echo $row['doctor_id']?>">

                            <i class="fa fa-lock"></i>

                            Login

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
$(document).ready(function(){
	$(".login").click(function() {
		$doctor_id = $(this).attr('id');
		$dname = $(this).attr('dname');
		$.post('<?php echo base_url();?>index.php?log/validate_login/', { id: $doctor_id ,dname: $dname }, function(data){
				if(data)
				{      
					//alert(data);
					window.location="<?php echo base_url() . 'index.php?doctor';?>";
						//$('#response').html(data);
				}
				
			});
		
			
		//alert(dname);
	});
});
</script>


