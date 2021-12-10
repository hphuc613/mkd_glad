<?php

namespace Modules\Frontend\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Modules\Product\Models\Product as BaseProduct;

class Product extends BaseProduct
{
    /**
     * @param $product_id
     * @param $product_recently
     * @return array|Builder[]|Collection
     */
    public static function getProductRecently($product_id, $product_ids_recently)
    {
        $data = self::query()
            ->whereIn("id", $product_ids_recently)
            ->where('id', '<>', $product_id)
            ->limit(4)
            ->get();
        return $data;
    }
}
