<?php 
/**
 * @copyright Copyright (C) 2016 Usha Singhai Neo Informatique Pvt. Ltd
 * @license https://www.gnu.org/licenses/gpl-3.0.html
 */
use usni\library\utils\Html;
use usni\UsniAdaptor
?>

<!-- Sidebar navigation -->
<div class="col-sm-3 hidden-xs" id="column-left">
<nav>
  <ul id="accountsidebarlist">
      <li><?php echo Html::a(UsniAdaptor::t('users', 'Mi cuenta'), UsniAdaptor::createUrl('/customer/site/my-account')); ?></li>
      <li><?php echo Html::a(UsniAdaptor::t('users', 'Editar perfil'), UsniAdaptor::createUrl('/customer/site/edit-profile')); ?></li>
      <li><?php echo Html::a(UsniAdaptor::t('users', 'Cambiar Password'), UsniAdaptor::createUrl('/customer/site/change-password')) ?></li>    
      <li><?php //echo Html::a(UsniAdaptor::t('order', 'Mis Pedidos'), UsniAdaptor::createUrl('/customer/site/order-history')) ?></li>
      <li><?php //echo Html::a(UsniAdaptor::t('wishlist', 'Deseados'), UsniAdaptor::createUrl('wishlist/default/view')) ?></li>
      <!--li><?php //echo Html::a(UsniAdaptor::t('customer', 'Mis descargas'), UsniAdaptor::createUrl('customer/site/downloads')) ?></li-->
  </ul>
</nav>
</div>

