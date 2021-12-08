<?php

namespace Modules\Feedback\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Member\Models\Member;
use Modules\Product\Models\Product;

class Feedback extends Model {
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
     * @return string
     */
    public function getStar() {
        $html = "";
        $vote = $this->vote;
        for ($i = 1; $i <= $vote; $i++) {
            $html .= '<i class="fa fa-star text-warning" style="font-size: 20px;"></i>';
        }

        for ($i = 1; $i <= 5 - $vote; $i++) {
            $html .= '<i class="fa fa-star-o text-warning" style="font-size: 20px;"></i>';
        }

        return $html;
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
