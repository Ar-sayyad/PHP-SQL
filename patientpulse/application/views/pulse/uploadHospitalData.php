<div class="row main-section">			
        <div class="col-lg-12 col-md-12">
            <div class="card">

                <div class="card-content">
                <form action="#" method="post" enctype="multipart/form-data" accept-charset="utf-8"> 
                    <table class="table form">                                                
                        <thead class="">

                            <tr>
                                <th>Upload File: <span class="required">*</span></th>
                                <th><input type="file"  name="file" id="file" required="" autocomplete="off" placeholder="file" class="form-control"></th>

                            </tr>
                          
                            <tr>
                                <th colspan="2" style="text-align:center">
                                    <button type="button" name="save" data-id="hello" id="saveEnvironment" class="btn btn-success" value="save"><i class="zmdi zmdi-cloud-upload"></i> Upload</button>
                                     <button type="reset" name="Reset" class="btn btn-info" value="reset"><i class="zmdi zmdi-replay"></i> Reset</button>
                                </th>
                            </tr>

                        </thead>

                    </table>
                </form>
                </div>
            </div>
        </div>	


</div>
<script>
    
   $(document).ready(function(){ 
        $("#saveEnvironment").click(function(){
            confirm('Project is Under Development...!');
        });
    });
        </script>

