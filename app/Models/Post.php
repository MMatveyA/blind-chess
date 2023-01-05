<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use Searchable;

    protected $fillable = ["title", "introduction", "body", "user_id"];

    public function like()
    {
        $this->like += 1;
        $this->save();
    }

    public function dislike()
    {
        $this->dislike += 1;
        $this->save();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
