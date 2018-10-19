<?php
use usni\library\utils\MenuUtil;
use usni\UsniAdaptor;

if(UsniAdaptor::app()->user->can('access.manufacturer'))
{
    return [    
                [
                    'label'       => MenuUtil::wrapLabel(UsniAdaptor::t('manufacturer', 'Fabricantes')),
                    'url'         => ['/manufacturer/default/index'],
                    'itemOptions' => ['class' => 'navblock-header']
                ]
            ];
}
return [];

