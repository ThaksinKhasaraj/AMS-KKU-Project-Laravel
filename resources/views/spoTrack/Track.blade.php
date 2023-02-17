@extends('layouts.masterSpo')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> ติดตามสถานะ </h1><br>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('Supplyofficer.index') }}">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active"> ติดตามสถานะ </li>
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
                                         
                                        <div class="content">

                                            <div class=" text-center">
                                                <h3> สถานะคำขอ </h3>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div><br>


                            <table class="table table-bordered datatable">
                                <thead>
                                    <tr>
                                        <th> ลำดับ </th>
                                        <th> รายการ </th>
                                        <th> บุคลากร </th>
                                        <th> หัวหน้างาน/หัวหน้าสาขา </th>
                                        <th> เจ้าหน้าที่พัสดุ </th>
                                        <th> ผอ.กองบริหารงานคณะฯ </th>
                                        <th> สถานะ </th>
                                        <th> จัดการ </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @if ($withdraws)
                                        @foreach ($withdraws as $withdraw)
                                            <tr>
                                                <td> {{ $i++ }} </td>
                                                <td> <b> วันที่เบิก : </b> 
                                                    {{ $withdraw->created_at->thaidate('l ที่ j F พ.ศ. Y') ?? '' }} เวลา
                                                    {{ date_format(date_create($withdraw->created_at), 'H:i') }} น. <br>
                                                    <b> เลขที่ใบเบิก :  </b>{{ $withdraw->withdraw_num ?? '' }} <br>
                                                    <b> หน่วยงาน/สาขาวิชา : </b> {{ $withdraw->user->department->dept_name ?? '' }} <br>
                                                </td>
                                                <td>
                                                    {{ $withdraw->user->name ?? '' }}<br>
                                                    <span
                                                        class="right badge badge-{{ $withdraw->status ? 'success' : 'warning' }}">
                                                        {{ $withdraw->withdraw_status ? 'ส่งใบคำขอเบิกแล้ว' : 'ส่งใบคำขอเบิกแล้ว' }}</span>
                                                    <br>
                                                </td>
                                                <td>
                                                    {{ $withdraw->user->department->manager_name ?? '' }}<br>
                                                    <span
                                                        class="right badge badge-{{ $withdraw->approve_mng ? 'success' : 'warning' }}">
                                                        {{ $withdraw->approve_mng ? 'อนุมัติ' : 'รออนุมัติ' }}</span> <br>
                                                </td>
                                                <td>
                                                    {{ $withdraw->spo_user ?? '' }} <br>
                                                    <span
                                                        class="right badge badge-{{ $withdraw->approve_spo ? 'success' : 'warning' }}">
                                                        {{ $withdraw->approve_spo ? 'ตรวจสอบแล้ว' : 'รอตรวจสอบ' }}</span> <br>
                                                        <span
                                                        class="right badge badge-{{ $withdraw->withdraw_status ? 'danger' : '' }}">
                                                        {{ $withdraw->withdraw_status ? 'ไม่อนุมัติ' :'' }}</span>
                                                </td>
                                                <td>
                                                    {{ $withdraw->dir_user ?? '' }} <br>

                                                    <span
                                                        class="right badge badge-{{ $withdraw->approve_dir ? 'success' : 'warning' }}">
                                                        {{ $withdraw->approve_dir ? 'อนุมัติ' : 'รออนุมัติ' }}</span> <br>
                                                        <span
                                                        class="right badge badge-{{ $withdraw->withdraw_status ? 'danger' : '' }}">
                                                        {{ $withdraw->withdraw_status ? 'ไม่อนุมัติ' :'' }}</span>
                                                    <br>
                                                   
                                                </td>
                                                <td>
                                                     ผู้จ่าย : {{ $withdraw->pay_user ?? '' }} <br>
                                                     ผู้รับพัสดุ : {{ $withdraw->user->name ?? '' }}<br>
                                                    <span
                                                        class="right badge badge-{{ $withdraw->approve_success ? 'success' : 'warning' }}">
                                                        {{ $withdraw->approve_success ? 'สำเร็จ' : 'รออนุมัติ' }}</span>
                                                        <span
                                                        class="right badge badge-{{ $withdraw->withdraw_status ? 'danger' : '' }}">
                                                        {{ $withdraw->withdraw_status ? 'ไม่อนุมัติ' :'' }}</span>
                                                    <br>
                                                     
                                                </td>
                                                <td>

                                                    <a class="btn btn-primary btn-sm"
                                                        href="{{ route('spoWithdraw.show', $withdraw->id) }}">
                                                     รายละเอียด </a>

                                                </td>

                                </tbody>
                                @endforeach
                            </table>
                            @endif


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





    <!-- Add Modal -->
    <form action=" {{ route('withdraw.update', $withdraw->id ??'') }}  " method="POST" enctype="multipart/form-data"><br>
        @csrf
        @method('PUT')
        <div class="modal fade" id="spo_Approve" aria-hidden="true" role="dialog">
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

                                    <label> ข้าพเจ้า {{ Auth::user()->name ?? '' }} </label>
                                    ทั้งนี้ได้ตรวจสอบหลักฐานและจำนวนพัสดุในบัญชี ทะเบียนแล้ว
                                    <input type="hidden" name="approve_mng" value="1" class="form-control" id="approve_mng">
                                    <input type="hidden" name="approve_spo" value="1" class="form-control" id="approve_spo">
                                    <input type="hidden" name="approve_dir" value="0" class="form-control" id="approve_dir">
                                   

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
@endsection
