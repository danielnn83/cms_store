<?php
/**
 * @copyright Copyright (C) 2016 Usha Singhai Neo Informatique Pvt. Ltd
 * @license https://www.gnu.org/licenses/gpl-3.0.html
 */
use usni\UsniAdaptor;
use usni\library\modules\users\widgets\DetailActionToolbar;
use usni\fontawesome\FA;
use usni\library\widgets\Tabs;
use usni\library\modules\users\widgets\DetailBrowseDropdown;

/* @var $detailViewDTO \customer\dto\CustomerDetailViewDTO */
/* @var $this \usni\library\web\AdminView */

$model          = $detailViewDTO->getModel();
$this->title    = UsniAdaptor::t('application', 'Ver') . ' ' . UsniAdaptor::t('customer', 'Cliente');
$this->params['breadcrumbs'] =  [
                                    [
                                        'label' => UsniAdaptor::t('application', 'Administrar') . ' ' .
                                        UsniAdaptor::t('customer', 'Clientes'),
                                        'url' => ['/customer/default/index']
                                    ],
                                    [
                                        'label' => UsniAdaptor::t('application', 'Ver') . ' #' . $model['id']
                                    ]
                                ];

$browseParams   = ['permission' => 'customer.viewother',
                   'model' => $model,
                   'data'  => $detailViewDTO->getBrowseModels(),
                   'textAttribute' => 'username',
                   'modalDisplay' => $detailViewDTO->getModalDisplay()];

echo DetailBrowseDropdown::widget($browseParams);
$toolbarParams  = ['editUrl'            => UsniAdaptor::createUrl('customer/default/update', ['id' => $model['id']]),
                   'changePasswordUrl'  => UsniAdaptor::createUrl('customer/default/change-password', ['id' => $model['id']]),
                   'deleteUrl'          => UsniAdaptor::createUrl('customer/default/delete', ['id' => $model['id']])];
?>
<div class="panel panel-default detail-container">
    <div class="panel-heading">
        <h6 class="panel-title"><?php echo FA::icon('book') . $model['username'];?></h6>
            <?php
                echo DetailActionToolbar::widget($toolbarParams);
            ?>
    </div>
    <?php
            $items[] = [
                'options' => ['id' => 'tabloginInfo'],
                'label' => UsniAdaptor::t('application', 'General'),
                'class' => 'active',
                'content' => $this->render('/_customerview', ['detailViewDTO' => $detailViewDTO])
            ];
            $items[] = [
                'options' => ['id' => 'tabprofileInfo'],
                'label' => UsniAdaptor::t('users', 'Perfil'),
                'content' => $this->render('@usni/library/modules/users/views/_personview', ['detailViewDTO' => $detailViewDTO])
            ];
            $items[] = [
                'options' => ['id' => 'tabaddressInfo'],
                'label' => UsniAdaptor::t('users', 'Dirección'),
                'content' => $this->render('@usni/library/modules/users/views/_addressview', ['detailViewDTO' => $detailViewDTO])
            ];
            echo Tabs::widget(['items' => $items]);
    ?>
</div>