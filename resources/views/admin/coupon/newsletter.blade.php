@extends('admin.admin_layouts')

@section('admin_content')
  <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <a class="breadcrumb-item" href="index.html">Tables</a>
        <span class="breadcrumb-item active">Subscriber Table</span>
      </nav>

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Subscriber Table</h5>
         
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Subscriber List
           <a href="#" class="btn btn-sm btn-danger" style="float: right;"  >Delete All</a>
      </h6>

          

          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-20p">Sl No.</th>
                  <th class="wd-20p">Email</th>
                  <th class="wd-30p">Subscribing Time</th>
                  <th class="wd-30p">Action</th>
                </tr>
              </thead>
              <tbody>
              	<?php $i=0; ?>
              @foreach($subscribers as $subscriber)
                <tr>
                  <td> <input type="checkbox"> {{ ++$i }}</td>
                  <td>{{ $subscriber->email }}</td>
                  <td>{{ $subscriber->created_at }}</td>
                  <td>
                  	 
                  	<a href="{{ route('delete.subscriber',$subscriber->id) }}" class="btn btn-danger" id="delete">Delete</a>
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

    
 
@endsection