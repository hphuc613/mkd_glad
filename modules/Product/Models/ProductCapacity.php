<?php

namespace Modules\Product\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Base\Models\BaseModel;

class ProductCapacity extends BaseModel {

    protected $table = "product_capacities";

    protected $primaryKey = "id";

    protected $guarded = [];

    public $timestamps = false;

    /**
     * @param $data
     * @param $product_id
     * @return bool
     */
    public static function createCapacity($data, $product_id) {
        $data_insert = [];
        self::query()->where('product_id', $product_id)->delete();
        if (!empty($data)) {
            foreach ($data as $key => $item) {
                $data_insert[$key]               = $item;
                $data_insert[$key]['product_id'] = $product_id;
            }
        }
        self::query()->insert($data_insert);

        return true;
    }

    /**
     * @return BelongsTo
     */
    public function product() {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
