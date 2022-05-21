<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-hamburger"></i> Prato do dia</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <div class="col-md-12">

            <div id="submit_prato">
                <div class="card">
                    <div class="card-header title-black">
                        <h4 class="card-title" style="margin-bottom: 0"><i class="fas fa-plus-circle"></i> Novo Prato</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <i class="fas fa-utensils"></i> - <label for="morada">Nome do Prato:</label>
                                    <input type="text" class="form-control" id="nome_prato" placeholder="Nome do Prato" name="nome_prato">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <i class="fas fa-utensil-spoon"></i> - <label for="tipos_pratos_select">Tipos de Prato:</label>
                                    <select class="form-control" id="tipos_pratos_select">
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <i class="fas fa-money-bill"></i> - <label for="preco">Preço:</label>
                                    <input type="number" class="form-control" id="preco" placeholder="Preço" name="preco">
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <i class="fas fa-image"></i> - <label for="preco">Imagem:</label>
                                    <div id="logo_prato_dia" class="col-xs-12 col-md-12">

                                    </div>
                                    <input id="img_prato_file" type="hidden" />
                                    <input id="image_prato" name="file" type="file" class="btn-primary btn col-xs-12"  accept="image/gif, image/jpeg, image/png">
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="card-footer title-black">
                        <p style="text-align:right;">
                            <button type="reset" class="btn btn-light"><i class="fa fa-eraser"></i><font class="hidden-xs"> Limpar</font></button>
                            <button type="submit" id="submit-pratos-dia" class="btn btn-success"><i class="fas fa-save"></i><font class="hidden-xs"> Guardar</font></button>
                        </p>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
