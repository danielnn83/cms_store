<?php
/**
 * @copyright Copyright (C) 2016 Usha Singhai Neo Informatique Pvt. Ltd
 * @license https://www.gnu.org/licenses/gpl-3.0.html
 */
use usni\UsniAdaptor;

$this->params['breadcrumbs'] = [    
                                    [
                                        'label' => UsniAdaptor::t('application', 'Administrar') . ' ' . UsniAdaptor::t('customer', 'Clientes'),
                                        'url'   => ['/customer/default/index']
                                    ],
                                    [
                                        'label' => UsniAdaptor::t('application', 'Agregar')
                                    ]
                               ];

$this->title = UsniAdaptor::t('application', 'agregar') . ' ' . UsniAdaptor::t('customer', 'Clientes');
echo $this->render('/_tabform', ['formDTO' => $formDTO]);