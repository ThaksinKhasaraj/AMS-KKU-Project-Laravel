@extends('layouts.masterSpo')
@section('content')
   
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js">
        < script src = "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" >
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <div class="content-header" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> รายงาน </h1><br>
                    <div class="text-crnter">
                        <h3 class="m-0 text-dark"> ข้อมูล ณ {{ Carbon\Carbon::now()->thaidate('วัน l ที่ j F พ.ศ. Y') }}
                        </h3>
                    </div>
                </div> 
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('Supplyofficer.index') }}"> หน้าหลัก </a></li>
                        <li class="breadcrumb-item active"> รายงาน </li>

                    </ol>
                </div> 
            </div> 
        </div> 
    </div> 


    <!-- Small boxes (Stat box) -->
    <div class="row container-fluid ">
        <div class="col-lg-3 col-3">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3> {{ count($pay ??'') }} <sup style="font-size: 20px"></sup></h3>
                        <p> จำนวนเบิก-จ่ายทั้งหมด  </p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-checkmark-circled"></i>
                    </div>
                    <a href="{{ route('spoReport.index') }}" class="small-box-footer"> ข้อมูลเพิ่มเติม <i
                            data-feather="arrow-right-circle"></i> </a>
                </div>
            </div>
            <!-- ./col -->

        

        <div class="col-lg-3 col-3">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3> {{ $NoApprove ?? '' }}<sup style="font-size: 20px"></sup></h3>
                    <p> ใบคำขอเบิกที่ไม่อนุมัติทั้งหมด </p>
                </div>
                <div class="icon">
                    <i class="ion ion-close-circled"></i>
                </div> 
                <a href="#no_approve" data-toggle="modal" type="submit" class="small-box-footer"> ข้อมูลเพิ่มเติม <i
                        data-feather="arrow-right-circle"></i> </a>
            </div>
        </div>
        <!-- ./col -->

       
            <div class="col-lg-3 col-3">
                <!-- small box -->
                <div class="small-box bg-secondary">
                    <div class="inner">
                        <h3> {{  $TotalMate ??'' }} <sup style="font-size: 20px"></sup></h3>
                        <p> จำนวนวัสดุทั้งหมด(ชิ้น)  </p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-archive"></i>
                    </div>
                    <a href="{{ route('materials.index') }}" class="small-box-footer"> ข้อมูลเพิ่มเติม <i
                            data-feather="arrow-right-circle"></i> </a>
                </div>
            </div>
            <!-- ./col -->

        @php $TotalMatePrice = 0 @endphp
        @foreach ($materials as $item)
        @php $TotalMatePrice += $item->mate_amount * $item->mate_price ??'' @endphp
        @endforeach

        <div class="col-lg-3 col-3">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>  {{ number_format($TotalMatePrice, 2 ) ??''}} <sup style="font-size: 20px"></sup></h3>
                    <p> มูลค่าวัสดุในคลัง(บาท) </p>
                </div>
                <div class="icon">
                    <i class="ion ion-cash"></i>
                </div>
                <a href="{{ route('materials.index') }}" class="small-box-footer"> ข้อมูลเพิ่มเติม <i
                        data-feather="arrow-right-circle"></i> </a>
            </div>
        </div>
        <!-- ./col -->
      



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


<!-- No Approve -->
    <div class="modal fade" id="no_approve" aria-hidden="true" role="dialog">
        <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title "> <b> ใบคำขอเบิกที่ไม่อนุมัติ </b></h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <table id="material" style="width:100%" class="table table-bordered datatable">

                            <thead>
                                <tr>
                                    <th> ลำดับ </th>
                                    <th> รายการ </th>
                                    <th> รายละเอียด </th>
                                     
                                </tr>
                            </thead>
                            <tbody>
                                @if ($NoAp)
                                    @foreach ($NoAp as $key => $item)
                                        <tr>
                                            <td> {{ ++$key }} </td>
                                            
                                            <td> <b> วันที่เบิก : </b> 
                                                    {{ $item->created_at->thaidate('วันl ที่ j F พ.ศ. Y') ??'' }} <br>
                                                    <b> เลขที่ใบเบิก :  </b>{{ $item->withdraw_num ?? '' }} <br>
                                                    <b> ผู้ขอเบิก : </b> {{ $item->user->name ?? '' }} <br> 
                                                    <b> หน่วยงาน/สาขาวิชา : </b> {{ $item->user->department->dept_name ?? '' }} <br>
                                               
                                            </td>
                                             <td>  
                                                <span
                                                        class="right badge badge-{{ $item->withdraw_status ? 'danger' : '' }}">
                                                        {{ $item->withdraw_status ? 'ไม่อนุมัติ' :'' }}</span> <br>
                                                <a class="btn btn-secondary btn-sm"
                                                        href="{{ route('spoWithdraw.show', $item->id ?? '') }} ">
                                                        </i> รายละเอียด </a>
                                                </td>
                                           
                                    @endforeach
                                @endif
                            </tbody>
                        </table>

                    </div>
                </div>
                <!-- /.card-body -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary " data-dismiss="modal">
                        ปิด
                    </button>
                </div>
            </div>
        </div><!-- /.card -->
        <!-- /.row -->
    </div><!-- /.container-fluid -->



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
@endsection
