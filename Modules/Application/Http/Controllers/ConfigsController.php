<?php

namespace Modules\Application\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Application\Entities\ApplicationConfig;
use Session;

class ConfigsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $running_no_prefix = ApplicationConfig::where('name','running_no_prefix')->first();
        $late_message = ApplicationConfig::where('name','late_message')->first();
        return view('application::config',compact('running_no_prefix','late_message'));
    }

    public function update(Request $request)
    {
        $config = new ApplicationConfig();
        $config->running_no_prefix = $request->running_no_prefix;
        $config->late_message = $request->late_message;
        $config->save();
        Session::flash('success','woah');
        return redirect()->back();
    }

}
