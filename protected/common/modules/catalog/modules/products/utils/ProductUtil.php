<?php
/**
 * @copyright Copyright (C) 2016 Usha Singhai Neo Informatique Pvt. Ltd
 * @license https://www.gnu.org/licenses/gpl-3.0.html
 */
namespace products\utils;

use usni\UsniAdaptor;
use products\models\Product;
use common\modules\stores\utils\StoreUtil;
use usni\library\utils\FileUploadUtil;
/**
 * ProductUtil class file
 *
 * @package products\utils
 */
class ProductUtil
{
    /**
     * Get product pption type.
     * @return Array
     */
    public static function getProductOptionType()
    {
        return [
                   'select'             => 'Select',
                   'radio'              => 'Radio',
                   'checkbox'           => 'Checkbox'
               ];
    }
    
    /**
     * Get input quantity when user clicks on add to cart.
     * @param Product $product
     * @param integer $inputQty
     * @return int
     */
    public static function getAddToCartInputQuantity($product, $inputQty)
    {
        $minQuantity    = $product->minimum_quantity;
        if($inputQty != null && $inputQty >= $minQuantity)
        {
            $quantity = $inputQty;
        }
        else
        {
            $quantity = $minQuantity;
        }
        return $quantity;
    }
    
    /**
     * Get Stock Select options.
     * @return array
     */
    public static function getOutOfStockSelectOptions()
    {
        return array(
            Product::IN_STOCK      => UsniAdaptor::t('products', 'En Stock'),
            Product::OUT_OF_STOCK  => UsniAdaptor::t('products', 'Fuera de Stock')
        );
    }
    
    /**
     * Get product labels
     * @return array
     */
    public static function getProductLabels()
    {
        return [
                    'name'              => UsniAdaptor::t('application', 'Nombre'),
                    'alias'             => UsniAdaptor::t('application', 'Alias'),
                    'model'             => UsniAdaptor::t('products', 'Modelo'),
                    'price'             => UsniAdaptor::t('products', 'Precio'),
                    'quantity'          => UsniAdaptor::t('products', 'Cantidad'),
                    'description'       => UsniAdaptor::t('application', 'Descripción'),
                    'status'            => UsniAdaptor::t('application', 'Estatus'),
                    'metakeywords'      => UsniAdaptor::t('application', 'Meta Keywords'),
                    'metadescription'   => UsniAdaptor::t('application', 'Meta Descripción'),
                    'tagNames'          => UsniAdaptor::t('products', 'Tags'),
                    'minimum_quantity'  => UsniAdaptor::t('products', 'Cantidad minima'),
                    'subtract_stock'    => UsniAdaptor::t('products', 'Restar Stock'),
                    'stock_status'      => UsniAdaptor::t('products', 'Estatus de Stock'),
                    'requires_shipping' => UsniAdaptor::t('products', 'Requiere Envío'),
                    'manufacturer'      => UsniAdaptor::t('manufacturer', 'Fabricante'),
                    'relatedProducts'   => UsniAdaptor::t('products', 'Productos relacionados'),
                    'attribute'         => UsniAdaptor::t('products', 'Atributo'),
                    'language_id'       => UsniAdaptor::t('localization', 'Lenguaje'),
                    'is_featured'       => UsniAdaptor::t('products', 'Producto destacado'),
                    'itemPerPage'       => UsniAdaptor::t('application', 'Artículos por página'),
                    'sort_by'           => UsniAdaptor::t('application', 'Ordenado por'),
                    'tax_class_id'      => UsniAdaptor::t('tax', 'Clase de impuesto'),
                    'sku'               => UsniAdaptor::t('products', 'SKU'),
                    'categories'        => UsniAdaptor::t('productCategories', 'Categorias'),
                    'location'          => UsniAdaptor::t('products', 'Ubicación'),
                    'length'            => UsniAdaptor::t('products', 'Longitud'),
                    'width'             => UsniAdaptor::t('products', 'Anchura'),
                    'height'             => UsniAdaptor::t('products', 'Altura'),
                    'date_available'    => UsniAdaptor::t('products', 'Fecha disponible'),
                    'weight'            => UsniAdaptor::t('products', 'Peso'),
                    'length_class'      => UsniAdaptor::t('lengthclass', 'Clase de longitud'),
                    'weight_class'      => UsniAdaptor::t('weightclass', 'Clase de peso'),
                    'buy_price'         => UsniAdaptor::t('products', 'Precio de compra'),
                    'initial_quantity'  => UsniAdaptor::t('products', 'Stock inicial'),
                    'hits'              => UsniAdaptor::t('products','Hits'),
                    'upc'               => UsniAdaptor::t('products','Código UPC'),
                    'ean'               => UsniAdaptor::t('products','Codigo EAN'),
                    'jan'               => UsniAdaptor::t('products','Código JAN'),
                    'isbn'              => UsniAdaptor::t('products','Código ISBN'),
                    'mpn'               => UsniAdaptor::t('products','Códogp MPN'),
                    'download_option'   => UsniAdaptor::t('products','Opción descargar')
                    
               ];
    }
    
