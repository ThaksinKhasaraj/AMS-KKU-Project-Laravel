@extends('layouts.masterDir')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> ส่งคืน </h1><br>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active"> ส่งคืน </li>
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
                                            <a class="btn btn-secondary" href="{{ route('history.index') }}"> <i
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
                                        <th> เลขที่ใบส่งคืน </th>
                                        <th> วันที่ส่งคืน </th>
                                        <th> วันที่อนุมัติ </th>
                                        <th> สถานะส่งคืน </th>
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

                                        <td>

                                            <button type="submit" class="btn btn-info btn-sm "> 
                                                <i data-feather="check-circle"></i> 
                                            อนุมัติ </button>

                                            <a class="btn btn-primary btn-sm" href="#">
                                                รายละเอียด </a>
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
    