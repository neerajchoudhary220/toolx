 <!-- Jquery Core Js -->
 <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>

 <!-- Bootstrap Core Js -->
 <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.js') }}"></script>

 <!-- Select Plugin Js -->
 <script src="{{ asset('assets/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>

 <!-- Slimscroll Plugin Js -->
 <script src="{{ asset('assets/plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>

 <script src="{{ asset('assets/plugins/bootstrap-notify/bootstrap-notify.js') }}"></script>
 <script src="{{ asset('assets/js/pages/ui/notifications.js') }}"></script>

 <!-- Waves Effect Plugin Js -->
 <script src="{{ asset('assets/plugins/node-waves/waves.js') }}"></script>

 {{-- --sweet alert --}}
 <script src="{{asset('assets/plugins/sweetalert/sweetalert.min.js')}}"></script>


 <!-- Jquery CountTo Plugin Js -->
 <script src="{{ asset('assets/plugins/jquery-countto/jquery.countTo.js') }}"></script>

 <!-- Morris Plugin Js -->
 <script src="{{ asset('assets/plugins/raphael/raphael.min.js') }}"></script>
 <script src="{{ asset('assets/plugins/morrisjs/morris.js') }}"></script>



 <!-- Custom Js -->
 <script src="{{ asset('assets/js/admin.js') }}"></script>


 <!-- Demo Js -->

 <script src="{{ asset('assets/js/demo.js') }}"></script>


 <script>
     function ajaxHeader() {
         $.ajaxSetup({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
         });
     }
 </script>
<x-shownotification/>
 @stack('custom-scripts')
