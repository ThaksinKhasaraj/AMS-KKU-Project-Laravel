@extends('layouts.masterSpo')
@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> แก้ไขรายชื่อบุคลากร </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('Supplyofficer.index') }}"> หน้าหลัก </a></li>
                        <li class="breadcrumb-item active"> แก้ไขรายชื่อบุคลากร </li>
                    </ol>

                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

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
                                            <a class="btn btn-secondary" href="{{ route('users.index') }}"> 
                                                <i data-feather="arrow-left-circle"></i>  ย้อนกลับ
                                            </a><br>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <strong> มีข้อผิดพลาด! </strong> โปรดตรวจสอบข้อมูลที่คุณกรอก ก่อนทำรายการ<br><br>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="{{ route('users.update', $user->id ??'') }}" method="POST" enctype="multipart/form-data"><br> 
                                @csrf
                                @method('PUT')
                                <form>
                                    <div class="form-row">
                                        {{-- <div class="form-group col-md-">
                                            <label>รหัสพนักงาน:</label>*
                                            <input type="int" class="form-control" name="empID" placeholder="รหัสพนักงาน"
                                            value="{{ $user->empID }}">
                                            
                                        </div> --}}
                                        <div class="form-group col-md-6">
                                            <label for="input"> ชื่อบุคลากร : <span class="text-danger">*</span> </label>
                                            <input type="text" class="form-control" name="name"
                                                placeholder="ชื่อ-สกุล" value="{{ old('name',$user->name ?? '' ) }}">
                                        </div>

                
                                        <div class="form-group col-md-4">
                                            <label> หน่วยงาน/สาขาวิชา : <span class="text-danger">*</span> </label>
                                            <select name="department" id="department" class="form-control">
                                                <option selected> เลือก...</option>

                                                @foreach ($department as $department)

                                                <option 
                                                @if ($user->department->id ??'' == $department->id ??'') selected 
                                                @endif
                                                    value="{{ old('department',$department->id ??'' ) }}"> {{ $department->dept_name ??'' }}</option>
                                                @endforeach


                                            </select>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="input"> ตำแหน่ง : <span class="text-danger">*</span> </label>
                                            <input type="text" class="form-control" name="emp_position"
                                                placeholder="ตำแหน่ง" value="{{ $user->emp_position ?? '' }}">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="input"> ประเภทพนักงาน : <span class="text-danger">*</span> </label>
                                            <input type="text" class="form-control" name="emp_type"
                                                placeholder="ประเภทพนักงาน" value="{{  old('emp_type',$user->emp_type ?? '' ) }}">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label> เบอร์โทรศัพท์ :  </label>
                                            <input type="tel" class="form-control" name="emp_phone"
                                                placeholder="เบอร์โทรศัพท์" value="{{ old('emp_phone',$user->emp_phone ?? '' ) }}">
                                        </div>
                                       
                                        
                                    </div> <br>

                                    <h5> <b> กำหนดสิทธิ์การใช้งาน </b></h5><br>
                                    <div class="form-row">
                                    
                                            <div class="form-group col-md-10">
                                                <label> อีเมล : <span class="text-danger">*</span> </label>
                                                <input type="email" class="form-control" name="email"
                                                    placeholder="อีเมล" value="{{ old('email',$user->email ?? '' ) }}">
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label for="input" > รหัสผ่านเดิม : </label>
                                                <input id="password" class="form-control" type="password" name="password" placeholder="รหัสผ่าน">        
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label for="input" > รหัสผ่านใหม่ : </label>
                                                <input id="password" class="form-control" type="password" name="password"  placeholder="รหัสผ่าน" >        
                                            </div>
    
                                            <div class="form-group col-md-3">
                                                <label for="input">ยืนยันรหัสผ่านใหม่ : </label>
                                                <input class="form-control" type="password" placeholder="รหัสผ่าน"  />
                                            </div>
                                        
                                        <div class="form-group col-md-3">
                                            <label> สิทธิ์การใช้งาน : <span class="text-danger">*</span></label>
                                            <select name="role" class="form-control" >
                                                <option selected> {{  old('role',$user->role ??'') }} </option>
                                                <option> บุคลากร/อาจารย์ </option>
                                                <option> หัวหน้างาน/หัวหน้าสาขาวิชา </option>
                                                <option> เจ้าหน้าที่พัสดุ </option>
                                                <option> ผู้อำนวยการกองบริหารงานคณะฯ </option>
                                                <option> แอดมิน </option>
                                            </select>
                                        </div>
                                       
                                        <div class="col-xs-2 col-sm-2 col-md-6">
                                            <div class="form-group">
                                                <strong> หมายเหตุ: </strong>
                                                <textarea class="form-control" style="height:90px" name="emp_note" value="{{ old('emp_note',$user->emp_note ??'') }}"> {{ $user->emp_note }} </textarea>
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-sm-12 col-md-12 ">
                                            <button type="submit" class="btn btn-primary"> <i data-feather="save"></i> บันทึก</button>
                                            <button type="reset" class="btn btn-danger"> <i data-feather="refresh-ccw"></i>  รีเช็ท</button>

                                        </div>

                                </form>
                        </div> <!-- /.card-body -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
    </div>
    </div>


@endsection
