<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use App\LinkedSocialAccount;
use Modules\Department\Entities\Department;
use Modules\Sap\Entities\Sap;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function accounts(){
        return $this->hasMany(LinkedSocialAccount::class);
    }

    public function profile(){
        return $this->hasOne(Profile::class);
    } 
      
    public function departments(){
         return $this->belongsToMany(Department::class);
    }

    public function saps(){
        return $this->belongsToMany(Sap::class);
    }
}
