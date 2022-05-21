<?php

require_once $_SERVER['DOCUMENT_ROOT']. '/admin/connect.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require_once $_SERVER['DOCUMENT_ROOT']. '/vendor/autoload.php';

function inserirDados()
{
    $BD = new BaseDeDados;
    $teste = ';';
    $pergunta = "INSERT INTO reserva (nome, email, telefone, data_reserva, hora_reserva, prato, observacoes) VALUES ('aas', '".$teste."', '', '', '', 2, '')";
    $BD->Pergunta($pergunta);
    if ($e = error_get_last()) {
        $r = array('info' =>'erro ao inserir a tabela "reserva" ');
        echo json_encode($r);
        $BD->Fechar(); return false;
    }
    $ultimo_id = $BD->UltimoId();
    $r = array('info' =>'sucesso ao inserir ', 'id' => $ultimo_id);
    echo json_encode($r);
    $BD->Fechar(); return true;
}

// COMENTARIOS

function inserirComentarios($nome, $mensagem, $rating, $ativar)
{
    $err='';
    if ($nome == "")
    {
        $err .= "- Nome da Pessoa <span class='w3-text-red'> * </span><br>";
    }

    if ($mensagem == "")
    {
        $err .= "- Mensagem do Comentário <span class='w3-text-red'> * </span><br>";
    }

    if ($rating == 0)
    {
        $err .= "- Classificação <span class='w3-text-red'> * </span><br>";
    }

    if(!$err)
    {
        $BD = new BaseDeDados;
        $pergunta = "INSERT INTO comentario (nome, mensagem, classificacao, activar_field) VALUES ('".$nome."', '".$mensagem."', '".$rating."', '".$ativar."')";
        $BD->Pergunta($pergunta);
        if ($e = error_get_last()) {
            $r = array('error' => '', 'info' =>'erro ao inserir a tabela "reserva" ', 'success' => '0', 'id' => '');
            echo json_encode($r);
            $BD->Fechar(); return false;
        }
        $ultimo_id = $BD->UltimoId();
        $r = array('info' =>'sucesso ao inserir ', 'id' => $ultimo_id, 'success' => '1', 'error' => '');
        echo json_encode($r);
        $BD->Fechar(); return true;
    }
    else
    {
        $r = array('error' =>$err, 'success' =>'','id' =>'', 'info' => '');
        echo json_encode($r);
    }

}


function listarComentarios()
{
    $BD = new BaseDeDados;
    $var = array();
    $pergunta = "SELECT * FROM comentario WHERE activar_field = 1";
    $BD->Pergunta($pergunta);
    while ($tp = $BD->ResultadoSeguinte()) {
        $var[] = $tp;
    }
    //$tp = $BD->ResultadoParaMatriz();
    echo json_encode($var);
    $BD->Fechar(); return true;

}

//------------------


// TIPOS DE PRATOS

function inserirTipoPrato($tipo_prato)
{
    $err='';
    if ($tipo_prato == "")
    {
        $err .= "- Tipo de Prato <span class='w3-text-red'> * </span><br>";
    }


    if(!$err)
    {
        $BD = new BaseDeDados;
        $pergunta = "INSERT INTO tipo_prato (tipo_prato) VALUES ('".$tipo_prato."')";
        $BD->Pergunta($pergunta);
        if ($e = error_get_last()) {
            $r = array('error' => '', 'info' =>'erro ao inserir a tabela "tipo_prato" ', 'success' => '0', 'id' => '');
            echo json_encode($r);
            $BD->Fechar(); return false;
        }
        $ultimo_id = $BD->UltimoId();
        $r = array('info' =>'O Tipo de Prato foi inserido com sucesso ', 'id' => $ultimo_id, 'success' => '1', 'error' => '');
        echo json_encode($r);
        $BD->Fechar(); return true;
    }
    else
    {
        $r = array('error' =>$err, 'success' =>'','id' =>'', 'info' => '');
        echo json_encode($r);
    }
}


function identifyPratoDiaTipoPrato($tipo_prato)
{
    $BD = new BaseDeDados;
    $pergunta = "SELECT * FROM prato WHERE prato.tipo_prato ='.$tipo_prato.'";

    $BD->Pergunta($pergunta);

    $n_rows = $BD->NumeroResultados();

    if($n_rows >= 1)
    {
        return false;
    }
    else
    {
        return true;
    }
}





function selecccionarTiposComida()
{
    $BD = new BaseDeDados;
    $var = array();
    $var2 = [];
    $result = array();

    $pergunta = "SELECT * FROM tipo_prato";
    $BD->Pergunta($pergunta);
    while ($tp = $BD->ResultadoSeguinte()) {
        $var[] = $tp;

        $var2 += ['bool-'.$tp['id'] => identifyPratoDiaTipoPrato($tp['id'])];
    }
    $var = array('dados' => $var);
    $var2 = array('boolean' => $var2);
    $result = array_merge($var, $var2);
    echo json_encode($result);
    $BD->Fechar(); return true;

}

