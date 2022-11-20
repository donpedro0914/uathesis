<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Brand;
use App\Notification;
use App\Inventory;
use App\pos_itemlist;
use App\POS;
use App\Store;
use Carbon\Carbon;
use DB;
use App\Charts\StoreTopPartners;

class HomeController extends GlobalController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $currentMonth = Carbon::today()->format('m');
        $currentYear = Carbon::today()->format('Y');

        $productByQuantity = POS::select('pos_itemlist.name', DB::raw('sum(pos_itemlist.qty) as totalQty'))->join('pos_itemlist', 'pos.transaction_id', 'pos_itemlist.transaction_id')->groupBy('pos_itemlist.name')->orderBy('totalQty', 'desc')->whereMonth('pos_itemlist.created_at', '=', $currentMonth)->whereYear('pos_itemlist.created_at', '=', $currentYear)->limit(5)->get();

        if($productByQuantity->isEmpty()) {

            $productByQuantityChart = app()->chartjs
            ->name('productByQuantityChart')
            ->type('horizontalBar')
            ->size(['width' => 400, 'height' => 200])
            ->labels([])
            ->datasets([
                [
                    "label" => "",
                    'backgroundColor' => "rgba(38, 185, 154, 0.31)",
                    'borderColor' => "rgba(38, 185, 154, 0.7)",
                    "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                    "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                    "pointHoverBackgroundColor" => "#fff",
                    "pointHoverBorderColor" => "rgba(220,220,220,1)",
                    'data' => [],
                ],
                [
                    "label" => "",
                    'backgroundColor' => "rgba(38, 185, 154, 0.31)",
                    'borderColor' => "rgba(38, 185, 154, 0.7)",
                    "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                    "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                    "pointHoverBackgroundColor" => "#fff",
                    "pointHoverBorderColor" => "rgba(220,220,220,1)",
                    'data' => [],
                ]
            ])
            ->options([]);

        } else {
            foreach($productByQuantity as $productbyQuantity)
            {
                $sm_productByQty[] = $productbyQuantity->name;
                $sm_totalProductQty[] = $productbyQuantity->totalQty;
            }
            
            $productByQuantityChart = app()->chartjs
            ->name('productByQuantityChart')
            ->type('horizontalBar')
            ->size(['width' => 400, 'height' => 200])
            ->labels($sm_productByQty)
            ->datasets([
                [
                    "label" => "Quantity",
                    'backgroundColor' => "rgba(38, 185, 154, 0.31)",
                    'borderColor' => "rgba(38, 185, 154, 0.7)",
                    "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                    "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                    "pointHoverBackgroundColor" => "#fff",
                    "pointHoverBorderColor" => "rgba(220,220,220,1)",
                    'data' => $sm_totalProductQty,
                ]
            ])
            ->options([]);
        }

        $productByPrice = POS::select('pos_itemlist.name', DB::raw('max(pos_itemlist.final_price) as final'))->join('pos_itemlist', 'pos.transaction_id', 'pos_itemlist.transaction_id')->groupBy('pos_itemlist.name')->orderBy('final', 'desc')->whereMonth('pos_itemlist.created_at', '=', $currentMonth)->whereYear('pos_itemlist.created_at', '=', $currentYear)->limit(5)->get();

        if($productByPrice->isEmpty()) {

            $productByPriceChart = app()->chartjs
            ->name('productByPriceChart')
            ->type('horizontalBar')
            ->size(['width' => 400, 'height' => 200])
            ->labels([])
            ->datasets([
                [
                    "label" => "",
                    'backgroundColor' => "rgba(38, 185, 154, 0.31)",
                    'borderColor' => "rgba(38, 185, 154, 0.7)",
                    "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                    "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                    "pointHoverBackgroundColor" => "#fff",
                    "pointHoverBorderColor" => "rgba(220,220,220,1)",
                    'data' => [],
                ],
            ])
            ->options([]);

        } else {

            foreach($productByPrice as $products) {
                $productName[] = $products->name;
                $productFinalPrice[] = $products->final;
            }
            
            $productByPriceChart = app()->chartjs
            ->name('productByPriceChart')
            ->type('horizontalBar')
            ->size(['width' => 400, 'height' => 200])
            ->labels($productName)
            ->datasets([
                [
                    "label" => "Price",
                    'backgroundColor' => "rgba(38, 185, 154, 0.31)",
                    'borderColor' => "rgba(38, 185, 154, 0.7)",
                    "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                    "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                    "pointHoverBackgroundColor" => "#fff",
                    "pointHoverBorderColor" => "rgba(220,220,220,1)",
                    'data' => $productFinalPrice,
                ]
            ])
            ->options([]);
        }

        $topSellingPartners = POS::select('brands.name', DB::raw('sum(pos_itemlist.final_price) as totalPrice'))->join('pos_itemlist', 'pos.transaction_id', 'pos_itemlist.transaction_id')->join('brands', 'pos_itemlist.brand_id', 'brands.id')->groupBy('brands.name')->orderBy('totalPrice', 'desc')->whereMonth('pos.created_at', '=', $currentMonth)->whereYear('pos.created_at', '=', $currentYear)->limit(5)->get();

        $topSellingStores = POS::select('stores.name', DB::raw('sum(pos.amount) as finalAmount'))->join('stores', 'pos.store_id', 'stores.id')->groupBy('stores.name')->orderBy('finalAmount', 'desc')->whereMonth('pos.created_at', '=', $currentMonth)->whereYear('pos.created_at', '=', $currentYear)->limit(5)->get();

        return view('admin.dashboard', compact('productByQuantityChart', 'productByPriceChart', 'topSellingPartners', 'topSellingStores'));
    }

    public function sm()
    {

        $currentMonth = Carbon::today()->format('m');
        $currentYear = Carbon::today()->format('Y');

        $topSellingPartnersChart = POS::select(DB::raw('SUM(amount) as final'), DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d") as date'))->where('store_id', Auth::user()->store_id)->groupBy('date')->orderBy('date', 'asc')->whereMonth('pos.created_at', $currentMonth)->whereYear('pos.created_at', $currentYear)->get();

        if($topSellingPartnersChart->isEmpty()) {

            $chartjs = app()->chartjs
            ->name('barChartTopSelling')
            ->type('line')
            ->size(['width' => 400, 'height' => 200])
            ->labels([])
            ->datasets([
                [
                    "label" => "Total Sales",
                    'backgroundColor' => "rgba(38, 185, 154, 0.31)",
                    'borderColor' => "rgba(38, 185, 154, 0.7)",
                    "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                    "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                    "pointHoverBackgroundColor" => "#fff",
                    "pointHoverBorderColor" => "rgba(220,220,220,1)",
                    'data' => [],
                ]
            ])
            ->options([]);

        } else {

            foreach($topSellingPartnersChart as $products) {
                $topSellingPartnersName[] = $products->date;
                $topSellingPartnersFinalPrice[] = $products->final;
            }

            $chartjs = app()->chartjs
            ->name('barChartTopSelling')
            ->type('line')
            ->size(['width' => 400, 'height' => 200])
            ->labels($topSellingPartnersName)
            ->datasets([
                [
                    "label" => "Total Sales",
                    'backgroundColor' => "rgba(38, 185, 154, 0.31)",
                    'borderColor' => "rgba(38, 185, 154, 0.7)",
                    "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                    "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                    "pointHoverBackgroundColor" => "#fff",
                    "pointHoverBorderColor" => "rgba(220,220,220,1)",
                    'data' => $topSellingPartnersFinalPrice,
                ]
            ])
            ->options([]);
        }

        $productByPrice = POS::select('pos_itemlist.name', DB::raw('max(pos_itemlist.final_price) as final'))->join('pos_itemlist', 'pos.transaction_id', 'pos_itemlist.transaction_id')->where('pos.store_id', Auth::user()->store_id)->groupBy('pos_itemlist.name')->orderBy('final', 'desc')->whereMonth('pos_itemlist.created_at', '=', $currentMonth)->whereYear('pos_itemlist.created_at', '=', $currentYear)->limit(5)->get();

        if($productByPrice->isEmpty()) {

            $productByPriceChart = app()->chartjs
            ->name('productByPriceChart')
            ->type('horizontalBar')
            ->size(['width' => 400, 'height' => 200])
            ->labels([])
            ->datasets([
                [
                    "label" => "",
                    'backgroundColor' => "rgba(38, 185, 154, 0.31)",
                    'borderColor' => "rgba(38, 185, 154, 0.7)",
                    "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                    "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                    "pointHoverBackgroundColor" => "#fff",
                    "pointHoverBorderColor" => "rgba(220,220,220,1)",
                    'data' => [],
                ],
            ])
            ->options([]);

        } else {

            foreach($productByPrice as $products) {
                $productName[] = $products->name;
                $productFinalPrice[] = $products->final;
            }
            
            $productByPriceChart = app()->chartjs
            ->name('productByPriceChart')
            ->type('horizontalBar')
            ->size(['width' => 400, 'height' => 200])
            ->labels($productName)
            ->datasets([
                [
                    "label" => "Price",
                    'backgroundColor' => "rgba(38, 185, 154, 0.31)",
                    'borderColor' => "rgba(38, 185, 154, 0.7)",
                    "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                    "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                    "pointHoverBackgroundColor" => "#fff",
                    "pointHoverBorderColor" => "rgba(220,220,220,1)",
                    'data' => $productFinalPrice,
                ]
            ])
            ->options([]);
        }

        $productByQuantity = POS::select('pos_itemlist.name', DB::raw('sum(pos_itemlist.qty) as totalQty'))->join('pos_itemlist', 'pos.transaction_id', 'pos_itemlist.transaction_id')->where('pos.store_id', Auth::user()->store_id)->groupBy('pos_itemlist.name')->orderBy('totalQty', 'desc')->whereMonth('pos_itemlist.created_at', '=', $currentMonth)->whereYear('pos_itemlist.created_at', '=', $currentYear)->limit(5)->get();

        if($productByQuantity->isEmpty()) {

            $productByQuantityChart = app()->chartjs
            ->name('productByQuantityChart')
            ->type('horizontalBar')
            ->size(['width' => 400, 'height' => 200])
            ->labels([])
            ->datasets([
                [
                    "label" => "",
                    'backgroundColor' => "rgba(38, 185, 154, 0.31)",
                    'borderColor' => "rgba(38, 185, 154, 0.7)",
                    "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                    "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                    "pointHoverBackgroundColor" => "#fff",
                    "pointHoverBorderColor" => "rgba(220,220,220,1)",
                    'data' => [],
                ],
                [
                    "label" => "",
                    'backgroundColor' => "rgba(38, 185, 154, 0.31)",
                    'borderColor' => "rgba(38, 185, 154, 0.7)",
                    "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                    "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                    "pointHoverBackgroundColor" => "#fff",
                    "pointHoverBorderColor" => "rgba(220,220,220,1)",
                    'data' => [],
                ]
            ])
            ->options([]);

        } else {
            foreach($productByQuantity as $productbyQuantity)
            {
                $sm_productByQty[] = $productbyQuantity->name;
                $sm_totalProductQty[] = $productbyQuantity->totalQty;
            }
            
            $productByQuantityChart = app()->chartjs
            ->name('productByQuantityChart')
            ->type('horizontalBar')
            ->size(['width' => 400, 'height' => 200])
            ->labels($sm_productByQty)
            ->datasets([
                [
                    "label" => "Quantity",
                    'backgroundColor' => "rgba(38, 185, 154, 0.31)",
                    'borderColor' => "rgba(38, 185, 154, 0.7)",
                    "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                    "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                    "pointHoverBackgroundColor" => "#fff",
                    "pointHoverBorderColor" => "rgba(220,220,220,1)",
                    'data' => $sm_totalProductQty,
                ]
            ])
            ->options([]);
        }

        $topSellingPartners = POS::select('brands.name', DB::raw('sum(pos_itemlist.final_price) as totalPrice'))->join('pos_itemlist', 'pos.transaction_id', 'pos_itemlist.transaction_id')->join('brands', 'pos_itemlist.brand_id', 'brands.id')->where('pos.store_id', Auth::user()->store_id)->groupBy('brands.name')->orderBy('totalPrice', 'desc')->whereMonth('pos.created_at', '=', $currentMonth)->whereYear('pos.created_at', '=', $currentYear)->limit(5)->get();

        $grand_total = POS::where('store_id', Auth::user()->store_id)->whereMonth('created_at', $currentMonth)->sum('amount');
        
        return view('sm.dashboard', compact('chartjs', 'productByPriceChart', 'productByQuantityChart', 'topSellingPartners'), ['currentMonth' => $currentMonth, 'currentYear' => $currentYear, 'grand_total' => $grand_total]);
    }

    public function sm_filtered(Request $request)
    {

        $filter = $request->input('date_filter');
        $strtotime = explode("-", $filter);
        $currentMonth = $strtotime[0];
        $currentYear = $strtotime[1];

        $date = new Carbon($strtotime[1].'-'.$strtotime[0].'-01');
        $month = $date->format('F');
        $year = $date->format('Y');

        $topSellingPartnersChart = POS::select(DB::raw('SUM(amount) as final'), DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d") as date'))->where('store_id', Auth::user()->store_id)->groupBy('date')->orderBy('date', 'asc')->whereMonth('pos.created_at', $currentMonth)->whereYear('pos.created_at', $currentYear)->get();

        if($topSellingPartnersChart->isEmpty()) {

            $chartjs = app()->chartjs
            ->name('lineChartTest')
            ->type('line')
            ->size(['width' => 400, 'height' => 200])
            ->labels([])
            ->datasets([
                [
                    "label" => "Total Sales",
                    'backgroundColor' => "rgba(38, 185, 154, 0.31)",
                    'borderColor' => "rgba(38, 185, 154, 0.7)",
                    "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                    "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                    "pointHoverBackgroundColor" => "#fff",
                    "pointHoverBorderColor" => "rgba(220,220,220,1)",
                    'data' => [],
                ]
            ])
            ->options([]);

        } else {

            foreach($topSellingPartnersChart as $products) {
                $topSellingPartnersName[] = $products->date;
                $topSellingPartnersFinalPrice[] = $products->final;
            }

            $chartjs = app()->chartjs
            ->name('lineChartTest')
            ->type('line')
            ->size(['width' => 400, 'height' => 200])
            ->labels($topSellingPartnersName)
            ->datasets([
                [
                    "label" => "Total Sales",
                    'backgroundColor' => "rgba(38, 185, 154, 0.31)",
                    'borderColor' => "rgba(38, 185, 154, 0.7)",
                    "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                    "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                    "pointHoverBackgroundColor" => "#fff",
                    "pointHoverBorderColor" => "rgba(220,220,220,1)",
                    'data' => $topSellingPartnersFinalPrice,
                ]
            ])
            ->options([]);
        }

        $productByPrice = POS::select('pos_itemlist.name', DB::raw('max(pos_itemlist.final_price) as final'))->join('pos_itemlist', 'pos.transaction_id', 'pos_itemlist.transaction_id')->where('pos.store_id', Auth::user()->store_id)->groupBy('pos_itemlist.name')->orderBy('final', 'desc')->whereMonth('pos_itemlist.created_at', '=', $currentMonth)->whereYear('pos_itemlist.created_at', '=', $currentYear)->limit(5)->get();

        if($productByPrice->isEmpty()) {

            $productByPriceChart = app()->chartjs
            ->name('productByPriceChart')
            ->type('horizontalBar')
            ->size(['width' => 400, 'height' => 200])
            ->labels([])
            ->datasets([
                [
                    "label" => "",
                    'backgroundColor' => "rgba(38, 185, 154, 0.31)",
                    'borderColor' => "rgba(38, 185, 154, 0.7)",
                    "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                    "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                    "pointHoverBackgroundColor" => "#fff",
                    "pointHoverBorderColor" => "rgba(220,220,220,1)",
                    'data' => [],
                ],
                [
                    "label" => "",
                    'backgroundColor' => "rgba(38, 185, 154, 0.31)",
                    'borderColor' => "rgba(38, 185, 154, 0.7)",
                    "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                    "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                    "pointHoverBackgroundColor" => "#fff",
                    "pointHoverBorderColor" => "rgba(220,220,220,1)",
                    'data' => [],
                ]
            ])
            ->options([]);

        } else {

            foreach($productByPrice as $products) {
                $productName[] = $products->name;
                $productFinalPrice[] = $products->final;
            }
            
            $productByPriceChart = app()->chartjs
            ->name('productByPriceChart')
            ->type('horizontalBar')
            ->size(['width' => 400, 'height' => 200])
            ->labels($productName)
            ->datasets([
                [
                    "label" => "Price",
                    'backgroundColor' => "rgba(38, 185, 154, 0.31)",
                    'borderColor' => "rgba(38, 185, 154, 0.7)",
                    "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                    "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                    "pointHoverBackgroundColor" => "#fff",
                    "pointHoverBorderColor" => "rgba(220,220,220,1)",
                    'data' => $productFinalPrice,
                ]
            ])
            ->options([]);
        }

        $productByQuantity = POS::select('pos_itemlist.name', DB::raw('sum(pos_itemlist.qty) as totalQty'))->join('pos_itemlist', 'pos.transaction_id', 'pos_itemlist.transaction_id')->where('pos.store_id', Auth::user()->store_id)->groupBy('pos_itemlist.name')->orderBy('totalQty', 'desc')->whereMonth('pos_itemlist.created_at', '=', $currentMonth)->whereYear('pos_itemlist.created_at', '=', $currentYear)->limit(5)->get();

        if($productByQuantity->isEmpty()) {

            $productByQuantityChart = app()->chartjs
            ->name('productByQuantityChart')
            ->type('horizontalBar')
            ->size(['width' => 400, 'height' => 200])
            ->labels([])
            ->datasets([
                [
                    "label" => "",
                    'backgroundColor' => "rgba(38, 185, 154, 0.31)",
                    'borderColor' => "rgba(38, 185, 154, 0.7)",
                    "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                    "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                    "pointHoverBackgroundColor" => "#fff",
                    "pointHoverBorderColor" => "rgba(220,220,220,1)",
                    'data' => [],
                ],
                [
                    "label" => "",
                    'backgroundColor' => "rgba(38, 185, 154, 0.31)",
                    'borderColor' => "rgba(38, 185, 154, 0.7)",
                    "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                    "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                    "pointHoverBackgroundColor" => "#fff",
                    "pointHoverBorderColor" => "rgba(220,220,220,1)",
                    'data' => [],
                ]
            ])
            ->options([]);

        } else {
            foreach($productByQuantity as $productbyQuantity)
            {
                $sm_productByQty[] = $productbyQuantity->name;
                $sm_totalProductQty[] = $productbyQuantity->totalQty;
            }
            
            $productByQuantityChart = app()->chartjs
            ->name('productByQuantityChart')
            ->type('horizontalBar')
            ->size(['width' => 400, 'height' => 200])
            ->labels($sm_productByQty)
            ->datasets([
                [
                    "label" => "Quantity",
                    'backgroundColor' => "rgba(38, 185, 154, 0.31)",
                    'borderColor' => "rgba(38, 185, 154, 0.7)",
                    "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                    "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                    "pointHoverBackgroundColor" => "#fff",
                    "pointHoverBorderColor" => "rgba(220,220,220,1)",
                    'data' => $sm_totalProductQty,
                ]
            ])
            ->options([]);
        }

        $topSellingPartners = POS::select('brands.name', DB::raw('sum(pos_itemlist.final_price) as totalPrice'))->join('pos_itemlist', 'pos.transaction_id', 'pos_itemlist.transaction_id')->join('brands', 'pos_itemlist.brand_id', 'brands.id')->where('pos.store_id', Auth::user()->store_id)->groupBy('brands.name')->orderBy('totalPrice', 'desc')->whereMonth('pos.created_at', '=', $currentMonth)->whereYear('pos.created_at', '=', $currentYear)->limit(5)->get();

        $grand_total = POS::where('store_id', Auth::user()->store_id)->whereMonth('created_at', $currentMonth)->sum('amount');
        return view('sm.filter.dashboard', compact('chartjs', 'productByPriceChart', 'productByQuantityChart', 'topSellingPartners'), ['currentMonth' => $currentMonth, 'currentYear' => $currentYear, 'month' => $month, 'grand_total' => $grand_total, 'year' => $year]);
    }

    public function partner()
    {

        $brand = Brand::where('user_id', Auth::user()->id)->first();

        $totalPrice = pos_itemlist::select('brand_id', 'name', DB::raw('SUM(final_price) as final'), DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d") as date'))->where('brand_id', $brand->id)->groupBy('name', 'brand_id', 'date')->orderBy('date', 'asc')->get();


        if($totalPrice->isEmpty()) {
            $chartjs = app()->chartjs
            ->name('lineChartTest')
            ->type('line')
            ->size(['width' => 400, 'height' => 200])
            ->labels([])
            ->datasets([
                [
                    "label" => "My First dataset",
                    'backgroundColor' => "rgba(38, 185, 154, 0.31)",
                    'borderColor' => "rgba(38, 185, 154, 0.7)",
                    "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                    "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                    "pointHoverBackgroundColor" => "#fff",
                    "pointHoverBorderColor" => "rgba(220,220,220,1)",
                    'data' => [],
                ]
            ])
            ->options([]);
        } else {
            foreach($totalPrice as $total) {
                $date[] = $total->date;
                $total_price[] = $total->final;
            }
            $chartjs = app()->chartjs
            ->name('lineChartTest')
            ->type('line')
            ->size(['width' => 400, 'height' => 200])
            ->labels($date)
            ->datasets([
                [
                    "label" => "Amount",
                    'backgroundColor' => "rgba(38, 185, 154, 0.31)",
                    'borderColor' => "rgba(38, 185, 154, 0.7)",
                    "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                    "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                    "pointHoverBackgroundColor" => "#fff",
                    "pointHoverBorderColor" => "rgba(220,220,220,1)",
                    'data' => $total_price,
                ]
            ])
            ->options([]);
        }

        $productByPrice = pos_itemlist::select('name', DB::raw('max(final_price) as final'))->where('brand_id', $brand->id)->groupBy('name')->orderBy('final', 'desc')->limit(5)->get();

        if($productByPrice->isEmpty()) {

            $productByPriceChart = app()->chartjs
            ->name('productByPriceChart')
            ->type('horizontalBar')
            ->size(['width' => 400, 'height' => 200])
            ->labels([])
            ->datasets([
                [
                    "label" => "",
                    'backgroundColor' => "rgba(38, 185, 154, 0.31)",
                    'borderColor' => "rgba(38, 185, 154, 0.7)",
                    "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                    "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                    "pointHoverBackgroundColor" => "#fff",
                    "pointHoverBorderColor" => "rgba(220,220,220,1)",
                    'data' => [],
                ],
                [
                    "label" => "",
                    'backgroundColor' => "rgba(38, 185, 154, 0.31)",
                    'borderColor' => "rgba(38, 185, 154, 0.7)",
                    "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                    "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                    "pointHoverBackgroundColor" => "#fff",
                    "pointHoverBorderColor" => "rgba(220,220,220,1)",
                    'data' => [],
                ]
            ])
            ->options([]);

        } else {
            foreach($productByPrice as $product)
            {
                $name[] = $product->name;
                $final_price[] = $product->final;
            }
            
            $productByPriceChart = app()->chartjs
            ->name('productByPriceChart')
            ->type('horizontalBar')
            ->size(['width' => 400, 'height' => 200])
            ->labels($name)
            ->datasets([
                [
                    "label" => "Price",
                    'backgroundColor' => "rgba(38, 185, 154, 0.31)",
                    'borderColor' => "rgba(38, 185, 154, 0.7)",
                    "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                    "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                    "pointHoverBackgroundColor" => "#fff",
                    "pointHoverBorderColor" => "rgba(220,220,220,1)",
                    'data' => $final_price,
                ]
            ])
            ->options([]);
        }
 
        $productByQuantity = DB::table('pos_itemlist')
        ->select('name', DB::raw('sum(qty) as totalQty'))
        ->where('brand_id', $brand->id)
        ->groupBy('name')
        ->limit(5)
        ->orderBy('totalQty', 'desc')
        ->get();

        if($productByQuantity->isEmpty()) {

            $productByQuantityChart = app()->chartjs
            ->name('productByQuantityChart')
            ->type('horizontalBar')
            ->size(['width' => 400, 'height' => 200])
            ->labels([])
            ->datasets([
                [
                    "label" => "",
                    'backgroundColor' => "rgba(38, 185, 154, 0.31)",
                    'borderColor' => "rgba(38, 185, 154, 0.7)",
                    "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                    "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                    "pointHoverBackgroundColor" => "#fff",
                    "pointHoverBorderColor" => "rgba(220,220,220,1)",
                    'data' => [],
                ],
                [
                    "label" => "",
                    'backgroundColor' => "rgba(38, 185, 154, 0.31)",
                    'borderColor' => "rgba(38, 185, 154, 0.7)",
                    "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                    "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                    "pointHoverBackgroundColor" => "#fff",
                    "pointHoverBorderColor" => "rgba(220,220,220,1)",
                    'data' => [],
                ]
            ])
            ->options([]);

        } else {
            foreach($productByQuantity as $productbyQuantity)
            {
                $productByQty[] = $productbyQuantity->name;
                $totalProductQty[] = $productbyQuantity->totalQty;
            }
            
            $productByQuantityChart = app()->chartjs
            ->name('productByQuantityChart')
            ->type('horizontalBar')
            ->size(['width' => 400, 'height' => 200])
            ->labels($productByQty)
            ->datasets([
                [
                    "label" => "Quantity",
                    'backgroundColor' => "rgba(38, 185, 154, 0.31)",
                    'borderColor' => "rgba(38, 185, 154, 0.7)",
                    "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                    "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                    "pointHoverBackgroundColor" => "#fff",
                    "pointHoverBorderColor" => "rgba(220,220,220,1)",
                    'data' => $totalProductQty,
                ]
            ])
            ->options([]);
        }

        $brand = Brand::where('user_id', Auth::user()->id)->first();
        $payoutNoti = Notification::where('brand_id', $brand->id)->where('type', 'payout')->orderBy('id', 'desc')->first();
        $messageNoti = Notification::where('brand_id', $brand->id)->where('type', 'message')->orderBy('id', 'desc')->first();
        $rentalNoti = Notification::where('brand_id', $brand->id)->where('type', 'rental')->orderBy('id', 'desc')->first();
        $contractNoti = Notification::where('brand_id', $brand->id)->where('type', 'contract')->orderBy('id', 'desc')->first();
        $restockNoti = Notification::where('brand_id', $brand->id)->where('type', 'restock')->orderBy('id', 'desc')->first();
        $grand_total = pos_itemlist::where('brand_id', $brand->id)->sum('final_price');
        return view('partner.dashboard', compact('chartjs', 'productByPriceChart', 'productByQuantityChart'), ['messageNoti' => $messageNoti, 'payoutNoti' => $payoutNoti, 'rentalNoti' => $rentalNoti, 'grand_total' => $grand_total, 'contractNoti' => $contractNoti, 'restockNoti' => $restockNoti]);
    }

    public function partner_notif($id, Request $request)
    {
        $notif = Notification::findOrFail($id);
        $notif->status = 1;
        $notif->save();
        return response()->json($notif);
    }

    public function supervisor()
    {
        return view('sup.inventory');
    }

    public function manager()
    {
        return view('manager.inventory');
    }

    public function settings()
    {
        $store = Store::findOrFail(Auth::user()->store_id);
        return view('sm.settings', ['store' => $store]);
    }

    public function save_settings($id, Request $request)
    {
        $store = Store::findOrFail($id);
        $store->void_pass = $request->void_pass;
        $store->save();

        return ($store) ? back()->with('success', 'Settings Saved') :
                        back()->with('error', 'There is something wrong');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }
}
