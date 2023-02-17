@extends('layouts.masterEmp')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> เข้าสู่ระบบเรียบร้อยแล้ว </h1><br>
                    <h1 class="m-0 text-dark"> ยินดีต้อนรับ {{auth()->user()->name}} </h1><br>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href=" "> หน้าหลัก </a></li>
                        <li class="breadcrumb-item active"> หน้าหลักพนักงาน </li>
                    </ol>
                </div><!-- /.col -->
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                {{-- <img src="{{ asset('images/welcome.png') }}" alt="Logo"   > --}}
                            </div>
                        </div>
                    </div>
                  
            </div><!-- /.row -->
    </div><!-- /.row -->
</div><!-- /.row -->
    </div>
@endsection
