<?php
use usni\library\utils\MenuUtil;
use usni\UsniAdaptor;

$subItems = [    
                [
                    'label'     => MenuUtil::wrapLabel(UsniAdaptor::t('customer', 'Clientes')),
                    'url'       => ['/customer/default/index'],
                    'visible'   => UsniAdaptor::app()->user->can('access.customer'),
                ],
                [
                    'label'     => MenuUtil::wrapLabel(UsniAdaptor::t('customer', 'Grupos de clientes')),
                    'url'       => ['/customer/group/index'],
                    'visible'   => UsniAdaptor::app()->user->can('access.auth'),
                ]/*,
                [
                    'label'     => MenuUtil::wrapLabel(UsniAdaptor::t('order', 'Pedidos')),
                    'url'       => ['/order/default/index'],
                    'visible'   => UsniAdaptor::app()->user->can('access.order'),
                ]*/
            ];
return [
            'label'       => MenuUtil::getSidebarMenuIcon('shopping-cart') .
                                     MenuUtil::wrapLabel(UsniAdaptor::t('application', 'Ventas')),
            'url'         => '#',
            'itemOptions' => ['class' => 'navblock-header'],
            'items' => $subItems
        ];