function pesquisarTiposPrato($tipo_prato_search)
{
    $var = array();
    $var2 = [];
    $result = array();
    $pergunta = 'SELECT * FROM tipo_prato';
    if($tipo_prato_search != '')
    {
        $pergunta .= ' WHERE tipo_prato LIKE "%'.$tipo_prato_search.'%"';
    }
    $BD = new BaseDeDados;
    $BD->Pergunta($pergunta);
    while ($tp = $BD->ResultadoSeguinte()) {
        $var[] = $tp;
        $var2 += ['bool-'.$tp['id'] => identifyPratoDiaTipoPrato($tp['id'])];
    }
    $var = array('dados' => $var);
    $var2 = array('boolean' => $var2);
    $result = array_merge($var, $var2);
    echo json_encode($result);
    $BD->Fechar(); return true;
}


function apagarTipoPrato($id)
{
    $BD = new BaseDeDados;
    $pergunta = "DELETE FROM tipo_prato WHERE id = $id";
    $BD->Pergunta($pergunta);
    if ($e = error_get_last()) {
        echo 0;
        $BD->Fechar(); return false;
    }
    else
    {
        echo 2;
        $BD->Fechar(); return true;
    }
}

function editarTipoPrato($id, $nome)
{
    $err='';
    if ($nome == "")
    {
        $err .= "- Tipo de Prato <span class='w3-text-red'> * </span><br>";
    }

    if(!$err)
    {
        $BD = new BaseDeDados;
        $pergunta = "UPDATE `tipo_prato` SET `tipo_prato` = '".$nome."' WHERE `tipo_prato`.`id` = $id";
        $BD->Pergunta($pergunta);
        if ($e = error_get_last()) {
            $r = array('error' => '', 'info' =>'erro ao actualizar a tabela "tipo de parto" ', 'success' => '0', 'id' => '');
            echo json_encode($r);
            $BD->Fechar(); return false;
        }
        $r = array('info' =>'sucesso ao actualziar a tabela tipo prato ', 'id' => $id, 'success' => '1', 'error' => '');
        echo json_encode($r);
        $BD->Fechar(); return true;
    }
    else
    {
        $r = array('error' =>$err, 'success' =>'','id' =>'', 'info' => '');
        echo json_encode($r);
    }


}

//-------------


// EMAILS

function configMailUser()
{
    // Criando uma nova instâcia
    $mail = new PHPMailer(true);
    $mail->CharSet = 'UTF-8';
    $mail->isSMTP();
    $mail->SMTPDebug = 0;
    $mail->Host = 'smtp.mailgun.org';
    $mail->Port = 587;
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true;
    $mail->Username = 'postmaster@sandbox6dcaff88e9844ceda0aba10d1f10ed64.mailgun.org';
    $mail->Password = '6719ab433b4efcd006af8ce5b27484d4-5e7fba0f-20a5915f';
    return $mail;
}


function envioInformacoes($nome, $email, $message)
{

    $error_message = '';
    $r = array();
    $regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
    if ($nome == '') {
        $error_message .= '<p> - Nome *</p>';
    }
    if ($email == '') {
        $error_message .= '<p> - Email *</p>';
    }
    if ($email != '') {
        if (!preg_match($regex, $email)) {
            $error_message .= " <p> - " . $email . " is not valid </p>";
        }
    }
    if ($message == '') {
        $error_message .= '<p> - Mensagem *</p>';
    }
    if ($error_message == '')
    {
        $mail = configMailUser();
        // Definir o remetente

        // Definir destinatario
        $mail->addAddress($email, 'Envio de Informações');

        // Definir o Assunto
        $mail->Subject = 'Envio de Informações';

        // Definir formato de mensagem HTML
        $mail->isHTML(true);

        // Corpo da Mensagem
        $corpo_informacoes = "<div style='width:95%; margin-left:2.5%;'>
            <h4> Pedido de informações submetido, em breve receberá a informação pretendida.</h4>
            <hr><b>Name: </b> $nome<br /><br />
            <b>Email: </b> $email<br /><br/>
            <b>Message: </b> $message<br />
            <hr>
            <br>Obrigado $nome, Pronto a Comer.
            </div>";


        $mail->Body = $corpo_informacoes;

        // Corpo alternativo caso email não suporte html
        $mail->AltBody = 'Mensangem simples';

        $mail->send();


    }
    else
    {
        $r = array('error' => $error_message, 'success' =>'', 'info' => '');
    }


    echo json_encode($r);

}

// DASHBOARD

function numComentarios()
{
    $BD_comentarios_num = new BaseDeDados;
    $pergunta = "SELECT * FROM comentario WHERE activar_field = 1";
    $BD_comentarios_num->Pergunta($pergunta);
    $num_com = $BD_comentarios_num->NumeroResultados();
    return $num_com;
}


function numPratosDia()
{
    $BD_numPratosDia = new BaseDeDados;
    $pergunta = "SELECT * FROM prato";
    $BD_numPratosDia->Pergunta($pergunta);
    $num_pratos_dia = $BD_numPratosDia->NumeroResultados();
    return $num_pratos_dia;
}

function numTiposPratos()
{
    $BD_numTiposPratos = new BaseDeDados;
    $pergunta = "SELECT * FROM tipo_prato";
    $BD_numTiposPratos->Pergunta($pergunta);
    $num_tipo_prato = $BD_numTiposPratos->NumeroResultados();
    return $num_tipo_prato;
}

