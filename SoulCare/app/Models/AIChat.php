<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AIChat extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'message',
        'topic',
    ];

    /**
     * Get the user that owns the AI chat.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the replies for the AI chat.
     */
    public function replies()
    {
        return $this->hasMany(AIChatReply::class)->orderBy('created_at');
    }
}

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AIChatReply extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ai_chat_id',
        'message',
        'is_ai',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'is_ai' => 'boolean',
    ];

    /**
     * Get the AI chat that owns the reply.
     */
    public function aiChat()
    {
        return $this->belongsTo(AIChat::class);
    }
}