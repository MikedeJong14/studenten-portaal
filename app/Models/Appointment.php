<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    
    /**
     * Relationship for "belongs to".
     *
     * @return array
     */
    public function user() {
    	return $this->belongsTo('App\Models\User');
    }
}
