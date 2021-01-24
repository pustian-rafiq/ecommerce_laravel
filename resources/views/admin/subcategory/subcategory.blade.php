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
          <h5>Sub-category Table</h5>
         
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Sub-category List
          <a href="#" class="btn btn-sm btn-warning" style="float: right;" data-toggle="modal" data-target="#modaldemo3">Add Sub Category</a>
      </h6>

          

          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-20p">Sl No.</th>
                  <th class="wd-20p">ID No.</th>
                  <th class="wd-30p">Category name</th>
                  <th class="wd-30p">Sub-category name</th>
                  <th class="wd-30p">Action</th>
                </tr>
              </thead>
              <tbody>
              	<?php $i=0; ?>
             @foreach($subcategory as $row)
                <tr>
                  <td>{{ ++$i }} </td>
                  <td>{{$row->id }} </td>
                  <td> {{$row->subcategory_name }} </td>
                  <td>{{$row->category_name }}  </td>
                  <td>
                  	<a href="{{ url('edit/subcategory/'.$row->id) }}" class="btn btn-success">Edit</a>
                  	<a href="{{ url('delete/subcategory/'.$row->id) }}" class="btn btn-danger" id="delete">Delete</a>

                  </td>
              </tr>
             @endforeach
              </tbody>
              <tfoot> 
                <tr>
                  <th class="wd-15p">Sl No.</th>
                  <th class="wd-15p">ID No.</th>
                  <th class="wd-20p">Category name</th>
                  <th class="wd-20p">Sub-category name</th>
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
            <form method="post" action="{{ route('store.subcategory') }}">
              @csrf
              <div class="modal-body pd-20">
                <div class="form-group">
                  <label for="exampleInputEmail1">Sub Category Name</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Category" name="subcategory_name">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Category Name</label>
                   <select class="form-control" name="category_id">
                    @foreach($category as $row)
                     <option value="{{ $row->id }}">{{ $row->category_name }}</option>
                     @endforeach
                   </select>
                </div>
              </div><!-- modal-body -->
              <div class="modal-footer">
                <button type="submit" class="btn btn-info pd-x-20">Submit</button>
                <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
              </div>
            </form>
            </div>
          </div><!-- modal-dialog -->
        </div><!-- modal -->
@endsection