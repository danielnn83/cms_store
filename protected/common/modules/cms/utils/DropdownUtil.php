<?php
/**
 * @copyright Copyright (C) 2016 Usha Singhai Neo Informatique Pvt. Ltd
 * @license https://www.gnu.org/licenses/gpl-3.0.html
 */
namespace common\modules\cms\utils;

use usni\UsniAdaptor;
use common\modules\cms\Module;
/**
 * DropdownUtil class file
 * 
 * @package common\modules\cms\utils
 */
class DropdownUtil
{
    /**
     * Gets status dropdown for cms.
     * @return array
     */
    public static function getStatusSelectOptions()
    {
        return [
                    Module::STATUS_PUBLISHED      => UsniAdaptor::t('cms', 'Publicado'),
                    Module::STATUS_UNPUBLISHED    => UsniAdaptor::t('cms', 'No publicado'),
                    Module::STATUS_ARCHIVED       => UsniAdaptor::t('cms', 'Archivado'),
                    Module::STATUS_TRASHED        => UsniAdaptor::t('cms', 'Para la basura'),
               ];
    }
}