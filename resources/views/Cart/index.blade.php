@extends('layouts.masterEmp')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> รอส่งใบเบิก </h1><br>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href=" # ">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active"> รอส่งใบเบิก </li>
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
                                            <a class="btn btn-secondary" href=" ">
                                                <i data-feather="arrow-left-circle"></i>
                                                ย้อนกลับ
                                            </a><br>

                                        </div>
                                    </div>
                                </div>

                            </div><br>

                            <div class="form-group text-center">
                                <label for="CartItems">
                                    <b>
                                        <h3> สรุปรายการขอเบิกพัสดุ </h3>
                                        <h3> คณะเทคนิคการแพทย์ มหาวิทยาลัยขอนแก่น </h3>
                                    </b>
                                </label>
                            </div>
                            <form>

                                @foreach ($carts as $cart)
                                    <div class="form-row">
                                        <div class="form-group col-md-5">
                                            <label for="input"> ชื่อ-สกุล : <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" class="form-control" name="name"
                                                value="{{ $cart->user->name ?? '' }}" readonly>
                                        </div>
                                        <div class="form-group col-md-5">
                                            <label for="input"> เบิกในนาม : <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" class="form-control" name="deptName"
                                                value=" {{ $cart->user->department->dept_name ?? '' }} " readonly>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="input"> วันที่ : </label>

                                            <input type="input" class="form-control" name="date"
                                                value="  {{ Carbon\Carbon::now()->format('d M Y') }} " readonly>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="input"> ตำแหน่ง : <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" class="form-control" name="empPosition"
                                                value="{{ $cart->user->emp_position ?? '' }} " readonly>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="input"> ประเภทพนักงาน : <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" class="form-control" name="empType"
                                                value="{{ $cart->user->emp_type ?? '' }} " readonly>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="input"> เบอร์โทรศัพท์ : <span class="text-danger">*</span>
                                            </label>
                                            <input type="tel" class="form-control" name="empPhone"
                                                value="{{ $cart->user->emp_phone ?? '' }} " readonly>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="input"> อีเมล : <span class="text-danger">*</span> </label>
                                            <input type="email" class="form-control" name="email"
                                                value="{{ $cart->user->email ?? '' }} " readonly>
                                        </div>

                                    </div>
                            </form>
                            @endforeach


                            @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif
                            <div>

                                <div class="card border-0 shadow-sm">
                                    <div class="card-body">


                                        <div class="table-responsive">

                                            <h4 class="text-center"> รายการ </h4>
                                            <table class="table table-hover table-white" id="tableCart">
                                                <thead>
                                                    <tr>
                                                        <th> ลำดับ </th>
                                                        <th class="col-md-1"> รูปภาพ </th>
                                                        <th class="col-md-2"> รหัสวัสดุ </th>
                                                        <th class="col-md-200"> รายการ </th>
                                                        <th style="width:50px;"> จำนวนเบิก </th>
                                                        <th style="width:50px;"> หน่วยนับ </th>
                                                        <th style="width:100px;"> หมายเหตุ </th>
                                                        <th> </th>

                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <tr>
                                                        @php
                                                            $i = 1;
                                                        @endphp
                                                        @if ($cartdetails)
                                                            @foreach ($cartdetails as $item)
                                                                <td style="width:1px"> {{ $i++ }} </td>
                                                                <td><img src="storage/mateImage/{{ $item->material->mateImage  ?? ''   }} "
                                                                        width="50px" alt=" ไม่มีรูปภาพ "></td>
                                                                <td><input class="form-control" type="text"
                                                                        id="material" name="material"
                                                                        value=" {{ $item->material->mateID ?? ''  }}   " readonly>
                                                                </td>
                                                                <td><input class="form-control" type="text"
                                                                        id="material" name="material"
                                                                        value=" {{ $item->material->mate_name ?? ''  }}  "
                                                                        readonly> </td>


                                                                <td>
                                                                    <input class="form-control qty" style="width:70px"
                                                                        type="text" id="material" name="material"
                                                                        value=" {{ $item->amount ?? ''  }}  " readonly>


                                                                <td>
                                                                    <input class="form-control total" style="width:70px"
                                                                        type="text" id="material_id" name="material"
                                                                        value=" {{ $item->material->mate_unit ?? ''  }}   "
                                                                        readonly>
                                                                </td>


                                                                <td>
                                                                    <input class="form-control total" style="width:100px"
                                                                        type="text" id="note" name="note"
                                                                        readonly>
                                                                </td>

                                                                <td>

                                                                    <a href="javascript:;" class="btn btn-sm btn-danger sa-delete"
                                                    data-form-id="material-delete-{{ $item->material->id }}">
                                                    <i data-feather="trash-2"></i></a>

                                                <

                                                            </td>
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



                                                                <input type="hidden" value="  " name="mateName">
                                                                <input type="hidden" value="   " name="matePrice">
                                                                <input type="hidden" value="  " name="mateUnit">
                                                                <input type="hidden" value="   " name="mateImage">
                                                                <input type="hidden" type="number" value="1"
                                                                    name="mateAmount">

                                                                <td class="text-right"> รายการวัสดุที่ขอเบิก <span
                                                                        class="text-danger">*</span>
                                                                <td>
                                                                    <input class="form-control text-right total"
                                                                        type="text" id="sum_total" name="total"
                                                                        value="   รายการ "
                                                                        readonly>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="5" class="text-right">
                                                                    วัสดุที่ต้องรอจัดซื้อเพิ่ม <span
                                                                        class="text-danger">*</span> </td>
                                                                <td>
                                                                    <input class="form-control text-right"type="text"
                                                                        id=" " name=" " value=" 0 รายการ"
                                                                        readonly>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td colspan="5"
                                                                    style="text-align: right; text-primary font-weight: bold">
                                                                    จำนวนรวมทั้งสิ้น <span class="text-danger">*</span>
                                                                </td>
                                                                <td style="font-size: 16px;width: 230px">
                                                                    <input class="form-control text-right" type="text"
                                                                        id="grand_total" name="grand_total"
                                                                        value="  รายการ"
                                                                        readonly>
                                                                </td>

                                                            </tr>

                                                        </tbody>

                                                    </table>
                                                     
                                                    <form action="{{ route('Withdraw.update' , $withdraw->id) }}" method="POST"
                                                    enctype="multipart/form-data"> <br>
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-group d-flex justify-content-center flex-wrap mb-0">

                                                            <input type="hidden" name="value" value="WithDraw">
                                                        <button class="btn btn-pill btn-primary" type="submit">
                                                            <i data-feather="save"></i> ยืนยันรายการ
                                                            
                                                        </button>
                                                       
                                                </div>
                                                    </div>
                                                   
                                                </div>
                                                
                                            </form>
                                           
                                                <div class="note">
                                                    <small> หมายเหตุ : <span class="text-danger">*</span><br>
                                                        - การเบิกหมึกให้ระบุหมายเลขครุภัณฑ์ที่จะเบิก <br>
                                                        - หากต้องการเบิกวัสดุนอกเหนือจากรายการวัสดุในคลังสามารถกรอก
                                                        ชื่อวัสดุ หน่วยนับ และจำนวน <br> </small>
                                                    <small style="color:red"> การเบิกวัสดุนอกเหนือจากวัสดุที่มีในคลัง
                                                        ต้องใช้เวลาในการจัดซื้อเพิ่มเติม
                                                        ผู้ขอเบิกควรเผื่อระยะเวลาในการขอเบิก </small>
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
    </div>

@endsection