function numReservas()
{
    $BD_numReservas = new BaseDeDados;
    $pergunta = "SELECT * FROM reserva";
    $BD_numReservas->Pergunta($pergunta);
    $num_reserva = $BD_numReservas->NumeroResultados();
    return $num_reserva;
}

//-------

// PRATOS

function uploadPratoDia($file)
{
    if(is_array($file))
    {
        if(is_uploaded_file($file['userImage']['tmp_name'])) {
            $sourcePath = $file['userImage']['tmp_name'];
            $targetPath = $_SERVER['DOCUMENT_ROOT'] . "/admin/images/pratos/".$file['userImage']['name'];
            if(move_uploaded_file($sourcePath,$targetPath)) {
                echo $file['userImage']['name'];
                ?>
                <?php
                exit();
            }
        }
    }
}


function inserirPratoDia($nome_prato, $tipo_prato, $preco, $imagem)
{
    $err='';
    if ($nome_prato == "")
    {
        $err .= "- Nome do Prato <span class='w3-text-red'> * </span><br>";
    }
    if ($tipo_prato == "")
    {
        $err .= "- Tipo de Prato <span class='w3-text-red'> * </span><br>";
    }
    if ($preco == "")
    {
        $err .= "- Preço de Prato <span class='w3-text-red'> * </span><br>";
    }

    if(!$err)
    {
        $BD = new BaseDeDados;
        $pergunta = "INSERT INTO prato (nome_prato, tipo_prato , preco, imagem) VALUES ('".$nome_prato."', '".$tipo_prato."', '".$preco."', '".$imagem."' )";
        $BD->Pergunta($pergunta);
        if ($e = error_get_last()) {
            $r = array('error' => '', 'info' =>'erro ao inserir a tabela "prato" ', 'success' => '0', 'id' => '');
            echo json_encode($r);
            $BD->Fechar(); return false;
        }
        $ultimo_id = $BD->UltimoId();
        $r = array('info' =>'O  Prato foi inserido com sucesso ', 'id' => $ultimo_id, 'success' => '1', 'error' => '');
        echo json_encode($r);
        $BD->Fechar(); return true;
    }
    else
    {
        $r = array('error' =>$err, 'success' =>'','id' =>'', 'info' => '');
        echo json_encode($r);
    }
}

// LISTAGEM PRATOS DIA

function identifyReservaPratoDia($prato_dia)
{
    $BD = new BaseDeDados;
    $pergunta = "SELECT * FROM reserva WHERE reserva.prato ='.$prato_dia.'";

    $BD->Pergunta($pergunta);

    $n_rows = $BD->NumeroResultados();

    if($n_rows >= 1)
    {
        return false;
    }
    else
    {
        return true;
    }
}

function selecccionarPratoDia()
{
    $BD = new BaseDeDados;
    $var2 = [];
    $result = array();
    $var = array();
    $pergunta = "SELECT prato.id, prato.nome_prato, prato.tipo_prato as 'tp_id_prato', tipo_prato.tipo_prato, prato.preco, prato.imagem FROM prato INNER JOIN tipo_prato ON tipo_prato.id = prato.tipo_prato";
    $BD->Pergunta($pergunta);
    while ($tp = $BD->ResultadoSeguinte()) {
        $var[] = $tp;
        $var2 += ['bool-'.$tp['id'] => identifyReservaPratoDia($tp['id'])];
    }
    $var = array('dados' => $var);
    $var2 = array('boolean' => $var2);
    $result = array_merge($var, $var2);
    echo json_encode($result);
    $BD->Fechar(); return true;
}

function apagarPratoDia($id)
{
    $BD = new BaseDeDados;
    $pergunta = "DELETE FROM prato WHERE id = $id";
    $BD->Pergunta($pergunta);
    if ($e = error_get_last()) {
        echo 0;
        $BD->Fechar(); return false;
    }
    else
    {
        echo 2;
        $BD->Fechar(); return true;
    }
}

function pesquisaPratosDia($prato_dia_search, $search_tipo_prato_search)
{
    $BD = new BaseDeDados;
    $var2 = [];
    $result = array();
    $var = array();
    $pergunta = "SELECT prato.id, prato.nome_prato, prato.tipo_prato as 'tp_id_prato', tipo_prato.tipo_prato, prato.preco, prato.imagem FROM prato INNER JOIN tipo_prato ON tipo_prato.id = prato.tipo_prato where 1";

    if($prato_dia_search != '')
    {
        $pergunta .= ' and prato.nome_prato LIKE "%'.$prato_dia_search.'%"';
    }

    if($search_tipo_prato_search != '')
    {
        $pergunta .= ' and prato.tipo_prato = "'.$search_tipo_prato_search.'"';
    }

    $BD->Pergunta($pergunta);
    while ($tp = $BD->ResultadoSeguinte()) {
        $var[] = $tp;
        $var2 += ['bool-'.$tp['id'] => identifyReservaPratoDia($tp['id'])];
    }
    $var = array('dados' => $var);
    $var2 = array('boolean' => $var2);
    $result = array_merge($var, $var2);
    echo json_encode($result);
    $BD->Fechar(); return true;
}

