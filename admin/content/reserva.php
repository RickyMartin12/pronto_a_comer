<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-calendar"></i> Nova Reserva</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <div class="col-md-12">

            <div id="submit_prato">
                <div class="card">
                    <div class="card-header title-black">
                        <h4 class="card-title" style="margin-bottom: 0"><i class="fas fa-plus-circle"></i> Nova Reserva</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <i class="fas fa-user"></i> - <label for="nome_pessoa">Nome da Pessoa:</label>
                                    <input type="text" class="form-control" id="nome_pessoa" placeholder="Nome Completo" name="nome_pessoa">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <i class="fas fa-envelope"></i> - <label for="morada">Email da Pessoa:</label>
                                    <input type="text" class="form-control" id="email_pessoa" placeholder="Email da Pessoa" name="email_pessoa">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <i class="fas fa-utensils"></i> - <label for="pratos_dia_select">Tipos de Prato:</label>
                                    <select class="form-control" id="pratos_dia_select">
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <i class="fas fa-phone"></i> - <label for="telefone">Telefone:</label>
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
                                    <span class="fas fa-clock"></span> - Hora de Reserva:
                                    <div class='input-group date' id='hora_reseva_dt'>
                                        <input type='text' readonly class="form-control" name="hora_reserva" id="hora_reserva" placeholder="Hora de Reserva" />
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
                                    <i class="fas fa-file"></i> - <label for="obs_reserva">Observações:</label>
                                    <textarea class="form-control" rows="5" id="obs_reserva" name="obs_reserva"></textarea>
                                </div>
                            </div>


                        </div>


                    </div>
                    <div class="card-footer title-black">
                        <p style="text-align:right;">
                            <button type="reset" class="btn btn-light btn-clear-reserva"><i class="fa fa-eraser"></i><font class="hidden-xs"> Limpar</font></button>
                            <button type="submit" id="submit-reservas" class="btn btn-success"><i class="fas fa-save"></i><font class="hidden-xs"> Guardar</font></button>
                        </p>
                    </div>
                </div>
            </div>


        </div>
    </div>




</div>