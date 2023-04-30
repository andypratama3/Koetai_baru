<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use SoftDeletes;
    use \App\Http\Traits\UsesUuid;

    use HasFactory;
    protected $table = 'events';
    protected $guarded = ['id'];
    protected $fillable = [
        'nama',
        'tanggal',
        'deskripsi'
    ];


    protected $dates = [
        'deleted_at',
        'tanggal'
    ];

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value). "-" .Str::random(4);
    }
}
