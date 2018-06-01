<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use App\LinkedSocialAccount;
use Modules\Department\Entities\Department;
use Modules\Ticket\Entities\Ticket;
use Modules\Sap\Entities\Sap;
use Modules\Ticket\Entities\Reply;
use App\Profile;
use Cache;
// use App\Http\Traits\Hashidable;


class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;
    // use Hashidable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

//     private function getModel($model, $routeKey)
// {
//     $id = \Hashids::connection($model)->decode($routeKey)[0] ?? null;
//     $modelInstance = resolve($model);

//     return  $modelInstance->findOrFail($id);
// }
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
        return $this->hasOne(Profile::class,'user_id');
    } 
      
    public function departments(){
         return $this->belongsToMany(Department::class);
    }

    public function saps(){
        return $this->belongsToMany(Sap::class);
    }

    // Check if user is online

    // public function isOnline()
    // {
    // return Cache::has('user-is-online-' . $this->id);
    // }

    public function profileOwner($user){
        return $this->id == $user->id;
    }
    public function tickets(){
        return $this->hasMany(Ticket::class);
    }
    public function replies(){
        return $this->hasMany(Reply::class);
    }
    
}
