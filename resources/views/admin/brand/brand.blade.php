 @extends('admin.admin_layouts')

@section('admin_content')
  <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <a class="breadcrumb-item" href="index.html">Tables</a>
        <span class="breadcrumb-item active">Brand Table</span>
      </nav>

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Brand Table</h5>
         
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Brand List
          <a href="#" class="btn btn-sm btn-warning" style="float: right;" data-toggle="modal" data-target="#modaldemo3">Add Brand</a>
      </h6>

          

          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-20p">Sl No.</th>
                  <th class="wd-20p">ID No.</th>
                  <th class="wd-30p">Brand name</th>
                  <th class="wd-30p">Brand Logo</th>
                  <th class="wd-30p">Action</th>
                </tr>
              </thead>
              <tbody>
              	<?php $i=0; ?>
              @foreach($brands as $brand)
                <tr>
                  <td>{{ ++$i }}</td>
                  <td>{{ $brand->id }}</td>
                  <td>{{ $brand->brand_name }}</td>
                  <td><img src="{{ URL::to($brand->brand_logo) }}" height="50"></td>
                  <td>
                  	<a href="{{ url('edit/brand/'.$brand->id) }}" class="btn btn-success">Edit</a>
                  	<a href="{{ url('delete/brand/'.$brand->id) }}" class="btn btn-danger" id="delete">Delete</a>

                  </td>
              </tr>
              @endforeach
              </tbody>
              <tfoot> 
                <tr>
                  <th class="wd-20p">Sl No.</th>
                  <th class="wd-20p">ID No.</th>
                  <th class="wd-30p">Brand name</th>
                  <th class="wd-30p">Brand Logo</th>
                  <th class="wd-30p">Action</th>
                </tr>
              </tfoot>
            </table>
          </div><!-- table-wrapper -->
        </div><!-- card -->
      </div><!-- sl-pagebody -->
   </div><!-- sl-mainpanel -->

    
<!--modal-->
        <!-- LARGE MODAL -->
        <div id="modaldemo3" class="modal fade">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content tx-size-sm">
              <div class="modal-header pd-x-20">
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Category Add</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif
            <form method="post" action="{{ route('store.brand') }}" enctype="multipart/form-data">
              @csrf
              <div class="modal-body pd-20">
                <div class="form-group">
                  <label for="exampleInputEmail1">Brand Name</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Category" name="brand_name">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Brand Logo</label>
                  <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Brand Logo" name="brand_logo">
                </div>
              </div><!-- modal-body -->
              <div class="modal-footer">
                <button type="submit" class="btn btn-info pd-x-20">Add Brand</button>
                <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
              </div>
            </form>
            </div>
          </div><!-- modal-dialog -->
        </div><!-- modal -->
@endsection