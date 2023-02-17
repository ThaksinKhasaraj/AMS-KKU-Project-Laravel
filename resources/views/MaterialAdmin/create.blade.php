@extends('layouts.master')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> เพิ่มรายการวัสดุ </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active">เพิ่มรายการวัสดุ</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary card-outline">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12 margin-tb">
                                    <div class="pull-left">
                                        <div class="pull-right">
                                            <a class="btn btn-secondary btn-sm" href="{{ route('materialSpo.index') }}"><i data-feather="arrow-left-circle"></i>  ย้อนกลับ
                                            </a><br>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="{{ route('materials.store') }}" method="POST" enctype="multipart/form-data"><br>
                                @csrf

                                <form>
                                    <div class="form-row">
                                        <div class="form-group col-md-">
                                            <label>รหัสวัสดุ:</label>*
                                            
                                            <input type="int" class="form-control" name="mateID" placeholder="รหัสวัสดุ">
                                            
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="input">ชื่อวัสดุ:</label>*
                                            <input type="text" class="form-control" name="mateName"
                                                placeholder="ชื่อวัสดุ">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>หมวดหมู่วัสดุ:</label>*
                                            <select name="cateName" class="form-control">
                                                <option selected>เลือก...</option>
                                                <option> วัสดุสำนักงาน </option>
                                                <option> วัสดุงานบ้าน </option>
                                                <option> วัสดุคอมพิวเตอร์ </option>
                                                <option> วัสดุวิทยาศาสตร์ </option>
                                                <option> วัสดุโฆษณาและเผยแพร่ </option> 
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-2">
                                            <label>จำนวน:</label>*
                                            <input type="float" class="form-control" name="mateAmount" placeholder="0">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>ราคา:</label>*
                                            <input type="float" class="form-control" name="matePrice" placeholder="0">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>หน่วยนับ:</label>*
                                            <input type="text" class="form-control" name="mateUnit"
                                                placeholder="หน่วยนับ">
                                        </div>

                                        <div class="form-group col-md-2">
                                            <label>สถานะ:</label>*
                                            <div class="form-check ">
                                                <input class="form-check-input" type="radio" id="mateStatus" name="mateStatus">
                                                <label class="form-check-label" for="flexRadioDefault1" default>
                                                    เบิกได้
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" id="mateStatus">
                                                    
                                                <label class="form-check-label" for="flexRadioDefault2" type="radio" id="mateStatus" name="mateStatus" default>
                                                    รอจัดซื้อ
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <strong>รายละเอียด:</strong>*
                                                <textarea class="form-control" style="height:90px" name="mateDetail"></textarea>
                                            </div>
                                        </div>

                                        <div class="col-xs-8 col-sm-8 col-md-8">
                                            <div class="form-row">
                                                <strong>อัพโหลดรูปภาพ:</strong>*
                                                <input type="file" name="mateImage" class="form-control"
                                                    placeholder="mateImage"><br><br><br>
                                            </div>
                                        </div>
                                        
                                        <div class="col-xs-12 col-sm-12 col-md-12 ">
                                            <button type="submit" class="btn btn-primary"> <i data-feather="save"></i> บันทึก</button>
                                            <button type="reset" class="btn btn-danger"> <i data-feather="refresh-ccw"></i>  รีเช็ท</button>

                                        </div>

                                </form>
                        </div>
                    </div><!-- /.card -->
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
    </div>
    </div>

@endsection
