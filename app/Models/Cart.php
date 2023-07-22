<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use \App\Http\Traits\UsesUuid;
    use HasFactory;
    
    protected $table = 'carts';
    protected $guarded = ['id'];
    protected $fillable = [
        'user_id',
        'prod_id',
        'prod_qty',
        'prod_ukuran',
    ];

    public function produks(){
        return $this->belongsTo(Produk::class, 'prod_id', 'id');

    }

}