function editarPratoDia($id, $nome_prato, $tipo_prato, $preco, $imagem)
{
    $err='';
    if ($nome_prato == "")
    {
        $err .= "- Nome do Prato <span class='w3-text-red'> * </span><br>";
    }
    if ($tipo_prato == "")
    {
        $err .= "- Tipo de Prato <span class='w3-text-red'> * </span><br>";
    }
    if ($preco == "")
    {
        $err .= "- Preço de Prato <span class='w3-text-red'> * </span><br>";
    }

    if(!$err)
    {
        $BD = new BaseDeDados;
        $pergunta = "UPDATE prato SET nome_prato = '".$nome_prato."', tipo_prato = '".$tipo_prato."', preco ='".$preco."', imagem ='".$imagem."' WHERE prato.id = $id";
        $BD->Pergunta($pergunta);
        if ($e = error_get_last()) {
            $r = array('error' => '', 'info' =>'erro ao actualizar a tabela "prato" ', 'success' => '0', 'id' => '');
            echo json_encode($r);
            $BD->Fechar(); return false;
        }
        $r = array('info' =>'O  Prato foi actualizado com sucesso ', 'id' => $id, 'success' => '1', 'error' => '');
        echo json_encode($r);
        $BD->Fechar(); return true;
    }
    else
    {
        $r = array('error' =>$err, 'success' =>'','id' =>'', 'info' => '');
        echo json_encode($r);
    }
}

// RESERVAS

