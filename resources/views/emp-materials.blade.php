@extends('layouts.masterEmp')
@section('content')
    <!-- Ionicons -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> รายการวัสดุ </h1><br>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"> <a href="{{ route('employee.index') }}"> หน้าหลัก </a> </li>
                        <li class="breadcrumb-item active"> รายการวัสดุ</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.row -->
    </div><!-- /.row -->

    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-sm-12 col-12">
                <div class="dropdown">
                    <button type="button" class="btn btn-info" data-toggle="dropdown">
                        <i class="fa fa-paper-plane" aria-hidden="true">
                        </i> วัสดุรอส่งเบิก <span class="badge badge-pill badge-danger">
                            {{ count((array) session('cart')) }}</span>
                    </button>
                    <div class="dropdown-menu">
                        <div class="row total-header-section">
                            <div class="col-lg-6 col-sm-6 col-6">
                                <i class="fa fa-paper-plane" aria-hidden="true"></i>
                                </span>
                            </div>
                            @php $total = 0 @endphp
                            @foreach ((array) session('cart') as $id => $details)
                                @php $total += $details['amount'] @endphp
                            @endforeach
                            <div class="col-lg-6 col-sm-6 col-6 total-section text-right">
                                <p> จำนวนทั้งหมด : <span class="badge badge-pill badge-danger">
                                        {{ count((array) session('cart')) }} </span></p>
                            </div>
                        </div>
                        @if (session('cart'))
                            @foreach (session('cart') as $id => $details)
                                <div class="row cart-detail">
                                    <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                                        <img src="storage/mateImage/{{ $details['mateImage'] }}" alt="" />
                                    </div>
                                    <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                                        <input hidden="" name="material_id">
                                        <p> ชื่อวัสดุ : {{ $details['mate_name'] }}</p>
                                        <span class="count"> จำนวน : {{ $details['amount'] }}
                                            {{ $details['mate_unit'] }} </span>

                                    </div>
                                </div>
                            @endforeach
                        @endif
                        <div class="row">
                            <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                                <a href="{{ route('cart.index') }}" class="btn btn-primary btn-block">
                                    ดูรายการทั้งหมด
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>

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
                    <div class="card card-pink card-outline">
                        <div class="card-body">
                            
                            @php $total = 0 @endphp
                            @foreach ((array) session('cart') as $id => $details)
                                @php $total += $details['amount'] @endphp
                            @endforeach

                            <!--ค้นหาวัสดุตามหมวดหมู่-->

                            {{-- <div>
                                <div class="form-row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <select class="form-control input-select" name="category">
                                                <option value="ALL"
                                                    {{ request('category') == 'ALL' ? 'selected' : '' }}>
                                                    หมวดหมู่วัสดุทั้งหมด </option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}"
                                                        {{ request('category') == $category->id ? 'selected' : '' }}>
                                                        {{ $category->cate_name }} </option>
                                                @endforeach

                                            </select>
                                            <div class="col-md-1">
                                                <button class="btn btn-primary" name="material"
                                                value="{{ request('material') }}">
                                                ค้นหา </button>
    
                                            </div>

                                        </div>
                                        
                                    </div>

                                </div>
                            </div> --}}
                            <div class="form-group text-center">
                                <label for="CartItems">
                                    <b>
                                        <h2> รายการวัสดุ </h2>
                                        <h5>  {{ Carbon\Carbon::now()->thaidate('วัน l ที่ j F พ.ศ. Y') }}  </h5>
                                    </b>
                                </label>
                            </div>


                            <table class="table table-bordered datatable">
                                <thead>
                                    <tr>
                                        <th> ลำดับ </th>
                                        <th> รายการวัสดุ </th>
                                        <th> รูปภาพ </th>
                                        <th> จัดการ </th>
                                    </tr>

                                </thead>
                                <tbody>
                                    @if ($materials)
                                        @foreach ($materials as $key => $material)
                                            <tr>
                                                <td> {{ ++$key }} </td>
                                                <td> <b> รหัสวัสดุ : </b> {{ $material->mateID ?? '' }} <br>
                                                    <b> ชื่อวัสดุ : </b> {{ $material->mate_name ?? '' }} <br>
                                                    <b> หน่วยนับ : </b> {{ $material->mate_unit ?? '' }} <br>
                                                    <b> ประเภทวัสดุ : </b> {{ $material->category->cate_name ?? '' }}
                                                    <br>
                                                    <span
                                                        class="right badge badge-{{ $material->mate_note ? 'success' : 'warning' }}">
                                                        {{ $material->mate_note ? 'ไม่ต้องส่งคืน' : 'ต้องส่งคืน' }}
                                                    </span>
                                                </td>

                                                <td> <img src="storage/mateImage/{{ $material->mateImage ?? '' }}"
                                                        width="150px" alt=""> </td>

                                                <td>

                                                    <div class="col-xs-12 col-sm-12 col-md-12 ">
                                                        <a type="submit" href="{{ route('add.to.cart', $material->id) }}"
                                                            class="btn btn-info btn-sm">
                                                            <i data-feather="plus-circle"></i> เลือก
                                                        </a>

                                                    </div>
                                        @endforeach
                                    @endif
                                    </td>
                                </tbody>
                            </table>

                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- /.content -->

    </div>

    <style>
        .thumbnail {
            position: relative;
            padding: 0px;
            margin-bottom: 20px;
        }

        .thumbnail img {
            width: 80%;
        }

        .thumbnail .caption {
            margin: 7px;
        }

        .main-section {
            background-color: #F8F8F8;
        }

        .dropdown {
            float: right;
            padding-right: 30px;
        }

        .btn {
            border: 0px;
            margin: 10px 0px;
            box-shadow: none !important;
        }

        .dropdown .dropdown-menu {
            padding: 20px;
            top: 30px !important;
            width: 350px !important;
            left: -110px !important;
            box-shadow: 0px 5px 30px black;
        }

        .total-header-section {
            border-bottom: 1px solid #d2d2d2;
        }

        .total-section p {
            margin-bottom: 20px;
        }

        /* .cart-title {
                            width: 50px;
                            text-overflow: ellipsis;
                        } */

        .cart-detail {
            padding: 15px 0px;
        }

        .cart-detail-img img {
            width: 100%;
            height: 100%;
            padding-left: 15px;
        }

        .cart-detail-material p {
            margin: 0px;
            color: #000;
            font-weight: 500;
        }

        .cart-detail .amount {
            font-size: 12px;
            margin-right: 10px;
            font-weight: 500;
        }

        .cart-detail .count {
            color: #C2C2DC;
        }

        .checkout {
            border-top: 1px solid #d2d2d2;
            padding-top: 15px;
        }

        .checkout .btn-primary {
            border-radius: 50px;
            height: 50px;
        }

        .dropdown-menu:before {
            content: " ";
            position: absolute;
            top: -20px;
            right: 50px;
            border: 10px solid transparent;
            border-bottom-color: #fff;
        }
    </style>


    <script>
        $(".category").chosen({
            disable_search_threshold: 10
        });
    </script>

    <style>
        #myBtn {
            display: none;
            position: fixed;
            bottom: 80px;
            right: 30px;
            z-index: 99;
            border: none;
            outline: none;
            background-color: rgb(4, 124, 124);
            color: white;
            cursor: pointer;
            padding: 15px;
            border-radius: 4px;
        }


        #myBtn:hover {
            background-color: rgb(15, 155, 248);
        }
    </style>

    

@endsection
