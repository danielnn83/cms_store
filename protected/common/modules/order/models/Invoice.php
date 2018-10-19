<?php
namespace common\modules\order\models;

use usni\library\db\TranslatableActiveRecord;
use usni\UsniAdaptor;
use common\modules\order\models\Order;
/**
 * Invoice active record.
 * 
 * @package common\modules\Order\models
 */
class Invoice extends TranslatableActiveRecord 
{   
    /**
     * @inheritdoc
     */
	public function rules()
	{
		return [
                    [['unique_id', 'order_id', 'price_excluding_tax', 'tax', 'shipping_fee', 'total_items'], 'required'],
                    [['id', 'unique_id', 'order_id', 'price_excluding_tax', 'tax', 'shipping_fee', 'total_items', 'terms'],   'safe'],
               ];
	}
    
    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios['create'] = $scenarios['update'] = ['unique_id', 'order_id', 'price_excluding_tax', 'tax', 'shipping_fee', 'total_items', 'terms'];
        return $scenarios;
    }

	/**
     * @inheritdoc
     */
	public function attributeLabels()
	{
		$labels = [
                     'order_id'             => UsniAdaptor::t('order', 'Pedido'),
                     'unique_id'            => UsniAdaptor::t('order', 'Id único'),
                     'price_excluding_tax'  => UsniAdaptor::t('products', 'Precio excluyendo impuestos'),
                     'tax'                  => UsniAdaptor::t('tax', 'Impuestos'),
                     'total_items'          => UsniAdaptor::t('order', 'Artículos totales'),
                     'shipping_fee'         => UsniAdaptor::t('shipping', 'Gastos de envío'),
                     'terms'                => UsniAdaptor::t('order', 'Terminos'),
                  ];
        return parent::getTranslatedAttributeLabels($labels);
	}
    
    /**
     * @inheritdoc
     */
    public static function getLabel($n = 1)
    {
        return ($n == 1) ? UsniAdaptor::t('order', 'Factura') : UsniAdaptor::t('order', 'Facturas');
    }
    
    /**
     * @inheritdoc
     */
    public static function getTranslatableAttributes()
    {
        return ['terms'];
    }
    
    /**
     * Get order for the invoice
     * @return ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Order::className(), ['id' => 'order_id']);
    }
}