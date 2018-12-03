<?php

namespace App\Http\Controllers;

use App\Role;
use App\Permission;
use Illuminate\Http\Request;
use App\Authorizable;
use Session;

class RolesController extends Controller
{
    use Authorizable;

    public function index()
    {
        $roles = Role::all();
        $permissions = Permission::all();

        return view('backend.roles.index', compact('roles', 'permissions'));
    }

    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required|unique:roles']);

        if( Role::create($request->only('name')) ) {
            Session::flash('success', 'The role has been added.');
        }

        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        if($role = Role::findOrFail($id)) {
            // admin role has everything
            if($role->name === 'Admin') {
                $role->syncPermissions(Permission::all());
                return redirect()->route('roles.index');
            }

            $permissions = $request->get('permissions', []);
            $role->syncPermissions($permissions);
            Session::flash('success',$role->name . ' permissions has been updated.');
        } else {
            Session::flash('fail','Role with id '. $id .' note found.');
        }

        return redirect()->route('roles.index');
    }

    public function destroy($id){
        
        Role::find($id)->delete();
        Session::flash('success', 'The role has been deleted');
        return redirect()->back();
    }

    public function config(){
        
    }
}
