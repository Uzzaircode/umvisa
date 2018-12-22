<?php

namespace Modules\Travel\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Travel\Entities\Travel;
use Auth;

class TravelsController extends Controller
{
    public $travel;

    public function __construct(Travel $travel, Request $request, Auth $user)
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            $this->data = [
                'user_id' => $this->user->id,
                'title' => $request->title,
                'venue' => $request->venue,
                'state' => $request->state,
                'country' => $request->country,
                'description' => $request->description,
                'event_start_date' => $request->event_start_date,
                'event_end_date' => $request->event_end_date,
                'travel_start_date' => $request->travel_start_date,
                'travel_end_date' => $request->travel_end_date,
                'alternate_email' => $request->alternate_email,
                'type' => $request->type,
                'event_type' => $request->event_type,
                'travel_type' => $request->travel_type
            ];
            return $next($request);
        });
        $this->travel = $travel;
        $this->data = [
            'title' => $request->title,
            'event_type' => $request->event_type,
            'venue' => $request->venue,
            'country' => $request->cuntry
        ];
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('travel::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('travel::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('travel::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('travel::edit');
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
}
