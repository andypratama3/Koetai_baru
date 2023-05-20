<?php

namespace App\Models;

use App\Models\Produk;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use \App\Http\Traits\UsesUuid;
    // use HasFactory;
    protected $table = 'carts';
    protected $guarded = ['id'];
    protected $fillable = [

        'user_id',
        'produk_id',

        // 'status_pembayaran'
    ];
    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produk_id','id');

    }
}
