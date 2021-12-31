<?php

namespace Modules\Voucher\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VoucherMember extends Model
{
    use SoftDeletes;

    protected $table = "voucher_members";

    protected $primaryKey = "id";

    protected $dates = ["deleted_at"];

    protected $guarded = [];

    public $timestamps = true;

    public static function isReceiveVoucher($id)
    {
        $data = self::query()->where('member_id', $id)->where('voucher_id',1)->first();

        return $data != null;
    }

    public function voucher() {
        return $this->hasOne(Voucher::class,'id','voucher_id');
    }
}
