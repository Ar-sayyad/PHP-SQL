<?php $sumlist_info = $this->db->get_where('sumlist_table', array('sumlist_id' => $param2))->result_array();
 foreach ($sumlist_info as $row) {
?>

    <section id="main-content">
        
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card alert">
                                <div class="card-body">
                                    <div class="card-header m-b-20">
                                        <h4>Update Sum List</h4>                                        
                                    </div>
                                </div>
                                <form action="<?php echo base_url();?>Auth/sumList/editSumlist/<?php echo $row['sumlist_id'];?>" method="post">   
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Sum Name <span class="required">*</span></label>
                                                  
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                  <input type="text"  name="sum_name" value="<?php echo $row['sum_name'];?>" required="" class="form-control border-none input-flat  bg-ash" placeholder="Sum Name">
                                            </div>
                                        </div>
                                    </div>                                  
                                    
                                
                                   
                                    <div class="col-md-12">
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-info btn-lg  border-none sbmt-btn"><i class="ti-pencil-alt"></i> Update Sum List</button>
                                            <button type="button" class="btn btn-primary btn-lg border-none sbmt-btn" data-dismiss="modal"><i class="ti-close"></i> Close</button>
                                        </div>  
                                   </div>
                                </div>                                
                                </form>
                            </div>
                        </div>
                    </div>
                  
                    
         
                    
   </section>

    <!-- scripit init-->
<?php }?>
