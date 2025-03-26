<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserContactMessage extends Model
{
    protected $table = 'user_contact';

    protected $fillable = [
        'user_id',
        'phone_number',
        'contact_title',
        'contact_message',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}
