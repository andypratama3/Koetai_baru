<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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


    public function setSlugAttribute($value)
    {

        $this->attributes['slug'] = Str::slug($value). "-" .Str::random(4);
    }
}
