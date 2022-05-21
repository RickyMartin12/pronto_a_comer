<script src="js/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- Menu - Novo Tipo Prato -->
<script>

    $("#submit_tipo_prato").submit(function (e) {
        $(".back").show();
        $(".load").show();
        e.preventDefault();
        dataValue = $(this).serialize();
        dataValue += "&task=inserirTipoPrato";
        console.log(dataValue);
        $.ajax({
            url:'prato/prato.php',
            data:dataValue,
            type:'POST',
            success: function(data) {
                arr = [];
                arr = JSON.parse(data);
                console.log(arr);

                if (arr.error)
                {
                    $(".back").hide();
                    $(".load").show();
                    jQuery(".debug-url").html("Por favor, verifique:<br><br>"+arr.error+"<br> Retifique o Erro e tente novamente.");
                    $('#Modalko').modal();
                }
                else if (arr.success == 0)
                {
                    $(".back").hide();
                    $(".load").show();
                    $('.debug-url').html('A Criação do tipo de prato nao foi adicionado com sucesso');
                    $('#Modalko').modal();
                }
                else if (arr.success == 1)
                {
                    $(".back").hide();
                    $(".load").show();
                    $('.debug-url').html('A Criação do tipo de prato foi adicionado com sucesso');
                    $("#submit_tipo_prato")[0].reset();
                    $('#Modalok').modal();



                }

            },
            error: function(){
                $(".back").hide();
                $(".load").show();
                $('.debug-url').html('O registo do tipo de prato não foi criado, p.f. verifique a ligação Wi-Fi.');
                $('#Modalko').modal();

            }

        });
    });
</script>

<!-- // Menu - Novo Tipo Prato -->

<!-- Menu - Listar Tipo Prato -->
<script>
    listarTiposPratos();
    function listarTiposPratos()
    {
        $(".back").show();
        $(".load").show();
        var s = "";
        var bool = '';
        dataValue="&task=listarTiposPratos";
        $.ajax({
            url: 'prato/prato.php',
            data: dataValue,
            type: 'POST',
            success: function (data) {
                arr=[];
                arr =  JSON.parse(data);
                if (arr == null || arr.length < 1){
                    $(".back").hide();
                    $(".load").show();
                    $('.debug-url').html('Nao existe tipos de pratos registados');
                    $('#Modalko').modal();
                }

                else
                {
                    for (i=0; i < arr['dados'].length; i++)
                    {
                        var id = arr['dados'][i].id;
                        if(arr['boolean']['bool-'+id])
                        {
                            bool = 'enabled';
                        }
                        else
                        {
                            bool = 'disabled';
                        }
                        s += '<tr class="action-tipo-prato-'+arr['dados'][i].id+'">' +
                            '<td scope="row">' +
                            '<input type="text" value="'+arr['dados'][i].id+'" id="col-1-'+arr['dados'][i].id+'" style="display: none" class="frm-item form-control" readonly="" />' +
                            '<font class="font-2-'+arr['dados'][i].id+'" style="color: #000">'+arr['dados'][i].id+'</font>' +
                            '</td>' +
                            '<td scope="row">' +
                            '<input type="text" value="'+arr['dados'][i].tipo_prato+'" id="col-2-'+arr['dados'][i].id+'" style="display: none" class="frm-item form-control"/>' +
                            '<font class="font-1-'+arr['dados'][i].id+'" style="color: #000">'+arr['dados'][i].tipo_prato+'</font>' +
                            '</td>' +
                            '<td id="action-t-prato-'+arr['dados'][i].id+'" style="width:100px;">' +
                            '<button title="Editar Tipo Prato - '+arr['dados'][i].id+'" class="btn btn-info btn-sm" onclick="editTipoPrato('+arr['dados'][i].id+')">' +
                            '<span class="glyphicon glyphicon-edit"></span>' +
                            '</button>' +
                            '&nbsp;&nbsp;' +
                            '<button title="Apagar Tipo Prato" class="btn btn-danger btn-sm" onclick="confirmTipoPrato('+arr['dados'][i].id+')" id="remove_filter_'+arr['dados'][i].id+'" '+bool+'>' +
                            '<span class="glyphicon glyphicon-trash"></span>' +
                            '</button>'+
                            '</td>' +
                            '</tr>';

                    }
                    $("#list_tipos_pratos").html('<div class="table-responsive">\n' +
                        '                                <table class="table table-bordered">\n' +
                        '                                    <thead class="thead-dark">\n' +
                        '                                    <tr>\n' +
                        '                                        <th>ID</th>\n' +
                        '                                        <th>Tipo Prato</th>\n' +
                        '                                        <th>Acções</th>\n' +
                        '                                    </tr>\n' +
                        '                                    </thead>\n' +
                        '                                    <tbody>\n'+s+
                        '                                   </tbody>\n' +
                        '                                </table>\n' +
                        '                            </div>');

                }

            },
            error: function (data) {
                $(".back").hide();
                $(".load").show();
                $('.debug-url').html('A listagem dos tipos de prato não foi listado com sucesso, p.f. verifique a ligação Wi-Fi.');
                $('#Modalko').modal();
            }
        });


    }


    $("#search-tipo-pra").on('click', function (e) {
        e.preventDefault();
        var s = "";
        var bool = '';
        var search = $("#tipo_prato_search").val();
        dataValue="&tipo_prato_search="+search+"&task=pesquisaTiposPratos";


        $.ajax({
            url: 'prato/prato.php',
            data: dataValue,
            type: 'POST',
            success: function (data) {
                arr=[];
                arr =  JSON.parse(data);
                console.log(data);
                if (arr == null || arr.length < 1){
                    $(".back").hide();
                    $(".load").show();
                    $('.debug-url').html('Nao existe tipos de pratos registados');
                    $('#Modalko').modal();
                }

                else
                {
                    for (i=0; i < arr['dados'].length; i++)
                    {
                        var id = arr['dados'][i].id;
                        if(arr['boolean']['bool-'+id])
                        {
                            bool = 'enabled';
                        }
                        else
                        {
                            bool = 'disabled';
                        }

                        s += '<tr class="action-tipo-prato-'+arr['dados'][i].id+'">' +
                            '<td scope="row">' +
                            '<input type="text" value="'+arr['dados'][i].id+'" id="col-1-'+arr['dados'][i].id+'" style="display: none" class="frm-item form-control" readonly="" />' +
                            '<font class="font-1-'+arr['dados'][i].id+'" style="color: #000">'+arr['dados'][i].id+'</font>' +
                            '</td>' +
                            '<td scope="row">' +
                            '<input type="text" value="'+arr['dados'][i].tipo_prato+'" id="col-2-'+arr['dados'][i].id+'" style="display: none" class="frm-item form-control" />' +
                            '<font class="font-2-'+arr['dados'][i].id+'" style="color: #000">'+arr['dados'][i].tipo_prato+'</font>' +
                            '</td>' +
                            '<td id="action-t-prato-'+arr['dados'][i].id+'" style="width:100px;">' +
                            '<button title="Editar Tipo Prato - '+arr['dados'][i].id+'" class="btn btn-info btn-sm" onclick="editTipoPrato('+arr['dados'][i].id+')">' +
                            '<span class="glyphicon glyphicon-edit"></span>' +
                            '</button>' +
                            '&nbsp;&nbsp;' +
                            '<button title="Apagar Tipo Prato - '+arr['dados'][i].id+'" class="btn btn-danger btn-sm" onclick="confirmTipoPrato('+arr['dados'][i].id+')" id="remove_filter_'+arr['dados'][i].id+'" '+bool+'>' +
                            '<span class="glyphicon glyphicon-trash"></span>' +
                            '</button>'+
                            '</td>' +
                            '</tr>';

                    }
                    $("#list_tipos_pratos").html('<div class="table-responsive">\n' +
                        '                                <table class="table table-bordered">\n' +
                        '                                    <thead class="thead-dark">\n' +
                        '                                    <tr>\n' +
                        '                                        <th>ID</th>\n' +
                        '                                        <th>Tipo Prato</th>\n' +
                        '                                        <th>Acções</th>\n' +
                        '                                    </tr>\n' +
                        '                                    </thead>\n' +
                        '                                    <tbody>\n'+s+
                        '                                   </tbody>\n' +
                        '                                </table>\n' +
                        '                            </div>');

                }
            },
            error: function (data) {
                $(".back").hide();
                $(".load").show();
                $('.debug-url').html('A listagem dos tipos de prato não foi procurado com sucesso, p.f. verifique a ligação Wi-Fi.');
                $('#Modalko').modal();
            }

        });

    });

    function editTipoPrato(id) {
            for (i=1; i<3; i++)
            {
                $("#col-"+i+"-"+id).css('display', 'block');
                $(".font-"+i+"-"+id).css('display', 'none');
            }

            $("#action-t-prato-"+id).html('' +
                '<button title="Submissao de Tipo Prato - '+id+'" class="btn btn-success btn-sm" onclick="saveTipoPrato('+id+')">' +
                '<span class="glyphicon glyphicon-floppy-save"></span>' +
                '</button>' +
                '&nbsp;&nbsp;' +
                '<button title="Cancelar Editar Tipo Prato - '+id+'" class="btn btn-default btn-sm" onclick="CancelTipoPrato('+id+')">' +
                '<span class="glyphicon glyphicon-remove-sign"></span>' +
                '</button>' +
                '&nbsp;&nbsp;' +
                '<button title="Apagar Tipo Prato - '+id+'" class="btn btn-danger btn-sm" onclick="confirmTipoPrato('+id+')" id="remove_filter_'+id+'">' +
                '<span class="glyphicon glyphicon-trash"></span>' +
                '</button>'
            );
    }

    function CancelTipoPrato(id) {
        for (i=1; i<3; i++)
        {
            $("#col-"+i+"-"+id).css('display', 'none');
            $(".font-"+i+"-"+id).css('display', 'block');
        }


        $("#action-t-prato-"+id).html('' +
            '<button title="Editar Tipo Prato - '+id+'" class="btn btn-info btn-sm" onclick="editTipoPrato('+id+')">' +
            '<span class="glyphicon glyphicon-edit"></span>' +
            '</button>' +
            '&nbsp;&nbsp;' +
            '<button title="Apagar Tipo Prato - '+id+'" class="btn btn-danger btn-sm" onclick="confirmTipoPrato('+id+')" id="remove_filter_'+id+'">' +
            '<span class="glyphicon glyphicon-trash"></span>' +
            '</button>'
        );


    }

    function confirmTipoPrato(id) {
        bootbox.dialog({
            message: "Tem a certeza que quer apagar o tipo de prato número <strong>"+id+"</strong>",
            title: "<span style='color:#f0ad4e;'><span class='glyphicon glyphicon-exclamation-sign'></span> Confirm</span>",
            buttons: {
                default: {
                    label: "<span class='glyphicon glyphicon-remove-sign'></span> Close",
                    className: "btn-light",
                },
                danger: {
                    label: "<span class='glyphicon glyphicon-trash'></span> Delete",
                    className: "btn-danger",
                    callback: function() {
                        dataValue='&id='+id+'&task=apagarTipoPrato';
                        $.ajax({
                            type: "POST",
                            url: "prato/prato.php",
                            data: dataValue,
                            cache:false,
                            success: function(data){
                                if(data == 2){
                                    listarTiposPratos();
                                    $('#Modalok .debug-url').html('O Tipo de Prato <strong>'+id+'</strong> foi apagado com sucesso.');
                                    $("#Modalok").modal('show');

                                }
                                else
                                {
                                    $('#Modalko .debug-url').html('O Tipo de Prato <strong>'+id+'</strong> não foi apagado.');
                                    $("#Modalko").modal('show');
                                }
                            },
                            error:function(data){
                                $('#Modalko .debug-url').html('O Tipo de Prato <strong>'+id+'</strong> não foi apagado com uscesso. Verificar a conexão Wi-Fi e tenta novamente');
                                $("#Modalko").modal('show');
                            }
                        });
                    }
                },
            }
        });
    }

    function saveTipoPrato(id) {
        $(".back").show();
        $(".load").show();
        var dataValue='';
        for(i=1;i<3;i++){
            dataValue+="col_"+i+"_"+id+"="+$("#col-"+i+"-"+id).val()+"&";
        }
        dataValue+="id="+id+"&task=editarTipoPrato";


        $.ajax({
            url:'prato/prato.php',
            data:dataValue,
            type:'POST',
            success: function(data) {
                arr = [];
                arr = JSON.parse(data);

                if (arr.error)
                {
                    $(".back").hide();
                    $(".load").show();
                    jQuery(".debug-url").html("Por favor, verifique:<br><br>"+arr.error+"<br> Retifique o Erro e tente novamente.");
                    $('#Modalko').modal();
                }
                else if (arr.success == 0)
                {
                    $(".back").hide();
                    $(".load").show();
                    $('.debug-url').html('A Edição do tipo de prato '+id+' nao foi adicionado com sucesso');
                    $('#Modalko').modal();
                }
                else if (arr.success == 1)
                {
                    listarTiposPratos();
                    $(".back").hide();
                    $(".load").show();
                    $('.debug-url').html('A Edição do tipo de prato '+id+' foi adicionado com sucesso');
                    $('#Modalok').modal();



                }

            },
            error: function(){
                $(".back").hide();
                $(".load").show();
                $('.debug-url').html('A edição do tipo de prato número '+id+' não foi criado, p.f. verifique a ligação Wi-Fi.');
                $('#Modalko').modal();

            }

        });


    }


    $(".btn-clear").on('click', function (e) {
        e.preventDefault();
        $(".back").hide();
        $(".load").show();
        $("#tipo_prato_search").val('');
        listarTiposPratos();
    });



