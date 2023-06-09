<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use SoftDeletes;
    use \App\Http\Traits\UsesUuid;

    use HasFactory;
    protected $table = 'events';
    protected $guarded = ['id'];
    protected $fillable = [
        'nama',
        'tanggal_mulai',
        'tanggal_selesai',
        'deskripsi',
        'foto'

    ];


    protected $dates = [
        'deleted_at',
        'tanggal_mulai',
        'tanggal_selesai'
    ];

    public function setNamaAttribute($value)
    {
        $this->attributes['nama'] = $value;
        $this->attributes['slug'] = Str::slug($value). "-" .Str::random(4);
    }

    public function talents()
    {
        return $this->belongsToMany(Talent::class, 'events_talents');
    }
}