    /**
     * Get product hints
     * @return array
     */
    public static function getProductHints()
    {
        return [
                    'name'              => UsniAdaptor::t('productshint', 'Nombre para el producto'),
                    'alias'             => UsniAdaptor::t('productshint', 'Alias para el producto'),
                    'model'             => UsniAdaptor::t('productshint', 'Modelo para el producto'),
                    'price'             => UsniAdaptor::t('productshint', 'Precio para el producto'),
                    'metakeywords'      => UsniAdaptor::t('productshint', 'Meta Keywords para el producto'),
                    'metadescription'   => UsniAdaptor::t('productshint', 'Meta Descripción para el producto'),
                    'tagNames'          => UsniAdaptor::t('productshint', 'Etiquetas asociadas con el producto. Por ejemplo - Productos útiles'),
                    'minimum_quantity'  => UsniAdaptor::t('productshint', 'Cantidad mínima requerida para agregar producto al carrito.'),
                    'subtract_stock'    => UsniAdaptor::t('productshint', 'Restar stock por la cantidad de compra. Por ejemplo Si hay 100 productos X y se compran 2, las existencias se reducirán a 98.'),
                    'stock_status'      => UsniAdaptor::t('productshint', 'Seleccione "Agotado", "En existencia" como el mensaje que se muestra en la página del producto cuando la cantidad del producto llega a 0.'),
                    'is_featured'       => UsniAdaptor::t('productshint', 'Si desea enfatizar los productos más importantes, los Productos destacados son exactamente lo que necesita.'),
                    'sku'               => UsniAdaptor::t('productshint', 'Un código aleatorio para el producto.'),
                    'categories'        => UsniAdaptor::t('productshint', 'Categorías para el producto'),
                    'length'            => UsniAdaptor::t('productshint', 'Longitud para el producto'),
                    'width'             => UsniAdaptor::t('productshint', 'Ancho para el producto'),
                    'height'            => UsniAdaptor::t('productshint', 'Altura para el producto'),
                    'initial_quantity'  => UsniAdaptor::t('productshint', 'Stock inicial para el producto'),
                    'upc'               => UsniAdaptor::t('productshint','Código Universal de Producto'),
                    'ean'               => UsniAdaptor::t('productshint','Número de artículo europeo'),
                    'jan'               => UsniAdaptor::t('productshint','Número de artículo japonés'),
                    'isbn'              => UsniAdaptor::t('productshint','International Standard Book Number'),
                    'mpn'               => UsniAdaptor::t('productshint','Número de pieza del fabricante'),
               ];
    }
    
    /**
     * Get product type list
     * @return Array
     */
    public static function getProductTypeList()
    {
        return [
                   Product::TYPE_DEFAULT    => UsniAdaptor::t('products', 'Default'),
                   Product::TYPE_DOWNLOADABLE => UsniAdaptor::t('products', 'Descargable')
               ];
    }
    
    /**
     * Get thumbnail image.
     * @param array $data
     * @return mixed
     */
    public static function getThumbnailImage($data)
    {
        return FileUploadUtil::getThumbnailImage($data, 'image', ['thumbWidth' => 50, 'thumbHeight' => 50]);
    }
}