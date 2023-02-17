@extends('layouts.masterSpo')
@section('content')
 <!-- Ionicons -->
 <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> ปรับยอดวัสดุในคลัง </h1><br>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href=" #"> หน้าหลัก </a></li>
                        <li class="breadcrumb-item active"> ปรับยอดวัสดุในคลัง </li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->

             <!-- Small boxes (Stat box) -->
           
                

            <!-- Small boxes (Stat box) -->
            <div class="row container-fluid ">
                <div class="col-lg-3 col-3">
                    <!-- small box -->
                    <div class="small-box bg-Primary">
                        <div class="inner">
                            <h3>   บาท   </h3>
                            <p> มูลค่ารวมทั้งหมด </p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-cash"></i>
                        </div>
                        <a href="#" class="small-box-footer"> ข้อมูลเพิ่มเติม 
                            <i data-feather="arrow-right-circle"></i> </a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-3">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3> {{ count($materials->toArray()) }} </h3>
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
                <div class="col-lg-3 col-3">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3> {{ count($materials->toArray()) }} <sup style="font-size: 20px"></sup></h3>

                            <p> วัสดุที่สามารถเบิกได้ </p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-checkmark-circled"></i>
                        </div>
                        <a href="#" class="small-box-footer"> ข้อมูลเพิ่มเติม <i data-feather="arrow-right-circle"></i> </a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-3">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3> {{ $materialsGroupByMate_Amount["materialsGroupByMate_Amount =2"] ?? '0' }} </h3>

                            <p>วัสดุที่ใกล้หมด</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-plus-circled"></i>
                        </div>
                        <a href="#" class="small-box-footer"> ข้อมูลเพิ่มเติม <i data-feather="arrow-right-circle"></i> </a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-3">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3> 0</h3>

                            <p>วัสดุที่ไม่สามารถเบิกได้</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-close-circled"></i>
                        </div>
                        <a href="#" class="small-box-footer"> ข้อมูลเพิ่มเติม <i data-feather="arrow-right-circle"></i> </a>
                    </div>
                </div>
                <!-- ./col -->
            </div>


        </div><!-- /.container-fluid -->
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card card-primary card-outline">
                        <div class="card-body">
                            <h5 class="card-title"> เพิ่มรายการวัสดุ</h5><br>

                            <a href="{{ route('materials.create') }}" class="btn btn-sm btn-info">
                                <i data-feather="plus-square"></i> เพิ่มรายการวัสดุ </a><br><br>
                            <example-comnent></example-comnent>

                            @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif

                            <table id="datatable-export" class="table table-bordered datatable">
                                <thead>
                                    <tr>
                                        <th style="width:1px;"> ลำดับ </th>
                                        <th> รหัสวัสดุ </th>
                                        <th> ชื่อวัสดุ </th>
                                        <th> รูปภาพ </th>
                                        <th> หมวดหมู่วัสดุ </th>
                                        <th> ราคาต้นทุน(บาท) </th>
                                        <th> หน่วยนับ </th>
                                        <th> จำนวนคงเหลือ </th>
                                        <th> มูลค่า(บาท) </th>
                                        <th style="width:50px;" > จัดการ </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($materials)
                                    @foreach ($materials as $key => $material)
                                        <tr>
                                            <td> {{ ++$key }} </td>
                                            <td> {{ $material->mateID ?? ''  }}</td>
                                            <td>
                                                {{ $material->mate_name ?? ''  }} <br>
                                                <span class="right badge badge-{{  $material->mate_status  ? 'success' : 'danger' }}">{{ $material->mate_status  ? 'เบิกได้' : 'รอจัดซื้อ'}}</span>
                                                <span class="right badge badge-{{  $material->mate_note  ? 'primary' : 'warning' }}">{{ $material->mate_note  ? 'ไม่ต้องส่งคืน' : 'ต้องส่งคืน'}}</span>
                                            </td>
                                            <td><img src="storage/mateImage/{{ $material->mateImage }} " width="100px" alt=" ไม่มีรูปภาพ " ></td>
                                            <td> {{ $material->category->cate_name ?? '' }}</td>
                                            <td> {{ $material->mate_price ?? ''  }} บาท </td>
                                            <td> {{ $material->mate_unit ?? ''  }} </td>
                                            <td> {{ $material->mate_amount ?? ''  }} {{ $material->mate_unit ?? ''  }} </td>
                                            <td> {{ $material->mate_amount*$material->mate_price ?? ''  }} บาท  </td>
                                             
                                            <td>

                                                <a href="#editStock" data-toggle="modal" type="submit"
                            class="btn btn-info btn-sm ">  
                            <i data-feather="refresh-cw"></i> ปรับ  </a>

                                                 
                                                    
                                                <a href="{{ route('materials.edit', $material->id) }} "
                                                    class="btn btn-sm btn- btn-warning">
                                                    <i data-feather="edit"></i> แก้ไข  </a>
                                                    <a class="btn btn-success btn-sm"
                                                href="{{ route('materials.show', $material->id) }}">
                                                <i data-feather="monitor"></i> แสดง </a>
                                            </a>
                                                <a href="javascript:;" class="btn btn-sm btn-danger sa-delete"
                                                    data-form-id="material-delete-{{ $material->id }}">
                                                    <i data-feather="trash-2"></i> ลบ </a>
                                                <form id="material-delete-{{ $material->id }}"
                                                    action="{{ route('materials.destroy', $material->id) }}" method="POST">
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


                <!-- Modal Edit Category  -->
                <div class="modal fade" id="editStock" aria-hidden="true" role="dialog">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title "> <b> ปรับยอดจำนวนคงเหลือในคลัง </b></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>

                            </div>
 

                            <form role="form" action="{{ route('materials.update', $material->id) }}" method="PUT">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="materials"> จำนวนคงเหลือ </label>
                                        <input name="mate_amount" id="mate_amount" type="int" class="form-control"
                                        placeholder=" จำนวนคงเหลือ " value="{{ $material->mate_amount }}">
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
                    </div><!-- /.card -->
                    <!-- /.row -->
                </div><!-- /.container-fluid -->


@endsection