</script>



<!-- //Menu - Listar Tipo Prato -->


<!-- Menu - Adicionar Prato -->

<script>
    listarTiposPratosSelect();
function listarTiposPratosSelect() {
    $(".back").show();
    $(".load").show();
    var s = "";
    s += '<option value ="">Escolhe o Tipo de Prato...</option>';
    dataValue="&task=listarTiposPratos";
    $.ajax({
        url: 'prato/prato.php',
        data: dataValue,
        type: 'POST',
        success: function (data) {
            arr=[];
            arr =  JSON.parse(data);
            //console.log(data);
            if (arr == null || arr.length < 1){
                $(".back").hide();
                $(".load").show();
                $('.debug-url').html('Nao existe tipos de pratos registados');
                $('#Modalko').modal();
            }

            else
            {
                for (i=0; i < arr['dados'].length; i++)
                {
                    s +='<option value="'+arr['dados'][i].id+'">'+arr['dados'][i].tipo_prato+'</option>';

                }

                $("#tipos_pratos_select").html(s);


            }

        },
        error: function (data) {
            $(".back").hide();
            $(".load").show();
            $('.debug-url').html('A listagem dos tipos de prato não foi listado com sucesso, p.f. verifique a ligação Wi-Fi.');
            $('#Modalko').modal();
        }
    });
}


    $("#image_prato").on('change', function (e){
        e.preventDefault();
        var image = $("#image_prato").prop("files")[0];
        createFormDataImagemPrato(image);
    });

    function createFormDataImagemPrato(image) {
        var formImage = new FormData();
        formImage.append('userImage', image);
        formImage.append('task', 'uploadPartoDia');
        uploadFormDataImagemPrato(formImage);
    }

    function uploadFormDataImagemPrato(formData) {
        console.log(formData);
        $.ajax({
            url: "uploads/upload_prato_dia.php",
            type: "POST",
            data: formData,
            contentType:false,
            cache: false,
            processData: false,
            success: function(data){
                $("#logo_prato_dia").html('<img id="img_prato_dia" src="images/pratos/'+data+'" class="img-responsive"><br>');
                $("#img_prato_file").val(data);
            }});
    }

    $("#submit-pratos-dia").on('click', function (e) {
        var tipo_prato = $("#tipos_pratos_select").val();
        var nome_prato = $("#nome_prato").val();
        var preco = $("#preco").val();
        //var logo_prato_dia = $("#img_prato_dia").prop('src');
        var logo = $("#img_prato_file").val();
        dataValue = "&nome_prato="+nome_prato+"&tipo_prato="+tipo_prato+"&preco="+preco+"&imagem="+logo+"&task=inserirPratoDia";

        console.log(dataValue);

        $.ajax({
            url: 'prato/prato.php',
            data: dataValue,
            type: 'POST',
            success: function(data) {
                arr = [];
                arr = JSON.parse(data);
                console.log(arr);

                if (arr.error)
                {
                    $(".back").hide();
                    $(".load").show();
                    jQuery(".debug-url").html("Por favor, verifique:<br><br>"+arr.error+"<br> Retifique o Erro e tente novamente.");
                    $('#Modalko').modal();
                }
                else if (arr.success == 0)
                {
                    $(".back").hide();
                    $(".load").show();
                    $('.debug-url').html('A Criação do prato nao foi adicionado com sucesso');
                    $('#Modalko').modal();
                }
                else if (arr.success == 1)
                {
                    $(".back").hide();
                    $(".load").show();
                    $('.debug-url').html('A Criação do prato foi adicionado com sucesso');
                    //$("#submit_tipo_prato")[0].reset();
                    $("#nome_prato").val('');
                    $("#tipos_pratos_select").val('');
                    $("#preco").val('');
                    $("#img_prato_file").val('');
                    $("#logo_prato_dia").html('');
                    $("#image_prato").val('');
                    $('#Modalok').modal();



                }

            },
            error: function(){
                $(".back").hide();
                $(".load").show();
                $('.debug-url').html('A inserção do prato do dia não foi criado, p.f. verifique a ligação Wi-Fi.');
                $('#Modalko').modal();

            }
        });
    });

</script>

<!-- //Menu - Adicionar Prato -->

<!-- Menu - Listagem de Pratos -->

