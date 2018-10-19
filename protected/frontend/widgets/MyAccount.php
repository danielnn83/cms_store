<?php
/**
 * @copyright Copyright (C) 2016 Usha Singhai Neo Informatique Pvt. Ltd
 * @license https://www.gnu.org/licenses/gpl.html
 */
namespace frontend\widgets;

use usni\UsniAdaptor;
use usni\library\utils\ArrayUtil;
use usni\library\utils\Html;
use usni\fontawesome\FA;
use yii\bootstrap\Dropdown;
/**
 * Renders My Account dropdown in header
 *
 * @package frontend\widgets
 */
class MyAccount extends \yii\bootstrap\Widget
{
    
    /**
     * @var string My account url 
     */
    public $accountUrl;
    
    /**
     * @var string Label for my account 
     */
    public $accountLabel;
    
    /**
     * inheritdoc
     */
    public function run()
    {
        if($this->accountUrl == null)
        {
            if (!UsniAdaptor::app()->user->isGuest)
            {
                $this->accountUrl = UsniAdaptor::createUrl('customer/site/my-account');
            }
            else
            {
                $this->accountUrl = UsniAdaptor::createUrl('customer/site/login');
            }
        }
        if($this->accountLabel == null)
        {
            $this->accountLabel = UsniAdaptor::t('users', 'Mi cuenta');
        }
        
        return $this->renderTotal();
    }
    
   
    
    
    public function renderTotal()
    {
        $username       = null;
        if (!UsniAdaptor::app()->user->isGuest)
        {
            $username   = UsniAdaptor::app()->user->getIdentity()->username;
            $this->accountLabel = $username;
        }
        $lista = "";
        if(!UsniAdaptor::app()->user->isGuest)
        {
            
            $lista =//'<li><a href="'.UsniAdaptor::createUrl('wishlist/default/view').'">'.UsniAdaptor::t('users', "Lista de deseos").'</a></li>
                    //<li><a href="'.UsniAdaptor::createUrl('cart/checkout/index').'">'. UsniAdaptor::t('users', "Pagar").'</a></li>
                    '<li><a href="'.UsniAdaptor::createUrl('customer/site/logout').'">'.UsniAdaptor::t('users', "Salir").'</a></li>';
        }
        else
        {
            
            $lista = ' <li><a href="'.UsniAdaptor::createUrl('customer/site/login').'">'.UsniAdaptor::t('users', "Ingresar").'</a></li>
                    <li><a href="'.UsniAdaptor::createUrl('customer/site/register').'">'.UsniAdaptor::t('users', "Registrar").'</a></li>';
        }
        return '<div class="header-account header-account-2 f-left">
                <ul class="user-meta">
                    <li><a href="#"><i class="zmdi zmdi-view-headline"></i></a>
                        <ul>
                            <li><a href="'.$this->accountUrl.'">'.$this->accountLabel.'</a></li>
                            '.$lista.'
                        </ul>
                    </li>
                </ul>
            </div>';
    } 
    
    
}
