<?php

namespace Modules\Feedback\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Base\Models\BaseModel;
use Modules\Member\Models\Member;
use Modules\Product\Models\Product;

class Feedback extends BaseModel {
    protected $table = "feedback";

    protected $primaryKey = "id";

    protected $guarded = [];

    public $timestamps = true;

    /**
     * @param $filter
     * @return Builder
     */
    public static function filter($filter) {
        $query = self::query();

        if (isset($filter['member_id'])) {
            $query = $query->where('member_id', $filter['member_id']);
        }

        if (isset($filter['product_id'])) {
            $query = $query->where('product_id', $filter['product_id']);
        }

        return $query;
    }

    /**
     * @return BelongsTo
     */
    public function member() {
        return $this->belongsTo(Member::class, 'member_id');
    }

    /**
     * @return BelongsTo
     */
    public function product() {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
