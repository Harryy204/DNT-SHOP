<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $primaryKey = 'postID';
    protected $table = 'posts';
    protected $fillable = ['title', 'slug', 'content', 'image'];



    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tag', 'post_id', 'tag_id');
    }
    public function comments()
    {
        return $this->hasMany(Comment::class, 'post_id', 'postID'); // Adjust the foreign key and local key as needed
    }
}
