<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'therapist_name',
        'date',
        'time',
        'duration',
        'topics',
        'notes',
        'follow_up_date',
        'status',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'date' => 'date',
        'follow_up_date' => 'date',
        'duration' => 'integer',
    ];

    /**
     * Get the user that owns the consultation.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}