<script>
    listarTiposPratosSelectSearch();
    function listarTiposPratosSelectSearch() {
        $(".back").show();
        $(".load").show();
        var s = "";
        s += '<option value ="">Escolhe o Tipo de Prato...</option>';
        dataValue="&task=listarTiposPratos";
        $.ajax({
            url: 'prato/prato.php',
            data: dataValue,
            type: 'POST',
            success: function (data) {
                arr=[];
                arr =  JSON.parse(data);
                //console.log(data);
                if (arr == null || arr.length < 1){
                    $(".back").hide();
                    $(".load").show();
                    $('.debug-url').html('Nao existe tipos de pratos registados');
                    $('#Modalko').modal();
                }

                else
                {
                    for (i=0; i < arr['dados'].length; i++)
                    {
                        s +='<option value="'+arr['dados'][i].id+'">'+arr['dados'][i].tipo_prato+'</option>';

                    }

                    $("#tipos_pratos_select_search").html(s);


                }

            },
            error: function (data) {
                $(".back").hide();
                $(".load").show();
                $('.debug-url').html('A listagem dos tipos de prato não foi listado com sucesso, p.f. verifique a ligação Wi-Fi.');
                $('#Modalko').modal();
            }
        });
    }

    listarPratosDia();
    function listarPratosDia() {
        var img = '';
        var bool = '';
        $(".back").show();
        $(".load").show();
        var s = "";
        dataValue = "&task=listarPratosDia";
        $.ajax({
            url: 'prato/prato.php',
            data: dataValue,
            type: 'POST',
            success: function (data) {
                arr = [];
                arr = JSON.parse(data);
                //console.log(data);
                if (arr == null || arr.length < 1) {
                    $(".back").hide();
                    $(".load").show();
                    $('.debug-url').html('Nao existe pratos do dia registados');
                    $('#Modalko').modal();
                } else {
                    for (i = 0; i < arr['dados'].length; i++) {

                        if(arr['dados'][i].imagem != '')
                        {
                            img = '<img id="img_prato_dia-'+arr['dados'][i].id+'" class="image_prato_dia_edit" src="images/pratos/'+arr['dados'][i].imagem+'" class="img-responsive"><input type="hidden" id="img_pr_dia_'+arr['dados'][i].id+'" value="'+arr['dados'][i].imagem+'"> ';
                        }
                        else
                        {
                            img = '<input type="hidden" id="img_pr_dia_'+arr['dados'][i].id+'" value="'+arr['dados'][i].imagem+'">';
                        }


                        var id = arr['dados'][i].id;
                        if(arr['boolean']['bool-'+id])
                        {
                            bool = 'enabled';
                        }
                        else
                        {
                            bool = 'disabled';
                        }
                        s += '<tr class="action-prato-dia-'+arr['dados'][i].id+'">' +
                            '<td scope="row">' +
                            '<font class="font-id-prato-'+arr['dados'][i].id+'" style="color: #000">'+arr['dados'][i].id+'</font>' +
                            '</td>' +
                            '<td scope="row">' +
                            '<font class="font-nome-prato-'+arr['dados'][i].id+'" style="color: #000">'+arr['dados'][i].nome_prato+'</font>' +
                            '</td>' +
                            '<td scope="row">' +
                            '<font class="font-tipo-prato-'+arr['dados'][i].id+'" style="color: #000">'+arr['dados'][i].tipo_prato+'</font>' +
                            '<input type="hidden" id="t_p_'+arr['dados'][i].id+'" value="'+arr['dados'][i].tp_id_prato+'" />' +
                            '</td>' +
                            '<td scope="row">' +
                            '<font class="font-preco-'+arr['dados'][i].id+'" style="color: #000">'+arr['dados'][i].preco+'</font>' +
                            '</td>' +
                            '<td scope="row">' +
                            '<font class="font-img-prato-dia-'+arr['dados'][i].id+'" style="color: #000">'+img+'</font>' +
                            '</td>' +
                            '<td id="action-p-dia-'+arr['dados'][i].id+'" style="width:100px;">' +
                            '<button title="Editar Prato Dia - '+arr['dados'][i].id+'" class="btn btn-info btn-sm" onclick="editPratoDia('+arr['dados'][i].id+')">' +
                            '<span class="glyphicon glyphicon-edit"></span>' +
                            '</button>' +
                            '&nbsp;&nbsp;' +
                            '<button title="Apagar Prato Dia" class="btn btn-danger btn-sm" onclick="confirmPratoDia('+arr['dados'][i].id+')" id="remove_filter_'+arr['dados'][i].id+'" '+bool+'>' +
                            '<span class="glyphicon glyphicon-trash"></span>' +
                            '</button>'+
                            '</td>' +
                            '</tr>';

                    }
                    $("#list_pratos_s").html('<div class="table-responsive">\n' +
                        '                                <table class="table table-bordered">\n' +
                        '                                    <thead class="thead-dark">\n' +
                        '                                    <tr>\n' +
                        '                                        <th>ID</th>\n' +
                        '                                        <th>Nome Prato</th>\n' +
                        '                                        <th>Tipo Prato</th>\n' +
                        '                                        <th>Preço</th>\n' +
                        '                                        <th>Imagem</th>\n' +
                        '                                        <th>Acções</th>\n' +
                        '                                    </tr>\n' +
                        '                                    </thead>\n' +
                        '                                    <tbody>\n' + s +
                        '                                   </tbody>\n' +
                        '                                </table>\n' +
                        '                            </div>');

                }

            },
            error: function (data) {
                $(".back").hide();
                $(".load").show();
                $('.debug-url').html('A listagem dos pratos do dia não foi listado com sucesso, p.f. verifique a ligação Wi-Fi.');
                $('#Modalko').modal();
            }
        });
    }

    function confirmPratoDia(id) {
        bootbox.dialog({
            message: "Tem a certeza que quer apagar o prato dia número <strong>"+id+"</strong>",
            title: "<span style='color:#f0ad4e;'><span class='glyphicon glyphicon-exclamation-sign'></span> Confirm</span>",
            buttons: {
                default: {
                    label: "<span class='glyphicon glyphicon-remove-sign'></span> Close",
                    className: "btn-light",
                },
                danger: {
                    label: "<span class='glyphicon glyphicon-trash'></span> Delete",
                    className: "btn-danger",
                    callback: function() {
                        dataValue='&id='+id+'&task=apagarPratoDia';
                        $.ajax({
                            type: "POST",
                            url: "prato/prato.php",
                            data: dataValue,
                            cache:false,
                            success: function(data){
                                console.log(data);
                                if(data == 2){
                                    listarPratosDia();
                                    $('#Modalok .debug-url').html('O Prato do dia <strong>'+id+'</strong> foi apagado com sucesso.');
                                    $("#Modalok").modal('show');

                                }
                                else
                                {
                                    $('#Modalko .debug-url').html('O Prato do dia <strong>'+id+'</strong> não foi apagado.');
                                    $("#Modalko").modal('show');
                                }
                            },
                            error:function(data){
                                $('#Modalko .debug-url').html('O Prato do dia <strong>'+id+'</strong> não foi apagado com uscesso. Verificar a conexão Wi-Fi e tenta novamente');
                                $("#Modalko").modal('show');
                            }
                        });
                    }
                },
            }
        });
    }


    $("#search-pra-dia").on('click', function (e) {
        e.preventDefault();
        var s = "";
        var bool = '';
        var search = $("#prato_dia_search").val();
        var search_tipo_prato_search = $("#tipos_pratos_select_search").val();
        dataValue="&prato_dia_search="+search+"&search_tipo_prato_search="+search_tipo_prato_search+"&task=pesquisaPratosDia";
        var img = '';
        $.ajax({
            url: 'prato/prato.php',
            data: dataValue,
            type: 'POST',
            success: function (data) {
                arr = [];
                arr = JSON.parse(data);
                //console.log(data);
                if (arr == null || arr.length < 1) {
                    $(".back").hide();
                    $(".load").show();
                    $('.debug-url').html('Nao existe pratos do dia registados');
                    $('#Modalko').modal();
                } else {
                    for (i = 0; i < arr['dados'].length; i++) {

                        if(arr['dados'][i].imagem != '')
                        {
                            img = '<img id="img_prato_dia-'+arr['dados'][i].id+'" class="image_prato_dia_edit" src="images/pratos/'+arr['dados'][i].imagem+'" class="img-responsive"><input type="hidden" id="img_pr_dia_'+arr['dados'][i].id+'" value="'+arr['dados'][i].imagem+'"> ';
                        }
                        else
                        {
                            img = '<input type="hidden" id="img_pr_dia_'+arr['dados'][i].id+'" value="'+arr['dados'][i].imagem+'">';
                        }


                        var id = arr['dados'][i].id;
                        if(arr['boolean']['bool-'+id])
                        {
                            bool = 'enabled';
                        }
                        else
                        {
                            bool = 'disabled';
                        }
                        s += '<tr class="action-prato-dia-'+arr['dados'][i].id+'">' +
                            '<td scope="row">' +
                            '<font class="font-id-prato-'+arr['dados'][i].id+'" style="color: #000">'+arr['dados'][i].id+'</font>' +
                            '</td>' +
                            '<td scope="row">' +
                            '<font class="font-nome-prato-'+arr['dados'][i].id+'" style="color: #000">'+arr['dados'][i].nome_prato+'</font>' +
                            '</td>' +
                            '<td scope="row">' +
                            '<font class="font-tipo-prato-'+arr['dados'][i].id+'" style="color: #000">'+arr['dados'][i].tipo_prato+'</font>' +
                            '<input type="hidden" id="t_p_'+arr['dados'][i].id+'" value="'+arr['dados'][i].tp_id_prato+'" />' +
                            '</td>' +
                            '<td scope="row">' +
                            '<font class="font-preco-'+arr['dados'][i].id+'" style="color: #000">'+arr['dados'][i].preco+'</font>' +
                            '</td>' +
                            '<td scope="row">' +
                            '<font class="font-img-prato-dia-'+arr['dados'][i].id+'" style="color: #000">'+img+'</font>' +
                            '</td>' +
                            '<td id="action-p-dia-'+arr['dados'][i].id+'" style="width:100px;">' +
                            '<button title="Editar Prato Dia - '+arr['dados'][i].id+'" class="btn btn-info btn-sm" onclick="editPratoDia('+arr['dados'][i].id+')">' +
                            '<span class="glyphicon glyphicon-edit"></span>' +
                            '</button>' +
                            '&nbsp;&nbsp;' +
                            '<button title="Apagar Prato Dia" class="btn btn-danger btn-sm" onclick="confirmPratoDia('+arr['dados'][i].id+')" id="remove_filter_'+arr['dados'][i].id+'" '+bool+'>' +
                            '<span class="glyphicon glyphicon-trash"></span>' +
                            '</button>'+
                            '</td>' +
                            '</tr>';

                    }
                    $("#list_pratos_s").html('<div class="table-responsive">\n' +
                        '                                <table class="table table-bordered">\n' +
                        '                                    <thead class="thead-dark">\n' +
                        '                                    <tr>\n' +
                        '                                        <th>ID</th>\n' +
                        '                                        <th>Nome Prato</th>\n' +
                        '                                        <th>Tipo Prato</th>\n' +
                        '                                        <th>Preço</th>\n' +
                        '                                        <th>Imagem</th>\n' +
                        '                                        <th>Acções</th>\n' +
                        '                                    </tr>\n' +
                        '                                    </thead>\n' +
                        '                                    <tbody>\n' + s +
                        '                                   </tbody>\n' +
                        '                                </table>\n' +
                        '                            </div>');

                }

            },
            error: function (data) {
                $(".back").hide();
                $(".load").show();
                $('.debug-url').html('A listagem dos pratos do dia não foi listado com sucesso, p.f. verifique a ligação Wi-Fi.');
                $('#Modalko').modal();
            }
        });

    });


    $(".btn-clear-pra-dia").on('click', function (e) {
        $("#prato_dia_search").val('');
        $("#tipos_pratos_select_search").val('');
        listarPratosDia();
    });


    listarTiposPratosSelectEdit();
    function listarTiposPratosSelectEdit() {
        $(".back").show();
        $(".load").show();
        var s = "";
        s += '<option value ="">Escolhe o Tipo de Prato...</option>';
        dataValue="&task=listarTiposPratos";
        $.ajax({
            url: 'prato/prato.php',
            data: dataValue,
            type: 'POST',
            success: function (data) {
                arr=[];
                arr =  JSON.parse(data);
                //console.log(data);
                if (arr == null || arr.length < 1){
                    $(".back").hide();
                    $(".load").show();
                    $('.debug-url').html('Nao existe tipos de pratos registados');
                    $('#Modalko').modal();
                }

                else
                {
                    for (i=0; i < arr['dados'].length; i++)
                    {
                        s +='<option value="'+arr['dados'][i].id+'">'+arr['dados'][i].tipo_prato+'</option>';

                    }

                    $("#tipos_pratos_select_edit").html(s);


                }

            },
            error: function (data) {
                $(".back").hide();
                $(".load").show();
                $('.debug-url').html('A listagem dos tipos de prato não foi listado com sucesso, p.f. verifique a ligação Wi-Fi.');
                $('#Modalko').modal();
            }
        });
    }

    function editPratoDia(id) {
        //console.log(id);

        var comtent_edit_prato_dia = $("#Modal_Edit_Prato_dia");

        var id_t_p = $("#t_p_"+id).val();

        var image = $("#img_pr_dia_"+id).val();

        $("#num_edit_prato_dia").html(id);

        var nome_prato = $(".font-nome-prato-"+id).html();

        var preco = $(".font-preco-"+id).html();

        $("#nome_prato_edit").val(nome_prato);

        $("#preco_edit").val(preco);

        $("#tipos_pratos_select_edit").val(id_t_p);

        if(image != '')
        {
            $("#logo_prato_dia_edit").html('<img id="img_prato_dia_edit" src="images/pratos/'+image+'" class="img-responsive"><br>');
            $("#img_prato_file_edit").val(image);
        }



        comtent_edit_prato_dia.modal('show');
    }


    $("#image_prato_edit").on('change', function (e){
        e.preventDefault();
        var image = $("#image_prato_edit").prop("files")[0];
        createFormDataImagemPratoEdit(image);
    });

    function createFormDataImagemPratoEdit(image) {
        var formImage = new FormData();
        formImage.append('userImage', image);
        formImage.append('task', 'uploadPartoDia');
        uploadFormDataImagemPratoEdit(formImage);
    }

    function uploadFormDataImagemPratoEdit(formData) {
        console.log(formData);
        $.ajax({
            url: "uploads/upload_prato_dia.php",
            type: "POST",
            data: formData,
            contentType:false,
            cache: false,
            processData: false,
            success: function(data){
                $("#logo_prato_dia_edit").html('<img id="img_prato_dia_edit" src="images/pratos/'+data+'" class="img-responsive"><br>');
                $("#img_prato_file_edit").val(data);
            }});
    }

    function salvarEditPratoDia(id) {
        var nome_prato = $("#nome_prato_edit").val();

        var tipos_prato = $("#tipos_pratos_select_edit").val();

        var preco = $("#preco_edit").val();

        var image = $("#img_prato_file_edit").val();

        dataValue="nome_prato="+nome_prato+"&tipos_prato="+tipos_prato+"&preco="+preco+"&image="+image+"&id="+id+"&task=editarPratoDia";

        console.log(dataValue);

        $.ajax({
            url: 'prato/prato.php',
            data: dataValue,
            type: 'POST',
            success: function(data) {
                arr = [];
                arr = JSON.parse(data);
                console.log(arr);

                if (arr.error)
                {
                    $(".back").hide();
                    $(".load").show();
                    $('#Modal_Edit_Prato_dia').modal('hide');
                    jQuery(".debug-url").html("Por favor, verifique:<br><br>"+arr.error+"<br> Retifique o Erro e tente novamente.");
                    $('#Modalko').modal();
                }
                else if (arr.success == 0)
                {
                    $(".back").hide();
                    $(".load").show();
                    $('.debug-url').html('A Edição do prato do dia número '+id+' nao foi actualizado com sucesso');
                    $('#Modal_Edit_Prato_dia').modal('hide');
                    $('#Modalko').modal();
                }
                else if (arr.success == 1)
                {
                    listarPratosDia();
                    $(".back").hide();
                    $(".load").show();
                    $('.debug-url').html('A Edição do prato do dia número '+id+' foi actualizado com sucesso');
                    $('#Modal_Edit_Prato_dia').modal('hide');
                    $('#Modalok').modal();
                    setTimeout(function(){
                        $('#Modalok').modal('hide');},1000);
                }

            },
            error: function(){
                $(".back").hide();
                $(".load").show();
                $('#Modal_Edit_Prato_dia').modal('hide');
                $('.debug-url').html('A Edição do prato do dia número '+id+' nao foi actualizado com sucesso, p.f. verifique a ligação Wi-Fi.');
                $('#Modalko').modal();

            }
        });
    }

