@extends('admin.admin_layouts')

@section('admin_content')
  <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <a class="breadcrumb-item" href="index.html">Tables</a>
        <span class="breadcrumb-item active">Category Table</span>
      </nav>

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Update Brand</h5>
         
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Update Brand
          <a href="{{ route('brands') }}" class="btn btn-sm btn-warning" style="float: right;" data-toggle="modal" data-target="#modaldemo3">Back</a>
      </h6>

          
    @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif
            <form method="post" action="{{url('update/brand/'.$brand->id)  }}" enctype="multipart/form-data">
              @csrf
              
                <div class="form-group">
                  <label for="exampleInputEmail1">Brand Name</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $brand->brand_name }}" name="brand_name" required="">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Brand Logo</label>
                  <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="brand_logo">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Old Logo</label>
                   <img src="{{ URL::to($brand->brand_logo) }}" style="height: 70px; width: 90px;">
                 <input type="hidden" name="old_logo" value="{{ $brand->brand_logo }}">
                </div>
              
              <div class="modal-footer">
                <button type="submit" class="btn btn-info pd-x-20">Update Brand</button>
                
              </div>
            </form>
          <div class="table-wrapper">
            
          </div><!-- table-wrapper -->
        </div><!-- card -->
      </div><!-- sl-pagebody -->
   </div><!-- sl-mainpanel -->

    
<!--modal-->
        <!-- LARGE MODAL -->
       
            
          
          
            
           
      
@endsection