<?php
require_once $_SERVER['DOCUMENT_ROOT']. '/admin/connect.php';

session_start();

$err='';
$err_login = '';
$success = '';


if (!$_POST['username'])
    $err .= '- Utilizador * <br>';
else
    $username = $_POST['username'];

if (!$_POST['password'])
    $err .= '- Password * <br>';
else
    $password=$_POST['password'];

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    if($err == '')
    {
        $username = $_POST['username'];
        $password = md5(trim($_POST['password']));

        $BD = new BaseDeDados;
        $pergunta = "SELECT * FROM admins WHERE nome='$username' AND pass='$password'";

        $BD->Pergunta($pergunta);

        $n_rows = $BD->NumeroResultados();

        if($n_rows == 1)
        {
            $dados_user = $BD->ResultadoSeguinte();

            $_SESSION['pr_uid']=$dados_user['id'];
            $_SESSION['user_name']=$dados_user['nome'];
            $_SESSION['privilegios'] = $dados_user['tipo'];
            $_SESSION['access'] = $dados_user['privilegios'];
            $_SESSION['imagem'] = $dados_user['imagem'];

            $s = $_SESSION['privilegios'];
            $setpriv = "SELECT * FROM privilegios WHERE tipo= '$s' ";

            $BD->Fechar();

            $BD_privilegios = new BaseDeDados;

            $BD_privilegios->Pergunta($setpriv);

            $n_resultados_privilegios = $BD_privilegios->NumeroResultados();

            if($n_resultados_privilegios > 0)
            {
                while ($res_pri_access = $BD_privilegios->ResultadoSeguinte()) {
                    $_SESSION['novo_prato'] = $res_pri_access['novo_prato'];
                    $_SESSION['listar_pratos'] = $res_pri_access['listar_pratos'];
                    $_SESSION['tipos_prato_novo'] = $res_pri_access['tipos_prato_novo'];

                    $_SESSION['listar_tipos_partos'] = $res_pri_access['listar_tipos_partos'];
                    $_SESSION['criar_testemunhos'] = $res_pri_access['criar_testemunhos'];
                    $_SESSION['listar_testemunhos'] = $res_pri_access['listar_testemunhos'];

                    $_SESSION['criar_reserva'] = $res_pri_access['criar_reserva'];
                    $_SESSION['listar_reserva'] = $res_pri_access['listar_reserva'];
                    $_SESSION['criar_users'] = $res_pri_access['criar_users'];

                    $_SESSION['listar_users'] = $res_pri_access['listar_users'];
                }
            }


            setcookie("user_name", $_SESSION['user_name'], time() + (86400 * 30), "/");
            setcookie("id", $_SESSION['pr_uid'], time() + (86400 * 30), "/");
            setcookie("privilegios", $_SESSION['privilegios'], time() + (86400 * 30), "/");

            setcookie("novo_prato", $_SESSION['novo_prato'], time() + (86400 * 30), "/");
            setcookie("listar_pratos", $_SESSION['listar_pratos'], time() + (86400 * 30), "/");
            setcookie("tipos_prato_novo", $_SESSION['tipos_prato_novo'], time() + (86400 * 30), "/");
            setcookie("listar_tipos_partos", $_SESSION['listar_tipos_partos'], time() + (86400 * 30), "/");

            setcookie("criar_testemunhos", $_SESSION['criar_testemunhos'], time() + (86400 * 30), "/");
            setcookie("listar_testemunhos", $_SESSION['listar_testemunhos'], time() + (86400 * 30), "/");

            setcookie("criar_reserva", $_SESSION['criar_reserva'], time() + (86400 * 30), "/");
            setcookie("listar_reserva", $_SESSION['listar_reserva'], time() + (86400 * 30), "/");

            setcookie("criar_users", $_SESSION['criar_users'], time() + (86400 * 30), "/");
            setcookie("listar_users", $_SESSION['listar_users'], time() + (86400 * 30), "/");


            setcookie("access", $_SESSION['access'], time() + (86400 * 30), "/");
            setcookie("imagem", $_SESSION['imagem'], time() + (86400 * 30), "/");
            //echo $_COOKIE['imagem'];
            $success='../admin/index.php';
            $arr = array('error'=>'', 'success'=>$success);


            $BD_privilegios->Fechar();




        }
        else
        {
            $err_login = 'Utilizador ou Password incorretos';
            $arr = array('error'=>$err_login, 'id'=>'', 'success'=>'');

        }


    }
    else
    {
        $arr = array('error'=>$err, 'id'=>'', 'success'=>'');
    }


    echo json_encode($arr);


}