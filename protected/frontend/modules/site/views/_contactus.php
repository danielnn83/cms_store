<?php
use usni\UsniAdaptor;
use frontend\widgets\ActiveForm;
use yii\captcha\Captcha;
use frontend\widgets\FormButtons;

/* @var $this \frontend\web\View */

$model          = $formDTO->getModel();
$title          = UsniAdaptor::t('application', 'Contacto');
$this->title    = $title;
?>
<?php
$this->params['breadcrumbs'] = [
                                    ['label' => $title]
                                ];
$form = ActiveForm::begin([
                            'id'          => 'contactformview', 
                            'layout'      => 'horizontal',
                            'caption'     => $title
                         ]);
?>
<?= $form->field($model, 'name')->textInput()->label("Nombre");?>
<?= $form->field($model, 'email')->textInput()->label("Correo");?>
<?= $form->field($model, 'subject')->textInput()->label("Asunto");?>
<?= $form->field($model, 'message')->textarea()->label("Mensaje");?>
<?= $form->field($model, 'verifyCode')->widget(Captcha::className(), ['captchaAction' => '/site/default/captcha'])->label("Código de verificación");?>
<?= FormButtons::widget(['submitButtonLabel' => UsniAdaptor::t('application', 'Enviar'), 'showCancelButton' => false]);?>
<?php ActiveForm::end();