function inserirReserva($nome_pessoa, $email_pessoa, $telefone, $data_reserva, $hora_reserva, $pratos_dia_select, $obs_reserva)
{
    $err = '';

    if ($nome_pessoa == "")
    {
        $err .= "- Nome da Pessoa <span class='w3-text-red'> * </span><br>";
    }
    if ($email_pessoa == "")
    {

        $err .= "- Email da Pessoa <span class='w3-text-red'> * </span><br>";
    }
    else
    {
        if (filter_var($email_pessoa, FILTER_VALIDATE_EMAIL) === false)
        {
            $err .= "- Correio Electrónico (Email) inválido<span class='w3-text-red'> *</span><br>";
        }
    }
    if ($telefone == "")
    {
        $err .= "- Telefone <span class='w3-text-red'> * </span><br>";
    }
    else
    {
        if (is_numeric($telefone))
        {
            if (!(strlen($telefone) >= 9 && strlen($telefone) <= 15))
            {
                $err .= "- O Numero de Telefone da Reserva deve conter pelo menos entre 9 e 15 numeros <span class='w3-text-red'> *</span><br>";
            }
        }
        else
        {
            $err .= "- O Terceiro Numero da Reserva deve ser um numero <span class='w3-text-red'> *</span><br>";
        }
    }

    if ($data_reserva == "")
    {
        $err .= "- Data de Reserva <span class='w3-text-red'> * </span><br>";
    }
    if ($hora_reserva == "")
    {

        $err .= "- Hora de Reserva <span class='w3-text-red'> * </span><br>";
    }


    if ($pratos_dia_select == "")
    {
        $err .= "- Prato do dia <span class='w3-text-red'> * </span><br>";
    }


    if(!$err)
    {
        $BD = new BaseDeDados;
        $pergunta = "INSERT INTO reserva (nome, email, telefone, data_reserva, hora_reserva, prato, observacoes) VALUES ('".$nome_pessoa."', '".$email_pessoa."', '".$telefone."', '".$data_reserva."', '".$hora_reserva."', '".$pratos_dia_select."', '".$obs_reserva."')";
        $BD->Pergunta($pergunta);
        if ($e = error_get_last()) {
            $r = array('error' => '', 'info' =>'erro ao inserir a "reserva" ', 'success' => '0', 'id' => '');
            echo json_encode($r);
            $BD->Fechar(); return false;
        }
        $ultimo_id = $BD->UltimoId();

        //$pratos_dia_select

        $BD2 = new BaseDeDados;
        $pergunta2="SELECT * FROM prato WHERE id = $pratos_dia_select";
        $BD2->Pergunta($pergunta2);

        $prato_dia= $BD2->ResultadoSeguinte();
        $p = $prato_dia['nome_prato'];


        $html = '
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<style>
.title-black-white {
    background: RGB(12,12,12);
    color: #FFF!important;
}
.right {
    float: right;
    width: 68px;
    position: absolute;
    padding: 10px;
  }
  .botm
  {
    margin-bottom: 40px;
  }
  .center {
    display: block;
    margin-left: 280px;
    margin-right: 280px;
    right: 100px;
  }
  .line-bord {
    border: 1px solid RGB(12,12,12);
}
.mylabel {
    color: #333;
    background: #87CEEB !important;
}
.align_div {
    margin-bottom: 15px;
}
.w3-padding-8 {
    padding-top: 8px!important;
    padding-bottom: 8px!important;
}
.w3-card-2, .w3-example {
    box-shadow: 0 2px 4px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12)!important;
}
.bolder
{
    font-weight:bold;
}
</style>

<img src="../../logo/teste.png" class="center">
<div class="botm"></div>
<h3 style="text-align: center;" class="bolder"> Pronto a Comer - Conteudo da Reserva '.$ultimo_id.'</h3>
<div class="botm"></div>
<div class="line-bord">
<img src="../../logo/teste.png" class="right">
<div class="modal-header title-black-white">
    <h4 class="modal-title bolder" style="color: #fff;"><img src="../../icons/agenda.svg" class="img-responsive"> Reserva Numero '.$ultimo_id.'</h4> 
</div>
<div class="form-horizontal" id="form">
<div class="panel-body" style="padding: 16px; margin-top: -10px;">
<h5 class="col-xs-12 mylabel w3-padding-8 w3-card-2 align_div bolder"> 
<img src="../../icons/user.png" class="img-responsive">&nbsp;&nbsp;Detalhes Pessoais
</h5>
<div class="container">
<div class="row">

<div class="col-xs-12 col-md-6">
<div class="form-group">
<font class="bolder">Nome da Pessoa:</font> '.$nome_pessoa.'
</div>
</div>

<div class="col-xs-12 col-md-6">
<div class="form-group">
<font class="bolder" >Email:</font> '.$email_pessoa.'
</div>
</div>

<div class="col-xs-12 col-md-6">
<div class="form-group">
<font class="bolder" >Telemóvel:</font> '.$telefone.'
</div>
</div>

<h5 class="col-xs-12 mylabel w3-padding-8 w3-card-2 align_div bolder"> 
<img src="../../icons/open-book.png" class="img-responsive">&nbsp;&nbsp;Marcação da Reserva
</h5>

<div class="container">
<div class="row">

<div class="col-xs-12 col-md-6">
<div class="form-group">
<font class="bolder">Data de Reserva:</font> '.$data_reserva.'
</div>
</div>

<div class="col-xs-12 col-md-6">
<div class="form-group">
<font class="bolder">Hora de Reserva:</font> '.$hora_reserva.'
</div>
</div>

</div>
</div>


<h5 class="col-xs-12 mylabel w3-padding-8 w3-card-2 align_div bolder"> 
<img src="../../icons/comer.png" class="img-responsive">&nbsp;&nbsp;Prato a reservar
</h5>

<div class="container">
<div class="row">

<div class="col-xs-12 col-md-6">
<div class="form-group">
<font class="bolder">Prato:</font> '.$p.'
</div>
</div>

</div>
</div>



<h5 class="col-xs-12 mylabel w3-padding-8 w3-card-2 align_div bolder"> 
<img src="../../icons/com.png" class="img-responsive">&nbsp;&nbsp;Comentarios Finais
</h5>

<div class="container">
<div class="row">

<div class="col-xs-12 col-md-6">
<div class="form-group">
<font class="bolder">Comentarios Finais:</font> '.$obs_reserva.'
</div>
</div>


</div>
</div>


</div>
</div>






</div>
</div>

</div>

<br>
Cumprimentos
<br>
Carlos Peres - CEO "Pronto a Comer "

';

        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($html);

        $filename = "Reserva - ".$ultimo_id.".pdf";

        $attachment = $mpdf->Output($filename, 'S');

        $mail = new PHPMailer(true);

        $mail->CharSet = 'UTF-8';

        $mail->isSMTP();

        $mail->SMTPDebug = 0;

        $mail->Host = 'smtp.mailgun.org';

        $mail->Port = 587;

        $mail->SMTPSecure = 'tls';

        $mail->SMTPAuth = true;

        $mail->Username = 'postmaster@sandbox6dcaff88e9844ceda0aba10d1f10ed64.mailgun.org';

        $mail->Password = '6719ab433b4efcd006af8ce5b27484d4-5e7fba0f-20a5915f';

        $mail->setFrom('postmaster@sandbox6dcaff88e9844ceda0aba10d1f10ed64.mailgun.org', 'Curso');

        $mail->addReplyTo('postmaster@sandbox6dcaff88e9844ceda0aba10d1f10ed64.mailgun.org', 'Curso');

        $mail->addAddress($email_pessoa, 'Destinatário');

        $mail->addAddress('martinscarlos799@gmail.com', 'Destinatário');

        $mail->Subject = 'Reservas';

        $mail->isHTML(true);

        $mail->Body = 'Uma mensagem <strong> Negrito </strong>';

        $mail->AltBody = 'Mensangem simples';

        $mail->addStringAttachment($attachment, $filename, 'base64', 'application/pdf');

        // Envia a mensagem e verifica os erros
        if (!$mail->send()) {
            $r = array('error' => '', 'info' =>'erro ao enviar o envio de informações "Envio de Informações" ', 'success' => '0');
        } else {
            $r = array('info' =>'sucesso ao inserir a reserva ', 'id' => $ultimo_id, 'success' => '1', 'error' => '');
        }

        echo json_encode($r);
        $BD->Fechar(); return true;
    }
    else
    {
        $r = array('error' =>$err, 'success' =>'','id' =>'', 'info' => '');
        echo json_encode($r);
    }

}

