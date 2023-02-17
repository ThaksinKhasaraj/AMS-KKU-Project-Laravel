@extends('layouts.masterDir')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> คำขอรออนุมัติ </h1><br>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active"> คำขอรออนุมัติ </li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
    </div>

    

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-secondary card-outline">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12 margin-tb">
                                    <div class="pull-left">
                                        <div class="pull-right">
                                            <a class="btn btn-secondary" href="#"> <i
                                                    data-feather="arrow-left-circle"></i> ย้อนกลับ
                                            </a><br>
                                        </div>
                                    </div>
                                </div>
                            </div><br>

                            <table class="table table-bordered datatable">
                                <thead>
                                    <tr>
                                        <th> ลำดับ </th>
                                        <th> วันที่เบิก </th>
                                        <th> ผู้เบิก </th>
                                        <th> หน่วยงาน </th>
                                        <th> วันที่อนุมัติ </th>
                                        <th> สถานะการเบิก </th>
                                        <th> รายละเอียด </th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <tr>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td>
                                            <button type="submit" class="btn btn-info btn-sm "> <i data-feather="pen-tool"></i> อนุมัติ </button>
                                            <a class="btn btn-primary btn-sm" href="#">
                                                <i data-feather="eye"></i> รายละเอียด </a>
                                        </td>
                                </tbody>
                            </table>

            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
    