<?php
/**
 * @copyright Copyright (C) 2016 Usha Singhai Neo Informatique Pvt. Ltd
 * @license https://www.gnu.org/licenses/gpl-3.0.html
 */
namespace common\modules\cms\models;

use usni\library\db\TranslatableActiveRecord;
use usni\UsniAdaptor;
use common\modules\cms\dao\PageDAO;
/**
 * Page active record.
 * 
 * @package common\modules\cms\models
 */
class Page extends TranslatableActiveRecord
{
    use \usni\library\traits\TreeModelTrait;
    
    /**
     * @inheritdoc
     */
    public function beforeSave($insert)
    {
        if(parent::beforeSave($insert))
        {
            $this->level = $this->getLevel();
            return true;
        }
       return false;
    }
    
    /**
     * @inheritdoc
     */
    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);
        $this->updateChildrensLevel();
        $this->updatePath();
    }
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
                    [['name', 'alias', 'status'],                   'required', 'except' => 'bulkedit'],
                    [['name'],                                      'unique', 'targetClass' => PageTranslated::className(), 'targetAttribute' => ['name', 'language'], 'on' => 'create'],
                    [['alias'],                                     'unique', 'targetClass' => PageTranslated::className(), 'targetAttribute' => ['alias', 'language'], 'on' => 'create'],
                    ['name',                                        'unique', 'targetClass' => PageTranslated::className(), 'targetAttribute' => ['name', 'language'], 'filter' => ['!=', 'owner_id', $this->id], 'on' => 'update'],
                    ['alias',                                       'unique', 'targetClass' => PageTranslated::className(), 'targetAttribute' => ['alias', 'language'], 'filter' => ['!=', 'owner_id', $this->id], 'on' => 'update'],
                    ['custom_url',                                              'safe'],
                    ['custom_url',                                              'url'],
                    [['status', 'parent_id'],                                   'number'],
                    [['name', 'alias'],                                         'string', 'max' => 128],
                    [['parent_id'],                                         'default', 'value' => 0],
                    [['metakeywords', 'metadescription'],                       'safe'],
                    ['alias', 'match', 'pattern' => '/^[a-zA-Z0-9_-]+$/i'],
                    [['id', 'name', 'menuitem', 'alias', 'content', 'summary', 'parent_id', 'metakeywords', 
                      'metadescription', 'level', 'path'], 'safe']
               ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        $scenario               = parent::scenarios();
        $commonAttributes       = ['name', 'menuitem', 'alias', 'content', 'summary', 'metakeywords', 'metadescription', 'status', 'custom_url', 
                                   'parent_id', 'level', 'path'];
        $scenario['create']     = $scenario['update'] = $commonAttributes;
        $scenario['bulkedit']   = ['parent_id', 'status'];
        return $scenario;
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        $labels = [
                        'id'                    => UsniAdaptor::t('application', 'Id'),
                        'name'                  => UsniAdaptor::t('application', 'Nombre'),
                        'alias'                 => UsniAdaptor::t('application', 'Alias'),
                        'summary'               => UsniAdaptor::t('cms', 'Resumen'),
                        'content'               => UsniAdaptor::t('cms', 'Contenido'),
                        'menuitem'              => UsniAdaptor::t('cms', 'Menu Item'),
                        'status'                => UsniAdaptor::t('application', 'Estatus'),
                        'metakeywords'          => UsniAdaptor::t('application', 'Meta Keywords'),
                        'metadescription'       => UsniAdaptor::t('application', 'Meta Descripción'),
                        'parent_id'             => UsniAdaptor::t('application', 'Padre')
                  ];
        return parent::getTranslatedAttributeLabels($labels);
    }

    /**
     * @inheritdoc
     */
    public static function getLabel($n = 1)
    {
        return ($n == 1) ? UsniAdaptor::t('cms', 'Página') : UsniAdaptor::t('cms', 'Páginas');
    }

    /**
     * Get attribute hints.
     * return array
     */
    public function attributeHints()
    {
        return array(
            'alias'   => UsniAdaptor::t('applicationhint', 'Espacios no permitidos. Caracteres permitidos [a-zA-Z0-9_-]'),
            'name'    => UsniAdaptor::t('applicationhint', 'Minimo 3 caracteres'),
            'summary'    => UsniAdaptor::t('cmshint', 'Resumen para la página'),
            'content'    => UsniAdaptor::t('cmshint', 'Contenido para la página'),
            'menuitem'   => UsniAdaptor::t('cmshint', 'Texto del menú para la página'),
            'metakeywords'   => UsniAdaptor::t('cmshint', 'Meta keywords para la página'),
            'metadescription'   => UsniAdaptor::t('cmshint', 'Meta descripción para la página'),
            'parent_id'   => UsniAdaptor::t('cmshint', 'Pagina padre para la página'),
            'status'   => UsniAdaptor::t('cmshint', 'Estatus para la página')
        );
    }

    /**
     * @inheritdoc
     */
    public function beforeDelete()
    {
        if(parent::beforeDelete())
        {
            UsniAdaptor::db()->createCommand()->update(self::tableName(),
                                                    ['parent_id' => 0],
                                                    'parent_id = :pid',
                                                    [':pid' => $this->id])->execute();
            return true;
        }
        return false;
    }

    /**
     * @inheritdoc
     */
    public static function getTranslatableAttributes()
    {
        return ['name', 'menuitem', 'content', 'summary', 'metakeywords', 'metadescription', 'alias'];
    }
    
    /**
     * Get descendants based on a parent.
     * @param int $parentId
     * @param int $isChildren If only childrens have to be fetched
     * @return boolean
     */
    public function descendants($parentId = 0, $isChildren = false)
    {
        $recordsData    = [];
        $language       = $this->language;
        $records        = PageDAO::getChildrens($parentId, $language);
        if(!$isChildren)
        {
            foreach($records as $record)
            {
                $hasChildren    = false;
                $childrens      = $this->descendants($record['id'], $isChildren);
                if(count($childrens) > 0)
                {
                    $hasChildren = true;
                }
                $recordsData[]  = ['row'         => $record,
                                   'hasChildren' => $hasChildren, 
                                   'children'    => $childrens];
            }
            return $recordsData;
        }
        else
        {
            foreach($records as $record)
            {
                $recordsData[]  = ['row'         => $record,
                                   'hasChildren' => false, 
                                   'children'    => []];
            }
            return $recordsData;
        }
    }
    
    /**
     * inheritdoc
     */
    public function getMultiLevelSelectOptions($textFieldName,
                                               $accessOwnedModelsOnly = false,
                                               $valueFieldName = 'id')
    {
        $childrens      = array_keys($this->getTreeRecordsInHierarchy());
        $itemsArray     = [];
        if($this->nodeList === null)
        {
            $this->nodeList  = $this->descendants(0, false);
        }
        $items   = static::flattenArray($this->nodeList);
        foreach($items as $item)
        {
            $row = $item['row'];
            if($this->$valueFieldName != $row[$valueFieldName])
            {
                if(($accessOwnedModelsOnly === true && $this->created_by == $row['created_by']) || ($accessOwnedModelsOnly === false))
                {
                    if(!in_array($row['id'], $childrens))
                    {
                        $itemsArray[$row[$valueFieldName]] = str_repeat('-', $row['level']) . $row[$textFieldName];
                    }
                }
            }
        }
        return $itemsArray;
    }
}