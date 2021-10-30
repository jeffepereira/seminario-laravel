<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    protected $table = 'posts_seminario';

    protected $fillable = ['title', 'content', 'image'];

    // creating, created, updating, updated, deleting, deleted

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($post) {
            Storage::disk('public')->delete($post->image);
        });
    }


    public function wayImage()
    {
        return Storage::url($this->image);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'post_id');
    }
}
