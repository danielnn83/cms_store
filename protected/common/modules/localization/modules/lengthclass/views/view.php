<?php
/**
 * @copyright Copyright (C) 2016 Usha Singhai Neo Informatique Pvt. Ltd
 * @license https://www.gnu.org/licenses/gpl-3.0.html
 */
use usni\UsniAdaptor;
use usni\library\widgets\DetailView;
use usni\library\widgets\DetailBrowseDropdown;

/* @var $detailViewDTO \usni\library\dto\DetailViewDTO */
/* @var $this \usni\library\web\AdminView */

$model          = $detailViewDTO->getModel();
$this->title    = UsniAdaptor::t('application', 'Ver') . ' ' . UsniAdaptor::t('lengthclass', 'Clase de longitud');
$this->params['breadcrumbs'] =  [
                                    [
                                        'label' => UsniAdaptor::t('application', 'Administrar') . ' ' .
                                        UsniAdaptor::t('lengthclass', 'Clases de longitud'),
                                        'url' => ['/localization/lengthclass/default/index']
                                    ],
                                    [
                                        'label' => UsniAdaptor::t('application', 'Ver') . ' ' . ' #' . $model['id']
                                    ]
                                ];
$editUrl        = UsniAdaptor::createUrl('localization/lengthclass/default/update', ['id' => $model['id']]);
$deleteUrl      = UsniAdaptor::createUrl('localization/lengthclass/default/delete', ['id' => $model['id']]);
$browseParams   = ['permission' => 'lengthclass.viewother',
                   'model' => $model,
                   'modalDisplay' => $detailViewDTO->getModalDisplay(),
                   'data'  => $detailViewDTO->getBrowseModels()];
$toolbarParams  = ['editUrl'   => $editUrl,
                   'deleteUrl' => $deleteUrl];
$widgetParams   = [
                    'detailViewDTO' => $detailViewDTO,
                    'caption'       => $model['name'],
                    'attributes'    => [
                                            'name',
                                            'unit', 
                                            'value',
                                            [
                                                'attribute' => 'created_by',
                                                'value'     => $this->getAuthorName($detailViewDTO->getCreatedBy())
                                            ],
                                            [
                                                'attribute' => 'created_datetime',
                                                'value'     => $this->getFormattedDateTime($model['created_datetime'])
                                            ],
                                            [
                                                'attribute' => 'modified_by',
                                                'value'     => $this->getAuthorName($detailViewDTO->getModifiedBy())
                                            ],
                                            [
                                                'attribute' => 'modified_datetime',
                                                'value'     => $this->getFormattedDateTime($model['modified_datetime'])
                                            ]
                                       ],
                    
                    'actionToolbar' => $toolbarParams
                 ];
echo DetailBrowseDropdown::widget($browseParams);
echo DetailView::widget($widgetParams);
