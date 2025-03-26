<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReportModel extends Model
{

    protected $table = 'reports';

    protected $fillable = [
        'user_id',
        'reported_comment_id',
        'report_title',
        'report_reason',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function reportedComment()
    {
        return $this->belongsTo(UserComment::class, 'reported_comment_id', 'id');
    }
}
