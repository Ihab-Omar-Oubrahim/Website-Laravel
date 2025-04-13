<?php

namespace App\Models\Website;

use Illuminate\Database\Eloquent\Model;

class HomeLandingS1Intro extends Model
{
    protected $table = 'home_landing_s1_intro';

    protected $fillable = [
        'Intro_title',
        'Intro_paragraph_1',
        'Intro_paragraph_2',
        'Intro_button_text_1',
        'intro_image_1',
        'intro_image_2',
        'is_visible',
    ];

    public function getIntroImage1URL()
    {
        if ($this->intro_image_1) {
            return route('website.image', [
                'path' => 'home_landing/' . $this->intro_image_1
            ]) . '?cache=' . md5($this->updated_at);
        }
    }

    public function getIntroImage2URL()
    {
        if ($this->intro_image_2) {
            return route('website.image', [
                'path' => 'home_landing/' . $this->intro_image_2
            ]) . '?cache=' . md5($this->updated_at);
        }
    }



    // Foreign keys

    public function webPage()
    {
        return $this->belongsTo(WebPageModel::class, 'id_page', 'id_page');
    }
}
