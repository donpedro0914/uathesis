<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Applications;
use Mail;
use App\Mail\Thankyou;

class FrontpageController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        return view('homepage');
    }

    public function about()
    {
        return view('about');
    }

    public function qualifications()
    {
        return view('qualifications');
    }

    public function course_detail()
    {
        return view('details');
    }

    public function features()
    {
        return view('features');
    }

    public function instructors()
    {
        return view('instructor');
    }

    public function testimonial()
    {
        return view('testimonial');
    }

    public function contact()
    {
        return view('contact');
    }

    public function application()
    {
        return view('application');
    }

    public function application_save(Request $request)
    {
        $data = array();

        $mail = Mail::send('email.thankyou', $data, function ($message) {

            $subj = 'Thank you';
            $sendto = request('email');

            $message->to($sendto, $subj)->subject($subj);
            $message->from('info@itc.com', '');
        });

        $number = substr($request->mobile,0 ,1);
        $currentYear = date('Y');
        $dobYear = strtotime($request->dob);
        $getYear = date('Y', $dobYear);
        $getCorrectAge = strval($currentYear - $getYear);
        $age = $request->age;
        // dd($getCorrectAge . "-" . $age);

        if(($request->age >= 60 && $request->age <= 80) || $number != '9') {
            $status = '0';
        } else if($getCorrectAge !== $age || $request->education == 'Elementary Graduate') {
            $status = '2';
        }else {
            $status = '1';
        }

        $app = new Applications;
        $app->title = $request->title;
        $app->last_name = $request->last_name;
        $app->first_name = $request->first_name;
        $app->middle_name = $request->middle_name;
        $app->street = $request->street;
        $app->barangay = $request->barangay;
        $app->district = $request->district;
        $app->city = $request->city;
        $app->province = $request->province;
        $app->region = $request->region;
        $app->zip = $request->zip;
        $app->sex = $request->sex;
        $app->civil_status = $request->civil_status;
        $app->tel = $request->tel;
        $app->mobile = $request->mobile;
        $app->email = $request->email;
        $app->fax = $request->fax;
        $app->education = $request->education;
        $app->employment = $request->employment;
        $app->dob = $request->dob;
        $app->birthplace = $request->birthplace;
        $app->age = $request->age;
        $app->status = $status;
        $app->save();

        return ($app) ? redirect('thank-you')->with('success', 'Application form submitted') :
                        redirect('thank-you')->with('error', 'There is something wrong');
    }

    public function thankyou()
    {
        return view('thankyou');
    }

    public function bartending()
    {
        return view('bartending');
    }

    public function bread()
    {
        return view('bread');
    }

    public function cookery()
    {
        return view('cookery');
    }

    public function driving()
    {
        return view('driving');
    }

    public function shielded()
    {
        return view('shielded');
    }
}
