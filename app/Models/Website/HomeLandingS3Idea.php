<?php

namespace App\Models\Website;

use Illuminate\Database\Eloquent\Model;

class HomeLandingS3Idea extends Model
{
    protected $table = 'home_landing_s3_idea';

    protected $fillable = [
        'Idea_title',
        'Idea_desc',
        'Idea_img',
        'is_visible',
    ];

    public function getIdeaImage()
    {
        if ($this->Idea_img) {
            return route('website.image', [
                'path' => 'home_landing/' . $this->Idea_img
            ]) . '?cache=' . md5($this->updated_at);
        }
    }

    // Foreign keys

    public function webPage()
    {
        return $this->belongsTo(WebPageModel::class, 'id_page', 'id_page');
    }
}
