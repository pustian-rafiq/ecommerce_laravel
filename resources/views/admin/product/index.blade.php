@extends('admin.admin_layouts')

@section('admin_content')
  <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <a class="breadcrumb-item" href="index.html">Tables</a>
        <span class="breadcrumb-item active">Product Table</span>
      </nav>

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Product Table</h5>
         
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Product List
          <a href="{{ route('create.product') }}" class="btn btn-sm btn-warning" style="float: right;" data-toggle="modal" data-target="#modaldemo3">Add New Product</a>
      </h6>

          

          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-10p">Sl No.</th>
                  <th class="wd-10p">Product Name</th>
                {{--   <th class="wd-10p">Product Code</th> --}}
                  <th class="wd-10p">Image</th>
                  <th class="wd-10p">Category</th>
                  <th class="wd-10p">Brand</th>
                  <th class="wd-10p">Quantity</th>
                  <th class="wd-10p">Status</th>
                  <th class="wd-20p">Action</th>
                </tr>
              </thead>
              <tbody>
              	<?php $i=0; ?>
              @foreach($products as $product)
                <tr>
                  <td>{{ ++$i }}</td>
                  <td>{{  substr($product->product_name, 0, 10) }}</td>
                 {{--  <td>{{ $product->product_code }}</td> --}}
                  <td><img src="{{ URL::to($product->image_one) }}" height="50"></td>
                  <td>{{ $product->category_name }}</td>
                  <td>{{ $product->brand_name }}</td>
                  <td>{{ $product->product_quantity }}</td>
                  <td>
                    @if($product->status == 1)
                    <span class="badge badge-success">Active</span>
                    @else
                    <span class="badge badge-danger">Deactive</span>
                    @endif
                  </td>
                  <td>
                  	<a href="{{ route('view.product',$product->id) }}" class="btn btn-success"><i class="fa fa-eye" aria-hidden="true" title="View"></i></a>

                    <a href="{{ route('edit.product',$product->id) }}" class="btn btn-success"><i class="fa fa-pencil-square-o" aria-hidden="true" title="Edit"></i></a>
                  	<a href="{{ route('delete.product',$product->id) }}" class="btn btn-danger" id="delete"><i class="fa fa-trash" aria-hidden="true" title="Delete"></i></a>

                    @if($product->status==1)
                    <a href="{{ route('deactive.product',$product->id) }}" class="btn btn-danger" ><i class="fa fa-thumbs-up" aria-hidden="true" title="Active"></i></a>
                    @else
                    <a href="{{ route('active.product',$product->id) }}" class="btn btn-danger"  ><i class="fa fa-thumbs-down" aria-hidden="true" title="Deactive"></i></a>
                    @endif
                  </td>
              </tr>
              @endforeach
              </tbody>
              <tfoot> 
                <tr>
                  <th class="wd-20p">Sl No.</th>
                  <th class="wd-20p">Product Name</th>
                  {{-- <th class="wd-20p">Product Code</th> --}}
                  <th class="wd-20p">Image</th>
                  <th class="wd-20p">Category</th>
                  <th class="wd-30p">Brand</th>
                  <th class="wd-30p">Quantity</th>
                  <th class="wd-30p">Status</th>
                  <th class="wd-30p">Action</th>
                </tr>
              </tfoot>
            </table>
          </div><!-- table-wrapper -->
        </div><!-- card -->
      </div><!-- sl-pagebody -->
   </div><!-- sl-mainpanel -->

    
 
@endsection