function listarReservas()
{
    $BD = new BaseDeDados;
    $var2 = [];
    $result = array();
    $var = array();
    $pergunta = "SELECT reserva.id, reserva.nome, reserva.email, reserva.telefone, reserva.data_reserva, reserva.hora_reserva, reserva.prato, prato.nome_prato, reserva.observacoes FROM reserva INNER JOIN prato ON prato.id = reserva.prato";
    $BD->Pergunta($pergunta);
    while ($tp = $BD->ResultadoSeguinte()) {
        $var[] = $tp;
    }
    echo json_encode($var);
    $BD->Fechar(); return true;
}

function pesquisarReservas($nome_pessoa_search, $email_pessoa_search, $pratos_dia_select_search, $data_reserva_search)
{
    $BD = new BaseDeDados;
    $var2 = [];
    $result = array();
    $var = array();
    $pergunta = "SELECT reserva.id, reserva.nome, reserva.email, reserva.telefone, reserva.data_reserva, reserva.hora_reserva, reserva.prato, prato.nome_prato, reserva.observacoes FROM reserva INNER JOIN prato ON prato.id = reserva.prato WHERE 1";

    if($nome_pessoa_search != '')
    {
        $pergunta .= ' and reserva.nome LIKE "%'.$nome_pessoa_search.'%"';
    }

    if($email_pessoa_search != '')
    {
        $pergunta .= ' and reserva.email LIKE "%'.$email_pessoa_search.'%"';
    }

    if($pratos_dia_select_search != '')
    {
        $pergunta .= ' and reserva.prato = "'.$pratos_dia_select_search.'"';
    }

    if($data_reserva_search != '')
    {
        $pergunta .= ' and reserva.data_reserva = "'.$data_reserva_search.'"';
    }



    $BD->Pergunta($pergunta);
    while ($tp = $BD->ResultadoSeguinte()) {
        $var[] = $tp;
    }
    echo json_encode($var);
    $BD->Fechar(); return true;
}


function apagarReserva($id)
{
    $BD = new BaseDeDados;
    $pergunta = "DELETE FROM reserva WHERE id = $id";
    $BD->Pergunta($pergunta);
    if ($e = error_get_last()) {
        echo 0;
        $BD->Fechar(); return false;
    }
    else
    {
        echo 2;
        $BD->Fechar(); return true;
    }
}

