<?php
/**
 * @copyright Copyright (C) 2016 Usha Singhai Neo Informatique Pvt. Ltd
 * @license https://www.gnu.org/licenses/gpl-3.0.html
 */
namespace common\modules\order\models;

use usni\UsniAdaptor;
/**
 * OrderPaymentDetails active record.
 *
 * @package common\modules\Order\models
 */
class OrderPaymentDetails extends \usni\library\db\TranslatableActiveRecord 
{
	/**
     * @inheritdoc
     */
	public function rules()
	{
		return [
                    [['payment_method'],                            'required'],
                    [['order_id', 'payment_method', 'total_including_tax', 'tax', 'payment_type', 'comments', 'shipping_fee'],   'safe'],
               ];
	}
    
    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios['create'] = $scenarios['update'] = ['order_id', 'payment_method', 'total_including_tax', 'tax', 'payment_type', 'comments', 'shipping_fee'];
        return $scenarios;
    }

	/**
     * @inheritdoc
     */
	public function attributeLabels()
	{
		$labels = [
                     'order_id'         => UsniAdaptor::t('order', 'Pedido'),
                     'payment_method'   => UsniAdaptor::t('payment', 'Método de pago'),
                     'total_including_tax'  => UsniAdaptor::t('order', 'Total incluyendo impuestos'),
                     'tax'              => UsniAdaptor::t('tax', 'Impuestos'),
                     'payment_type'     => UsniAdaptor::t('payment', 'Tipo de pago'),
                     'comments'         => UsniAdaptor::t('order', 'Comentarios'),
                     'shipping_fee'     => UsniAdaptor::t('shipping', 'Gastos de envío'),
                  ];
        return parent::getTranslatedAttributeLabels($labels);
	}
    
    /**
     * @inheritdoc
     */
    public static function getLabel($n = 1)
    {
        return ($n == 1) ? UsniAdaptor::t('order', 'Pago de pedido') : UsniAdaptor::t('order', 'Pagos de pedidos');
    }
    
    /**
     * @inheritdoc
     */
    public static function getTranslatableAttributes()
    {
        return ['comments'];
    }
}