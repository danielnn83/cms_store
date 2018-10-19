<?php
/**
 * @copyright Copyright (C) 2016 Usha Singhai Neo Informatique Pvt. Ltd
 * @license https://www.gnu.org/licenses/gpl-3.0.html
 */
use usni\UsniAdaptor;

$this->params['breadcrumbs'] = [    
                                    [
                                        'label' => UsniAdaptor::t('application', 'Administrar') . ' ' . UsniAdaptor::t('customer', 'Grupos de clientes'),
                                        'url'   => ['/customer/group/index']
                                    ],
                                    [
                                        'label' => UsniAdaptor::t('application', 'Agregar')
                                    ]
                               ];

$this->title = UsniAdaptor::t('application', 'Agregar') . ' ' . UsniAdaptor::t('customer', 'Grupos de clientes');
echo $this->render('/groups/_form', ['formDTO' => $formDTO]);