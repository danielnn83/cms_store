<?php
/**
 * @copyright Copyright (C) 2016 Usha Singhai Neo Informatique Pvt. Ltd
 * @license https://www.gnu.org/licenses/gpl-3.0.html
 */
use usni\UsniAdaptor;
use usni\library\grid\GridView;
use products\models\Product;
use common\modules\order\grid\FormattedPriceColumn;
use common\modules\order\grid\OrderStatusDataColumn;

/* @var $gridViewDTO \usni\library\dto\GridViewDTO */
/* @var $this \usni\library\web\AdminView */

$title          = UsniAdaptor::t('order', 'Ultimos pedidos');

$widgetParams   = [
                        'id'            => 'latestordersgridview',
                        'dataProvider'  => $gridViewDTO->getDataProvider(),
                        'caption'       => $title,
                        'modelClass'    => Product::className(),
                        'layout'        => "<div class='panel panel-default'>
                                                <div class='panel-heading'>{caption}</div>
                                                    {items}
                                               </div>",
                        'columns'       => [
                                                'unique_id',
                                                
                                                [
                                                    'label'     => UsniAdaptor::t('products', 'Nombre'),
                                                    'attribute' => 'name'
                                                ],
                                                [
                                                    'label'     => UsniAdaptor::t('products', 'Cantidad'),
                                                    'attribute' => 'amount',
                                                    'class'     => FormattedPriceColumn::className()
                                                ],
                                                [
                                                    'attribute' => 'Estatus',
                                                    'class' => OrderStatusDataColumn::className()
                                                ],
                                        ],
                ];
echo GridView::widget($widgetParams);