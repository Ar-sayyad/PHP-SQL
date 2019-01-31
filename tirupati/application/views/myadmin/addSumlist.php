<!-- Styles -->
    <section id="main-content">
        
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card alert">
                                <div class="card-body">
                                    <div class="card-header m-b-20">
                                        <h4>Add New Sum</h4>                                        
                                    </div>
                                </div>
                                <form action="<?php echo base_url();?>Adminity/sumList/addSumlist" method="post">   
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Summation Name <span class="required">*</span></label>
                                                   
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                     <input type="text"  name="sum_name" required="" class="form-control border-none input-flat  bg-ash" placeholder="Summation Name">
                                            </div>
                                        </div>
                                    </div>
                                   
                                                       
                                                                       
                                    <div class="col-md-12">
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-info btn-lg  border-none sbmt-btn"><i class="ti-save"></i> Add Sum List</button>
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
