<?php
/**
 * @copyright Copyright (C) 2016 Usha Singhai Neo Informatique Pvt. Ltd
 * @license https://www.gnu.org/licenses/gpl.html
 */
namespace products\utils;

use usni\UsniAdaptor;
use usni\library\bootstrap\Label;
use usni\library\utils\Html;
use products\models\ProductReview;
/**
 * ReviewUtil implements the static functions related to product reviews
 *
 * @package products\utils
 */
class ReviewUtil
{
    /**
     * Renders label for the status.
     * @param string $data ActiveRecord of the model.
     * @return string
     */
    public static function renderStatus($data)
    {
        $value = self::getLabel($data);
        if($value == UsniAdaptor::t('application', 'Pendiente'))
        {
            return Label::widget(['content' => $value, 'modifier' => Html::COLOR_WARNING]);
        }
        elseif ($value == UsniAdaptor::t('products', 'Aprovado'))
        {
            return Label::widget(['content' => $value, 'modifier' => Html::COLOR_SUCCESS]);
        }
        elseif ($value == UsniAdaptor::t('products', 'Spam'))
        {
            return Label::widget(['content' => $value, 'modifier' => Html::COLOR_DANGER]);
        }
        elseif ($value == UsniAdaptor::t('application', 'Borrado'))
        {
            return Label::widget(['content' => $value, 'modifier' => Html::COLOR_DANGER]);
        }
    }
    
    /**
     * Gets label for the status.
     * @param string $data ActiveRecord of the model.
     * @return string
     */
    public static function getLabel($data)
    {
        if ($data['status'] == ProductReview::STATUS_PENDING)
        {
            return UsniAdaptor::t('application', 'Pendiente');
        }
        else if ($data['status'] == ProductReview::STATUS_APPROVED)
        {
            return UsniAdaptor::t('products', 'Aprovado');
        }
        else if ($data['status'] == ProductReview::STATUS_SPAM)
        {
            return UsniAdaptor::t('products', 'Spam');
        }
        else if ($data['status'] == ProductReview::STATUS_DELETED)
        {
            return UsniAdaptor::t('application', 'Borrado');
        }
    }
    
    /**
     * Gets status dropdown.
     * @return array
     */
    public static function getStatusDropdown()
    {
        return [
                    ProductReview::STATUS_APPROVED    => UsniAdaptor::t('products', 'Aprovado'),
                    ProductReview::STATUS_PENDING     => UsniAdaptor::t('application', 'Pendiente'),
                    ProductReview::STATUS_DELETED     => UsniAdaptor::t('application', 'Borrado'),
               ];
    }
}
