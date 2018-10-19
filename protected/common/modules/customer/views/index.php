<?php
/**
 * @copyright Copyright (C) 2016 Usha Singhai Neo Informatique Pvt. Ltd
 * @license https://www.gnu.org/licenses/gpl-3.0.html
 */
use usni\UsniAdaptor;
use customer\widgets\CustomerNameDataColumn;
use usni\library\utils\TimezoneUtil;
use yii\grid\CheckboxColumn;
use usni\library\grid\GridView;
use usni\library\modules\users\utils\UserUtil;
use usni\library\modules\users\widgets\ActionToolbar;
use usni\library\grid\StatusDataColumn;
use customer\grid\CustomerActionColumn;
use customer\models\Customer;

/* @var $gridViewDTO \usni\library\modules\users\dto\UserGridViewDTO */
/* @var $this \usni\library\web\AdminView */

$title          = UsniAdaptor::t('customer', 'Administrar clientes');
$this->title    = $this->params['breadcrumbs'][] = $title;

$toolbarParams  = [
                        'createUrl'         => 'create',
                        'bulkEditFormView'  => '/_bulkedit.php',
                        'bulkDeleteUrl'     => 'bulk-delete',
                        'showBulkEdit'      => true,
                        'showBulkDelete'    => false,
                        'gridId'            => 'customergridview',
                        'pjaxId'            => 'customergridview-pjax',
                        'bulkEditFormTitle' => UsniAdaptor::t('customer', 'Cliente') . ' ' . UsniAdaptor::t('application', 'Edición masiva'),
                        'bulkEditActionUrl' => 'bulk-edit',
                        'bulkEditFormId'    => 'customerbulkeditview',
                        'groupList'         => $gridViewDTO->getGroupList(),
                        'permissionPrefix'  => 'customer'
                  ];
$widgetParams  = [
                        'id'            => 'customergridview',
                        'dataProvider'  => $gridViewDTO->getDataProvider(),
                        'filterModel'   => $gridViewDTO->getSearchModel(),
                        'caption'       => $title,
                        'columns' => [
                                        ['class' => CheckboxColumn::className()],   
                                        [
                                            'attribute' => 'username',
                                            'class'     => CustomerNameDataColumn::className()
                                        ],
                                        [
                                            'label'     => UsniAdaptor::t('users', 'Email'),
                                            'attribute' => 'email'
                                        ],
                                        [
                                            'label'     => UsniAdaptor::t('users', 'Nombres'),
                                            'attribute' => 'firstname'
                                        ],
                                        [
                                            'label'     => UsniAdaptor::t('users', 'Apellidos'),
                                            'attribute' => 'lastname',
                                        ],
                                        [
                                            'attribute' => 'timezone',
                                            'filter'    => TimezoneUtil::getTimezoneSelectOptions()
                                        ],
                                        [
                                            'attribute' => 'address1'
                                        ],
                                        [
                                            'attribute' => 'status',
                                            'class'     => StatusDataColumn::className(),
                                            'filter'    => UserUtil::getStatusDropdown()
                                        ],
                                        [
                                            'class'             => CustomerActionColumn::className(),
                                            'template'          => '{view} {update} {delete} {changepassword} {changestatus}',
                                            'modelClassName'    => Customer::className()
                                        ]
                                     ],
                 ];
echo ActionToolbar::widget($toolbarParams);
echo GridView::widget($widgetParams);