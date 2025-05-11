<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialInteraction extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'person',
        'interaction_type',
        'date',
        'duration',
        'comfort_level',
        'notes',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'date' => 'date',
        'comfort_level' => 'integer',
        'duration' => 'integer',
    ];

    /**
     * Get the user that owns the social interaction.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}