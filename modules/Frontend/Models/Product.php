<?php

namespace Modules\Frontend\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Modules\Product\Models\Product as BaseProduct;

class Product extends BaseProduct {
    /**
     * @param null $product_id
     * @param $product_ids_recently
     * @return Builder|Builder[]|Collection
     */
    public static function getProductRecently($product_id = null, $product_ids_recently) {
        $data = self::query()
                    ->whereIn("id", $product_ids_recently);
        if (!empty($product_id)) {
            $data = $data->where('id', '<>', $product_id);
        }
        $data = $data->limit(4)->get();
        return $data;
    }
}
