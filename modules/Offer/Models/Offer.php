<?php

namespace Modules\Offer\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Offer extends Model
{
    use SoftDeletes;

    protected $table = "offers";

    protected $primaryKey = "id";

    protected $dates = ["deleted_at"];

    protected $guarded = [];

    public $timestamps = true;

    public static function filter(array $filter)
    {
        $data = self::query();
        if (isset($filter['name'])) {
            $data = $data->where('name', 'LIKE', '%' . $filter['name'] . '%');
        }
        if (isset($filter['month'])){
            $data = $data->where('month', '=', $filter['month']);
        }
        return $data;
    }

    public function bundles() {
        return $this->hasMany(OfferBundle::class, 'offer_id');
    }

}
