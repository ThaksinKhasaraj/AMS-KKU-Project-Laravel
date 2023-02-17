<!-- fheater Icon -->
<script src="path/to/dist/feather.js"></script>
<script src="https://unpkg.com/feather-icons"></script>
<script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
<style>
    .container-fluid {
        background-color: rgb(252, 248, 248);
    }

    .infinity-image-container {
        background: url('images/register.gif') center no-repeat;
        background-size: cover;
        height: 100vh;
    }

    .infinity-form-container {
        background: #6387E3;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .infinity-form {
        display: flex;
        flex-direction: column;
        justify-content: center;
        min-height: 100vh;
    }

    .infinity-form h2 {
        font-weight: bold;
        color: white;
    }


    .infinity-form .form-input {
        position: relative;
    }

    .infinity-form .form-select {
        position: relative;
    }

    .infinity-form .form-input input {
        width: 100%;
        margin-bottom: 2px;
        height: 45px;
        border: none;
        border-radius: 5px;
        outline: none;
        background: white;
        padding-left: 45px;
    }

    .infinity-form .form-input select {
        width: 100%;
        margin-bottom: 2px;
        height: 45px;
        border: none;
        border-radius: 5px;
        outline: none;
        background: white;
        padding-left: 45px;
    }

    .infinity-form .form-input span {
        position: absolute;
        top: 8px;
        padding-left: 20px;
        color: rgb(252, 249, 249);
    }

    .infinity-form .form-input input:focus,
    .infinity-form .form-input input:valid {
        border: 2px solid #4285f4;
    }


    .infinity-form button[type="submit"] {
        margin-top: 30px;
        border: none;
        cursor: pointer;
        border-radius: 20px;
        background: linear-gradient(45deg, #4285f4, #709de8);
        /*Button Color*/
        color: #fff;
        font-weight: bold;
        transition: 0.5s;


    }

    .infinity-form button[type="submit"]:hover {
        background: linear-gradient(45deg, #709de8, #4285f4);
        /*Button color when hover*/
    }

    .forget-link,
    .login-link,
    .register-link {
        color: #fff;
        font-weight: bold;
    }

    .forget-link:hover,
    .login-link:hover,
    .register-link:hover {
        color: #4285f4;
        text-decoration: none;
    }
</style>

<!DOCTYPE html>
<html>

<head>
    <title> Register </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <link rel="icon" href="{{ asset('images/Ams.png') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('css/style.css') }}">
</head>

<body>
    <div class="container-fluid">
        <div class="row ">
            <!-- IMAGE CONTAINER BEGIN -->
            <div class="col-lg-6 col-md-6 d-none d-md-block infinity-image-container"></div>
            <!-- IMAGE CONTAINER END -->

            <!-- FORM CONTAINER BEGIN -->
            <div class="col-lg-6 col-md-6 infinity-form-container">
                <div class="col-lg-9 col-md-12 col-sm-9 col-xs-12 infinity-form">
                    <!-- Logo -->
                    <div class="text-center mb-3 mt-5">
                        <img src="{{ asset('images/Ams.png') }}" width="50px">
                    </div>
                    <div class="text-center mb-3">
                        <h2>ลงทะเบียน</h2>
                    </div>

                    <x-jet-authentication-card>
                        <div class="form-input">
                            <x-jet-validation-errors class="mb-4" />

                            @if (session('status'))
                                <div class="mb-4 font-medium text-sm text-green-600">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <x-jet-validation-errors class="mb-4" />

                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="mt-4">
                                    <x-jet-label for="name" class="text-white" value="{{ __('ชื่อ-สกุล : ') }}" />
                                    <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name"
                                        :value="old('name')" required autofocus autocomplete="name"
                                        placeholder="ชื่อ-สกุล" />
                                </div>


                                {{-- <div class="mt-4">
                                    <x-jet-label for="department" class="text-white"
                                        value="{{ __('หน่วยงาน/สาขาวิชา:') }}" />
                                    <select id="department" class="block mt-1 w-full" name="department"
                                        :value="old('department')" required autofocus autocomplete="department">
                                        <option selected>เลือก...</option>
                                        <option> คณะเทคนิคการแพทย์ </option>
                                        <option> สำนักงานคณบดี-คณะเทคนิคการแพทย์ </option>
                                        <option> งานบริหารและธุรการ </option>
                                        <option> งานยุทธศาสตร์ </option>
                                        <option> งานวิชาการและพัฒนานักศึกษา </option>
                                        <option> งานห้องปฏิบัติการ </option>
                                        <option> ภาควิชาเทคนิคการแพทย์ </option>
                                        <option> ภาควิชากายภาพบำบัด </option>
                                        <option> ภาควิชาเคมีคลินิก </option>
                                        <option> ภาควิชาจุลชีววิทยาคลินิก </option>
                                        <option> ภาควิชาภูมิคุ้มกันวิทยาคลินิก </option>
                                        <option> วิจัย </option>
                                        <option> สถานบริการสุขภาพเทคนิคการแพทย์ฯ </option>

                                    </select>
                                </div> --}}


                                <div class="mt-4">
                                    <x-jet-label for="role" class="text-white"
                                        value="{{ __('ประเภทการใช้งาน : ') }}" />
                                    <select id="role" class="block mt-1 w-full" name="role"
                                        :value="old('role')" required autofocus autocomplete="role"
                                        placeholder="โปรดเลือกประเภทการใช้งานตามตำแหน่งงาน">
                                        <option selected> เลือก... </option>
                                        <option> บุคลากร/อาจารย์ </option>
                                        <option> หัวหน้างาน/หัวหน้าสาขาวิชา </option>
                                        <option> เจ้าหน้าที่พัสดุ </option>
                                        <option> ผู้อำนวยการกองบริหารงานคณะฯ </option>
                                        <option> แอดมิน </option>
                                    </select>
                                </div>

                                <div class="mt-4">
                                    <x-jet-label for="email" class="text-white" value="{{ __('อีเมล : ') }}" />
                                    <x-jet-input id="email" class="block mt-1 w-full" type="text" name="email"
                                        :value="old('email')" required autofocus autocomplete="email"
                                        placeholder="โปรดใช้อีเมลของมหาวิทยาลัย" />
                                </div>

                                <div class="mt-4 ">
                                    <x-jet-label for="password" class="text-white" value="{{ __('รหัสผ่าน : ') }}" />
                                    <x-jet-input id="password" class="block mt-1 w-full" type="password"
                                        name="password" required autocomplete="new-password"
                                        placeholder="โปรดใช้รหัสผ่าน 8 ตัวขึ้นไป" />
                                </div>

                                <div class="mt-4">
                                    <x-jet-label for="password_confirmation" class="text-white"
                                        value="{{ __('ยืนยันรหัสผ่าน:') }}" />
                                    <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password"
                                        name="password_confirmation" required autocomplete="new-password"
                                        placeholder="โปรดใช้รหัสผ่าน 8 ตัวขึ้นไป" />
                                </div>

                                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                                    <div class="mt-4">
                                        <x-jet-label for="terms">
                                            <div class="flex items-center">
                                                <x-jet-checkbox name="terms" id="terms" />

                                                <div class="ml-2">
                                                    {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                        'terms_of_service' =>
                                                            '<a target="_blank" href="' .
                                                            route('terms.show') .
                                                            '" class="underline text-sm text-gray-600 hover:text-gray-900">' .
                                                            __('Terms of Service') .
                                                            '</a>',
                                                        'privacy_policy' =>
                                                            '<a target="_blank" href="' .
                                                            route('policy.show') .
                                                            '" class="underline text-sm text-gray-600 hover:text-gray-900">' .
                                                            __('Privacy Policy') .
                                                            '</a>',
                                                    ]) !!}
                                                </div>
                                            </div>
                                        </x-jet-label>
                                    </div>
                                @endif
                                <div class="mb-3">
                                    <x-jet-button class="btn btn-block">
                                        {{ __('ลงทะเบียน') }}
                                    </x-jet-button>
                                </div>
                                <div class="text-center mb-5 text-white"> ลงทะเบียนแล้ว?
                                    <a class="register-link text-dark" href="{{ route('login') }}">เข้าสู่ระบบ</a>
                                </div>

                        </div>
                        <!-- Main Footer -->
                        <footer class="main-footer text-white">
                            <!-- To the right -->
                            <div class="float-right d-none d-sm-inline">
                                <strong> ลิขสิทธิ์ &copy;2565.ทักษิณ และ ศุภางค์ วิทยาลัยการคอมพิวเตอร์ มหาวิทยาลัยขอนแก่น </strong> 
                            </div>

                        </footer>
                        </form>


                    </x-jet-authentication-card>
                    
