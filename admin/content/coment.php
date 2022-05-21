<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-comment"></i> Novo Comentário</h1>
    </div>

    <!-- Content Row -->
    <div class="row">



        <div class="col-md-12">


            <div id="submit_prato">
                <div class="card">
                    <div class="card-header title-black">
                        <h4 class="card-title" style="margin-bottom: 0"><i class="fas fa-plus-circle"></i> Novo Comentário</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <span class="glyphicon glyphicon-user"></span> - <label for="morada">Nome:</label>
                                    <input type="text" class="form-control" name="nome_pess" id="nome_pess" placeholder='Insira o seu nome'>
                                </div>
                            </div>


                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <span class="glyphicon glyphicon-envelope"></span> - <label for="morada">Mensagem do Comentário:</label>
                                    <textarea class="form-control" rows="5" id="mensagem_pess" name="mensagem_pess" placeholder='Insira o seu Comentário'></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <span class="fa fa-cutlery"></span> <label for="morada">Classificação Geral:</label>
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

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="checkbox" data-toggle="toggle" data-on="Activo" data-off="Desativado" data-onstyle="success" data-offstyle="danger" name='activate_comment' id='activate_comment'>
                                    <input type="hidden" id="activo_campo">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer title-black">
                        <p style="text-align:right;">
                            <button type="reset" class="btn btn-light btn-clear-comm"><i class="fa fa-eraser"></i><font class="hidden-xs"> Limpar</font></button>
                            <button type="submit" id="submit-comm" class="btn btn-success"><i class="fas fa-save"></i><font class="hidden-xs"> Guardar</font></button>
                        </p>
                    </div>
                </div>
            </div>








        </div>
    </div>
</div>