<?php
use usni\library\utils\MenuUtil;
use usni\UsniAdaptor;

if(UsniAdaptor::app()->user->can('access.catalog'))
{
    return [    
                [
                    'label'     => MenuUtil::wrapLabel(UsniAdaptor::t('products', 'Productos')),
                    'url'       => ['/catalog/products/default/index'],
                    'visible'   => UsniAdaptor::app()->user->can('product.manage'),
                ],
                [
                    'label'     => MenuUtil::wrapLabel(UsniAdaptor::t('products', 'Grupos de atributos')),
                    'url'       => ['/catalog/products/attribute-group/index'],
                    'visible'   => UsniAdaptor::app()->user->can('product.manage'),
                ],
                [
                    'label'     => MenuUtil::wrapLabel(UsniAdaptor::t('products', 'Atributos')),
                    'url'       => ['/catalog/products/attribute/index'],
                    'visible'   => UsniAdaptor::app()->user->can('product.manage'),
                ],
                [
                    'label'     => MenuUtil::wrapLabel(UsniAdaptor::t('products', 'Opciones')),
                    'url'       => ['/catalog/products/option/index'],
                    'visible'   => UsniAdaptor::app()->user->can('product.manage'),
                ],
                [
                    'label'     => MenuUtil::wrapLabel(UsniAdaptor::t('products', 'Descargas')),
                    'url'       => ['/catalog/products/download/index'],
                    'visible'   => UsniAdaptor::app()->user->can('product.manage'),
                ],
                [
                    'label'     => MenuUtil::wrapLabel(UsniAdaptor::t('products', 'Comentarios')),
                    'url'       => ['/catalog/products/review/index'],
                    'visible'   => UsniAdaptor::app()->user->can('productreview.manage'),
                ]
            ];
}
return [];

