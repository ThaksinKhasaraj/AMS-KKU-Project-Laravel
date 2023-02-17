@extends('layouts.masterSpo')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> เพิ่มหมวดหมู่วัสดุ</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('Supplyofficer.index') }}">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active">เพิ่มหมวดหมู่วัสดุ</li>
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

                    <div class="card card-orange card-outline">
                        <div class="card-body">
                            <h5 class="card-title">เพิ่มหมวดหมู่วัสดุ</h5><br>

                            <form role="form" action="{{ route('categories.store') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">ชื่อหมวดหมู่วัสดุ</label>
                                        <input name="cate_name" id="cate_name" type="text" class="form-control"
                                            placeholder=" กรุณากรอกชื่อหมวดหมู่วัสดุ ">
                                        @if ($errors->has('cate_name'))
                                            <span class="text-danger"> {{ $errors->first('cate_name') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
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
