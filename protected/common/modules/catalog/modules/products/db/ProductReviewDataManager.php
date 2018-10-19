<?php
/**
 * @copyright Copyright (C) 2016 Usha Singhai Neo Informatique Pvt. Ltd
 * @license https://www.gnu.org/licenses/gpl-3.0.html
 */
namespace products\db;

use usni\library\db\DataManager;
use products\models\ProductReview;
use products\models\ProductTranslated;
use usni\UsniAdaptor;
/**
 * Loads default data related to product review.
 *
 * @package products\db
 */
class ProductReviewDataManager extends DataManager
{   
    /**
     * @inheritdoc
     */
    public static function getModelClassName()
    {
        return ProductReview::className();
    }

    /**
     * @inheritdoc
     */
    public function getDefaultDataSet()
    {
        $product    = ProductTranslated::find()->where('alias = :alias AND language = :lan', 
                                                                            [':lan' => 'en-US', ':alias' => 'apple-cinema-20"'])->asArray()->one();
        return [
                    [
                        'name'          => 'Wholesalecustomer wholesalecustomerlast',
                        'review'        => UsniAdaptor::t('products', 'Esta es mi primera revisión'),
                        'status'        => ProductReview::STATUS_APPROVED,
                        'product_id'    => $product['owner_id'],
                        'email'         => 'wholesalecustomer@whatacart.com'
                    ],
                    [
                        'name'          => 'Wholesalecustomer wholesalecustomerlast',
                        'review'        => UsniAdaptor::t('products', 'Esta es mi segunda revisión'),
                        'status'        => ProductReview::STATUS_APPROVED,
                        'product_id'    => $product['owner_id'],
                        'email'         => 'wholesalecustomer@whatacart.com'
                    ],
                    [
                        'name'          => 'Wholesalecustomer wholesalecustomerlast',
                        'review'        => UsniAdaptor::t('products', 'Esta es mi tercera revisión'),
                        'status'        => ProductReview::STATUS_APPROVED,
                        'product_id'    => $product['owner_id'],
                        'email'         => 'wholesalecustomer@whatacart.com'
                    ],
                    [
                        'name'          => 'Wholesalecustomer wholesalecustomerlast',
                        'review'        => UsniAdaptor::t('products', 'Esta es mi cuarta revisión'),
                        'status'        => ProductReview::STATUS_APPROVED,
                        'product_id'    => $product['owner_id'],
                        'email'         => 'wholesalecustomer@whatacart.com'
                    ],
                ];
    }
}