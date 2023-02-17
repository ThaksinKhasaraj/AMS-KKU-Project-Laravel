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
                        <li class="breadcrumb-item"><a href=" # ">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active">รายการวัสดุ</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.row -->
    </div><!-- /.row -->

    <div class="container">
              <div class="searchwrapper">
                <div class="searchbox">
                  <div class="row">
                 
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="keyword" autocomplete="off" value="{{ $keyword ?? '' }}"  placeholder=" ค้นหาวัสดุ ">
                
                    </div>
                    
                    <div class="col-md-5">
                      <select class="form-control" name="category" >
                        <option > ค้นหาวัสดุตามหวดหมู่ </option>
                            @foreach($categories as $category)
                            <option > {{ $category->cate_name }}</option>
                            @endforeach
                      </select>

                    </div>
                    <div class="col-md-1">
                        <input type="button" class="btn btn-primary" class="form-control" value=" ค้นหา ">
                    </div>
                  </div>
                </div>
              </div><br><br>
              
           
        <div class="row">
            <div class="col-14">
                <div class="row">
                    @foreach ($materials as $material)
                        <div class="col col-auto">
                            <form action="{{ route('Cart.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="material_id" placeholder="" value="{{ $material->id }}">
                                <div class="card" style="width: 17rem;">
                                    <div class="card-body">
                                        <img href="#mate_detail" data-toggle="modal" type="submit" src="storage/mateImage/{{ $material->mateImage }}" style="height: 200px"/>
                                         <br><br>
                                         
                                      <h5 href="#mate_detail" data-toggle="modal" type="submit" class="card-title"> <b> ชื่อวัสดุ : </b> {{ $material->mate_name ?? '' }} </h5> <br>
                                      <p class="card-text"> <b> รหัสวัสดุ : </b> {{ $material->mateID ?? '' }}  </p>
                                      <p class="card-text"> <b> หมวดหมู่ :  </b>{{ $material->category->cate_name ?? '' }} </p>
                                      <p class="card-text"> <b> หน่วยนับ : </b> {{ $material->mate_unit ?? ''  }} </p>
                                      <button href="javascript:;" class="btn btn-primary btn-sm " type="submit">
                                        <i data-feather="shopping-cart"></i> เพิ่มลงตะกร้า </button>
                                      
                                    </div>
                                  </div>

                            </form>
                            
                        </div>
                    @endforeach

                    
                </div>
                <button class="" onclick="topFunction()" id="myBtn" > <i data-feather="chevrons-up"></i> </button>
                
            </div>
        </div>
        
    </div>

     <!-- Add Modal -->
     <div class="modal fade" id="mate_detail" aria-hidden="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header text-center ">
                    <h3 class="modal-title "> <b> รายละเอียด </b></h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>

                    <div class="modal-body">

                        <div class="row form-row">
                            <div class="col-12">
                                <div class="form-group">
                                  
                                      <div class="card-body">
                                            <div class="form-group">
                                                <span> รหัสวัสดุ : {{ $material->mateID }}  </span> <br>
                                                <span> ชื่อวัสดุ : {{ $material->mate_name }}  </span> <br>
                                                <span> หน่วยนับ :  {{ $material->mate_unit }} </span> <br>
                                                <span> หมวดหมู่วัสดุ :  {{ $material->category->cate_name }} </span> <br>
                                                <span> ราคาต่อหน่วย :  {{ $material->mate_price }} </span> <br>
                                                <span> รายละเอียดวัสดุ : {{ $material->mate_detail }} </span> <br>
                                                <span> สถานะ :  <span class="right badge badge-{{  $material->mate_status  ? 'success' : 'danger' }}">{{ $material->mate_status  ? 'เบิกได้' : 'รอจัดซื้อ'}}  </span> </span> <br>
                                                 

                                            </div>

                                        </div>
                                        <!-- /.card-body -->

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary " data-dismiss="modal">
                                                ปิด
                                            </button>
                                             
                                        </div>

                                    
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
    </div>

<style> 


  .searchbox {
    background-color:#fff;
    padding: 10px 76px 10px 40px;
    border-radius: 50px;
  }
  .searchbox [class*="col-"] {
    padding: 0px;
  }
  .searchbox .col-md-6, .searchbox .col-md-5 { 
    padding-top: 12px; 
    padding-bottom: 12px;
  }
  .searchbox .form-control {
    border-color: transparent;
    border-right:solid 1px rgba(0,0,0,0.10);
  }
  .searchbox select.form-control {
    border-right:solid 1px transparent;
  }
  .searchbox .form-control:focus {
    outline: 0;
  }
  .searchbox .btn { border-radius:40px; padding:20px 40px; }
  
  /* ------ Select Chosen Styles ---- */
  .searchbox .chosen-single,
  .searchbox .chosen-container-multi .chosen-choices li.search-field input[type="text"],
  .searchbox .chosen-container-single .chosen-single {
      padding: 0 28px;
      width: 100% !important;
      margin: 0;
      border: solid 1px #c4cad0 !important;
      height: 40px;
      line-height: 22px;
      font-size: 14px;
      font-weight: normal;
      box-sizing:border-box;
      -moz-box-sizing:border-box;
      -webkit-box-sizing:border-box;
      border-radius: 23px;
      background: none;
  }
  
  .searchbox .chosen-single,
  .searchbox .chosen-container-multi .chosen-choices li.search-field input[type="text"],
  .searchbox .chosen-container-single .chosen-single {
      font-size: 15px;
  }
  
  .searchbox .chosen-single,
  .searchbox .chosen-container-multi .chosen-choices li.search-field input[type="text"],
  .searchbox .chosen-container-single .chosen-single {
      border: none !important;
      background: #fff !important;
  }
  
  .searchbox .chosen-container-multi .chosen-choices {
      background: none;
  }
  
  .searchbox .chosen-container-multi .chosen-choices li.search-field {
      float: none;
  }
  
  .searchbox .chosen-single,
  .searchbox .chosen-container-single .chosen-single,
  .searchbox .chosen-container-multi .chosen-choices li.search-field input[type="text"]{
      padding-right: 50px;
  }
  
  .searchbox .chosen-single span {
      display: block;
      padding: 0;
      margin: 0;
      line-height: 40px;
  }
  
  .searchbox .chosen-container-single .chosen-single {
      background: none !important;
      box-shadow: none !important;
  }
  
  .searchbox .chosen-container-active .chosen-single,
  .searchbox .chosen-container-active .chosen-choices {
      box-shadow: none;
  }
  
  .searchbox .chosen-single,
  .searchbox .chosen-container-multi .chosen-choices li.search-field input[type="text"] {
       color: #334e6f !important;
  }
  
  .searchbox .chosen-container-multi .chosen-choices li.search-field input[type="text"],
  .main_wrapper .select-tags:after {
      color: #fff !important;
  }
  
  .searchbox .chosen-container {
      text-align: left;
  }
  
  .searchbox .chosen-drop {
      margin: 5px 0 0 0;
      background: #fff;
      border-radius: 5px;
      border: none;
      overflow: hidden;
      box-shadow: 20px 20px 50px rgba(58, 87, 135, 0.1);
  }
  
  .searchbox .chosen-drop ul.chosen-results {
      padding: 0;
      margin: 0;
      text-align: left;
  }
  
  .searchbox .chosen-drop ul.chosen-results li:before {
      display: none;
  }
  
  .searchbox .chosen-drop ul.chosen-results li {
      padding: 6px 30px 7px 30px;
      line-height: 22px;
      font-size: 14px;
      color: #334e6f;
      background: none !important;
  }
  
  .searchbox .chosen-drop ul.chosen-results li:first-child {
      padding-top: 25px;
  }
  
  .searchbox .chosen-drop ul.chosen-results li:last-child {
      padding-bottom: 23px;
  }
  
  .searchbox .chosen-choices {
      padding: 0;
      margin: 0;
      border: none;
  }
  
  .searchbox .chosen-choices li {
      width: 100%;
      display: block;
  }
  
  .searchbox .chosen-choices li.search-choice {
      display: none;
  }
  
  .searchbox .chosen-choices li:before,
  .searchbox .chosen-choices li:after {
      display: none;
  }
  
  .searchbox .chosen-single > div {
      display: none;
  }
  
  .searchbox .chosen-single {
      position: relative;
  }
  
  .searchbox .chosen-single:after {
      content: "\f107";
      right: 28px;
      top: 50%;
      width: auto;
      height: auto;
      background: none;
      font-family:'FontAwesome';
      transform: translateY(-50%);
      -webkit-transform: translateY(-50%);
      color: #999999;
      display: block;
      pointer-events: none;
      position: absolute;
      font-size: 28px;
      line-height: 22px;
  }
  
  footer p { color:#999; }
  @media (max-width:767px) {
    .searchbox .btn { width:100%; }
    .searchbox {
      padding: 20px 40px;
    }
  .searchbox .form-control {
    border-color: transparent;
    border-bottom:solid 1px rgba(0,0,0,0.10);
  }
  .searchbox select.form-control {
    border-bottom:solid 1px transparent;
  }
  }
  
  </style>


  <script>
    $(".category").chosen({disable_search_threshold: 10});
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

<script>
    //Get the button
    var mybutton = document.getElementById("myBtn");
    
    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {scrollFunction()};
    
    function scrollFunction() {
      if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        mybutton.style.display = "block";
      } else {
        mybutton.style.display = "none";
      }
    }
    
    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
      document.body.scrollTop = 0;
      document.documentElement.scrollTop = 0;
    }
    </script>
    
@endsection



