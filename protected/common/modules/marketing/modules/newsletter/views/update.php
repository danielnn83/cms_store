<?php
/**
 * @copyright Copyright (C) 2016 Usha Singhai Neo Informatique Pvt. Ltd
 * @license https://www.gnu.org/licenses/gpl-3.0.html
 */
use usni\UsniAdaptor;

/* @var $formDTO \newsletter\dto\FormDTO */

$model  = $formDTO->getModel();
$this->params['breadcrumbs'] = [
        [
        'label' => UsniAdaptor::t('application', 'Administrar') . ' ' .
        UsniAdaptor::t('newsletter', 'Boletines'),
        'url' => ['/marketing/newsletter/default/index']
    ],
        [
        'label' => UsniAdaptor::t('application', 'Actualizar') . ' #' . $model->id
    ]
];

$this->title = UsniAdaptor::t('application', 'Actualizar') . ' ' . UsniAdaptor::t('newsletter', 'Boletín');
echo $this->render("/_form", ['formDTO' => $formDTO]);