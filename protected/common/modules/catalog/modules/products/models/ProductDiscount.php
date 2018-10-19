<?php
/**
 * @copyright Copyright (C) 2016 Usha Singhai Neo Informatique Pvt. Ltd
 * @license https://www.gnu.org/licenses/gpl.html
 */
namespace products\models;

use usni\library\db\ActiveRecord;
use usni\UsniAdaptor;
use products\models\Product;

/**
 * This is the model class for table "product_discount".
 */
class ProductDiscount extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
                  [['group_id', 'quantity', 'price', 'product_id'], 'required'],
                  [['quantity', 'priority'], 'number', 'integerOnly' => true],
                  [['priority'], 'default', 'value' => 0],
                  [['price'], 'number', 'integerOnly' => false],
                  [['group_id', 'quantity', 'price', 'start_datetime', 'product_id', 'end_datetime', 'priority'], 'safe'],
               ];
    }
    
    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios['create'] = $scenarios['update'] = ['group_id', 'quantity', 'price', 'start_datetime', 'product_id', 'end_datetime', 'priority'];
        return $scenarios;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
                    'group_id'      => UsniAdaptor::t('customer', 'Grupo de clientes'),
                    'quantity'      => UsniAdaptor::t('products', 'Cantidad'), 
                    'price'         => UsniAdaptor::t('products', 'Precio'),
                    'priority'      => UsniAdaptor::t('products', 'Prioridad'),
                    'start_datetime'=> UsniAdaptor::t('products', 'Fecha de inicio'),
                    'end_datetime'  => UsniAdaptor::t('products', 'Fecha de fin'),
                    'product_id'    => Product::getLabel(1),
               ];
    }

    /**
     * @inheritdoc
     */
    public static function getLabel($n = 1)
    {
        return ($n == 1) ? UsniAdaptor::t('products', 'Descuento') : UsniAdaptor::t('products', 'Descuentos');
    }
    
    /**
     * Get product.
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
       return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }
}