@extends('layouts.masterSpo')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> รายละเอียด </h1><br>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('Supplyofficer.index') }}">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active">รายละเอียด</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
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
                                        <div class="pull-right">
                                            <a class="btn btn-secondary" href="{{ route('spoHistory.index') }}"> <i
                                                    data-feather="arrow-left-circle"></i> ย้อนกลับ
                                            </a><br>
                                        </div>
                                        <div class="col-auto float-right ml-auto">
                                            <div class="btn-group btn-group-xl" onclick="printWithdrawC()" >
                                                <button class="btn btn-secondary">
                                                    <i class="fa fa-print fa-lg"> </i> Print </button>
                                                <button class="btn btn-secondary"> PDF </button>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><br>


                            <!-- Page Wrapper -->
                            <div class="page-wrapper">
                                <!-- Page Content -->
                                <div class="content container-fluid">

                                    <!-- /Page Header -->
                                    <div id="withdrawC">

                                        <div class="row d-flex justify-content-center h-80-vh">

                                            <div class="col-md-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <img src="{{ URL::to('assets/img/Ams.png') }}" width="60px"
                                                            class="inv-logo" alt="">
                                                        <h2 class="text-uppercase text-center"> ใบคำขอเบิกวัสดุ
                                                            คณะเทคนิคการแพทย์ มหาวิทยาลัยขอนแก่น </h2><br>

                                                        @if ($withdraw)
                                                            @foreach ($withdraw as $item)
                                                                <div class="form-row-center">
                                                                    <div class="form-group col-md-4">
                                                                        <label> วันที่ : </label>
                                                                        {{ $item->created_at->thaidate('j F Y') ?? '' }}
                                                                    </div>
                                                                    <div class="form-group col-md-4">
                                                                        <label> เลขที่ใบเบิก : </label>
                                                                        {{ $item->withdraw_num ?? '' }}
                                                                    </div>
                                                                </div><br>
                                                                <div class="text-center">
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-4">
                                                                            <label> ชื่อ-สกุล : </label>
                                                                            {{ $item->user->name ?? '' }} <span>
                                                                            </span>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label> เบิกในนาม : </label>
                                                                            {{ $item->user->department->dept_name ?? '' }}

                                                                        </div>

                                                                        <div class="form-group col-md-4">
                                                                            <label> ตำแหน่ง : </label>
                                                                            {{ $item->user->emp_position ?? '' }}

                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label> ประเภทพนักงาน : </label>
                                                                            {{ $item->user->emp_type ?? '' }}

                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label> เบอร์โทรศัพท์ : </label>
                                                                            {{ $item->user->emp_phone ?? '' }}

                                                                        </div>

                                                                        <div class="form-group col-md-4">
                                                                            <label for="input"> อีเมล : </label>
                                                                            {{ $item->user->email ?? '' }}

                                                                        </div>
                                                                    </div>
                                                                </div> <br><br>
                                                            @endforeach
                                                        @endif


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
                                                                    <th> จำนวนที่ขอเบิก </th>
                                                                    <th> จำนวนที่จ่าย </th>
                                                                    <th> หน่วยนับ </th>
                                                                    <th> ราคาต้นทุน(บาท) </th>
                                                                    <th> มูลค่ารวม(บาท) </th>
                                                                    <th class="text-right"> หมายเหตุ </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @php
                                                                    $i = 1;
                                                                    $total = 0;
                                                                @endphp
                                                                @if ($withdraw)
                                                                    @foreach ($withdrawdetail as $key => $item)
                                                                        <tr>
                                                                            <td> {{ $i++ }} </td>
                                                                            <td> {{ $item->material->mateID ?? '' }} </td>
                                                                            <td> {{ $item->material->mate_name ?? '' }}
                                                                            </td>
                                                                            <td> {{ $item->amount ?? '' }} </td>
                                                                            <td> {{ $item->amount ?? '' }} </td>
                                                                            <td> {{ $item->material->mate_unit ?? '' }}
                                                                            </td>
                                                                            <td> {{ $item->material->mate_price ?? '' }}
                                                                            </td>
                                                                            <td> {{ number_format($item->amount * $item->material->mate_price, 2) ?? '' }}
                                                                            </td>
                                                                            <td> {{ $item->note ?? '' }} </td>


                                                                        </tr>

                                                            </tbody>
                                                            @endforeach
                                                        </table>
                                                        @endif
                                                        <div>
                                                            <div class="row">
                                                                <div class="col-sm-7">
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <div class="m-b-20">
                                                                        <div class="table-responsive no-border">
                                                                            <table class="table">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <th> จำนวนที่ขอเบิก : </th>
                                                                                        <td class="text-right">
                                                                                            {{ count($withdrawdetail) }}
                                                                                            รายการ </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th> จำนวนที่จ่าย : </th>
                                                                                        <td class="text-right">
                                                                                            {{ count($withdrawdetail) }}
                                                                                            รายการ </td>
                                                                                    </tr>
                                                                                    @php $total = 0 @endphp
                                                                                    @foreach ($withdrawdetail as $item)
                                                                                        @php $total += $item->amount * $item->material->mate_price @endphp
                                                                                    @endforeach
                                                                                    <tr>
                                                                                        <th> มูลค่ารวมทั้งสิ้น : </th>
                                                                                        <td class="text-right">
                                                                                            {{ number_format($total, 2 ) ??'' }} บาท  </td>
                                                                                    </tr>

                                                                                </tbody>

                                                                            </table>
                                                                        </div>

                                                                    </div>
                                                                </div> <br><br><br><br>
                                                                
                                                                <div class="col-sm-6 m-b-20">

                                                                    @if ($withdraw)
                                                                        @foreach ($withdraw as $item)
                                                                            <span> เรียน คณบดี </span><br>

                                                                            <div class="col-lg-9">
                                                                                <span>เพื่อโปรดอนุมัติการเบิกจ่ายวัสดุตามที่เสนอมา
                                                                                    ทั้งนี้ได้ตรวจสอบหลักฐานและจำนวนพัสดุในบัญชี
                                                                                    ทะเบียนแล้ว
                                                                            </div>

                                                                            </span><br><br><br>
                                                                            <p class="text-sm-center ">

                                                                                <b> {{ $item->spo_user ?? '' }} </b> <br>
                                                                                (ผู้ตรวจสอบ)
                                                                            </p>
                                                                            </span>
                                                                            <p class="text-sm-center ">
                                                                                {{ $item->spo_user ?? '' }}
                                                                            </p></span> <br>

                                                                            <span> </span><br><br><br>
                                                                            <p class="text-sm-center ">
                                                                                <b> {{ $item->dir_user ?? '' }} </b> <br>
                                                                                (ผู้อนุมัติ)
                                                                            </p>
                                                                            </span>


                                                                            <span> </span><br><br><br>
                                                                            <p class="text-sm-center ">


                                                                                <b> {{ Auth::user()->name ?? '' }} </b>
                                                                                <br>
                                                                                ( ผู้จ่ายพัสดุ )
                                                                            </p></span>
                                                                </div>


                                                                <div class="col-sm-6 m-b-20">
                                                                    <span> และให้บุคคลนี้เป็นผู้รับพัสดุแทนได้ <br><br><br>
                                                                        <p class="text-sm-center ">
                                                                            <b> {{ $item->user->name ?? '' }} </b>
                                                                            ผู้รับพัสดุแทน
                                                                        </p>
                                                                    </span><br>
                                                                    <p class="text-sm-center ">
                                                                        (ลงชื่อ) <b>
                                                                            {{ $item->user->department->manager_name ?? '' }}
                                                                        </b>
                                                                        หัวหน้างาน/หัวหน้าสาขาวิชา </p></span><br>
                                                                    <p class="text-sm-center ">
                                                                        ( {{ $item->user->department->manager_name ?? '' }}
                                                                        ) </p></span>
                                                                    <br>

                                                                    <div class="row">
                                                                        <div class="col-sm-10 m-b-10">

                                                                            <span>
                                                                                ได้รับของตามจำนวนและรายการที่จ่ายเรียบร้อยแล้ว
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <br>

                                                                    <p class="text-sm-center ">
                                                                        (ลงชื่อ) <b> {{ $item->user->name ?? '' }} </b>
                                                                        ผู้รับพัสดุ </p></span><br>
                                                                    <p class="text-sm-center ">
                                                                        ( {{ $item->user->name ?? '' }} )
                                                                    </p>
                                                                    </span> <br>

                                                                    {{-- <small> หมายเหตุ : การเบิกหมึกให้ระบุหมายเลขครุภัณฑ์ที่จะเบิก </small> --}}
                                                                </div><br><br>
                                                                @endforeach
                                                                @endif


                                                            </div>

                                                            หมายเหตุ : <span class="text-danger">*</span><br>
                                                            <div class="note  text-center">

                                                                <span> ผู้เบิกต้องมารับวัสดุที่ขอเบิกเอง ที่ฝ่ายพัสดุ
                                                                    คณะเทคนิคการแพทย์ โดยจะจ่ายวัสดุ ทุกวันพฤหัส เวลา
                                                                    14:00-16:00 น. ทั้งนี้ขึ้นอยู่กับการอนุมัติใบคำขอเบิก
                                                                </span>
                                                                <p class="text-muted"> </p>
                                                            </div>

                                                            {{-- <div class="note">
                                        

                                        <small> <b> ฝ่ายพัสดุ กองบริหารงานคณะเทคนิคการแพทย์ มหาวิทยาลัยขอนแก่น
                                            ที่อยู่ เลขที่ 123 ถ.มิตรภาพ ต.ในเมือง อ.เมือง จ.ขอนแก่น 40002 โทรศัพท์,โทรสาร : 0 4320 2399
                                            อีเมล : ams@kku.ac.th  </b> </small>

                                        <p class="text-muted"> </p>
                                    </div> --}}

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>

    <!-- /Page Content -->
 



    <script>
        function noPrint() {
            window.location.href = '{{ route('empHistory.index') }}';
        }

        function printWithdrawC() {
            var printContents = document.getElementById('withdrawC').innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        }
        document.addEventListener('keyup', (event) => {
            var name = event.key;
            var code = event.code;
            if (code === "Enter" || name === "Enter") {
                noPrint();
            } else if (code === "KeyP" || name === "p") {
                printWithdrawC()
            }
        }, false);
    </script>

@endsection
