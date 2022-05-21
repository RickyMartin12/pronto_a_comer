<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-calendar"></i> Listar Reservas</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <div class="col-md-12">


            <div class="card">
                <div class="card-header title-black">
                    <h4 class="card-title" style="margin-bottom: 0"><i class="fas fa-search"></i> Pesquisar Reservas</h4>
                </div>
                <div class="card-body">
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <i class="fas fa-user"></i> - <label for="morada">Nome da Pessoa:</label>
                                <input type="text" class="form-control" id="nome_pessoa_search" placeholder="Nome da Pessoa" name="nome_pessoa_search">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <i class="fas fa-envelope"></i> - <label for="morada">Email da Pessoa:</label>
                                <input type="text" class="form-control" id="email_pessoa_search" placeholder="Nome da Pessoa" name="email_pessoa_search">
                            </div>
                        </div>



                    </div>

                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <i class="fas fa-hamburger"></i> - <label for="morada">Prato do Dia:</label>
                                <select class="form-control" id="pratos_dia_select_search">
                                </select>
                            </div>
                        </div>

                        <div class='col-md-6'>
                            <div class="form-group">
                                <span class="glyphicon glyphicon-calendar"></span> - Data de Reserva:
                                <div class='input-group date' id='data_reseva_dt_search'>
                                    <input type='text' readonly class="form-control" name="data_reserva_search" id="data_reserva_search" placeholder="Data de Reserva" />
                                    <span class="input-group-addon">
                                          <span class="glyphicon glyphicon-calendar"></span>
                                      </span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="card-footer title-black">
                    <p style="text-align:right;">
                        <button type="button" class="btn btn-light btn-clear-resv"><i class="fa fa-eraser"></i><font class="hidden-xs"> Limpar</font></button>
                        <button type="button" id="search-resv" class="btn btn-primary2"><i class="fas fa-search"></i><font class="hidden-xs"> Pesquisar</font></button>
                    </p>
                </div>
            </div>


            <div class="topper"></div>


            <div class="card">
                <div class="card-header title-black">
                    <h4 class="card-title" style="margin-bottom: 0"><i class="fas fa-list"></i> Listar Reservas</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">

                            <div id="list_reservas_data"></div>


                            <!--<div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="thead-dark">
                                    <tr>
                                        <th>ID/Acções</th>
                                        <th>Tipo Prato</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Anna</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>-->


                        </div>
                    </div>
                </div>

                <div class="card-footer title-black">
                    <p style="text-align:right;">

                    </p>
                </div>


            </div>


        </div>

    </div>

</div>
