<?php

namespace Modules\Application\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use PragmaRX\Countries\Package\Countries as Country;
use Modules\Application\Repositories\ApplicationRepository as AR;
use Modules\Application\Http\Requests\ApplicationsRequest;
use Modules\Application\Entities\Application;
use Spatie\ModelStatus\HasStatuses;
use Auth;
use Carbon\Carbon;
use Session;

class ApplicationsController extends Controller
{
    
    public function __construct(Country $country, AR $app, Auth $auth)
    {
        $this->country = $country;
        $this->app = $app;
        $this->auth = $auth;       
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {   
        $results = $this->app->all();
        return view('application::index',compact('results'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $user = $this->auth::user();
        $countries = $this->country->all()->pluck('name.common', 'flag.flag-icon');
        return view('application::create', compact('countries', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(ApplicationsRequest $request)
    {
        $this->app->saveApplication($request);                 
        return redirect()->route('applications.index');
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('application::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('application::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }

    public function testFlag()
    {
        $countries = $this->country->all()->pluck('name.common');
        return view('application::test', compact('countries'));
    }

    public function isDraft($request)
    {
        return $request->has('draft');
    }
}
