<?php 
namespace App\Repositories;

use App\Abstracts\Repository as AbstractRepository;
use App\Repositories\RepositoryInterfaceUserRepoInterface;
use Auth;

class UsersRepository extends AbstractRepository implements UserRepoInterface
{
	protected $modelClassName = 'App\User';
	
	public function allUsers(){
				
		if(!(Auth::user()->hasRole('Admin'))){
        	return $this->modelClassName::all()->where('id',Auth::id());
        }elseif(Auth::user()->hasRole('HOD')){
			$current_user_dept_id = Auth::user()->departments->id;						
			return $this->modelClassName::all()->departments->where('dept_id',$current_user_dept_id);
		}else{
			return $this->modelClassName::all();
		}
	}	
}