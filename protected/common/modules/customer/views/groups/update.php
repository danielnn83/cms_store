<?php
/**
 * @copyright Copyright (C) 2016 Usha Singhai Neo Informatique Pvt. Ltd
 * @license https://www.gnu.org/licenses/gpl-3.0.html
 */
use usni\UsniAdaptor;
use usni\library\modules\auth\widgets\BrowseDropdown;

/* @var $formDTO \usni\library\modules\auth\dto\FormDTO */

$model  = $formDTO->getModel();
$this->params['breadcrumbs'] = [
        [
        'label' => UsniAdaptor::t('application', 'Administrar') . ' ' .
        UsniAdaptor::t('customer', 'Grupos de clientes'),
        'url' => ['/customer/group/index']
    ],
        [
        'label' => UsniAdaptor::t('application', 'Actualizar') . ' #' . $model->id
    ]
];

$browseParams   = ['permission' => 'group.updateother',
                   'data'   => $formDTO->getBrowseModels(),
                   'model'  => $model];
echo BrowseDropdown::widget($browseParams);

$this->title = UsniAdaptor::t('application', 'Actualizar') . ' ' . UsniAdaptor::t('auth', 'Grupo');
echo $this->render("/groups/_form", ['formDTO' => $formDTO]);