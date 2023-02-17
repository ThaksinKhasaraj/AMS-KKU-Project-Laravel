@extends('layouts.masterSpo')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> จ่ายวัสดุ </h1><br>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('Supplyofficer.index') }}"> หน้าหลัก </a></li>
                        <li class="breadcrumb-item active"> จ่ายวัสดุ </li>
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

    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-orange card-outline">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12 margin-tb">
                                    <div class="pull-left">
                                        
                                    </div>
                                </div>
                            </div><br>
                           <!-- /Page Header -->
                           <div class="form-group text-center">
                            <label for="CartItems">
                                <b>
                                    <h3> รายการรอจ่าย </h3>
                                </b>
                            </label>
                        </div>

                            <table class="table table-bordered datatable">
                                <thead>
                                    <tr>
                                        <th> ลำดับ </th>
                                        <th> รายการเบิก </th>
                                        <th> รายการจ่าย </th>
                                        <th> จัดการ </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                        $total = 0;
                                    @endphp


                                    @if ($withdraws)
                                        @foreach ($withdraws as $item)
                                            <tr>
                                                <td> {{ $i++ }} </td>
                                                <td> <b>เลขที่ใบเบิก : </b> {{ $item->withdraw_num ?? '' }} <br>
                                                    <b> วันที่เบิก : </b> {{ $item->created_at->thaidate('วันl ที่ j F พ.ศ. Y') ?? '' }} เวลา
                                                    {{ date_format(date_create($item->created_at), 'H:i') }} น. <br>
                                                     <b> ผู้ขอเบิก :  </b> {{ $item->user->name ?? '' }} <br>
                                                     <b> หัวหน้างาน/หัวหน้าสาขาวิชา : </b> {{ $item->user->department->manager_name ?? '' }}
                                                     <span
                                                        class="right badge badge-{{ $item->approve_mng ? 'success' : 'warning' }}">
                                                        {{ $item->approve_mng ? 'อนุมัติ' : 'รออนุมัติ' }}</span> <br>
                                                     <b> ผู้ตรวจสอบ :  </b> {{ $item->spo_user ?? '' }} 
                                                     <span class="right badge badge-{{ $item->approve_spo ? 'success' : 'warning' }}">
                                                        {{ $item->approve_spo ? 'ตรวจสอบแล้ว' : 'รอตรวจสอบ' }} </span> <br>
                                                      
                                                     <b> ผู้อำนวยการกองบริหารงานคณะฯ :  </b> {{ $item->dir_user ?? '' }} 
                                                     <span
                                                        class="right badge badge-{{ $item->approve_dir ? 'success' : 'warning' }}">
                                                        {{ $item->approve_dir ? 'อนุมัติ' : 'รออนุมัติ' }}</span>
                                                    <br>
                                                     <b> สถานะ : </b>  <span
                                                     class="right badge badge-{{ $item->approve_dir ? 'success' : 'warning' }}">
                                                     {{ $item->withdraw_status ? 'สำเร็จ' : 'สำเร็จ' }}</span>
                                                 </td>
                                                 <td> 
                                                    <b> ผู้รับวัสดุ :  </b> {{ $item->user->name ?? '' }} <br>
                                                <b> หน่วยงาน/สาขาวิชา : </b>  {{ $item->user->department->dept_name ?? '' }} <br>
                                                <b> สถานะ : </b>  <span
                                                     class="right badge badge-{{ $item->approve_success ? 'success' : 'warning' }}">
                                                     {{ $item->withdraw_status ? 'สำเร็จ' : 'รอจ่าย' }}</span>
                                                </td>
                                               
                                                <td>
                    
                                                    @if (Auth::user()->role=='เจ้าหน้าที่พัสดุ')
                                                    <a class="btn btn-warning btn-sm"  
                                                       href="#spocheckout" data-toggle="modal"  >
                                                       {{-- href=" {{ route('spoWithdraw.checkoutEdit', $item->id ??'') }} " > --}}
                                                    </i> จ่าย </a>
                                                    @endif

                                                    <a class="btn btn-info btn-sm" href=" {{ route('spoWithdraw.checkoutShow', $item->id ??'') }} ">
                                                        </i> รายละเอียด </a>
                                                </td>
                                </tbody>
                                @endforeach
                            </table>
                            @endif
                        </div>
                    </div>
                </div>
            </div>




    <!-- Add Modal จ่ายวัสดุเลย -->
    <form action=" {{ route('withdraw.update', $item->id ??'') }}  " method="POST" enctype="multipart/form-data"><br>
        @csrf
        @method('PUT')
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

                                    <label> ผู้จ่ายวัสดุ {{ Auth::user()->name ?? '' }} </label>
                                    
                                    <input type="hidden" name="approve_mng" value="1" class="form-control" id="approve_mng">
                                    <input type="hidden" name="approve_spo" value="1" class="form-control" id="approve_spo">
                                    <input type="hidden" name="spo_user" value=" {{ $item->spo_user ?? ''  }} " class="form-control" id="spo_user"> 
                                    <input type="hidden" name="approve_dir" value="1" class="form-control" id="approve_dir">
                                    <input type="hidden" name="dir_user" value=" {{ $item->dir_user ?? ''  }} "
                                    class="form-control" id="dir_user">
                                    <input type="hidden" name="withdraw_status" value="0" class="form-control" id="withdraw_status">
                                    <input type="hidden" name="approve_success" value="1" class="form-control" id="approve_dir">
                                    <input type="hidden" name="pay_user" value=" {{ Auth::user()->name ?? '' }} "
                                    class="form-control" id="pay_user">

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
    </div>
    </div>
    <!-- /ADD Modal -->


    <!-- Add Modal No -->
    <form action="{{ route('withdraw.update', $withdraw->id ?? '' ) }}" method="POST" enctype="multipart/form-data"><br> 
        @csrf
        @method('PUT')
    <div class="modal fade" id="No_spo_Approve" aria-hidden="true" role="dialog">
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

                                    <label> ข้าพเจ้า {{ Auth::user()->name ?? '' }}  </label> 
                                    ทั้งนี้ได้ตรวจสอบหลักฐานและจำนวนวัสดุในรายการเบิกแล้ว และ
                                    
                                    <input type="hidden" name="withdraw_status" value="1" class="form-control" id="withdraw_status">
                                    <input type="hidden" name="approve_spo" value="0" class="form-control" id="approve_spo">
                                    <input type="hidden" name="approve_dir" value="0" class="form-control" id="approve_dir">
                                        
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

            <!-- Add Modal -->
            <form action=" " method="POST" enctype="multipart/form-data"><br>
                @csrf
                @method('PUT')
                <div class="modal fade" id="spocheckout"  aria-hidden="true" role="dialog">
                    <div class="modal-dialog modal-xl modal-orange modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title "> <b> รายการเบิกวัสดุ </b></h5> <br>
                                
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>


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
                                            value=" {{ date_format(date_create($item->created_at ??'' ),'d M Y' ) }} " readonly>
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
                                                        @if ($withdraws)
                                                            @foreach ($withdrawdetails as $key => $item)
                                                                 
                                                                <form action=" " method="POST"
                                                                    enctype="multipart/form-data">
                                                                    @csrf
                                                                    <tr data-id=" ">
                                                                        <td> {{ $i++ ??'' }} </td>
                                                                        <td>
                                                                            <input class="form-control" type="text"
                                                                                id="material" name=""
                                                                                value=" {{ $item->material->mateID ??'' }} "
                                                                                readonly>  
                                                                        </td>
                                                                        
                                                                        <td>
                                                                            <input class="form-control" type="text"
                                                                            id="material" name="mate_name"
                                                                            value=" {{ $item->material->mate_name ??'' }} " readonly>
                                                                        </td>
                                                                        <td data-th="Amount">
                                                                            <input type="text" name="amount"
                                                                                value="{{ $item->amount ??'' }} "
                                                                                class="form-control amount" readonly  />
                                                                        </td>
                                                                        <td>
                                                                            <input class="form-control text-danger" type="text"
                                                                            id="material" name="mate_amount"
                                                                            value=" {{ $item->material->mate_amount ??'' }} " readonly>
                                                                        </td>
                                                                        <td data-th="Amount">
                                                                            <input type="text" name="amount"
                                                                                value=" {{ $item->amount ??''}} "
                                                                                class="form-control amount" readonly/>
                                                                        </td>
     
    
                                                                        <td data-th="Amount_Checkout">
                                                                            <input type="number" name="Amount_Checkout"
                                                                                value=" "
                                                                                class="form-control Amount_Checkout update-cart" />
                                                                        </td>
    
                                                                         
                                                                        <td>
                                                                            <input class="form-control total" style="width:100px"
                                                                                type="text" id="material_id" name="material"
                                                                                value="  {{ $item->material->mate_unit ??'' }} " readonly>
                                                                                
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
                                                                            id="grand_total" name="grand_total"
                                                                            value=" รายการ" readonly>
                                                                    </td>
                                                                    
                                                                </tr>
    
                                                            </tbody>
                                                            
    
                                                </table>
                                        </div>
                                    </div>
                                </div>

                                 <label> ผู้จ่ายวัสดุ : </label> {{ Auth::user()->name ?? '' }} <br>
                                        
                                <input type="hidden" name="approve_spo" value="1" class="form-control"
                                    id="approve_mng">

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary " data-dismiss="modal">
                                        ยกเลิก
                                    </button>
                                    <button type="submit" class="btn btn-primary "> ยืนยันการจ่ายวัสดุ </button>
                                </div>
            </form>
        </div>
    </div>
    </div>
    </div>
    <!-- /ADD Modal -->


    </div>
    </div>
    </div>
    </div>
    

@endsection
