<style>
    .modal-header, .modal-footer {
        background: #333;
        color: #fff;
    }
    .modal-body{
        background:#FFF;

    }
    .close{
        color:#FFF;
        opacity:1;
    }

    .modal-dialog
    {
        max-width: 800px;
    }
    .debug-url
    {
        color: #000;
    }
    @media (max-width: 375px)
    {
        #Modalko .modal-body, #Modalok .modal-body, #Modalko2 .modal-body, #Modalok2 .modal-body {
            padding: 15px;
        }
    }




    .rating-edit-text label {
        display: inline-block;
        margin: 15px 0;
        color: gold;
        cursor: pointer;
        font-size: 25px;
        transition: color 0.2s;

    }

    fieldset {
        margin: 8px;
        border: 1px solid silver;
        padding: 8px;
        border-radius: 4px;
    }

    legend {
        padding: 2px;
    }

    .toggle
    {
        width: 200px!important;
    }

</style>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sair do App de Admin do "Pronto a Comer"?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Selecciona "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="logout.php">Logout</a>
            </div>
        </div>
    </div>
</div>


<?php
$logo =  '/logo/teste.png';
?>

<div id="Modalok" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" style="color:#5cb85c;"> <span class='glyphicon glyphicon-ok'></span> Sucesso</h4>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="debug-url"></p>
            </div>
            <div class="modal-footer">
                <p style='text-align:center; margin:0 auto;'><img src="<?php echo $logo; ?>" style="width:120px;"></p>
            </div>
        </div>
    </div>
</div>


<div id="Modalko" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" style="color:#d9534f;"><span class='glyphicon glyphicon-warning-sign'></span> Aviso</h4>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="debug-url"></p>
            </div>
            <div class="modal-footer">
                <p style='text-align:center; margin:0 auto;'><img src="<?php echo $logo; ?>" style="width:120px;"></p>
                <!--
                        <button type="button" class="btn btn-default" data-dismiss="modal"><span class='glyphicon glyphicon-remove-sign'></span> Fechar</button>
                -->
            </div>
        </div>
    </div>
</div>

<!-- Modal - Editar Pratos Dia -->

<div id="Modal_Edit_Prato_dia" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="content_edit_pratos_dia">Edit Prato do dia Número <strong id="num_edit_prato_dia"></strong></h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <i class="fas fa-utensils"></i> - <label for="morada">Nome do Prato:</label>
                            <input type="text" class="form-control" id="nome_prato_edit" placeholder="Nome do Prato" name="nome_prato_edit">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <i class="fas fa-utensil-spoon"></i> - <label for="tipos_pratos_select_edit">Tipos de Prato:</label>
                            <select class="form-control" id="tipos_pratos_select_edit">
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <i class="fas fa-money-bill"></i> - <label for="preco_edit">Preço:</label>
                            <input type="number" class="form-control" id="preco_edit" placeholder="Preço" name="preco_edit">
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <i class="fas fa-image"></i> - <label for="preco">Imagem:</label>
                            <div id="logo_prato_dia_edit" class="col-xs-12 col-md-12">

                            </div>
                            <input id="img_prato_file_edit" type="hidden" />
                            <input id="image_prato_edit" name="file" type="file" class="btn-primary btn col-xs-12"  accept="image/gif, image/jpeg, image/png">
                        </div>

                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <p style='text-align:center; margin:0 auto;'><img src="<?php echo $logo; ?>" class="logo-nav" style="width:68px;"></p>
                <button type="button" class="btn btn-light" data-dismiss="modal"><i class="fa fa-times-circle" aria-hidden="true"> </i><font class="hidden-xs"> Cancelar</font></button>
                <button title="Guardar as alterações do prato do dia" type="button" class="btn btn-success" onclick="salvarEditPratoDia($('#num_edit_prato_dia').html());"> <span class="glyphicon glyphicon-save-file"></span><font class="hidden-xs"> Guardar</font></button>
            </div>
        </div>
    </div>
</div>


<!-- //Modal - Editar Pratos Dia -->


<!-- Menu - Editar Reserva -->


