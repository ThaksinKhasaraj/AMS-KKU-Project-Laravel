@extends('layouts.masterSpo')
@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> คำขอรออนุมัติส่งคืน </h1><br>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('Supplyofficer.index') }}"> หน้าหลัก </a></li>
                        <li class="breadcrumb-item active"> คำขอรออนุมัติส่งคืน </li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.row -->
    </div><!-- /.row -->


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
                                        <th> เลขที่ใบเบิก </th>
                                        <th> วันที่เบิก </th>
                                        <th> วันที่ส่งคืน </th>
                                        <th> ผู้ขอเบิก </th>
                                        <th> สถานะใบเบิก </th>
                                        <th> Action </th>
                                    </tr>
                                </thead>
                                <tbody>

                                    
                                            <tr>
                                                <td>  </td>
                                                <td>  </td>
                                                <td> </td>
                                                <td>  </td>
                                                <td> </td>
                                                <td> </td>

                                                <td>
                                                    <button href="#spo_Approve" data-toggle="modal" type="submit"
                                                        class="btn btn-info btn-sm "> <i data-feather="pen-tool"></i>
                                                        อนุมัติ </button>
                                                    <a class="btn btn-primary btn-sm"
                                                        href=" ">
                                                        <i data-feather="eye"></i> รายละเอียด </a>
                                                </td>

                                </tbody>
                                

                            </table>

                        </div>
                    </div>

                    <!-- /Delete Modal -->
                    <!-- Add Modal -->
                    <div class="modal fade" id="spo_Approve" aria-hidden="true" role="dialog">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title "> <b> อนุมัติใบคำขอเบิก </b></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>

                                </div>

                                <form action=" " method="POST"
                                    enctype="multipart/form-data">
                                    <br>
                                    @csrf

                                    <div class="modal-body">

                                        <div class="row form-row">
                                            <div class="col-12">
                                                <div class="form-group">

                                                    <label> เลขที่ใบเบิก <span class="text-danger"> * </span></label>
                                                    <select class="select2 form-select form-control" name="withdrawID">
                                                        
                                                            <option value=" ">
                                                                 
                                                            </option>
                                                         
                                                    </select>

                                                </div>
                                            </div>
                                            <input type="hidden" name="">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label> ลายเซ็น </label>
                                                    <input class="form-control" name="spoSignature">
                                                </div>

                                                <div class="container">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label> อัพโหลดลายเซ็น </label>
                                                            <div class="input-group">
                                                                <span class="input-group-btn">
                                                                    <span class="btn btn-default btn-file">
                                                                        อัพโหลด <input type="file" id="imgInp">
                                                                    </span>
                                                                </span>
                                                                <input type="text" class="form-control" readonly>
                                                            </div>
                                                            <img id='img-upload' />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary " data-dismiss="modal">
                                                ยกเลิก
                                            </button>
                                            <button type="submit" class="btn btn-primary "> ยืนยันอนุมัติ </button>
                                        </div>

                                </form>
                            </div>
                        </div>

                        <!-- /ADD Modal -->

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection
