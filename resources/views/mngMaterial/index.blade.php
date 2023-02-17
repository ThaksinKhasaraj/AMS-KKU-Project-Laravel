@extends('layouts.masterMng')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> รายการวัสดุ </h1><br>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">รายการวัสดุ</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.row -->
    </div><!-- /.row -->

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-success card-outline">
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

                            <div class="card-deck">
                                <div class="card">
                                    <img src="/mateImage/20220414024146.jpeg" class="card-img-top" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title"> Double A กระดาษถ่ายเอกสาร 80 แกรม ขนาด A4 </h5>
                                    </div>
                                    <a href="#" class="btn btn-primary"> เพิ่มลงตระกร้า </a>
                                </div>

                                <div class="card">
                                    <img src="/mateImage/20220414024236.jpeg" class="card-img-top" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title"> 3M Disposable Mask ผ้าปิดจมูกแบบคล้องหู </h5>
                                        <p class="card-text"> </p>
                                    </div>
                                    <a href="#" class="btn btn-primary"> เพิ่มลงตระกร้า </a>
                                </div>
                                <div class="card">
                                    <img src="/mateImage/20220413091803.jpg" class="card-img-top" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title"> ดาต้าปลั๊กไฟ 3ช่อง 1สวิตช์ สายไฟยาว 5 ม. </h5>
                                        <p class="card-text"></p>
                                    </div>
                                    <a href="#" class="btn btn-primary"> เพิ่มลงตระกร้า </a>
                                </div>

                                <div class="card">
                                    <img src="/mateImage/20220404095328.jpg" class="card-img-top" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title"> ผงหมึกพิมพ์ HP LaserJet Q2612A (12A)</h5>
                                        <p class="card-text"> </p>
                                    </div>
                                    <a href="#" class="btn btn-primary"> เพิ่มลงตระกร้า </a>
                                </div>
                                <div class="card">
                                    <img src="/mateImage/20220404095226.jpg" class="card-img-top" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title"> คลิบหนีบสีดำ ตราม้า เบอร์ 112 บรรจุ 12 ชิ้น </h5>
                                        <p class="card-text"> </p>
                                    </div>
                                    <a href="#" class="btn btn-primary"> เพิ่มลงตระกร้า </a>
                                </div>
                            </div><br>


                            <div class="card-deck">
                                <div class="card">
                                    <img src="/mateImage/20220404111048.jpg" class="card-img-top" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title"> เทปผ้า แลคซีน ปิดสันหนังสือ ขนาด 1.5 นิ้ว x 5 หลา </h5>
                                        <p class="card-text"> </p>
                                    </div>
                                    <a href="#" class="btn btn-primary"> เพิ่มลงตระกร้า </a>
                                </div>

                                <div class="card">
                                    <img src="/mateImage/20220413091614.jpeg" class="card-img-top" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title"> 3M กรรไกรอเนกประสงค์ รุ่น CAT1428 ขนาด 8 นิ้ว</h5>
                                        <p class="card-text"> </p>
                                    </div>
                                    <a href="#" class="btn btn-primary"> เพิ่มลงตระกร้า </a>
                                </div>
                                <div class="card">
                                    <img src="/mateImage/20220414043044.jpeg" class="card-img-top" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title"> ปากกาลูกลื่น 0.5 มม. หมึกสีน้ำเงิน 50ด้าม/แพ็ค แลนเซอร์
                                            รุ่น TEST8450 </h5>
                                        <p class="card-text"></p>
                                    </div>
                                    <a href="#" class="btn btn-primary"> เพิ่มลงตระกร้า </a>
                                </div>

                                <div class="card">
                                    <img src="/mateImage/20220413100522.jpeg" class="card-img-top" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title"> ซองน้ำตาล พิมพ์ครุฑดำ ขนาด 8.5x10 </h5>
                                        <p class="card-text"> </p>
                                    </div>
                                    <a href="#" class="btn btn-primary"> เพิ่มลงตระกร้า </a>
                                </div>
                                <div class="card">
                                    <img src="/mateImage/20220414042901.jpeg" class="card-img-top" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title"> ไม้ม็อบหนีบ 12 นิ้ว สีน้ำเงิน-ขาว SUPERCAT </h5>
                                        <p class="card-text"> </p>
                                    </div>
                                    <a href="#" class="btn btn-primary"> เพิ่มลงตระกร้า </a>
                                </div>
                            </div>





                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
