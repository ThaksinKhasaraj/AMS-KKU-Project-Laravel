@extends('layouts.masterSpo')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> คำขอเบิกวัสดุ </h1><br>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('Supplyofficer.index') }}"> หน้าหลัก </a></li>
                        <li class="breadcrumb-item active"> คำขอเบิกวัสดุ </li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.row -->
    </div><!-- /.row -->



    <div class="container">

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </div>

    @yield('scripts')

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
                                        <h3> ใบคำขอเบิกวัสดุ คณะเทคนิคการแพทย์ มหาวิทยาลัยขอนแก่น</h3>

                                    </b>
                                </label>
                            </div>

                            @foreach ($withdraw as $item)
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
                                            value=" {{ $item->created_at->thaidate('j F Y') ?? '' }}  " readonly>
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
                            @endforeach


                            <div class="card border-0 shadow-sm">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <h4 class="text-center"> รายการขอเบิกวัสดุ </h4>
                                        <table id="Checkout" name=" Checkout " class="table table-hover table-white">
                                            <thead>
                                                <tr>
                                                    <th style="width:1px;"> ลำดับ </th>
                                                    <th style="width:200px;"> รหัสวัสดุ </th>
                                                    <th style="width:600px;"> รายการ </th>
                                                    <th class="text-primary" style="width:120px;"> คงเหลือในคงคลัง </th>
                                                    <th style="width:120px;"> จำนวนที่ขอเบิก </th>
                                                    <th style="width:120px;"> จำนวนที่จ่าย </th>
                                                    <th style="width:120px;"> หน่วยนับ </th>
                                                    <th style="width:120px;"> ราคาหน่วยละ(บาท) </th>
                                                    <th style="width:120px;"> มูลค่ารวม(บาท) </th>
                                                    {{-- <th > หมายเหตุ </th> --}}
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @php
                                                    $i = 1;
                                                    $total = 0;
                                                @endphp

                                                @foreach ($withdrawdetail as $item)
                                                    <tr data-id="check_withdraw">
                                                        <td> {{ $i++ ?? '' }} </td>
                                                        <td>
                                                            <input class="form-control" type="text" id="material"
                                                                name="mateID"
                                                                value=" {{ $item->material->mateID ?? '' }} " readonly>
                                                        </td>
                                                        <td>
                                                            <input class="form-control" type="text" id="material"
                                                                name="mate_name"
                                                                value=" {{ $item->material->mate_name ?? '' }} " readonly>
                                                        </td>
                                                        <td>
                                                            <input class="form-control " type="text" id="material"
                                                                name="mate_amount"
                                                                value=" {{ $item->material->mate_amount ?? '' }} "
                                                                readonly>
                                                        </td>

                                                        <td data-th="Amount">
                                                            <input type="text" name="amount"
                                                                value="{{ $item->amount ?? '' }} "
                                                                class="form-control amount " readonly>
                                                        </td>
                                                        <td data-th="Amount">
                                                            <input type="text" name="amount"
                                                                value="{{ $item->amount ?? '' }} "
                                                                class="form-control amount " readonly>
                                                        </td>
                                                        <td>
                                                            <input class="form-control total" type="float"
                                                                id="material_id" name="material"
                                                                value=" {{ $item->material->mate_unit ?? '' }} " readonly>
                                                        </td>
                                                        <td>
                                                            <input class="form-control " type="text" id="material"
                                                                name="mate_price"
                                                                value=" {{ $item->material->mate_price ?? '' }} "
                                                                readonly>
                                                        </td>


                                                        <td>
                                                            <input class="form-control total" style="width:100px"
                                                                type="text" id="material_id" name="material"
                                                                value=" {{ number_format($item->amount * $item->material->mate_price ?? '', 2) }} "
                                                                readonly>
                                                        </td>
                                                        {{-- <td>
                                                                <input class="form-control total" style="width:100px"
                                                                    type="text" id="note" type="hidden" name="note" readonly>
                                                            </td> --}}
                                                    </tr>
                                                @endforeach

                                            </tbody>
                                            <div class="table-responsive">
                                                <table class="table table-hover table-white">
                                                    <tbody>
                                                        <tr>
                                                            

                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td class="text-right"> วัสดุที่ขอเบิก <span
                                                                    class="text-danger">*</span>
                                                            <td>
                                                                <input class="form-control text-right total"
                                                                    type="text" id="sum_total" name="total"
                                                                    value="  รายการ " readonly>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td colspan="5"
                                                                style="text-align: right; text-primary font-weight: bold">
                                                                วัสดุที่จ่าย <span class="text-danger">*</span>
                                                            </td>

                                                            <td style="font-size: 16px;width: 230px">
                                                                <input class="form-control text-right" type="text"
                                                                    id="grand_total" name="grand_total"
                                                                    value=" {{ $total }}  " readonly>

                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td colspan="5"
                                                                style="text-align: right; text-primary font-weight: bold">
                                                                มูลค่ารวมทั้งสิ้น <span class="text-danger">*</span>
                                                            </td>

                                                            <td style="font-size: 16px;width: 230px">
                                                                <input class="form-control text-right" type="text"
                                                                    id="grand_total" name="grand_total"
                                                                    value="    บาท" readonly> <br>
                                                                {{ Auth::user()->name ?? '' }} <br>
                                                                <label class="text-center"> ผู้ตรวจสอบ </label>
                                                            </td>

                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button href="#checkoutNo" data-toggle="modal" type="submit"
                                        class="btn btn-danger btn-xl ">
                                        <i data-feather="x-circle"></i>
                                        ไม่อนุมัติ </button>
                                    <button href="#checkedit" data-toggle="modal" type="submit"
                                        class="btn btn-warning btn-xl ">
                                        <i data-feather="edit"></i>
                                        แก้ไขจำนวนที่จ่าย </button>

                                    <button href="#spocheckout" data-toggle="modal" type="submit"
                                        class="btn btn-success btn-xl ">
                                        <i data-feather="check-circle"></i>
                                        อนุมัติ </button>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    @foreach ($withdraw as $item)
        <form action="{{ route('withdraw.update', $item->id ?? '') }}" method="POST" enctype="multipart/form-data"><br>
            @csrf
            @method('PUT')

            <!-- Add Modal จ่ายวัสดุเลย -->

            <div class="modal fade" id="spocheckout" aria-hidden="true" role="dialog">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title "> <b> อนุมัติใบคำขอเบิก </b></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row form-row">
                                <div class="col-12">
                                    <div class="form-group">

                                        <label> ผู้ตรวจสอบ : </label> {{ Auth::user()->name ?? '' }} <br>
                                        <input type="hidden" name="approve_mng" value="1" class="form-control"
                                            id="approve_mng">
                                        <input type="hidden" name="approve_spo" value="1" class="form-control"
                                            id="approve_spo">
                                        <input type="hidden" name="spo_user" value=" {{ Auth::user()->name ?? '' }} "
                                            id="spo_user">
                                        <input type="hidden" name="approve_dir" value="0" class="form-control"
                                            id="approve_dir">
                                        <input type="hidden" name="withdraw_status" value="0" class="form-control"
                                            id="withdraw_status">
                                        <input type="hidden" name="approve_success" value="0" class="form-control"
                                            id="approve_dir">
                                        <input type="hidden" name="checkout_amount" class="form-control"
                                            id="checkout_amount" value="{{ $item->amount }}">
                                        <input type="hidden" name="note" class="form-control" id="note">
                                        <input type="hidden" name="wiihdraw[]" value="{{  $item->id ?? '' }}" class="form-control" id="note">

                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary " data-dismiss="modal">
                                    ยกเลิก
                                </button>
                                <button type="submit" class="btn btn-primary "> ยืนยันอนุมัติ </button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </form>
    @endforeach
    <!-- /ADD Modal -->
    @foreach ($withdraw as $item)
        <form action="{{ route('withdraw.update', $item->id ?? '') }}" method="POST" enctype="multipart/form-data"><br>
            @csrf
            @method('PUT')
            <!-- Add Modal ไม่อนุมัติ -->

            <div class="modal fade" id="checkoutNo" aria-hidden="true" role="dialog">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title "> <b> ไม่อนุมัติใบคำขอเบิก </b></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row form-row">
                                <div class="col-12">
                                    <div class="form-group">

                                        <label> ผู้ตรวจสอบ : </label> {{ Auth::user()->name ?? '' }} <br>
                                        <input type="hidden" name="approve_mng" value="1" class="form-control"
                                            id="approve_mng">
                                        <input type="hidden" name="approve_spo" value="1" class="form-control"
                                            id="approve_spo">
                                        <input type="hidden" name="spo_user" value=" {{ Auth::user()->name ?? '' }} "
                                            id="spo_user">
                                        <input type="hidden" name="approve_dir" value="0" class="form-control"
                                            id="approve_dir">
                                        <input type="hidden" name="withdraw_status" value="1" class="form-control"
                                            id="withdraw_status">
                                        <input type="hidden" name="approve_success" value="1" class="form-control"
                                            id="approve_dir">
                                        <input type="hidden" name="pay_user" value=" {{ Auth::user()->name ?? '' }} "
                                            class="form-control" id="pay_user">

                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary " data-dismiss="modal">
                                    ยกเลิก
                                </button>
                                <button type="submit" class="btn btn-primary "> ยืนยันไม่อนุมัติใบคำขอเบิก </button>
                            </div>

        </form>
        </div>
        </div>
        </div>
        </div>
        <!-- /ADD Modal -->
    @endforeach

    <!-- Add Modal checkedit -->
    <form action="{{ route('withdraw.update', $item->id ?? '') }} " method="POST" enctype="multipart/form-data"><br>
        @csrf
        @method('PUT')
        <div class="modal fade" id="checkedit" aria-hidden="true" role="dialog">
            <div class="modal-dialog modal-xl modal-orange modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title "> <b> แก้ไขจำนวนที่จ่าย </b></h5> <br>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>



                    <div class="modal-body">
                        <div class="row form-row">
                            <div class="col-12">
                                <div class="form-group">
                                    <table id="Checkout" class="table table-hover table-white">
                                        <thead>
                                            <tr>
                                                <th style="width:1px;"> ลำดับ </th>
                                                <th style="width:200px;"> รหัสวัสดุ </th>
                                                <th style="width:600px;"> รายการ </th>
                                                <th class="text-primary" style="width:120px;"> คงเหลือในคงคลัง </th>
                                                <th style="width:120px;"> จำนวนที่ขอเบิก </th>
                                                <th style="width:120px;"> จำนวนที่จ่าย </th>
                                                <th style="width:120px;"> หน่วยนับ </th>
                                                {{-- <th style="width:120px;"> ราคาหน่วยละ(บาท) </th> --}}
                                                <th style="width:120px;"> มูลค่ารวม(บาท) </th>
                                                <th> หมายเหตุ </th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @php
                                                $i = 1;
                                                $total = 0;
                                            @endphp
                                            @if ($withdraw)
                                                @foreach ($withdrawdetail as $item)
                                                    <form action=" " method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <tr data-id=" ">
                                                            <td> {{ $i++ ?? '' }} </td>
                                                            <td>
                                                                <input class="form-control" type="text" id="material"
                                                                    name=""
                                                                    value=" {{ $item->material->mateID ?? '' }} "
                                                                    readonly>
                                                            </td>

                                                            <td>
                                                                <input class="form-control" type="text" id="material"
                                                                    name="mate_name"
                                                                    value=" {{ $item->material->mate_name ?? '' }} "
                                                                    readonly>
                                                            </td>

                                                            <td>
                                                                <input class="form-control " type="text"
                                                                    id="material" name="mate_amount"
                                                                    value=" {{ $item->material->mate_amount ?? '' }} "
                                                                    readonly>
                                                            </td>

                                                            <td data-th="Amount">
                                                                <input type="text" name="amount"
                                                                    value="{{ $item->amount ?? '' }} "
                                                                    class="form-control amount" readonly />
                                                            </td>

                                                            <td data-th="checkout_amount">
                                                                <input type="number" name="checkout_amount"
                                                                    class="form-control checkout_amount update-cart" />
                                                            </td>

                                                            <td>
                                                                <input class="form-control total" style="width:100px"
                                                                    type="text" id="material_id" name="material"
                                                                    value=" {{ $item->material->mate_unit ?? '' }} "
                                                                    readonly>
                                                            </td>

                                                            <td>
                                                                <input class="form-control total" style="width:100px"
                                                                    type="text" id="note" name="note">
                                                            </td>

                                                            <td>
                                                                <input class="form-control total" style="width:100px"
                                                                    type="text" id="note" name="note">
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
                                                            <input class="form-control text-right total" type="text"
                                                                id="sum_total" name="total" value="   รายการ "
                                                                readonly>
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
 

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary " data-dismiss="modal">
                                    ยกเลิก
                                </button>
                                <button type="submit" class="btn btn-primary "> ยืนยันรายการ </button>
                            </div>

                           
                            <input type="hidden" name="approve_mng" value="1" class="form-control"
                                id="approve_mng">
                            <input type="hidden" name="approve_spo" value="1" class="form-control"
                                id="approve_spo">
                            <input type="hidden" name="spo_user" value=" {{ Auth::user()->name ?? '' }} "
                                id="spo_user">
                            <input type="hidden" name="approve_dir" value="0" class="form-control"
                                id="approve_dir">
                            <input type="hidden" name="withdraw_status" value="0" class="form-control"
                                id="withdraw_status">
                            <input type="hidden" name="approve_success" value="0" class="form-control"
                                id="approve_dir">
                                <input type="hidden" name="withdraw_status" value="0" class="form-control"
                                id="withdraw_status">
                            <input type="hidden" name="checkout_amount" class="form-control"
                                id="checkout_amount" value="{{ $item->amount }}">
                            <input type="hidden" name="note" class="form-control" id="note">
                            <input type="hidden" name="pay_user" value="NULL"
                            class="form-control" id="pay_user">
    </form>
    </div>
    </div>
    </div>
    </div>
    <!-- /ADD Modal -->


@endsection
