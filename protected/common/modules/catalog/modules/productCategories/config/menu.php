<?php
use usni\library\utils\MenuUtil;
use usni\UsniAdaptor;

if(UsniAdaptor::app()->user->can('access.catalog'))
{
    return [    
                [
                    'label'     => MenuUtil::wrapLabel(UsniAdaptor::t('productCategories', 'Categoría del producto')),
                    'url'       => ['/catalog/productCategories/default/index'],
                    'visible'   => UsniAdaptor::app()->user->can('productcategory.manage'),
                ],
            ];
}
return [];
