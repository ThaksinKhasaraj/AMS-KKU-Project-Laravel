@extends('layouts.masterDir')
@section('content')
 
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  
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
                        <p> เจ้าหน้าที่พัสดุกำลังตรวจทั้งหมด </p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-paper-airplane"></i>
                    </div>
                    <a href="{{ route('dirTrack.index') }}" class="small-box-footer"> ข้อมูลเพิ่มเติม <i
                            data-feather="arrow-right-circle"></i> </a>
                </div>
            </div>
            <!-- ./col -->

            <div class="col-lg-3 col-3">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3> {{ count($wait ??'') }} <sup style="font-size: 20px"></sup></h3>
                        <p> รออนุมัติทั้งหมด </p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-load-b"></i>
                    </div>
                    <a href="{{ route('dirTrack.index') }}" class="small-box-footer"> ข้อมูลเพิ่มเติม <i
                            data-feather="arrow-right-circle"></i> </a>
                </div>
            </div>
            <!-- ./col -->

            <div class="col-lg-3 col-3">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3> {{ count($wait_pay ??'') }}  </h3>
                        <p> อนุมัติแล้วทั้งหมด </p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-checkmark-circled"></i>
                    </div>
                    <a href="{{ route('dirHistory.index') }}" class="small-box-footer"> ข้อมูลเพิ่มเติม <i
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
                    <a href="{{ route('dirReport.index') }}" class="small-box-footer"> ข้อมูลเพิ่มเติม <i
                            data-feather="arrow-right-circle"></i> </a>
                </div>
            </div>
            <!-- ./col -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                  
                    <div class="card card-warning">
                        <div class="card-header">
                            <h3 class="card-title"> รอผู้อำนวยการกองบริหารงานคณะฯ อนุมัติ </h3>

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
                                        <td> <b> วันที่เบิก : </b> 
                                            {{ $item->created_at->thaidate('วันl ที่ j F พ.ศ. Y') ?? '' }} เวลา
                                            {{ date_format(date_create($item->created_at), 'H:i') }} น. <br>
                                            <b> เลขที่ใบเบิก :  </b>{{ $item->withdraw_num ?? '' }} <br>
                                            <b> ผู้เบิก : </b> {{ $item->user->name ?? '' }}<br>
                                            <b> หน่วยงาน/สาขาวิชา : </b> {{ $item->user->department->dept_name ?? '' }}  </td>
                                        
                                        <td>  <a class="btn btn-primary btn-sm"
                                            href="{{ route('dirWithdraw.show', $item->id) }}">
                                            รายละเอียด </a> </td>
                                         
                                    </tr>
                                    @endforeach
                                </tbody>
            
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    

                </div>
             
                
               
                    


            

        </div>
    </div>
</div>
@endsection


