@extends('layouts.masterSpo')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> แก้ไขวัสดุ </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"> <a href="{{ route('materials.index') }}"> หน้าหลัก </a> </li>
                        <li class="breadcrumb-item active"> แก้ไขวัสดุ </li>
                    </ol>

                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-orange card-outline">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12 margin-tb">
                                    <div class="pull-left">
                                        <div class="pull-right">
                                            <a class="btn btn-secondary" href="{{ route('materials.index') }}"> <i data-feather="arrow-left-circle"></i>  ย้อนกลับ
                                            </a><br>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <strong> มีข้อผิดพลาด! </strong> โปรดตรวจสอบข้อมูลที่คุณกรอก ก่อนทำรายการ<br><br>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="{{ route('materials.update' , $material->id ??'' ) }}" method="POST" enctype="multipart/form-data"><br> 
                                @csrf
                                @method('PUT')
                               
                                <form>
                                    <div class="form-row">
                                        <div class="form-group col-md-2">
                                            <label> รหัสวัสดุ : <span class="text-danger">*</span> </label>

                                            <input type="int" class="form-control" name="mateID"
                                                placeholder="รหัสวัสดุ" value="{{ old('mateID',$material->mateID ??'' ) }}">

                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="input"> ชื่อวัสดุ : <span class="text-danger">*</span> </label>
                                            <input type="text" class="form-control" name="mate_name"
                                                placeholder="ชื่อวัสดุ" value="{{ old('mate_name',$material->mate_name ??'' ) }}">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label> ประเภทวัสดุ : <span class="text-danger">*</span> </label>
                                            <select name="category" id="category" class="form-control">
                                                <option selected> เลือก...</option>

                                                @foreach ($category as $category)

                                                <option 
                                                @if ($material->category->id ??'' == $category->id ??'') selected 
                                                @endif
                                                    value="{{ old('category',$category->id ??'' ) }}">{{ $category->cate_name ??'' }}</option>
                                                @endforeach


                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-5">
                                            <label> วันที่รับเข้า :  </label>
                                            <input type="text" class="form-control" name="create_at"  
                                            value="{{ old('create_at', $material->created_at ??'' ) }}" readonly  >
                                        </div>
                                        <div class="form-group col-md-5">
                                            <label> วันที่อัพเดตยอดจำนวนคงเหลือ :  </label>
                                            <input type="text" class="form-control" name="updated_at"  
                                            value="{{ old('updated_at', $material->updated_at ??'' ) }}" readonly  >
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-2">
                                            <label> จำนวนคงเหลือ : <span class="text-danger">*</span> </label>
                                            <input type="float" class="form-control" name="mate_amount" placeholder="0"
                                            value="{{ old('mate_amount',$material->mate_amount ??'' ) }}" >
                                        </div> 
                                        <div class="form-group col-md-2">
                                            <label> ราคาต้นทุน/หน่วย : <span class="text-danger">*</span> </label>
                                            <input type="float" class="form-control" name="mate_price" placeholder="0"
                                            value="{{ old('mate_price',$material->mate_price ??'' ) }}">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label> หน่วยนับ : <span class="text-danger">*</span> </label>
                                            <input type="text" class="form-control" name="mate_unit"
                                                placeholder="หน่วยนับ" value="{{ old('mate_unit',$material->mate_unit ??'' ) }}">
                                        </div>

                                        <div class="form-group col-md-2">
                                            <label for="mate_status"> สถานะ : <span class="text-danger">*</span></label>
                                            <select name="mate_status" class="form-control   @error('mate_status') is-invalid @enderror" id="mate_status">
                                                <option value="1" {{ old('mate_status') === 1 ? 'selected' : ''}}> เบิกได้ </option>
                                                <option value="0" {{ old('mate_status') === 0 ? 'selected' : ''}}> รอจัดซื้อ </option>
                                            </select>
                                            @error('mate_status')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror

                                        </div>

                                        <div class="form-group col-md-2">
                                            <label for="mate_note"> หมายเหตุ : <span class="text-danger">*</span></label>
                                            <select name="mate_note" class="form-control   @error('mate_note') is-invalid @enderror" id="mate_note">
                                                <option value="1" {{ old('mate_note') === 1 ? 'selected' : ''}}>  ไม่ต้องส่งคืน </option>
                                                <option value="0" {{ old('mate_note') === 0 ? 'selected' : ''}}>  ต้องส่งคืน </option>
                                            </select>
                                            @error('mate_note')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror

                                        </div>

                                        <div class="col-xs-5 col-sm-5 col-md-5">
                                            <div class="form-group">
                                                <strong> รายละเอียด : </strong>
                                                <textarea class="form-control" style="height:90px" name="mate_detail"> {{ old('mate_detail', $material->mate_detail ??'' ) }} </textarea>
                                            </div>

                                            
                                        </div>

                                        {{-- <div class="form-row">
                                            <strong text-center > อัพโหลดรูปภาพ : <span class="text-danger"> * </span> </strong>
        
                                            <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail img-raised">
                                                    <img id="blah" src="http://placehold.it/180"   width="150px" alt="">
                                                    <img src="/storage/mateImage/{{ $material->mateImage }}" width="150px">
                                                </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail img-raised"></div>
                                                <div><br>
                                                    <span class="btn btn-raised btn-round btn-default btn-file">
                                                        <span class="fileinput-new"> เลือกรูปภาพ </span>
                                                        <input type="hidden" value="{{ $material->mateImage }}" name="mateImage" class="form-control" onchange="readURL(this);" />
                                                        
                                                    </span>
                                                    
                                                </div>
                                            </div>
                                        </div> --}}

                                            
                                        </div><br><br><br>

                                        
                                        <div class="col-xs-12 col-sm-12 col-md-12 ">
                                            <button type="submit" class="btn btn-primary"> <i data-feather="save"></i>
                                                บันทึก</button>
                                            <button type="reset" class="btn btn-danger"> <i
                                                    data-feather="refresh-ccw"></i> รีเช็ท</button>

                                        </div>

                                </form>
                        </div>
                    </div><!-- /.card -->
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
    </div>
    
    
@endsection


 