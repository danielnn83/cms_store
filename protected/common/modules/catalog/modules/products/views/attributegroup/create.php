<?php
/**
 * @copyright Copyright (C) 2016 Usha Singhai Neo Informatique Pvt. Ltd
 * @license https://www.gnu.org/licenses/gpl-3.0.html
 */
/* @var $this \usni\library\web\AdminView */
/* @var $formDTO \usni\library\dto\FormDTO */

use usni\UsniAdaptor;
$this->params['breadcrumbs'] = [
        [
        'label' => UsniAdaptor::t('application', 'Administrar') . ' ' .
        UsniAdaptor::t('products', 'Atributos de grupo'),
        'url' => ['/catalog/products/attribute-group/index']
    ],
        [
        'label' => UsniAdaptor::t('application', 'Agregar')
    ]
];
$this->title = UsniAdaptor::t('application', 'Agregar') . ' ' . UsniAdaptor::t('products', 'Atributos de grupo');
echo $this->render("/attributegroup/_form", ['model' => $formDTO->getModel()]);

