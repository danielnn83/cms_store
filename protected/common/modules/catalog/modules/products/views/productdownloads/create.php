<?php
/**
 * @copyright Copyright (C) 2016 Usha Singhai Neo Informatique Pvt. Ltd
 * @license https://www.gnu.org/licenses/gpl-3.0.html
 */
use usni\UsniAdaptor;

/* @var $formDTO \products\dto\FormDTO */

$this->params['breadcrumbs'] = [    
                                    [
                                        'label' => UsniAdaptor::t('application', 'Administrar') . ' ' . UsniAdaptor::t('products', 'Descargas de productos'),
                                        'url'   => ['/catalog/products/download/index']
                                    ],
                                    [
                                        'label' => UsniAdaptor::t('application', 'Agregar')
                                    ]
                               ];

$this->title = UsniAdaptor::t('application', 'Agregar') . ' ' . UsniAdaptor::t('products', 'Descargas de producto');
echo $this->render('/productdownloads/_form', ['formDTO' => $formDTO]);