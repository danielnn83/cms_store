<?php
/**
 * @copyright Copyright (C) 2016 Usha Singhai Neo Informatique Pvt. Ltd
 * @license https://www.gnu.org/licenses/gpl-3.0.html
 */
namespace common\modules\marketing\utils;

use common\modules\marketing\models\SendMailForm;
use usni\UsniAdaptor;
/**
 * MarketingUtil class file.
 * 
 * @package common\modules\marketing\utils
 */
class MarketingUtil
{   
    /**
     * Get To send mail dropdown.
     * @return array
     */
    public static function getToNewsletterDropdown()
    {
        return [
                    SendMailForm::ALL_CUSTOMERS               => UsniAdaptor::t('customer', 'Todos los clientes'),
                    SendMailForm::CUSTOMER_GROUP              => UsniAdaptor::t('customer', 'Grupo de clientes'),
                    SendMailForm::CUSTOMERS                   => UsniAdaptor::t('customer', 'Clientes'),
                    SendMailForm::PRODUCTS                    => UsniAdaptor::t('products', 'Productos comprados'),
               ];
    }
}