<?php
/**
 * @copyright Copyright (C) 2016 Usha Singhai Neo Informatique Pvt. Ltd
 * @license https://www.gnu.org/licenses/gpl-3.0.html
 */
use usni\UsniAdaptor;

use usni\library\widgets\BrowseDropdown;

/* @var $formDTO \usni\library\dto\FormDTO */

$model  = $formDTO->getModel();
$this->params['breadcrumbs'] = [
        [
        'label' => UsniAdaptor::t('application', 'Administrar') . ' ' .
        UsniAdaptor::t('currency', 'Monedas'),
        'url' => ['/localization/currency/default/index']
    ],
        [
        'label' => UsniAdaptor::t('application', 'Actualizar') . ' #' . $model->id
    ]
];

$browseParams   = ['permission' => 'currency.updateother',
                   'data'   => $formDTO->getBrowseModels(),
                   'model'  => $model];
echo BrowseDropdown::widget($browseParams);

$this->title = UsniAdaptor::t('application', 'Actualizar') . ' ' . UsniAdaptor::t('currency', 'Moneda');
echo $this->render("/_form", ['formDTO' => $formDTO]);
