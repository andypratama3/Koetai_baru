<?php

namespace App\Models;

use App\Http\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderShop extends Model
{
    use UsesUuid;
    use SoftDeletes;
    // use HasFactory;
    protected $table = 'order_shops';
    protected $guarded = ['id'];
    protected $fillable = [
        'user_id',
        'nama_penerima',
        'nomor_telpon',
        'prod_id',
        'prod_qty',
        'prod_ukuran',
        'kategori_pesanan',
        'alamat',
        'status',
        'slug',
    ];

    protected $dates = [
        'deleted_at'
    ];


    public function setNamaAttribute($value)
    {
        $this->attributes['nama'] = $value;
        $this->attributes['slug'] = Str::slug($value). "-" .Str::random(4);
    }
}
