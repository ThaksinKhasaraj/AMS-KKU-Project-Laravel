  <!-- Icon -->
  <script src="path/to/dist/feather.js"></script>
  <script src="https://unpkg.com/feather-icons"></script>
  <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-treeview/1.2.0/bootstrap-treeview.min.js"
      integrity="sha512-Hyk+1XSRfagqzuSHE8M856g295mX1i5rfSV5yRugcYFlvQiE3BKgg5oFRfX45s7I8qzMYFa8gbFy9xMFbX7Lqw=="
      crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-treeview/1.2.0/bootstrap-treeview.min.css"
      integrity="sha512-A81ejcgve91dAWmCGseS60zjrAdohm7PTcAjjiDWtw3Tcj91PNMa1gJ/ImrhG+DbT5V+JQ5r26KT5+kgdVTb5w=="
      crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4 position-fixed ">
</a>

<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-1 d-flex sticky">
        <div class="image">
            <img src="{{ asset('images/logonewT.png') }}" class="img-circle elevation-2" alt="Logo Image">
        </div>
        <div class="info">
            <h6 class="d-block text-light font-bold"> ระบบเบิก-จ่ายวัสดุ </h6>
        </div>

    </div>

    <div class="user-panel mt-1 pb-1 mb-1 d-flex sticky">
        <!-- Sidebar header -->
        <div class="brand-link"
            style="background-image: url(https://2.bp.blogspot.com/-2RewSLZUzRg/U-9o6SD4M6I/AAAAAAAADIE/voax99AbRx0/s1600/14%2B-%2B1%2B%281%29.jpg);">
            <!-- Sidebar brand image -->
            <div class="sidebar-image">
                <img src="{{ asset('assets/img/girl_avatar.png') }}" alt="Logo" width="70" height="70"
                    class="brand-image img-circle elevation-5">
                <div class="b">
                    <small>
                        {{ Auth::user()->name ?? '' }} <br>
                        หน่วยงาน : {{ Auth::user()->department->dept_name ?? '' }} <br>
                        สังกัด : คณะเทคนิคการแพทย์ <br>
                        อีเมล : {{ Auth::user()->email ?? '' }} <br>

                    </small>
                </div>
            </div>
        </div>
        <style>
            div.b {
                overflow: hidden;
                font-size: 16px;
                text-overflow: ellipsis;
            }
        </style>
    </div>

              <!-- Sidebar Menu -->
              <nav class="mt-2">
                  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                      data-accordion="false">

                      <li class="nav-item">
                          <a href=" {{ route('Supplyofficer.index') }} " class="nav-link {{ Request::is('Supplyofficer','my/Supplyofficer/*') ? 'active' : '' }} " >
                              <i data-feather="home"></i>
                              <p> หน้าหลัก </p>
                          </a>
                      </li>
                       

                      <li class="nav-item">
                          <a href=" {{ route('withdraw.index') }} " class="nav-link {{ Request::is('spoTrack','my/spoTrack/*') ? 'active' : '' }} ">
                              <i class="nav-icon fas fa-file-signature"></i>
                              <p> คำขอเบิกวัสดุ </p>
                              
                          </a>
                      </li>

                      {{-- <li class="nav-item">
                          <a href=" {{ route('ReturnMate.index') }}  " class="nav-link {{ Request::is('..','my/../*') ? 'active' : '' }} ">
                              <i data-feather="repeat"></i>

                              <p> คำขอส่งคืน </p>
                          </a>
                      </li> --}}


                      <li class="nav-item">
                        <a href=" {{ route('spoTrack.Track') }} " class="nav-link {{ Request::is('spoTrack.Track','my/spoTrack.Track/*') ? 'active' : '' }} ">
                            <i data-feather="check-square"></i>
                            <p> ติดตามสถานะ </p>
                        </a>
                    </li>


                      <li class="nav-item">
                        <a href="{{ route('spoWithdraw.checkout') }}" class="nav-link {{ Request::is('spoWithdraw.checkout','my/spoWithdraw.checkout/*') ? 'active' : '' }} ">
                            <i data-feather="arrow-up-circle"></i>
                            <p> จ่ายวัสดุ </p>
                        </a>
                    </li>
                     

                      <li class="nav-item has-treeview {{ Request::is('materials','my/materials/*') ? 'menu-open' : '' }} ">
                          <a href="#" class="nav-link  {{ Request::is('materials','my/materials/*') ? 'active' : '' }} " >
                              <i class="nav-icon fas fa-warehouse"></i>
                              <p>
                                  จัดการวัสดุ
                                  <i class="right fas fa-angle-left"></i>
                              </p>
                          </a>
                          <ul class="nav nav-treeview {{ Request::is('materials','my/materials/*') ? 'menu-open' : '' }} ">
                            <li class="nav-item {{ Request::is('materials','my/materials/*') ? 'menu-open' : '' }} ">
                                <a href="{{ route('categories.index') }}" class="nav-link {{ Request::is('categories','my/categories/*') ? 'active' : '' }}  ">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p> ประเภทวัสดุ </p>
                                </a>
                            </li>
                              <li class="nav-item">
                                  <a href="{{ route('materials.index') }}" class="nav-link {{ Request::is('materials','my/materials/*') ? 'active' : '' }} " >
                                      <i class="far fa-circle nav-icon"></i>
                                      <p> รายการวัสดุ </p>
                                  </a>
                              </li>
                              <li class="nav-item {{ Request::is('materials','my/materials/*') ? 'menu-open' : '' }}">
                                  <a href="{{ route('materials.create') }}" class="nav-link {{ Request::is('materials/create','my/materials/create/*') ? 'active' : '' }} ">
                                      <i class="far fa-circle nav-icon"></i>
                                      <p> เพิ่มวัสดุ </p>
                                  </a>
                              </li>
                              
                          </ul>
                      </li>

                      <li class="nav-item {{ Request::is('users','my/users/*') ? 'menu-open' : '' }}  ">
                          <a href="#" class="nav-link {{ Request::is('users','my/users/*') ? 'active' : '' }}">
                              <i class="nav-icon fas fa-users"></i>
                              <p>
                                  จัดการผู้ใช้งาน
                                  <i class="right fas fa-angle-left"></i>
                              </p>
                          </a>
                          <ul class="nav nav-treeview {{ Request::is('users','my/users/*') ? 'menu-open' : '' }}  ">
                            <li class="nav-item {{ Request::is('users','my/users/*') ? 'menu-open' : '' }}">
                                <a href="{{ route('departments.index') }}" class="nav-link {{ Request::is('departments','my/departments/*') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-address-card"></i>
                                    <p> หน่วยงาน/สาขาวิชา </p>
                                </a>
                            </li>
                              <li class="nav-item">
                                  <a href="{{ route('users.index') }}" class="nav-link {{ Request::is('users','my/users/*') ? 'active' : '' }} ">
                                      <i class="nav-icon fas fa-user"></i>
                                      <p> รายชื่อผู้ใช้งาน </p>
                                  </a>
                              </li>
                              <li class="nav-item {{ Request::is('users','my/users/*') ? 'menu-open' : '' }} ">
                                  <a href="{{ route('users.create') }}" class="nav-link {{ Request::is('users/create','my/users/create/*') ? 'active' : '' }}">
                                      <i class="nav-icon fas fa-user-plus"></i>
                                      <p> เพิ่มผู้ใช้งาน </p>
                                  </a>
                              </li>
                          </ul>
                      </li>
                      <li class="nav-item">
                        <a href="{{ route('spoReport.index') }}" class="nav-link {{ Request::is('spoReport','my/spoReport/*') ? 'active' : '' }} ">
                            <i data-feather="trello"></i>
                            <p>รายงาน</p>
                        </a>
                    </li>
                      <li class="nav-item">
                          <a href="{{ route('spoHistory.index') }}" class="nav-link {{ Request::is('spoHistory','my/spoHistory/*') ? 'active' : '' }} ">
                              <i data-feather="database"></i>
                              <p>ประวัติ</p>
                          </a>
                      </li>

                      <li class="nav-item">
                          <a href="{{ route('spoSetting.show') }}" class="nav-link  {{ Request::is('spoSetting.show','my/spoSetting.show/*') ? 'active' : '' }} ">
                              <i data-feather="user"></i>

                              <p> ข้อมูลส่วนตัว </p>
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
                          <a href="https://drive.google.com/drive/folders/11-s6kxqxuOgvYhQeGQv0Kru56NjkiQRo?usp=share_link" target="_blank" class="nav-link">
                              <i class="nav-icon fas fa-file"></i>
                              <p> วิธีการใช้งาน </p>
                          </a>
                      </li>

                  </ul>
              </nav>
          </div>
      </div>
      
      <!-- /.sidebar -->
  </aside>
  <!-- Icon -->
  <script>
      feather.replace()
  </script>