function editarReserva($id, $nome_pessoa_edit, $email_pessoa_edit, $telefone_edit, $data_reserva_edit, $hora_reserva_edit, $pratos_dia_select_edit, $obs_reserva_edit)
{
    $err = '';

    if ($nome_pessoa_edit == "")
    {
        $err .= "- Nome da Pessoa <span class='w3-text-red'> * </span><br>";
    }
    if ($email_pessoa_edit == "")
    {

        $err .= "- Email da Pessoa <span class='w3-text-red'> * </span><br>";
    }
    else
    {
        if (filter_var($email_pessoa_edit, FILTER_VALIDATE_EMAIL) === false)
        {
            $err .= "- Correio Electrónico (Email) inválido<span class='w3-text-red'> *</span><br>";
        }
    }
    if ($telefone_edit == "")
    {
        $err .= "- Preço de Prato <span class='w3-text-red'> * </span><br>";
    }
    else
    {
        if (is_numeric($telefone_edit))
        {
            if (!(strlen($telefone_edit) >= 9 && strlen($telefone_edit) <= 15))
            {
                $err .= "- O Numero de Telefone da Reserva deve conter pelo menos entre 9 e 15 numeros <span class='w3-text-red'> *</span><br>";
            }
        }
        else
        {
            $err .= "- O Terceiro Numero da Reserva deve ser um numero <span class='w3-text-red'> *</span><br>";
        }
    }

    if ($data_reserva_edit == "")
    {
        $err .= "- Data de Reserva <span class='w3-text-red'> * </span><br>";
    }
    if ($hora_reserva_edit == "")
    {

        $err .= "- Hora de Reserva <span class='w3-text-red'> * </span><br>";
    }


    if ($pratos_dia_select_edit == "")
    {
        $err .= "- Prato do dia <span class='w3-text-red'> * </span><br>";
    }


    if(!$err) {
        $BD = new BaseDeDados;
        $pergunta="UPDATE reserva SET nome = '".$nome_pessoa_edit."', email = '".$email_pessoa_edit."', telefone = '".$telefone_edit."', email = '".$email_pessoa_edit."', data_reserva = '".$data_reserva_edit."', hora_reserva = '".$hora_reserva_edit."', prato  = '".$pratos_dia_select_edit."', observacoes  = '".$obs_reserva_edit."'  WHERE reserva.id = $id";
        $BD->Pergunta($pergunta);
        if ($e = error_get_last()) {
            $r = array('error' => '', 'info' => 'erro ao actualizar a "reserva" ', 'success' => '0', 'id' => '');
            echo json_encode($r);
            $BD->Fechar();
            return false;
        }

        //$pratos_dia_select

        $BD2 = new BaseDeDados;
        $pergunta2 = "SELECT * FROM prato WHERE id = $pratos_dia_select_edit";
        $BD2->Pergunta($pergunta2);

        $prato_dia = $BD2->ResultadoSeguinte();
        $p = $prato_dia['nome_prato'];



        $html_edit = '
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<style>
.title-black-white {
    background: RGB(12,12,12);
    color: #FFF!important;
}
.right {
    float: right;
    width: 68px;
    position: absolute;
    padding: 10px;
  }
  .botm
  {
    margin-bottom: 40px;
  }
  .center {
    display: block;
    margin-left: 280px;
    margin-right: 280px;
    right: 100px;
  }
  .line-bord {
    border: 1px solid RGB(12,12,12);
}
.mylabel {
    color: #333;
    background: #87CEEB !important;
}
.align_div {
    margin-bottom: 15px;
}
.w3-padding-8 {
    padding-top: 8px!important;
    padding-bottom: 8px!important;
}
.w3-card-2, .w3-example {
    box-shadow: 0 2px 4px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12)!important;
}
.bolder
{
    font-weight:bold;
}
</style>

<img src="../../logo/teste.png" class="center">
<div class="botm"></div>
<h3 style="text-align: center;" class="bolder"> Pronto a Comer - Conteudo da Reserva '.$id.'</h3>
<div class="botm"></div>
<div class="line-bord">
<img src="../../logo/teste.png" class="right">
<div class="modal-header title-black-white">
    <h4 class="modal-title bolder" style="color: #fff;"><img src="../../icons/agenda.svg" class="img-responsive"> Reserva Numero '.$id.'</h4> 
</div>
<div class="form-horizontal" id="form">
<div class="panel-body" style="padding: 16px; margin-top: -10px;">
<h5 class="col-xs-12 mylabel w3-padding-8 w3-card-2 align_div bolder"> 
<img src="../../icons/user.png" class="img-responsive">&nbsp;&nbsp;Detalhes Pessoais
</h5>
<div class="container">
<div class="row">

<div class="col-xs-12 col-md-6">
<div class="form-group">
<font class="bolder">Nome da Pessoa:</font> '.$nome_pessoa_edit.'
</div>
</div>

<div class="col-xs-12 col-md-6">
<div class="form-group">
<font class="bolder" >Email:</font> '.$email_pessoa_edit.'
</div>
</div>

<div class="col-xs-12 col-md-6">
<div class="form-group">
<font class="bolder" >Telemóvel:</font> '.$telefone_edit.'
</div>
</div>

<h5 class="col-xs-12 mylabel w3-padding-8 w3-card-2 align_div bolder"> 
<img src="../../icons/open-book.png" class="img-responsive">&nbsp;&nbsp;Marcação da Reserva
</h5>

<div class="container">
<div class="row">

<div class="col-xs-12 col-md-6">
<div class="form-group">
<font class="bolder">Data de Reserva:</font> '.$data_reserva_edit.'
</div>
</div>

<div class="col-xs-12 col-md-6">
<div class="form-group">
<font class="bolder">Hora de Reserva:</font> '.$hora_reserva_edit.'
</div>
</div>

</div>
</div>


<h5 class="col-xs-12 mylabel w3-padding-8 w3-card-2 align_div bolder"> 
<img src="../../icons/comer.png" class="img-responsive">&nbsp;&nbsp;Prato a reservar
</h5>

<div class="container">
<div class="row">

<div class="col-xs-12 col-md-6">
<div class="form-group">
<font class="bolder">Prato:</font> '.$p.'
</div>
</div>

</div>
</div>



<h5 class="col-xs-12 mylabel w3-padding-8 w3-card-2 align_div bolder"> 
<img src="../../icons/com.png" class="img-responsive">&nbsp;&nbsp;Comentarios Finais
</h5>

<div class="container">
<div class="row">

<div class="col-xs-12 col-md-6">
<div class="form-group">
<font class="bolder">Comentarios Finais:</font> '.$obs_reserva_edit.'
</div>
</div>


</div>
</div>


</div>
</div>






</div>
</div>

</div>

<br>
Cumprimentos
<br>
Carlos Peres - CEO "Pronto a Comer "

';

        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($html_edit);

        $filename = "Reserva de edição - ".$id.".pdf";

        $attachment = $mpdf->Output($filename, 'S');

        $mail = new PHPMailer(true);

        $mail->CharSet = 'UTF-8';

        $mail->isSMTP();

        $mail->SMTPDebug = 0;

        $mail->Host = 'smtp.gmail.com';

        $mail->Port = 587;

        $mail->SMTPSecure = 'tls';

        $mail->SMTPAuth = true;

        $mail->Username = 'martinscarlos799@gmail.com';

        $mail->Password = 'trymy2begee4mor';

        $mail->setFrom('martinscarlos799@gmail.com', 'Curso');

        $mail->addReplyTo('martinscarlos799@gmail.com', 'Curso');

        $mail->addAddress($email_pessoa_edit, 'Destinatário');

        $mail->addAddress('martinscarlos799@gmail.com', 'Destinatário');

        $mail->Subject = 'Reservas';

        $mail->isHTML(true);

        $mail->Body = 'Uma mensagem <strong> Negrito </strong>';

        $mail->AltBody = 'Mensangem simples';

        $mail->addStringAttachment($attachment, $filename, 'base64', 'application/pdf');

        // Envia a mensagem e verifica os erros
        if (!$mail->send()) {
            $r = array('error' => '', 'info' =>'erro ao enviar o envio de informações "Envio de Informações" ', 'success' => '0');
        } else {
            $r = array('info' =>'sucesso ao actualizar a reserva ', 'id' => $id, 'success' => '1', 'error' => '');
        }

        /*$r = array('info' =>'sucesso ao actualizar a reserva ', 'id' => $id, 'success' => '1', 'error' => '');
        */
        echo json_encode($r);
        $BD->Fechar(); return true;
    }
    else
    {
        $r = array('error' =>$err, 'success' =>'','id' =>'', 'info' => '');
        echo json_encode($r);
    }


}

