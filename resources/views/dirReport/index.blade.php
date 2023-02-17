@extends('layouts.masterDir')
@section('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"
        integrity="sha512-QSkVNOCYLtj73J4hbmVoOV6KVZuMluZlioC+trLpewV8qMjsWqlIQvkn1KGX2StWvPMdWGBqim1xlC8krl1EKQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> รายงาน </h1><br>
                    <div class="text-crnter" > 
                        <h3 class="m-0 text-dark" > ข้อมูล ณ {{ Carbon\Carbon::now()->thaidate('วัน l ที่ j F พ.ศ. Y') }} </h3>
                    </div>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('Director.index') }} ">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active"> รายงาน </li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
    </div>



    <!-- Small boxes (Stat box) -->
    <div class="row container-fluid  ">
        <div class="col-lg-3 col-3">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3> {{ count($withdraws ?? '') }} </h3>
                    <p> จำนวนเบิกวัสดุทั้งหมด </p>
                </div>
                <div class="icon">
                    <i class="ion ion-checkmark-circled"></i>
                </div>
                <a href="{{ route('dirHistory.index') }}" class="small-box-footer"> ข้อมูลเพิ่มเติม <i
                        data-feather="arrow-right-circle"></i> </a>
            </div>
        </div>
    

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
                <a href="" class="small-box-footer"> ข้อมูลเพิ่มเติม <i
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
                    <i class="ion ion-person-stalker"></i>
                </div>
                <a href="#user" data-toggle="modal" type="submit"  class="small-box-footer"> ข้อมูลเพิ่มเติม <i data-feather="arrow-right-circle"></i> </a>
            </div>
        </div>
        <!-- ./col -->

          <!-- ./col -->
          <div class="col-lg-3 col-3">
            <!-- small box -->
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3> {{ count($departments ?? '') }} <sup style="font-size: 20px"></sup></h3>
                    <p> หน่วยงาน/สาขาวิชาทั้งหมด </p>
                </div>
                <div class="icon">
                    <i class="ion ion-briefcase"></i>
                </div>
                <a href="#dept" data-toggle="modal" type="submit" class="small-box-footer"> ข้อมูลเพิ่มเติม <i
                        data-feather="arrow-right-circle"></i> </a>
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


    <!-- User -->
    <div class="modal fade" id="user" aria-hidden="true" role="dialog">
        <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title "> <b> บุคลากร/อาจารย์ </b></h3>
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
                                    <th> รายชื่อผู้ใช้งาน </th>
                                    <th> หน่วยงาน/สาขาวิชา </th>
                                    <th> อีเมล </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($users)
                                    @foreach ($users as $key => $user)
                                        <tr>
                                            <td> {{ ++$key }} </td>
                                            <td> {{ $user->name ?? '' }}</td>
                                            <td> {{ $user->department->dept_name ?? '' }}</td>
                                            <td> {{ $user->email ?? '' }}</td>

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


    <!-- Department -->
    <div class="modal fade" id="dept" aria-hidden="true" role="dialog">
        <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title "> <b> หน่วยงาน/สาขาวิชา </b></h3>
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
                                    <th> หัวหน้าหน่วยงาน/สาขาวิชา </th>
                                    <th> ชื่อหน่วยงาน/สาขาวิชา </th>
                                    <th> ที่อยู่ </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($departments)
                                    @foreach ($departments as $key => $dept)
                                        <tr>
                                            <td> {{ ++$key }} </td>
                                            <td> {{ $dept->dept_name ?? '' }}</td>
                                            <td> {{ $dept->manager_name ?? '' }}</td>
                                            <td> {{ $dept->dept_address ?? '' }}</td>

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
