<?php

namespace Modules\Shipping\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Shipping extends Model
{
    use SoftDeletes;

    protected $table = "shippings";

    protected $primaryKey = "id";

    protected $dates = ["deleted_at"];

    protected $guarded = [];

    public $timestamps = true;

    protected static function boot() {
        parent::boot();

        static::saving(function ($model){
            $model->key_slug   = Str::random(2) . $model->id . Str::random(2) . time();
        });
    }

    /**
     * @param $filter
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public static function filter($filter) {
        $data = Shipping::query();
        if (isset($filter['name'])) {
            $data = $data->where('name', 'LIKE', '%' . $filter['name'] . '%');
        }

        if (isset($filter['status'])) {
            $data = $data->where('status', $filter['status']);
        }
        return $data;
    }
}
