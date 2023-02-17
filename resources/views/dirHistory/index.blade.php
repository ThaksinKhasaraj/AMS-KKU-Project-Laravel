@extends('layouts.masterDir')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> ประวัติ </h1><br>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href=" {{ route('Director.index') }}">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active"> ประวัติ </li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-secondary card-outline">
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
                                        <th> ผู้อนุมัติ </th>
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
                                                <td>
                                                    <b>เลขที่ใบเบิก : </b> {{ $withdraw->withdraw_num ?? '' }} <br>
                                                    <b> วันที่เบิก : </b>
                                                    {{ $withdraw->created_at->thaidate('l ที่ j F พ.ศ. Y') ?? '' }} เวลา
                                                    {{ date_format(date_create($withdraw->created_at), 'H:i') }} น. <br>
                                                </td>
                                                <td> {{ $withdraw->user->name ?? '' }} <br>
                                                   <b> หัวหน้างาน/หัวหน้าสาขาวิชา : </b>  {{ $withdraw->user->department->manager_name ?? '' }} 
                                                </td>
                                                <td>  {{ $withdraw->user->department->dept_name ?? '' }} </td>
                                                   
                                                <td>  <b>  {{ $withdraw->dir_user ??''}}  </b> <br>
                                                  
                                                    <span
                                                        class="right badge badge-{{ $withdraw->approve_dir ? 'success' : 'warning' }}">
                                                        {{ $withdraw->approve_dir ? 'อนุมัติ' : 'รออนุมัติ' }}</span>
                                                </td>
                                                                                                  
                                                <td>

                                                    <div class="btn btn-center">
                                                         
                                                        <a class="btn btn-secondary btn-sm center"
                                                            href="{{ route('dirHistory.show', $withdraw->id) }}">
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
  
    