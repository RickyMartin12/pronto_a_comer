<?php
include $_SERVER['DOCUMENT_ROOT'] . '/admin/forms/forms.php';


switch ($_POST['task'])
{
    case 'inserirTipoPrato':

        $tipo_prato = $_POST['tipo_prato'];

        inserirTipoPrato($tipo_prato);

        break;

    case 'listarTiposPratos':

        selecccionarTiposComida();

        break;

    case 'pesquisaTiposPratos':

        $tipo_prato_search = $_POST['tipo_prato_search'];

        pesquisarTiposPrato($tipo_prato_search);

        break;

    case 'apagarTipoPrato':

        $id = $_POST['id'];

        apagarTipoPrato($id);

        break;

    case 'editarTipoPrato':
        $id = $_POST['id'];
        $col = 'col_2_'.$id;

        $nome = $_POST[$col];

        editarTipoPrato($id, $nome);

        break;

    case 'inserirPratoDia':

        $nome_prato = $_POST['nome_prato'];

        $tipo_prato = $_POST['tipo_prato'];

        $preco = $_POST['preco'];

        $imagem = $_POST['imagem'];

        inserirPratoDia($nome_prato, $tipo_prato, $preco, $imagem);

        break;

    case 'listarPratosDia':

        selecccionarPratoDia();

        break;

    case 'apagarPratoDia':

        $id = $_POST['id'];

        apagarPratoDia($id);

        break;

    case 'pesquisaPratosDia':

        $prato_dia_search = $_POST['prato_dia_search'];

        $search_tipo_prato_search = $_POST['search_tipo_prato_search'];

        pesquisaPratosDia($prato_dia_search, $search_tipo_prato_search);

        break;

    case 'editarPratoDia':

        $nome_prato = $_POST['nome_prato'];

        $tipos_prato = $_POST['tipos_prato'];

        $preco = $_POST['preco'];

        $image = $_POST['image'];

        $id = $_POST['id'];

        editarPratoDia($id, $nome_prato, $tipos_prato, $preco, $image);

        break;

}