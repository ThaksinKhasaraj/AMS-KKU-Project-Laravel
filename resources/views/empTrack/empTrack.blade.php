@extends('layouts.masterEmp')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> ติดตามสถานะ </h1><br>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href=" ">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active">ติดตามสถานะ</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.row -->
    </div><!-- /.row -->

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-pink card-outline">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12 margin-tb">
                                    <div class="pull-left">
                                        <div class="pull-right">
                                            <a class="btn btn-secondary" href="#"> <i data-feather="arrow-left-circle"></i>
                                                ย้อนกลับ
                                            </a><br>
                                        </div>
                                    </div>
                                </div>
                            </div><br>

                            <!-- Container (Track) -->
                            <div class="container-fluid text-center">
                                <h3> สถานะคำขอ </h3>
                                <h5> คุณทักษิณ คะสาราช </h5> <h6> วิจัย </h6> <i data-feather="chevrons-down"></i> <h5> หน่วยพัสดุ </h5> <h6> คณะเทคนิคการแพทย์ มหาวิทยาลัยขอนแก่น </h6>
                                <br>


                                <div class="row">
                                    <div class="col-sm">
                                        <img src="{{ asset('images/send.png') }}" class="img-circle elevation-2" width="100"> <i data-feather="chevrons-right"></i>  <br><br> 
                                        <h5> ส่งคำขอเบิก </h5>
                                        <p> ส่งคำขอแล้ว ทักษิณ </p><br>
                                        <p> เวลา 10:00 วันที่ 22 มิถุนายน 2565</p>
                                    </div>

                                    <div class="col-sm">
                                        <img src="{{ asset('images/approve.png') }}" class="img-circle elevation-2" width="100"> <i data-feather="chevrons-right"></i>  <br><br>
                                        <h5> หัวหน้างาน/หัวหน้าสาขา </h5>
                                        <p>  อนุมัติ ษิณ </p>
                                        <p> เวลา 10:10 วันที่ 22 มิถุนายน 2565</p>
                                    </div>

                                    <div class="col-sm">
                                        <img src="{{ asset('images/check.png') }}" class="img-circle elevation-2" width="100"> <i data-feather="chevrons-right"></i>  <br><br>
                                        <h5> เจ้าหน้าที่พัสดุ </h5>
                                        <p> เจ้าหน้าที่พัสดุตรวจสอบรายการขอเบิก </p>
                                        <p> เวลา 10:22 วันที่ 22 มิถุนายน 2565</p>
                                    </div>

                                    <div class="col-sm">
                                        <img src="{{ asset('images/apps.png') }}" class="img-circle elevation-2" width="100"> <i data-feather="chevrons-right"></i>  <br><br>
                                        <h5> ผอ.กองหริหารงานคณะฯ </h5>
                                        <p>  อนุมัติ ษิณ </p>
                                        <p> เวลา 10:30 วันที่ 23 มิถุนายน 2565</p>
                                    </div>

                                    <div class="col-sm">
                                        <img src="{{ asset('images/pickup.png') }}" class="img-circle elevation-2" width="100"> <i data-feather="chevrons-right"></i>  <br><br>
                                        <h5> เตรียมจ่าย </h5>
                                        <p> เจ้าหน้าที่พัสดุเตรียมจ่าย </p>
                                        <p> เวลา 11:00 วันที่ 23 มิถุนายน 2565</p>
                                    </div>

                                    <div class="col-sm">
                                        <img src="{{ asset('images/up.png') }}" class="img-circle elevation-2" width="100"> <i data-feather="chevrons-right"></i>  <br><br>
                                        <h5> พร้อมจ่าย </h5>
                                        <p> กรุณามารับพัสดุที่หน่วยพัสดุ คณะเทคนิคการแพทย์ มหาวิทยาลัยขอนแก่น </p>
                                        <p> เจ้าหน้าที่พัสดุ </p>
                                        <p> เวลา 13:00 วันที่ 23 มิถุนายน 2565</p>
                                    </div>

                                    <div class="col-sm">
                                        <img src="{{ asset('images/success.png') }}" class="img-circle elevation-2" width="100">  <br><br>
                                        <h5> สำเสร็จ </h5>
                                        <p> ผู้มารับพัสดุ ทักษิณ </p>
                                        <p> เวลา 14:00 วันที่ 23 มิถุนายน 2565</p>
                                    </div>
                                    

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 
@endsection
