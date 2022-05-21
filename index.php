
<!DOCTYPE html>
<html lang="en">
<!-- Head -->
<head>
    <title>Pronto a Comer</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="keywords" content="Food Cadre a Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <link rel="icon" type="image/png" href="logo/teste.png"/>

    <!-- light-box -->
    <link rel="stylesheet" href="css/lightbox.css">
    <!-- //light-box -->
    <!--FlexSlider-->
    <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" media="all">
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all">
    <link rel="stylesheet" href="css/font-awesome.min.css" />
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'><!--web font-->
    <link href="//fonts.googleapis.com/css?family=Amita:400,700" rel="stylesheet"><!--web font-->

    <link rel="stylesheet" href="admin/css/bootstrap-datetimepicker.css">
    <link rel="stylesheet" href="admin/css/bootstrap-datetimepicker-standalone.css">
    <link rel="stylesheet" href="admin/css/custom.css">

    <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>







</head>
<!-- Body -->
<body>

<div class="back" style="display: none;">
    <div class="load"></div>
</div>

<?php include 'modals.php'; ?>
<!-- banner -->
<div class="w3l-banner">
    <div class="header">
        <!-- Top-Bar -->
        <div class="top-bar">
            <div class="fund_title_logo">
                <div class="logo_center">
                    <img src="logo/teste.png" class="img-responsive" alt="Cinque Terre">
                </div>
            </div>

            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myNavbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse" id="myNavbar">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="#index.php" class="scroll">Inicio</a></li>
                            <li><a href="#about-us" class="scroll">Sobre</a></li>
                            <li><a href="#services" class="scroll">Serviços</a></li>
                            <li><a href="#testimonials" class="scroll">Comentários</a></li>
                            <li><a href="#gallery" class="scroll">Galeria de Imagens</a></li>
                            <li><a href="#contact-us" class="scroll">Contacte-nos</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <div class="container">
            <div class="flexslider-info">
                <section class="slider">
                    <div class="flexslider">
                        <ul class="slides">
                            <li>
                                <div class="w3l-info">
                                    <h1>Seja Muito Bem Vindo ao Pronto a Comer .</h1>
                                    <div class="social-media">
                                        <a href="#" class="more" style="margin-top: -50px;" data-toggle="modal" data-target="#adicionar_reserva">Efetuar Reserva</a>
                                    </div>

                                </div>


                            </li>
                            <li>
                                <div class="w3l-info">
                                    <h3>Temos um belo Bitoque ; depois de nos conhecer , não há quem nos troque ! </h3>
                                    <div class="social-media">
                                        <a href="#" class="more" style="margin-top: -50px;" data-toggle="modal" data-target="#adicionar_reserva">Efetuar Reserva</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="w3l-info">
                                    <h3>Obrigado pela Sua Preferência e Volte Sempre</h3>
                                    <div class="social-media">
                                        <a href="#" class="more" style="margin-top: -50px;" data-toggle="modal" data-target="#adicionar_reserva">Efetuar Reserva</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
<!-- //banner -->
<!-- about -->
<section class="about-us" id="about-us">
    <div class="container">
        <div class="col-md-5 about-left">
            <h2>Sobre "Pronto a Comer"</h2>
            <p>
                Um pronto a comer é , basicamente , um restaurante ou loja que serve rapidamente comida anteriormente preparada. Portanto , serve de forma célere ,
                comida previamente confeccionada.
            </p>
            <div class="clearfix"></div>
        </div>

        <div class="col-md-6 about-img" >
            <img src="images/bitoque.jpg" alt="" />
            <div class="clearfix"></div>
        </div>
        <div class="col-md-6 about-img">
            <img src="images/bitoque2.jpg" alt="" />
            <div class="clearfix"></div>
        </div>
        <div class="col-md-5 about-right">
            <p>
                Já o conceito de "fast food" , prende - se com a velocidade (alta) com que a comida é posta à disposição do
                cliente , pelo que os dois juízos ( pronto a comer ou / e fast food ) se distinguem , EMBORA se possam COMPLEMENTAR.
            </p>
            <div class="clearfix"></div>
        </div>
    </div>
