<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'confirm_token', 'user_type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isConfirmed()
    {
        return $this->confirm_token == null;
    }

    public function confirm()
    {
        $this->confirm_token = null;
        $this->save();
    }

    public function isAdmin()
    {
        return $this->user_type == 'boss' || $this->user_type == 'admin' || $this->user_type == 'reporter';
    }

    public static function search($data)
    {
        $user = User::where('user_type', '!=', 'boss')->orderBy('user_type', 'asc');
        if (sizeof($data) > 0) {
            if (array_key_exists('name', $data) && array_key_exists('user_type', $data))
                $user = $user->where('name', 'like', '%' . $data['name'] . '%')
                    ->where('user_type', 'like', '%' . $data['user_type'] . '%');
        }
        $user = $user->paginate(8);
        return $user;
    }
}
