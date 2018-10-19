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
        UsniAdaptor::t('manufacturer', 'Fabricantes'),
        'url' => ['/manufacturer/default/index']
    ],
        [
        'label' => UsniAdaptor::t('application', 'Agregar')
    ]
];
$this->title = UsniAdaptor::t('application', 'Agregar') . ' ' . UsniAdaptor::t('manufacturer', 'Fabricantes');
echo $this->render("/_form", ['model' => $formDTO->getModel()]);

