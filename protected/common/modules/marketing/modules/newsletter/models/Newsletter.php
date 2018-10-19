<?php
/**
 * @copyright Copyright (C) 2016 Usha Singhai Neo Informatique Pvt. Ltd
 * @license https://www.gnu.org/licenses/gpl-3.0.html
 */
namespace newsletter\models;

use usni\library\db\TranslatableActiveRecord;
use usni\UsniAdaptor;
/**
 * Newsletter active record.
 * 
 * @package newsletter\models
 */
class Newsletter extends TranslatableActiveRecord
{   
    /**
     * Notification constants
     */
    const NOTIFY_SENDNEWSLETTER = 'sendNewsletter';
    
    /**
     * Newsletter To constant used in EditNewsletter screen dropdown.
     */
    const ALL_SUBSCRIBERS    = 1;
    const ALL_CUSTOMERS      = 2;
    
    /**
     * Send newsletter event
     */
    const EVENT_SENDNEWSLETTER = 'sendNewsletter';
    
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
                    [['subject', 'content'],                                    'required'],
                    [['store_id', 'to'],                                        'safe'],
                    [['id', 'subject', 'content', 'store_id', 'to'],  'safe'],
               ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        $scenarios              = parent::scenarios();
        $scenarios['create']    = $scenarios['update'] = ['subject', 'content', 'store_id', 'to'];
        return $scenarios;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        $labels =   [
                        'subject'       => UsniAdaptor::t('application', 'Tema'),
                        'content'       => UsniAdaptor::t('cms', 'Contenido'),
                        'store_id'      => UsniAdaptor::t('application', 'De'),
                        'to'            => UsniAdaptor::t('application', 'Para'),
                    ];
        return parent::getTranslatedAttributeLabels($labels);
    }
    
    /**
     * @inheritdoc
     */
	public function attributeHints()
	{
		$hints = [
                     'subject'  => UsniAdaptor::t('newsletterhint', 'Establecer tema para el boletín.'),
                     'store_id' => UsniAdaptor::t('newsletterhint', 'Seleccione la tienda para enviar el boletín.'),
                 ];
        return $hints;
	}

    /**
     * @inheritdoc
     */
    public static function getLabel($n = 1)
    {
        return ($n == 1) ? UsniAdaptor::t('newsletter', 'Boletín') : UsniAdaptor::t('newsletter', 'Boletines');
    }
    
    /**
     * @inheritdoc
     */
    public static function getTranslatableAttributes()
    {
        return ['content'];
    }
}
