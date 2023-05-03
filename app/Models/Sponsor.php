<?php

namespace App\Models;


use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sponsor extends Model
{
    use SoftDeletes;
    use \App\Http\Traits\UsesUuid;
    // use HasFactory;
    protected $table = 'sponsors';
    protected $guarded = ['id'];
    protected $fillable = [
    'nama',
    'logo'
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
