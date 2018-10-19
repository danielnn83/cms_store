<?php
/**
 * @copyright Copyright (C) 2016 Usha Singhai Neo Informatique Pvt. Ltd
 * @license https://www.gnu.org/licenses/gpl-3.0.html
 */
use usni\UsniAdaptor;
use usni\library\grid\GridView;
use usni\library\grid\ActionToolbar;
use yii\grid\CheckboxColumn;
use usni\library\grid\ActionColumn;
use products\models\ProductAttribute;

/* @var $gridViewDTO \usni\library\dto\GridViewDTO */
/* @var $this \usni\library\web\AdminView */

$title          = UsniAdaptor::t('products', 'Administrar Atributos');
$this->title    = $this->params['breadcrumbs'][] = $title;

$toolbarParams  = [
    'createUrl'     => 'create',
    'bulkDeleteUrl' => 'bulk-delete',
    'showBulkEdit'  => false,
    'showBulkDelete'=> true,
    'gridId'        => 'productattributegridview',
    'pjaxId'        => 'productattributegridview-pjax',
    'permissionPrefix'  => 'product'
];
$widgetParams   = [
                        'id'            => 'productattributegridview',
                        'dataProvider'  => $gridViewDTO->getDataProvider(),
                        'filterModel'   => $gridViewDTO->getSearchModel(),
                        'caption'       => $title,
                        'modelClass'    => ProductAttribute::className(),
                        'columns' => [
                            ['class' => CheckboxColumn::className()],
                            'name',
                            'sort_order',
                            [
                                'class'             => ActionColumn::className(),
                                'template'          => '{view} {update} {delete}',
                                'modelClassName'    => ProductAttribute::className(),
                                'permissionPrefix'  => 'product'
                            ]
                        ],
                ];
echo ActionToolbar::widget($toolbarParams);
echo GridView::widget($widgetParams);