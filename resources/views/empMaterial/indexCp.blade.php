@extends('layouts.masterEmp')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> รายการวัสดุ </h1><br>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href=" ">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active">รายการวัสดุ</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.row -->
    </div><!-- /.row -->


    <div class="container">
        <div class="row">
        <div class="col-lg-12">
            <div class="row">
            <div class="card-deck">
                <div class="card">
                    
                        @if ($materials)
                            @foreach ($materials as $key => $material)
                                {{ ++$key }}
                                
                                 <img {{ $material->mateImage }} > </div>
                                <div class="card-body">
                                    <h4 class="card-title"> {{ $material->mateName }} </h4>
                                    <h6> {{ $material->mateID }}</h6>
                                    <p class="card-text"> {{ $material->matePrice }} {{ $material->mateUnit }} </p>
                                </div>
                                <a type="submit" class="btn btn-primary btn-sm ">
                                    <i data-feather="shopping-bag"></i> เพิ่มลงตระกร้า </a>
                                <a href=" {{ route('empMaterial.show', $material->id) }} "
                                    class="btn btn-secondary btn-sm">
                                    <i data-feather="eye"></i> รายละเอียด </a>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    

@endsection
