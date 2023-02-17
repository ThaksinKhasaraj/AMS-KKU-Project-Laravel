 <!-- REQUIRED SCRIPTS -->
 <link rel="preconnect" href="https://fonts.googleapis.com">
 <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
 <link href="https://fonts.googleapis.com/css2?family=Sarabun&display=swap" rel="stylesheet">

 <!--<link href='https://fonts.googleapis.com/css?family=Kanit&subset=thai,latin' rel='stylesheet' type='text/css'> -->
 
 <script src="{{ asset('js/app.js') }}"></script>
 <!-- jQuery -->
 <script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>

 <!-- Bootstrap 4 -->
 <script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

 <!-- AdminLTE App -->
 <script src="{{ asset('admin/dist/js/adminlte.min.js') }}"></script>

 <!-- DataTables -->
 <script src="{{ asset('admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
 <script src="{{ asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
 <script src="{{ asset('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
 <script src="{{ asset('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>

<!-- Sweet Alert -->
<link href="{{ asset('admin/dist/css/sweetalert.css') }}" rel="stylesheet">
<!-- Sweet Alert -->
<script src="{{ asset('admin/dist/js/sweetalert.min.js') }}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

 <!-- icons -->
 <script src="https://unpkg.com/feather-icons"></script>
 <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

 <script>
     $('div.alert').not('.alert-important').delay(3000).fadeOut(350);

     $(".datatable").DataTable({
         "responsive": true,
         "autoWidth": false,
     });

     $('.sa-delete').on('click', function() {
         let form_id = $(this).data('form-id');
         $this = $(this); 
         swal({
                 title: "ยืนยันการลบ?",
                 text: "เมื่อลบแล้ว คุณจะไม่สามารถกู้คืนข้อมูลนี้ได้!",
                 icon: "warning",
                 buttons: true,
                 dangerMode: true,
             })
             .then((willDelete) => {
                 if (willDelete) {
                     $('#'+form_id).submit();
                     swalWithBootstrapButtons.fire(
                    'ลบเรียบร้อย!',
                    'ข้อมูลถูกลบแล้ว.',
                    'success'
    )

                 }
             });
     })

     
 </script>



<script>


 @stack('scripts')
