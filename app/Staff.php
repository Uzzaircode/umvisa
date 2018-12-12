<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Staff extends Authenticatable
{
    use Notifiable;
// The authentication guard for admin
    protected $guard = 'staff';

    protected $table = 'sn_login';

    protected $appends = ['username', 'password'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'STA_NOSTAF', 'STA_KATA_LALUAN',
    ];

    public function getUsernameAttribute()
    {
        return $this->STA_NOSTAF;
    }
    public function getPasswordAttribute()
    {
        return $this->STA_KATA_LALUAN;
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'STA_KATA_LALUAN',
    ];

    public function getAuthPassword()
    {
        return $this->STA_KATA_LALUAN;
    }

}