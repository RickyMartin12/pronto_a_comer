<style>
    .modal-content {
        background: #333;}
    .modal-body{
        background:#FFF;
    }
    .close{
        color:#FFF;
        opacity:1;
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
</style>

<?php
    $logo =  '/logo/teste.png';
?>

<input type="hidden" id="mensagem_ok" class="btn btn-info btn-lg" data-toggle="modal" data-target="#Modalok">
<div id="Modalok" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="color:#5cb85c;"> <span class='glyphicon glyphicon-ok'></span> Sucesso</h4>
            </div>
            <div class="modal-body">
                <p class="debug-url"></p>
            </div>
            <div class="modal-footer">
                <p style='text-align:center; margin:0;'><img src="<?php echo $logo; ?>" style="width:120px;"></p>
                <!--
                        <button type="button" class="btn btn-default" data-dismiss="modal"><span class='glyphicon glyphicon-remove-sign'></span> Fechar</button>
                -->
            </div>
        </div>
    </div>
</div>
<input type="hidden" id="mensagem_ko" class="btn btn-info btn-lg" data-toggle="modal" data-target="#Modalko">
<div id="Modalko" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="color:#d9534f;"><span class='glyphicon glyphicon-warning-sign'></span> Aviso</h4>
            </div>
            <div class="modal-body">
                <p class="debug-url"></p>
            </div>
            <div class="modal-footer">
                <p style='text-align:center; margin:0;'><img src="<?php echo $logo; ?>" style="width:120px;"></p>
                <!--
                        <button type="button" class="btn btn-default" data-dismiss="modal"><span class='glyphicon glyphicon-remove-sign'></span> Fechar</button>
                -->
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="adicionar_reserva" tabindex="-1" role="dialog" aria-labelledby="clientes">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="color:#fff!important;" id="clientes__modal__title"><span class="glyphicon glyphicon-plus" style="color: #5bc0de;"></span> Adicionar Reserva </h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <i class="fa fa-user"></i> - <label for="nome_pessoa">Nome da Pessoa:</label>
                            <input type="text" class="form-control" id="nome_pessoa" placeholder="Nome Completo" name="nome_pessoa">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <i class="fa fa-envelope"></i> - <label for="morada">Email da Pessoa:</label>
                            <input type="text" class="form-control" id="email_pessoa" placeholder="Email da Pessoa" name="email_pessoa">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <i class="fa fa-utensil-spoon"></i> - <label for="pratos_dia_select">Tipos de Prato:</label>
                            <select class="form-control" id="pratos_dia_select">
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <i class="fa fa-phone"></i> - <label for="telefone">Telefone:</label>
                            <input type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==9) return false;" class="form-control" id="telefone" placeholder="Telefone Pessoa" name="telefone">
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class='col-md-6 col-xs-12'>
                        <div class="form-group">
                            <span class="glyphicon glyphicon-calendar"></span> - Data de Reserva:
                            <div class='input-group date' id='data_reseva_dt'>
                                <input type='text' readonly class="form-control" name="data_reserva" id="data_reserva" placeholder="Data de Reserva" />
                                <span class="input-group-addon">
                                          <span class="glyphicon glyphicon-calendar"></span>
                                      </span>
                            </div>
                        </div>
                    </div>
                    <div class='col-md-6 col-xs-12'>
                        <div class="form-group">
                            <span class="fa fa-clock"></span> - Hora de Reserva:
                            <div class='input-group date' id='hora_reseva_dt'>
                                <input type='text' readonly class="form-control" name="hora_reserva" id="hora_reserva" placeholder="Hora de Reserva" />
                                <span class="input-group-addon">
                                              <span class="glyphicon glyphicon-time"></span>
                                          </span>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <i class="fa fa-file"></i> - <label for="obs_reserva">Observações:</label>
                            <textarea class="form-control" rows="5" id="obs_reserva" name="obs_reserva"></textarea>
                        </div>
                    </div>


                </div>


            </div>

            <div class="modal-footer">
                <p style='text-align:center; margin:0;'><img src="<?php echo $logo; ?>" class="logo-nav" style="width:68px;"></p>
                <button type="button" class="btn btn-default btn-cl" data-dismiss="modal"><i class="fa fa-times-circle" aria-hidden="true"> </i><font class="hidden-xs"> Cancelar</font></button>
                <button title="Guardar as alterações do serviço" type="button" class="btn btn-success" id="submit_res_poin"> <span class="glyphicon glyphicon-save-file"></span><font class="hidden-xs"> Guardar</font></button>
            </div>
        </div>
    </div>
</div>



<div id="add_comentario" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="comentarios" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="color:#B0C5D3;"><span class='glyphicon glyphicon-comment'></span> Adicionar Comentário</h4>
            </div>
            <div class="modal-body">

                <h4>Detalhe do Comentário </h4>
                <hr style="margin-top: 0;">
                <div class="row">
                    <!-- Painel 1 - Detalhes do Comentário -->

                    <!-- Nome da Pessoa -->

                    <div class='col-md-12 col-sm-12 col-xs-12'>
                        <div class="form-group" >
                            <span class="glyphicon glyphicon-user"></span> Nome *
                            <input type='text' class="form-control" name="nome" id="nome" placeholder='Insira o seu nome' />
                        </div>
                    </div>


                    <!-- Mensagem -->

                    <div class='col-md-12 col-sm-12 col-xs-12'>
                        <div class="form-group" >
                            <span class="glyphicon glyphicon-envelope"></span> Mensagem do Comentário *
                            <textarea class="form-control" rows="5" id="mensagem" name="mensagem" placeholder='Insira o seu Comentário'></textarea>
                        </div>
                    </div>
                </div>

                <h4>Classificação</h4>
                <hr style="margin-top: 0;">

                <div class="row">
                    <!-- Painel 2 - Detalhes da Pontuação -->

                    <!-- Classificação da Comida -->
                    <div class='col-md-12 col-sm-12 col-xs-12'>
                        <div class="form-group" >
                            <span class="fa fa-cutlery"></span> Classificação Geral *
                            <br>
                            <div class="rating-box">
                                <div class="rating-container">
                                    <input type="radio" name="rating" value="5" id="star-5"> <label for="star-5">&#9733;</label>

                                    <input type="radio" name="rating" value="4" id="star-4"> <label for="star-4">&#9733;</label>

                                    <input type="radio" name="rating" value="3" id="star-3"> <label for="star-3">&#9733;</label>

                                    <input type="radio" name="rating" value="2" id="star-2"> <label for="star-2">&#9733;</label>

                                    <input type="radio" name="rating" value="1" id="star-1"> <label for="star-1">&#9733;</label>
                                </div>
                            </div>

                        </div>
                    </div>





                </div>


            </div>
            <div class="modal-footer">
                <p style='text-align:center; margin:0;'><img src="<?php echo $logo; ?>" class="logo-nav" style="width:68px;"></p>
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times-circle" aria-hidden="true"> </i><font class="hidden-xs"> Cancelar</font></button>
                <button title="Guardar as alterações do serviço" type="button" class="btn btn-success" id="adicionar_comment"> <span class="glyphicon glyphicon-save-file"></span><font class="hidden-xs"> Guardar</font></button>
            </div>
        </div>
    </div>
</div>
