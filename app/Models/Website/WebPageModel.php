<?php

namespace App\Models\Website;

use Illuminate\Database\Eloquent\Model;

class WebPageModel extends Model
{
    protected $table = 'web_page';

    protected $primaryKey = 'id_page';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'id_page',
        'page_name',
        'page_description',
        'web_page_image', // this one's a BLOB
        'page_access',
        'status',
        'maintenance',
    ];

    public function getIcon()
    {
        if ($this->web_page_image) {
            $base64 = base64_encode($this->web_page_image);
            return 'data:image/png;base64,' . $base64;
        }

        return asset('assets/res/Admin_Res/default_potato_icon.png');
    }



    // Foreign Keys

    public function homeLandingS1Intros()
    {
        return $this->hasMany(HomeLandingS1Intro::class, 'id_page', 'id_page');
    }

    public function homeLandingS2Infos()
    {
        return $this->hasMany(HomeLandingS2Info::class, 'id_page', 'id_page');
    }

    public function homeLandingS3Idea()
    {
        return $this->hasMany(HomeLandingS3Idea::class, 'id_page', 'id_page');
    }
}
