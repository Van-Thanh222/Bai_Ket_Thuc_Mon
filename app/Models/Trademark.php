<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trademark extends Model
{
    protected $table = 'trademarks';
    use HasFactory;

    protected $fillable = [
        'name',
        'avatar',
        'describe',
    ];
    public function products()
{
    return $this->hasMany(Product::class,'id_trademark');
}

}

