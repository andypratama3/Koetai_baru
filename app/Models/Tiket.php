<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tiket extends Model
{
    use HasFactory;
    use \App\Http\Traits\UsesUuid;
    // use HasFactory;
    protected $table = 'tikets';
    protected $guarded = ['id'];
    protected $fillable = [
        'kategori',
        'harga',
        'stok',
    ];


    public function setKategoriAttribute($value)
    {
        $this->attributes['kategori'] = $value;
        $this->attributes['slug'] = Str::slug($value). "-" .Str::random(4);
    }

}
