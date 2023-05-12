<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderTiket extends Model
{

    use \App\Http\Traits\UsesUuid;
    // use HasFactory;
    protected $table = 'orderTikets';
    protected $guarded = ['id'];
    protected $fillable = [
        'nama',
        'jumlah',
        'user_id',
        'kategori_tiket'
    ];


    public function setNamaAttribute($value)
    {
        $this->attributes['nama'] = $value;
        $this->attributes['slug'] = Str::slug($value). "-" .Str::random(4);
    }
}
