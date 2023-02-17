@extends('layouts.masterMng')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> รายละเอียดการเบิก </h1><br>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('manager.index') }}"> หน้าหลัก </a></li>
                        <li class="breadcrumb-item active"> รายละเอียดการเบิก </li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.row -->
    </div><!-- /.row -->

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-success card-outline">
                        <div class="card-body">


                            <div class="row">
                                <div class="col-lg-12 margin-tb">
                                    <div class="pull-left">
                                        <div class="pull-right">
                                            <a class="btn btn-secondary" href=" {{ route('mngWithdraw.index') }}"> <i
                                                    data-feather="arrow-left-circle"></i>
                                                ย้อนกลับ
                                            </a><br>
                                        </div>
                                    </div>
                                </div>
                            </div><br>

                            <div id="withdrawC">
                                <div class="row d-flex justify-content-center h-80-vh">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <img src="{{ URL::to('assets/img/Ams.png') }}" width="60px" class="inv-logo" alt="">
                                                <h2 class="text-uppercase text-center"> ใบคำขอเบิกวัสดุ คณะเทคนิคการแพทย์ มหาวิทยาลัยขอนแก่น </h2>


                                                @foreach ($withdraw as $item)
                                                    <div class="d-flex justify-content-between">
                                                        <h6> วันที่ทำการเบิก :
                                                            {{ date_format(date_create($item->created_at), 'd M Y') }}
                                                        </h6>
                                                        <h6> เลขที่ใบเบิก : {{ $item->withdraw_num }} </h6>

                                                    </div><br><br> <br>

                                                    <div class="row">
                                                        <div class="col-lg-12 text-center font-18">
                                                            <p> ข้าพเจ้า <b>{{ $item->user->department->manager_name }} </b>
                                                                หัวหน้าสาขาวิชา/หัวหน้างาน <b>
                                                                    {{ $item->user->department->dept_name }} </b>
                                                            </p>
                                                            <p> เบิกในนามของ <b> {{ $item->user->department->dept_name }}
                                                                </b>
                                                                ขอเบิกวัสดุดังนี้ </p> <br>
                                                            <ul class="list-unstyled">
                                                                <li><a href="#"> </a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                @endforeach
                                                <div class="row">
                                                    <div class="col-sm-12 col-lg-12 m-b-20 text-center">
                                                        <h3> รายการขอเบิกวัสดุ </h3>
                                                        <ul class="list-unstyled">
                                                            <li><a href="#"> </a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <table class="table table-bordered">
                                                    <thead class="text-center">
                                                        <tr>
                                                            <th text=""> ลำดับ </th>
                                                            <th> รหัสวัสดุ </th>
                                                            <th class="d-none d-sm-table-cell"> รายการ </th>
                                                            <th> จำนวนเบิก </th>
                                                            <th> หน่วยนับ </th>
                                                            <th class="text-right"> หมายเหตุ </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php
                                                            $i = 1;
                                                            $total = 0;
                                                        @endphp
                                                        @if ($withdrawdetail)
                                                            @foreach ($withdrawdetail as $key => $item)
                                                                <tr>
                                                                    <td> {{ $i++ }} </td>
                                                                    <td> {{ $item->material->mateID ?? '' }} </td>
                                                                    <td class="d-none d-sm-table-cell">
                                                                        {{ $item->material->mate_name ?? '' }} </td>
                                                                    <td> {{ $item->amount ?? '' }} </td>
                                                                    <td> {{ $item->material->mate_unit ?? '' }} </td>
                                                                    <td class="text-right"> </td>
                                                                </tr>

                                                    </tbody>
                                                    @endforeach
                                                </table>
                                                <div>
                                                    <div class="row invoice-payment">
                                                        <div class="col-sm-7">
                                                        </div>
                                                        <div class="col-sm-5">
                                                            <div class="m-b-20">
                                                                <div class="table-responsive no-border">
                                                                    <table class="table">
                                                                        <tbody>
                                                                            <tr>
                                                                                <th> จำนวน : {{ $i++ }} รายการ
                                                                                </th>
                                                                                <td class="text-right"> </td>
                                                                            </tr>

                                                                        </tbody>

                                                                    </table>
                                                                </div>

                                                            </div>
                                                        </div> <br><br><br><br>

                                                        <div class="col-sm-6 m-b-20">
{{-- 
                                                            @foreach ($withdraw as $item)
                                                                <span> เรียน คณบดี </span><br>

                                                                <div class="col-lg-9">
                                                                    <span>เพื่อโปรดอนุมัติการเบิกจ่ายวัสดุตามที่เสนอมา
                                                                        ทั้งนี้ได้ตรวจสอบหลักฐานและจำนวนพัสดุในบัญชี
                                                                        ทะเบียนแล้ว
                                                                </div>

                                                                </span><br><br><br>
                                                                <p class="text-sm-center ">
                                                                    ........................................
                                                                    ผู้ตรวจสอบ
                                                                </p>
                                                                </span>
                                                                <p class="text-sm-center ">
                                                                    (........................................................)
                                                                </p></span> <br>

                                                                <span> </span><br><br><br>
                                                                <p class="text-sm-center ">
                                                                    ........................................
                                                                    ผู้อนุมัติ
                                                                </p>
                                                                </span>

                                                                <span> </span><br><br><br>
                                                                <p class="text-sm-center ">
                                                                    ........................................
                                                                    ผู้จ่ายพัสดุ
                                                                </p></span>
                                                        </div>
                                                        <div class="col-sm-6 m-b-20">
                                                            <span> และให้บุคคลนี้เป็นผู้รับพัสดุแทนได้ <br><br><br>

                                                                <p class="text-sm-center "> <b> {{ $item->user->name }}
                                                                    </b>
                                                                    ผู้รับพัสดุแทน </p>
                                                            </span><br>
                                                            <p class="text-sm-center ">
                                                                (ลงชื่อ)........................................
                                                                หัวหน้างาน/หัวหน้าสาขาวิชา </p></span><br>
                                                            <p class="text-sm-center ">
                                                                ( <b> {{ $item->user->department->manager_name }} </b> )
                                                            </p></span>
                                                            <br>

                                                            <div class="row">
                                                                <div class="col-sm-10 m-b-10">

                                                                    <span> ได้รับของตามจำนวนและรายการที่จ่ายเรียบร้อยแล้ว
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <br>


                                                            <p class="text-sm-center ">
                                                                (ลงชื่อ)........................................
                                                                ผู้รับพัสดุ </p></span><br>
                                                            <p class="text-sm-center ">
                                                                ( <b> {{ $item->user->name }} </b> )
                                                            </p>
                                                            </span> <br>
                                                            @endforeach --}}
                                                            {{-- <small> หมายเหตุ : การเบิกหมึกให้ระบุหมายเลขครุภัณฑ์ที่จะเบิก </small> --}}
                                                        </div><br><br>

                                                    </div>
                                                    @endif
                                                    หมายเหตุ : <span class="text-danger">*</span> <br>
                                                    <div class="note  text-center">
                                                        <span> ผู้เบิกต้องมารับวัสดุที่ขอเบิกเอง ที่ฝ่ายพัสดุ
                                                            คณะเทคนิคการแพทย์ โดยจะจ่ายวัสดุ ทุกวันพฤหัส เวลา 14:00-16:00 น.
                                                            ทั้งนี้ขึ้นอยู่กับการอนุมัติใบคำขอเบิก </span>
                                                        <p class="text-muted"> </p>
                                                    </div>

                                                    {{-- <div class="note">
                                        <img src="{{ URL::to('assets/img/Ams.png') }}" width="60px" class="inv-logo"
                                            alt="">

                                        <small> <b> ฝ่ายพัสดุ กองบริหารงานคณะเทคนิคการแพทย์ มหาวิทยาลัยขอนแก่น
                                            ที่อยู่ เลขที่ 123 ถ.มิตรภาพ ต.ในเมือง อ.เมือง จ.ขอนแก่น 40002 โทรศัพท์,โทรสาร : 0 4320 2399
                                            อีเมล : ams@kku.ac.th  </b> </small>

                                        <p class="text-muted"> </p>
                                    </div> --}}

                                                </div>
                                            </div>

                                        </div>

                                        {{-- <div class="text-center">
                                            <button href="#mng_Approve" data-toggle="modal" type="submit"
                                        class="btn btn-success btn-sm ">
                                        <i data-feather="check-circle"></i>
                                        อนุมัติ </button>    --}}
{{-- 
                                    <button href="#No_mng_Approve" data-toggle="modal" type="submit"
                                        class="btn btn-danger btn-sm ">
                                         <i data-feather="x-circle"></i>
                                        ไม่อนุมัติ </button>
                                     </div> 
                                         --}}
                                    </div>

                                    </div>
                                </div>
                            </div>
                            <!-- /Page Content -->
                        </div>
                    </div>
                </div></div>
        </div>
       



     <!-- Add Modal Yes -->
     <form action="{{ route('withdraw.update', $item->id ?? '') }}" method="POST"
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
