@extends('layouts.masterEmp')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> ส่งคืน </h1><br>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href=" ">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active">ส่งคืน</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.row -->
    </div><!-- /.row -->


    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-pink card-outline">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12 margin-tb">
                                    <div class="pull-left">
                                        <div class="pull-right">
                                            <a class="btn btn-secondary" href="#">
                                                <i data-feather="arrow-left-circle"></i>
                                                ย้อนกลับ
                                            </a><br>

                                        </div>
                                    </div>
                                </div>

                            </div><br>

                            <div class="form-group text-center">
                                <label for="empCartItems">

                                    <b>
                                        <h3> รายการวัสดุรอส่งคืน </h3>
                                    </b>

                                </label>
                            </div>

                            @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif
                            <div>

                                <div class="card border-0 shadow-sm">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-hover table-white" id="return">
                                                <thead>
                                                    <tr >
                                                        
                                                        <th style="width:200px;"> ลำดับ </th>
                                                        <th style="width:300px;"> รายการ </th>
                                                        <th style="width:300px;" > จำนวนที่ส่งคืน </th>
                                                        
                                                        
                                                    </tr>
                                                </thead>
                                            

                                                <div class="table-responsive">
                                                    <table class="table table-hover table-white">
                                                        <tbody>
                                                            
                                                            @if ($withdraws)
                                                                
                                                            @foreach ($withdrawdetails as $key => $return )
                                                            <tr>
                                                              
                                                                
                                                                <td> {{ ++$key }} </td>
                                                                <td> <img src="storage/mateImage/{{  $return->material->mateImage ??'' }}" width="100px" alt="">  </td>
                                                                 
                                                                <td > รหัสวัสดุ :  {{ $return->material->mateID ??''}} <br>
                                                                    {{ $return->material->mate_name ??''}} <br>
                                                                    จำนวนเบิก :  {{ $return->amount ??''}} {{ $return->material->mate_unit ??''}} <br>
                                                                    <div class="right badge badge-{{ $return->material->mate_note ? 'success' : 'warning' }}">
                                                                        {{ $return->material->mate_note ? 'ไม่ต้องส่งคืน' : 'ต้องส่งคืน' }} </td>
                                                                
                                                               
                                                                        <td data-th="Amount" style="width:100px;">
                                                                            <input type="number" name="amount" min="0" max="{{ $return->amount ??''}}" class="form-control amount update-cart" />
                                                                                
                                                                                
                                                                        </td>
                                                                <td> {{ $return->material->mate_unit ??''}} </td>

                                                                
                                                                <td> 
                                                                    <div class="form-group d-flex justify-content-center flex-wrap mb-0">
                                                                        <button href="#send_withdraw" data-toggle="modal"
                                                                            class="btn btn-pill btn-primary" type="submit">
                                                                            <i data-feather="send"></i> ส่งคืน
                                                                        </button>
                
                                                                    </div>
                                                                </td>
                                                               
                                                               
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                        @endif

                                                    </table>

                                                
                                                </div>

                                                <div class="table-responsive">
                                                    <table class="table table-hover table-white">
                                                        <tbody>
                                                           
                                                                
                                                    </table>
                                                    <div class="form-group d-flex justify-content-center flex-wrap mb-0">


                                                    </div>

                                                </div>

                                                <div class="note">
                                                     
                                                    <p class="text-muted"> </p>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div><!-- /.card -->
                    </div>
                </div>
            </div>
        </div>
    @endsection
