<?php
/**
 * @copyright Copyright (C) 2016 Usha Singhai Neo Informatique Pvt. Ltd
 * @license https://www.gnu.org/licenses/gpl.html
 */
use usni\UsniAdaptor;
?>
    <div style="margin: 10px 0px;">
        <a id="product-list-review" style="cursor: pointer">
            <?php echo $reviewCount; ?>&nbsp;
            <?php echo lcfirst(UsniAdaptor::t('products', 'Comentarios')); ?>
        </a>
        &nbsp;&nbsp;|&nbsp;&nbsp;
        <a id="product-write-review"  style="cursor: pointer">
            <?php echo UsniAdaptor::t('products', 'Escribir comentario') ?>
        </a>
    </div>
