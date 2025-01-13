<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subreddit extends Model
{
    protected $fillable = ['user_id', 'name', 'description'];
    protected $table = 'subreddits';
}
