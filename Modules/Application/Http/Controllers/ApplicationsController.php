<?php

namespace Modules\Application\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use PragmaRX\Countries\Package\Countries as Country;
use Modules\Application\Repositories\ApplicationRepository as AR;

class ApplicationsController extends Controller
{
    public function __construct(Country $country,AR $ar)
    {
        $this->country = $country;
        $this->ar = $ar;
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('application::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $countries = $this->country->all()->pluck('name.common','flag.flag-icon');
        return view('application::create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        dd($this->ar->create($request->all()));
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

    public function testFlag(){
        $countries = $this->country->all()->pluck('name.common');
        return view('application::test',compact('countries'));
    }
}
