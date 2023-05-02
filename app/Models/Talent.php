<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Str;

class Talent extends Model
{
    use SoftDeletes;
    use \App\Http\Traits\UsesUuid;
    // use HasFactory;
    protected $table = 'talents';
    protected $guarded = ['id'];
    protected $fillable = [
        'nama',
        'deskripsi',
        'foto',
    ];

    protected $dates = [
        'deleted_at'
    ];

    public function setNamaAttribute($value)
    {
        $this->attributes['nama'] = $value;
        $this->attributes['slug'] = Str::slug($value). "-" .Str::random(4);
    }

    public function events()
    {
        return $this->belongsToMany(Event::class, 'events_talents');
    }
}
