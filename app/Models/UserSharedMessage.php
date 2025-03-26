<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserSharedMessage extends Model
{
    protected $table = 'user_shared_message';

    protected $fillable = [
        'user_id',
        'shared_title',
        'message',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}
