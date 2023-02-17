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
                        <li class="breadcrumb-item"><a href=" #"> หน้าหลัก </a></li>
                        <li class="breadcrumb-item active">รายการวัสดุ</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.row -->
    </div><!-- /.row -->

    @if (session()->has('message'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <div class="alert-body">
                <span>{{ session('message') }}</span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        </div>
    @endif

    <div class="content">
        <div class="container-fluid">

            <div class="row">

                <div class="col-lg-12">
                    <div class="card card-pink card-outline">
                        <div class="card-body">

                            <div>
                                <div class="form-row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                           
                                            <label> รายการวัสดุตามหมวดหมู่ </label>
                                            <select class="form-control" name="cateName">
                                                <option selected>เลือกทั้งหมด...</option>
                                                {{-- @foreach ($material->category as $category)
                                                    <option value="{{ $material->category->category_id }}">{{ $category->cate_name }}</option>
                                                @endforeach --}}
                                            </select>  

                                        </div>
                                    </div>

                                </div>
                            </div>

                           
                            <table class="table table-bordered datatable">
                                <thead>
                                    <tr>
                                        <th> ลำดับ </th>
                                        <th> รหัสวัสดุ </th>
                                        <th> หมวดหมู่วัสดุ </th>
                                        <th> รายการวัสดุ </th>
                                        <th> รูปภาพ </th>
                                        <th> หน่วยนับ </th>
                                        <th> จัดการ </th>
                                    </tr>

                                    
                                </thead>
                                        <tbody>
                                            @if ($materials)
                                                @foreach ($materials as $key => $material )
                                                    <tr>
                                                        <td> {{ ++$key }} </td>
                                                        <td> {{ $material->mateID }} </td>
                                                        <td>{{ $material->category->cate_name ?? '' }}</td>
                                                        <td> {{ $material->mate_name }} </td>
                                                        <td> <img src="storage/mateImage/{{ $material->mateImage }}" width="50px" alt="">  </td>
                                                        <td> {{ $material->mate_unit }} </td>
                                                        
                                                        <td>
                                                            <form action="{{ route('empCart.store') }}" method="POST" enctype="multipart/form-data">
                                                                <input type="hidden" name="material_id" placeholder="" value="{{ $material->id }}">
                                                                <br>
                                                                @csrf
                                                                <input type="hidden"
                                                                                value=" {{ $material->mateID }} "
                                                                                name="mateID">
                                                                                <input type="hidden"
                                                                                value=" {{ $material->mateName }} "
                                                                                name="mateName">

                                                                                
                                                           
                                                        <div class="col-xs-12 col-sm-12 col-md-12 ">
                                                            <button type="submit" class="btn btn-info btn-sm" >
                                                                <i data-feather="shopping-bag"></i> เลือก 
                                                                 </button>

                                                                 <a href=" {{ route('empMaterial.show', $material->id) }} "
                                                                    class="btn btn-secondary btn-sm">
                                                                    <i data-feather="eye"></i> รายละเอียด</a>
                                                        
                                                        </div>
                                                    </form>  
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

    

@endsection