</script>

<!-- //Menu - Listagem de Pratos -->

<!-- Menu - Adicionar Reserva -->

<script>

    // Data Reserva

    var date = new Date();
    d = date.setDate(date.getDate());
    h = date.setHours(date.getHours());

    // Datas usando no datetimepicker
    $("#data_reseva_dt").datetimepicker({ ignoreReadonly: true, format: 'YYYY-MM-DD',
        locale: 'pt', showTodayButton: true, minDate: h, defaultDate: h, widgetPositioning: { horizontal: 'right', vertical: 'bottom' }});
    // Hora Reserva
    $("#hora_reseva_dt").datetimepicker({ ignoreReadonly: true, format: 'HH:mm',
        locale: 'pt', showTodayButton: true, minDate: h, defaultDate: h, widgetPositioning: { horizontal: 'right', vertical: 'bottom' }});


    listarPratosDiaSelect();
    function listarPratosDiaSelect() {
        $(".back").show();
        $(".load").show();
        var s = "";
        s += '<option value ="">Escolhe o Prato do dia...</option>';
        dataValue = "&task=listarPratosDia";
        $.ajax({
            url: 'prato/prato.php',
            data: dataValue,
            type: 'POST',
            success: function (data) {
                arr = [];
                arr = JSON.parse(data);
                //console.log(data);
                if (arr == null || arr.length < 1) {
                    $(".back").hide();
                    $(".load").show();
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
                $(".load").show();
                $('.debug-url').html('A listagem dos pratos do dia não foi listado com sucesso, p.f. verifique a ligação Wi-Fi.');
                $('#Modalko').modal();
            }
        });
    }

    $("#submit-reservas").on('click', function (e) {
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
            url: 'reserva/reserva.php',
            data: dataValue,
            type: 'POST',
            success: function(data) {
                arr = [];
                arr = JSON.parse(data);
                console.log(arr);

                if (arr.error)
                {
                    $(".back").hide();
                    $(".load").show();
                    jQuery(".debug-url").html("Por favor, verifique:<br><br>"+arr.error+"<br> Retifique o Erro e tente novamente.");
                    $('#Modalko').modal();
                }
                else if (arr.success == 0)
                {
                    $(".back").hide();
                    $(".load").show();
                    $('.debug-url').html('A Inserção de Reserva nao foi efectuado com sucesso');
                    $('#Modalko').modal();
                }
                else if (arr.success == 1)
                {
                    $(".back").hide();
                    $(".load").show();
                    $('.debug-url').html('A Inserção de Reserva foi efectuado com sucesso');
                    $('#Modalok').modal();
                }

            },
            error: function(){
                $(".back").hide();
                $(".load").show();
                $('.debug-url').html('A Inserção de Reserva nao foi efectuado, p.f. verifique a ligação Wi-Fi.');
                $('#Modalko').modal();

            }
        });

    });

    $(".btn-clear-reserva").on('click', function (e) {
        e.preventDefault();
        $("#nome_pessoa").val('');
        $("#email_pessoa").val('');
        $("#pratos_dia_select").val('');
        $("#telefone").val('');
        $("#obs_reserva").val('');
    });

