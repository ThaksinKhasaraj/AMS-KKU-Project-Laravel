@extends('layouts.masterDir')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> คำขอรออนุมัติส่งเบิก </h1><br>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('Director.index') }}"> หน้าหลัก </a></li>
                        <li class="breadcrumb-item active"> คำขอรออนุมัติส่งเบิก </li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.row -->
    </div><!-- /.row -->



    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-secondary card-outline">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12 margin-tb">
                                    <div class="pull-left">
                                        <div class="pull-right">
                                            <a class="btn btn-secondary" href="#"> <i
                                                    data-feather="arrow-left-circle"></i> ย้อนกลับ
                                            </a><br>
                                        </div>
                                    </div>
                                </div>
                            </div><br>


                            <table class="table table-bordered datatable">
                                <thead>
                                    <tr>
                                        <th> ลำดับ </th>
                                        <th> เลขที่ใบเบิก </th>
                                        <th> วันที่เบิก </th>
                                        <th> ผู้ขอเบิก </th>
                                        <th> หน่วยงาน/สาขาวิชา </th>
                                        <th> สถานะใบเบิก </th>
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
                                                <td> {{ $item->withdraw_num ?? '' }} </td>
                                                <td> {{ date_format(date_create($item->created_at), 'd M Y') }} เวลา
                                                    {{ date_format(date_create($item->created_at), 'H:i') }} น.
                                                </td>
                                                <td> {{ $item->user->name ?? '' }} </td>
                                                <td> {{ $item->user->department->dept_name ?? '' }} </td>
                                                <td> <span
                                                        class="right badge badge-{{ $item->withdraw_status ? 'success' : 'warning' }}">
                                                        {{ $item->withdraw_status ? 'อนุมัติ' : 'รออนุมัติ' }}</span> </td>

                                                <td>
                                                    <button href="#dir_Approve" data-toggle="modal" type="submit"
                                                        class="btn btn-info btn-sm ">   
                                                        <i data-feather="check-circle"></i>
                                                        อนุมัติ </button>
                                                        <button href="#No_dir_Approve" data-toggle="modal" type="submit"
                                                        class="btn btn-danger btn-sm ">
                                                         <i data-feather="x-square"></i>
                                                        ไม่อนุมัติ </button>
                                                    <a class="btn btn-primary btn-sm"
                                                        href=" {{ route('dirWithdraw.show', $withdraw->id ?? '') }}  ">
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
    <form action=" {{ route('withdraw.update', $withdraw->id ?? '') }}  " method="POST" enctype="multipart/form-data"><br>
        @csrf
        @method('PUT')
        <div class="modal fade" id="dir_Approve" aria-hidden="true" role="dialog">
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
                                    <input type="hidden" name="approve_mng" value="1" class="form-control"
                                        id="approve_mng">
                                    <input type="hidden" name="approve_spo" value="1" class="form-control"
                                        id="approve_spo">
                                    <input type="hidden" name="approve_dir" value="1" class="form-control"
                                        id="approve_dir">


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
    <div class="modal fade" id="No_dir_Approve" aria-hidden="true" role="dialog">
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


@endsection
