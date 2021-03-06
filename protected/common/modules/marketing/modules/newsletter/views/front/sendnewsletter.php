<?php
/**
 * @copyright Copyright (C) 2016 Usha Singhai Neo Informatique Pvt. Ltd
 * @license https://www.gnu.org/licenses/gpl-3.0.html
 */

/* @var $this \frontend\web\View */

use usni\UsniAdaptor;
use usni\library\bootstrap\ActiveForm;
use usni\library\bootstrap\FormButtons;
use newsletter\utils\NewsletterScriptUtil;
use yii\helpers\Html;

$newsletterCustomerCount = UsniAdaptor::app()->session->get('newsletterCustomerCount');
$form = ActiveForm::begin([
        'id' => 'sendnewsletterview',
        'layout' => 'horizontal',
        'caption' => UsniAdaptor::t('newsletter', 'Suscribirse al boletín informativo'),
        'decoratorView' => '//common/newsletteredit.php'
    ]);
?>
<?php
if(!isset($newsletterCustomerCount))
{
?>
<?= $form->field($model, 'email')->textInput(); ?>
<?= FormButtons::widget(['showCancelButton' => false, 'submitButtonLabel' => UsniAdaptor::t('application', 'Enviar'), 
                         'submitButtonOptions' => ['class' => 'btn btn-success'],
                         'layout' => "<div class='text-right'>{submit}\n{cancel}</div>"]);?>
<?php
}
else
{
    if($newsletterCustomerCount == 0)
    {   
      $subscribeMessage  = UsniAdaptor::t('newsletter', 'Si desea suscribirse, haga clic en enviar.');
      
?>
<?= $subscribeMessage; ?>
<?= Html::activeHiddenInput($model, "is_subscribe", ['value' => true]); ?>
<?= FormButtons::widget(['showCancelButton' => false, 'submitButtonLabel' => UsniAdaptor::t('application', 'Enviar'), 
                         'submitButtonOptions' => ['class' => 'btn btn-success'],
                         'layout' => "<div class='text-right'>{submit}\n{cancel}</div>"]);?>
<?php
}
else
{
  $subscribeMessage = UsniAdaptor::t('newsletter', 'Ya te has suscrito al boletín');  
?>
<?= $subscribeMessage; ?>
<?php
}
?>
<?php
}
?>
<?php ActiveForm::end(); ?>
<?php
$url    = UsniAdaptor::createUrl('marketing/newsletter/site/send');
NewsletterScriptUtil::registerSendNewsletterScripts($this, $url, 'sendnewsletterview');
$currentUrl = UsniAdaptor::app()->request->url;
$this->registerJs("$('#sendNewsletterModal').on('hidden.bs.modal', function () 
                                                                {
                                                                    $(location).attr('href', '{$currentUrl}');
                                                                })");
