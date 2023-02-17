@extends('layouts.master')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> ประวัติ </h1><br>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active">ประวัติ</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
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
                                            
                                            <a class="btn btn-secondary" href="{{ route('history.index') }}"> 
                                                <i data-feather="arrow-left-circle"></i> ย้อนกลับ
                                            </a><br>
                                             
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                                
                            </div><br>
                              
                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                    <form action="#">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <input type="date" name="start_date" class="form-control" value="{{request('start_date')}}" />
                                            </div>
                                            <div class="col-md-5">
                                                <input type="date" name="end_date" class="form-control" value="{{request('end_date')}}" />
                                            </div>
                                            <div class="col-md-2">
                                                <button class="btn btn-outline-primary" type="submit"> แสดง </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <br>
                            
                            
                            <table class="table table-bordered datatable">
                                <thead>
                                    <tr>
                                        <th> ลำดับ </th>
                                        <th> เลขที่ใบเบิก </th>
                                        <th> วันที่เบิก </th>
                                        <th> วันที่อนุมัติ </th>
                                        <th> สถานะใบเบิก </th>
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

                                            <a class="btn btn-primary btn-sm" href="">
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
