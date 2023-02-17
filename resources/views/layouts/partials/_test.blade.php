<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


</head>

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex sticky">
                    <li class="nav-item">
                        <a href=" {{ route('materials.index') }} " class="nav-link">
                            <i class="bi bi-house" style="font-size: 1.5rem;"></i>
                            <p>หน้าหลัก</p>
                        </a>
                    </li>

                </div>


                <li class="nav-header">จัดการผู้ใช้งาน</li>

                <li class="nav-item ">
                    <a href="{{ route('users.index') }}" class="nav-link ">
                        <i class="fa-address-book"></i>
                        <p> รายชื่อพนักงาน </p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{ route('departments.index') }}" class="nav-link ">
                        <i class="bi bi-building "></i>

                        <p> หน่วยงาน/สาขาวิชา </p>
                    </a>
                </li>


                <li class="nav-header">จัดการวัสดุ</li>

                <li class="nav-item ">
                    <a href="{{ route('materials.index') }}" class="nav-link  ">
                        <i class="fas fa-circle"></i>
                        <p> รายการวัสดุ </p>
                    </a>
                </li>

                <li class="nav-item ">
                    <a href="{{ route('materials.create') }}" class="nav-link  ">
                        <i data-feather="list"></i>
                        <p> เพิ่มวัสดุ </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href=" {{ route('materials.index') }} " class="nav-link">
                        <i class="bi bi-house" style="font-size: 1.5rem;"></i>
                        <p>หน้าหลัก</p>
                    </a>
                </li>

                <li class="nav-item ">
                    <a href="{{ route('categories.index') }}" class="nav-link ">
                        <i data-feather="list"></i>
                        <p> เพิ่มหมวดหมู่วัสดุ </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('history.index') }}" class="nav-link ">
                        <i data-feather="database"></i>
                        <p>ประวัติ</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('Setting.index') }}" class="nav-link ">
                        <i data-feather="settings"></i>
                        <p>ตั้งค่า</p>
                    </a>
                </li>



                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}" class="nav-link">
                        @csrf
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                              this.closest('form').submit();">
                            <i data-feather="log-out"></i>
                            <p>ออกจากระบบ</p>
                </li>
                </form>


                <li class="nav-header"> คู่มือการใช้งาน </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-file"></i>
                        <p> วิธีการใช้งาน </p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

</html>
