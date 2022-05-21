<?php
session_start();

if (session_destroy()) {
    setcookie("user", "", 0, "/");
    setcookie("id", "", 0, "/");

    setcookie("user_name", "", 0, "/");
    setcookie("id", "", 0, "/");
    setcookie("privilegios", "", 0, "/");

    setcookie("novo_prato", "", 0, "/");
    setcookie("listar_pratos", "", 0, "/");
    setcookie("tipos_prato_novo", "", 0, "/");
    setcookie("listar_tipos_partos", "", 0, "/");

    setcookie("criar_testemunhos", "", 0, "/");
    setcookie("listar_testemunhos", "", 0, "/");

    setcookie("criar_reserva", "", 0, "/");
    setcookie("listar_reserva", "", 0, "/");

    setcookie("criar_users", "", 0, "/");
    setcookie("listar_users", "", 0, "/");


    setcookie("access", "", 0, "/");
    setcookie("imagem", "", 0, "/");


    echo '
    <html lang="pt-br"> 
    <head><meta http-equiv="Content-Type" content="text/html; charset=euc-jp">
    <link rel="stylesheet" href="css/bootstrap.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="icon" href="../logo/teste.png" type="image/x-icon"/>
    <script type="text/javascript">
    var count = 5;
    var redirect = "login.php";
     
    function countDown(){
        var timer = document.getElementById("timer");
        if(count > 0){
            count--;
            timer.innerHTML = ""+count+" seconds.";
            setTimeout("countDown()", 1000);
        }else{
            window.location.href = redirect;
        }
    }
    </script>
    <hr style="margin-top:10%;">
    <h2 style="text-align:center;">Terminou a Sessão!</h2><br><h3 style="text-align:center;">A Redireccionar em <span id="timer"></span> <br></h3>
    <hr>
    <p style="text-align:center;">
    </p>
    
    <script type="text/javascript">countDown();</script>
    </span>';
}


?>