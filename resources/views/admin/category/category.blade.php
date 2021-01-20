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
          <h5>Category Table</h5>
         
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Category List
          <a href="#" class="btn btn-sm btn-info" style="float: right;">Add Category</a>
      </h6>

          

          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-30p">Sl No.</th>
                  <th class="wd-30p">Category name</th>
                  <th class="wd-40p">Action</th>
                </tr>
              </thead>
              <tbody>
              
                <tr>
                  <td>01</td>
                  <td>Snider</td>
                  <td>
                  	<a href="#" class="btn btn-success">Edit</a>
                  	<a href="#" class="btn btn-danger" id="delete">Delete</a>

                  </td>
              </tr>
              </tbody>
              <tfoot> 
                <tr>
                  <th class="wd-30p">Sl No.</th>
                  <th class="wd-30p">Category name</th>
                  <th class="wd-40p">Action</th>
                </tr>
              </tfoot>
            </table>
          </div><!-- table-wrapper -->
        </div><!-- card -->

       

     

      

      </div><!-- sl-pagebody -->
      
    </div><!-- sl-mainpanel -->
@endsection