<!-- Live chat with website visitors via messaging apps -->
<script type="text/javascript" src="https://popupsmart.com/freechat.js"></script>
                    <script>
                        window.start.init({
                            title: " ฝ่ายพัสดุ 💁🏻‍♀️สวัสดีค่ะ ",
                            message: "หากคุณมีข้อสงสัย? เพียงส่งข้อความถึงเราตอนนี้เพื่อรับความช่วยเหลือได้เลยค่ะ",
                            color: " #F1948A ",
                            position: "left",
                            placeholder: "Enter your message",
                            withText: " ติดต่อเราผ่าน ",
                            viaWhatsapp: " สามารถเพิ่มเพื่อนกับเราทาง Line หรือ โทรเพื่อสอบถาม ",
                            gty: " คุณต้องการติดกับเราผ่าน ",
                            awu: " เริ่มสอบถามเลยตอนนี้ ",
                            connect: " ติดต่อสอบถาม ",
                            button: " ติดต่อสอบถาม ",
                            device: "everywhere",
                            logo: "https://d2r80wdbkwti6l.cloudfront.net/AmtKk1oVnBizr75ljHazapCntUCwU4DC.jpg",
                            person: "https://d2r80wdbkwti6l.cloudfront.net/Z0sWNVUKW4stP8NqSyZccDZfBUa37ErZ.jpg",
                            services: [{
                                "name": "link",
                                "content": "https://drive.google.com/drive/folders/11-s6kxqxuOgvYhQeGQv0Kru56NjkiQRo?usp=share_link"
                            }, {
                                "name": "line",
                                "content": "https://lin.ee/ebSGmYf"
                                
                            }, {
                                "name": "phone",
                                "content": ""
                                
                            }]
                        })
                    </script>
                   