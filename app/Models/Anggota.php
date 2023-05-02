<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Anggota extends Model
{
    use SoftDeletes;
    use \App\Http\Traits\UsesUuid;
    use HasFactory;
    protected $table = 'anggotas';
    protected $guarded = ['id'];
    protected $fillable = [
    'nama',
    'foto',
    'devisi',
    'instagram'
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
