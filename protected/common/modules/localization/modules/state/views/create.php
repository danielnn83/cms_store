<?php
/**
 * @copyright Copyright (C) 2016 Usha Singhai Neo Informatique Pvt. Ltd
 * @license https://www.gnu.org/licenses/gpl-3.0.html
 */

/* @var $this \usni\library\web\AdminView */
/* @var $formDTO \common\modules\localization\modules\state\dto\FormDTO */

use usni\UsniAdaptor;
$this->params['breadcrumbs'] = [
        [
        'label' => UsniAdaptor::t('application', 'Administrar') . ' ' .
        UsniAdaptor::t('state', 'Estados'),
        'url' => ['/localization/state/default/index']
    ],
        [
        'label' => UsniAdaptor::t('application', 'Agregar')
    ]
];
$this->title = UsniAdaptor::t('application', 'Agregar') . ' ' . UsniAdaptor::t('state', 'Estado');
echo $this->render("/_form", ['formDTO' => $formDTO]);

