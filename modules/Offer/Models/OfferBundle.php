<?php

namespace Modules\Offer\Models;

use App\AppHelpers\Helper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Product\Models\Product;

class OfferBundle extends Model
{
    use SoftDeletes;

    protected $table = "offer_bundles";

    protected $primaryKey = "id";

    protected $dates = ["deleted_at"];

    protected $guarded = [];

    public $timestamps = true;

    public static function getProductList($product_ids)
    {
        $data = Helper::isJson($product_ids, 1);
        $list = [];
        if ($data) {
            foreach ($data as $id) {
                $product = Product::find($id);
                if (!empty($product)) {
                    $list[] = $product;
                }
            }
        }
        return $list;
    }
}
