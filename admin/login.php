<!--Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: text/html; charset=utf-8');

session_start();
//$_COOKIE['user_name'] = 'Carlos';
if(!isset($_COOKIE['user_name'])) {


    ?>

    <!DOCTYPE HTML>
    <html lang="zxx">

    <head>
        <title>Login - Pronto a Comer</title>
        <link rel="icon" type="image/png" href="../logo/teste.png"/>
        <!-- Meta tag Keywords -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8"/>
        <meta name="keywords"
              content="Video Login Form Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements"
        />
        <link rel="stylesheet" href="css/bootstrap.css" type="text/css" media="all">
        <!-- Meta tag Keywords -->
        <!-- css files -->
        <link rel="stylesheet" href="css/style.css" type="text/css" media="all"/>
        <!-- Style-CSS -->
        <link rel="stylesheet" href="css/fontawesome-all.css">
        <link rel="stylesheet" href="css/custom.css">
        <link href="//fonts.googleapis.com/css?family=Marck+Script&amp;subset=cyrillic,latin-ext" rel="stylesheet">
        <link href="//fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=cyrillic,latin-ext"
              rel="stylesheet">
        <!-- //web-fonts -->
    </head>

    <body>


    <div class="back" style="display: none;">
        <div class="load"></div>
    </div>


    <div class="video-container">
        <video id="background-video" autoplay loop muted poster="https://assets.codepen.io/6093409/river.jpg">
            <source src="video/intro.mp4" type="video/mp4">
        </video>
    </div>


    <div class="overlaw">
        <div class="logo_center">
            <img src="../logo/teste.png" class="img-responsive" alt="Cinque Terre">
        </div>


        <h1>
            <span>P</span>ronto
            <span>A</span>
            <span>C</span>omer</h1>
        <!-- //title -->
        <!-- content -->
        <div class="sub-main-w3">
            <form id="submit_login">
                <div class="form-style-agile">
                    <label>
                        <i class="fas fa-user"></i>Username</label>
                    <input placeholder="Username" name="username" id="username" type="text">
                </div>
                <div class="form-style-agile">
                    <label>
                        <i class="fas fa-unlock-alt"></i>Password</label>
                    <input placeholder="Password" name="password" id="password" type="password">
                </div>
                <!-- switch -->

                <!-- //switch -->
                <input type="submit" value="Login">
                <!-- social icons -->
                <!-- //social icons -->
            </form>
        </div>
    </div>

    <?php
    $modals = $_SERVER['DOCUMENT_ROOT'] . '/modals.php';
    include $modals;
    ?>

    <!-- //content -->

    <!-- copyright -->
    <!-- //copyright -->


    <!-- Jquery -->
    <script src="js/jquery-2.2.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- //Jquery -->

    <!-- Video js -->
    <script src="js/jquery.vide.min.js"></script>
    <!-- //Video js -->


    <script>
        $("#submit_login").submit(function (e) {
            /*$(".back").show();
            $(".load").show();*/
            e.preventDefault();
            datav = $(this).serialize();
            console.log(datav);
            $.ajax({
                type: "POST",
                url: "request/login.php",
                data: datav,
                cache: false,
                success: function (data) {
                    $('.back').fadeOut();
                    console.log(data);

                    obj = JSON.parse(data);
                    if (obj.error) {
                        $('.debug-url').html("<strong>Por favor, verifique:</strong> <br>" + obj.error);
                        $('#Modalko').modal();


                        console.log('erro');
                    } else if (obj.success) {

                        $('.debug-url').html('Bem vindo ' + $('#username').val() + ', a redireccionar ...');
                        $('#Modalok').modal();

                        setTimeout(function () {
                            location.href = "/" + obj.success;
                        }, 1500);


                    }
                },
                error: function () {
                    $(".back").hide();
                    $(".load").show();
                    $('.debug-url').html("O Acesso ao login do sistema administrativo do pronto a comer não foi submtido com sucesso. Verifique a conexão WI-FI e tente novamente.");
                    $('#Modalko').modal();
                }
            })
        });
    </script>

    </body>

    </html>

    <?php
}

else {
    header("Location:index.php");
}

?>