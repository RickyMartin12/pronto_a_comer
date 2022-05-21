<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-comment"></i> Novo Comentário</h1>
    </div>

    <!-- Content Row -->
    <div class="row">



        <div class="col-md-12">


            <div class="card">
                <div class="card-header title-black">
                    <h4 class="card-title" style="margin-bottom: 0"><i class="fas fa-search"></i> Pesquisar Comentarios</h4>
                </div>
                <div class="card-body">
                    <div class="row">





                        <div class="col-md-6">
                            <div class="form-group">
                                <i class="fas fa-star"></i> - <label for="morada">Classificação:</label>
                                <input type="number" min="0" max="5" class="form-control" onkeyup="enforceMinMax(this)" id="clas_com_search" placeholder="Classificação" name="clas_com_search">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <i class="fas fa-check-circle"></i> - <label for="morada">Comentarios Activados:</label>
                                <br>
                                <input type="checkbox" data-toggle="toggle" data-on="Activo" data-off="Desativado" data-onstyle="success" data-offstyle="danger" name='act_com_search' id='act_com_search'>

                            </div>
                        </div>



                    </div>

                </div>
                <div class="card-footer title-black">
                    <p style="text-align:right;">
                        <button type="button" class="btn btn-light btn-clear-co"><i class="fa fa-eraser"></i><font class="hidden-xs"> Limpar</font></button>
                        <button type="button" id="search-comm" class="btn btn-primary2"><i class="fas fa-search"></i><font class="hidden-xs"> Pesquisar</font></button>
                    </p>
                </div>
            </div>


            <div class="topper"></div>

            <div class="card">
                <div class="card-header title-black">
                    <h4 class="card-title" style="margin-bottom: 0"><i class="fas fa-list"></i> Listar Commentarios</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">

                            <div id="list_com_data"></div>



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