<?php

namespace Modules\Application\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use PragmaRX\Countries\Package\Countries as Country;
use Modules\Application\Repositories\ApplicationRepository as AR;
use Modules\Application\Http\Requests\ApplicationsRequest;
use Auth;
use Session;
use Carbon\Carbon;
use Modules\Application\Entities\FinancialInstrument;
use Modules\Application\Entities\FinancialAid;

class ApplicationsController extends Controller
{
    public function __construct(Country $country, AR $app, Auth $auth)
    {
        $this->country = $country;
        $this->app = $app;
        $this->auth = $auth;        
    }
    
    public function index()
    {
        $applications = $this->app->allApplications();
        return view('application::index', compact('applications'));
    }
    
    public function create()
    {
        $user = $this->auth::user();
        $ins = FinancialInstrument::all();
        $countries = $this->country->all()->pluck('name.common', 'flag.flag-icon');
        return view('application::create', compact('countries', 'user','ins'));
    }
    
    public function store(Request $request)
    {
        $this->app->saveApplication($request);
        
        return redirect()->route('applications.index');
    }
    
    public function show($id)
    {
        $application = $this->app->find($id);
        $statuses = $application->statuses->sortBy('created_at');
        $remarks = $application->comments->sortByDesc('created_at');
        $financialaids = $application->financialaids;
        return view('application::formal-letter', compact('application', 'remarks', 'statuses','financialaids'));
    }
    
    public function edit($id)
    {
        $application = $this->app->find($id);
        $remarks = $application->comments;
        $statuses = $application->statuses->sortBy('created_at');
        $participants = $application->participants;
        $financialaids = $application->financialaids;
        $ins = FinancialInstrument::all();
        $countries = $this->country->all()->pluck('name.common', 'flag.flag-icon');
        return view('application::create', compact('application', 'countries', 'remarks', 'statuses','ins','financialaids','participants'));
    }

    public function update(Request $request, $id)
    {
        $this->app->updateApplication($id, $request);
        return redirect()->route('applications.index');
    }

    public function createRemarks(Request $request, $id)
    {
        return $this->app->saveRemarks($request, $id);
    }
   
    public function destroy($id)
    {
        $app = $this->app->find($id);
        $app->delete();
        Session::flash('success', 'The application has been deleted successfully');
        return redirect()->back();
    }
   
}
