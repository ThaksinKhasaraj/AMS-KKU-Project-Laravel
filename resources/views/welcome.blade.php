<!DOCTYPE html>
<html>

<head>
  <meta charset='utf-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <title> welcome </title>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700,900&display=swap" rel="stylesheet">
</head>

<body>

  <div class="container">

    <!----- header, logo and navbar menu -->

    <header class="header">

    <img class="logo" src="{{ asset('images/Ams.png') }}" width="100px">
      <h2 class="logo">LOGO</h2>
      

      <div class="menu">
        <a href="#" class="active">Home</a>
        <a href="#">Books</a>
        <a href="#">Media</a>
        <a href="#">About</a>
        <a href="#">Contact</a>
      </div>

    </header>

    <!----- top content, title, description and buttons -->

    <div class="top-info">
      <h1 class="title">
        Time To Save The World Now!
      </h1>
      <p class="info">
        join now to make our voice louder join now to make our voice louder join now to make our voice louder join now to make our voice louder join now to make our voice louder join now.
      </p>

      <div class="flex top-btns">
        <button class="prime-btn">Join</button>
        <button class="sec-btn">Details</button>
      </div>
    </div>

  </div>

  <!----- parallax container and  image elements,   -->

  <div id="scene" data-relative-input="true">
    <img src="https://wavesparallax.netlify.com/img/man%20orang%20and%20blue.svg" data-depth='0.9' width="100%" class="img-1" />
    <img src="https://wavesparallax.netlify.com/img/man orang and ss blue.svg" data-depth='0.7' width="100%" class="img-2" />
    <img src="https://wavesparallax.netlify.com/img/man orang and bluess.svg" data-depth='0.5' width="60%" class="img-3" />
    <img src="https://wavesparallax.netlify.com/img/man ssorang and blue.svg" data-depth='0.3' width="80%" class="img-4" />
    <div class="ground" data-depth='0.2'></div>
    <img src="https://wavesparallax.netlify.com/img/man.png" data-depth='0.1' width="100%" class="img-5" />
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/parallax/3.1.0/parallax.min.js"></script>
</body>

</html>

<style>body,html{
    margin: 0px;
    padding: 0px;
    overflow-x: hidden;
    font-family: 'Montserrat', sans-serif;
}

#scene{
    position: absolute;
    right: -10%;
    bottom: 10%;
    width: 80%;
}

.container{
    width: 70%;
    display: block;
    margin-left: auto;
    margin-right: auto;
}

.img-2{
    margin-left: 18%;
}

.img-3{
 margin-top: -3%;
 margin-left: 50%;
}

.img-4{
    margin-top: 7%;
    margin-left: 30%;
}

.ground{
    height: 300px;
    width: 200%;
    background: white;
    margin-top: 19%;
    margin-left: -100%
}

.img-5{
    margin-top: -17%;
    margin-left: 10%;
}

.header{
    display: flex;
    flex-wrap: nowrap;
    width: 100%;
}

.logo{
    font-weight: bold;
    color:#AFC2ED;
    margin-top: 35px;
}

.menu{
    margin-left: auto;
    margin-top: 40px;
}

.menu a{
    color: black;
    font-size: 18px;
    text-decoration: none;
    transition: color 0.3s ease;
}

.menu a:hover{
    color: #AFC2ED;
}

.menu a:not(:last-child){
    margin-right: 30px;
}

.menu a.active{
    border-bottom: 2px solid #AFC2ED;
    padding-bottom: 5px;
}

.top-info{
    margin-top: 80px;
    width: 50%;
}

.title{
    font-size: 42px;
    font-weight: 900;
    line-height: 55px;
}

.info{
    font-size: 14px;
    color: #676262;
    line-height: 25px;
    margin-top: 30px;
}

.flex{
    display: flex;
    flex-wrap: nowrap;
}

button{
    cursor: pointer;
}

.prime-btn{
    width: 140px;
    height: 35px;
    color: white;
    border:none;
    font-weight: 600;
    box-shadow: none;
    background: #AFC2ED;
    border-radius: 999px;
    transition: background-color 0.3s ease;
}

.prime-btn:hover{
    background: #91a4d1;
}

.sec-btn{
    width: 140px;
    height: 35px;
    color: #AFC2ED;
    border:1px solid #AFC2ED;
    font-weight: 600;
    box-shadow: none;
    background: transparent;
    border-radius: 999px;
    transition: all 0.3s ease;
}

.sec-btn:hover{
    border-color: #91a4d1;
    color: #91a4d1;
}

.top-btns{
    margin-top: 30px;
}

.top-btns .sec-btn{
    margin-left: 15px;
}







 </style>

 <script>
    // please see full screen mode

// full tutorial on my blog: https://www.hoseinh.com/mouse-move-parallax-effect-tutorial/

// parallax.js: https://github.com/wagerfield/parallax

var scene = document.getElementById('scene');
var parallaxInstance = new Parallax(scene);

 </script>