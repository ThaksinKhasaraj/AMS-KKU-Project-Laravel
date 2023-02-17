@extends('layouts.masterDir')
@section('content')
<div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> ตั้งค่า </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href=" {{ route('Director.index') }} ">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active">ตั้งค่า</li>
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
                                            <a class="btn btn-secondary btn-sm" href=""><i
                                                    data-feather="arrow-left-circle"></i> ย้อนกลับ
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

                            <form action=" " method="POST" enctype="multipart/form-data"><br>
                                @csrf

                                <form>
                                    <div class="form-row">
                                        <div class="form-group col-md-">
                                            <label for="input">ชื่อ-สกุล:</label>

                                            <input type="int" class="form-control" name="empName"
                                                placeholder="ชื่อพนักงาน" value="">

                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="input">หน่วยงาน/สาขาวิชา:</label>
                                            <select name="deptName" class="form-control">
                                                <option selected>เลือก...</option>
                                                <option> คณะเทคนิคการแพทย์ </option>
                                                <option> สำนักงานคณบดี-คณะเทคนิคการแพทย์ </option>
                                                <option> งานบริหารและธุรการ </option>
                                                <option> งานยุทธศาสตร์ </option>
                                                <option> งานวิชาการและพัฒนานักศึกษา </option>
                                                <option> งานห้องปฏิบตัิการ </option>
                                                <option> ภาควิชาเทคนิคการแพทย์ </option>
                                                <option> ภาควิชากายภาพบำบัด </option>
                                                <option> ภาควิชาเคมีคลินิก </option>
                                                <option> ภาควิชาจุลชีววิทยาคลินิก </option>
                                                <option> ภาควิชาภูมิคุ้มกันวิทยาคลินิก </option>
                                                <option> วิจัย </option>
                                                <option> สถานบริการสุขภาพเทคนิคการแพทย์ฯ </option>

                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="input">ตำแหน่ง:</label>
                                            <input type="text" class="form-control" name="empPositon"
                                                placeholder="ตำแหน่ง">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="input">ประเภทพนักงาน:</label>
                                            <input type="text" class="form-control" name="empType"
                                                placeholder="ประเภทพนักงาน">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="input">เบอร์โทรศัพท์:</label>
                                            <input type="tel" class="form-control" name="empPhone"
                                                placeholder="เบอร์โทรศัพท์">
                                        </div>
                                        

                                        <div class="form-group col-md-10">
                                                <label> อีเมล : <span class="text-danger">*</span> </label>
                                                <input type="email" class="form-control" name="email"
                                                    placeholder="อีเมล" value=" ">
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="input" > รหัสผ่านเดิม : <span class="text-danger">*</span> </label>
                                                <input id="password" class="form-control" type="password" name="password" required
                                                autocomplete="new-password" placeholder="รหัสผ่าน" value="">        
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="input" > รหัสผ่านใหม่ : <span class="text-danger">*</span> </label>
                                                <input id="password" class="form-control" type="password" name="password" required
                                                autocomplete="new-password" placeholder="รหัสผ่าน" value="">        
                                            </div>
    
                                            <div class="form-group col-md-4">
                                                <label for="input">ยืนยันรหัสผ่านใหม่ : <span class="text-danger">*</span> </label>
                                                <input id="password_confirmation" class="form-control" type="password"
                                                    name="password_confirmation" required autocomplete="new-password" placeholder="รหัสผ่าน"  value=""/>
                                            </div>



                                        <div class="form-group col-md-5">
                                            <label for="input"> เชื่อมต่อกับ Line สำหรับฟังก์ชันแจ้งเตือน :</label> <br>

                                            <a href="https://lin.ee/ebSGmYf"><img
                                                    src="https://scdn.line-apps.com/n/line_add_friends/btn/th.png"
                                                    alt=" เชื่อมต่อกับ Line " height="36" border="0"></a>
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

                                                    <input type="file" name="mateImage" class="form-control"
                                                        onchange="readURL(this);" />
                                                </span>

                                            </div>
                                        </div>
                                    </div><br>

                                    <div class="form-group d-flex justify-content-center flex-wrap mb-0">
                                        <button type="reset" class="btn btn-pill btn-danger mr-3">
                                            <i data-feather="refresh-ccw"></i> รีเช็ท

                                        </button>
                                        <button type="submit" class="btn btn-pill btn-primary">
                                            <i data-feather="save"></i> บันทึก
                                        </button>
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



@endsection