</script>

<!-- //Menu - Adicionar Reserva -->

<!-- Menu - Listar Reserva -->

<script>
    listarPratosDiaSelectSearch();
    function listarPratosDiaSelectSearch() {
        $(".back").show();
        $(".load").show();
        var s = "";
        s += '<option value ="">Escolhe o Prato do dia...</option>';
        dataValue = "&task=listarPratosDia";
        $.ajax({
            url: 'prato/prato.php',
            data: dataValue,
            type: 'POST',
            success: function (data) {
                arr = [];
                arr = JSON.parse(data);
                //console.log(data);
                if (arr == null || arr.length < 1) {
                    $(".back").hide();
                    $(".load").show();
                    $('.debug-url').html('Nao existe pratos do dia registados');
                    $('#Modalko').modal();
                } else {
                    for (i=0; i < arr['dados'].length; i++)
                    {
                        s +='<option value="'+arr['dados'][i].id+'">'+arr['dados'][i].nome_prato+'</option>';

                    }

                    $("#pratos_dia_select_search").html(s);

                }

            },
            error: function (data) {
                $(".back").hide();
                $(".load").show();
                $('.debug-url').html('A listagem dos pratos do dia não foi listado com sucesso, p.f. verifique a ligação Wi-Fi.');
                $('#Modalko').modal();
            }
        });
    }


    $("#data_reseva_dt_search").datetimepicker({ ignoreReadonly: true, format: 'YYYY-MM-DD',
        locale: 'pt', showTodayButton: true, minDate: h, defaultDate: h, widgetPositioning: { horizontal: 'right', vertical: 'bottom' }});
    
    
    // list_reservas_data

    listarReservas();
    function listarReservas() {
        $(".back").show();
        $(".load").show();
        var s = "";
        dataValue = "&task=listarReservas";
        $.ajax({
            url: 'reserva/reserva.php',
            data: dataValue,
            type: 'POST',
            success: function (data) {
                arr = [];
                arr = JSON.parse(data);
                console.log(data);
                if (arr == null || arr.length < 1) {
                    $(".back").hide();
                    $(".load").show();
                    $('.debug-url').html('Nao existe reservas registados');
                    $('#Modalko').modal();
                } else {
                    for (i = 0; i < arr.length; i++) {



                        s += '<tr class="action-reserva-'+arr[i].id+'">' +
                            '<td scope="row">' +
                            '<font class="font-id-reserva-'+arr[i].id+'" style="color: #000">'+arr[i].id+'</font>' +
                            '</td>' +
                            '<td scope="row">' +
                            '<font class="font-nome-pessoa-'+arr[i].id+'" style="color: #000">'+arr[i].nome+'</font>' +
                            '</td>' +
                            '<td scope="row">' +
                            '<font class="font-email-pessoa-'+arr[i].id+'" style="color: #000">'+arr[i].email+'</font>' +
                            '</td>' +
                            '<td scope="row">' +
                            '<font class="font-telefone-'+arr[i].id+'" style="color: #000">'+arr[i].telefone+'</font>' +
                            '</td>' +
                            '<td scope="row">' +
                            '<font class="font-data-reserva-'+arr[i].id+'" style="color: #000">'+arr[i].data_reserva+'</font>' +
                            '</td>' +
                            '<td scope="row">' +
                            '<font class="font-hora-reserva-'+arr[i].id+'" style="color: #000">'+arr[i].hora_reserva+'</font>' +
                            '</td>' +
                            '<td scope="row">' +
                            '<font class="font-prato-d-res-'+arr[i].id+'" style="color: #000">'+arr[i].nome_prato+'</font>' +
                            '<input type="hidden" id="p_d_'+arr[i].id+'" value="'+arr[i].prato+'" />' +
                            '</td>' +
                            '<td scope="row">' +
                            '<font class="font-obs-'+arr[i].id+'" style="color: #000">'+arr[i].observacoes+'</font>' +
                            '</td>' +
                            '<td id="action-resv-'+arr[i].id+'" style="width:100px;">' +
                            '<button title="Editar Prato Dia - '+arr[i].id+'" class="btn btn-info btn-sm" onclick="editReserv('+arr[i].id+')">' +
                            '<span class="glyphicon glyphicon-edit"></span>' +
                            '</button>' +
                            '&nbsp;&nbsp;' +
                            '<button title="Apagar Prato Dia" class="btn btn-danger btn-sm" onclick="confirmReserv('+arr[i].id+')" id="remove_filter_'+arr[i].id+'">' +
                            '<span class="glyphicon glyphicon-trash"></span>' +
                            '</button>'+
                            '</td>' +
                            '</tr>';

                    }
                    $("#list_reservas_data").html('<div class="table-responsive">\n' +
                        '                                <table class="table table-bordered">\n' +
                        '                                    <thead class="thead-dark">\n' +
                        '                                    <tr>\n' +
                        '                                        <th>ID</th>\n' +
                        '                                        <th>Nome Pessoa</th>\n' +
                        '                                        <th>Email Pessoa</th>\n' +
                        '                                        <th>Telefone</th>\n' +
                        '                                        <th>Data Reserva</th>\n' +
                        '                                        <th>Hora Reserva</th>\n' +
                        '                                        <th>Prato do Dia</th>\n' +
                        '                                        <th>Observações</th>\n' +
                        '                                        <th>Acções</th>\n' +
                        '                                    </tr>\n' +
                        '                                    </thead>\n' +
                        '                                    <tbody>\n' + s +
                        '                                   </tbody>\n' +
                        '                                </table>\n' +
                        '                            </div>');
                }
            },
            error: function (data) {
                $(".back").hide();
                $(".load").show();
                $('.debug-url').html('A listagem dos reservas não foi listado com sucesso, p.f. verifique a ligação Wi-Fi.');
                $('#Modalko').modal();
            }
        });
    }

    $("#search-resv").on('click', function (e) {
        e.preventDefault();
        $(".back").show();
        $(".load").show();
        var s = "";
        var nome_pessoa_search = $("#nome_pessoa_search").val();
        var email_pessoa_search = $("#email_pessoa_search").val();
        var pratos_dia_select_search = $("#pratos_dia_select_search").val();
        var data_reserva_search = $("#data_reserva_search").val();
        dataValue="nome_pessoa_search="+nome_pessoa_search+"&email_pessoa_search="+email_pessoa_search+
            "&pratos_dia_select_search="+pratos_dia_select_search+"&data_reserva_search="+data_reserva_search+"" +
            "&task=pesquisarReservas";

        console.log(dataValue);

        $.ajax({
            url: 'reserva/reserva.php',
            data: dataValue,
            type: 'POST',
            success: function (data) {
                arr = [];
                arr = JSON.parse(data);
                console.log(data);
                if (arr == null || arr.length < 1) {
                    $(".back").hide();
                    $(".load").show();
                    $('.debug-url').html('Nao existe reservas registados');
                    $('#Modalko').modal();
                } else {
                    for (i = 0; i < arr.length; i++) {



                        s += '<tr class="action-reserva-'+arr[i].id+'">' +
                            '<td scope="row">' +
                            '<font class="font-id-reserva-'+arr[i].id+'" style="color: #000">'+arr[i].id+'</font>' +
                            '</td>' +
                            '<td scope="row">' +
                            '<font class="font-nome-pessoa-'+arr[i].id+'" style="color: #000">'+arr[i].nome+'</font>' +
                            '</td>' +
                            '<td scope="row">' +
                            '<font class="font-email-pessoa-'+arr[i].id+'" style="color: #000">'+arr[i].email+'</font>' +
                            '</td>' +
                            '<td scope="row">' +
                            '<font class="font-telefone-'+arr[i].id+'" style="color: #000">'+arr[i].telefone+'</font>' +
                            '</td>' +
                            '<td scope="row">' +
                            '<font class="font-data-reserva-'+arr[i].id+'" style="color: #000">'+arr[i].data_reserva+'</font>' +
                            '</td>' +
                            '<td scope="row">' +
                            '<font class="font-hora-reserva-'+arr[i].id+'" style="color: #000">'+arr[i].hora_reserva+'</font>' +
                            '</td>' +
                            '<td scope="row">' +
                            '<font class="font-prato-d-res-'+arr[i].id+'" style="color: #000">'+arr[i].nome_prato+'</font>' +
                            '<input type="hidden" id="p_d_'+arr[i].id+'" value="'+arr[i].prato+'" />' +
                            '</td>' +
                            '<td scope="row">' +
                            '<font class="font-obs-'+arr[i].id+'" style="color: #000">'+arr[i].observacoes+'</font>' +
                            '</td>' +
                            '<td id="action-resv-'+arr[i].id+'" style="width:100px;">' +
                            '<button title="Editar Prato Dia - '+arr[i].id+'" class="btn btn-info btn-sm" onclick="editReserv('+arr[i].id+')">' +
                            '<span class="glyphicon glyphicon-edit"></span>' +
                            '</button>' +
                            '&nbsp;&nbsp;' +
                            '<button title="Apagar Prato Dia" class="btn btn-danger btn-sm" onclick="confirmReserv('+arr[i].id+')" id="remove_filter_'+arr[i].id+'">' +
                            '<span class="glyphicon glyphicon-trash"></span>' +
                            '</button>'+
                            '</td>' +
                            '</tr>';

                    }
                    $("#list_reservas_data").html('<div class="table-responsive">\n' +
                        '                                <table class="table table-bordered">\n' +
                        '                                    <thead class="thead-dark">\n' +
                        '                                    <tr>\n' +
                        '                                        <th>ID</th>\n' +
                        '                                        <th>Nome Pessoa</th>\n' +
                        '                                        <th>Email Pessoa</th>\n' +
                        '                                        <th>Telefone</th>\n' +
                        '                                        <th>Data Reserva</th>\n' +
                        '                                        <th>Hora Reserva</th>\n' +
                        '                                        <th>Prato do Dia</th>\n' +
                        '                                        <th>Observações</th>\n' +
                        '                                        <th>Acções</th>\n' +
                        '                                    </tr>\n' +
                        '                                    </thead>\n' +
                        '                                    <tbody>\n' + s +
                        '                                   </tbody>\n' +
                        '                                </table>\n' +
                        '                            </div>');
                }
            },
            error: function (data) {
                $(".back").hide();
                $(".load").show();
                $('.debug-url').html('A listagem dos reservas não foi listado com sucesso, p.f. verifique a ligação Wi-Fi.');
                $('#Modalko').modal();
            }
        });
    });


    $(".btn-clear-resv").on('click', function (e) {
        e.preventDefault();
        $("#nome_pessoa_search").val('');
        $("#email_pessoa_search").val('');
        $("#pratos_dia_select_search").val('');
        listarReservas();
    });

    function confirmReserv(id) {
        bootbox.dialog({
            message: "Tem a certeza que quer apagar a reserva número <strong>"+id+"</strong>",
            title: "<span style='color:#f0ad4e;'><span class='glyphicon glyphicon-exclamation-sign'></span> Confirm</span>",
            buttons: {
                default: {
                    label: "<span class='glyphicon glyphicon-remove-sign'></span> Close",
                    className: "btn-light",
                },
                danger: {
                    label: "<span class='glyphicon glyphicon-trash'></span> Delete",
                    className: "btn-danger",
                    callback: function() {
                        dataValue='&id='+id+'&task=apagarReserva';
                        $.ajax({
                            type: "POST",
                            url: "reserva/reserva.php",
                            data: dataValue,
                            cache:false,
                            success: function(data){
                                console.log(data);
                                if(data == 2){
                                    listarReservas();
                                    $('#Modalok .debug-url').html('A Reserva <strong>'+id+'</strong> foi apagado com sucesso.');
                                    $("#Modalok").modal('show');

                                }
                                else
                                {
                                    $('#Modalko .debug-url').html('A Reserva <strong>'+id+'</strong> não foi apagado.');
                                    $("#Modalko").modal('show');
                                }
                            },
                            error:function(data){
                                $('#Modalko .debug-url').html('A Reserva<strong>'+id+'</strong> não foi apagado com uscesso. Verificar a conexão Wi-Fi e tenta novamente');
                                $("#Modalko").modal('show');
                            }
                        });
                    }
                },
            }
        });
    }

    $("#hora_reseva_dt_edit").datetimepicker({ ignoreReadonly: true, format: 'HH:mm',
        locale: 'pt', showTodayButton: true, minDate: h, defaultDate: h, widgetPositioning: { horizontal: 'right', vertical: 'bottom' }});


    $("#data_reseva_dt_edit").datetimepicker({ ignoreReadonly: true, format: 'YYYY-MM-DD',
        locale: 'pt', showTodayButton: true, minDate: h, defaultDate: h, widgetPositioning: { horizontal: 'right', vertical: 'bottom' }});


    listarPratosDiaSelectSelectEdit();
    function listarPratosDiaSelectSelectEdit() {
        $(".back").show();
        $(".load").show();
        var s = "";
        s += '<option value ="">Escolhe o Prato do dia...</option>';
        dataValue = "&task=listarPratosDia";
        $.ajax({
            url: 'prato/prato.php',
            data: dataValue,
            type: 'POST',
            success: function (data) {
                arr = [];
                arr = JSON.parse(data);
                //console.log(data);
                if (arr == null || arr.length < 1) {
                    $(".back").hide();
                    $(".load").show();
                    $('.debug-url').html('Nao existe pratos do dia registados');
                    $('#Modalko').modal();
                } else {
                    for (i=0; i < arr['dados'].length; i++)
                    {
                        s +='<option value="'+arr['dados'][i].id+'">'+arr['dados'][i].nome_prato+'</option>';

                    }

                    $("#pratos_dia_select_edit").html(s);

                }

            },
            error: function (data) {
                $(".back").hide();
                $(".load").show();
                $('.debug-url').html('A listagem dos pratos do dia não foi listado com sucesso, p.f. verifique a ligação Wi-Fi.');
                $('#Modalko').modal();
            }
        });
    }



    function editReserv(id) {
        var modal_resv = $("#edit_resv_pr");
        $("#id_resv_edit").html(id);

        var nome_pessoa = $(".font-nome-pessoa-"+id).html();

        var email_pessoa = $(".font-email-pessoa-"+id).html();

        var telefone_pessoa = $(".font-telefone-"+id).html();

        var hora_reserva = $(".font-hora-reserva-"+id).html();

        var data_reserva = $(".font-data-reserva-"+id).html();

        var obs = $(".font-obs-"+id).html();

        var prato_id = $("#p_d_"+id).val();


        $("#nome_pessoa_edit").val(nome_pessoa);

        $("#email_pessoa_edit").val(email_pessoa);

        $("#telefone_edit").val(telefone_pessoa);

        $("#data_reserva_edit").val(data_reserva);

        $("#hora_reserva_edit").val(hora_reserva);

        $("#pratos_dia_select_edit").val(prato_id);

        $("#obs_reserva_edit").val(obs);

        modal_resv.modal('show');
    }

    function saveReserva (id) {
        var nome_pessoa_edit = $("#nome_pessoa_edit").val();

        var email_pessoa_edit = $("#email_pessoa_edit").val();

        var telefone_edit = $("#telefone_edit").val();

        var pratos_dia_select_edit = $("#pratos_dia_select_edit").val();

        var data_reserva_edit = $("#data_reserva_edit").val();

        var hora_reserva_edit = $("#hora_reserva_edit").val();

        var obs_reserva_edit = $("#obs_reserva_edit").val();


        dataValue="nome_pessoa_edit="+nome_pessoa_edit+"&email_pessoa_edit="+email_pessoa_edit+"" +
            "&telefone_edit="+telefone_edit+"&pratos_dia_select_edit="+pratos_dia_select_edit+"" +
            "&data_reserva_edit="+data_reserva_edit+"&hora_reserva_edit="+hora_reserva_edit+"" +
            "&obs_reserva_edit="+obs_reserva_edit+"" +
            "&id="+id+"&task=editarReserva";

        console.log(dataValue);

        $.ajax({
            url: 'reserva/reserva.php',
            data: dataValue,
            type: 'POST',
            success: function(data) {
                arr = [];
                arr = JSON.parse(data);
                console.log(arr);

                if (arr.error)
                {
                    $(".back").hide();
                    $(".load").show();
                    jQuery(".debug-url").html("Por favor, verifique:<br><br>"+arr.error+"<br> Retifique o Erro e tente novamente.");
                    $('#edit_resv_pr').modal('hide');
                    $('#Modalko').modal();
                }
                else if (arr.success == 0)
                {
                    $(".back").hide();
                    $(".load").show();
                    $('.debug-url').html('A Edição da reserva número '+id+' nao foi actualizado com sucesso');
                    $('#edit_resv_pr').modal('hide');
                    $('#Modalko').modal();
                }
                else if (arr.success == 1)
                {
                    listarReservas();
                    $(".back").hide();
                    $(".load").show();
                    $('.debug-url').html('A Edição da reserva número '+id+' foi actualizado com sucesso');
                    $('#edit_resv_pr').modal('hide');
                    $('#Modalok').modal();
                }

            },
            error: function(){
                $(".back").hide();
                $(".load").show();
                $('#edit_resv_pr').modal('hide');
                $('.debug-url').html('A Edição da reserva número '+id+' nao foi actualizado com sucesso, p.f. verifique a ligação Wi-Fi.');
                $('#Modalko').modal();

            }
        });
    }







