<?php
/**
 * @copyright Copyright (C) 2016 Usha Singhai Neo Informatique Pvt. Ltd
 * @license https://www.gnu.org/licenses/gpl-3.0.html
 */
namespace common\modules\cms\db;

use usni\library\db\DataManager;
use common\modules\cms\models\Page;
use common\modules\cms\Module;
use usni\UsniAdaptor;
/**
 * Loads default data related to page.
 *
 * @package common\modules\cms\db
 */
class PageDataManager extends DataManager
{
    /**
     * @inheritdoc
     */
    public static function getModelClassName()
    {
        return Page::className();
    }
    
    /**
     * @inheritdoc
     */
    public function getDefaultDataSet()
    {
        return [
                    [
                        'name'              => UsniAdaptor::t('cms', 'Acerca de nosotros'),
                        'alias'             => UsniAdaptor::t('cms', 'acerca de nosotros'),
                        'content'           => $this->getPageContent('_aboutus'),
                        'status'            => Module::STATUS_PUBLISHED,
                        'menuitem'          => UsniAdaptor::t('cms', 'Acerca de nosotros')   ,
                        'theme'             => null,
                        'parent_id'         => 0,
                        'summary'           => UsniAdaptor::t('cms', 'Acerca de nosotros Resumen'),
                        'metakeywords'      => UsniAdaptor::t('cms', 'Acerca de nosotros'),
                        'metadescription'   => UsniAdaptor::t('cms', 'Acerca de nosotros descripción'),
                    ],
                    [
                        'name'              => UsniAdaptor::t('cms', 'Información de entrega'),
                        'alias'             => UsniAdaptor::t('cms', 'entrega-info'),
                        'content'           => $this->getPageContent('_delivery'),
                        'status'            => Module::STATUS_PUBLISHED,
                        'menuitem'          => UsniAdaptor::t('cms', 'Información de entrega'),
                        'theme'             => null,
                        'parent_id'         => 0,
                        'summary'           => UsniAdaptor::t('cms', 'Información de entrega Resumen'),
                        'metakeywords'      => UsniAdaptor::t('cms', 'Información de entrega'),
                        'metadescription'   => UsniAdaptor::t('cms', 'Información de entrega Descripción'),
                    ],
                    [
                        'name'              => UsniAdaptor::t('cms', 'Política de privacidad'),
                        'alias'             => UsniAdaptor::t('cms', 'privacidad-politica'),
                        'content'           => $this->getPageContent('_privacypolicy'),
                        'status'            => Module::STATUS_PUBLISHED,
                        'menuitem'          => UsniAdaptor::t('cms', 'Politica de privacidad'),
                        'theme'             => null,
                        'parent_id'         => 0,
                        'summary'           => UsniAdaptor::t('cms', 'Politica de privacidad Resumen'),
                        'metakeywords'      => UsniAdaptor::t('cms', 'Politica de privacidad'),
                        'metadescription'   => UsniAdaptor::t('cms', 'Politica de privacidad Descripción'),
                    ],
                    [
                        'name'              => UsniAdaptor::t('cms', 'Terminos y condiciones'),
                        'alias'             => UsniAdaptor::t('cms', 'terminos'),
                        'content'           => $this->getPageContent('_terms'),
                        'status'            => Module::STATUS_PUBLISHED,
                        'menuitem'          => UsniAdaptor::t('cms', 'Terminos y Condiciones'),
                        'theme'             => null,
                        'parent_id'         => 0,
                        'summary'           => UsniAdaptor::t('cms', 'Terminos y condiciones Resumen'),
                        'metakeywords'      => UsniAdaptor::t('cms', 'Terminos y condiciones'),
                        'metadescription'   => UsniAdaptor::t('cms', 'Terminos y condiciones Descripción'),
                    ]
                ];
    }
    
	/**
     * Get content
     * @param string $template
     * @return string
     */
    public function getPageContent($template)
    {
        $filePath       = UsniAdaptor::app()->getModule('cms')->viewPath . "/templates/$template.php";
        if(file_exists($filePath))
        {
            return file_get_contents($filePath);
        }
        return null;
    }
}