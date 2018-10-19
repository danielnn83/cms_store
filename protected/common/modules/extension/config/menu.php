<?php
use usni\library\utils\MenuUtil;
use usni\UsniAdaptor;

if(UsniAdaptor::app()->user->can('access.extension'))
{
    return [    
                'label'       => MenuUtil::getSidebarMenuIcon('puzzle-piece') .
                                     MenuUtil::wrapLabel(UsniAdaptor::t('extension', 'Extensiones')),
                'url'         => '#',
                'itemOptions' => ['class' => 'navblock-header'],
                'items'       => [
                                    [
                                        'label'       => UsniAdaptor::t('extension', 'Mejoras'),
                                        'url'         => ['/enhancement/default/index'],
                                    ],
                                    [
                                        'label'       => UsniAdaptor::t('extension', 'Métodos de pago'),
                                        'url'         => ['/payment/default/index'],
                                    ],
                                    [
                                        'label'       => UsniAdaptor::t('extension', 'Métodos de envío'),
                                        'url'         => ['/shipping/default/index'],
                                    ],
                                    [
                                        'label'       => UsniAdaptor::t('extension', 'Modulos'),
                                        'url'         => ['/extension/module/index'],
                                    ],
                                    [
                                        'label'       => UsniAdaptor::t('extension', 'Modificaciones'),
                                        'url'         => ['/extension/modification/index'],
                                    ]
                                  ]
            ];
}
return [];

