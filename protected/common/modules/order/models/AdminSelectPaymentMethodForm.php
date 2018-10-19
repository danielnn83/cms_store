<?php
namespace common\modules\order\models;

use usni\UsniAdaptor;
/**
 * AdminSelectPaymentMethodForm active record.
 * @package common\modules\payment\models
 */
class AdminSelectPaymentMethodForm extends \yii\base\Model 
{
    /**
     * Type of payment
     * @var string 
     */
    public $payment_type;
    
    /**
     * Order id
     * @var int 
     */
    public $orderId;
    
	/**
     * @inheritdoc
     */
	public function rules()
	{
		return [
                    [['payment_type', 'orderId'], 'required'],
                    [['payment_type', 'orderId'], 'safe'],
               ];
	}
    
    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios['create'] = $scenarios['update'] = ['payment_type', 'orderId'];
        return $scenarios;
    }

	/**
     * @inheritdoc
     */
	public function attributeLabels()
	{
		$labels = [
                     'payment_type' => UsniAdaptor::t('order', 'Tipo de pago'),
                     'orderId'      => UsniAdaptor::t('order', 'Pedido'),
                  ];
        return $labels;
	}
    
    /**
     * @inheritdoc
     */
    public static function getLabel($n = 1)
    {
        return UsniAdaptor::t('payment', 'Seleccionar método de pago');
    }
}