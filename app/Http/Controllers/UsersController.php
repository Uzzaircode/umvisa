<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Permission;
use App\Authorizable;
use App\Profile;
use Modules\Department\Entities\Department;
use Modules\Sap\Entities\Sap;
use App\Repositories\UsersRepository as UR;
use Auth;
use Session;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{
    use Authorizable;
    protected $urepo;

    public function __construct(UR $urepo)
    {
        $this->urepo = $urepo;
    }

    public function index(UR $repo)
    {   
        $result = $repo->all();
        return view('backend.users.index', compact('result'));
    }

    public function create()
    {   
        $depts = Department::pluck('name','id');
        $roles = Role::pluck('name', 'id');
        $saps = Sap::pluck('name', 'id');
        return view('backend.users.create', compact('roles','depts','saps'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'bail|required|min:2',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'roles' => 'required|min:1'            
        ]);
        

        // hash password
        $request->merge(['password' => bcrypt($request->get('password'))]);

        // Create the user
        if ($user = User::create($request->except('roles', 'permissions'))) {
            // sync permission
            $this->syncPermissions($request, $user);
            //departments           
            $user->departments()->attach($request->depts);
            // SAP Modules
            $user->saps()->attach($request->saps);
            // user's avatar
            if ($request->hasFile('avatar')) {
                $avatar = $request->avatar;
                $avatar_new_name = time() . $avatar->getClientOriginalName();
                $avatar->move('uploads/avatars', $avatar_new_name);
            }
            $profile = new Profile;
            $profile->user_id = $user->id;
            if(!empty($avatar_new_name)){
                $profile->avatar = 'uploads/avatars/'.$avatar_new_name;
            }else{
                $profile->avatar = 'uploads/avatars/default.svg';
            }
            $profile->hod_id = $request->hod_id;
            $profile->save();

            Session::flash('success','User has been created.');
        } else {
            Session::flash('fail','Unable to create user.');
        }        
        return redirect()->route('users.index');
    }
    

    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name', 'id');
        $permissions = Permission::all('name', 'id');
        $depts = Department::pluck('name','id');
        $saps = Sap::pluck('name', 'id');

        return view('backend.users.edit', compact('user', 'roles', 'permissions','depts','saps'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'bail|required|min:2',
            'email' => 'required|email|unique:users,email,' . $id,
            'roles' => 'required|min:1',
        ]);

        // Get the user
        $user = User::find($id);              
        // Update user
        $user->fill($request->except('roles', 'permissions', 'password'));

        // check for password change
        if ($request->get('password')) {
            $user->password = bcrypt($request->get('password'));
        }

        
        // user's avatar
        if ($request->hasFile('avatar')) {
            
            $avatar = $request->avatar;
            $avatar_new_name = time() . $avatar->getClientOriginalName();
            $avatar->move('uploads/avatars', $avatar_new_name);
            $user->profile->avatar = 'uploads/avatars/'.$avatar_new_name;
        }     
        if($request->has('hod_id')){
            $user->profile->hod_id = $request->hod_id;
            $user->profile->update();
        }  
        $user->save();
        $user->profile->update();
        // Handle the user roles
        $this->syncPermissions($request, $user);
        $user->departments()->sync($request->depts);
        $user->saps()->sync($request->saps);
        Session::flash('success','User has been updated.');
        return redirect()->back();
    }

    public function destroy($id)
    {
        if (Auth::user()->id == $id) {
            Session::flash('warning','Deletion of currently logged in user is not allowed :(')->important();
            return redirect()->back();
        }

        if (User::findOrFail($id)->delete()) {
            Session::flash('success','User has been deleted');
        } else {
            Session::flash('success','User not deleted');
        }

        return redirect()->back();
    }

    private function syncPermissions(Request $request, $user)
    {
        // Get the submitted roles
        $roles = $request->get('roles', []);
        $permissions = $request->get('permissions', []);

        // Get the roles
        $roles = Role::find($roles);

        // check for current role changes
        if (!$user->hasAllRoles($roles)) {
            // reset all direct permissions for user
            $user->permissions()->sync([]);
        } else {
            // handle permissions
            $user->syncPermissions($permissions);
        }

        $user->syncRoles($roles);
        return $user;
    }

    public function myprofile(){
        $user = User::find(Auth::id());
        $user_id = Auth::id();
        $roles = Role::pluck('name', 'id');
        $permissions = Permission::all('name', 'id');
        $depts = Department::pluck('name','id');
        $saps = Sap::pluck('name', 'id');
        return view('backend.users.edit', compact('user', 'roles', 'permissions','depts','saps','id'));
    }
}