</section>
<!-- //about -->
<!-- services -->
<section class="services" id="services">
    <div class="container">
        <div class="w3l-heading">
            <h3>Serviços</h3>
        </div>
        <div class="service-grids">
            <div class="col-md-8 service-left">


                <div class="open-hours-row row">
                    <div class="col-md-3 open-hours-left">
                        <h4><p style="color: #fff">Horário</p> <p style="color: #fff"> de Funcionamento </p></h4>
                    </div>
                    <div class="col-md-3 open-hours-left">
                        <a href="#" data-toggle="modal" data-target="#add_reserve" style="font-size: inherit!important;color: #000;"> <h6>Almoço</h6> <h5>12h / 14h</h5></a>                        </div>
                    <div class="col-md-3 open-hours-left">
                        <a href="#" data-toggle="modal" data-target="#add_reserve" style="font-size: inherit!important;color: #000;"> <h6>Jantar</h6> <h5>19h / 21h</h5> </a>                        </div>
                    <div class="col-md-3 open-hours-left">
                        <a href="#" data-toggle="modal" data-target="#add_reserve" style="font-size: inherit!important;color: #000;"> <h6>Especial</h6> <h5>Por Reserva</h5> </a>                        </div>
                </div>


                <div class="service-left-top-grids">
                    <div class="service-left-top">

                    </div>
                    <div class="service-left-top">

                    </div>
                </div>
                <div class="service-left-bottom-grids">
                    <h4>Forma de funcionamento do serviço de pronto a comer</h4>
                    <p>
                        Feito em presencial o cliente chega à loja e compra o seu prato para levar para casa .
                    </p>
                    <h4> Encomenda - por email</h4>
                    <p>
                        Entrega na casa do cliente num raio de 3,5 km . Só se aceitam encomendas ´zonais´ PARA e efectuadas De Portugal
                    </p>
                </div>
            </div>
            <div class="col-md-4 service-right">
                <img src="images/2.jpg" alt="" />
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</section>
<!-- //services -->
<!-- testimonials -->
<div class="testimonials" id="testimonials">
    <div class="container">
        <h3>Comentários</h3>

        <div id="comment_list_ative">

        </div>





    </div>


</div>

<div class="col-md-offset-4 col-md-4" >
    <button id="add_comment" data-toggle="modal" data-target="#add_comentario">Adicionar Comentário</button>
</div>
<!-- //testimonials -->
<!-- gallery -->
<div class="gallery" id="gallery" style="margin-top: 50px">
    <div class="container">
        <div class="agile-heading">
            <h3>A Nossa Galeria</h3>
        </div>
        <div class="agileinfo-gallery">
            <div class="gallery-grid-top">
                <div class="col-md-4 col-sm-12 w3-agileits-gallery-grids">
                    <a href="images/galeria1.jpg" data-lightbox="example-set" data-title="Bitoque com 'ôvo a cavalo' ">
                        <img src="images/galeria1.jpg" class="img-responsive zoom-img" alt=" "/>
                        <div class="agile-b-wrapper">
                            <i class="fa fa-search-plus" aria-hidden="true"></i>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 col-sm-12 w3-agileits-gallery-grids">
                    <a href="images/galeria2.jpg" data-lightbox="example-set" data-title="Massa com tamboril">
                        <img src="images/galeria2.jpg" class="img-responsive zoom-img" alt=" "/>
                        <div class="agile-b-wrapper">
                            <i class="fa fa-search-plus" aria-hidden="true"></i>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 col-sm-12 w3-agileits-gallery-grids">
                    <a href="images/galeria3.jpg" data-lightbox="example-set" data-title="Tofu grelhado">
                        <img src="images/galeria3.jpg" class="img-responsive zoom-img" alt=" "/>
                        <div class="agile-b-wrapper">
                            <i class="fa fa-search-plus" aria-hidden="true"></i>
                        </div>
                    </a>
                </div>
                <div class="clearfix"> </div>
            </div>

            <div class="clearfix"> </div>
            <script src="js/lightbox-plus-jquery.min.js"> </script>
        </div>
    </div>
</div>
<!-- //gallery -->
<!-- Contact -->
<section class="contact" id="contact-us">
    <div class="container">
        <h3>Contacte-nos</h3>
        <div class="contact-main">
            <div class="col-md-6 contact-left">
                <address>
                    <ul>
                        <li><i class="fa fa-map-marker" aria-hidden="true"></i> Rua da Liberdade 109</li>
                        <li>8700 Olhão - Fuseta</li>
                        <li>Faro - Portugal</li>
                        <li><i class="fa fa-phone" aria-hidden="true"></i> 289 182 221</li>
                        <li><i class="fa fa-envelope" aria-hidden="true"></i> <a href="mailto:martinscarlos799@gmail.com">martinscarlos799@gmail.com</a></li>
                    </ul>
                </address>
                <div class="clearfix"></div>
            </div>
            <div class="col-md-6 contact-right">
                <div style="width: 100%"><iframe width="100%" height="600" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=Rua%20da%20Liberdade%20109%208700%20Olh%C3%A3o%20-%20Fuseta%20Faro%20-%20Portugal+(Pronto%20a%20Comer%20Caly)&amp;t=&amp;z=15&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"><a href="https://www.gps.ie/wearable-gps/">adventure gps</a></iframe></div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="contact-wthree">
            <form id="info_contact">
                <input type="text" name="nome" placeholder="Nome">
                <input class="email" name="email" type="email" placeholder="Email" >
                <textarea name="message" placeholder="message" ></textarea>
                <input type="submit" value="ENVIAR">
            </form>

        </div>
    </div>