// COMENTARIOS

function inserirComentariosAdmin($nome_pess, $mensagem_pess, $classificacao, $activar_field)
{
    $err='';
    if ($nome_pess == "")
    {
        $err .= "- Nome da Pessoa <span class='w3-text-red'> * </span><br>";
    }

    if ($mensagem_pess == "")
    {
        $err .= "- Mensagem do Comentário <span class='w3-text-red'> * </span><br>";
    }

    if ($classificacao == 0)
    {
        $err .= "- Classificação <span class='w3-text-red'> * </span><br>";
    }

    if(!$err)
    {
        $BD = new BaseDeDados;
        $pergunta = "INSERT INTO comentario (nome, mensagem, classificacao, activar_field) VALUES ('".$nome_pess."', '".$mensagem_pess."', '".$classificacao."', '".$activar_field."')";
        $BD->Pergunta($pergunta);
        if ($e = error_get_last()) {
            $r = array('error' => '', 'info' =>'erro ao inserir a tabela "comentarios" ', 'success' => '0', 'id' => '');
            echo json_encode($r);
            $BD->Fechar(); return false;
        }
        $ultimo_id = $BD->UltimoId();
        $r = array('info' =>'sucesso ao inserir comentarios', 'id' => $ultimo_id, 'success' => '1', 'error' => '');
        echo json_encode($r);
        $BD->Fechar(); return true;
    }
    else
    {
        $r = array('error' =>$err, 'success' =>'','id' =>'', 'info' => '');
        echo json_encode($r);
    }
}

//listarReservas();


function listarComentariosAdmin()
{
    $BD = new BaseDeDados;
    $var = array();
    $pergunta = "SELECT * FROM comentario";
    $BD->Pergunta($pergunta);
    while ($tp = $BD->ResultadoSeguinte()) {
        $var[] = $tp;
    }
    //$tp = $BD->ResultadoParaMatriz();
    echo json_encode($var);
    $BD->Fechar(); return true;

}


function editarComent($nome_p_edit, $mens_p_edit, $classif, $act, $id)
{
    $err='';
    if ($nome_p_edit == "")
    {
        $err .= "- Nome da Pessoa <span class='w3-text-red'> * </span><br>";
    }

    if ($mens_p_edit == "")
    {
        $err .= "- Mensagem do Comentário <span class='w3-text-red'> * </span><br>";
    }

    if ($classif == 0)
    {
        $err .= "- Classificação <span class='w3-text-red'> * </span><br>";
    }

    if(!$err)
    {
        $BD = new BaseDeDados;
        $pergunta="UPDATE comentario SET nome = '".$nome_p_edit."', mensagem = '".$mens_p_edit."', classificacao = '".$classif."', activar_field = '".$act."' WHERE comentario.id = $id";
        $BD->Pergunta($pergunta);
        if ($e = error_get_last()) {
            $r = array('error' => '', 'info' =>'erro ao actualizar a tabela "comentarios" ', 'success' => '0', 'id' => '');
            echo json_encode($r);
            $BD->Fechar(); return false;
        }
        $ultimo_id = $BD->UltimoId();
        $r = array('info' =>'sucesso ao actualizar comentarios', 'id' => $id, 'success' => '1', 'error' => '');
        echo json_encode($r);
        $BD->Fechar(); return true;
    }
    else
    {
        $r = array('error' =>$err, 'success' =>'','id' =>'', 'info' => '');
        echo json_encode($r);
    }
}


function apagarCom($id)
{
    $BD = new BaseDeDados;
    $pergunta = "DELETE FROM comentario WHERE id = $id";
    $BD->Pergunta($pergunta);
    if ($e = error_get_last()) {
        echo 0;
        $BD->Fechar(); return false;
    }
    else
    {
        echo 2;
        $BD->Fechar(); return true;
    }
}

function listarComentariosAdminSearch($clas_com_search, $act_search)
{
    $BD = new BaseDeDados;
    $var2 = [];
    $result = array();
    $var = array();
    $pergunta = "SELECT * FROM comentario WHERE 1";

    if($clas_com_search != '')
    {
        $pergunta .= ' and classificacao = "'.$clas_com_search.'"';
    }

    $pergunta .= ' and activar_field = '.$act_search;



    $BD->Pergunta($pergunta);
    while ($tp = $BD->ResultadoSeguinte()) {
        $var[] = $tp;
    }
    echo json_encode($var);
    $BD->Fechar(); return true;
}
