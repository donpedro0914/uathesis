<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'FrontpageController@index')->name('homepage');
Route::get('/about', 'FrontpageController@about')->name('about');
Route::get('/qualifications', 'FrontpageController@qualifications')->name('qualifications');
Route::get('/course/detail', 'FrontpageController@course_detail')->name('course.detail');
Route::get('our-features', 'FrontpageController@features')->name('features');
Route::get('instructors', 'FrontpageController@instructors')->name('instructors');
Route::get('tesimonial', 'FrontpageController@testimonial')->name('testimonial');
Route::get('contact', 'FrontpageController@contact')->name('contact');
Route::get('application-form', 'FrontpageController@application')->name('application');
Route::post('application/save', 'FrontpageController@application_save')->name('application.save');
Route::get('thank-you', 'FrontpageController@thankyou')->name('thank-you');
Route::get('qualification/bartending-nc-ii', 'FrontpageController@bartending')->name('qualification.bartending');
Route::get('qualification/bread-and-pastry-productoin-nc-ii', 'FrontpageController@bread')->name('qualification.bread');
Route::get('qualification/cookery-nc-ii', 'FrontpageController@cookery')->name('qualification.cookery');
Route::get('qualification/driving-nc-ii-and-nc-iii', 'FrontpageController@driving')->name('qualification.driving');
Route::get('qualification/shielded-metal-arc-welding-nc-ii', 'FrontpageController@shielded')->name('qualification.shielded');

Auth::routes();

Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');
Route::get('applications', 'HomeController@applications')->name('applications');
Route::get('/view/applications/{id}', 'HomeController@application_edit')->name('application.edit');
Route::post('/approve', 'HomeController@approve')->name('approve');
Route::get('/logout', 'HomeController@logout');
