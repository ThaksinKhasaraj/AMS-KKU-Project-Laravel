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
                        <li class="breadcrumb-item"><a href="{{ route('Supplyofficer.index') }} ">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active"> คำขอเบิกวัสดุ </li>
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
                                       
                                        <div class="form-group text-center">
                                            <label >
                                                <b>
                                                    <h2> รายการใบคำขอเบิก </h2>
                                                    <h5>  {{ Carbon\Carbon::now()->thaidate('วัน l ที่ j F พ.ศ. Y') }}  </h5>
                                                </b>
                                            </label>
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
                                                    {{ $withdraw->created_at->thaidate('วันl ที่ j F พ.ศ. Y') ?? '' }} เวลา
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
                                                   
                                                    <span
                                                        class="right badge badge-{{ $withdraw->approve_spo ? 'success' : 'warning' }}">
                                                        {{ $withdraw->approve_spo ? 'ตรวจสอบแล้ว' : 'รอตรวจสอบ' }}</span> <br>
                                                </td>
                                                <td>
                                                    <span
                                                        class="right badge badge-{{ $withdraw->approve_dir ? 'success' : 'warning' }}">
                                                        {{ $withdraw->approve_dir ? 'อนุมัติ' : 'รออนุมัติ' }}</span>
                                                    <br>
                                                </td>
                                                <td>
                                                    <span
                                                        class="right badge badge-{{ $withdraw->approve_success ? 'success' : 'warning' }}">
                                                        {{ $withdraw->approve_success ? 'พร้อมจ่าย' : 'รออนุมัติ' }}</span>
                                                    <br>
                                                </td>
                                                <td>
                                                    @if (Auth::user()->role=='เจ้าหน้าที่พัสดุ')

                                                    <a class="btn btn-info btn-sm"  
                                                       href=" {{ route('withdraw.edit', $withdraw->id ??'') }} " >
                                                       ตรวจสอบ </a> 

                                                   {{-- <button href="#spo_Approve" data-toggle="modal" type="submit"
                                                        class="btn btn-info btn-sm ">   
                                                        <i data-feather="check-circle"></i>
                                                        อนุมัติ </button>

                                            --}}
                                                       {{--   <button href="#No_spo_Approve" data-toggle="modal" type="submit"
                                                        class="btn btn-danger btn-sm ">
                                                         <i data-feather="x-circle"></i>
                                                        ไม่อนุมัติ </button> --}}

                                                        @endif
                                                    {{-- <a class="btn btn-primary btn-sm"
                                                        href="{{ route('spoWithdraw.show', $withdraw->id) }}">
                                                        รายละเอียด </a> --}}

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



@endsection
