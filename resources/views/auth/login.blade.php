<!-- fheater Icon -->
<script src="path/to/dist/feather.js"></script>
<script src="https://unpkg.com/feather-icons"></script>
<script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
<style>
    .container-fluid {
        background-color: rgb(252, 248, 248);
    }

    .infinity-image-container {
        background: url('images/login.gif')center no-repeat;
        background-size: cover;
        opacity: 100;
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

    .infinity-form h1 {
        font-weight: bold;
        color: white;
    }


    .infinity-form .form-input {
        position: relative;
    }

    .infinity-form .form-input input {
        width: 100%;
        margin-bottom: 10px;
        height: 50px;
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
        margin-top: 25px;
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
    .text-right
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
    <title> Login </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <link rel="icon" href="{{ asset('images/Ams.png') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('css/style.css') }}">


</head>

<body>

    <div class="row ">

        <!-- IMAGE CONTAINER BEGIN -->
        <div class="col-lg-6 col-md-6 d-none d-md-block infinity-image-container"></div>
        <!-- IMAGE CONTAINER END -->


        <!-- FORM CONTAINER BEGIN -->
        <div class="col-lg-6 col-md-6 infinity-form-container">
            <div class="col-lg-9 col-md-12 col-sm-9 col-xs-12 infinity-form">
                <!-- Logo -->
                <div class="text-center mb-3 mt-5">
                    <img src="{{ asset('images/Ams.png') }}" width="120px">
                </div>
                <div class="text-center mb-4">
                    <h1>ระบบเบิก-จ่ายวัสดุ ออนไลน์</h1>
                </div>

                <x-jet-authentication-card>

                    <div class="form-input">
                        <x-jet-validation-errors class="mb-4" />

                        @if (session('status'))
                            <div class="mb-4 font-medium text-sm text-green-600">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div>
                                <label class="text-white">{{ __('ผู้ใช้งาน:') }}</label>

                                <x-jet-input id="email" class="block mt-2 w-full" type="email" name="email"
                                    :value="old('email')" required autofocus placeholder="อีเมล" />

                            </div>

                            <div class="mt-4">
                                <label class="text-white">{{ __('รหัสผ่าน:') }}</label>
                                <x-jet-input id="password" class="block mt-2 w-full" type="password" name="password"
                                    required autocomplete="current-password" placeholder="รหัสผ่าน"
                                    aria-label="Show password as plain text. Warning: this will display your password on the screen." />
                            </div>
                            <div class="row mb-3">
                                <!-- Remember Checkbox -->
                                <div class="col-auto d-flex align-items-center">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="cb1"
                                            {{ __('Remember me') }}>
                                        <label class="custom-control-label text-white" for="cb1">จดจำฉันไว้</label>
                                    </div>
                                </div>
                            </div>



                            <!-- Login Button -->
                            <div class="mb-3">
                                <x-jet-button class="btn btn-block">
                                    {{ __('เข้าสู่ระบบ') }}
                                </x-jet-button>
                            </div>
                            <div class="text-right ">
                                @if (Route::has('password.request'))
                                    <a class="text-dark " href="{{ route('password.request') }}">
                                        {{ __('ลืมรหัสผ่าน?') }}
                                    </a>
                                @endif
                            </div>

                            <div class="text-center mb-5 text-white"> ไม่มีบัญชีผู้ใช้งาน?
                                <a class="register-link text-dark" href="{{ route('register') }}"> {{ __('ลงทะเบียน') }} </a>

                            </div>
                           
                        </form>

                        

                </x-jet-authentication-card>
                <footer class="main-footer text-white">
                    <!-- To the right -->
                    <div class="float-right d-none d-sm-inline">
                        <strong> ลิขสิทธิ์ &copy;2565.ทักษิณ และ ศุภางค์ วิทยาลัยการคอมพิวเตอร์ มหาวิทยาลัยขอนแก่น </strong> 
                    </div>
    
                </footer>
                <!-- FORM CONTAINER END -->

            </div>
            <!-- Main Footer -->
            
        </div>

</body>

<!-- Icon -->
<script>
    feather.replace()
</script>

</html>


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

