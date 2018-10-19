<?php
use usni\UsniAdaptor;
use usni\library\utils\Html;
?>
<div> 
    
<ul class="main-menu text-center">
    
    <li>
        <?php echo Html::a(UsniAdaptor::t('cms', 'Inicio'), UsniAdaptor::createUrl('index.php')); ?>
    </li>
    <li class="mega-parent">
        <?php echo Html::a(UsniAdaptor::t('cms', 'Empresa'), UsniAdaptor::createUrl('cms/site/page', ['alias' => UsniAdaptor::t('cms', 'empresa')])); ?>
        
        <ul class="dropdwn" style="margin-left: 100px;">
            <li>
                <?php echo Html::a(UsniAdaptor::t('cms', 'Historia'), UsniAdaptor::createUrl('cms/site/page', ['alias' => UsniAdaptor::t('cms', 'historia')])); ?>
            </li>
            <li>
                <?php echo Html::a(UsniAdaptor::t('cms', 'Infraestructura'), UsniAdaptor::createUrl('cms/site/page', ['alias' => UsniAdaptor::t('cms', 'infraestructura')])); ?>
            </li>
            <li>
                <?php echo Html::a(UsniAdaptor::t('cms', 'Políticas de calidad'), UsniAdaptor::createUrl('cms/site/page', ['alias' => UsniAdaptor::t('cms', 'pol--ticas-de-calidad')])); ?>
            </li>
            <li>
                <?php echo Html::a(UsniAdaptor::t('cms', 'Video Corporativo'), UsniAdaptor::createUrl('cms/site/page', ['alias' => UsniAdaptor::t('cms', 'video-corporativo')])); ?>
            </li>
            <li>
                <?php echo Html::a(UsniAdaptor::t('cms', 'Filosofía'), UsniAdaptor::createUrl('cms/site/page', ['alias' => UsniAdaptor::t('cms', 'filosof-a')])); ?>
            </li>

        </ul>
    </li>
    <li class="mega-parent">
        <?php echo Html::a(UsniAdaptor::t('cms', 'Productos'), UsniAdaptor::createUrl('cms/site/page', ['alias' => UsniAdaptor::t('cms', 'productos')])); ?>


        <ul class="dropdwn" style="margin-left: 200px;">
            <li>
                <?php echo Html::a(UsniAdaptor::t('cms', 'Baño'), UsniAdaptor::createUrl('cms/site/page', ['alias' => UsniAdaptor::t('cms', 'ba-o')])); ?>
            </li>
            <li>
                <?php echo Html::a(UsniAdaptor::t('cms', 'Playa'), UsniAdaptor::createUrl('cms/site/page', ['alias' => UsniAdaptor::t('cms', 'playa')])); ?>
            </li>
            <li>
                <?php echo Html::a(UsniAdaptor::t('cms', 'Cocina'), UsniAdaptor::createUrl('cms/site/page', ['alias' => UsniAdaptor::t('cms', 'cocina')])); ?>
            </li>
            <li>
                <?php echo Html::a(UsniAdaptor::t('cms', 'Bebé/Infantil'), UsniAdaptor::createUrl('cms/site/page', ['alias' => UsniAdaptor::t('cms', 'beb--infantil')])); ?>
            </li>
            <li>
                <?php echo Html::a(UsniAdaptor::t('cms', 'Licencias'), UsniAdaptor::createUrl('cms/site/page', ['alias' => UsniAdaptor::t('cms', 'licencias')])); ?>
            </li>

        </ul>

    </li>
    <li class="mega-parent">
        <?php echo Html::a(UsniAdaptor::t('cms', 'Hotelería'), UsniAdaptor::createUrl('cms/site/page', ['alias' => UsniAdaptor::t('cms', 'hoteleria')])); ?>
        
        <div class="mega-menu-area mega-menu-area-2 clearfix">
            <div class="mega-menu-link mega-menu-link-2  f-left">
                <ul class="single-mega-item">
                    <li class="menu-title">Toallas</li>
                    <li>
                        <?php echo Html::a(UsniAdaptor::t('cms', 'Torzal'), UsniAdaptor::createUrl('cms/site/page', ['alias' => UsniAdaptor::t('cms', 'torzal')])); ?>
                    </li>
                    <li>
                        <?php echo Html::a(UsniAdaptor::t('cms', 'Ginesta'), UsniAdaptor::createUrl('cms/site/page', ['alias' => UsniAdaptor::t('cms', 'ginesta')])); ?>
                    </li>



                </ul>
                <ul class="single-mega-item">
                    <li class="menu-title">Batas</li>
                    <li>
                        <?php echo Html::a(UsniAdaptor::t('cms', 'Torzal'), UsniAdaptor::createUrl('cms/site/page', ['alias' => UsniAdaptor::t('cms', 'torzal-')])); ?>
                    </li>
                    <li>
                        <?php echo Html::a(UsniAdaptor::t('cms', 'Rasurada'), UsniAdaptor::createUrl('cms/site/page', ['alias' => UsniAdaptor::t('cms', 'rasurada')])); ?>
                    </li>
                    <li>
                        <?php echo Html::a(UsniAdaptor::t('cms', 'Superior rasurada'), UsniAdaptor::createUrl('cms/site/page', ['alias' => UsniAdaptor::t('cms', 'superior-rasurada')])); ?>
                    </li>


                </ul>
                <ul class="single-mega-item">
                    <li class="menu-title">Ropa de cama</li>
                    <li>
                        <?php echo Html::a(UsniAdaptor::t('cms', 'Almohadas'), UsniAdaptor::createUrl('cms/site/page', ['alias' => UsniAdaptor::t('cms', 'almohadas')])); ?>
                        
                    </li>
                    <li>
                        <?php echo Html::a(UsniAdaptor::t('cms', 'Fundas'), UsniAdaptor::createUrl('cms/site/page', ['alias' => UsniAdaptor::t('cms', 'fundas')])); ?>
                        
                    </li>
                    <li>
                        <?php echo Html::a(UsniAdaptor::t('cms', 'Sábanas'), UsniAdaptor::createUrl('cms/site/page', ['alias' => UsniAdaptor::t('cms', 's-banas')])); ?>
                        
                    </li>
                    <li>
                        <?php echo Html::a(UsniAdaptor::t('cms', 'Duvets'), UsniAdaptor::createUrl('cms/site/page', ['alias' => UsniAdaptor::t('cms', 'duvets')])); ?>
                        
                    </li>
                    <li>
                        <?php echo Html::a(UsniAdaptor::t('cms', 'Cobertor'), UsniAdaptor::createUrl('cms/site/page', ['alias' => UsniAdaptor::t('cms', 'cobertor')])); ?>
                        
                    </li>
                    <li>
                        <?php echo Html::a(UsniAdaptor::t('cms', 'Protectores de cama'), UsniAdaptor::createUrl('cms/site/page', ['alias' => UsniAdaptor::t('cms', 'protectores-de-cama')])); ?>
                        
                    </li>
                    <li>
                        <?php echo Html::a(UsniAdaptor::t('cms', 'Cortina de baño'), UsniAdaptor::createUrl('cms/site/page', ['alias' => UsniAdaptor::t('cms', 'cortina-de-ba-o')])); ?>
                    </li>

                </ul>
            </div>
        </div>
    </li>
    <!--li>
        <?php //echo Html::a(UsniAdaptor::t('cart', 'Tienda Online'), UsniAdaptor::createUrl('cart/default/view')); ?>
    </li-->

    <li>
        <?php echo Html::a(UsniAdaptor::t('cms', 'Contacto'), UsniAdaptor::createUrl('site/default/contact-us')); ?>
    </li>
    <li>
        <ul class="header-social">
            <li>
                <a class="facebookH" href="" title="Facebook"><i class="zmdi zmdi-facebook"></i></a>
            </li>

            <li>
                <a class="twitterH" href="" title="Twitter"><i class="zmdi zmdi-twitter"></i></a>
            </li>

        </ul>
    </li>

</ul>
    
</div>
