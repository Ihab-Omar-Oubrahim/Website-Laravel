<?php

namespace App\Models;

use App\Http\Controllers\UserComment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';
    // Define mass-assignable fields
    protected $fillable = ['comment_id', 'user_id', 'message'];

    /**
     * Relationship: This reply belongs to a main comment.
     */
    public function mainComment()
    {
        return $this->belongsTo(UserComment::class, 'comment_id', 'id');
    }

    /**
     * Relationship: This reply belongs to a user.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}
