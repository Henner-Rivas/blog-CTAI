<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{
    use HasFactory;

    protected $fillable = ['url'];

    //relacion poliforfica

    public function imageable()
    {
        return $this->morphTo();
    }
}
