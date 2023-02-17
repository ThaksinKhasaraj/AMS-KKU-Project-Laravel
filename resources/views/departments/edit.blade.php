@extends('layouts.masterSpo')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> แก้ไขหน่วยงาน/สาขาวิชา </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href=" {{ route('Supplyofficer.index') }} "> หน้าหลัก </a></li>
                        <li class="breadcrumb-item active"> แก้ไขหน่วยงาน/สาขาวิชา</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
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

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-12 margin-tb">
                            <div class="pull-left">
                                
                            </div>
                        </div>
                    </div>

                    <div class="card card-orange card-outline">
                        <div class="card-body">
                            <a class="btn btn-secondary btn-sm" href="{{ route('departments.index') }}">
                                <i data-feather="arrow-left-circle"></i>  ย้อนกลับ
                            </a><br><br>
                            <h5 class="card-title">แก้ไขชื่อหน่วยงาน/สาขาวิชา</h5><br>

                            <form role="form" action="{{ route('departments.update', $department->id ??'') }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>หน่วยงาน/สาขาวิชา</label>
                                        <input name="dept_name" id="dept_name" type="text" class="form-control"
                                            placeholder="กรุณากรอกชื่อหน่วยงาน/สาขาวิชา" value="{{ old('dept_name', $department->dept_name ?? '') }}"><br>

                                            <label>ชื่อหัวหน้าหน่วยงาน/สาขาวิชา</label>
                                        <input name="manager_name" id="manager_name" type="text" class="form-control"
                                            placeholder="กรุณากรอกชื่อหัวหน้าหน่วยงาน/สาขาวิชา" value="{{ old('manager_name', $department->manager_name ?? '') }}"><br>

                                            
                                            <label>ที่อยู่</label>
                                            <textarea class="form-control" style="height:100px" name="dept_address" > {{ old('dept_address', $department->dept_address ?? '') }} </textarea>
                                           
                                

                                        @if ($errors->has('dept_name'))
                                            <span class="text-danger"> {{ $errors->first('dept_name' ?? '') }}</span>
                                        @endif

                                    </div>

                                </div>
                                <!-- /.card-body -->

                                <div class="center-card-footer">
                                    <button type="submit" class="btn btn-primary btn-sm"><i data-feather="save"></i> บันทึก </button>
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
