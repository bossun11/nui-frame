<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diary extends Model
{
    use HasFactory;

    const PAGINATION_COUNT = 15;

    protected $fillable = [
        'user_id',
        'title',
        'content',
        'image',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getAllDiaries($userId)
    {
        return $this->where('user_id', $userId)->latest()->paginate(self::PAGINATION_COUNT);
    }
}
