<?php

namespace Modules\Application\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Session;
use App\Authorizable;
use Illuminate\Support\Facades\Auth;
use Modules\Application\Repositories\AppsRepository as AR;
// use Modules\Application\Http\Requests\DeptsCreateRequest as Request;

class ApplicationsController extends Controller
{
    use Authorizable;

    private $entity;
    protected $model;

    public function __construct(){
        $this->entity = 'Application';                     
    }

    public function index(AR $repo){
        $results = $repo->all();
        return view('application::index',compact('results'));
    }

    public function create(){
        return view('application::form');
    }

    public function show(){

    }

    public function store(Request $request, AR $repo)
    {
        $repo->create(['name'=>$request->name,'email'=>$request->email]);
        Session::flash('success', 'The '.$this->entity.' has been created successfully');
        return redirect()->route('applications.index');
    }

    public function edit(AR $repo, $id){
        $application = $repo->find($id);        
        return view('application::form',compact('application'));
    }

    public function update($id, Request $request, AR $repo){
        $application = $repo->find($id);
        $application->update(['name'=>$request->name, 'email'=>$request->email]);
        Session::flash('success', 'The '.$this->entity.' has been updated successfully');
        return redirect()->back();
    }

    public function destroy(AR $repo, $id){
        $repo->destroy($id);
        Session::flash('success', 'The '.$this->entity.' has been deleted successfully');
        return redirect()->route('applications.index');
    }
}
