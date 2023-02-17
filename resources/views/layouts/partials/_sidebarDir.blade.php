  <!-- Icon -->
  <script src="path/to/dist/feather.js"></script>
  <script src="https://unpkg.com/feather-icons"></script>
  <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

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
                    <a href=" {{ route('Director.index') }} " class="nav-link {{ Request::is('Director','my/Director/*') ? 'active' : '' }}">
                        <i data-feather="home"></i>
                        <p> หน้าหลัก </p>
                    </a>
                </li>

                  <li class="nav-item">
                    <a href="{{ route('dirTrack.index') }}" class="nav-link {{ Request::is('dirTrack','my/dirTrack/*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-file-signature"></i>
                        <p> คำขอรออนุมัติ </p>
                        {{-- <span
                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                             3
                                <span class="visually-hidden">  </span>
                            </span>  --}}
                             
                    </a>
                </li>

                {{-- <li class="nav-item">
                    <a href="{{ route('dirReturn.index') }}" class="nav-link {{ Request::is('dirReturn','my/dirReturn/*') ? 'active' : '' }}">
                        <i data-feather="repeat"></i>
                        <p> ส่งคืน </p>
                            {{-- <span
                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-info">
                                2
                                <span class="visually-hidden">  </span>
                            </span>   
                    </a>
                </li> 

                <li class="nav-item">
                    <a href="{{ route('dirTrack.index') }}" class="nav-link">
                        <i data-feather="check-square"></i>
                        <p> ติดตามสถานะ </p>
                    </a>
                </li> --}}
                <li class="nav-item">
                    <a href="{{ route('dirReport.index') }}" class="nav-link {{ Request::is('dirReport','my/dirReport/*') ? 'active' : '' }} ">
                        <i data-feather="trello"></i>
                        <p>รายงาน</p>
                    </a>
                </li>

                  <li class="nav-item">
                      <a href="{{ route('dirHistory.index') }}" class="nav-link {{ Request::is('dirHistory','my/dirHistory/*') ? 'active' : '' }}">
                          <i data-feather="database"></i>
                          <p>ประวัติ</p>
                      </a>
                  </li>

                  
                  <li class="nav-item">
                      <a href="{{ route('dirSetting.show') }}" class="nav-link {{ Request::is('dirSetting.show','my/dirSetting.show/*') ? 'active' : '' }}">
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
          </nav>
      </div>
    </ul>

      <!-- /.sidebar -->
  </aside>
  <!-- Icon -->
  <script>
      feather.replace()
  </script>
