@extends('layouts.masterEmp')
@section('content')
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

                <div class="col-sm-6">
                    <div class="text-crnter">
                        <h3 class="m-0 text-dark"> ข้อมูล ณ {{ Carbon\Carbon::now()->thaidate('วัน l ที่ j F พ.ศ. Y') }}
                        </h3><br>
                        
                    </div>
                </div><!-- /.col -->
                
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"> <a href="   "> หน้าหลัก </a></li>
                        <li class="breadcrumb-item active"> หน้าหลัก </li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
           
<br>


            <!-- Small boxes (Stat box) -->
            <div class="row container-fluid ">

                <div class="col-lg-3 col-3">
                    <!-- small box -->
                    <div class="small-box bg-primary">
                        <div class="inner">

                            <h3> {{ count($withdraws ??'') }} <sup style="font-size: 20px"></sup></h3>
                            <p> ส่งใบคำขอเบิกวัสดุทั้งหมด </p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-paper-airplane"></i>
                        </div>
                        <a href="{{ route('empTrack.index') }}" class="small-box-footer"> ข้อมูลเพิ่มเติม <i
                                data-feather="arrow-right-circle"></i> </a>
                    </div>
                </div>
                <!-- ./col -->

                <div class="col-lg-3 col-3">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3> {{ count($approve ??'') }}  </h3>
                            <p> ใบคำขอเบิกวัสดุที่อนุมัติทั้งหมด </p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-checkmark-circled"></i>
                        </div>
                        <a href="{{ route('empHistory.index') }}" class="small-box-footer"> ข้อมูลเพิ่มเติม <i
                                data-feather="arrow-right-circle"></i> </a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-3">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3> {{ count($no_approve ??'') }} <sup style="font-size: 20px"></sup></h3>
                            <p> ใบคำขอเบิกที่ไม่อนุมัติทั้งหมด </p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-close-circled"></i>
                        </div>
                        <a href="{{ route('empTrack.index') }}" class="small-box-footer"> ข้อมูลเพิ่มเติม <i
                                data-feather="arrow-right-circle"></i> </a>
                    </div>
                </div>
                <!-- ./col -->

                <div class="col-lg-3 col-3">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3> {{ count($pay ??'') }} <sup style="font-size: 20px"></sup></h3>
                            <p> จ่ายวัสดุแล้วทั้งหมด </p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-archive"></i>
                        </div>
                        <a href="{{ route('empTrack.index') }}" class="small-box-footer"> ข้อมูลเพิ่มเติม <i
                                data-feather="arrow-right-circle"></i> </a>
                    </div>
                </div>
                <!-- ./col -->

            </div>
        </div>
        <p class="text-center" >  หมายเหตุ : <span class="text-danger">*</span> 
        สามารถรับวัสดุที่ขอเบิก ที่ฝ่ายพัสดุ คณะเทคนิคการแพทย์ โดยจะจ่ายวัสดุ ทุกวันพฤหัสบดี เวลา 14:00-16:00 น. โปรดติดตามสถานะคำขอเบิกก่อนมารับพัสดุ</p>
    </div>
   
@endsection
