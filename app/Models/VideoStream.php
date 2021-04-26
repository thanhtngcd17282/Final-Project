<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class VideoStream extends Model
{
    use HasFactory, SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'key',
        'finish',
        'user_id',
        'img',
        'likes'
    ];

    protected $guarded = [];

    public function comments()
    {
    	return $this->hasMany(Comment::class);
    }

    public function likes()
    {
    	return $this->hasMany(Likes::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
