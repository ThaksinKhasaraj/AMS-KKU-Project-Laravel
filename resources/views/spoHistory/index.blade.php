@extends('layouts.masterSpo')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> ประวัติ </h1><br>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('Supplyofficer.index') }}">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active">ประวัติ</li>
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
                                         
                                    </div>
                                </div>
                            </div><br>
                            <div class="form-group text-center">
                                <label for="CartItems">
                                    <b>
                                        <h3> ประวัติการเบิก-จ่ายวัสดุ </h3>
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
                                                    <b> วันที่เบิก : </b>
                                                    {{ $item->created_at->thaidate('วันl ที่ j F พ.ศ. Y') ?? '' }} เวลา
                                                    {{ date_format(date_create($item->created_at), 'H:i') }} น. <br>
                                                    <b> ผู้ขอเบิก : </b> {{ $item->user->name ?? '' }} <br>
                                                    <b> หัวหน้างาน/หัวหน้าสาขาวิชา : </b>
                                                    {{ $item->user->department->manager_name ?? '' }} <br>
                                                    <b> สถานะ : </b>
                                                   
                                                    <span
                                                        class="right badge badge-{{ $item->approve_dir ? 'success' : 'success' }}">
                                                        {{ $item->approve_dir ? 'สำเร็จ' : 'สำเร็จ' }}</span>
                                                        <span
                                                        class="right badge badge-{{ $item->withdraw_status ? 'danger' : '' }}">
                                                        {{ $item->withdraw_status ? 'ไม่อนุมัติ' :'' }}</span>
                                                </td>

                                                <td>
                                                    <b> วันที่จ่าย : </b>
                                                        {{ $item->updated_at->thaidate('l ที่ j F พ.ศ. Y') ?? '' }}  เวลา
                                                    {{ date_format(date_create($item->updated_at), 'H:i') }} น. <br>
                                                    <b> ผู้รับวัสดุ : </b> {{ $item->user->name ?? '' }} <br>
                                                    <b> หน่วยงาน/สาขาวิชา : </b>
                                                    {{ $item->user->department->dept_name ?? '' }} <br>
                                                    <b> สถานะ : </b> <span
                                                        class="right badge badge-{{ $item->approve_success ? 'success' : 'warning' }}">
                                                        {{ $item->approve_success ? 'สำเร็จ' : 'สำเร็จ' }}</span> 
                                                        <span
                                                        class="right badge badge-{{ $item->withdraw_status ? 'danger' : '' }}">
                                                        {{ $item->withdraw_status ? 'ไม่อนุมัติ' :'' }}</span>
                                                        
                                                </td>

                                                <td>

                                                    <a class="btn btn-secondary btn-sm"
                                                        href="{{ route('spoHistory.show', $item->id ?? '') }} ">
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
        </div>
    </div>
    </div>
    </div>

@endsection

