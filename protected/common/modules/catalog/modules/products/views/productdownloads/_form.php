<?php
/**
 * @copyright Copyright (C) 2016 Usha Singhai Neo Informatique Pvt. Ltd
 * @license https://www.gnu.org/licenses/gpl-3.0.html
 */
use usni\UsniAdaptor;
use usni\library\bootstrap\ActiveForm;
use usni\library\bootstrap\FormButtons;
use products\widgets\FileDownload;

/* @var $this \usni\library\web\AdminView */
/* @var $formDTO \products\dto\FormDTO */

$model = $formDTO->getModel();
if($model->scenario == 'create')
{
    $caption = UsniAdaptor::t('application', 'Agregar') . ' ' . UsniAdaptor::t('products', 'Descargue de producto');
}
else
{
    $caption = UsniAdaptor::t('application', 'Actualizar') . ' ' . UsniAdaptor::t('products', 'Descargue de producto');
}
$form = ActiveForm::begin([
        'id' => 'productdownloadeditview',
        'layout' => 'horizontal',
        'options' => ['enctype' => 'multipart/form-data'],
        'caption' => $caption
    ]);
?>
<?= $form->field($model, 'name')->textInput(); ?>
<?= $form->field($model, 'file')->fileInput(); ?>
<?= FileDownload::widget(['model' => $model, 'attribute' => 'file']); ?>
<?= $form->field($model, 'number_of_days')->textInput(); ?>
<?= $form->field($model, 'allowed_downloads')->textInput(); ?>
<?= FormButtons::widget(['cancelUrl' => UsniAdaptor::createUrl('catalog/products/download/index')]);?>
<?php ActiveForm::end(); ?>
