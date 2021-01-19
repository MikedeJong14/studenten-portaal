<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QA extends Model
{
    use HasFactory;
    protected $fillable = ['question'];

    public function Category()
    {

        return $this->belongsTo('App\Models\Category');

    }
}
