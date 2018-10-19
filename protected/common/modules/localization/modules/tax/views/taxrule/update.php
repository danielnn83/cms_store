<?php
/**
 * @copyright Copyright (C) 2016 Usha Singhai Neo Informatique Pvt. Ltd
 * @license https://www.gnu.org/licenses/gpl-3.0.html
 */
use usni\UsniAdaptor;

use usni\library\widgets\BrowseDropdown;

/* @var $formDTO \taxes\dto\TaxRuleFormDTO */

$model  = $formDTO->getModel();
$this->params['breadcrumbs'] = [
        [
        'label' => UsniAdaptor::t('application', 'Administrar') . ' ' .
        UsniAdaptor::t('tax', 'Regla de impuestos'),
        'url' => ['/localization/tax/rule/index']
    ],
        [
        'label' => UsniAdaptor::t('application', 'Actualizar') . ' #' . $model->id
    ]
];

$browseParams   = ['permission' => 'taxrule.updateother',
                   'data'   => $formDTO->getBrowseModels(),
                   'model'  => $model];
echo BrowseDropdown::widget($browseParams);

$this->title = UsniAdaptor::t('application', 'Actualizar') . ' ' . UsniAdaptor::t('tax', 'Regla de impuestos');
echo $this->render("/taxrule/_form", ['formDTO' => $formDTO]);
