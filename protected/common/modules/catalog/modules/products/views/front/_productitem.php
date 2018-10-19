<?php

/**
 * @copyright Copyright (C) 2016 Usha Singhai Neo Informatique Pvt. Ltd
 * @license https://www.gnu.org/licenses/gpl-3.0.html
 */
use usni\UsniAdaptor;
use usni\library\utils\FileUploadUtil;
use products\widgets\PriceWidget;
use usni\library\utils\Html;

$addCartLabel = UsniAdaptor::t('cart', 'Agregar al carrito');
$addWishListLabel = UsniAdaptor::t('wishlist', 'Agregar a la lista de deseos');
$addCompareLabel = UsniAdaptor::t('products', 'Agregar a comparar');
?>
<?php echo Html::beginTag('div', $containerOptions); ?>

<!-- product-item start -->
<div class="col-xs-12">
    <div class="product-item product-item-2">
        <div class="product-img">
            <a href="<?php echo UsniAdaptor::createUrl('/catalog/products/site/detail', ['id' => $model['id']]); ?>">
                <?php echo FileUploadUtil::getThumbnailImage($model, 'image', ['thumbWidth' => $productWidth,
                    'thumbHeight' => $productHeight]);
                ?>
            </a>
        </div>
        <div class="product-info">
            <h6 class="product-title">
                <a href="<?php echo UsniAdaptor::createUrl('/catalog/products/site/detail', ['id' => $model['id']]); ?>">
<?php echo $model['name']; ?>
                </a>
            </h6>
            <h6 class="brand-name">
                <?php
                $desc = strip_tags($model['description']);
                if (strlen($desc) > $listDescrLimit) {
                    echo substr($desc, 0, $listDescrLimit) . '...';
                } else {
                    echo $desc;
                }
                ?>    
            </h6>
            <a href="bano.html" class="btn-card">Galer&iacute;a</a>
        </div>
        <ul class="action-button">

<?php
if ($allowWishList) {
    ?>
                <!--li>
                    <button type="button" data-toggle="tooltip" title="<?php echo $addWishListLabel; ?>" class="product-wishlist" data-productid = "<?php echo $model['id']; ?>" name="<?php echo $addWishListLabel; ?>">
                        <i class="zmdi zmdi-favorite" id="add-to-wish-list-<?php echo $model['id']; ?>"></i>
                    </button>
                </li-->


    <?php
}
?>
            <li>
                <a href="#" data-toggle="modal"  data-target="#productModal" title="Quickview"><i class="zmdi zmdi-zoom-in"></i></a>
            </li>
            
            <li>
                <?php
                if($model['requiredOptionsCount'] == 0)
                {
                ?>

                    <!--input type="hidden" name="quantity" value="1" />
                        <button type="button" data-toggle="tooltip" title="<?php echo $addCartLabel;?>" class="add-cart" data-productid = "<?php echo $model['id'];?>">
                            <i class="zmdi zmdi-shopping-cart-plus"></i>
                            <span class="hidden-xs hidden-sm hidden-md"><?php //echo $addCartLabel;?></span>
                        </button-->
                <?php
                }
                else
                {
                    $url   = UsniAdaptor::createUrl('/catalog/products/site/detail', ['id' => $model['id']]);
                ?>
                    <!--button type="button" data-toggle="tooltip" title="<?php echo $addCartLabel;?>">
                        <a href="<?php echo $url;?>"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                        <a href="<?php echo $url;?>"><span class="hidden-xs hidden-sm hidden-md"><?php //echo $addCartLabel;?></span></a>
                    </button-->
                <?php    
                }
                ?>
                
            </li>
        </ul>
    </div>
</div>
<!-- product-item end -->

<?php
echo Html::endTag('div');
