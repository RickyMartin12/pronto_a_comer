<?php
include $_SERVER['DOCUMENT_ROOT'] . '/admin/forms/forms.php';

$nome = $_POST['nome'];
$email = $_POST['email'];
$message = $_POST['message'];

envioInformacoes($nome, $email, $message);