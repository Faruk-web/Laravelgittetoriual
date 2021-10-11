@extends('admin.admin_master')

{{-- section id is yeild name  --}}

@section('admin')

<div class="container-full"> 
 <section class="content">

<div class="row">
    <div class="col-lg-8">

       <div class="box">
         <div class="box-header with-border">
           <h3 class="box-title"> Slider</h3>
         </div>
         <!-- /.box-header -->
         <div class="box-body">
             <div class="table-responsive">
               <table id="example1" class="table table-bordered table-striped">
                 <thead>
                     <tr>
                         <th>Slider Image</th>
                         <th>Title</th>
                         <th>Discraption</th>
                         <th>Status</th>
                         <th>Action</th>
                        
                     </tr>
                 </thead>
                 <tbody>

                   @foreach ($sliders as $item)
                   <tr>
                    <td> <img src="{{ asset($item->slider_img) }}" style="height:80px; width:200px;"> </td>
                       <td>{{ $item->title }}r</td>
                       <td>{{ $item->description }}</td>

                       <td>
                        @if($item->status == 1)
                           <span class="badge badge-pill badge-success">Active</span>
                        @else
                        <span class="badge badge-pill badge-success">Deactive</span>
                        @endif
                     </td>

                       <td width="30%">
                        <a href="{{ route('slider.edit',$item->id) }}" class="btn btn-info btn-sm" title="Edit Data"><i class="fa fa-pencil"></i> </a>

                           <a href="{{ route('slider.delete', $item->id ) }}" class="btn btn-danger btn-sm" id="#">Delete</a>
                       
                           @if($item->status == 1)
                           <a href="{{ route('slider.deactive',$item->id) }}" class="btn btn-danger btn-sm" title="Product Deactive Now"><i class="fa fa-arrow-down"></i> </a>
                        @else
                        <a href="{{ route('slider.active',$item->id) }}" class="btn btn-success btn-sm" title="Product Active Now"><i class="fa fa-arrow-up"></i> </a>
                        @endif
                       
                        </td> 
                   </tr>  
                   @endforeach
                     
                     
                 </tbody>
             
               </table>
               </div> <!-- table res.. end -->
             </div>  <!-- box body end -->      
          </div>      <!-- box end -->       
     </div> <!-- col end --> 



<!--================================form add brand======================================- -->

<div class="col-lg-4">

 <div class="box">
   <div class="box-header with-border">
     <h3 class="box-title">Add Slider</h3>
   </div>
   <!-- /.box-header -->
   <div class="box-body">
       <div class="table-responsive">
        

         <form  method="POST" action="{{ route('slider.store') }}" enctype="multipart/form-data" >
           @csrf           
            
                  <div class="form-group">
                      <h5> <span class="text-danger">*</span> Slider Title</h5>
                      <div class="controls">
                      <input type="text" id="title" name="title" class="form-control" > 
                     
                     </div>

                                        


                      </div>                  
              
                  <div class="form-group">
                      <h5>Slider Discraption <span class="text-danger">*</span></h5>
                      <div class="controls">
                      <input type="text"  id="description" name="description" class="form-control" > 
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

