@extends('admin.admin_master')


 @section('admin')


 <div class="container-full">

    <!-- Main content -->
    <section class="content">
        <div class="row">

            <div class="box">
                <div class="box-header with-border">
                  <h4 class="box-title">Admin Profile Edit</h4>			  
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <div class="row">
                    <div class="col">  
    
                        
                        <form method="POST" action="{{ route('admin.update.password') }}">
                            @csrf
    
                          <div class="row"> 
    
                            <div class="col-lg-4">
    
                                <div class="form-group">
                                    <h5>Current Password <span class="text-danger">*</span></h5>
                                    <div class="controls">

                                        <input type="password" name="oldpassword"  id="current_password"     class="form-control" aria-invalid="false">
                                        </div>
                                    
                                </div>
                            </div>

    
                                <div class="col-lg-4">
    
                                <div class="form-group">
                                    <h5>New Password  <span class="text-danger">*</span></h5>

                                    <div class="controls">
                                        <input type="password" name="password"   id="password" class="form-control"> </div>
                                </div>
                            
                            </div> 


                            <div class="col-lg-4">    
                                <div class="form-group">
                                    <h5>Confirm Password  <span class="text-danger">*</span></h5>

                                    <div class="controls">
                                        <input type="password" name="password_confirmation"   id="password_confirmation" class="form-control"> </div>
                                </div>                            
                            </div> 





                        </div> <!-- end row -->
    
                            
                          <div class="text-xs-right">
                            <button type="submit" class="btn btn-rounded btn-info">Update Password</button>
                        </div>
                            
                        </form>
    
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->
                </div>
                <!-- /.box-body -->
              </div>
            



        </div>
    </section>
    <!-- /.content -->
  </div>


  @endsection


