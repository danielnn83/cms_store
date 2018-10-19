<?php
/**
 * @copyright Copyright (C) 2016 Usha Singhai Neo Informatique Pvt. Ltd
 * @license https://www.gnu.org/licenses/gpl-3.0.html
 */
use usni\UsniAdaptor;

$this->params['breadcrumbs'] = [    
                                    [
                                        'label' => UsniAdaptor::t('application', 'Administrar') . ' ' . UsniAdaptor::t('products', 'Productos'),
                                        'url'   => ['/catalog/products/default/index']
                                    ],
                                    [
                                        'label' => UsniAdaptor::t('application', 'Agregar')
                                    ]
                               ];

$this->title = UsniAdaptor::t('application', 'Agregar') . ' ' . UsniAdaptor::t('products', 'Producto');
echo $this->render('/_tabform', ['formDTO' => $formDTO]);