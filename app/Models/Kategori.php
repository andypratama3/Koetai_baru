<?php

namespace App\Models;

use Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kategori extends Model
{
    use SoftDeletes;
    use \App\Http\Traits\UsesUuid;
    // use HasFactory;
    protected $table = 'Kategoris';
    protected $guarded = ['id'];
    protected $fillable = [
    'nama'
    ];

    protected $dates = [
        'deleted_at'
    ];


    public function setNamaAttribute($value)
    {
        $this->attributes['nama'] = $value;
        $this->attributes['slug'] = Str::slug($value). "-" .Str::random(4);
    }
    public function produks()
    {
        return $this->belongsToMany(Produk::class, 'produks_kategoris');
    }

    public function produk()
    {
        return $this->belongsToMany(produk::class);
    }




}
