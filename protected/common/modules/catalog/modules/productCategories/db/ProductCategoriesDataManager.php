<?php
/**
 * @copyright Copyright (C) 2016 Usha Singhai Neo Informatique Pvt. Ltd
 * @license https://www.gnu.org/licenses/gpl-3.0.html
 */
namespace productCategories\db;

use usni\library\db\DataManager;
use productCategories\models\ProductCategory;
use usni\UsniAdaptor;
use usni\library\utils\FileUtil;
use usni\library\utils\FileUploadUtil;
/**
 * Loads default data related to product categories.
 * 
 * @package productCategories\db
 */
class ProductCategoriesDataManager extends DataManager
{
    /**
     * @inheritdoc
     */
    public function getDefaultDataSet()
    {
        return [
                    [
                        'name'              => UsniAdaptor::t('productCategories', 'Categoría 1'),
                        'alias'             =>  UsniAdaptor::t('productCategories', 'categoría 1'),
                        'data_category_id'  => 1,
                        'displayintopmenu'  => 1,
                        'description'       => UsniAdaptor::t('productCategories', 'Presenta solo las mejores ofertas de Categoria1 en el mercado'),
                        'code'              => 'DT',
                        'image'             => $this->getProductCategoryImage('Desktops')
                    ],
                    [
                        'name'              =>  UsniAdaptor::t('productCategories', 'Categoría 2'),
                        'alias'             =>  UsniAdaptor::t('productCategories', 'categoría 2'),
                        'data_category_id'  => 1,
                        'displayintopmenu'  => 1,
                        'description'       => UsniAdaptor::t('productCategories', 'Presenta solo las mejores ofertas de Categoria2 en el mercado'),
                        'code'              => 'LTNB',
                        'image'             => $this->getProductCategoryImage('Laptops & Notebooks')
                    ],
                    [
                        'name'              =>  UsniAdaptor::t('productCategories', 'Categoría 3'),
                        'alias'             =>  UsniAdaptor::t('productCategories', 'categoría 3'),
                        'data_category_id'  => 1,
                        'displayintopmenu'  => 1,
                        'description'       => UsniAdaptor::t('productCategories', 'Presenta solo las mejores ofertas de Categori31 en el mercado'),
                        'code'              => 'CM',
                        'image'             => $this->getProductCategoryImage('Camera')
                    ]
               ];
    }
    
    /**
     * @inheritdoc
     */
    public static function getModelClassName()
    {
        return ProductCategory::className();
    }
    
    /**
     * Get product category image.
     * @param string $catName
     * @return string
     */
    public function getProductCategoryImage($catName)
    {
        $imageBasePath      = FileUtil::normalizePath(APPLICATION_PATH . '/data/images/category');
        $resourceBasePath   = static::getResourceImagesBasePath();
        if(is_dir($imageBasePath) && is_dir($resourceBasePath))
        {
            if ($dh = opendir($imageBasePath . DS . $catName))
            {
                while (($file = readdir($dh)) !== false)
                {
                    if($file != '.' && $file != '..')
                    {
                        $encryptedFileName  = FileUploadUtil::getEncryptedFileName($file);
                        if(YII_ENV != YII_ENV_TEST)
                        {
                            $sourcePath         = FileUtil::normalizePath($imageBasePath . DS . $catName . DS . $file);
                            $destPath           = FileUtil::normalizePath($resourceBasePath . DS . $encryptedFileName);
                            if(file_exists($destPath))
                            {
                                @unlink($destPath);
                            }
                            if(copy($sourcePath, $destPath))
                            {
                                return $encryptedFileName;
                            }
                        }
                        else
                        {
                            return $encryptedFileName;
                        }
                    }
                }
            }
        }
    }
    
    /**
     * Get resources images base path
     * @return string
     */
    public static function getResourceImagesBasePath()
    {
        return FileUtil::normalizePath(UsniAdaptor::app()->assetManager->imageUploadPath);
    }
}