<?php

namespace Modules\Application\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use DB;
use App\User;
use Auth;
use Session;
use Carbon\Carbon;
use PragmaRX\Countries\Package\Countries as Country;
use Modules\Application\Http\Requests\ApplicationsRequest;
use Modules\Application\Entities\Application as Application;
use Modules\Application\Entities\FinancialInstrument;
use Modules\Application\Traits\Attachments;
use Modules\Application\Traits\Submission;
use Modules\Application\Traits\Financials;
use Modules\Application\Traits\Participants;


class ApplicationsController extends Controller
{
    public $user;
    use Attachments, Submission, Financials, Participants;

    public function __construct(Request $request, Country $country, Application $application, FinancialInstrument $financialinstrument, Auth $user)
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
        $this->country = $country;
        $this->application = $application;
        $this->financialinstrument = $financialinstrument;

    }

    public function index()
    {
        $applications = Application::userApplication()->get();
        return view('application::index', compact('applications'));
    }

    public function create()
    {
        return view('application::create', [
            'ins' => $this->financialinstrument->all(),
            'countries' => $this->country->all()
        ]);
    }

    public function store(Request $request)
    {
        $application = $this->application->create($this->data);
        $this->checkForLateSubmission($application);
        $this->hasFinancialAid($request, $application);
        $this->hasParticipants($request, $application);
        $this->hasAttachments($request, $application);
        $this->draft($request, $application);
        $this->save($request, $application);
        $this->checkTravelType($request, $application);
        return redirect()->route('applications.index');
    }

    public function show($id)
    {
        $application = $this->application->find($id);
        $statuses = $application->statuses->sortBy('created_at');
        $remarks = $application->comments->sortByDesc('created_at');
        $financialaids = $application->financialaids;
        $participants = $application->participants;
        $flag_icon = Country::where('name.common', $application->country)->pluck('flag.flag-icon');
        return view('application::show', compact('application', 'remarks', 'statuses', 'financialaids', 'flag_icon', 'participants'));
    }

    public function edit($id)
    {
        $application = $this->application->find($id);
        $remarks = $application->comments;
        $statuses = $application->statuses->sortBy('created_at');
        $participants = $application->participants;
        $financialaids = $application->financialaids;
        $ins = $this->financialinstrument->all();
        $countries = $this->country->all();
        return view('application::edit', compact('application', 'countries', 'remarks', 'statuses', 'ins', 'financialaids', 'participants'));
    }

    public function update(Request $request, $id)
    {
        $app = $this->application->find($id);
        $this->hasAttachments($request, $app);
        $this->hasFinancialAid($request, $app);
        $this->hasParticipants($request, $app);
        // $this->updateDraft($request,$app);        
        if ($request->has('draft')) {

            $app->user_id = $this->user->id;
            $app->title = $request->title;
            $app->venue = $request->venue;
            $app->state = $request->state;
            $app->country = $request->country;
            $app->description = $request->description;
            $app->event_start_date = $request->event_start_date;
            $app->event_end_date = $request->event_end_date;
            $app->travel_start_date = $request->travel_start_date;
            $app->travel_end_date = $request->travel_end_date;
            $app->alternate_email = $request->alternate_email;
            $app->type = $request->type;
            $app->event_type = $request->event_type;
            $app->travel_type = $request->travel_type;
            $app->save();
            Session::flash('success', 'Application updated successfully');
        }
        if ($request->has('submit')) {
            $this->submit($request, $app);
        }
        return redirect()->back();
    }

    public function createRemarks(Request $request, $id)
    {
        return $this->saveRemarks($request, $id);
    }

    public function destroy($id)
    {
        $this->application->find($id)->delete();
        Session::flash('success', 'The application has been deleted successfully');
        return redirect()->back();
    }

    public function loadSupervisors(Request $request)
    {
        $student_deptcode = Auth::user()->studentProfile->JAB_HRIS;
        if ($request->has('q')) {
            $search = $request->q;
            $data = User::where('email', 'LIKE', '%' . $search . '%')->get();
            return response()->json($data);
        }
    }
    public function loadCollegeFellows(Request $request)
    {
        $student_deptcode = Auth::user()->studentProfile->JAB_HRIS;
        if ($request->has('q')) {
            $search = $request->q;
            $data = DB::table('maklumat_staf_sis_vw')->where('DEPARTMENT_CODE', $student_deptcode)->get();
            return response()->json($data);
        }
    }

    // public function saveRemarks($request, $id)
    // {
    //     $app = $this->application->find($id);
        
    //     // if save remarks
    //     if ($request->has('save_remarks')) {
    //         $app->comment([
    //             'body' => $request->remark,
    //         ], Auth::user());
    //         // notifies Deputy Dean
    //         $deputyDean = $this->getDeputyDean();
    //         $deputyDean->notify(new SubmitApplication($app, $this->getApplicant($app)));
    //         //Set status
    //         $app->setStatus('Submitted To Deputy Dean', 'Submitted to ' . $this->getDeputyDeanName($deputyDean) . '');
    //         $state = DB::table('statuses')->where('model_id', $id)->update(['state' => 'success']);
    //         DB::table('application_user')->insert([
    //             'application_id' => $app->id,
    //             'user_id' => $supervisor->id,
    //         ]);
    //         Session::flash('success', 'The application has been sent');
    //     }

    //     // if approve
    //     if ($request->has('approve')) {
    //         $app->comment([
    //             'body' => $request->remark,
    //         ], Auth::user());
    //         $deputyDean = $this->getDeputyDean();
    //         $app->setStatus('Approved', 'Approved by ' . $this->getDeputyDeanName($deputyDean));
    //         $user->notify(new ApproveApplication($app, $user));
    //         Session::flash('success', $this->approveMessage);
    //     }
    //     // if reject
    //     if ($request->has('reject')) {
    //         $app->comment([
    //             'body' => $request->remark,
    //         ], Auth::user());
    //         $deputyDean = $this->getDeputyDean();
    //         $app->setStatus('Rejected', 'Rejected by ' . $this->getDeputyDeanName($deputyDean));
    //         $user->notify(new RejectApplication($app, $user));
    //         Session::flash('success', $this->rejectMessage);
    //     }
    //     $url = URL::signedRoute('applications.show', ['id' => $id]);
    //     return redirect($url);
    // }

}
