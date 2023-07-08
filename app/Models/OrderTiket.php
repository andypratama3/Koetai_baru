<?php

namespace App\Models;

use App\Http\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderTiket extends Model
{
    use UsesUuid;
    use HasFactory;
    protected $table = 'order_tikets';
    protected $guarded = [];

    public function tiket(){

        return $this->belongsTo(Tiket::class);
    }

}
