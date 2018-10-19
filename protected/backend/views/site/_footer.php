<?php
/**
 * @copyright Copyright (C) 2016 Usha Singhai Neo Informatique Pvt. Ltd
 * @license https://www.gnu.org/licenses/gpl-3.0.html
 */
use usni\UsniAdaptor;

$storeName      = null;
if(UsniAdaptor::app()->installed === true && YII_ENV != 'test')
{
    $currentStore   = UsniAdaptor::app()->storeManager->selectedStore;
    $storeName      = $currentStore['name'];
}
else
{
    $storeName  = UsniAdaptor::t('stores', 'Nombre de la tienda');
}
?>
<div class="footer clearfix">
    <div class="pull-left">
        Copyright &copy; <?php echo date('Y'); ?> <?php echo $storeName . ' ' . UsniAdaptor::t('application', 'Todos los derechos reservados.');?>
        
    </div>
    <div class="pull-right">
        <?php echo UsniAdaptor::app()->powered() . " " . UsniAdaptor::t('application', 'Versión') . ' ' . UsniAdaptor::app()->version; ?>
    </div>
</div><!-- footer -->
