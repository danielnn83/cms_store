<?php
/**
 * @copyright Copyright (C) 2016 Usha Singhai Neo Informatique Pvt. Ltd
 * @license https://www.gnu.org/licenses/gpl-3.0.html
 */
use usni\UsniAdaptor;
use usni\library\bootstrap\ActiveForm;
use usni\library\bootstrap\FormButtons;

/* @var $this \usni\library\web\AdminView */

if($model->scenario == 'create')
{
    $caption = UsniAdaptor::t('application', 'Agregar') . ' ' . UsniAdaptor::t('products', 'Atributos de grupo');
}
else
{
    $caption = UsniAdaptor::t('application', 'Actualizar') . ' ' . UsniAdaptor::t('products', 'Atributos de grupo');
}
$form = ActiveForm::begin([
        'id' => 'productattributegroupeditview',
        'layout' => 'horizontal',
        'caption' => $caption
    ]);
?>
<?= $form->field($model, 'name')->textInput(); ?>
<?= $form->field($model, 'sort_order')->textInput(); ?>
<?= FormButtons::widget(['cancelUrl' => UsniAdaptor::createUrl('catalog/products/attribute-group/index')]);?>
<?php ActiveForm::end(); ?>
