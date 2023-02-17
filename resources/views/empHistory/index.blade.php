@extends('layouts.masterEmp')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> ประวัติ </h1><br>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('employee.index') }}">หน้าหลัก</a></li>
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
                    <div class="card card-pink card-outline">
                        <div class="card-body">
                            <div class="form-group text-center">
                                <label for="CartItems">
                                    <b>
                                        <h3> ประวัติ </h3>
                                    </b>
                                </label>
                            </div>
                            <table class="table table-bordered datatable">
                                <thead>
                                    <tr>
                                        <th> ลำดับ </th>
                                        <th> รายการ </th>
                                        <th> ผู้ขอเบิก </th>
                                        <th> หน่วยงาน/สาขาวิชา </th>
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
                                                <td> <b> เลขที่ใบเบิก : </b> {{ $withdraw->withdraw_num ?? '' }} <br>
                                                    <b> วันที่เบิก : </b> {{ $withdraw->created_at->thaidate('วันl ที่ j F พ.ศ. Y') ??'' }} เวลา
                                                    {{ date_format(date_create($withdraw->created_at ??''), 'H:i') }} น.
                                                </td>
                                                
                                                <td> {{ $withdraw->user->name ?? '' }} </td>
                                                <td> {{ $withdraw->user->department->dept_name ?? '' }} </td>
                                                <td>

                                                    <div class="btn btn-center">
                                                        <a class="btn btn-info btn-sm"
                                                            href=" {{ route('empTrack.index') }}">
                                                            </i> ติดตามสถานะ </a>
                                                        <a class="btn btn-secondary btn-sm center"
                                                            href="{{ route('empHistory.show', $withdraw->id ??'') }}">
                                                            </i> รายละเอียด </a>
                                                    </div>
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
