<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Emotion extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'emotion',
        'note',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    
    // Accessor untuk mendapatkan emoji berdasarkan emosi
    public function getEmojiAttribute(): string
    {
        return match($this->emotion) {
            'sangat-baik' => '😄',
            'baik' => '🙂',
            'biasa' => '😐',
            'sedih' => '😔', 
            'cemas' => '😰',
            'marah' => '😡',
            default => '😐'
        };
    }
    
    // Accessor untuk mendapatkan warna background
    public function getBgColorAttribute(): string
    {
        return match($this->emotion) {
            'sangat-baik' => 'bg-green-100',
            'baik' => 'bg-green-50',
            'biasa' => 'bg-blue-50',
            'sedih' => 'bg-yellow-50',
            'cemas' => 'bg-orange-50',
            'marah' => 'bg-red-50',
            default => 'bg-gray-100'
        };
    }
    
    // Accessor untuk mendapatkan warna teks
    public function getTextColorAttribute(): string
    {
        return match($this->emotion) {
            'sangat-baik' => 'text-green-700',
            'baik' => 'text-green-600',
            'biasa' => 'text-blue-600',
            'sedih' => 'text-yellow-600',
            'cemas' => 'text-orange-600',
            'marah' => 'text-red-600',
            default => 'text-gray-600'
        };
    }
    
    // Accessor untuk mendapatkan nama emosi yang diformat
    public function getFormattedNameAttribute(): string
    {
        return ucwords(str_replace('-', ' ', $this->emotion));
    }
    
    // Accessor untuk mendapatkan tanggal yang diformat
    public function getFormattedDateAttribute(): string
    {
        return $this->created_at->format('d/m/Y');
    }
    
    // Accessor untuk mendapatkan waktu yang diformat
    public function getFormattedTimeAttribute(): string
    {
        return $this->created_at->format('H:i');
    }
}