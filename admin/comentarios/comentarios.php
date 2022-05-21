<?php
include $_SERVER['DOCUMENT_ROOT'] . '/admin/forms/forms.php';


switch ($_POST['task'])
{
    case 'inserirComentarios':

        $nome = $_POST['nome'];

        $mensagem = $_POST['mensagem'];

        $classificacao = $_POST['classificacao'];

        $activar_field = $_POST['activar_field'];

        inserirComentarios($nome, $mensagem, $classificacao, $activar_field);

    break;

    case 'listarComentarios':

        listarComentarios();

    break;


    case 'inserirComentariosAdmin':


        $nome_pess = $_POST['nome_pess'];

        $mensagem_pess = $_POST['mensagem_pess'];

        $classificacao = $_POST['classificacao'];

        $activar_field = $_POST['activar_field'];

        inserirComentariosAdmin($nome_pess, $mensagem_pess, $classificacao, $activar_field);

    break;

    case 'listarComentariosAdmin':

        listarComentariosAdmin();

    break;

    case 'editarComent':

        $nome_p_edit = $_POST['nome_p_edit'];

        $mens_p_edit = $_POST['mens_p_edit'];

        $classif = $_POST['classif'];

        $act = $_POST['act'];

        $id = $_POST['id'];

        editarComent($nome_p_edit, $mens_p_edit, $classif, $act, $id);

    break;

    case 'apagarCom':

        $id = $_POST['id'];

        //echo $id;

        apagarCom($id);

     break;

    case 'listarComentariosAdminSearch':

        $clas_com_search = $_POST['clas_com_search'];

        $act_search = $_POST['act_search'];

        listarComentariosAdminSearch($clas_com_search, $act_search);

     break;
}