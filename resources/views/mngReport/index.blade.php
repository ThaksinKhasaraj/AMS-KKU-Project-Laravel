@extends('layouts.masterMng')
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
                    <h1 class="m-0 text-dark"> รายงาน </h1><br>
                    <div class="text-crnter">
                        <h3 class="m-0 text-dark"> ข้อมูล ณ {{ Carbon\Carbon::now()->thaidate('วัน l ที่ j F พ.ศ. Y') }}
                        </h3>
                    </div>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('manager.index') }}"> หน้าหลัก </a></li>
                        <li class="breadcrumb-item active"> รายงาน </li>

                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.row -->
    </div><!-- /.row -->



    <!-- Small boxes (Stat box) -->
    <div class="row container-fluid  ">
        <div class="col-lg-3 col-3">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3> {{ $Approve ?? '' }} </h3>
                    <p> เบิกวัสดุทั้งหมด </p>
                </div>
                <div class="icon">
                    <i class="ion ion-checkmark-circled"></i>
                </div>
                <a href="{{ route('mngHistory.index') }}" class="small-box-footer"> ข้อมูลเพิ่มเติม <i
                        data-feather="arrow-right-circle"></i> </a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-3">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3> {{ $NoApprove ?? '' }} <sup style="font-size: 20px"></sup></h3>
                    <p> ใบคำขอเบิกที่ไม่อนุมัติทั้งหมด </p>
                </div>
                <div class="icon">
                    <i class="ion ion-close-circled"></i>
                </div>
                <a href="{{ route('mngTrack.index') }}" class="small-box-footer"> ข้อมูลเพิ่มเติม <i
                        data-feather="arrow-right-circle"></i> </a>
            </div>
        </div>
        <!-- ./col -->


        <div class="col-lg-3 col-3">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3> {{ count($pay ?? '') }} <sup style="font-size: 20px"></sup></h3>
                    <p> จ่ายวัสดุแล้วทั้งหมด </p>
                </div>
                <div class="icon">
                    <i class="ion ion-archive"></i>
                </div>
                <a href="{{ route('mngTrack.index') }}" class="small-box-footer"> ข้อมูลเพิ่มเติม <i
                        data-feather="arrow-right-circle"></i> </a>
            </div>
        </div>
        <!-- ./col -->


        <div class="col-lg-3 col-3">
            <!-- small box -->
            <div class="small-box bg-pink">
                <div class="inner">
                    <h3> {{ count($users ?? '') }} <sup style="font-size: 20px"></sup></h3>
                    <p> บุคลากรทั้งหมด</p>
                </div>
                <div class="icon">
                    <i class="ion ion-briefcase"></i>
                </div>
                <a href="#" class="small-box-footer"> ข้อมูลเพิ่มเติม <i data-feather="arrow-right-circle"></i> </a>
            </div>
        </div>
        <!-- ./col -->
    </div>


    <!-- Main content -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">


                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title"> จำนวนการเบิก-จ่ายวัสดุในแต่ละเดือน </h3>

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
                        <canvas id="myChart" height="100%"></canvas>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
    </div>
    <!-- /.col (LEFT) -->




    <!-- Bar chart-->
    <script type="text/javascript">
        var labels = {{ Js::from($labels) }};
        var users = {{ Js::from($data) }};

        const data = {
            labels: labels,
            datasets: [{
                label: 'จำนวนการเบิก-จ่ายวัสดุ',
                backgroundColor: 'rgb(75, 192, 192)',
                borderColor: 'rgb(75, 192, 192)',
                data: users,
            }]
        };

        const config = {
            type: 'line',
            data: data,
            options: {}
        };

        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
    </script>

    {{--                 
                <div class="col-md-6">

                    <!-- PIE CHART -->
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title"> มูลค่าวัสดุตามประเภทวัสดุ </h3>

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
                                                <th> ประเภทวัสดุ </th>
                                                <th> มูลค่ารวม(บาท) </th>
                                              
                                            
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i=0;
                                            @endphp
                                           
                                           @if ($categories)
                                           @foreach ($categories as $key => $item)
                                               <tr>
                                                   <td> {{ ++$key ?? '' }} </td>
                                                   <td> {{ $item->cate_name ?? '' }} </td>
                                                   <td>  </td>
                                                   <td>  </td>
                                                   
                                                   
                                               </tr>
                                           @endforeach
                                           @endif
                                        
                                        </tbody>
                    
                                    </table>
                                </div>
                                 
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col (RIGHT) -->
                --}}






    {{-- 
                <div class="col-md-6">

                    <!-- DONUT CHART -->
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title"> มูลค่าการเบิกวัสดุตามหมวดหมู่วัสดุแยกตามหน่วยงาน </h3>

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
                            <canvas id="donutChart"
                                style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->



                </div>
                <!-- /.col (LEFT) -->
                <div class="col-md-6">

                    <!-- PIE CHART -->
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title"> หน่วยงานที่มีการเบิกวัสดุบ่อยสุดในแต่ละปีงบประมาณ </h3>

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
                            <canvas id="pieChart"
                                style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col (RIGHT) -->

                <div class="col-md-12">
                    <!-- Bar Chart -->
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title"> Area Chart </h3>

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
                            <div class="chart">
                                <div style="margin-top: 20px;">

                                    <div class="container-fluid p-2">
                                        <div id="barchart_withdraw" style="width: 100%; height: 500px;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div> --}}
    <!-- /.row -->



@endsection
