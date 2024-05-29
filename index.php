<?php
include_once __DIR__ . "/config.php";
include_once ROOT . "header.php";

?>
<!doctype html>
<html lang="pt-BR">

<head>

    <?php include_once ROOT . "vendor/head_css.php"; ?>
    <title>Pré-Venda</title>

</head>

<body>
    <?php include_once  ROOT . "painelmobile.php"; ?>

    <div class="d-flex">

        <?php include_once  ROOT . "painel.php"; ?>

        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-10 d-none d-md-none d-lg-block pr-0 pl-0 ts-bgAplicativos">
                    <ul class="nav a" id="myTabs">


                        <?php
                        $tab = '';

                        if (isset($_GET['tab'])) {
                            $tab = $_GET['tab'];
                        }
                        ?>
                        <?php 
                            if ($tab == '') {
                                $tab = 'prevenda';
                            } ?>
                            <li class="nav-item mr-1">
                                <a class="nav-link 
                                <?php if ($tab == "prevenda") {echo " active ";} ?>" 
                                href="?tab=prevenda" role="tab">Pré-Venda</a>
                            </li>
                    </ul>

                </div>
                <!--Essa coluna s� vai aparecer em dispositivo mobile-->
                <div class="col-7 col-md-9 d-md-block d-lg-none ts-bgAplicativos">
                    <!--atraves do GET testa o valor para selecionar um option no select-->
                    <?php if (isset($_GET['tab'])) {
                        $getTab = $_GET['tab'];
                    } else {
                        $getTab = '';
                    } ?>
                    <select class="form-select mt-2 ts-selectSubMenuAplicativos" id="subtabPrevenda">

                        <option value="<?php echo URLROOT ?>/?tab=prevenda" 
                        <?php if ($getTab == "prevenda") {echo " selected ";} ?>>Pré-Venda</option>

                    </select>
                </div>

                <?php include_once  ROOT . "novoperfil.php"; ?>
            </div>



            <?php
            $src = "";

            if ($tab == "prevenda") {
                $src = "prevenda/prevenda.php";
            }
            if ($src !== "") {
                //echo URLROOT ."/cadastros/". $src;
            ?>
                <div class="container-fluid p-0 m-0">
                    <iframe class="row p-0 m-0 ts-iframe" src="<?php echo URLROOT ?>/<?php echo $src ?>"></iframe>
                </div>
            <?php
            }
            ?>
        </div><!-- div container -->
    </div><!-- div class="d-flex" -->

    <!-- LOCAL PARA COLOCAR OS JS -->

    <?php include_once ROOT . "/vendor/footer_js.php"; ?>

    <script src="<?php echo URLROOT ?>/js/mobileSelectTabs.js"></script>

    <!-- LOCAL PARA COLOCAR OS JS -FIM -->

</body>

</html>