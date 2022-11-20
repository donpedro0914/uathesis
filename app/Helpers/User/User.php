<?php

namespace App\Helpers\User;
use Auth;
use App\Store;
use App\Customer;
use Illuminate\Support\Facades\DB;

class User {

	public static function get_name($user_id)
	{
		$user = DB::table('users')->where('id', $user_id)->first();
		$name = $user->name;
		$name = explode(' ', trim($name));
		return (isset($user->name) ? $name[0] : '');
	}

	public static function get_username($user_id)
	{
		$user = DB::table('users')->where('id', $user_id)->first();

		return (isset($user->username) ? $user->username : '');
	}

	public static function get_theme($store_id)
	{
		$theme = DB::table('stores')->where('id', Auth::user()->store_id)->first();

		return (isset($theme->theme) ? $theme->theme : '#4267b2');
	}

	public static function get_logo($store_id)
	{
		$logo = DB::table('stores')->where('id', Auth::user()->store_id)->first();
		
		$path = '/logo/'.$logo->name.'/'.$logo->logo;

		return (!empty($logo->logo) ? $path : 'img/ishopbox.png');
	}

	public static function customers($store_id)
	{
		$store = Store::where('id', Auth::user()->store_id)->first();

		return ($store->p_customer == '1') ? 'block' : 'none';
	}

	public static function downloads($store_id)
	{
		$store = Store::where('id', Auth::user()->store_id)->first();

		return ($store->p_download == '1') ? 'block' : 'none';
	}

	public static function reports($store_id)
	{
		$store = Store::where('id', Auth::user()->store_id)->first();

		return ($store->p_report == '1') ? 'block' : 'none';
	}

	public static function rentals($store_id)
	{
		$store = Store::where('id', Auth::user()->store_id)->first();

		return ($store->p_rental == '1') ? 'block' : 'none';
	}

	public static function payrolls($store_id)
	{
		$store = Store::where('id', Auth::user()->store_id)->first();

		return ($store->p_payroll == '1') ? 'block' : 'none';
	}

	public static function payroll($user_id)
	{
		$user = DB::table('users')->where('id', $user_id)->first();

		return ($user->payroll_tab == '1') ? 'block' : 'none';
	}

	public static function bday_noti($store_id)
	{
		$customer = Customer::where('store_id', $store_id)->where('bday', date('m').'-'.date('d').'-'.date('Y'))->count();

		return ($customer) ? $customer : '';
	}
}