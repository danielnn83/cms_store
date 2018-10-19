<?php
use usni\library\utils\MenuUtil;
use usni\UsniAdaptor;

$subItems = [
                [
                    'label'     => MenuUtil::wrapLabel(UsniAdaptor::t('language', 'Lenguajes')),
                    'url'       => ['/language/default/index'],
                    'visible'   => UsniAdaptor::app()->user->can('access.language'),
                ],
                [
                    'label'     => MenuUtil::wrapLabel(UsniAdaptor::t('city', 'Ciudad')),
                    'url'       => ['/localization/city/default/index'],
                    'visible'   => UsniAdaptor::app()->user->can('access.localization'),
                ],
                [
                    'label'     => MenuUtil::wrapLabel(UsniAdaptor::t('country', 'País')),
                    'url'       => ['/localization/country/default/index'],
                    'visible'   => UsniAdaptor::app()->user->can('access.localization'),
                ],
                [
                    'label'     => MenuUtil::wrapLabel(UsniAdaptor::t('currency', 'Monedas')),
                    'url'       => ['/localization/currency/default/index'],
                    'visible'   => UsniAdaptor::app()->user->can('access.localization'),
                ],
                [
                    'label'     => MenuUtil::wrapLabel(UsniAdaptor::t('state', 'Estados')),
                    'url'       => ['/localization/state/default/index'],
                    'visible'   => UsniAdaptor::app()->user->can('access.localization'),
                ],
                [
                    'label'     => MenuUtil::wrapLabel(UsniAdaptor::t('lengthclass', 'Clases de longitud')),
                    'url'       => ['/localization/lengthclass/default/index'],
                    'visible'   => UsniAdaptor::app()->user->can('access.localization'),
                ],
                [
                    'label'     => MenuUtil::wrapLabel(UsniAdaptor::t('weightclass', 'Clases de peso')),
                    'url'       => ['/localization/weightclass/default/index'],
                    'visible'   => UsniAdaptor::app()->user->can('access.localization'),
                ],
                [
                    'label'     => MenuUtil::wrapLabel(UsniAdaptor::t('stockstatus', 'Estado de stock')),
                    'url'       => ['/localization/stockstatus/default/index'],
                    'visible'   => UsniAdaptor::app()->user->can('access.localization'),
                ],
                [
                    'label'     => MenuUtil::wrapLabel(UsniAdaptor::t('orderstatus', 'Estado de pedido')),
                    'url'       => ['/localization/orderstatus/default/index'],
                    'visible'   => UsniAdaptor::app()->user->can('access.localization'),
                ],
                [
                    'label'     => MenuUtil::wrapLabel(UsniAdaptor::t('tax', 'Impuestos')),
                    'url'       => '#',
                    'visible'   => UsniAdaptor::app()->user->can('access.localization'),
                    'items'     => [
                                        [
                                            'label'     => MenuUtil::wrapLabel(UsniAdaptor::t('tax', 'Clases de impuestos sobre productos')),
                                            'url'       => ['/localization/tax/product-tax-class/index']
                                        ],
                                        [
                                            'label'     => MenuUtil::wrapLabel(UsniAdaptor::t('tax', 'Reglas de impuestos')),
                                            'url'       => ['/localization/tax/rule/index']
                                        ],
                                        [
                                            'label'     => MenuUtil::wrapLabel(UsniAdaptor::t('tax', 'Zonas')),
                                            'url'       => ['/localization/tax/zone/index']
                                        ]
                                    ]
                ]
            ];
if(UsniAdaptor::app()->user->can('access.localization'))
{
    return [
                [
                    'label'       => MenuUtil::wrapLabel(UsniAdaptor::t('localization', 'Localización')),
                    'url'         => '#',
                    'itemOptions' => ['class' => 'navblock-header'],
                    'items' => $subItems
                ]
            ];
}
return [];

