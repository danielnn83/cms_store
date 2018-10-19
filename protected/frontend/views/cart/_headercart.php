<?php

/**
 * @copyright Copyright (C) 2016 Usha Singhai Neo Informatique Pvt. Ltd
 * @license https://www.gnu.org/licenses/gpl.html
 */
use usni\UsniAdaptor;
use usni\fontawesome\FA;
?>
<div class="total-cart total-cart-2 f-left">
    <div class="total-cart-in">
        <div class="cart-toggler">
            <a href="#">
                <span class="cart-quantity"><?php echo $itemCount; ?> <!-- <?php echo UsniAdaptor::t('cart', 'Prod'); ?>(s) - <?php echo $this->getFormattedPrice($itemCost, $currencyCode); ?>--></span><br>
                <span class="cart-icon">
                    <i class="zmdi zmdi-shopping-cart-plus"></i>
                </span>
            </a>                            
        </div>
        <ul>
            <li>
                <div class="top-cart-inner your-cart">
                    <h5 class="text-capitalize">Carrito</h5>
                </div>
            </li>
            <?php
            if ($itemCount == 0) {
                ?>
                <li>
                    <p class="text-center"><?php echo UsniAdaptor::t('cart', 'Tu carrito está vacio!'); ?></p>
                </li>
                <?php
            } else {
                ?> 
                <li>
                    <div class="total-cart-pro">
                        <table class="table">
                            <tbody>
                                <?php echo $items; ?>
                            </tbody>
                        </table>
                    </div>
                </li>


                <li>
                    <div class="top-cart-inner subtotal">
                        <h4 class="text-uppercase g-font-2">
                            Total  =  
                            <span><?php echo $this->getFormattedPrice($totalPrice, $currencyCode); ?></span>
                        </h4>
                    </div>
                </li>
                <li>
                    <div class="top-cart-inner view-cart">
                        <h4 class="text-uppercase">
                            <a href="<?php echo UsniAdaptor::createUrl('cart/default/view');?>"><?php echo UsniAdaptor::t('cart', 'Ver carrito');?></a>
                        </h4>
                    </div>
                </li>
                <li>
                    <div class="top-cart-inner check-out">
                        <h4 class="text-uppercase">
                            <a href="<?php echo UsniAdaptor::createUrl('cart/checkout/index');?>"><?php echo UsniAdaptor::t('cart', 'Realizar pago');?></a>
                        </h4>
                    </div>
                </li>
    <?php
}
?>
        </ul>
    </div>
</div>