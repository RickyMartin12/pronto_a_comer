<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-utensils"></i> Listar Tipo de Pratos</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <div class="col-md-12">


            <div class="card">
                <div class="card-header title-black">
                    <h4 class="card-title" style="margin-bottom: 0"><i class="fas fa-search"></i> Pesquisar Tipos de Pratos</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <i class="fas fa-utensils"></i> - <label for="morada">Tipo Prato:</label>
                                <input type="text" class="form-control" id="tipo_prato_search" placeholder="Tipo de Prato" name="tipo_prato_search">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer title-black">
                    <p style="text-align:right;">
                        <button type="button" class="btn btn-light btn-clear"><i class="fa fa-eraser"></i><font class="hidden-xs"> Limpar</font></button>
                        <button type="button" id="search-tipo-pra" class="btn btn-primary2"><i class="fas fa-search"></i><font class="hidden-xs"> Pesquisar</font></button>
                    </p>
                </div>
            </div>


            <div class="topper"></div>



            <div class="card">
                <div class="card-header title-black">
                    <h4 class="card-title" style="margin-bottom: 0"><i class="fas fa-list"></i> Listar Tipos de Pratos</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">

                            <div id="list_tipos_pratos"></div>


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
