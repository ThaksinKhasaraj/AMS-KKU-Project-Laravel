@extends('layouts.masterSpo')
@section('content')
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>


    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> </h1><br>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href=" #"> หน้าหลัก </a></li>
                        <li class="breadcrumb-item active"> รายการวัสดุ </li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->

            <!-- Small boxes (Stat box) -->



            <!-- Small boxes (Stat box) -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-2 col-2">
                        <!-- small box -->
                        <div class="small-box bg-primary">
                            <div class="inner">
                                <h3> {{ count($categories) ?? '' }} </h3>
                                <p> ประเภทวัสดุทั้งหมด </p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pricetags"></i>
                            </div>
                            <a href="{{ route('categories.index') }} " class="small-box-footer"> ข้อมูลเพิ่มเติม
                                <i data-feather="arrow-right-circle"></i> </a>
                        </div>
                    </div>
                    <!-- ./col -->

                    <div class="col-lg-2 col-2">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3> {{ count($materials) ?? '' }} </h3>
                                <p> รายการวัสดุทั้งหมด </p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-clipboard"></i>
                            </div>
                            <a href="#" class="small-box-footer"> ข้อมูลเพิ่มเติม
                                <i data-feather="arrow-right-circle"></i> </a>
                        </div>
                    </div>
                    <!-- ./col -->


                    <!-- ./col -->
                    <div class="col-lg-2 col-2">
                        <!-- small box -->
                        <div class="small-box bg-secondary">
                            <div class="inner">
                                <h3> {{ number_format($Totalmate_amount) ?? '' }} </h3>

                                <p>จำนวนวัสดุทั้งหมด</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="#" class="small-box-footer"> ข้อมูลเพิ่มเติม <i
                                    data-feather="arrow-right-circle"></i> </a>
                        </div>
                    </div>
                    <!-- ./col -->



                    <div class="col-lg-2 col-2">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3> {{ $Stock ?? '' }} <sup style="font-size: 20px"></sup></h3>

                                <p> วัสดุที่สามารถเบิกได้ </p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-checkmark-circled"></i>
                            </div>
                            <a href="#Stock" data-toggle="modal" type="submit" class="small-box-footer"> 
                                ข้อมูลเพิ่มเติม
                                <i data-feather="arrow-right-circle"></i> </a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-2 col-2">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3> {{ $min ?? '' }} </h3>

                                <p>วัสดุที่ใกล้หมด</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-plus-circled"></i>
                            </div>
                            <a href="#minStock" data-toggle="modal" type="submit" class="small-box-footer"> 
                                ข้อมูลเพิ่มเติม 
                                <i data-feather="arrow-right-circle"></i> </a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-2 col-2">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3> {{ $countOutstock ?? '' }}</h3>

                                <p>วัสดุที่ไม่สามารถเบิกได้</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-close-circled"></i>
                            </div>
                            <a href="#Outstock" data-toggle="modal" type="submit" class="small-box-footer"> 
                                ข้อมูลเพิ่มเติม <i data-feather="arrow-right-circle"></i> </a>
                                    
                        </div>
                    </div>
                    <!-- ./col -->

                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-orange card-outline">
                        <div class="card-body">
                            <h5 class="card-title"> เพิ่มรายการวัสดุ </h5><br>
                            <a href="{{ route('materials.create') }}" class="btn btn-sm btn-info">
                                <i data-feather="plus-square"></i> เพิ่มรายการวัสดุ </a><br><br>

                            {{-- <div class="text-right ">
                                <!-- Page Header -->
                                <div class="page-header">
                                    <div class="row align-items-center">
                                        <div class="col-auto float-right ml-auto">
                                            <div class="btn-group btn-group-xl">
                                                <button class="btn btn-secondary">
                                                    <i class="fa fa-print fa-lg"  ></i> Print
                                                </button>
                                                <button class="btn btn-secondary"> PDF </button>
                                                <button class="btn btn-secondary" onclick=" " > Excel </button>
                                                <button class="btn btn-secondary"> CSV </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}

                            <div id="material" style="width:100%">
                                <!-- /Page Header -->
                                <div class="form-group text-center">
                                    <label for="CartItems">
                                        <b>
                                            <h3> รายการวัสดุ </h3>
                                            <h5> {{ Carbon\Carbon::now()->thaidate('วัน l ที่ j F พ.ศ. Y') }} </h5>

                                        </b>
                                    </label>
                                </div>

                                <table id="material" style="width:100%" class="table table-bordered datatable">

                                    <thead>
                                        <tr>
                                            <th style="width:1px;"> ลำดับ </th>
                                            <th> รหัสวัสดุ </th>
                                            <th style="width:200px;"> ชื่อวัสดุ </th>
                                            <th> ประเภทวัสดุ </th>
                                            <th> ราคาต้นทุน(บาท) </th>
                                            <th> จำนวนคงเหลือ </th>
                                            <th> หน่วยนับ </th>
                                            <th> มูลค่า(บาท) </th>
                                            <th> จัดการ </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($materials)
                                            @foreach ($materials as $key => $material)
                                                <tr>
                                                    <td> {{ ++$key }} </td>
                                                    <td> {{ $material->mateID ?? '' }}</td>
                                                    <td>
                                                        <div class="center">
                                                            <img src="storage/mateImage/{{ $material->mateImage }} "
                                                                width="100px" alt=" ไม่มีรูปภาพ ">
                                                        </div> <br>
                                                        {{ $material->mate_name ?? '' }} <br>
                                                        <span
                                                            class="right badge badge-{{ $material->mate_status ? 'success' : 'danger' }}">{{ $material->mate_status ? 'เบิกได้' : 'รอจัดซื้อ' }}</span>
                                                        <span
                                                            class="right badge badge-{{ $material->mate_note ? 'primary' : 'warning' }}">{{ $material->mate_note ? 'ไม่ต้องส่งคืน' : 'ต้องส่งคืน' }}</span>
                                                    </td>
                                                    <td> {{ $material->category->cate_name ?? '' }}</td>
                                                    <td> {{ $material->mate_price ?? '' }} </td>
                                                    <td> {{ $material->mate_amount ?? '' }} </td>
                                                    <td> {{ $material->mate_unit ?? '' }} </td>
                                                    <td> {{ number_format($material->mate_amount * $material->mate_price, 2) ?? '' }}
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('materials.edit', $material->id ?? '') }} "
                                                            class="btn btn-sm btn- btn-warning">
                                                            <i data-feather="edit"></i> แก้ไข </a>
                                                        <a class="btn btn-success btn-sm"
                                                            href="{{ route('materials.show', $material->id ?? '') }}">
                                                            <i data-feather="monitor"></i> แสดง </a>
                                                        </a>
                                                        <a href="javascript:;" class="btn btn-sm btn-danger sa-delete"
                                                            data-form-id="material-delete-{{ $material->id }}">
                                                            <i data-feather="trash-2"></i> ลบ </a>
                                                        <form id="material-delete-{{ $material->id ?? '' }}"
                                                            action="{{ route('materials.destroy', $material->id ?? '') }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                    </td>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div><!-- /.card -->
                        <!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content -->
            </div>
        </div>


        <!-- Stock -->
        <div class="modal fade" id="Stock" aria-hidden="true" role="dialog">
            <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title "> <b> วัสดุที่สามารถเบิกได้</b></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <table id="material" style="width:100%" class="table table-bordered datatable">

                                <thead>
                                    <tr>
                                        <th style="width:1px;"> ลำดับ </th>
                                        <th> รายการ </th>
                                        <th> รูปภาพ </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($InStock)
                                        @foreach ($InStock as $key => $material)
                                            <tr>
                                                <td> {{ ++$key }} </td>
                                                <td>
                                                    {{ $material->mate_name ?? '' }} <br> 
                                                    <b> รหัสวัสดุ :  </b>{{ $material->mateID ?? '' }} <br>
                                                    <b> ประเภทวัสดุ : </b>{{ $material->category->cate_name ?? '' }}<br>
                                                    <b> ราคาต้นทุน :  </b>{{ $material->mate_price ?? '' }} บาท<br>
                                                    <b> จำนวนคงเหลือ :</b> <span class="badge bg-success rounded-pill"> {{ $material->mate_amount ?? '' }} </span> <b> หน่วยนับ : </b> {{ $material->mate_unit ?? '' }}<br>
                                                    <b> มูลค่า : </b>{{ number_format($material->mate_amount * $material->mate_price, 2) ?? '' }} บาท<br>
                                                    <span
                                                        class="right badge badge-{{ $material->mate_status ? 'success' : 'danger' }}">
                                                        {{ $material->mate_status ? 'เบิกได้' : 'รอจัดซื้อ' }}</span>
                                                    <span
                                                        class="right badge badge-{{ $material->mate_note ? 'primary' : 'warning' }}">
                                                        {{ $material->mate_note ? 'ไม่ต้องส่งคืน' : 'ต้องส่งคืน' }}</span>

                                                </td>
                                                <td>
                                                    <div class="center">
                                                        <img src="storage/mateImage/{{ $material->mateImage }} "
                                                            width="100px" alt=" ไม่มีรูปภาพ ">
                                                    </div> <br>
                                                
                                                </td>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>

                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary " data-dismiss="modal">
                            ปิด
                        </button>
                    </div>
                </div>
            </div><!-- /.card -->
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
    </div>
    </div>



        <!--min Stock -->
        <div class="modal fade" id="minStock" aria-hidden="true" role="dialog">
            <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title "> <b> วัสดุที่ใกล้หมด</b></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <table id="material" style="width:100%" class="table table-bordered datatable">

                                <thead>
                                    <tr>
                                        <th style="width:1px;"> ลำดับ </th>
                                        <th> รายการ </th>
                                        <th> รูปภาพ </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($minStock)
                                        @foreach ($minStock as $key => $material)
                                            <tr>
                                                <td> {{ ++$key }} </td>
                                                <td>
                                                    {{ $material->mate_name ?? '' }} <br> 
                                                    <b> รหัสวัสดุ :  </b>{{ $material->mateID ?? '' }} <br>
                                                    <b> ประเภทวัสดุ : </b>{{ $material->category->cate_name ?? '' }}<br>
                                                    <b> ราคาต้นทุน :  </b>{{ $material->mate_price ?? '' }} บาท<br>
                                                    <b> จำนวนคงเหลือ :</b>   <span class="badge bg-warning rounded-pill"> {{ $material->mate_amount ?? '' }} </span>  <b> หน่วยนับ : </b> {{ $material->mate_unit ?? '' }} <br>
                                                    <b> มูลค่า : </b>{{ number_format($material->mate_amount * $material->mate_price, 2) ?? '' }} บาท<br>
                                                    <span
                                                        class="right badge badge-{{ $material->mate_status ? 'success' : 'danger' }}">
                                                        {{ $material->mate_status ? 'เบิกได้' : 'รอจัดซื้อ' }}</span>
                                                    <span
                                                        class="right badge badge-{{ $material->mate_note ? 'primary' : 'warning' }}">
                                                        {{ $material->mate_note ? 'ไม่ต้องส่งคืน' : 'ต้องส่งคืน' }}</span>

                                                </td>
                                                <td>
                                                    <div class="center">
                                                        <img src="storage/mateImage/{{ $material->mateImage }} "
                                                            width="100px" alt=" ไม่มีรูปภาพ ">
                                                    </div> <br>
                                                
                                                </td>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>

                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary " data-dismiss="modal">
                            ปิด
                        </button>
                    </div>
                </div>
            </div><!-- /.card -->
            <!-- /.row -->
        </div><!-- /.container-fluid -->


    </div>
    <!-- /.content -->
    </div>
    </div>


        <!-- Out Stock -->
        <div class="modal fade" id="Outstock" aria-hidden="true" role="dialog">
            <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title "> <b> วัสดุที่ไม่สามารถเบิกได้</b></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <table id="material" style="width:100%" class="table table-bordered datatable">

                                <thead>
                                    <tr>
                                        <th style="width:1px;"> ลำดับ </th>
                                        <th> รายการ </th>
                                        <th> รูปภาพ </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($Outstock)
                                        @foreach ($Outstock as $key => $material)
                                            <tr>
                                                <td> {{ ++$key }} </td>
                                                <td>
                                                    {{ $material->mate_name ?? '' }} <br> 
                                                    <b> รหัสวัสดุ :  </b>{{ $material->mateID ?? '' }} <br>
                                                    <b> ประเภทวัสดุ : </b>{{ $material->category->cate_name ?? '' }}<br>
                                                    <b> ราคาต้นทุน :  </b>{{ $material->mate_price ?? '' }} บาท<br>
                                                    <b> จำนวนคงเหลือ :</b>   <span class="badge bg-danger rounded-pill"> {{ $material->mate_amount ?? '' }} </span>  <b> หน่วยนับ : </b> {{ $material->mate_unit ?? '' }} <br>
                                                    <b> มูลค่า : </b>{{ number_format($material->mate_amount * $material->mate_price, 2) ?? '' }} บาท<br>
                                                    <span
                                                        class="right badge badge-{{ $material->mate_status ? 'success' : 'danger' }}">
                                                        {{ $material->mate_status ? 'เบิกได้' : 'รอจัดซื้อ' }}</span>
                                                    <span
                                                        class="right badge badge-{{ $material->mate_note ? 'primary' : 'warning' }}">
                                                        {{ $material->mate_note ? 'ไม่ต้องส่งคืน' : 'ต้องส่งคืน' }}</span>

                                                </td>
                                                <td>
                                                    <div class="center">
                                                        <img src="storage/mateImage/{{ $material->mateImage }} "
                                                            width="100px" alt=" ไม่มีรูปภาพ ">
                                                    </div> <br>
                                                
                                                </td>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>

                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary " data-dismiss="modal">
                            ปิด
                        </button>
                    </div>
                </div>
            </div><!-- /.card -->
            <!-- /.row -->
        </div><!-- /.container-fluid -->


    </div>
    <!-- /.content -->
    </div>
    </div>





    <!-- Modal Edit Category  -->
    <div class="modal fade" id="editStock" aria-hidden="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title "> <b> ปรับยอดจำนวนคงเหลือในคลัง </b></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>


                <form role="form" action="{{ route('materials.update', $material->id ?? '') }}" method="PUT">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="materials"> จำนวนคงเหลือ </label>
                            <input name="mate_amount" id="mate_amount" type="int" class="form-control"
                                placeholder=" จำนวนคงเหลือ " value="{{ $material->mate_amount ?? '' }}">
                            @if ($errors->has('mate_amount'))
                                <span class="text-danger"> {{ $errors->first('mate_amount') }}</span>
                            @endif
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary " data-dismiss="modal">
                            ยกเลิก
                        </button>
                        <button type="submit" class="btn btn-primary "> <i data-feather="save"></i> บันทึก </button>
                    </div>
            </div>
        </div>
    </div><!-- /.card -->
    <!-- /.row -->
    </div><!-- /.container-fluid -->


@endsection
