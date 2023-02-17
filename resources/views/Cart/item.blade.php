@extends('layouts.masterEmp')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> รอส่งใบเบิก </h1><br>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href=" # ">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active"> รอส่งใบเบิก </li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.row -->
    </div><!-- /.row -->
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Small boxes (Stat box) -->
    <div class="row container-fluid text-center">
        <div class="col-lg-3 col-6 ">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>0</h3>
                    <p> เบิกทั้งหมด </p>
                </div>
                <div class="icon">
                    <i class="ion-ios-cloud-upload"></i>      
                </div>
                <a href="#" class="small-box-footer">More info <i data-feather="arrow-right-circle"></i> </a>
            </div>
        </div>

        <!-- ./col -->
        <div class="col-lg-3 col-6 bg-center">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3> 0</h3>

                    <p> อนุมัติ </p>
                </div>
                <div class="icon">
                    <i class="ion-android-checkbox-outline"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i data-feather="arrow-right-circle"></i> </a>
            </div>
        </div>
        <!-- ./col -->

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
                                            <a class="btn btn-secondary" href="#"> <i data-feather="arrow-left-circle"></i>
                                                ย้อนกลับ
                                            </a><br>
                                        </div>
                                    </div>
                                </div>
                            </div><br>

                            @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif
                            <div>

                                <div class="card border-0 shadow-sm">
                                    <div class="card-body">
                                        <div>
                                           
                                            <div class="form-group">
                                                <label for="customer_id"> <h4> สรุปรายการขอเบิก </h4> </label>
                                                
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <a href=" # " class="btn btn-primary">
                                                            <i class="bi bi-briefcase-fill"></i>
                                                        </a>
                                                    </div>
                                                    <input type="text" class="form-control" name="deptName"
                                                placeholder="เบิกในนาม..." value=""> 
                                                </div>
                                            </div>
                            
                                            @foreach ($empcarts as $empcart )
                                                
                                          
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                    <tr class="text-center">
                                                        <th class="align-middle"> วัสดุ </th>
                                                        <th class="align-middle"> ราคา </th>
                                                        <th class="align-middle"> จำนวน </th>
                                                        <th class="align-middle"> Action </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    
                                                            <tr>
                                                                <td class="align-middle">
                                                                      <br>
                                                                      {{ $material->mateName }}
                                                                </td>
                            
                                                                <td class="align-middle">
                                                                    
                                                                </td>
                            
                                                                <td class="align-middle">
                                                                    
                                                                </td>
                            
                                                                <td class="align-middle text-center">
                                                                    <a href="#" wire:click.prevent=" ">
                                                                        <i class="bi bi-x-circle font-2xl text-danger"></i>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                       
                                                        <tr>
                                                            <td colspan="8" class="text-center">
                                                    <span class="text-danger">
                                                        กรุณาค้นหาวัสดุ & เลือกวัสดุที่ต้องการขอเบิก!
                                                    </span>
                                                            </td>
                                                        </tr>
                                                    
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        @endforeach
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="table-responsive">
                                                    <table class="table table-striped">
                                                        
                                                        <tr class="text-primary">
                                                            <th> ยอดรวมสุทธิ </th>
                                                             
                                                            <th>
                                                                
                                                            </th>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                            
                                        <div class="form-group d-flex justify-content-center flex-wrap mb-0">
                                            <button wire:click="resetCart" type="button" class="btn btn-pill btn-danger mr-3"><i class="bi bi-x"></i> รีเช็ท </button>
                                            <button wire:loading.attr="disabled" wire:click="proceed" type="button" class="btn btn-pill btn-primary"  ><i class="bi bi-check"></i> ส่งใบเบิก </button>
                                        </div>
                                    </div>
                                </div>
                        </div><!-- /.card -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
