@extends('layouts.masterSpo')
@section('content')

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> รายชื่อผู้ใช้งาน </h1><br>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('Supplyofficer.index') }}"> หน้าหลัก </a></li>
                        <li class="breadcrumb-item active"> รายการวัสดุ </li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->

            <!-- Small boxes (Stat box) -->
            <div class="row container-fluid ">
                <div class="col-lg-2 col-3">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ count($users) }}</h3>

                            <p> รายชื่อผู้ใช้งานทั้งหมด </p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-stalker"></i>
                        </div>
                        <a href="#" class="small-box-footer"> ข้อมูลเพิ่มเติม <i
                                data-feather="arrow-right-circle"></i> </a>
                    </div>
                </div>

                <!-- ./col -->
                <div class="col-lg-2 col-3">
                    <!-- small box -->
                    <div class="small-box bg-pink">
                        <div class="inner">
                            <h3>{{ $usersGroupByRoleCount['บุคลากร/อาจารย์'] ?? '0' }}<sup style="font-size: 20px"></sup>
                            </h3>

                            <p> บุคลากร/อาจารย์ </p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person"></i>
                        </div>
                        <a href="#employee" data-toggle="modal" type="submit" class="small-box-footer"> ข้อมูลเพิ่มเติม <i
                                data-feather="arrow-right-circle"></i> </a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-2 col-3">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $usersGroupByRoleCount['หัวหน้างาน/หัวหน้าสาขาวิชา'] ?? '0' }}</h3>

                            <p> หัวหน้างาน/สาขาวิชา </p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person"></i>
                        </div>
                        <a href="#manager" data-toggle="modal" type="submit" class="small-box-footer"> ข้อมูลเพิ่มเติม <i
                                data-feather="arrow-right-circle"></i> </a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-2 col-3">
                    <!-- small box -->
                    <div class="small-box bg-orange">
                        <div class="inner">
                            <h3>{{ $usersGroupByRoleCount['เจ้าหน้าที่พัสดุ'] ?? '0' }}</h3>

                            <p> เจ้าหน้าที่พัสดุ </p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person"></i>
                        </div>
                        <a href="#supOffice" data-toggle="modal" type="submit" class="small-box-footer"> ข้อมูลเพิ่มเติม <i
                                data-feather="arrow-right-circle"></i> </a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-2 col-3">
                    <!-- small box -->
                    <div class="small-box bg-secondary">
                        <div class="inner">
                            <h3>{{ $usersGroupByRoleCount['ผู้อำนวยการกองบริหารงานคณะฯ'] ?? '0' }}</h3>

                            <p> ผอ.กองบริหารงานคณะ </p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person"></i>
                        </div>
                        <a href="#director" data-toggle="modal" type="submit" class="small-box-footer"> ข้อมูลเพิ่มเติม <i
                                data-feather="arrow-right-circle"></i> </a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-2 col-3">
                    <!-- small box -->
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h3> {{ $usersGroupByRoleCount['แอดมิน'] ?? '0' }} </h3>
                            <p> แอดมิน </p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person"></i>
                        </div>
                        <a href="#admin" data-toggle="modal" type="submit" class="small-box-footer"> ข้อมูลเพิ่มเติม <i
                                data-feather="arrow-right-circle"></i> </a>
                    </div>
                </div>
                <!-- ./col -->
            </div>


            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif

            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card card-orange card-outline">
                                <div class="card-body">
                                    <h5 class="card-title"> เพิ่มผู้ใช้งาน </h5><br>
                                    <a href="{{ route('users.create') }}" class="btn btn-sm btn-info">
                                        <i data-feather="plus-square"></i> เพิ่มผู้ใช้งาน </a><br><br>

                                    <table class="table table-bordered datatable">
                                        <thead>
                                            <tr>
                                                <th> ลำดับ </th>
                                                <th> รายชื่อผู้ใช้งาน </th>
                                                <th> หน่วยงาน/สาขาวิชา </th>
                                                <th> อีเมล </th>
                                                <th> สิทธิ์การใช้งาน </th>
                                                {{-- <th> ใช้งานล่าสุด </th> --}}
                                                <th> จัดการ </th>
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
                                                        <td> {{ $user->role ?? '' }}</td>
                                                        {{-- <td> {{ Carbon\Carbon::parse($user->created_at)->diffforhumans() ?? '' }}</td> --}}
                                                        <td>
                                                            <a href="{{ route('users.edit', $user->id ?? '') }} "
                                                                class="btn btn-sm btn- btn-warning">
                                                                <i data-feather="edit"></i> แก้ไข </a>

                                                            <a href="javascript:;" class="btn btn-sm btn-danger sa-delete"
                                                                data-form-id="user-delete-{{ $user->id }}">
                                                                <i data-feather="trash-2"></i> ลบ </a>

                                                            <form id="user-delete-{{ $user->id ?? '' }}"
                                                                action="{{ route('users.destroy', $user->id ?? '') }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div><!-- /.card -->
                            <!-- /.row -->
                        </div><!-- /.container-fluid -->
                    </div>
                    <!-- /.content -->
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>


    <!-- Employee -->
    <div class="modal fade" id="employee" aria-hidden="true" role="dialog">
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
                                @if ($employee)
                                    @foreach ($employee as $key => $user)
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
</div>
<!-- /.content -->
</div>
</div>


    <!-- Manager -->
    <div class="modal fade" id="manager" aria-hidden="true" role="dialog">
        <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title "> <b> หัวหน้างาน/หัวหน้าสาขาวิชา </b></h3>
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
                                @if ($manager)
                                    @foreach ($manager as $key => $user)
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
</div>
<!-- /.content -->
</div>
</div>



    <!-- Suplly Office -->
    <div class="modal fade" id="supOffice" aria-hidden="true" role="dialog">
        <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title "> <b> เจ้าหน้าที่พัสดุ </b></h3>
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
                                @if ($supOffice)
                                    @foreach ($supOffice as $key => $user)
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
</div>
<!-- /.content -->
</div>
</div>


    <!-- Director -->
    <div class="modal fade" id="director" aria-hidden="true" role="dialog">
        <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title "> <b> ผู้อำนวยการกองบริหารงานคณะฯ </b></h3>
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
                                @if ($director)
                                    @foreach ($director as $key => $user)
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
</div>
<!-- /.content -->
</div>
</div>


  <!-- Admin -->
  <div class="modal fade" id="admin" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title "> <b> แอดมิน </b></h3>
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
                            @if ($admin)
                                @foreach ($admin as $key => $user)
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
</div>
<!-- /.content -->
</div>
</div>



@endsection
