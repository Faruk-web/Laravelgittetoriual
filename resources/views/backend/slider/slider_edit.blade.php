@extends('admin.admin_master')

{{-- section id is yeild name  --}}

@section('admin')

<div class="container-full"> 
 <section class="content">

<div class="row">  


<div class="col-lg-12">

 <div class="box">
   <div class="box-header with-border">
     <h3 class="box-title">Edit Slider</h3>
   </div>
   <!-- /.box-header -->
   <div class="box-body">
       <div class="table-responsive">
        

         <form  method="POST" action="{{ route('slider.update') }}" enctype="multipart/form-data" >
           @csrf           


           <input type="hidden" name="id" value="{{ $sliders->id }}">
           <input type="hidden" name="old_img" value="{{ $sliders->slider_img }}">
            
                  <div class="form-group">
                      <h5> <span class="text-danger">*</span> Slider Title</h5>
                      <div class="controls">
                      <input type="text" id="title" value="{{ $sliders->title }}" name="title" class="form-control" > 
                     
                     </div>

                                        


                      </div>                  
              
                  <div class="form-group">
                      <h5>Slider Discraption <span class="text-danger">*</span></h5>
                      <div class="controls">
                      <input type="text"  id="description" value="{{ $sliders->description }}" name="description" class="form-control" > 
                     </div>             


                      </div>                   

                   
                      <div class="form-group">
                      <h5> Slider Img <span class="text-danger">*</span></h5>
                      <div class="controls">
                      <input type="file" id="slider_img" name="slider_img" class="form-control" required=""> 
                       
                     
                      @error('slider_img')
                      <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>	
                      </span>
                  @enderror
                     
                     
                     </div>




                      </div>   
              
                  <div class="text-xs-right">
                  <input type="submit" class="btn btn-rounded btn-info" value="Add Slider">
              </div>

          </form>





         </div> <!-- table res.. end -->
       </div>  <!-- box body end -->      
    </div>      <!-- box end -->       
</div> <!-- col end -->

</div> <!--  row end-->
</section> <!--  content end-->
</div> <!--  row end-->






@endsection

