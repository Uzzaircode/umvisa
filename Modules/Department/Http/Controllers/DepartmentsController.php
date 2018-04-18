<?php

namespace Modules\Department\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Authorizable;
use Session;
use Illuminate\Support\Facades\Auth;
use Modules\Department\Repositories\DeptsRepository as DR;
use Modules\Department\Http\Requests\DeptsCreateRequest as DCR;

class DepartmentsController extends Controller
{
    use Authorizable;

    private $entity;
    protected $model;

    public function __construct(){
        $this->entity = 'Department';                     
    }

    public function index(DR $repo){
        $results = $repo->all();
        return view('department::index',compact('results'));
    }

    public function create(){
        return view('department::form');
    }

    public function show(){

    }

    public function store(DCR $request, DR $repo)
    {
        $repo->create(['name'=>$request->name,'email'=>$request->email]);
        Session::flash('success', 'The '.$this->entity.' has been created successfully');
        return redirect()->route('departments.index');
    }

    public function edit(DR $repo, $id){
        $department = $repo->find($id);        
        return view('department::form',compact('department'));
    }

    public function update($id, DCR $request, DR $repo){
        $department = $repo->find($id);
        $department->update(['name'=>$request->name, 'email'=>$request->email]);
        Session::flash('success', 'The '.$this->entity.' has been updated successfully');
        return redirect()->back();
    }

    public function destroy(DR $repo, $id){
        $repo->destroy($id);
        Session::flash('success', 'The '.$this->entity.' has been deleted successfully');
        return redirect()->route('departments.index');
    }
}
