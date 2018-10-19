<?php
/**
 * @copyright Copyright (C) 2016 Usha Singhai Neo Informatique Pvt. Ltd
 * @license https://www.gnu.org/licenses/gpl-3.0.html
 */
namespace common\modules\extension\models;

use usni\library\db\TranslatableActiveRecord;
use usni\library\db\ActiveRecord;
use usni\UsniAdaptor;
/**
 * Extension class file. This acts as model class for the extension table.
 *
 * @package common\modules\extension\models
 */
class Extension extends TranslatableActiveRecord
{
	/**
     * @inheritdoc
     */
	public function rules()
	{
		return [
                    [['name', 'category', 'code'],       'required'],
                    [['status'],               'integer'],
                    ['status',                 'default', 'value' => ActiveRecord::STATUS_ACTIVE],
                    [['name', 'author', 'version', 'product_version', 'status', 'data'],       'safe'],
               ];
	}
    
    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        $scenario           = parent::scenarios();
        $scenario['create'] = $scenario['update'] = ['name', 'author', 'version', 'product_version', 'status', 'data', 'category', 'code'];
        return $scenario;
    }
    
    /**
     * @inheritdoc
     */
	public function attributeLabels()
	{
		return [
                    'name'          => UsniAdaptor::t('application', 'Nombre'),
                    'author'        => UsniAdaptor::t('application', 'Autor'),
                    'version'       => UsniAdaptor::t('application', 'Versión'),
                    'product_version'     => UsniAdaptor::t('application', 'Versión del producto'),
                    'status'        => UsniAdaptor::t('application', 'Estatus'),
                    'data'          => UsniAdaptor::t('extension', 'Configuración de los datos'),
                    'category'      => UsniAdaptor::t('application', 'Categoría'),
                    'code'          => UsniAdaptor::t('extension', 'Código')
               ];
	}
    
    /**
     * @inheritdoc
     */
    public static function getLabel($n = 1)
    {
        return ($n == 1) ? UsniAdaptor::t('extension', 'Extension') : UsniAdaptor::t('extension', 'Extensiones');
    }
    
    /**
     * @inheritdoc
     */
    public static function getTranslatableAttributes()
    {
        return ['name'];
    }
    
    /**
     * @inheritdoc
     */
    public function beforeSave($insert)
    {
        if(parent::beforeSave($insert))
        {
            if(is_array($this->product_version))
            {
                $this->product_version = implode(',', $this->product_version);
            }
            return true;
        }
        else
        {
            return false;
        }
    }
}