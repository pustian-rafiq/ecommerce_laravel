@extends('admin.admin_layouts')

@section('admin_content')
  <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <a class="breadcrumb-item" href="index.html">Tables</a>
        <span class="breadcrumb-item active">Coupon Table</span>
      </nav>

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Coupon Table</h5>
         
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Coupon Table
          <a href="{{ route('categories') }}" class="btn btn-sm btn-warning" style="float: right;" data-toggle="modal" data-target="#modaldemo3">Back</a>
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
            <form method="post" action="{{url('update/coupon/'.$coupon->id)  }}">
              @csrf
              
                <div class="form-group">
                  <label for="exampleInputEmail1">Coupon Code</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $coupon->coupon_code }}" name="coupon_code">
                </div>
                 <div class="form-group">
                  <label for="exampleInputEmail1">Coupon Discount</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $coupon->discount }}" name="discount">
                </div>
              
              <div class="modal-footer">
                <button type="submit" class="btn btn-info pd-x-20">Coupon Update</button>
                
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