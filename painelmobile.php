<!-- pega url -->
<?php 
include_once 'header.php';
$URL_ATUAL = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$url = (parse_url($URL_ATUAL, PHP_URL_PATH));
?>

<!-- MENU MOBILE -->
        <nav class="navbar-dark d-lg-none p-2 ts-bgAplicativos">
            <div class="row d-flex flex">
                <div class="col-6 col-sm-8 ">
                    <a class="navbar-brand" href="#"><img src="<?php echo URLROOT ?>/img/meucontrole.png" width="100vh 100vw"></a>
                </div>
                <div class="col-6 col-sm-4 text-end ">
                
                    <select class="form-select mt-2 ts-selectAplicativos" id="tabaplicativosmobile">
                        <option value="<?php echo URLROOT ?>" <?php if ($url == URLROOT) {
                                            echo " selected ";
                                        } ?>>Pré-Venda</option>
                    </select>
                </div>
            </div>
        </nav>

        
<!-- MENU MOBILE -->        