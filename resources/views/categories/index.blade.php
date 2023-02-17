@extends('layouts.masterSpo')
@section('content')



<div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> ประเภทวัสดุ </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('Supplyofficer.index') }}"> หน้าหลัก </a></li>
                        <li class="breadcrumb-item active"> ประเภทวัสดุ </li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card card-orange card-outline">
                        <div class="card-body">
                            <a href="#addCategory" data-toggle="modal" type="submit"
                            class="btn btn-info btn-sm ">  
                                <i data-feather="plus-square"></i> เพิ่มประเภทวัสดุ </a><br><br>
                            <example-comnent> </example-comnent>
                            <table id="example" class="table table-bordered datatable">
                                <thead>
                                    <tr>
                                        <th> ลำดับ </th>
                                        <th> ชื่อประเภทวัสดุ </th>
                                        <th> จัดการ </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($categories)
                                        @foreach ($categories as $key => $category)
                                            <tr>
                                                <td> {{ ++$key }} </td>
                                                <td> {{ $category->cate_name ?? '' }}</td>
                                                <td>
                                                    <a href="{{ route('categories.edit', $category->id ??'') }} " 
                                                        class="btn btn-sm btn- btn-warning">
                                                        <i data-feather="edit"></i> แก้ไข </a>

                                                    <a href="javascript:;" class="btn btn-sm btn-danger sa-delete"
                                                        data-form-id="category-delete-{{ $category->id ??'' }}">
                                                        <i data-feather="trash-2"></i> ลบ </a>

                                                    <form id="category-delete-{{ $category->id ??'' }}"
                                                        action="{{ route('categories.destroy', $category->id ??'') }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach

                                    @endif
                                </tbody>

                            </table>


                        </div>
                    </div><!-- /.card -->
                    <!-- /.row -->
                </div><!-- /.container-fluid -->


                 <!-- Modal Create Category  -->
                 <div class="modal fade" id="addCategory" aria-hidden="true" role="dialog">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title "> <b> เพิ่มประเภทวัสดุ </b></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>

                            </div>
 

                            <form role="form" action="{{ route('categories.store') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="categories"> ชื่อประเภทวัสดุ </label>
                                        <input name="cate_name" id="cate_name" type="text" class="form-control"
                                            placeholder="กรุณากรอกชื่อประเภทวัสดุ">
                                        @if ($errors->has('cate_name'))
                                            <span class="text-danger"> {{ $errors->first('cate_name') }}</span>
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
                

            </div>
            <!-- /.content -->
        </div>
    </div>


     
       
            

@endsection
