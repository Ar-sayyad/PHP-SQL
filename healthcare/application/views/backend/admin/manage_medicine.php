<button onclick="showAjaxModal('<?php echo base_url(); ?>index.php?modal/popup/add_medicine/');"     class="btn btn-primary pull-right">        <?php echo get_phrase('add_medicine'); ?></button><div style="clear:both;"></div><br><table class="table table-bordered table-striped datatable" id="table-2">    <thead>        <tr>						 <th><h5><?php echo get_phrase('sr'); ?></h5></th>            <th><h5><?php echo get_phrase('name'); ?></h5></th>            <th><h5><?php echo get_phrase('edit'); ?></h5></th>            <th><h5><?php echo get_phrase('delete'); ?></h5></th>        </tr>    </thead>    <tbody>        <?php $sr=1; foreach ($medicine_info as $row) { ?>               <tr>				<td><?php echo $sr; ?></td>				                <td><?php echo ucwords($row['name']); ?></td>                <!--<td>                    <?php $name = $this->db->get_where('medicine_category' , array('medicine_category_id' => $row['medicine_category_id'] ))->row()->name;                        echo strtoupper($name);?>                </td>-->                                                               <td>                    <a  onclick="showAjaxModal('<?php echo base_url(); ?>index.php?modal/popup/edit_medicine/<?php echo $row['medicine_id'] ?>');"                         class="btn btn-default btn-sm btn-icon icon-left">                        <i class="entypo-pencil"></i>                        Edit                    </a>					</td>					<td>                    <a href="<?php echo base_url(); ?>index.php?admin/medicine/delete/<?php echo $row['medicine_id'] ?>"                        class="btn btn-danger btn-sm btn-icon icon-left" onclick="return checkDelete();">                        <i class="entypo-cancel"></i>                        Delete                    </a>                </td>            </tr>        <?php  $sr++; } ?>    </tbody></table><script type="text/javascript">    jQuery(window).load(function ()    {        var $ = jQuery;        $("#table-2").dataTable({            "sPaginationType": "bootstrap",            "sDom": "<'row'<'col-xs-3 col-left'l><'col-xs-9 col-right'<'export-data'T>f>r>t<'row'<'col-xs-3 col-left'i><'col-xs-9 col-right'p>>"        });        $(".dataTables_wrapper select").select2({            minimumResultsForSearch: -1        });        // Highlighted rows        $("#table-2 tbody input[type=checkbox]").each(function (i, el)        {            var $this = $(el),                    $p = $this.closest('tr');            $(el).on('change', function ()            {                var is_checked = $this.is(':checked');                $p[is_checked ? 'addClass' : 'removeClass']('highlight');            });        });        // Replace Checboxes        $(".pagination a").click(function (ev)        {            replaceCheckboxes();        });    });</script>