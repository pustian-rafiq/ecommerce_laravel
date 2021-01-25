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
          <h6 class="card-body-title">Coupon List
          <a href="#" class="btn btn-sm btn-warning" style="float: right;" data-toggle="modal" data-target="#modaldemo3">Add Coupon</a>
      </h6>

          

          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-20p">Sl No.</th>
                  <th class="wd-20p">Coupon Code</th>
                  <th class="wd-30p">Coupon Discount</th>
                  <th class="wd-30p">Action</th>
                </tr>
              </thead>
              <tbody>
              	<?php $i=0; ?>
              @foreach($coupons as $coupon)
                <tr>
                  <td>{{ ++$i }}</td>
                  <td>{{ $coupon->coupon_code }}</td>
                  <td>{{ $coupon->discount }}</td>
                  <td>
                  	<a href="{{ route('edit.coupon',$coupon->id) }}" class="btn btn-success">Edit</a>
                  	<a href="{{ route('delete.coupon',$coupon->id) }}" class="btn btn-danger" id="delete">Delete</a>
           {{-- jakhn route() use korbo takhn koma dia id pass korbo but url use korle dot dia id pass korbo --}}
                  </td>
              </tr>
              @endforeach
              </tbody>
              <tfoot> 
                <tr>
                  <th class="wd-20p">Sl No.</th>
                  <th class="wd-20p">Coupon Code</th>
                  <th class="wd-30p">Coupon Discount</th>
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
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Coupon Add</h6>
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
            <form method="post" action="{{ route('store.coupon') }}">
              @csrf
              <div class="modal-body pd-20">
                <div class="form-group">
                  <label for="exampleInputEmail1">Coupon Code</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Coupon Code" name="coupon_code" required="">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Coupon Discount (%)</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Coupon Discount" name="discount" required="">
                </div>
              </div><!-- modal-body -->
              <div class="modal-footer">
                <button type="submit" class="btn btn-info pd-x-20">Add Coupon</button>
                <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
              </div>
            </form>
            </div>
          </div><!-- modal-dialog -->
        </div><!-- modal -->
@endsection