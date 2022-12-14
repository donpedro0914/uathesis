<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Applications;
use Auth;
use Mail;
use App\Mail\Approved;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        $pending = Applications::where('status', 0)->count();
        $approved = Applications::where('status', 1)->count();
        $total = Applications::count();

        $bartendingApproved = Applications::where('title', 'Bartending NC II')->where('status', 1)->count();
        $bartendingPending = Applications::where('title', 'Bartending NC II')->where('status', 0)->count();

        $breadApproved = Applications::where('title', 'Bread and Pastry Production NC II')->where('status', 1)->count();
        $breadPending = Applications::where('title', 'Bread and Pastry Production NC II')->where('status', 0)->count();

        $cookingApproved = Applications::where('title', 'Cookery NC II')->where('status', 1)->count();
        $cookingPending = Applications::where('title', 'Cookery NC II')->where('status', 0)->count();

        $drivingApproved = Applications::where('title', 'Driving NC II & NC III')->where('status', 1)->count();
        $drivingPending = Applications::where('title', 'Driving NC II & NC III')->where('status', 0)->count();

        $shieldApproved = Applications::where('title', 'Shielded Metal Arc Welding NC II')->where('status', 1)->count();
        $dshieldPending = Applications::where('title', 'Shielded Metal Arc Welding NC II')->where('status', 0)->count();
        $chartjs = app()->chartjs
        ->name('lineChartTest')
        ->type('bar')
        ->size(['width' => 400, 'height' => 200])
        ->labels(['Bartending', 'Bread and Pastry', 'Cookery', 'Driving', 'Shielded Metal Arc'])
        ->datasets([
            [
                "label" => "Approved",
                'backgroundColor' => "#f3ff3ec4",
                'borderColor' => "#e8ea52",
                "pointBorderColor" => "fcff4e",
                "pointBackgroundColor" => "fcff4e",
                "pointHoverBackgroundColor" => "#fff",
                "pointHoverBorderColor" => "rgba(220,220,220,1)",
                'data' => [$bartendingApproved, $breadApproved, $cookingApproved, $drivingApproved, $shieldApproved],
            ],
            [
                "label" => "Pending",
                'backgroundColor' => "#ff3e61c4",
                'borderColor' => "#ea526e",
                "pointBorderColor" => "#f90e39",
                "pointBackgroundColor" => "#f90e39",
                "pointHoverBackgroundColor" => "#fff",
                "pointHoverBorderColor" => "rgba(220,220,220,1)",
                'data' => [$bartendingPending, $breadPending, $cookingPending, $drivingPending, $dshieldPending],
            ]
        ])
        ->optionsRaw("{
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        userCallback: function(label, index, labels) {
                            // when the floored value is the same as the value we have a whole number
                            if (Math.floor(label) === label) {
                                return label;
                            }

                        },
                    }
                }],
            },
        }");
        return view('admin.dashboard', compact('chartjs'), ['pending' => $pending, 'approved' => $approved, 'total' => $total]);
    }

    public function applications()
    {
        return view('admin.applications');
    }

    public function application_edit($id)
    {
        $application = Applications::findOrFail($id);
        return view('admin.view_application', compact('application'));
    }

    public function approve(Request $request)
    {
        $id = $request->input('id');
        $app = Applications::findOrFail($id);

        $data = array(
            'sendTo' => request('email'),
            'full_name' => request('fullname')
        );

        $mail = Mail::send('email.approved', $data, function ($message) {

            $subj = 'Your application is approved!';
            $sendto = request('email');

            $message->to($sendto, $subj)->subject($subj);
            $message->from(Auth::user()->email, 'Admin');
        });

        $app->status = true;
        $app->save();

        return response()->json($app);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }
}