</section>


<!-- //Contact -->
<!-- copyright -->
<div class="wthree_copy_right">
    <div class="container">
        <p>Copyright &copy; 2022 Pronto a Comer. Todos os Direitos Reservados | Design by <a href="#">Carlos Peres</a></p>
    </div>
</div>




<script type="text/javascript" src="js/bootstrap.min.js"></script>

<script defer src="js/jquery.flexslider.js"></script>
<script src="admin/js/bootbox.min.js"></script>
<script src="admin/js/momentjs/moment-with-locales.min.js"></script>
<script src="admin/js/bootstrap-datetimepicker.min.js"></script>



<!--Start-slider-script-->
<script type="text/javascript">

    $(window).load(function(){
        $('.flexslider').flexslider({
            animation: "slide",
            start: function(slider){
                $('body').removeClass('loading');
            }
        });
    });
</script>
<!--End-slider-script-->
<script src="js/SmoothScroll.min.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $(".scroll").click(function(event){
            event.preventDefault();
            $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
        });
    });
</script>

<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<!-- here stars scrolling icon -->
<script type="text/javascript">
    $(document).ready(function() {
        /*
            var defaults = {
            containerID: 'toTop', // fading element id
            containerHoverID: 'toTopHover', // fading element hover id
            scrollSpeed: 1200,
            easingType: 'linear'
            };
        */

        $().UItoTop({ easingType: 'easeOutQuart' });

    });
</script>

<!-- Datetimepicker -->
<script>
    var date = new Date();
    d = date.setDate(date.getDate());
    h = date.setHours(date.getHours());

    // Datas usando no datetimepicker
    $("#data_reseva_dt").datetimepicker({ ignoreReadonly: true, format: 'YYYY-MM-DD',
        locale: 'pt', showTodayButton: true, minDate: h, defaultDate: h, widgetPositioning: { horizontal: 'right', vertical: 'bottom' }});
    // Datas usando no datetimepicker
    $("#hora_reseva_dt").datetimepicker({ ignoreReadonly: true, format: 'HH:mm',
        locale: 'pt', showTodayButton: true, minDate: h, defaultDate: h, widgetPositioning: { horizontal: 'right', vertical: 'bottom' }});
</script>




<!-- Envio de Mensagens do Pronto a Comer -->

