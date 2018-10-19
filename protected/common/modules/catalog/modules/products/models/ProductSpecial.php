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
 * This is the model class for table "product_special".
 * @package products\models
 */
class ProductSpecial extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
                  [['group_id', 'price', 'product_id'], 'required'],
                  [['priority'], 'number', 'integerOnly' => true],
                  [['priority'], 'default', 'value' => 0],
                  [['price'], 'number', 'integerOnly' => false],
                  [['group_id', 'price', 'start_datetime', 'product_id', 'end_datetime', 'priority'], 'safe'],
               ];
    }
    
    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios['create'] = $scenarios['update'] = ['group_id', 'price', 'start_datetime', 'product_id', 'end_datetime', 'priority'];
        return $scenarios;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
                    'group_id'      => UsniAdaptor::t('customer', 'Grupo de clientes'),
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
        return ($n == 1) ? UsniAdaptor::t('products', 'Especial') : UsniAdaptor::t('products', 'Especiales');
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