</script>


<!-- //Menu - Listar Reserva -->

<!-- Menu - Inserir Comentario Admin -->

<script>
    var active_field;
    var active;

    //$('#activate_comment').prop('checked');
    $(".btn-clear-comm").on('click', function (e) {
        $("#nome_pess").val('');
        $("#mensagem_pess").val('');
        $('.rating-container input').val([0]);
    });


    //$("#activate_comment").prop('checked', true).change();

    $("#submit-comm").on('click', function (e) {
        e.preventDefault();
        var act = 0;
        if($('#activate_comment').prop("checked") == true){
            act = 1;
        }else{
            act = 0;
        }

        var nome_pess = $("#nome_pess").val();
        var mensagem_pess = $("#mensagem_pess").val();
        var rating = 0;
        if($('.rating-container input').is(':checked'))
        {
            rating = $('.rating-container input:checked').val();
        }

        dataValue = "nome_pess="+nome_pess+"&mensagem_pess="+mensagem_pess+"&classificacao="+rating+"&activar_field="+act+"&task=inserirComentariosAdmin";

        //console.log(dataValue);

        $.ajax({
            type: "POST",
            url: 'comentarios/comentarios.php',
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

                    $('.debug-url').html('A Criação do Comentário nao foi adicionado com sucesso');
                    $('#add_comentario').modal('hide');
                    $('#Modalko').modal('show');
                }
                else if (arr.success == 1)
                {

                    $(".back").hide();
                    $(".load").show();
                    $('.debug-url').html('O Comentário foi feito com sucesso');
                    $('#add_comentario').modal('hide');
                    $('#Modalok').modal('show');

                    $("#nome_pess").val('');
                    $("#mensagem_pess").val('');
                    $('.rating-container input').val([0]);

                }




            },
            error:function(){
                $(".back").hide();
                $(".load").show();
                $('.debug-url').html("O Adição de Comentarios não foi submtido com sucesso. Verifique a conexão WI-FI e tente novamente.");
                $('#Modalko').modal();
            }
        });

    });
