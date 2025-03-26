<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserComment extends Model
{
    use HasFactory;

    protected $table = 'user_comment';

    protected $casts = [
        'user_id' => 'string', // Cast the user_id as a string
    ];
    // Define mass-assignable fields
    protected $fillable = ['user_id', 'main_comment', 'name'];

    /**
     * Relationship: A main comment can have multiple replies.
     */
    public function replies()
    {
        return $this->hasMany(Comment::class, 'comment_id', 'id');
    }

    /**
     * Relationship: A main comment belongs to a user.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    /**
     * Relationship: A comment can have many reports.
     */
    public function reports()
    {
        return $this->hasMany(ReportModel::class, 'reported_comment_id', 'id');
    }
}
