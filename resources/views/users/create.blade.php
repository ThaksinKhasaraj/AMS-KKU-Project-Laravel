@extends('layouts.masterSpo')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> เพิ่มผู้ใช้งาน </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active">เพิ่มผู้ใช้งาน</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>


    @if ($errors->any())
    <div class="alert alert-danger">
        <strong> มีข้อผิดพลาด! </strong> โปรดตรวจสอบข้อมูลที่กรอกก่อนทำรายการ <br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-orange card-outline">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12 margin-tb">
                                    <div class="pull-left">
                                        <div class="pull-right">
                                            <a class="btn btn-secondary btn-sm" href="{{ route('users.index') }}"><i
                                                    data-feather="arrow-left-circle"></i> ย้อนกลับ
                                            </a><br>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data"><br>
                                @csrf

                                <form>
                                    <div class="form-row">
                              
                                        <div class="form-group col-md-6">
                                            <label for="input"> ชื่อบุคลากร : <span class="text-danger">*</span> </label>
                                            <input type="text" class="form-control" name="name"
                                                placeholder="ชื่อ-สกุล">
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="input"> หน่วยงาน/สาขาวิชา : <span class="text-danger">*</span> </label>
                                            <select name="department" id="department" class="form-control">
                                                <option selected>เลือก...</option>
                                                @foreach ($departments as $department)
                                                    <option value="{{ $department->id }}"> {{ $department->dept_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="input"> ตำแหน่ง : <span class="text-danger">*</span> </label>
                                            <input type="text" class="form-control" name="emp_position"
                                                placeholder="ตำแหน่ง">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="input"> ประเภทพนักงาน : <span class="text-danger">*</span> </label>
                                            <input type="text" class="form-control" name="emp_type"
                                                placeholder="ประเภทพนักงาน">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="input"> เบอร์โทรศัพท์ : </label>
                                            <input type="tel" class="form-control" name="emp_phone"
                                                placeholder="เบอร์โทรศัพท์">
                                        </div>
                                        
                                        
                                    </div> <br>
                                    
                                    <h5> <b> กำหนดสิทธิ์การใช้งาน </b></h5><br>
                                    
                                    <div class="form-row">

                                        <div class="form-group col-md-10">
                                            <label for="email"> อีเมล : <span class="text-danger">*</span> </label>
                                            <input type="email" class="form-control" name="email" placeholder="อีเมล">
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="input" >รหัสผ่าน : <span class="text-danger">*</span> </label>
                                            <input id="password" class="form-control" type="password" name="password" required
                                            autocomplete="new-password" placeholder="กรุณากรอกรหัสผ่านจำนวน 8 ตัวขึ้นไป">        
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="input">ยืนยันรหัสผ่าน : <span class="text-danger">*</span> </label>
                                            <input id="password_confirmation" class="form-control" type="password"
                                                name="password_confirmation" required autocomplete="new-password" placeholder="กรุณากรอกรหัสผ่านจำนวน 8 ตัวขึ้นไป" />
                                        </div>
                            
                                    
                                        <div class="form-group col-md-4">
                                            <label for="input"> สิทธิ์การใช้งาน : <span class="text-danger">*</span> </label>
                                            <select name="role" class="form-control">
                                                <option selected>เลือก...</option>
                                                <option> บุคลากร/อาจารย์ </option>
                                                <option> หัวหน้างาน/หัวหน้าสาขาวิชา </option>
                                                <option> เจ้าหน้าที่พัสดุ </option>
                                                <option> ผู้อำนวยการกองบริหารงานคณะฯ </option>
                                                <option> แอดมิน </option>
                                            </select>
                                        </div>

                                        <div class="col-xs-2 col-sm-2 col-md-6">
                                            <div class="form-group">
                                                <strong for="input"> หมายเหตุ : </strong>
                                                <textarea class="form-control" style="height:90px" name="emp_note"></textarea>
                                            </div>
                                        </div>


                                    <div class="form-row">
                                        <strong text-center> อัพโหลดลายเซ็น : <span class="text-danger">*</span> </strong>

                                        <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail img-raised">
                                                <img id="blah" src="http://placehold.it/180" width="150px"
                                                    alt="">
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail img-raised"></div>
                                            <div><br>
                                                <span class="btn btn-raised btn-round btn-default btn-file">
                                                    <span class="fileinput-new"> เลือกรูปลายเซ็น </span>

                                                    <input type="file" name="signatureImage" class="form-control"
                                                        onchange="readURL(this);" />
                                                </span>

                                            </div>
                                        </div>
                                    </div><br>


                                        <div class="col-xs-12 col-sm-12 col-md-12 ">
                                            <button type="submit" class="btn btn-primary"> <i data-feather="save"></i>
                                                บันทึก</button>
                                            <button type="reset" class="btn btn-danger"> <i data-feather="refresh-ccw"></i>
                                                รีเช็ท</button>
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
