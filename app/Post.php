<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    protected $table = 'posts_seminario';

    protected $fillable = ['title', 'content', 'image'];

    public function wayImage()
    {
        return Storage::url($this->image);
    }
}
