<?php 
namespace App\Repositories;

use App\Abstracts\Repository as AbstractRepository;
use App\Repositories\RepositoryInterfaceUserRepoInterface;
use Spatie\Permission\Traits\HasRoles;
use Auth;

class UsersRepository extends AbstractRepository implements UserRepoInterface
{
	use HasRoles;

	protected $modelClassName = 'App\User';
	
	public function allUsers(){
				
		if(!isAdmin()){
        	return $this->modelClassName::all()->where('id',Auth::id());
        }elseif(isHOD()){
			$current_user_dept_id = currentUserDeptId();						
			return $this->modelClassName::all()->departments->where('dept_id',$current_user_dept_id);
		}else{
			return $this->modelClassName::all();
		}
	}
	
	public function isAdmin()
    {
        return Auth::user()->hasRole('Admin');
    }
    public function isHOD()
    {
        return Auth::user()->hasRole('HOD');
	}

	public function currentUserDeptId(){
		return Auth::user()->departments->id;
	}
}