@extends('layouts.masterSpo')
@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-12">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> หน่วยงาน/สาขาวิชา </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('Supplyofficer.index') }}">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active">หน่วยงาน/สาขาวิชา</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    
    @if ($errors->any())
    <div class="alert alert-danger">
        <strong> มีข้อผิดพลาด! </strong> โปรดตรวจสอบข้อมูลที่คุณกรอก ก่อนทำรายการใหม่อีกครั้ง <br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    
                    <div class="card card-orange card-outline">
                        <div class="card-body">

                            <a href="#addDepartments" data-toggle="modal" type="submit"
                            class="btn btn-info btn-sm ">  
                                <i data-feather="plus-square"></i> หน่วยงาน/สาขาวิชา </a><br><br>
                            <example-comnent></example-comnent>

                            <table class="table table-bordered datatable">
                                <thead>
                                    <tr>
                                        <th> ลำดับ </th>
                                        <th> หน่วยงาน/สาขาวิชา </th>
                                        <th> ชื่อหัวหน้าหน่วยงาน/สาขาวิชา </th>
                                        <th> ที่อยู่ </th>
                                        <th> จัดการ </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($departments)
                                        @foreach ($departments as $key => $department)
                                            <tr>
                                                <td> {{ ++$key }}</td>
                                                <td> {{ $department->dept_name ?? '' }}</td>
                                                <td> {{ $department->manager_name ?? '' }}</td>
                                                <td> {{ $department->dept_address ?? '' }}</td>
                                                <td>
                                                    <a href="{{ route('departments.edit', $department->id ??'') }} "
                                                        class="btn btn-sm btn- btn-warning">
                                                        <i data-feather="edit"></i> แก้ไข </a>

                                                    <a href="javascript:;" class="btn btn-sm btn-danger sa-delete"
                                                        data-form-id="department-delete-{{ $department->id ?? '' }}">
                                                        <i data-feather="trash-2"></i> ลบ </a>

                                                    <form id="department-delete-{{ $department->id ?? '' }}"
                                                        action="{{ route('departments.destroy', $department->id ?? '') }}"
                                                        method="POST">
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


                <!-- Add Modal -->
                <div class="modal fade" id="addDepartments" aria-hidden="true" role="dialog">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title "> <b> เพิ่มหน่วยงาน/สาขาวิชา </b></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>

                            </div>

                                <div class="modal-body">

                                    <div class="row form-row">
                                        <div class="col-12">
                                            <div class="form-group">

                                                
                                                <form role="form" action="{{ route('departments.store') }}"
                                                    method="POST">
                                                    @csrf
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <label> หน่วยงาน/สาขาวิชา <span class="text-danger">*</span> </label>
                                                            <input name="dept_name" id="dept_name" type="text" class="form-control"
                                                                placeholder="กรุณากรอกชื่อหน่วยงาน/สาขาวิชา"><br>

                                                            <label> ชื่อหัวหน้าหน่วยงาน/สาขาวิชา <span class="text-danger">*</span> </label>
                                                                <input name="manager_name" id="manager_name" type="text" class="form-control"
                                                                    placeholder="กรุณากรอกชื่อหัวหน้าหน่วยงาน/สาขาวิชา"><br>

                                                            <label> ที่อยู่ <span class="text-danger">*</span> </label>
                                                            <textarea class="form-control" style="height:100px" name="dept_address"></textarea>

                                                            @if ($errors->has('dept_name' ?? ''))
                                                                <span class="text-danger">
                                                                    {{ $errors->first('dept_name' ?? '') }}</span>
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

                                                </form>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <!-- /.row -->
                        </div><!-- /.container-fluid -->
                    </div>
                </div>
            </div>
        </div>
    </div>




        @endsection
