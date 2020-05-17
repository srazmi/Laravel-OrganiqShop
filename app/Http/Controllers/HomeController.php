<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Category;
use App\Model\Product;
use App\Models\Taggables;
use App\User;
use App\Model\Baskets;
use App\Model\Factor;
use App\Model\Posts;
use Carbon\Carbon;
use Spatie\Analytics\Period;
use Analytics;
use App\Library\GoogleAnalytics;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
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
        $users = User::all(); 
        $products = Product::all();
        $baskets = Baskets::orderBy('created_at', 'DESC')
                        ->where('created_at', '>=', Carbon::now()->subMonth())
                        ->get();
                        // dd($baskets);
        $factors = Factor::all();
        $recentfactor = Factor::where('factorstate_id', '=', 2)->get();
        $cash = DB::table('factor')->where('factorstate_id', '=', 2)
                ->Sum('factor.sum');
            
        $BestSold = DB::table('factor')->where('factorstate_id', '=', 2)
            ->leftJoin('factor_product','factor.id','=','factor_product.factor_id')
            ->Join('products','products.id','=','factor_product.product_id')
            ->selectRaw('factor_product.product_id, COALESCE(sum(factor_product.num),0) total')
            ->groupBy('factor_product.product_id')
            ->orderBy('total','desc')
            ->get();
            // dd($BestSold);
            $products=array();
            foreach($BestSold as $product_id)
                {
                    $product=Product::with('category')->where('id',$product_id->product_id)->first();

                    if($product)
                        array_push($products,$product); 
                }
// dd($products);
        $startDate = Carbon::now()->subYear();
        $endDate = Carbon::now();
        //$data = GoogleAnalytics::visitors_and_pageviews();
        //dd($data);exit;
        $analyticsData_one = Analytics::fetchVisitorsAndPageViews(Period::create($startDate, $endDate));
        $dates = $analyticsData_one->pluck('date');
        $visitors = $analyticsData_one->pluck('visitors');
        $pageViews= $analyticsData_one->pluck('pageViews');

        $analyticsData = Analytics::fetchMostVisitedPages(Period::create($startDate, $endDate), 7);
        $url = $analyticsData->pluck('url');
        $pageViews2 = $analyticsData->pluck('pageViews');
        // dd($analyticsData);

        $browserjson = GoogleAnalytics::topbrowsers();
        // dd($browserjson);
        $result = GoogleAnalytics::country();
        $country = $result->pluck('country');
        $country_sessions= $result->pluck('sessions');
        $ceci_ver= config('mycms.ceci_ver');

        $Temp = array(
            'users' => $users,
            'products' => $products,
            'baskets' => $baskets,
            'factors' => $factors,
            'BestSold' => $BestSold,
            'products' => $products,
            'recentfactor' => $recentfactor,
            'cash' => $cash,
            'analyticsData'=>$analyticsData,
            'dates' => $dates,
            'visitors' => $visitors,
            'pageViews' => $pageViews,
            'url' => $url,
            'pageViews2' => $pageViews2,
            'country' => $country,
            'country_sessions' => $country_sessions,
            'browserjson'=>$browserjson,
            'ceci_ver' => $ceci_ver,
        );
           
        return view ("adminhome")->with($Temp);
    }
}
