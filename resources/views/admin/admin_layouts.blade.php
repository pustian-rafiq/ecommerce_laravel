<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.partial.head');
  </head>

  <body>

    <!-- ########## START: LEFT PANEL ########## -->
    

   
    @guest
    @else
       @include('admin.partial.sidebar');

        @include('admin.partial.header');
    @endguest
    @yield('admin_content')
    
      {{-- @include('admin.partial.footer'); --}}
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="{{ asset('public/backend/lib/jquery/jquery.js')}}"></script>
    <script src="{{ asset('public/backend/lib/popper.js/popper.js')}}"></script>
    <script src="{{ asset('public/backend/lib/bootstrap/bootstrap.js')}}"></script>
    <script src="{{ asset('public/backend/lib/jquery-ui/jquery-ui.js')}}"></script>
    <script src="{{ asset('public/backend/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js')}}"></script>
    <script src="{{ asset('public/backend/lib/jquery.sparkline.bower/jquery.sparkline.min.js')}}"></script>
    <script src="{{ asset('public/backend/lib/d3/d3.js')}}"></script>
    <script src="{{ asset('public/backend/lib/rickshaw/rickshaw.min.js')}}"></script>
    <script src="{{ asset('public/backend/lib/chart.js/Chart.js')}}"></script>
    <script src="{{ asset('public/backend/lib/Flot/jquery.flot.js')}}"></script>
    <script src="{{ asset('public/backend/lib/Flot/jquery.flot.pie.js')}}"></script>
    <script src="{{ asset('public/backend/lib/Flot/jquery.flot.resize.js')}}"></script>
    <script src="{{ asset('public/backend/lib/flot-spline/jquery.flot.spline.js')}}"></script>

    <script src="{{ asset('public/backend/js/starlight.js')}}"></script>
    <script src="{{ asset('public/backend/js/ResizeSensor.js')}}"></script>
    <script src="{{ asset('public/backend/js/dashboard.js')}}"></script>
     <script src="{{asset('public/panel/assets/plugins/pie_chart/chart.loader.js')}}"></script>
        <script src="{{asset('public/panel/assets/plugins/pie_chart/pie.active.js')}}"></script>
         <script src="{{ asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js')}}"></script>
    <script>
        @if(Session::has('messege'))
          var type="{{Session::get('alert-type','info')}}"
          switch(type){
              case 'info':
                   toastr.info("{{ Session::get('messege') }}");
                   break;
              case 'success':
                  toastr.success("{{ Session::get('messege') }}");
                  break;
              case 'warning':
                 toastr.warning("{{ Session::get('messege') }}");
                  break;
              case 'error':
                  toastr.error("{{ Session::get('messege') }}");
                  break;
          }
        @endif
     </script>  

     <script>  
         $(document).on("click", "#delete", function(e){
             e.preventDefault();
             var link = $(this).attr("href");
                swal({
                  title: "Are you Want to delete?",
                  text: "Once Delete, This will be Permanently Delete!",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
                })
                .then((willDelete) => {
                  if (will