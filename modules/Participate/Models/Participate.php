<?php

namespace Modules\Participate\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Modules\User\Models\User;

class Participate extends Model
{
    use SoftDeletes;

    protected $table = "participates";

    protected $primaryKey = "id";

    protected $dates = ["deleted_at"];

    protected $guarded = [];

    public $timestamps = true;

    protected static function boot() {
        parent::boot();

        $author_id = Auth::guard('admin')->user()->id ?? 1;
        static::creating(function ($model) use ($author_id) {
            $model->created_by = $author_id;
            $model->updated_by = $author_id;
        });

        static::updating(function ($model) use ($author_id) {
            $model->updated_by = $author_id;
        });
    }

    public static function filter(array $filter)
    {
        $data = self::query()->with('author')->with('updatedBy');
        if (isset($filter['name'])) {
            $data = $data->where('name', 'LIKE', '%' . $filter['name'] . '%');
        }
        if (isset($filter['created_by'])) {
            $data = $data->where('created_by', $filter['created_by']);
        }
        return $data;
    }

    /**
     * @return BelongsTo
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * @return BelongsTo
     */
    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

}
