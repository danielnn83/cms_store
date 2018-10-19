<?php
/**
 * @copyright Copyright (C) 2016 Usha Singhai Neo Informatique Pvt. Ltd
 * @license https://www.gnu.org/licenses/gpl-3.0.html
 */
use usni\UsniAdaptor;
use frontend\widgets\ActiveForm;
use frontend\widgets\FormButtons;

$title              = UsniAdaptor::t('users', 'Se te olvidó tu contraseña?');
$this->title        = $title;
$model              = $formDTO->getModel();
$descriptionText    = '<p style="margin:10px">' . UsniAdaptor::t('customer', 'Ingrese la dirección de correo electrónico asociada a su cuenta. Haga clic en enviar para que le enviemos su información por correo electrónico.') . "</p>";
$this->params['breadcrumbs'] = [    
                                    [
                                        'label' => UsniAdaptor::t('customer', 'Mi cuenta'),
                                        'url'   => ['/customer/site/my-account']
                                    ],
                                    [
                                        'label' => $title
                                    ]
                               ];
$form = ActiveForm::begin([
                            'id'          => 'forgotpasswordformview',
                            'layout'      => 'horizontal',
                            'caption'     => UsniAdaptor::t('users', 'Se te olvidó tu contraseña?') . '?'
                       ]);
?>
<?= $descriptionText;?>
<?= $form->field($model, 'email')->textInput();?>
<?= FormButtons::widget(['cancelUrl' => UsniAdaptor::createUrl('customer/site/login'), 'submitButtonLabel' => UsniAdaptor::t('application', 'Enviar')]);?>
<?php ActiveForm::end();?>
