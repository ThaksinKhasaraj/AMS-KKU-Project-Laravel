@extends('layouts.master')
@section('content')
 <!-- Ionicons -->
 <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> รายการวัสดุ </h1><br>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active">รายการวัสดุ</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->

            <!-- Small boxes (Stat box) -->
            <div class="row container-fluid ">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>150</h3>
                            <p> รายการวัสดุทั้งหมด </p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-clipboard"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i data-feather="arrow-right-circle"></i> </a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>53<sup style="font-size: 20px"></sup></h3>

                            <p>วัสดุที่สามารถเบิกได้</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-checkmark-circled"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i data-feather="arrow-right-circle"></i> </a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>44</h3>

                            <p>วัสดุที่ใกล้หมด</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-plus-circled"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i data-feather="arrow-right-circle"></i> </a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>65</h3>

                            <p>วัสดุที่ไม่สามารถเบิกได้</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-close-circled"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i data-feather="arrow-right-circle"></i> </a>
                    </div>
                </div>
                <!-- ./col -->
            </div>


        </div><!-- /.container-fluid -->
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card card-primary card-outline">
                        <div class="card-body">
                            <h5 class="card-title"> เพิ่มรายการวัสดุ</h5><br>

                            <a href="{{ route('materials.create') }}" class="btn btn-sm btn-info">
                                <i data-feather="plus-square"></i> เพิ่มรายการวัสดุ </a><br><br>
                            <example-comnent></example-comnent>

                            @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif

                            <table class="table table-bordered datatable">
                                <thead>
                                    <tr>
                                        <th>ลำดับ</th>
                                        <th>รหัสวัสดุ</th>
                                        <th>รายการวัสดุ</th>
                                        <th>รูปภาพ</th>
                                        <th>ราคาต่อหน่วย</th>
                                        <th>จำนวนคงเหลือ</th>
                                        <th>หน่วยนับ</th>
                                        <th width="250px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($materials)
                                    
                                    @foreach ($materials as $key => $material)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $material->mateID }}</td>
                                            <td>{{ $material->mateName }}</td>
                                            <td><img src="/mateImage/{{ $material->mateImage }}" width="100px"></td>
                                            <td>{{ $material->matePrice }}</td>
                                            <td>{{ $material->mateAmount }}</td>
                                            <td>{{ $material->mateUnit }}</td>

                                            <td>

                                                <a href="{{ route('materials.edit', $material->id) }} "
                                                    class="btn btn-sm btn- btn-warning">
                                                    <i data-feather="edit"></i> แก้ไข </a>

                                                    <a class="btn btn-success btn-sm"
                                                href="{{ route('materials.show', $material->id) }}">
                                                <i data-feather="monitor"></i> แสดง</a>
                                            </a>

                                                <a href="javascript:;" class="btn btn-sm btn-danger sa-delete"
                                                    data-form-id="material-delete-{{ $material->id }}">
                                                    <i data-feather="trash-2"></i> ลบ </a>

                                                <form id="material-delete-{{ $material->id }}"
                                                    action="{{ route('materials.destroy', $material->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                    
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

@endsection

