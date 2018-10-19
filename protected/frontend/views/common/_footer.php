<?php

use usni\UsniAdaptor;
use usni\library\utils\Html;
use common\modules\stores\models\Store;
use newsletter\models\NewsletterCustomers;

$assetsUrl  = UsniAdaptor::app()->urlManager->baseUrl;
/* @var $this \frontend\web\View */
?>
<!-- begin:footer -->
<footer id="footer" class="footer-area footer-2">

    <div class="footer-bottom footer-bottom-2 text-center gray-bg">
        <div class="container">
            <div class="row">

                <div class="col-md-4 col-sm-5">
                    <?php echo Html::img($assetsUrl . '/images/logo/logo-gris.png');?>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="copyright-text copyright-text-2">
                        <p><a href="#link" target="_blank">Copyright &copy; 2016 TOALLERA POPULAR S.A. DE C.V. <br>Todos los derechos reservados.</a> <a href="#">Administraci&oacute;n</a></p>
                    </div>

                </div>
                <div class="col-md-4 col-sm-3">
                    <ul class="footer-social">
                        <li>
                            <a class="facebook" href="" title="Facebook"><i class="zmdi zmdi-facebook"></i></a>
                        </li>

                        <li>
                            <a class="twitter" href="" title="Twitter"><i class="zmdi zmdi-twitter"></i></a>
                        </li>

                    </ul>
                    <ul class="footer-payment">
                        <li>
                            <a href="#"><img src="images/payment/1.jpg" alt=""></a>
                        </li>

                        <li>
                            <a href="#"><img src="images/payment/3.jpg" alt=""></a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- end:footer -->