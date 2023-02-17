@extends('layouts.masterEmp')
@section('content')

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>


    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> วัสดุรอส่งเบิก </h1><br>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('employee.index') }}">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active"> วัสดุรอส่งเบิก </li>
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
                    <div class="card card-pink card-outline">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12 margin-tb">
                                    <div class="pull-left">
                                        <div class="pull-right">
                                            <a class="btn btn-secondary" href=" {{ route('emp.materials') }} ">
                                                <i data-feather="arrow-left-circle"></i>
                                                ย้อนกลับ
                                            </a><br>

                                        </div>
                                    </div>
                                </div>

                            </div><br>

                            <div class="form-group text-center">
                                <label for="CartItems">
                                    <b>
                                        <h3> รายการวัสดุรอส่งเบิก </h3>

                                </label>
                            </div>
                            <div>
                                <div class="card border-0 shadow-sm">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="cart" class="table table-hover table-white">
                                                <thead>
                                                    <tr>
                                                        <th style="width:1px;"> ลำดับ </th>
                                                        <th style="width:150px;"> รูปภาพ </th>
                                                        <th style="width:200px;"> รหัสวัสดุ </th>
                                                        <th style="width:600px;"> รายการ </th>
                                                        <th style="width:120px;"> จำนวนเบิก </th>
                                                        <th style="width:120px;"> หน่วยนับ </th>
                                                         

                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    @php
                                                        $i = 1;
                                                        $total = 0;
                                                    @endphp
                                                    @if (session('cart'))
                                                        @foreach (session('cart') as $id => $details)
                                                            @php $total += $details['amount'] @endphp
                                                            <form action="{{ route('withdraw.store') }}" method="POST"
                                                                enctype="multipart/form-data">
                                                                @csrf
                                                                <tr data-id="{{ $id }}">
                                                                    <td> {{ $i++ }} </td>
                                                                    <td>
                                                                        <img src="storage/mateImage/{{ $details['mateImage'] }}"
                                                                            width="50px" alt="" />
                                                                    </td>
                                                                    <td>
                                                                        <span  type="text"
                                                                            id="material" name="mateID"
                                                                            value=" {{ $details['mateID'] ?? '' }} "
                                                                            readonly>  {{ $details['mateID'] ?? '' }}
                                                                    </td>
                                                                    <td>
                                                                        <span type="text"
                                                                            id="material" name="mate_name"
                                                                            value="  {{ $details['mate_name'] ??'' }} " >  {{ $details['mate_name'] ??'' }}
                                                                    </td>

                                                                
                                                                    <td data-th="Amount">
                                                                        <input type="number" name="amount"
                                                                            value="{{ $details['amount'] }}" 
                                                                            min="0"  class="form-control amount update-cart" />
                                                                           
                                                                    </td>
 

                                                                    <td>
                                                                        <span  style="width:100px"
                                                                            type="text" id="material_id" name="material"
                                                                            value="{{ $details['mate_unit'] }} "
                                                                            > {{ $details['mate_unit'] ??'' }}
                                                                    </td>

                                                                    
                                                            </form>

                                                            <td class="actions" data-th="">
                                                                <button class="btn btn-danger btn-sm remove-from-cart">

                                                                    <i class="fa fa-trash-o"></i>

                                                                </button>
                                                            </td>
                                                            </tr>
                                                        @endforeach
                                                    @endif
                                                </tbody>

                                                <div class="table-responsive">
                                                    <table class="table table-hover table-white">
                                                        <tbody>
                                                            <tr>
                                                                <td> </td>
                                                                <td> </td>
                                                                <td> </td>
                                                                <td> </td>

                                                                @php
                                                                    $i = 1;
                                                                    $total = 0;
                                                                @endphp
                                                                @foreach ((array) session('cart') as $id => $details)
                                                                    @php $total += $details['amount'] @endphp
                                                                @endforeach
                                                                <td class="text-right"> รายการวัสดุที่ขอเบิก <span
                                                                        class="text-danger">*</span>
                                                                <td>

                                                                    <input class="form-control text-right total"
                                                                        type="text" id="i" name="total"
                                                                        value=" {{ count((array) session('cart')) }}  รายการ "
                                                                        readonly>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td colspan="5"
                                                                    style="text-align: right; text-primary font-weight: bold">
                                                                    รวมจำนวนวัสดุที่ขอเบิกทั้งสิ้น <span
                                                                        class="text-danger">*</span>
                                                                </td>
                                                                <td style="font-size: 16px;width: 230px">
                                                                    <input class="form-control text-right" type="text"
                                                                        id="grand_total" name="grand_total"
                                                                        value=" {{ $total }} " readonly>
                                                                </td>

                                                            </tr>

                                                        </tbody>

                                                    </table>
                                                     
                                                    <div class="form-group d-flex justify-content-center flex-wrap mb-0">
                                                        <button href="#send_withdraw" data-toggle="modal"
                                                            class="btn btn-pill btn-primary" type="submit">
                                                            <i data-feather="send"></i> ส่งใบคำขอเบิก
                                                        </button>

                                                    </div>
                                                     
                                                </div>

                                                <div class="note">
                                                    <small> หมายเหตุ : <span class="text-danger">*</span><br>
                                                        - ส่งใบคำขอเบิกทุกวันจันทร์ถึงวันพุธ รับวัสดุทุกวันพฤหัส เวลา
                                                        14:00-16:00 น. <br>
                                                        -
                                                        หากต้องการเบิกวัสดุนอกเหนือจากรายการวัสดุในคลังกรุณาติดต่อเจ้าหน้าที่พัสดุ
                                                        <br> </small>

                                                    <small style="color:red"> การเบิกวัสดุนอกเหนือจากวัสดุที่มีในคลัง
                                                        ต้องใช้เวลาในการจัดซื้อเพิ่มเติม
                                                        ผู้ขอเบิกควรเผื่อระยะเวลาในการขอเบิก </small>
                                                    <p class="text-muted"> </p>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Add Modal -->
                            <form role="form" action="{{ route('withdraw.store') }}" method="POST">
                                @csrf
                                <div class="modal fade" id="send_withdraw" aria-hidden="true" role="dialog">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title "> <b> ยืนยันใบคำขอเบิก </b></h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>

                                            </div>
                                            <div class="modal-body">

                                                <div class="row form-row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label> ข้าพเจ้า {{ Auth::user()->name ?? '' }} </label>
                                                            <p> ทั้งนี้ได้ตรวจสอบรายการวัสดุในใบคำขอเบิกแล้ว
                                                                และขอเป็นผู้รับวัสดุเอง </p>
                                                            <input type="hidden" name="withdraw" class="form-control"
                                                                id="withdraw">

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary "
                                                        data-dismiss="modal">
                                                        ยกเลิก
                                                    </button>
                                                    <button type="submit" class="btn btn-primary ">
                                                        ยืนยันและส่งใบคำขอเบิก </button>
                                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /ADD Modal -->
                </div>
            </div>
        </div>
    </div>

    </div><!-- /.card -->
    </div>
    </div>
    </div>
    </div>
    </div>

    <script type="text/javascript">
        $(".update-cart").change(function(e) {
            e.preventDefault();

            var ele = $(this);

            $.ajax({
                url: '{{ route('update.cart') }}',
                method: "patch",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("tr").attr("data-id"),
                    amount: ele.parents("tr").find(".amount").val()
                },
                success: function(response) {
                    window.location.reload();
                }
            });
        });

        $(".remove-from-cart").click(function(e) {
            e.preventDefault();

            var ele = $(this);

            if (confirm("คุณแน่ใจหรือว่าต้องการลบ?")) {
                $.ajax({
                    url: '{{ route('remove.from.cart') }}',
                    method: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.parents("tr").attr("data-id")
                    },
                    success: function(response) {
                        window.location.reload();
                    }
                });
            }
        });
    </script>

@endsection

@section('scripts')



   

@endsection
