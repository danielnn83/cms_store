<?php
use usni\library\utils\MenuUtil;
use usni\UsniAdaptor;

if(UsniAdaptor::app()->user->can('access.marketing'))
{
    return [    
                'label'       => MenuUtil::getSidebarMenuIcon('share') .
                                     MenuUtil::wrapLabel(UsniAdaptor::t('marketing', 'Márketing')),
                'url'         => '#',
                'itemOptions' => ['class' => 'navblock-header'],
                'items'       => [
                                    [
                                        'label'     => UsniAdaptor::t('marketing', 'Emails'),
                                        'url'       => ['/marketing/send-mail/create'],
                                        'visible'   => UsniAdaptor::app()->user->can('marketing.mail'),
                                    ],
                                    [
                                        'label'     => UsniAdaptor::t('newsletter', 'Boletines informativos'),
                                        'url'       => ['/marketing/newsletter/default/index'],
                                        'visible'   => UsniAdaptor::app()->user->can('newsletter.manage'),
                                    ]
                                  ]
            ];
}
return [];

