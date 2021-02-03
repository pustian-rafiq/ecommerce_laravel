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
                  <th class="wd-20p">Sl No.</th>
                  <th class="wd-20p">Category</th>
                  <th class="wd-20p">Post Deatils(En)</th>
                  <th class="wd-30p">Image</th>
                  <th class="wd-30p">Action</th>
                </tr>
              </thead>
              <tbody>
              	<?php $i=0; ?>
              @foreach($posts as $post)
                <tr>
                  <td>{{ ++$i }}</td>
                   <td>{{ $post->category_name_en }}</td>
                  <td>{{  substr($post->details_en, 0, 50) }}</td>
                 {{--  <td>{{ $product->product_code }}</td> --}}
                  <td><img src="{{ URL::to($post->post_image) }}" height="50"></td>
                  
                  <td>
                  	{{-- <a href="{{ route('view.product',$product->id) }}" class="btn btn-success"><i class="fa fa-eye" aria-hidden="true" title="View"></i></a> --}}

                    <a href="{{ route('edit.blogpost',$post->id) }}" class="btn btn-success"><i class="fa fa-pencil-square-o" aria-hidden="true" title="Edit"></i></a>

                  	<a href="{{ route('delete.blogpost',$post->id) }}" class="btn btn-danger" id="delete"><i class="fa fa-trash" aria-hidden="true" title="Delete"></i></a>

                    
                  </td>
              </tr>
              @endforeach
              </tbody>
              <tfoot> 
                <tr>
                  <th class="wd-20p">Sl No.</th>
                  <th class="wd-20p">Category</th>
                  <th class="wd-20p">Post Deatils(En)</th>
                  <th class="wd-30p">Image</th>
                  <th class="wd-30p">Action</th>
                </tr>
              </tfoot>
            </table>
          </div><!-- table-wrapper -->
        </div><!-- card -->
      </div><!-- sl-pagebody -->
   </div><!-- sl-mainpanel -->

    
 
@endsection