<?php
/**
 * @copyright Copyright (C) 2016 Usha Singhai Neo Informatique Pvt. Ltd
 * @license https://www.gnu.org/licenses/gpl-3.0.html
 */
namespace customer\utils;

use usni\UsniAdaptor;
use usni\library\utils\ArrayUtil;
use usni\library\modules\users\models\Address;
/**
 * Contains utility functions related to Customer.
 *
 * @package customer\utils
 */
class CustomerUtil
{
    /**
     * Get address type dropdown.
     * @return array
     */
    public static function getAddressTypeDropdown()
    {
        return [
                    Address::TYPE_SHIPPING_ADDRESS  => UsniAdaptor::t('customer', 'Dirección de envio'),
                    Address::TYPE_BILLING_ADDRESS   => UsniAdaptor::t('customer', 'Dirección de facturación'),
                    Address::TYPE_DEFAULT           => UsniAdaptor::t('customer', 'Dirección de default')
               ];
    }
    
    /**
     * Get email for the user.
     * @param string $username
     * @param string $email
     * @return string
     */
    public static function getEmail($username, $email)
    {
        if ($email == null)
        {
            return $username . '@correo.com';
        }
        else
        {
            return $email;
        }
    }
    
    /**
     * Get formatted customer activity key.
     * @param string $key
     * @return mixed
     */
    public static function getFormattedCustomerActivityKey($key)
    {
        $formattedKeys = [
                            'new_registration'      => UsniAdaptor::t('customer', 'Registrado para una cuenta.'),
                            'account_order_created' => UsniAdaptor::t('customer', 'Creó un nuevo pedido.'),
                            'login'                 => UsniAdaptor::t('customer', 'Conectado.'),
                            'edit_profile'          => UsniAdaptor::t('customer', 'actualizado los detalles de su cuenta.'),
                            'forgot_password'       => UsniAdaptor::t('customer', 'solicitó una nueva contraseña    .'),
                            'change_password'       => UsniAdaptor::t('customer', 'actualizado la contraseña de su cuenta.'),
                            'add_address'           => UsniAdaptor::t('customer', 'agregó una nueva dirección.')
                         ];
        return ArrayUtil::getValue($formattedKeys, $key);
    }
}