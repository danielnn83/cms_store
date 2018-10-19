<?php
/**
 * @copyright Copyright (C) 2016 Usha Singhai Neo Informatique Pvt. Ltd
 * @license https://www.gnu.org/licenses/gpl-3.0.html
 */
namespace common\modules\order\models;

use usni\library\db\ActiveRecord;
use usni\UsniAdaptor;
use products\models\Product;
/**
 * OrderProduct active record.
 * 
 * @package common\modules\Order\models
 */
class OrderProduct extends ActiveRecord 
{
    /**
     * This would be use on order product detaiview screen.
     * @var string 
     */
    public $orderProductInformation;
    
	/**
     * @inheritdoc
     */
	public function rules()
	{
		return [
                    [['product_id', 'order_id', 'item_code'],                            'required'],
                    [['order_id', 'product_id', 'quantity', 'options', 'displayed_options', 'item_code', 'options_price'],    'safe'],
               ];
	}
    
    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios['create'] = $scenarios['update'] = ['order_id', 'product_id', 'quantity', 'options', 'displayed_options', 'options_price'];
        return $scenarios;
    }

	/**
     * @inheritdoc
     */
	public function attributeLabels()
	{
		$labels = [
                     'order_id'     => UsniAdaptor::t('order', 'Pedido'),
                     'product_id'	=> Product::getLabel(1),
                     'quantity'     => UsniAdaptor::t('products', 'Cantidad'),
                     'name'         => UsniAdaptor::t('application', 'Nombre'),
                     'model'        => UsniAdaptor::t('products', 'Modelo'),
                     'price'        => UsniAdaptor::t('products', 'Precio'),
                     'total'        => UsniAdaptor::t('application', 'Total'),
                     'tax'          => UsniAdaptor::t('tax', 'Impuesto'),
                     'options_price'=> UsniAdaptor::t('products', 'Opciones de precio')
                  ];
        return parent::getTranslatedAttributeLabels($labels);
	}
    
    /**
     * @inheritdoc
     */
    public static function getLabel($n = 1)
    {
        return ($n == 1) ? UsniAdaptor::t('order', 'Solicitar producto') : UsniAdaptor::t('order', 'Solicitar productos');
    }
}