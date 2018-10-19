<?php
use common\utils\ApplicationUtil;
use usni\UsniAdaptor;
use frontend\widgets\ActiveForm;
use cart\widgets\ConfirmCartSubView;

/* @var $this \frontend\web\View */
/* @var $reviewDTO \cart\dto\ReviewDTO */

$cart   = ApplicationUtil::getCart();
$this->params['breadcrumbs'][]  = [
                                    'label' => UsniAdaptor::t('cart', 'Carrito de compras'),
                                    'url'   => UsniAdaptor::createUrl('cart/default/view')
                                  ];
$this->title    = $this->params['breadcrumbs'][] = UsniAdaptor::t('cart', 'Confirmar pedido');
$order          = ApplicationUtil::getCheckoutFormModel('order');
?>
<?php $form = ActiveForm::begin([
                                    'id'     => 'reviewview', 
                                    'layout' => 'horizontal',
                                    'caption'=> $this->title,
                                    'action' => '#'
                               ]); ?>

        <div class="row">
            <div class="col-sm-3">
                <legend><?php echo UsniAdaptor::t('customer', 'Dirección de facturación');?></legend>
                <?php echo $reviewDTO->getBillingContent();?>
            </div>
            <?php
            if($cart->isShippingRequired())
            {
            ?>
                <div class="col-sm-3">
                    <legend><?php echo UsniAdaptor::t('customer', 'Dirección de envío');?></legend>
                    <?php echo $reviewDTO->getShippingContent();?>
                </div>
                <div class="col-sm-3">
                    <legend><?php echo UsniAdaptor::t('shipping', 'Método de envío');?></legend>
                    <?php echo $reviewDTO->getShippingName();?>
                </div>
            <?php
            }
            ?>
            <div class="col-sm-3">
                <legend><?php echo UsniAdaptor::t('payment', 'Método de pago');?></legend>
                <?php echo $reviewDTO->getPaymentMethodName();?>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="col-sm-12">
                <?php echo ConfirmCartSubView::widget();?>
            </div>
        </div>
<?php ActiveForm::end();
echo $reviewDTO->getPaymentFormContent();