<script>
$("#a").on('click', function () {
    $(".back").show();
    $(".load").show();
});


    $("#info_contact").submit(function(e){

        $(".back").show();
        $(".load").show();
        e.preventDefault();
        dataValue = $(this).serialize();
        console.log(dataValue);

        $.ajax({ url:'resp/info.php',
            data:dataValue,
            type:'POST',
            cache: false,
            success:function(data){
                arr=[];
                arr =  JSON.parse(data);

                if (arr.error)
                {
                    $(".back").hide();
                    $(".load").show();
                    jQuery(".debug-url").html("Por favor, verifique:<br><br>"+arr.error+"<br> Retifique o Erro e tente novamente.");
                    $('#add_comentario').modal('hide');
                    $('#Modalko').modal();
                }
                else if (arr.success == 0)
                {
                    $(".back").hide();
                    $(".load").show();

                    $('.debug-url').html('O Envio de Informações não foi enviado com sucesso.');
                    $('#add_comentario').modal('hide');
                    $('#Modalko').modal('show');
                }
                else if (arr.success == 1)
                {
                    $(".back").hide();
                    $(".load").show();
                    $('.debug-url').html('O Envio de Informações foi enviado com sucesso.');
                    $('#add_comentario').modal('hide');
                    $('#Modalok').modal('show');
                }
            },
            error:function(){
                $(".back").hide();
                $(".load").show();
                $('.debug-url').html("O Pedido de Informações não foi submtido com sucesso. Verifique a conexão WI-FI e tente novamente.");
                $('#Modalko').modal();
            }
        });
    });





    $("#adicionar_comment").on('click', function (e) {
        $(".back").show();
        $(".load").show();
        e.preventDefault();
        var rating = 0;
        if($('.rating-container input').is(':checked'))
        {
            rating = $('.rating-container input:checked').val();
        }
       var nome = $("#nome").val();
       var mensagem = $("#mensagem").val();

       var ativar = 0;

       var dataValue = "nome="+nome+"&mensagem="+mensagem+"&classificacao="+rating+"&activar_field="+ativar+"&task=inserirComentarios";

        console.log(dataValue);

        $.ajax({
            type: "POST",
            url: 'admin/comentarios/comentarios.php',
            data: dataValue,
            success: function(data)
            {
                arr=[];
                arr =  JSON.parse(data);
                console.log(data);

                if (arr.error)
                {
                    $(".back").hide();
                    $(".load").show();
                    jQuery(".debug-url").html("Por favor, verifique:<br><br>"+arr.error+"<br> Retifique o Erro e tente novamente.");
                    $('#add_comentario').modal('hide');
                    $('#Modalko').modal();
                }
                else if (arr.success == 0)
                {
                    $(".back").hide();
                    $(".load").show();

                    $('.debug-url').html('A Criação da Reserva nao foi adicionado com sucesso');
                    $('#add_comentario').modal('hide');
                    $('#Modalko').modal('show');
                }
                else if (arr.success == 1)
                {

                    $(".back").hide();
                    $(".load").show();
                    $('.debug-url').html('O Comentário número <b>'+arr.id+ '</b> foi feito com sucesso');
                    $('#add_comentario').modal('hide');
                    $('#Modalok').modal('show');

                    $("#nome").val('');
                    $("#mensagem").val('');
                    $('.rating-container input').val([0]);
                    setTimeout(function(){
                        $('#Modalok').modal('hide');},1000);
                    setTimeout(function(){  location.reload();}, 1000);

                }




            },
            error:function(){
                $(".back").hide();
                $(".load").show();
                $('#add_comentario').modal('hide');
                $('.debug-url').html("O Adição de Comentarios não foi submtido com sucesso. Verifique a conexão WI-FI e tente novamente.");
                $('#Modalko').modal();
            }
        });
    });

    listarComentarios();

    function listarComentarios()
    {
        var dataValue="&task=listarComentarios";
        var s = '';
        var ds = '';
        radioButtons = [];
        ratings_arr = [];
        $.ajax({ url:'admin/comentarios/comentarios.php',
            data:dataValue,
            type:'POST',
            success:function(data){
                arr=[];
                arr =  JSON.parse(data);
                console.log(arr);
                if (arr == null || arr.length < 1){
                    $('.debug-url').html('Nao existe a Comentarios Ativos');
                    $('#Modalko').modal();
                }
                else {





                    for (i=0; i < arr.length; i++)
                    {
                        var nome = arr[i].nome;
                        var mensagem = arr[i].mensagem;
                        var rating = arr[i].classificacao;
                        ratings_arr.push(rating);




                        //s5.fill(ds,0,rating);



                        s5text  = "";


                        s += '<li>\n' +
                            '                    <div class="w3l-info1">\n' +
                            '                        <div class="col-md-12 testimonials-grid-2">\n' +
                            '                            <h4>'+nome+'</h4>\n' +
                            '                            <p>'+mensagem+'</p>\n' +
                            '                            <div class="rating-box-show" id="rating-box-show-'+arr[i].id+'"> ' +
                            '<div class="rating-container-show" id="rating-container-show-'+arr[i].id+'"> '+s5text+
                            '</div> ' +
                            '</div>\n' +
                            '                        </div>\n' +
                            '                    </div>\n' +
                            '</li>';
                    }

                    $("#comment_list_ative").html('<div class="flexslider-info">\n' +
                        '    <section class="slider">\n' +
                        '        <div class="flexslider">\n' +
                        '            <ul class="slides">'+s+
                        '            </ul>\n' +
                        '        </div>\n' +
                        '    </section>\n' +
                        '</div>'
                    );

                    /*for (i=0; i < arr.length; i++)
                    {
                        var id = arr[i].id;
                        $("#rating-container-show-"+id).html('<input type="radio" name="rating" value="5" id="star-5" > <label for="star-5">&#9733;</label> ' +
                            '<input type="radio" name="rating" value="4" id="star-4"> <label for="star-4">&#9733;</label> ' +
                            '<input type="radio" name="rating" value="3" id="star-3" > <label for="star-3">&#9733;</label> ' +
                            '<input type="radio" name="rating" value="2" id="star-2" > <label for="star-2">&#9733;</label> ' +
                            '<input type="radio" name="rating" value="1" id="star-1" > <label for="star-1">&#9733;</label>');
                    }

                    console.log(ratings_arr);*/
                    var so='';
                    var arr_rat = [];
                    for(l=0; l<ratings_arr.length; l++)
                    {
                        var r = ratings_arr[l];
                        for(k=1; k<=r; k++)
                        {
                            arr_rat.push( '<input type="radio" class="rating-'+k+'" name="rating-'+k+'" value="'+k+'" id="star-'+k+'" disabled="disabled"> <label for="star-'+k+'" style="color: gold">&#9733;</label>');
                        }

                        radioButtons.push(arr_rat);
                        arr_rat = [];




                    }



                    for (i=0; i < arr.length; i++)
                    {
                        var id = arr[i].id;
                        var rating = arr[i].classificacao;
                        $("#rating-container-show-"+id).html(radioButtons[i]);
                    }









                }



            },
            error:function(data){
                $('.debug-url').html("A Listagem de Comentarios não foi mostra com sucesso. Verifique a conexão WI-FI e tente novamente.");
                $('#Modalko').modal();
            }
        });
    }

