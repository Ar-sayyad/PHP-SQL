<!--<button onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/add_bed_allotment/');" 
    class="btn btn-primary pull-right">
        <?php echo get_phrase('add_bed_allotment'); ?>
</button>-->
<div style="clear:both;"></div>
<br>
<table class="table table-bordered table-striped datatable" id="table-2">
    <thead>
        <tr>
            <th><?php echo get_phrase('bed_number');?></th>
            <th><?php echo get_phrase('bed_type');?></th>
            <th><?php echo get_phrase('patient');?></th>
            <th><?php echo get_phrase('admit_date');?></th>
            <th><?php echo get_phrase('discharge_date');?></th>
            <th><?php echo get_phrase('Detail');?></th>
            <th><?php echo get_phrase('status');?></th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($bed_allotment_info as $row) { ?>   
            <tr>
                <td>
                    <?php $bed_number = $this->db->get_where('bed' , array('bed_id' => $row['bed_id'] ))->row()->bed_number;
                        echo $bed_number;?>
                </td>
                <td>
                    <?php $type = $this->db->get_where('bed' , array('bed_id' => $row['bed_id'] ))->row()->type;
                     $name = $this->db->get_where('bed_category' , array('bed_category_id' => $type ))->row()->name;
                     echo $name;?>
                </td>
                <td>
                    <?php $name = $this->db->get_where('patient' , array('patient_id' => $row['patient_id'] ))->row()->name;
                        echo $name;?>
                </td>
                <td><?php echo  $row['allotment_timestamp']; ?></td>
                <td><?php echo $row['discharge_timestamp']; ?></td>
                <td>
                <a  onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/discharge_detail/<?php echo $row['bed_allotment_id']?>');" 
                        class="btn btn-default btn-sm btn-icon icon-left">
                            <i class="fa fa-eye"></i>
                            Discharge Detail
                    </a>
                    </td>
                <td>
                   
                    
                        <a class="btn btn-default btn-sm btn-icon icon-left">
                            <i class="fa fa-check"></i>
                            Discharged
                        </a>

                </td>
            </tr>
        <?php } ?>
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