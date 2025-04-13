<?php

namespace App\Models\Website;

use Illuminate\Database\Eloquent\Model;

class HomeLandingS2Info extends Model
{
    protected $table = 'home_landing_s2_info';

    protected $fillable = [
        'Mega_Title',
        'mini_title_left_1',
        'mini_title_middle_2',
        'mini_title_right_3',
        'mini_desc_left_1',
        'mini_desc_left_2',
        'mini_desc_left_3',
        'img_left_1',
        'img_middle_2',
        'img_right_3',
        'is_visible',
    ];

    public function getLeftInfoImage1()
    {
        if ($this->img_left_1) {
            return route('website.image', [
                'path' => 'home_landing/' . $this->img_left_1
            ]) . '?cache=' . md5($this->updated_at);
        }
    }

    public function getMiddleInfoImage2()
    {
        if ($this->img_middle_2) {
            return route('website.image', [
                'path' => 'home_landing/' . $this->img_middle_2
            ]) . '?cache=' . md5($this->updated_at);
        }
    }

    public function getRightInfoImage3()
    {
        if ($this->img_right_3) {
            return route('website.image', [
                'path' => 'home_landing/' . $this->img_right_3
            ]) . '?cache=' . md5($this->updated_at);
        }
    }



    // Foreign keys

    public function webPage()
    {
        return $this->belongsTo(WebPageModel::class, 'id_page', 'id_page');
    }
}
