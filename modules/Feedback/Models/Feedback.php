<?php

namespace Modules\Feedback\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Base\Models\BaseModel;
use Modules\Member\Models\Member;
use Modules\Product\Models\Product;

class Feedback extends BaseModel {
    protected $table = "feedback";

    protected $primaryKey = "id";

    protected $guarded = [];

    public $timestamps = true;

    const PICTURE_FIRST = 'PICTURE_FIRST';
    const HIGH_STARS    = 'HIGH_STARS';
    const TIME          = 'TIME';

    protected static function boot() {
        parent::boot();

        static::created(function ($model) {
            $product_feedback     = $model->product->feedback;
            $model->product->vote = round($product_feedback->sum('vote') / (($product_feedback->count() == 0) ? 1
                    : $product_feedback->count()));
            $model->product->save();
        });
    }

    /**
     * @return array
     */
    public static function getFilter() {
        return [
            self::PICTURE_FIRST => trans('PICTURE FIRST'),
            self::HIGH_STARS    => trans('HIGH NUMBER OF STARS'),
            self::TIME          => trans('TIME'),
        ];
    }

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
