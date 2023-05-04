<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Str;

class Produk extends Model
{
    use SoftDeletes;
    use \App\Http\Traits\UsesUuid;
    // use HasFactory;
    protected $table = 'produks';
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
    public function kategori()
    {
        return $this->belongsToMany(Talent::class, 'events_talents');
    }
}
