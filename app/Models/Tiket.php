<?php

namespace App\Models;

use App\Models\OrderTiket;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tiket extends Model
{
    use HasFactory;
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
    /**
     * Get the user that owns the Tiket
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ordertiket(){

        return $this->hasMany(OrderTiket::class);
    }
    public function kurangiStok($jumlah)
    {
        $this->stok -= $jumlah;
        $this->save();
    }

}
