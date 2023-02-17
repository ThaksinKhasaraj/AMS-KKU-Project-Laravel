@extends('layouts.masterSpo')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> คำขอเบิกวัสดุ  </h1><br>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('Supplyofficer.index') }}"> หน้าหลัก </a></li>
                        <li class="breadcrumb-item active"> คำขอเบิกวัสดุ  </li>
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
                                            <a class="btn btn-secondary" href=" {{ route('spoTrack.index') }} "> <i
                                                    data-feather="arrow-left-circle"></i> ย้อนกลับ
                                            </a><br>
                                        </div>

                                    </div>
                                </div>
                            </div><br>

                             <!-- /Page Header -->
                           <div class="form-group text-center">
                            <label for="CartItems">
                                <b>
                                    <h3> รายการคำขอเบิกวัสดุ </h3>
                                </b>
                            </label>
                        </div>

                        @foreach ($withdraw as $item )
                            
                        <form>

                            <div class="form-row container-fluid">
                                <div class="form-group col-md-4">
                                    <label for="input"> ชื่อ-สกุล : <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="name"
                                        value="  {{ $item->user->name ?? '' }}  " readonly>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="input"> เบิกในนาม : <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="dept_name"
                                        value=" {{ $item->user->department->dept_name ?? '' }} " readonly>
                                </div>

                                <div class="form-group col-md-2">
                                    <label for="input"> วันที่ : </label>

                                    <input type="input" class="form-control" name="date"
                                        value=" {{ date_format(date_create($item->created_at), 'd M Y' ) }} " readonly>
                                </div>

                                <div class="form-group col-md-2">
                                    <label for="input"> เลขที่ใบเบิก : </label>

                                    <input type="input" class="form-control" name="withdraw_num"
                                        value=" {{ $item->withdraw_num ?? '' }} " readonly>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="input"> ตำแหน่ง : <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="emp_position"
                                        value=" {{ $item->user->emp_position ?? '' }} " readonly>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="input"> ประเภทพนักงาน : <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="emp_type"
                                        value=" {{ $item->user->emp_type ?? '' }} " readonly>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="input"> เบอร์โทรศัพท์ : <span class="text-danger">*</span>
                                    </label>
                                    <input type="tel" class="form-control" name="emp_phone"
                                        value=" {{ $item->user->emp_phone ?? '' }} " readonly>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="input"> อีเมล : <span class="text-danger">*</span> </label>
                                    <input type="email" class="form-control" name="email"
                                        value=" {{ $item->user->email ?? '' }} " readonly>
                                </div>
                            </div>
                    </form>
                    @endforeach


                            <form action=" " method="POST" enctype="multipart/form-data"><br>
                                @csrf
                                @method('PUT')

                                <div class="row form-row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <table id="Checkout" class="table table-hover table-white">
                                                <thead>
                                                    <tr>
                                                        <th style="width:1px;"> ลำดับ </th>
                                                        <th style="width:200px;"> รหัสวัสดุ </th>
                                                        <th style="width:600px;"> รายการ </th>
                                                        <th style="width:120px;"> คงเหลือในคงคลัง </th>
                                                        <th style="width:120px;"> จำนวนที่ขอเบิก </th>
                                                        <th style="width:120px;"> จำนวนที่จ่าย </th>
                                                        <th style="width:120px;"> หน่วยนับ </th>
                                                        <th style="width:10px;"> หมายเหตุ </th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    @php
                                                        $i = 1;
                                                        $total = 0;
                                                    @endphp
                                                    @if ($withdraw)
                                                        @foreach ($withdrawdetail as $key => $item)
                                                            <form action="{{ route('spoWithdraw.checkoutEdit' , $item->id ??'') }}" method="POST"
                                                                enctype="multipart/form-data">
                                                                @csrf
                                                                <tr data-id=" ">
                                                                    <td> {{ $i++ ?? '' }} </td>
                                                                    <td>
                                                                        <input class="form-control" type="text"
                                                                            id="material" name=""
                                                                            value=" {{ $item->material->mateID ?? '' }} "
                                                                            readonly>
                                                                    </td>
                                                                    <td>
                                                                        <input class="form-control" type="text"
                                                                            id="material" name="mate_name"
                                                                            value=" {{ $item->material->mate_name ?? '' }} "
                                                                            readonly>
                                                                    </td>

                                                                    <td>
                                                                        <input class="form-control text-danger " type="text"
                                                                            id="material" name="mate_amount"
                                                                            value=" {{ $item->material->mate_amount ?? '' }} "
                                                                            readonly>
                                                                    </td>
                                                                    <td data-th="Amount">
                                                                        <input type="text" name="amount"
                                                                            value="{{ $item->amount ??'' }} "
                                                                            class="form-control amount text-primary " readonly  />
                                                                    </td>
                                                                   

                                                                    <td data-th="Amount_Checkout">
                                                                        <input type="int" name="amount_checkout"
                                                                            value=" {{ old('amount',$item->amount ??'' ) }} "
                                                                            class="form-control Amount_Checkout update-cart" />
                                                                    </td>


                                                                    <td>
                                                                        <input class="form-control total"
                                                                            style="width:100px" type="text"
                                                                            id="material_id" name="material"
                                                                            value=" {{ $item->material->mate_unit ?? '' }} " readonly>

                                                                    </td>

                                                                    <td>
                                                                        <input class="form-control total"
                                                                            style="width:100px" type="text"
                                                                            id="note" name="note">
                                                                    </td>
                                                            </form>

                                                            </tr>
                                                        @endforeach
                                                    @endif
                                                </tbody>
                                                <div class="table-responsive">
                                                    <table class="table table-hover table-white">
                                                        <tbody>
                                                            <tr>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>


                                                                <td class="text-right"> จำนวนวัสดุที่ขอเบิก <span
                                                                        class="text-danger">*</span>
                                                                <td>
                                                                    <input class="form-control text-right total"
                                                                        type="text" id="sum_total" name="total"
                                                                        value="   รายการ " readonly>
                                                                </td>
                                                            </tr>


                                                            <tr>
                                                                <td colspan="5"
                                                                    style="text-align: right; text-primary font-weight: bold">
                                                                    จำนวนที่จ่าย <span class="text-danger">*</span>
                                                                </td>
                                                                <td style="font-size: 16px;width: 230px">
                                                                    <input class="form-control text-right" type="text"
                                                                        id="grand_total" name="grand_total" value=" รายการ"
                                                                        readonly>
                                                                </td>

                                                            </tr>

                                                        </tbody>


                                                    </table>
                                                </div>
                                        </div>
                                    </div>

                                    <label> ผู้ตรวจสอบ : </label> {{ Auth::user()->name ?? '' }} <br>

                                    <input type="hidden" name="approve_spo" value="1" class="form-control"
                                        id="approve_spo">

                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary "> ยืนยันรายการคำขอเบิก </button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
