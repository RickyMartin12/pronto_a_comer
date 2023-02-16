<?php
session_start();
//$_COOKIE['user_name'] = 'Carlos';
if(!isset($_COOKIE['user_name'])) {
    header("Location:login.php");
}


else{

    ?>

    <?php


    // Incluir as Funções a app web (CRUD)

    include $_SERVER['DOCUMENT_ROOT']. '/admin/forms/forms.php';

    // TOTAL DE COMENTARIOS
    $comenatrios = numComentarios();


    $pratos_dia = numPratosDia();

    $tipos_Pratos = numTiposPratos();


    $n_reservas = numReservas();


    ?>


    <!DOCTYPE html>
    <html lang="pt">

    <?php include 'header/header.php'; ?>



    <body id="page-top">




    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include 'header/navbar.php'; ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include 'header/profile.php'; ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <?php include 'content/dashboard.php'; ?>
                <!-- /.container-fluid -->


                <?php include 'modals/modals.php'; ?>

            </div>
            <!-- End of Main Content -->



            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; <b>"Pronto a Comer"</b> 2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>



    <?php include 'footer/footer.php'; ?>



    </body>

    </html>

    <?php

}

?>
