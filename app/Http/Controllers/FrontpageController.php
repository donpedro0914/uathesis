<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Applications;

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
