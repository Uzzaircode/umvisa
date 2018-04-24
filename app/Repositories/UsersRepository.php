<?php 
namespace App\Repositories;

use App\Abstracts\Repository as AbstractRepository;
use App\Repositories\RepositoryInterfaceUserRepoInterface;
use Auth;

class UsersRepository extends AbstractRepository implements UserRepoInterface
{
	protected $modelClassName = 'App\User';
	
	public function allUsers(){
				
		if(!(Auth::user()->hasRole('Administrator'))){
        	return $this->modelClassName::all()->where('id',Auth::id());
        }else{
			return $this->modelClassName::all();
		}
	}	
}