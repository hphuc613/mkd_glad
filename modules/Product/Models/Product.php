<?php

namespace Modules\Product\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Modules\Base\Models\BaseModel;
use Modules\Feedback\Models\Feedback;
use Modules\Tag\Models\Tag;
use Modules\User\Models\User;

class Product extends BaseModel {
    use SoftDeletes;

    protected $table = "products";

    protected $primaryKey = "id";

    protected $dates = ["deleted_at"];

    protected $guarded = [];

    public $timestamps = true;

    protected static function boot() {
        parent::boot();

        $author_id = Auth::guard('admin')->user()->id ?? 1;
        static::creating(function ($model) use ($author_id) {
            $model->key_slug   = Str::random(2) . $model->sku . Str::random(2) . time();
            $model->created_by = $author_id;
            $model->updated_by = $author_id;
        });

        static::updating(function ($model) use ($author_id) {
            $model->updated_by = $author_id;
        });
    }

    /**
     * @param $filter
     * @return Builder
     */
    public static function filter($filter) {
        $data = self::query()->with('category')->with('author')->with('updatedBy');
        if (isset($filter['name'])) {
            $data = $data->where('name', 'LIKE', '%' . $filter['name'] . '%');
        }
        if (isset($filter['sku'])) {
            $data = $data->where('sku', 'LIKE', '%' . $filter['sku'] . '%');
        }
        if (isset($filter['status'])) {
            $data = $data->where('status', $filter['status']);
        }
        if (isset($filter['cate_id'])) {
            $data = $data->where('cate_id', $filter['cate_id']);
        }

        return $data;
    }

    /**
     * @param $star_qty
     * @param bool $percent
     * @return float|int|string
     */
    public function getPercentStar($star_qty, $percent = true) {
        $data = 0;
        if ($this->feedback->count() > 0) {
            $data = $this->feedback->where('vote', $star_qty)->count();
            $data = round(($data / $this->feedback->count()) * 100);
        }

        if ($percent) {
            $data .= '%';
        }
        return $data;
    }

    /**
     * @return BelongsTo
     */
    public function category() {
        return $this->belongsTo(ProductCategory::class, 'cate_id');
    }

    /**
     * @return MorphToMany
     */
    public function tags() {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    /**
     * @return HasMany
     */
    public function images() {
        return $this->hasMany(ProductImage::class);
    }

    /**
     * @return BelongsTo
     */
    public function author() {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * @return BelongsTo
     */
    public function updatedBy() {
        return $this->belongsTo(User::class, 'updated_by');
    }

    /**
     * @return HasMany
     */
    public function feedback() {
        return $this->hasMany(Feedback::class);
    }
}
