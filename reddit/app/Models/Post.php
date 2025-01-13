<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'content', 'user_id', 'subreddit_id', 'upvotes', 'downvotes', 'comment_count'];
    protected $table = 'posts';
}
