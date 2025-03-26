<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminModel extends Model
{
    protected $table = 'admin';

    protected $fillable = ['user_id','username','password'];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}
