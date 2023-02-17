@extends('layouts.masterEmp')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> รายละเอียดวัสดุ </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="   "> หน้าหลัก </a></li>
                        <li class="breadcrumb-item active"> <a href=" ">รายการวัสดุ </li>
                    </ol>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-7">
                    <div class="card card-primary card-outline">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12 margin-tb">
                                    <div class="pull-left">
                                        <div class="pull-right">
                                            
                                            <a class="btn btn-secondary" href=" "> <i data-feather="arrow-left-circle"></i> ย้อนกลับ
                                            </a><br>
                                        </div>
                                    </div>
                                </div>
                            </div><br>
                            
                            @foreach ($materials as $material)
                             
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong> รหัสวัสดุ: </strong>
                                        {{ $material->mateID }}
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong> รายการ: </strong>
                                        {{ $material->mateName }}
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong> หมวดหมู่วัสดุ: </strong>
                                        {{ $material->cateName }}

                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong> จำนวนคงเหลือ: </strong>
                                        {{ $material->mateAmount }}
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong> หน่วยนับ: </strong>
                                        {{ $material->mateUnit }}
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong> ราคาต่อหน่วย: </strong>
                                        {{ $material->matePrice }}
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong> สถานะ: </strong>
                                        {{ $material->mateStatus}}

                                    </div>
                                </div>


                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong> รายละเอียดวัสดุ: </strong>
                                        {{ $material->mateDetail }}
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong> วันที่เพิ่ม: </strong>
                                        {{ $material->created_at}}
                                    </div>
                                </div>
                            </div>

                        </div> <!-- /.card-body -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
                <div class="col-lg-4">
                    <div class="card h-300">
                        <div class="card-body">
                            <strong> รูปภาพ: </strong>
                                <img src="/mateImage/{{ $material->mateImage }}" width="300px">

                        </div>
                    </div>
                </div>
            </div>
            <!-- /.content -->
           
           @endforeach
        </div>
    </div>
@endsection
