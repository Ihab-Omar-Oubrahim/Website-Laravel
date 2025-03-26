<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Container\Attributes\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $primaryKey = 'user_id';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'user_id',
        'name',
        'bio',
        'image',
        'email',
        'password',
        'is_admin',
        'following',
    ];

    public function profile()
    {
        return $this->hasOne(UserProfile::class, 'user_id', 'user_id'); // u use profile to access other tables columns
        // ex : {{ Auth::user()->profile->location }}
    }

    public function user_shared_msg()
    {
        return $this->hasOne(UserProfile::class, 'user_id', 'user_id');
    }

    public function user_contact()
    {
        return $this->hasOne(UserContactMessage::class, 'user_id', 'user_id');
    }

    public function visitors()
    {
        return $this->hasOne(Visitor::class, 'user_id', 'user_id');
    }

    public function offense()
    {
        return $this->hasOne(Offense::class, 'user_id', 'user_id');
    }


    public function admin()
    {
        return $this->hasOne(AdminModel::class, 'user_id', 'user_id');
    }



    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function getImageURL()
    {
        if ($this->image) {
            return url('storage/' . $this->image);
        }
        return "https://api.dicebear.com/6.x/fun-emoji/svg?seed={{default/default-m.png}}";
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
