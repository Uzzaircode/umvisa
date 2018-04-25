<?php

namespace Modules\Sap\Http\Controllers;


use App\Authorizable;
use Session;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Modules\Sap\Repositories\SapsRepository as SR;
use Modules\Sap\Http\Requests\SapsCreateRequest as SCR;
use App\Http\Controllers\Controller;

class SapsController extends Controller
{
    use Authorizable;

    private $entity;
    protected $model;

    public function __construct(){
        $this->entity = 'SAP Module';                     
    }

    public function index(SR $repo){
        $results = $repo->all();
        return view('sap::index',compact('results'));
    }

    public function create(){
        return view('sap::form');
    }

    public function show(){

    }

    public function store(SCR $request, SR $repo)
    {
        $repo->create(['name'=>$request->name,'code'=>$request->code]);
        Session::flash('success', 'The '.$this->entity.' has been created successfully');
        return redirect()->route('saps.index');
    }

    public function edit(SR $repo, $id){
        $sap = $repo->find($id);        
        return view('sap::form',compact('sap'));
    }

    public function update($id, SCR $request, SR $repo){
        $sap = $repo->find($id);
        $sap->update(['name'=>$request->name, 'code'=>$request->code]);
        Session::flash('success', 'The '.$this->entity.' has been updated successfully');
        return redirect()->route('saps.index');
    }

    public function destroy(SR $repo, $id){
        $repo->destroy($id);
        Session::flash('success', 'The '.$this->entity.' has been deleted successfully');
        return redirect()->route('saps.index');
    }
}
