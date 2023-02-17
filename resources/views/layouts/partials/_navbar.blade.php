 <!-- icons -->
 <script src="https://unpkg.com/feather-icons"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
 <link rel="stylesheet" href="{{ asset('admin/dist/css/stylesheet.css') }}" />
 <script src="{{ asset('admin/dist/js/jquery.pushMenu.min.js') }}"></script>
 <link rel="https://cdnjs.cloudflare.com/ajax/libs/multi-level-push-menu/2.1.4/jquery.multilevelpushmenu.min.js">

 <link href='https://fonts.googleapis.com/css?family=Kanit&subset=thai,latin' rel='stylesheet' type='text/css'>

 <!-- jQuery -->
 <script src="{{ asset('admin/dist/js/jquery.pushMenu.min.js') }}"></script>
 <!-- Scripts -->
 <script src="{{ asset('js/app.js') }}" defer></script>

 <body class="hold-transition sidebar-mini layout-fixed" data-panel-auto-height-mode="height">
     <div class="wrapper">

         <!-- Navbar -->
         <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="background-color: #6387E3;">
             <!-- Left navbar links -->
             <ul class="navbar-nav">
                 <li class="nav-item">
                     <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                        <i class="fas fa-bars"></i></a>
                 </li>
             </ul>

           
             <!-- Right navbar links -->
             <ul class="navbar-nav ml-auto accent-white">
                 <div class="user-panel mt-2 pb-2 ">
                    <a href=" " class="logo logo-small">
                        <img src="{{asset('assets/img/girl_avatar.png')}}" alt="Logo" width="30" height="30" class="brand-image img-circle elevation-2">
                    </a>
                    
                    <span class="status online"></span></span>
                     <a href="#"> {{ Auth::user()->name ?? '' }}
                     </a>
                     
                 </div>
                 
             </ul>
            
         </nav>
         <!-- /.navbar -->
     </div>
 </body>
 

 <!-- icon script -->
 <script>
     feather.replace()
 </script>
