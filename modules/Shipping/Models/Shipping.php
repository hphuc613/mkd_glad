<?php

namespace Modules\Shipping\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shipping extends Model
{
    use SoftDeletes;

    protected $table = "shippings";

    protected $primaryKey = "id";

    protected $dates = ["deleted_at"];

    protected $guarded = [];

    public $timestamps = true;

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
