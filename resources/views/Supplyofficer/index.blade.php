@extends('layouts.masterSpo')
@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"
        integrity="sha512-QSkVNOCYLtj73J4hbmVoOV6KVZuMluZlioC+trLpewV8qMjsWqlIQvkn1KGX2StWvPMdWGBqim1xlC8krl1EKQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- google chart -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                     
                    <div class="text-crnter">
                        <h3 class="m-0 text-dark"> ข้อมูล ณ {{ Carbon\Carbon::now()->thaidate('วัน l ที่ j F พ.ศ. Y') }}
                        </h3>
                    </div>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href=" "> หน้าหลัก </a></li>
                        <li class="breadcrumb-item active"> หน้าหลัก </li>

                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.row -->
    </div><!-- /.row -->



        <!-- Small boxes (Stat box) -->
        <div class="row container-fluid ">

            <div class="col-lg-3 col-3">
                <!-- small box -->
                <div class="small-box bg-info ">
                    <div class="inner">

                        <h3> {{ count($send ??'') }} <sup style="font-size: 20px"></sup></h3>
                        <p> ใบคำขอเบิกวัสดุทั้งหมด </p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-paper-airplane"></i>
                    </div>
                    <a href="{{ route('spoTrack.Track') }}" class="small-box-footer"> ข้อมูลเพิ่มเติม <i
                            data-feather="arrow-right-circle"></i> </a>
                </div>
            </div>
            <!-- ./col -->

            <div class="col-lg-3 col-3">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3> {{ count($wait ??'') }} <sup style="font-size: 20px"></sup></h3>
                        <p> รอตรวจสอบ </p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-load-b"></i>
                    </div>
                    <a href="{{ route('spoTrack.index') }}" class="small-box-footer"> ข้อมูลเพิ่มเติม <i
                            data-feather="arrow-right-circle"></i> </a>
                </div>
            </div>
            <!-- ./col -->

            <div class="col-lg-3 col-3">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3> {{ count($wait_pay ??'') }}  </h3>
                        <p> รอจ่ายทั้งหมด </p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-checkmark-circled"></i>
                    </div>
                    <a href="{{ route('spoWithdraw.checkout') }}" class="small-box-footer"> ข้อมูลเพิ่มเติม <i
                            data-feather="arrow-right-circle"></i> </a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-3">
                <!-- small box -->
                <div class="small-box bg-secondary">
                    <div class="inner">
                        <h3> {{ count($withdraws ??'') }} <sup style="font-size: 20px"></sup></h3>
                        <p> จำนวนเบิก-จ่ายทั้งหมด  </p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-archive"></i>
                    </div>
                    <a href="{{ route('spoReport.index') }}" class="small-box-footer"> ข้อมูลเพิ่มเติม <i
                            data-feather="arrow-right-circle"></i> </a>
                </div>
            </div>
            <!-- ./col -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-warning">
                        <div class="card-header">
                            <h3 class="card-title"> รอเจ้าหน้าพัสดุตรวจสอบ </h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered datatable">
                                <thead>
                                    <tr>
                                        <th> ลำดับ </th>
                                        <th> รายการ </th>
                                        <th> ผู้ส่งคำขอเบิก </th>
                                        <th> จัดการ </th>
                                      
                                    
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i=1;
                                    @endphp
                                    @foreach ($check as $item )
                                
                                    <tr>
                                        <td> {{ $i++ }}   </td>
                                        <td> 
                                            <b> วันที่เบิก : </b> 
                                            {{ $item->created_at->thaidate('วันl ที่ j F พ.ศ. Y') ?? '' }} เวลา
                                            {{ date_format(date_create($item->created_at), 'H:i') }} น. <br>
                                            <b> เลขที่ใบเบิก :  </b>{{ $item->withdraw_num ?? '' }} <br>
                                            <b> หน่วยงาน/สาขาวิชา : </b> {{ $item->user->department->manager_name ?? '' }}
                                        </td>
                                        <td> 
                                            <b> ผู้เบิก : </b> {{ $item->user->name ?? '' }} <br>
                                            <b> หัวหน้างาน/สาขาวิชา : </b> {{ $item->user->name ?? '' }} <br>
                                            <b> หน่วยงาน/สาขาวิชา : </b> {{ $item->user->department->manager_name ?? '' }}
                                            <span
                                                        class="right badge badge-{{ $item->approve_mng ? 'success' : 'warning' }}">
                                                        {{ $item->approve_mng ? 'อนุมัติ' : 'รออนุมัติ' }}</span>
                                         </td>
                                        <td>  <a href="{{ route('withdraw.edit', $item->id ?? '') }} "
                                            class="btn btn-sm btn- btn-info">
                                            ตรวจสอบ
                                        </td>
                                         
                                    </tr>
                                    @endforeach
                                </tbody>
            
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    

                </div>
                <!-- /.col (LEFT) -->
                
                <div class="col-md-6">

                    <!-- PIE CHART -->
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title"> รอจ่าย </h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                           
                                   <!-- /Page Header -->
                                  
                                    <table class="table table-bordered datatable">
                                        <thead>
                                            <tr>
                                                <th> ลำดับ </th>
                                                <th> รายการ </th>
                                                <th> จัดการ </th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i=1;
                                            @endphp
                                             @foreach ($check_pay as $item)
                                   
                                            <tr>
                                                <td> {{ $i++ }}</td>
                                                <td>
                                                    <b>เลขที่ใบเบิก : </b> {{ $item->withdraw_num ?? '' }} <br>
                                                    <b> วันที่เบิก : </b> {{ $item->created_at->thaidate('วันl ที่ j F พ.ศ. Y') ?? '' }} เวลา
                                                    {{ date_format(date_create($item->created_at), 'H:i') }} น. <br>
                                                     <b> ผู้ขอเบิก :  </b> {{ $item->user->name ?? '' }} <br>
                                                     <b> หัวหน้างาน/หัวหน้าสาขาวิชา : </b> {{ $item->user->department->manager_name ?? '' }}
                                                     <span
                                                        class="right badge badge-{{ $item->approve_mng ? 'success' : 'warning' }}">
                                                        {{ $item->approve_mng ? 'อนุมัติ' : 'รออนุมัติ' }}</span> <br>
                                                     <b> ผู้ตรวจสอบ :  </b> {{ $item->spo_user ?? '' }} 
                                                     <span class="right badge badge-{{ $item->approve_spo ? 'success' : 'warning' }}">
                                                        {{ $item->approve_spo ? 'ตรวจสอบแล้ว' : 'รอตรวจสอบ' }} </span> <br>
                                                      
                                                     <b> ผู้อำนวยการกองบริหารงานคณะฯ :  </b> {{ $item->dir_user ?? '' }} 
                                                     <span
                                                        class="right badge badge-{{ $item->approve_dir ? 'success' : 'warning' }}">
                                                        {{ $item->approve_dir ? 'อนุมัติ' : 'รออนุมัติ' }}</span>
                                                    <br>
                                                     <b> สถานะ : </b>  <span
                                                     class="right badge badge-{{ $item->approve_dir ? 'success' : 'warning' }}">
                                                     {{ $item->withdraw_status ? 'สำเร็จ' : 'สำเร็จ' }}</span>
                                                 </td>
                                                 <td> <a class="btn btn-info btn-sm" href=" {{ route('spoWithdraw.checkoutShow', $item->id ??'') }} ">
                                                </i> รายละเอียด </a> </td>
                                                    
        
                                            </tr>
                                        @endforeach
                                        </tbody>
                    
                                    </table>
                                </div>
                                 
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col (RIGHT) -->
            
        </div>
    </div>
</div>
@endsection
