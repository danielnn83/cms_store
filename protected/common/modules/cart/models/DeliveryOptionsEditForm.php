<?php
/**
 * @copyright Copyright (C) 2016 Usha Singhai Neo Informatique Pvt. Ltd
 * @license https://www.gnu.org/licenses/gpl-3.0.html
 */
namespace cart\models;

use yii\base\Model;
use usni\UsniAdaptor;
/**
 * DeliveryOptionsEditForm class file
 * 
 * @package cart\models
 */
class DeliveryOptionsEditForm extends Model
{
    /**
     * Shipping type
     * @var int 
     */
    public $shipping;
    
    /**
     * Comments related to delivery options.
     * @var string 
     */
    public $comments;
    
    /**
     * Calculate price for shipping.
     * @var string 
     */
    public $shipping_fee;
    
    /**
     * Validation rules for the model.
     * @return array Validation rules for model attributes.
     */
    public function rules()
    {
        return array(
            [['shipping', 'comments', 'shipping_fee'],  'safe'],
        );
    }

    /**
     * @inheritdoc
     */
    public static function getLabel($n = 1)
    {
        return UsniAdaptor::t('cart', 'Opciones de entrega');
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
                'shipping'    => UsniAdaptor::t('shipping', 'Envío'),
                'comments'    => UsniAdaptor::t('application', 'Comentarios'),
                'shipping_fee'    => UsniAdaptor::t('shipping', 'Gastos de envío'),
               ];
    }
    
    /**
     * @inheritdoc
     */
    public function attributeHints()
    {
        return [
                'shipping'    => UsniAdaptor::t('shippinghint', 'Método de envío'),
                'comments'    => UsniAdaptor::t('shippinghint', 'Comentarios asociados con el envío'),
                'shipping_fee'    => UsniAdaptor::t('shippinghint', 'Gastos de envío'),
               ];
    }
}
