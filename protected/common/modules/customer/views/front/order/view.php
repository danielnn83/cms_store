<?php
/**
 * @copyright Copyright (C) 2016 Usha Singhai Neo Informatique Pvt. Ltd
 * @license https://www.gnu.org/licenses/gpl-3.0.html
 */
use usni\UsniAdaptor;
use usni\fontawesome\FA;
use usni\library\widgets\Tabs;
use usni\library\widgets\DetailBrowseDropdown;
use products\behaviors\PriceBehavior;

/* @var $detailViewDTO \common\modules\order\dto\DetailViewDTO */
/* @var $this \frontend\web\View */

$this->attachBehavior('priceBehavior', PriceBehavior::className());
$model              = $detailViewDTO->getModel();
$this->title        = UsniAdaptor::t('application', 'Ver') . ' ' . UsniAdaptor::t('products', 'Pedido') . '  '. '#' . $model['id'];
$this->leftnavView  = '/front/_sidebar';
$this->params['breadcrumbs'] =  [
                                    [
                                        'label' => UsniAdaptor::t('customer', 'Mi cuenta'),
                                        'url'   => ['/customer/site/my-account']
                                    ],
                                    [
                                        'label' => UsniAdaptor::t('order', 'Pedido') . ' #' . $model['id']
                                    ]
                                ];

$browseParams   = ['permission' => 'order.viewother',
                   'model' => $model,
                   'textAttribute' => 'id',
                   'data'  => $detailViewDTO->getBrowseModels(),
                   'modalDisplay' => $detailViewDTO->getModalDisplay()];

echo DetailBrowseDropdown::widget($browseParams);
?>
<div class="panel panel-default detail-container">
    <div class="panel-heading">
        <h6 class="panel-title"><?php echo FA::icon('book') . ' ' . UsniAdaptor::t('order', 'Pedido') . '  '. '#' . $model['id'];?></h6>
            <?php
            ?>
    </div>
    <?php
            $items[] = [
                'options' => ['id' => 'tabgeneral'],
                'label' => UsniAdaptor::t('application', 'General'),
                'class' => 'active',
                'content' => $this->render('/front/order/_generalview', ['detailViewDTO' => $detailViewDTO])
            ];
            if($model['billingAddress'] !== false)
            {
                $items[] = [
                    'options' => ['id' => 'tabbilling'],
                    'label' => UsniAdaptor::t('customer', 'Dirección de facturación'),
                    'content' => $this->render('@common/modules/order/views/detail/_billingaddress', ['detailViewDTO' => $detailViewDTO])
                ];
            }
            if($model['shippingAddress'] !== false)
            {
                $items[] = [
                    'options' => ['id' => 'tabshipping'],
                    'label' => UsniAdaptor::t('customer', 'Dirección de envío'),
                    'content' => $this->render('@common/modules/order/views/detail/_shippingaddress', ['detailViewDTO' => $detailViewDTO])
                ];
            }
            $items[] = [
                'options' => ['id' => 'tabpayment'],
                'label' => UsniAdaptor::t('order', 'Detalles del pago'),
                'content' => $this->render('@common/modules/order/views/detail/_paymentdetails', ['detailViewDTO' => $detailViewDTO])
            ];
            $items[] = [
                'options' => ['id' => 'tabproducts'],
                'label' => UsniAdaptor::t('order', 'Detalles del producto'),
                'content' => $this->render('@common/modules/order/views/detail/_productdetails', ['detailViewDTO' => $detailViewDTO])
            ];
            $items[] = [
                'options' => ['id' => 'tabhistory'],
                'label' => UsniAdaptor::t('order', 'Historial de pedidos'),
                'content' => $this->render('/front/order/_orderhistoryview', ['detailViewDTO' => $detailViewDTO])
            ];
            echo Tabs::widget(['items' => $items]);
    ?>
</div>