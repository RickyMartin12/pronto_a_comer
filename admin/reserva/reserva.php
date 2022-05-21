<?php


include $_SERVER['DOCUMENT_ROOT'] . '/admin/forms/forms.php';


switch ($_POST['task']) {
    case 'inserirReserva':


        $nome_pessoa = $_POST['nome_pessoa'];
        $email_pessoa = $_POST['email_pessoa'];
        $pratos_dia_select = $_POST['pratos_dia_select'];
        $telefone = $_POST['telefone'];

        $data_reserva = $_POST['data_reserva'];
        $hora_reserva = $_POST['hora_reserva'];
        $obs_reserva = $_POST['obs_reserva'];


        inserirReserva($nome_pessoa, $email_pessoa, $telefone, $data_reserva, $hora_reserva, $pratos_dia_select, $obs_reserva);

        break;

    case 'listarReservas':

        listarReservas();

        break;

    case 'pesquisarReservas':

        $nome_pessoa_search = $_POST['nome_pessoa_search'];

        $email_pessoa_search = $_POST['email_pessoa_search'];

        $pratos_dia_select_search = $_POST['pratos_dia_select_search'];

        $data_reserva_search = $_POST['data_reserva_search'];

        pesquisarReservas($nome_pessoa_search, $email_pessoa_search, $pratos_dia_select_search, $data_reserva_search);

        break;

    case 'apagarReserva':

        $id = $_POST['id'];

        //echo $id;

        apagarReserva($id);

        break;

    case 'editarReserva':

        $nome_pessoa_edit = $_POST['nome_pessoa_edit'];

        $email_pessoa_edit = $_POST['email_pessoa_edit'];

        $telefone_edit = $_POST['telefone_edit'];

        $data_reserva_edit = $_POST['data_reserva_edit'];

        $hora_reserva_edit = $_POST['hora_reserva_edit'];

        $pratos_dia_select_edit = $_POST['pratos_dia_select_edit'];

        $obs_reserva_edit = $_POST['obs_reserva_edit'];

        $id = $_POST['id'];

        editarReserva($id, $nome_pessoa_edit, $email_pessoa_edit, $telefone_edit, $data_reserva_edit, $hora_reserva_edit, $pratos_dia_select_edit, $obs_reserva_edit);

        break;

}