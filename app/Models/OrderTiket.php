<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderTiket extends Model
{

    use \App\Http\Traits\UsesUuid;
    // use HasFactory;
    protected $table = 'order_tikets';
    protected $guarded = ['id'];
    protected $fillable = [
        'user_id',
        'nama',
        'tiket_id',
        'jumlah',
        'total',
        'status'
    ];


    public function setNamaAttribute($value)
    {
        $this->attributes['nama'] = $value;
        $this->attributes['slug'] = Str::slug($value). "-" .Str::random(4);
    }
    public function tiket(){

        return $this->belongsTo(Tiket::class);
    }
    // public function users(){

    //     return $this->belongsTo(User::class);
    // }

}