<div class="modal fade" id="edit_resv_pr" tabindex="-1" role="dialog" aria-labelledby="clientes">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">

                <h4 class="modal-title" style="color:#fff!important;" id="clientes__modal__title"><span class="fas fa-edit" style="color: #5bc0de;"></span> Editar Reserva Número <strong id="id_resv_edit"></strong>  </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <i class="fas fa-user"></i> - <label for="nome_pessoa_edit">Nome da Pessoa:</label>
                            <input type="text" class="form-control" id="nome_pessoa_edit" placeholder="Nome Completo" name="nome_pessoa_edit">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <i class="fas fa-envelope"></i> - <label for="email_pessoa_edit">Email da Pessoa:</label>
                            <input type="text" class="form-control" id="email_pessoa_edit" placeholder="Email da Pessoa" name="email_pessoa_edit">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <i class="fas fa-utensils"></i> - <label for="pratos_dia_select_edit">Tipos de Prato:</label>
                            <select class="form-control" id="pratos_dia_select_edit">
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <i class="fas fa-phone"></i> - <label for="telefone_edit">Telefone:</label>
                            <input type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==9) return false;" class="form-control" id="telefone_edit" placeholder="Telefone Pessoa" name="telefone_edit">
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class='col-md-6 col-xs-12'>
                        <div class="form-group">
                            <span class="glyphicon glyphicon-calendar"></span> - Data de Reserva:
                            <div class='input-group date' id='data_reseva_dt_edit'>
                                <input type='text' readonly class="form-control" name="data_reserva_edit" id="data_reserva_edit" placeholder="Data de Reserva" />
                                <span class="input-group-addon">
                                          <span class="glyphicon glyphicon-calendar"></span>
                                      </span>
                            </div>
                        </div>
                    </div>
                    <div class='col-md-6 col-xs-12'>
                        <div class="form-group">
                            <span class="fas fa-clock"></span> - Hora de Reserva:
                            <div class='input-group date' id='hora_reseva_dt_edit'>
                                <input type='text' readonly class="form-control" name="hora_reserva_edit" id="hora_reserva_edit" placeholder="Hora de Reserva" />
                                <span class="input-group-addon">
                                              <span class="fas fa-clock" style="margin-top: 5px"></span>
                                          </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <i class="fas fa-file"></i> - <label for="obs_reserva_edit">Observações:</label>
                            <textarea class="form-control" rows="5" id="obs_reserva_edit" name="obs_reserva_edit"></textarea>
                        </div>
                    </div>


                </div>



            </div>

            <div class="modal-footer">
                <p style='text-align:center; margin:0 auto;'><img src="<?php echo $logo; ?>" class="logo-nav" style="width:68px;"></p>
                <button type="button" class="btn btn-light" data-dismiss="modal"><i class="fa fa-times-circle" aria-hidden="true"> </i><font class="hidden-xs"> Cancelar</font></button>
                <button title="Guardar as alterações do prato do dia" type="button" class="btn btn-success" onclick="saveReserva($('#id_resv_edit').html())"> <span class="glyphicon glyphicon-save-file"></span><font class="hidden-xs"> Guardar</font></button>
            </div>
        </div>
    </div>
</div>



<!-- //Menu - Editar Reserva -->


<div class="modal fade" id="edit_comm" tabindex="-1" role="dialog" aria-labelledby="clientes">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">

                <h4 class="modal-title" style="color:#fff!important;" id="clientes__modal__title"><span class="fas fa-edit" style="color: #5bc0de;"></span> Editar Comentario <strong id="id_cooom"></strong>  </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

                <div class="row">

                    <div class="col-md-12">
                        <div class="form-group">
                            <span class="glyphicon glyphicon-user"></span> - <label for="morada">Nome:</label>
                            <input type="text" class="form-control" name="nome_pess_edit" id="nome_pess_edit" placeholder='Insira o seu nome'>
                        </div>
                    </div>


                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <span class="glyphicon glyphicon-envelope"></span> - <label for="morada">Mensagem do Comentário:</label>
                            <textarea class="form-control" rows="5" id="mensagem_pess_edit" name="mensagem_pess_edit" placeholder='Insira o seu Comentário'></textarea>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <i class="fas fa-star"></i> - <label for="class_commen">Classificação:</label>
                            <fieldset>
                                <legend>Classificação</legend>
                                <div class="rating-edit-text" id="show_ratings">

                                    <input type="radio" name="rating-edit" value="1" > <label for="star-1-1">&#9733; </label>
                                    <br>
                                    <input type="radio" name="rating-edit" value="2" > <label for="star-2-2">&#9733; &#9733;</label>
                                    <br>
                                    <input type="radio" name="rating-edit" value="3" > <label for="star-3-3">&#9733; &#9733; &#9733;</label>
                                    <br>
                                    <input type="radio" name="rating-edit" value="4" > <label for="star-4-4">&#9733; &#9733; &#9733; &#9733;</label>
                                    <br>
                                    <input type="radio" name="rating-edit" value="5" > <label for="star-5-5">&#9733; &#9733; &#9733; &#9733; &#9733;</label>
                                </div>
                            </fieldset>
                        </div>

                    </div>



                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="checkbox" data-toggle="toggle" data-on="Activo" data-off="Desativado" data-onstyle="success" data-offstyle="danger" name='act_com_edit' id='act_com_edit'>
                            <input type="hidden" id="activo_campo">
                        </div>
                    </div>

                </div>





            </div>

            <div class="modal-footer">
                <p style='text-align:center; margin:0 auto;'><img src="<?php echo $logo; ?>" class="logo-nav" style="width:68px;"></p>
                <button type="button" class="btn btn-light" data-dismiss="modal"><i class="fa fa-times-circle" aria-hidden="true"> </i><font class="hidden-xs"> Cancelar</font></button>
                <button title="Guardar as alterações do prato do dia" type="button" class="btn btn-success" onclick="saveComm($('#id_cooom').html())"> <span class="glyphicon glyphicon-save-file"></span><font class="hidden-xs"> Guardar</font></button>
            </div>
        </div>
    </div>
</div>
