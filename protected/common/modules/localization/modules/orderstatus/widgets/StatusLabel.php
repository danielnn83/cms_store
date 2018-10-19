<?php
/**
 * @copyright Copyright (C) 2016 Usha Singhai Neo Informatique Pvt. Ltd
 * @license https://www.gnu.org/licenses/gpl-3.0.html
 */
namespace common\modules\localization\modules\orderstatus\widgets;

use usni\UsniAdaptor;
use usni\library\bootstrap\Label;
use usni\library\utils\Html;
/**
 * Label for the status
 *
 * @package common\modules\localization\modules\orderstatus\widgets
 */
class StatusLabel extends \yii\bootstrap\Widget
{
    use \common\modules\localization\modules\orderstatus\traits\OrderStatusTrait;
    
    /**
     * @var ActiveRecord|array 
     */
    public $model;
    
    /**
     * @var string 
     */
    public $language;
    
    /**
     * inheritdoc
     */
    public function init()
    {
        parent::init();
        $this->language = UsniAdaptor::app()->languageManager->selectedLanguage;
    }

    /**
     * inheritdoc
     */
    public function run()
    {
        $value      = $this->getOrderStatusLabel($this->model['status'], $this->language);
        $id         = $this->model['id'] . '-status';
        return $this->getLabelWidget($value, $id);
    }
    
    /**
     * Get label widget
     * @param string $value
     * @param string $id
     * @return string
     */
    public function getLabelWidget($value, $id)
    {
        $labelWidget = null;
        if ($value == UsniAdaptor::t('order', 'Completado'))
        {
            $labelWidget = Label::widget(['content' => $value, 'modifier' => Html::COLOR_SUCCESS, 'id' => $id]);
        }
        elseif ($value == UsniAdaptor::t('order', 'Pendiente'))
        {
            $labelWidget = Label::widget(['content' => $value, 'modifier' => Html::COLOR_DEFAULT, 'id' => $id]);
        }
        elseif ($value == UsniAdaptor::t('order', 'Cancelado'))
        {
            $labelWidget = Label::widget(['content' => $value, 'modifier' => Html::COLOR_DANGER, 'id' => $id]);
        }
        elseif ($value == UsniAdaptor::t('order', 'Inversión cancelada'))
        {
            $labelWidget = Label::widget(['content' => $value, 'modifier' => Html::COLOR_DEFAULT, 'id' => $id]);
        }
        elseif ($value == UsniAdaptor::t('order', 'Contracargo'))
        {
            $labelWidget = Label::widget(['content' => $value, 'modifier' => Html::COLOR_DEFAULT, 'id' => $id]);
        }
        elseif ($value == UsniAdaptor::t('order', 'Negado'))
        {
            $labelWidget = Label::widget(['content' => $value, 'modifier' => Html::COLOR_DEFAULT, 'id' => $id]);
        }
        elseif ($value == UsniAdaptor::t('order', 'Expirado'))
        {
            $labelWidget = Label::widget(['content' => $value, 'modifier' => Html::COLOR_DEFAULT, 'id' => $id]);
        }
        elseif ($value == UsniAdaptor::t('order', 'Ha fallado'))
        {
            $labelWidget = Label::widget(['content' => $value, 'modifier' => Html::COLOR_DEFAULT, 'id' => $id]);
        }
        elseif ($value == UsniAdaptor::t('order', 'Procesado'))
        {
            $labelWidget = Label::widget(['content' => $value, 'modifier' => Html::COLOR_DEFAULT, 'id' => $id]);
        }
        elseif ($value == UsniAdaptor::t('order', 'Procesando'))
        {
            $labelWidget = Label::widget(['content' => $value, 'modifier' => Html::COLOR_DEFAULT, 'id' => $id]);
        }
        elseif ($value == UsniAdaptor::t('order', 'Reintegrado'))
        {
            $labelWidget = Label::widget(['content' => $value, 'modifier' => Html::COLOR_INFO, 'id' => $id]);
        }
        elseif ($value == UsniAdaptor::t('order', 'Regresado'))
        {
            $labelWidget = Label::widget(['content' => $value, 'modifier' => Html::COLOR_WARNING, 'id' => $id]);
        }
        elseif ($value == UsniAdaptor::t('order', 'Enviado'))
        {
            $labelWidget = Label::widget(['content' => $value, 'modifier' => Html::COLOR_DEFAULT, 'id' => $id]);
        }
        elseif ($value == UsniAdaptor::t('order', 'Anulado'))
        {
            $labelWidget = Label::widget(['content' => $value, 'modifier' => Html::COLOR_DANGER, 'id' => $id]);
        }
        return $labelWidget;
    }
}