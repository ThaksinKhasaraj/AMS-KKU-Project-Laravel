@extends('layouts.masterSpo')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> รายละเอียดวัสดุ </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href=" {{ route('materials.index') }} "> หน้าหลัก </a></li>
                        <li class="breadcrumb-item active"> รายการวัสดุ </li>
                    </ol>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-7">
                    <div class="card card-orange card-outline">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12 margin-tb">
                                    <div class="pull-left">
                                        <div class="pull-right">
                                            
                                            <a class="btn btn-secondary" href="{{ route('materials.index') }}"> <i data-feather="arrow-left-circle"></i> ย้อนกลับ
                                            </a><br>
                                        </div>
                                    </div>
                                </div>
                            </div><br>

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong> รหัสวัสดุ : </strong>
                                        {{ $material->mateID ??'' }}
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong> ชื่อวัสดุ : </strong>
                                        {{ $material->mate_name ??'' }}
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong> หมวดหมู่วัสดุ : </strong>
                                        {{ $material->category->cate_name ??'' }}

                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong> จำนวนคงเหลือ : </strong>
                                        {{ $material->mate_amount ??'' }}
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong> หน่วยนับ : </strong>
                                        {{ $material->mate_unit ??'' }}
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong> ราคาต้นทุน/หน่วยนับ : </strong>
                                        {{ $material->mate_price ??'' }}
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong> สถานะ : </strong>
                                        <span class="right badge badge-{{  $material->mate_status  ? 'success' : 'danger' }}">{{ $material->mate_status  ? 'เบิกได้' : 'รอจัดซื้อ'}}</span>

                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong> หมายเหตุ : </strong>
                                        <span class="right badge badge-{{  $material->mate_note  ? 'primary' : 'warning' }}">{{ $material->mate_note  ? 'ไม่ต้องส่งคืน' : 'ต้องส่งคืน'}}</span>

                                    </div>
                                </div>


                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong> รายละเอียดวัสดุ :  </strong>
                                        {{ $material->mate_detail ??'' }}
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong> วันที่รับเข้า : </strong>
                                        {{ $material->created_at->thaidate('j F Y') ?? '' }}
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong> วันที่อัพเดตยอดจำนวนคงเหลือ : </strong>
                                        {{ $material->updated_at->thaidate('j F Y') ?? '' }}
                                    </div>
                                </div>

                            </div>
                        </div> <!-- /.card-body -->

                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
                <div class="col-lg-4">
                    <div class="card h-300">
                        <div class="card-body">
                            <strong> รูปภาพ : </strong>
                                <img src="/storage/mateImage/{{ $material->mateImage }}" width="300px">

                        </div>
                    </div>
                </div>
            </div>
            <!-- /.content -->
        </div>
    </div>
@endsection