</script>




<!-- //Menu - Inserir Comentario Admin -->

<!-- Menu - Listar Comentario Admin -->

<script>
    $(document).ajaxComplete(function() {
        $('input[type=checkbox][data-toggle^=toggle]').bootstrapToggle();
    });
listarComentariosAdmin();
function listarComentariosAdmin() {
    dataValue="&task=listarComentariosAdmin";
    var s = '';
    var ds = '';
    radioButtons = [];
    ratings_arr = [];
    $.ajax({
        url: 'comentarios/comentarios.php',
        data: dataValue,
        type: 'POST',
        success: function (data) {
            arr = [];
            arr = JSON.parse(data);
            console.log(data);
            if (arr == null || arr.length < 1) {
                $(".back").hide();
                $(".load").show();
                $('.debug-url').html('Nao existe comentarios inseridos');
                $('#Modalko').modal();
            } else {
                for (i = 0; i < arr.length; i++) {
                    var id = arr[i].id;
                    var nome = arr[i].nome;
                    var mensagem = arr[i].mensagem;
                    var rating = arr[i].classificacao;

                    ratings_arr.push(rating);


                    var ac = arr[i].activar_field;



                    if(ac == 1)
                    {

                        ds = 'checked';
                    }
                    else
                    {
                        ds = '';
                    }


                    s += '<tr class="action-comm-'+arr[i].id+'">' +
                        '<td scope="row">' +
                        '<font class="font-id-com-'+arr[i].id+'" style="color: #000">'+arr[i].id+'</font>' +
                        '</td>' +
                        '<td scope="row">' +
                        '<font class="font-nome-pe-'+arr[i].id+'" style="color: #000">'+arr[i].nome+'</font>' +
                        '</td>' +
                        '<td scope="row">' +
                        '<font class="font-mens-pes-'+arr[i].id+'" style="color: #000">'+arr[i].mensagem+'</font>' +
                        '</td>' +
                        '<td scope="row">' +
                        '<font class="font-class-com-'+arr[i].id+'" style="color: #000"><div class="rating-box-show" id="rating-box-show-'+arr[i].id+'"> ' +
                        '<div class="rating-container-show" id="rating-container-show-'+arr[i].id+'"></div> </font>' +
                        '<input type="hidden" id="class_id_com_'+arr[i].id+'" value="'+arr[i].classificacao+'" />' +
                        '</td>' +
                        '<td scope="row">' +
                        '<font class="font-act-comm-'+arr[i].id+'" style="color: #000">' +
                        '<input type="checkbox" class="comment_pri_value" disabled data-toggle="toggle" data-on="Activo" data-off="Desativado" data-onstyle="success" data-offstyle="danger" name="a_co_list_-'+arr[i].id+'" id="a_co_list_-'+arr[i].id+'" '+ds+'></font>' +
                        '<input type="hidden" id="act_co_'+arr[i].id+'" value="'+arr[i].activar_field+'" />' +
                        '</td>' +
                        '<td id="acco-c-'+arr[i].id+'" style="width:100px;">' +
                        '<button title="Editar Prato Dia - '+arr[i].id+'" class="btn btn-info btn-sm" onclick="editCom('+arr[i].id+')">' +
                        '<span class="glyphicon glyphicon-edit"></span>' +
                        '</button>' +
                        '&nbsp;&nbsp;' +
                        '<button title="Apagar Prato Dia" class="btn btn-danger btn-sm" id="remove_filter_'+arr[i].id+'" onclick="removeCom('+arr[i].id+')">' +
                        '<span class="glyphicon glyphicon-trash"></span>' +
                        '</button>'+
                        '</td>' +
                        '</tr>';

                }
                $("#list_com_data").html('<div class="table-responsive">\n' +
                    '                                <table class="table table-bordered">\n' +
                    '                                    <thead class="thead-dark">\n' +
                    '                                    <tr>\n' +
                    '                                        <th>ID</th>\n' +
                    '                                        <th>Nome Pessoa</th>\n' +
                    '                                        <th>Mensagem</th>\n' +
                    '                                        <th>Classificação</th>\n' +
                    '                                        <th>Activado</th>\n' +
                    '                                        <th>Acções</th>\n' +
                    '                                    </tr>\n' +
                    '                                    </thead>\n' +
                    '                                    <tbody>\n' + s +
                    '                                   </tbody>\n' +
                    '                                </table>\n' +
                    '                            </div>');

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
        error: function (data) {
            $(".back").hide();
            $(".load").show();
            $('.debug-url').html('A listagem dos comentarios não foi listado com sucesso, p.f. verifique a ligação Wi-Fi.');
            $('#Modalko').modal();
        }
    });
}





function editCom(id)
{
    $("#id_cooom").html(id);
    var edit_com = $("#edit_comm");

    var classif = $("#class_id_com_"+id).val();

    var act = $("#act_co_"+id).val();

    var nome_p = $(".font-nome-pe-"+id).html();

    var mens_p = $(".font-mens-pes-"+id).html();

    console.log(classif);


    $("#show_ratings").html('<input type="radio" name="rating-edit" value="1" > <label for="star-"'+id+'"-1">&#9733; </label>\n' +
        '                            <br>\n' +
        '                            <input type="radio" name="rating-edit" value="2" > <label for="star-"'+id+'"-2">&#9733; &#9733;</label>\n' +
        '                            <br>\n' +
        '                            <input type="radio" name="rating-edit" value="3" > <label for="star-"'+id+'"-3">&#9733; &#9733; &#9733;</label>\n' +
        '                            <br>\n' +
        '                            <input type="radio" name="rating-edit" value="4" > <label for="star-"'+id+'"-4">&#9733; &#9733; &#9733; &#9733;</label>\n' +
        '                            <br>\n' +
        '                            <input type="radio" name="rating-edit" value="5" > <label for="star-"'+id+'"-5">&#9733; &#9733; &#9733; &#9733; &#9733;</label>');

    var $radios = $("input:radio[name='rating-edit']");

    $radios.filter('[value="' + classif + '"]').attr('checked', true);

    if (act == 1)
    {
        $("#act_com_edit").prop('checked', true).change();
    }
    else
    {
        $("#act_com_edit").prop('checked', false).change();
    }

    $("#nome_pess_edit").val(nome_p);

    $("#mensagem_pess_edit").val(mens_p);

    edit_com.modal('show');
}

function saveComm(id) {
    var classif = $("input[name='rating-edit']:checked").val();
    var act = 0;
    if($('#act_com_edit').prop("checked") == true){
        act = 1;
    }else{
        act = 0;
    }

    var nome_p_edit = $("#nome_pess_edit").val();
    var mens_p_edit = $("#mensagem_pess_edit").val();
    dataValue = "nome_p_edit="+nome_p_edit+"&mens_p_edit="+mens_p_edit+"&classif="+classif+"&act="+act+"" +
        "&id="+id+"&task=editarComent";

    $.ajax({
        type: "POST",
        url: 'comentarios/comentarios.php',
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
                $('#edit_comm').modal('hide');
                $('#Modalko').modal();
            }
            else if (arr.success == 0)
            {
                $(".back").hide();
                $(".load").show();

                $('.debug-url').html('A Edição do Comentário número '+id+' nao foi adicionado com sucesso');
                $('#edit_comm').modal('hide');
                $('#Modalko').modal('show');
            }
            else if (arr.success == 1)
            {
                listarComentariosAdmin();
                $(".back").hide();
                $(".load").show();
                $('.debug-url').html('O Comentário número <b>'+id+ '</b> foi alterado com sucesso');
                $('#edit_comm').modal('hide');
                $('#Modalok').modal('show');

            }




        },
        error:function(){
            $(".back").hide();
            $(".load").show();
            $('#edit_comm').modal('hide');
            $('.debug-url').html("O Comentário número <b>"+id+"</b> foi alterado  com sucesso. Verifique a conexão WI-FI e tente novamente.");
            $('#Modalko').modal();

        }
    });


}



    function removeCom(id) {
        bootbox.dialog({
            message: "Tem a certeza que quer apagar o comentário número <strong>"+id+"</strong>",
            title: "<span style='color:#f0ad4e;'><span class='glyphicon glyphicon-exclamation-sign'></span> Confirm</span>",
            buttons: {
                default: {
                    label: "<span class='glyphicon glyphicon-remove-sign'></span> Close",
                    className: "btn-light",
                },
                danger: {
                    label: "<span class='glyphicon glyphicon-trash'></span> Delete",
                    className: "btn-danger",
                    callback: function() {
                        dataValue='&id='+id+'&task=apagarCom';
                        $.ajax({
                            type: "POST",
                            url: "comentarios/comentarios.php",
                            data: dataValue,
                            cache:false,
                            success: function(data){
                                console.log(data);
                                if(data == 2){
                                    listarComentariosAdmin();
                                    $('#Modalok .debug-url').html('O Comentario <strong>'+id+'</strong> foi apagado com sucesso.');
                                    $("#Modalok").modal('show');

                                }
                                else
                                {
                                    $('#Modalko .debug-url').html('O Comentario <strong>'+id+'</strong> não foi apagado.');
                                    $("#Modalko").modal('show');
                                }
                            },
                            error:function(data){
                                $('#Modalko .debug-url').html('O Comentario <strong>'+id+'</strong> não foi apagado com uscesso. Verificar a conexão Wi-Fi e tenta novamente');
                                $("#Modalko").modal('show');
                            }
                        });
                    }
                },
            }
        });
    }



    $("#search-comm").on('click', function (e) {
        e.preventDefault();
        $(".back").show();
        $(".load").show();
        var clas_com_search = $("#clas_com_search").val();
        var act = 0;
        if($('#act_com_search').prop("checked") == true){
            act = 1;
        }else{
            act = 0;
        }
        dataValue="clas_com_search="+clas_com_search+"&act_search="+act+
            "&task=listarComentariosAdminSearch";

        console.log(dataValue);


        var s = '';
        var ds = '';
        radioButtons = [];
        ratings_arr = [];
        $.ajax({
            url: 'comentarios/comentarios.php',
            data: dataValue,
            type: 'POST',
            success: function (data) {
                arr = [];
                arr = JSON.parse(data);
                console.log(data);
                if (arr == null || arr.length < 1) {
                    $(".back").hide();
                    $(".load").show();
                    $('.debug-url').html('Nao existe comentarios inseridos');
                    $('#Modalko').modal();
                } else {
                    for (i = 0; i < arr.length; i++) {
                        var id = arr[i].id;
                        var nome = arr[i].nome;
                        var mensagem = arr[i].mensagem;
                        var rating = arr[i].classificacao;

                        ratings_arr.push(rating);


                        var ac = arr[i].activar_field;



                        if(ac == 1)
                        {

                            ds = 'checked';
                        }
                        else
                        {
                            ds = '';
                        }


                        s += '<tr class="action-comm-'+arr[i].id+'">' +
                            '<td scope="row">' +
                            '<font class="font-id-com-'+arr[i].id+'" style="color: #000">'+arr[i].id+'</font>' +
                            '</td>' +
                            '<td scope="row">' +
                            '<font class="font-nome-pe-'+arr[i].id+'" style="color: #000">'+arr[i].nome+'</font>' +
                            '</td>' +
                            '<td scope="row">' +
                            '<font class="font-mens-pes-'+arr[i].id+'" style="color: #000">'+arr[i].mensagem+'</font>' +
                            '</td>' +
                            '<td scope="row">' +
                            '<font class="font-class-com-'+arr[i].id+'" style="color: #000"><div class="rating-box-show" id="rating-box-show-'+arr[i].id+'"> ' +
                            '<div class="rating-container-show" id="rating-container-show-'+arr[i].id+'"></div> </font>' +
                            '<input type="hidden" id="class_id_com_'+arr[i].id+'" value="'+arr[i].classificacao+'" />' +
                            '</td>' +
                            '<td scope="row">' +
                            '<font class="font-act-comm-'+arr[i].id+'" style="color: #000">' +
                            '<input type="checkbox" class="comment_pri_value" disabled data-toggle="toggle" data-on="Activo" data-off="Desativado" data-onstyle="success" data-offstyle="danger" name="a_co_list_-'+arr[i].id+'" id="a_co_list_-'+arr[i].id+'" '+ds+'></font>' +
                            '<input type="hidden" id="act_co_'+arr[i].id+'" value="'+arr[i].activar_field+'" />' +
                            '</td>' +
                            '<td id="acco-c-'+arr[i].id+'" style="width:100px;">' +
                            '<button title="Editar Prato Dia - '+arr[i].id+'" class="btn btn-info btn-sm" onclick="editCom('+arr[i].id+')">' +
                            '<span class="glyphicon glyphicon-edit"></span>' +
                            '</button>' +
                            '&nbsp;&nbsp;' +
                            '<button title="Apagar Prato Dia" class="btn btn-danger btn-sm" id="remove_filter_'+arr[i].id+'" onclick="removeCom('+arr[i].id+')">' +
                            '<span class="glyphicon glyphicon-trash"></span>' +
                            '</button>'+
                            '</td>' +
                            '</tr>';

                    }
                    $("#list_com_data").html('<div class="table-responsive">\n' +
                        '                                <table class="table table-bordered">\n' +
                        '                                    <thead class="thead-dark">\n' +
                        '                                    <tr>\n' +
                        '                                        <th>ID</th>\n' +
                        '                                        <th>Nome Pessoa</th>\n' +
                        '                                        <th>Mensagem</th>\n' +
                        '                                        <th>Classificação</th>\n' +
                        '                                        <th>Activado</th>\n' +
                        '                                        <th>Acções</th>\n' +
                        '                                    </tr>\n' +
                        '                                    </thead>\n' +
                        '                                    <tbody>\n' + s +
                        '                                   </tbody>\n' +
                        '                                </table>\n' +
                        '                            </div>');

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
            error: function (data) {
                $(".back").hide();
                $(".load").show();
                $('.debug-url').html('A listagem dos comentarios não foi listado com sucesso, p.f. verifique a ligação Wi-Fi.');
                $('#Modalko').modal();
            }
        });
    });


    $(".btn-clear-co").on('click', function (e) {
        e.preventDefault();
        $("#clas_com_search").val('');
        $("#act_com_search").prop('checked', false).change();
        listarComentariosAdmin();
    });



</script>


<script>
    function enforceMinMax(el){
        if(el.value != ""){
            if(parseInt(el.value) < parseInt(el.min)){
                el.value = el.min;
            }
            if(parseInt(el.value) > parseInt(el.max)){
                el.value = el.max;
            }
        }
    }
</script>

<!-- //Menu - Listar Comentario Admin -->
