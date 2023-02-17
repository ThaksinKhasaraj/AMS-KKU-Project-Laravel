@extends('layouts.masterMng')
@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> คำขอเบิกวัสดุ </h1><br>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('manager.index') }}"> หน้าหลัก </a></li>
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

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-success card-outline">
                        <div class="card-body">
                           

                            <div class="form-group text-center">
                                <label >
                                    <b>
                                        <h2> รายการใบคำขอเบิก </h2>
                                        <h5>  {{ Carbon\Carbon::now()->thaidate('วัน l ที่ j F พ.ศ. Y') }}  </h5>
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
                                        @foreach ($withdraws as $withdraw)
                                            <tr>
                                                <td> {{ $i++ }} </td>
                                                <td> <b> วันที่เบิก : </b>
                                                    {{ $withdraw->created_at->thaidate('วันl ที่ j F พ.ศ. Y') ?? '' }} <br>
                                                    <b> เลขที่ใบเบิก : </b>{{ $withdraw->withdraw_num ?? '' }} <br>
                                                </td>

                                                <td> {{ $withdraw->user->name ?? '' }} </td>
                                                <td> {{ $withdraw->user->department->dept_name ?? '' }} </td>
                                                <td> <span
                                                        class="right badge badge-{{ $withdraw->approve_mng ? 'success' : 'warning' }}">
                                                        {{ $withdraw->approve_mng ? 'อนุมัติ' : 'รออนุมัติ' }}</span>
                                                </td>

                                                <td>
                                                    <button href="#mng_Approve" data-toggle="modal" type="submit"
                                                        class="btn btn-success btn-sm ">
                                                        <i data-feather="check-circle"></i>
                                                        อนุมัติ </button> <br>

                                                    {{-- <button href="#No_mng_Approve" data-toggle="modal" type="submit"
                                                        class="btn btn-danger btn-sm ">
                                                         <i data-feather="x-circle"></i>
                                                        ไม่อนุมัติ </button> --}}

                                                    <a class="btn btn-primary btn-sm"
                                                        href="{{ route('mngWithdraw.show', $withdraw->id) }}">
                                                        รายละเอียด </a>
                                                </td>

                                </tbody>
                                @endforeach
                            </table>
                            @endif
                        </div>
                    </div>


                    <!-- Add Modal Yes -->
                    <form action="{{ route('withdraw.update', $withdraw->id ?? '') }}" method="POST"
                        enctype="multipart/form-data"><br>
                        @csrf
                        @method('PUT')
                        <div class="modal fade" id="mng_Approve" aria-hidden="true" role="dialog">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title "> <b> อนุมัติใบคำขอเบิก </b> </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>

                                    </div>
                                    <div class="modal-body">
                                        <div class="row form-row">
                                            <div class="col-12">
                                                <div class="form-group">

                                                    <label> ข้าพเจ้า {{ Auth::user()->name ?? '' }} </label>
                                                    ทั้งนี้ได้ตรวจสอบหลักฐานและจำนวนวัสดุในรายการเบิกแล้ว
                                                    และให้บุคคลต่อไปนี้เป็นผู้รับวัสดุแทนได้

                                                    <input type="hidden" name="approve_mng" value="1"
                                                        class="form-control" id="approve_mng">
                                                    <input type="hidden" name="approve_spo" value="0"
                                                        class="form-control" id="approve_spo">
                                                    <input type="hidden" name="approve_dir" value="0"
                                                        class="form-control" id="approve_dir">
                                                    <input type="hidden" name="withdraw_status" value="0"
                                                        class="form-control" id="withdraw_status">
                                                    <input type="hidden" name="approve_success" value="0"
                                                        class="form-control" id="approve_dir">
                                                    <input type="hidden" name="total" value="0" class="form-control"
                                                        id="total">

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
    <form action="{{ route('withdraw.update', $withdraw->id ?? '') }}" method="POST" enctype="multipart/form-data"><br>
        @csrf
        @method('PUT')
        <div class="modal fade" id="No_mng_Approve" aria-hidden="true" role="dialog">
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

                                    <label> ข้าพเจ้า {{ Auth::user()->name ?? '' }} </label>
                                    ทั้งนี้ได้ตรวจสอบหลักฐานและจำนวนวัสดุในรายการเบิกแล้ว และ

                                    <input type="hidden" name="withdraw_status" value="1" class="form-control"
                                        id="withdraw_status">
                                    <input type="hidden" name="approve_mng" value="0" class="form-control"
                                        id="approve_mng">
                                    <input type="hidden" name="approve_spo" value="0" class="form-control"
                                        id="approve_spo">
                                    <input type="hidden" name="approve_dir" value="0" class="form-control"
                                        id="approve_dir">
                                        <input type="hidden" name="approve_success" value="0" class="form-control"
                                        id="approve_dir">
                                    <input type="hidden" name="pay_user" value=""
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


    <?php
    
    if (isset($_POST['submit'])) {
         
   
    $sToken = 'mT37KeIUYhzQIr7wsTOj87NBBTR7ZKNHy7wIQMsHbCk';
    $sMessage = 'หัวหน้างาน/สาขาวิชาอนุมัติใบคำขอเบิกแล้ว';
    
    $chOne = curl_init();
    curl_setopt($chOne, CURLOPT_URL, 'https://notify-api.line.me/api/notify');
    curl_setopt($chOne, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($chOne, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($chOne, CURLOPT_POST, 1);
    curl_setopt($chOne, CURLOPT_POSTFIELDS, 'message=' . $sMessage);
    $headers = ['Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer ' . $sToken . ''];
    curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($chOne, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($chOne);
}
     
    ?>
@endsection
