<?php
/**
 * @copyright Copyright (C) 2016 Usha Singhai Neo Informatique Pvt. Ltd
 * @license https://www.gnu.org/licenses/gpl-3.0.html
 */
/* @var $this \usni\library\web\AdminView */
/* @var $formDTO \products\dto\ProductAttributeFormDTO */

use usni\UsniAdaptor;
$this->params['breadcrumbs'] = [
        [
        'label' => UsniAdaptor::t('application', 'Administrar') . ' ' .
        UsniAdaptor::t('products', 'Atributos'),
        'url' => ['/catalog/products/attribute/index']
    ],
        [
        'label' => UsniAdaptor::t('application', 'Agregar')
    ]
];
$this->title = UsniAdaptor::t('application', 'Agregar') . ' ' . UsniAdaptor::t('products', 'Atributos');
echo $this->render("/productattribute/_form", ['formDTO' => $formDTO]);

