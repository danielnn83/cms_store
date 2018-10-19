<?php
/**
 * @copyright Copyright (C) 2016 Usha Singhai Neo Informatique Pvt. Ltd
 * @license https://www.gnu.org/licenses/gpl-3.0.html
 */
namespace common\modules\order\db;

use usni\library\db\DataManager;
use common\modules\order\models\Order;
use usni\UsniAdaptor;
/**
 * Loads default data related to order.
 * 
 * @package common\modules\order\db
 */
class OrderDataManager extends DataManager
{
    /**
     * @inheritdoc
     */
    public static function getModelClassName()
    {
        return null;
    }
    
    /**
     * @inheritdoc
     */
    public function loadDefaultData()
    {
        $this->saveNotificationTemplate();
        return true;
    }
    
    /**
     * inheritdoc
     */
    public function getNotificationDataSet()
    {
        $basePath   = UsniAdaptor::app()->getModule('order')->basePath;
        return  [
                    [
                            'type'      => 'email',
                            'notifykey' => Order::NOTIFY_ORDERCOMPLETION,
                            'subject'   => UsniAdaptor::t('order', 'Finalización del pedido'),
                            'content'   => file_get_contents($basePath . '/email/_orderCompletion.php')
                    ],
                    [
                            'type'      => 'email',
                            'notifykey' => Order::NOTIFY_ORDERRECEIVED,
                            'subject'   => UsniAdaptor::t('order', 'Pedido recibido'),
                            'content'   => file_get_contents($basePath . '/email/_orderReceive.php')
                    ],
                    [
                            'type'      => 'email',
                            'notifykey' => Order::NOTIFY_ORDERUPDATE,
                            'subject'   => UsniAdaptor::t('order', 'Actualizar pedido') . ' | {{ordernumber}}',
                            'content'   => file_get_contents($basePath . '/email/_orderUpdate.php')
                    ]
                ];
    }
    
    /**
     * @inheritdoc
     */
    public function loadDemoData()
    {
        return;
    }
}