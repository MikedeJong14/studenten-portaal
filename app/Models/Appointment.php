<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'teacher_id',
        'title',
        'date',
        'description',
        'time_period',
        'accepted',
    ];
    
    /**
     * Relationship for "belongs to".
     *
     * @return array
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function teacher()
    {
        return $this->belongsTo('App\Models\User', 'teacher_id');
    }
    
    /**
     * Relationship for "belongs to".
     *
     * @return array
     */
    public function teacher() {
    	return $this->belongsTo('App\Models\User', 'teacher_id');
    }
}
