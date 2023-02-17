@extends('layouts.masterSpo')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> รอจ่าย </h1><br>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href=" # ">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active"> รอจ่าย </li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.row -->
    </div><!-- /.row -->
    
    {{-- <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Small boxes (Stat box) -->
    <div class="row container-fluid text-center ">
        <div class="col-lg-3 col-6 ">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3> {{ count($empcarts->toArray()) }} </h3>
                    <p> รายการในตระกร้า </p>
                </div>
                <div class="icon">
                    <i class="ion-ios-cloud-upload"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i data-feather="arrow-right-circle"></i> </a>
            </div>
        </div>

        <!-- ./col -->
        <div class="col-lg-3 col-6 bg-center">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3> {{ count($empcarts->toarray()) }} </h3>

                    <p> ยอดรวมสุทธิ (บาท) </p>
                </div>
                <div class="icon">
                    <i class="ion-android-checkbox-outline"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i data-feather="arrow-right-circle"></i> </a>
            </div>
        </div>
        <!-- ./col -->

    </div> --}}

  

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
                                        <h3> รายการรอจ่าย </h3>
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

                                            <table class="table table-hover table-white" id="tableEstimate">
                                                <thead>
                                                    <tr>

                                                        <th> ลำดับ </th>
                                                        <th class="col-md-2"> รหัสวัสดุ </th>
                                                        <th class="col-md-200"> รายการ </th>
                                                        <th style="width:70px;"> ราคาต่อหน่วย </th>
                                                        <th style="width:5px;"> </th>
                                                        <th style="width:50px;"> จำนวนเบิก </th>
                                                        <th style="width:5px;"> </th>
                                                        <th style="width:50px;"> หน่วยนับ </th>
                                                        <th style="width:80px;"> รวมราคา </th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                       
                                                        @if ($empcarts)
                                                            @foreach ($empcarts as $key => $empcart)
                                                                <td style="width:1px"> {{ ++$key }} </td>
                                                                <td><input class="form-control" type="text"
                                                                        id="mateID" name="mateID"
                                                                        value="{{ $empcart->mateID }}" readonly> </td>
                                                                <td><input class="form-control" type="text"
                                                                        id="mateName" name="mateName"
                                                                        value="{{ $empcart->mateName }}" readonly> </td>
                                                                <td><input class="form-control unit_price"
                                                                        style="width:70px" type="text" id="matePrice"
                                                                        name="matePrice[]"
                                                                        value="{{ $empcart->matePrice }}" readonly> </td>
                                                                <td><a href="javascript:void(0)" class="text-danger font-18"
                                                                        title="Delete" id="DeleteBtn"><i
                                                                            class="fa fa-minus"></i></a></td>
                                                                <td><input class="form-control qty" style="width:90px"
                                                                        type="text" id="mateAmount" name="mateAmount"
                                                                        value="{{ $empcart->mateAmount }}"> </td>
                                                                <td><a href="javascript:void(0)"
                                                                        class="text-success font-18" title="Add"
                                                                        id="addBtn"><i class="fa fa-plus"></i></a></td>
                                                                <td><input class="form-control total" style="width:70px"
                                                                        type="text" id="mateUnit" name="mateUnit"
                                                                        value="  {{ $empcart->mateUnit }} " readonly></td>
                                                                <td><input class="form-control total" style="width:70px"
                                                                        type="text" id="amount" name="amount"
                                                                        value="0" readonly></td>

                                                    </tr>
                                                    @endforeach
                                                    @endif
                                                    <td>

                                                    <td><input class="form-control" type="text" id="mateID"
                                                            name="mateID"> </td>
                                                    <td><input class="form-control" type="text" id="mateName"
                                                            name="mateName"> </td>
                                                    <td><input class="form-control unit_price" type="text" id="matePrice"
                                                            name="matePrice"> </td>
                                                    <td><a href="javascript:void(0)" class="text-danger font-18"
                                                            title="Delete" id="DeleteBtn"><i class="fa fa-minus"></i></a>
                                                    </td>
                                                    <td><input class="form-control mateAmount update-empcar" type="text" id="mateAmount"
                                                            name="mateAmount"> </td>
                                                    <td><a href="javascript:void(0)" class="text-success font-18"
                                                            title="Add" id="update-cart"><i class="fa fa-plus"></i></a>
                                                    </td>
                                                    <td><input class="form-control total" type="text" id="mateUnit"
                                                            name="mateUnit"></td>
                                                    <td><input class="form-control total" type="text" id="amount"
                                                            name="amount" value="0"></td>



                                                    </tr>
                                                </tbody>
                                                <div class="table-responsive">
                                                    <table class="table table-hover table-white">
                                                        <tbody>
                                                            <tr>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>

                                                                <form action="{{ route('empWithdraw.store') }}"
                                                                    method="POST" enctype="multipart/form-data">
                                                                    <br>
                                                                    @csrf
                                                                    @foreach ($empcarts as $empcart)
                                                                        <form>
                                                                            <input type="hidden"
                                                                                value=" {{ $empcart->mateID }} "
                                                                                name="mateID">
                                                                            <input type="hidden"
                                                                                value=" {{ $empcart->mateName }} "
                                                                                name="mateName">
                                                                            <input type="hidden"
                                                                                value=" {{ $empcart->matePrice }} "
                                                                                name="matePrice">
                                                                            <input type="hidden"
                                                                                value=" {{ $empcart->mateUnit }} "
                                                                                name="mateUnit">
                                                                            <input type="hidden"
                                                                                value=" {{ $empcart->mateImage }} "
                                                                                name="mateImage">
                                                                            <input type="hidden" type="number"
                                                                                value="1" name="mateAmount">
                                                                    @endforeach

                                                                    <input type="hidden"
                                                                        value=" {{ Auth::user()->name }}  "
                                                                        name="name">

                                                                    <input type="hidden"
                                                                        value=" {{ Auth::user()->deptName }}  "
                                                                        name="deptName">

                                                                    <input type="hidden"
                                                                        value=" {{ Auth::user()->empPosition }}  "
                                                                        name="empPosition">

                                                                    <input type="hidden"
                                                                        value=" {{ Auth::user()->empType }}  "
                                                                        name="empType">

                                                                    <input type="hidden"
                                                                        value=" {{ Auth::user()->empPhone }}  "
                                                                        name="empPhone">

                                                                    <input type="hidden"
                                                                        value=" {{ Auth::user()->email }}  "
                                                                        name="email">

                                  
                
                                                                    <td class="text-right"> จำนวน  (รายการ) </td> 
                                                                    <td>
                                                                        <input class="form-control text-right total"
                                                                            type="text" id="sum_total" name="total"
                                                                            value=" {{ count($empcarts->toArray()) }} " readonly>
                                                                    </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="5" class="text-right"> จำนวนวัสดุ </td>
                                                                <td>
                                                                    <input class="form-control text-right"type="text"
                                                                        id=" " name=" " value="0"
                                                                        readonly>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td colspan="5"
                                                                    style="text-align: right; text-primary font-weight: bold">
                                                                    ยอดรวมสุทธิ(บาท)
                                                                </td>
                                                                <td style="font-size: 16px;width: 230px">
                                                                    <input class="form-control text-right" type="text"
                                                                        id="grand_total" name="grand_total"
                                                                        value="  " readonly>
                                                                </td>

                                                            </tr>

                                                        </tbody>

                                                    </table>
                                                    <div class="form-group d-flex justify-content-center flex-wrap mb-0">

                                                        <button type="reset" class="btn btn-pill btn-danger mr-3">
                                                            <i data-feather="refresh-ccw"></i> รีเช็ท
                                                        </button>

                                                        <button type="submit" class="btn btn-pill btn-primary">
                                                            <i data-feather="save"></i> ยืนยันรายการ
                                                        </button>
                                                    </div>

                                                </div>
                                                </form>
                                                <div class="note">
                                                    <small> หมายเหตุ : การเบิกหมึกให้ระบุหมายเลขครุภัณฑ์ที่จะเบิก </small>
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

