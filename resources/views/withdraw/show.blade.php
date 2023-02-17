@extends('layouts.masterSpo')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> รอส่งใบเบิก </h1><br>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('Supplyofficer.index') }}">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active"> รอส่งใบเบิก </li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.row -->
    </div><!-- /.row -->



    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
<div>


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
                                            <a class="btn btn-secondary" href=" {{ route('empHistory.index') }} ">
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
                                        <h3> สรุปรายการขอเบิกวัสดุ </h3>
                                        <h3> คณะเทคนิคการแพทย์ มหาวิทยาลัยขอนแก่น </h3>
                                    </b>
                                </label>
                            </div>
                            <form>

                                
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="input"> ชื่อ-สกุล : <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" class="form-control" name="name"
                                                value=" {{auth()->user()->name}} " readonly>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="input"> เบิกในนาม : <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" class="form-control" name="deptName"
                                                value="  {{auth()->user()->name}} " readonly>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="input"> วันที่ : </label>

                                            <input type="input" class="form-control" name="date"
                                                value=" {{auth()->user()->name}} " readonly>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="input"> เลขที่ใบเบิก : </label>
            
                                            <input type="input" class="form-control" name="text"
                                                value="{{auth()->user()->name}}" readonly>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="input"> ตำแหน่ง : <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" class="form-control" name="empPosition"
                                                value=" {{auth()->user()->name}}" readonly>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="input"> ประเภทพนักงาน : <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" class="form-control" name="empType"
                                                value="{{auth()->user()->name}}" readonly>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="input"> เบอร์โทรศัพท์ : <span class="text-danger">*</span>
                                            </label>
                                            <input type="tel" class="form-control" name="empPhone"
                                                value=" {{auth()->user()->name}} " readonly>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="input"> อีเมล : <span class="text-danger">*</span> </label>
                                            <input type="email" class="form-control" name="email"
                                                value=" {{auth()->user()->name}}" readonly>
                                        </div>

                                    </div>
                            </form>
 


                               

                                <div class="card border-0 shadow-sm">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <h4 class="text-center"> รายการ </h4>
                                            <table class="table table-hover table-white" id="tableCart">
                                                <thead>
                                                    <tr>
                                                        <th> ลำดับ </th>
                                                        <th class="col-md-1px"> รูปภาพ </th>
                                                        <th class="col-md-2px"> รหัสวัสดุ </th>
                                                        <th class="col-md-200px"> รายการ </th>
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
                                                        @if ($withdrawdetail)
                                                            @foreach ($withdrawdetail as $withdraw)

                                                            
                                                                <td style="width:1px"> {{ $i++ }} </td>
                                                                <td><img src="storage/mateImage/ {{ $withdraw->material->mateImage ?? '' }} "
                                                                        width="50px" alt=" "></td>
                                                                <td><input class="form-control" type="text"
                                                                        id="material" name="material"
                                                                        value=" {{ $withdraw->material->mateID ?? '' }}   "
                                                                        readonly>
                                                                </td>
                                                                <td><input class="form-control" type="text"
                                                                        id="material" name="material"
                                                                        value=" {{ $withdraw->material->mate_name ?? '' }}  "
                                                                        readonly> </td>
                                                                <td>
                                                                    
                                                                    <input class="form-control qty" style="width:70px"
                                                                        type="text" id="material" name="material"
                                                                        value=" {{ $withdraw->amount ?? '' }}  " readonly>


                                                                <td>
                                                                    <input class="form-control total" style="width:70px"
                                                                        type="text" id="material_id" name="material"
                                                                        value=" {{ $withdraw->material->mate_unit ?? '' }}   "
                                                                        readonly>
                                                                </td>
                                                                <td>
                                                                    <input class="form-control total" style="width:100px"
                                                                        type="text" id="note" name="note"
                                                                        readonly>
                                                                </td>

                                                                {{-- <td>

                                                                    <a href="javascript:;"
                                                                        class="btn btn-sm btn-danger sa-delete"
                                                                        data-form-id="material-delete-{{ $item->id }}">
                                                                        <i data-feather="trash-2"></i></a>

                                                                    <form id="material-delete-{{ $item->id }}"
                                                                        action="{{ route('withdraw.destroy', $item->id) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                    </form>

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
                                                                 

                                                                <td class="text-right"> รายการวัสดุที่ขอเบิก <span
                                                                        class="text-danger">*</span>
                                                                <td>
                                                                    <input class="form-control text-right total"
                                                                        type="text" id="sum_total" name="total"
                                                                        value="   รายการ " readonly>
                                                                </td>
                                                            </tr>
                                                            {{-- <tr>
                                                                <td colspan="5" class="text-right">
                                                                    วัสดุที่ต้องรอจัดซื้อเพิ่ม <span
                                                                        class="text-danger">*</span> </td>
                                                                <td>
                                                                    <input class="form-control text-right"type="text"
                                                                        id=" " name=" " value=" 0 รายการ"
                                                                        readonly>
                                                                </td>
                                                            </tr> --}}

                                                            <tr>
                                                                <td colspan="5"
                                                                    style="text-align: right; text-primary font-weight: bold">
                                                                    จำนวนรวมทั้งสิ้น <span class="text-danger">*</span>
                                                                </td>
                                                                <td style="font-size: 16px;width: 230px">
                                                                    <input class="form-control text-right" type="text"
                                                                        id="grand_total" name="grand_total"
                                                                        value=" รายการ" readonly>
                                                                </td>
                                                                
                                                            </tr>

                                                        </tbody>
                                                        

                                                    </table>
                                                   
                                                     
                                                </div>
                                                
                                        </div>
                                        @endif
                                      
                                        
                                        <div class="note">
                                            หมายเหตุ : <span class="text-danger">*</span><br>
                                            <span style="color:red">  - ผู้เบิกต้องมารับวัสดุที่ขอเบิกเอง ที่ฝ่ายพัสดุ คณะเทคนิคการแพทย์ โดยจะจ่ายวัสดุ ทุกวันพฤหัส เวลา 14:00-16:00 น. ทั้งนี้ขึ้นอยู่กับการอนุมัติใบคำขอเบิก  </span>
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
