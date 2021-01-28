<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $fillable = ['question'];

    public function answer()
    {
        return $this->hasOne('App\Models\Answer');
    }
    public function category()
    {
        return $this->hasOne('App\Models\Category');
    }
}
