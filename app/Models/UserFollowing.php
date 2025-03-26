<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserFollowing extends Model
{
    protected $table = 'following';

    protected $fillable = [
        'follower_user_id'
    ];

    public function follower()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
