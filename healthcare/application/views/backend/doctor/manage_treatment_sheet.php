<div style="clear:both;"></div><br><table class="table table-bordered table-striped datatable" id="table-2">    <thead>        <tr>            <th><?php echo get_phrase('bed_number');?></th>            <th><?php echo get_phrase('bed_category');?></th>            <th><?php echo get_phrase('patient');?></th>            <th><?php echo get_phrase('date');?></th>            <th><?php echo get_phrase('Treatment_sheet');?></th>                               </tr>    </thead>    <tbody>        <?php foreach ($treatment_sheet_info as $row) { ?>               <tr><!--                <td>                    TI<?php echo $row['treatment_sheet_id']?>                </td>-->                <td>                    <?php $bed_id = $this->db->get_where('bed_allotment' , array('bed_allotment_id' => $row['bed_allotment_id'] ))->row()->bed_id;                        $bed_number = $this->db->get_where('bed' , array('bed_id' => $bed_id ))->row()->bed_number;                        echo $bed_number;?>                </td>                <td>                    <?php $type = $this->db->get_where('bed' , array('bed_id' => $bed_id ))->row()->type;                    $name = $this->db->get_where('bed_category' , array('bed_category_id' => $type ))->row()->name;                        echo $name;?>                </td>                <td>                    <?php $name = $this->db->get_where('patient' , array('patient_id' => $row['patient_id'] ))->row()->name;                        echo $name;?>                </td>                <td><?php echo  $row['date_given']; ?></td>                <td>                    <a  onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/view_treatment_sheet/<?php echo $row['treatment_sheet_id']?>');"                         class="btn btn-default btn-sm btn-icon icon-left">                            <i class="entypo-eye"></i>                            Treatment Sheet                    </a>                </td>                            </tr>        <?php } ?>    </tbody></table><script type="text/javascript">    jQuery(window).load(function ()    {        var $ = jQuery;        $("#table-2").dataTable({            "sPaginationType": "bootstrap",            "sDom": "<'row'<'col-xs-3 col-left'l><'col-xs-9 col-right'<'export-data'T>f>r>t<'row'<'col-xs-3 col-left'i><'col-xs-9 col-right'p>>"        });        $(".dataTables_wrapper select").select2({            minimumResultsForSearch: -1        });        // Highlighted rows        $("#table-2 tbody input[type=checkbox]").each(function (i, el)        {            var $this = $(el),                    $p = $this.closest('tr');            $(el).on('change', function ()            {                var is_checked = $this.is(':checked');                $p[is_checked ? 'addClass' : 'removeClass']('highlight');            });        });        // Replace Checboxes        $(".pagination a").click(function (ev)        {            replaceCheckboxes();        });    });</script>