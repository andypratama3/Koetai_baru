<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use \App\Http\Traits\UsesUuid;

    use HasFactory;
    protected $table = 'events';
    protected $guarded = ['id'];
    protected $fillable = [
        'user_id',
        'prod_id',
        'prod_qty',
    ];
    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($value). "-" .Str::random(4);
    }

}
