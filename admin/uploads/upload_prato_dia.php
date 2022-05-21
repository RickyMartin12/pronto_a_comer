<?php
include $_SERVER['DOCUMENT_ROOT'] . '/admin/forms/forms.php';


switch ($_POST['task'])
{
    case 'uploadPartoDia':

        uploadPratoDia($_FILES);

        break;


}