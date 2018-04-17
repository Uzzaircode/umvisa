<?php

namespace Modules\Sap\Http\Controllers;

use Auth;
use App\Authorizable;
use Session;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Sap\Repositories\SapsRepository as SR;
use Modules\Sap\Http\Requests\SapsCreateRequest as SCR;




class SapsController extends Controller
{
    public $entity = 'SAP Module';

    public function index(SR $repo){
        $saps = $repo->all();
        return view('sap::index',compact('saps'));
    }

    public function create(){
        return view('sap::create');
    }

    public function store(SCR $request, SR $repo)
    {
        $repo->store($request);
        Session::flash('success', 'The '.$entity.' has been created successfully');
        return redirect()->route('saps.index');
    }

    public function edit(SR $repo, $id){
        $sap = $repo->findById($id);
        return view('saps.edit',compact('sap'));
    }

    public function update($id, SCR $request, SR $repo){
        $sap = $repo->findById($id);
        $repo->update($sap, $request);
        Session::flash('success', 'The '.$entity.' has been updated successfully');
        return redirect()->route('saps.index');
    }

    public function destroy(SR $repo, $id){
        $repo->destroy($id);
        Session::flash('success', 'The '.$entity.' has been deleted successfully');
        return redirect()->route('saps.index');
    }
}