listarPratosDiaSelect();
function listarPratosDiaSelect() {
    var s = "";
    s += '<option value ="">Escolhe o Prato do dia...</option>';
    dataValue = "&task=listarPratosDia";
    $.ajax({
        url: 'admin/prato/prato.php',
        data: dataValue,
        type: 'POST',
        success: function (data) {
            arr = [];
            arr = JSON.parse(data);
            //console.log(data);
            if (arr == null || arr.length < 1) {
                $(".back").hide();
                $(".load").hide();
                $('.debug-url').html('Nao existe pratos do dia registados');
                $('#Modalko').modal();
            } else {
                for (i=0; i < arr['dados'].length; i++)
                {
                    s +='<option value="'+arr['dados'][i].id+'">'+arr['dados'][i].nome_prato+'</option>';

                }

                $("#pratos_dia_select").html(s);

            }

        },
        error: function (data) {
            $(".back").hide();
            $(".load").hide();
            $('.debug-url').html('A listagem dos pratos do dia não foi listado com sucesso, p.f. verifique a ligação Wi-Fi.');
            $('#Modalko').modal();
        }
    });
}

$("#submit_res_poin").on('click', function (e) {
    e.preventDefault();
    var nome_pessoa = $("#nome_pessoa").val();
    var email_pessoa = $("#email_pessoa").val();
    var pratos_dia_select = $("#pratos_dia_select").val();
    var telefone = $("#telefone").val();

    var data_reserva = $("#data_reserva").val();
    var hora_reserva = $("#hora_reserva").val();

    var obs_reserva = $("#obs_reserva").val();

    dataValue="nome_pessoa="+nome_pessoa+"&email_pessoa="+email_pessoa+"&pratos_dia_select="+pratos_dia_select+"&telefone="+telefone+"" +
        "&data_reserva="+data_reserva+"&hora_reserva="+hora_reserva+"&obs_reserva="+obs_reserva+"&task=inserirReserva";


    console.log(dataValue);

    $.ajax({
        url: 'admin/reserva/reserva.php',
        data: dataValue,
        type: 'POST',
        success: function(data) {
            arr = [];
            arr = JSON.parse(data);
            console.log(arr);

            if (arr.error)
            {
                $("#adicionar_reserva").modal('hide');
                $(".back").hide();
                $(".load").show();
                jQuery(".debug-url").html("Por favor, verifique:<br><br>"+arr.error+"<br> Retifique o Erro e tente novamente.");
                $('#Modalko').modal();
            }
            else if (arr.success == 0)
            {
                $("#adicionar_reserva").modal('hide');
                $(".back").hide();
                $(".load").show();
                $('.debug-url').html('A Inserção de Reserva nao foi efectuado com sucesso');
                $('#Modalko').modal();
            }
            else if (arr.success == 1)
            {
                $("#adicionar_reserva").modal('hide');
                $(".back").hide();
                $(".load").show();
                $('.debug-url').html('A Inserção de Reserva foi efectuado com sucesso');
                $('#Modalok').modal();
            }

        },
        error: function(){
            $("#adicionar_reserva").modal('hide');
            $(".back").hide();
            $(".load").show();
            $('.debug-url').html('A Inserção de Reserva nao foi efectuado, p.f. verifique a ligação Wi-Fi.');
            $('#Modalko').modal();

        }
    });

});

$(".btn-cl").on('click', function (e) {
    e.preventDefault();
    $("#nome_pessoa").val('');
    $("#email_pessoa").val('');
    $("#pratos_dia_select").val('');
    $("#telefone").val('');
    $("#obs_reserva").val('');
});
</script>

<!-- //here ends scrolling icon -->
</body>
<!-- //Body -->
</html>