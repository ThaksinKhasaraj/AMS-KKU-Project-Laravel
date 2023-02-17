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
                        <li class="breadcrumb-item"><a href=" {{ route('Supplyofficer.index') }} "> หน้าหลัก </a></li>
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


    @if ($errors->any())
    <div class="alert alert-danger">
        <strong> ไม่สามารถบันทึกรายการที่จ่ายได้! </strong> อาจจะเกิดจากจำนวนวัสดุในคงคลังไม่เพียงพอ? โปรดตรวจสอบอีกครั้งก่อนทำรายการ <br><br>
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

                                    <div class="form-group col-md-6">
                                        <label for="text"> วันที่ : </label>

                                        <span type="tetx" name="date"
                                            value=" {{ $item->created_at->thaidate('j F Y') ?? '' }}  " > {{ $item->created_at->thaidate('j F Y') ?? '' }} </span>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="tetx"> เลขที่ใบเบิก : </label>

                                        <span type="tetx" name="withdraw_num"
                                            value=" {{ $item->withdraw_num ?? '' }} " > {{ $item->withdraw_num ?? '' }} </span>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="text"> ชื่อ-สกุล : 
                                        </label>
                                        <span type="text"  name="name"
                                            value="  {{ $item->user->name ?? '' }}  " >  {{ $item->user->name ?? '' }} </span>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="text"> เบิกในนาม : 
                                        </label>
                                        <span type="text"  name="dept_name"
                                            value=" {{ $item->user->department->dept_name ?? '' }} " > {{ $item->user->department->dept_name ?? '' }} </span>
                                    </div>

                                   

                                    <div class="form-group col-md-6">
                                        <label for="text"> ตำแหน่ง :  
                                        </label>
                                        <span type="text"  name="emp_position"
                                            value=" {{ $item->user->emp_position ?? '' }} " >  {{ $item->user->emp_position ?? '' }} </span>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="text"> ประเภทพนักงาน :  
                                        </label>
                                        <span type="text"  name="emp_type"
                                            value=" {{ $item->user->emp_type ?? '' }} " > {{ $item->user->emp_type ?? '' }}  </span>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="text"> เบอร์โทรศัพท์ :  
                                        </label>
                                        <span type="text" name="emp_phone"
                                            value=" {{ $item->user->emp_phone ?? '' }} " > {{ $item->user->emp_phone ?? '' }} </span>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="text"> อีเมล : </label>
                                        <span type="text" name="email"
                                            value=" {{ $item->user->email ?? '' }} " > {{ $item->user->email ?? '' }} </span>
                                    </div>
                                </div>
                            @endforeach

                            <form action="{{ route('withdraw.update', $item->id ?? '') }}"
                                method="POST" enctype="multipart/form-data"><br>
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="id" value="{{ $item->id}}" >
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
                                                    <th class="text-primary" style="width:200px;"> คงเหลือในคลัง </th>
                                                    <th style="width:120px;"> จำนวนที่ขอเบิก </th>
                                                    <th style="width:120px;"> จำนวนที่จ่าย </th>
                                                    <th style="width:120px;"> หน่วยนับ </th>
                                                    <th style="width:120px;"> ราคาหน่วยละ(บาท) </th>
                                                    <th style="width:120px;"> มูลค่ารวม(บาท) </th>
                                                    <th > หมายเหตุ </th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @php
                                                    $i = 1;
                                                    $total = 0;
                                                @endphp
                                               
                                                  
                                                        @foreach ($withdrawdetail as $item)
                                                            <tr data-id="check_withdraw[]">
                                                                <td> {{ $i++ ?? '' }} </td>
                                                                <td>
                                                                    <input type="hidden" name="wd_id_detail[]" value="{{ $item->id ?? '' }}" >
                                                                    <input type="hidden" name="wd_materail_id[]" value="{{ $item->material_id ?? ''}}">

                                                                    <span type="text" id="material" name="mateID[]"  value=" {{ $item->material->mateID ?? '' }} " >{{ $item->material->mateID ?? '' }}
                                                                              
                                                                </td>

                                                                <td>
                                                                    <span  type="text" id="material" name="mate_name[]" 
                                                                        value=" {{ $item->material->mate_name ?? '' }} " >
                                                                         {{ $item->material->mate_name ?? '' }}
                                                                </td>
                                                                <td>
                                                                    <input class="form-control " type="text"
                                                                        id="material" name="mate_amount[]"
                                                                        value=" {{ $item->material->mate_amount ?? '' }} "
                                                                        readonly>
                                                                </td>

                                                                <td data-th="Amount">
                                                                    <span type="text" name="amount[]"
                                                                        value="{{ $item->amount ?? '' }} "
                                                                         > {{ $item->amount ?? '' }}
                                                                </td>
                                                                <td data-th="Amount" >
                                                                    <input  type="int" name="checkout_amount[]" value="{{ $item->checkout_amount }}" class="form-control">
                                                                </td>
                                                                <td>
                                                                    <span type="float"
                                                                        id="material_id" name="mate_unit[]"
                                                                        value=" {{ $item->material->mate_unit ?? '' }} "
                                                                        > {{ $item->material->mate_unit ?? '' }}
                                                                </td>
                                                                <td>
                                                                    <span  type="text"
                                                                        id="material" name="mate_price[]"
                                                                        value=" {{ $item->material->mate_price ?? '' }} "
                                                                        >  {{ $item->material->mate_price ?? '' }} 
                                                                </td>


                                                                <td>
                                                                    <strong style="width:100px"
                                                                        type="text" id="material_id" name="material[]"
                                                                        value=" {{ number_format($item->checkout_amount * $item->material->mate_price ?? '', 2) }} "
                                                                        >  {{ number_format($item->checkout_amount * $item->material->mate_price ?? '', 2) }}
                                                                </td>
                                                                <td>
                                                                <input class="form-control total" style="width:100px"
                                                                    type="text" id="note[]" value="{{ $item->note }}" name="note[]" >
                                                            </td>
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
                                                            <td class="text-right"> <strong>วัสดุที่ขอเบิก </strong>   
                                                            <td>
                                                                <input class="form-control text-right sum_amonut"
                                                                    type="text" id="sum_amonut" name="sum_amonut"
                                                                    value="   {{ count($withdrawdetail) ??''  }}  รายการ " readonly>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td colspan="5"
                                                                style="text-align: right; text-primary font-weight: bold">
                                                                <strong> วัสดุที่จ่าย </strong>
                                                                  
                                                            </td>

                                                            <td style="font-size: 16px;width: 230px">
                                                                <input class="form-control text-right" type="text"
                                                                    id="pay_total" name="pay_total"
                                                                    value="   {{ count($withdrawdetail) ??''  }}  รายการ" readonly>

                                                            </td>

                                                        </tr>
                                                        @php $total = 0 @endphp
                                                        @foreach ($withdrawdetail as $item)
                                                            @php $total += $item->checkout_amount * $item->material->mate_price ??'' @endphp
                                                        @endforeach
                                                        <tr>
                                                            <td colspan="5"
                                                                style="text-align: right; text-primary font-weight: bold">
                                                                <strong class="text-primary" > มูลค่ารวมทั้งสิ้น </strong>
                                                              
                                                            </td>

                                                            <td style="font-size: 16px;width: 230px">
                                                                <input class="form-control text-right" type="text"
                                                                    id="total" name="total" value=" {{ number_format($total, 2 ) ??'' }} บาท "
                                                                    readonly> <br>
                                                                {{ Auth::user()->name ?? '' }} <br>
                                                                <label class="text-center"> ผู้ตรวจสอบ </label>
                                                            </td>
                                                        
                                                        </tr>
                                                    </tbody>
                                                </table>
                                        </div>
                                        
                                    </div>
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
                                        <input type="hidden" name="total" value="0" class="form-control"
                                            id="total">
                                            <div class="modal-footer">
                                                <button type="submit"  class="btn btn-success btn-xl ">
                                                <i data-feather="check-circle"></i> อนุมัติ </button>
                                    </div>
                            </form>
                            <div class="modal-footer">
                                <button href="#checkoutNo" data-toggle="modal" 
                                class="btn btn-danger btn-xl ">
                                <i data-feather="x-circle"></i>
                                ไม่อนุมัติ </button>
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
                                    <input type="hidden" name="total" value="0" class="form-control"
                                        id="total">

                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary " data-dismiss="modal">
                                ยกเลิก
                            </button>
                            <button type="submit" class="btn btn-primary "> ยืนยันไม่อนุมัติใบคำขอเบิก </button>
                        </div>

 
    </div>
    </div>
    </div>
    </div>
    <!-- /ADD Modal -->
@endforeach



@endsection
