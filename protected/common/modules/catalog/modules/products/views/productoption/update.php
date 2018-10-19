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
        UsniAdaptor::t('products', 'Opciones'),
        'url' => ['/catalog/products/option/index']
    ],
        [
        'label' => UsniAdaptor::t('application', 'Actualizar') . ' #' . $model->id
    ]
];

$browseParams   = ['permission' => 'product.updateother',
                   'data'   => $formDTO->getBrowseModels(),
                   'model'  => $model];
echo BrowseDropdown::widget($browseParams);

$this->title = UsniAdaptor::t('application', 'Actualizar') . ' ' . UsniAdaptor::t('products', 'Opción');
echo $this->render("/productoption/_form", ['formDTO' => $formDTO]);
