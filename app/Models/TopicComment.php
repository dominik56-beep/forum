<?php

declare(strict_types = 1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopicComment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'topic_id',
        'text',
    ];

    protected $with = [
        'user',
    ];


    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function topic() {
        return $this->belongsTo(Topic::class);
    }

    public function files()
    {
        return $this->morphMany(File::class, 'fileable');
    }
}
