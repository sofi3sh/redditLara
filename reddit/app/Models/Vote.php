<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    /** @use HasFactory<\Database\Factories\VoteFactory> */
    use HasFactory;
    protected $fillable = ['user_id', 'post_id', 'comment_id', 'vote_type'];
    protected $table = 'votes';
}
