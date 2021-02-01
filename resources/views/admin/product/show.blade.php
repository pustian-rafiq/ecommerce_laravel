@extends('admin.admin_layouts')

@section('admin_content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" crossorigin="anonymous">

    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="#">Starlight</a>
        <span class="breadcrumb-item active">Product Section</span>
      </nav>
      <div class="sl-pagebody">
           <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Show Product Details</h6>
         
         
          
          <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product Name: <span class="tx-danger">*</span></label>
                   <p style="border:1px solid black; padding: 5px">{{    $product->product_name }}</p>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product Code: <span class="tx-danger">*</span></label>
                 <p style="border:1px solid black; padding: 5px">{{    $product->product_code }}</p>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Quantity <span class="tx-danger">*</span></label>
                  <p style="border:1px solid black; padding: 5px">{{    $product->product_quantity }}</p>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                   <p style="border:1px solid black; padding: 5px">{{ $product->category_name }}</p>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Sub Category: <span class="tx-danger">*</span></label>
                    <p style="border:1px solid black; padding: 5px">{{ $product->subcategory_name }}</p>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Brand: <span class="tx-danger">*</span></label>
                   <p style="border:1px solid black; padding: 5px">{{ $product->brand_name }}</p>
                   
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product Size: <span class="tx-danger">*</span></label><br>
                  <p style="border:1px solid black; padding: 5px">{{ $product->product_size }}</p>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product Color: <span class="tx-danger">*</span></label><br>
                  <p style="border:1px solid black; padding: 5px">{{ $product->product_color }}</p>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Selling Price <span class="tx-danger">*</span></label>
                  <p style="border:1px solid black; padding: 5px">{{ $product->selling_price }}</p>
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-12">
                <div class="form-group" style="border:1px solid grey;padding:10px; ">
                  <label class="form-control-label">Product Details<span class="tx-danger">*</span></label>
                    <br>
                  <p >{!! $product->product_details !!}</p>
                </div>  
              </div>
            

              <div class="col-lg-4">
                <lebel>Image One (Main Thumbnail)<span class="tx-danger">*</span></lebel>
                <img src="{{ URL::to($product->image_one) }}" height="70" width="70">
              </label>
              </div>
              <div class="col-lg-4">
                <lebel>Image Two <span class="tx-danger">*</span></lebel>
                 <img src="{{ URL::to($product->image_two) }}" height="70" width="70">
              </div>
              <div class="col-lg-4">
                <lebel>Image Three <span class="tx-danger">*</span></lebel>
                 <img src="{{ URL::to($product->image_three) }}" height="70" width="70">
              </div>
            </div><!-- row -->
            <br><hr>
            <div class="row">
       <div class="col-lg-4">
          <label >
            <span>Main Slider</span>
            @if($product->main_slider == 1)
                    <span class="badge badge-success">Active</span> 
                  @else
                  <span class="badge badge-danger">Inactive</span>  
                  @endif
                  
              </label>
         
        </div>
          <div class="col-lg-4">
     
           <label >
            <span>Hot Deal</span>
            @if($product->hot_deal == 1)
                    <span class="badge badge-success">Active</span> 
                  @else
                  <span class="badge badge-danger">Inactive</span>  
                  @endif
                  
          </label>
              </div>
         <div class="col-lg-4">
            <label >
            <span>Best Rated</span>
            @if($product->best_rated == 1)
                    <span class="badge badge-success">Active</span> 
                  @else
                  <span class="badge badge-danger">Inactive</span>  
                  @endif
                  
              </label>
          </div>
              <div class="col-lg-4">
              <label >
            <span>Trend Product</span>
            @if($product->trend == 1)
                    <span class="badge badge-success">Active</span> 
                  @else
                  <span class="badge badge-danger">Inactive</span>  
                  @endif
                  
              </label>
              </div>
              <div class="col-lg-4">
             <label >
            <span>Mid Slider</span>
            @if($product->mid_slider == 1)
                    <span class="badge badge-success">Active</span> 
                  @else
                  <span class="badge badge-danger">Inactive</span>  
                  @endif
                  
              </label>
              </div>
              <div class="col-lg-4">
              <label >
            <span>Hot New</span>
            @if($product->hot_new == 1)
                    <span class="badge badge-success">Active</span> 
                  @else
                  <span class="badge badge-danger">Inactive</span>  
                  @endif
                  
              </label>
              </div>

            {{--   <div class="col-lg-4">
               <label >
            <span>Buy One Get One</span>
            @if($product->main_slider == 1)
                    <span class="badge badge-success">Active</span> 
                  @else
                  <span class="badge badge-danger">Inactive</span>  
                  @endif
                  
              </label>
              </div> --}}

            </div>

            
        </div><!-- card -->
       
      </div><!-- sl-pagebody --> 
    </div><!-- sl-mainpanel -->
 
@endsection
