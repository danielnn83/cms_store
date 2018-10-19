<?php
/**
 * @copyright Copyright (C) 2016 Usha Singhai Neo Informatique Pvt. Ltd
 * @license https://www.gnu.org/licenses/gpl-3.0.html
 */

/* @var $this \usni\library\web\AdminView */
/* @var $formDTO \products\dto\ProductCategoryFormDTO */

use usni\UsniAdaptor;
$this->params['breadcrumbs'] = [
        [
        'label' => UsniAdaptor::t('application', 'Administrar') . ' ' .
        UsniAdaptor::t('productCategories', 'Categoría del producto'),
        'url' => ['/catalog/productCategories/default/index']
    ],
        [
        'label' => UsniAdaptor::t('application', 'Agregar')
    ]
];
$this->title = UsniAdaptor::t('application', 'Agregar') . ' ' . UsniAdaptor::t('productCategories', 'Categoría del producto');
echo $this->render("/_form", ['formDTO' => $formDTO]);

