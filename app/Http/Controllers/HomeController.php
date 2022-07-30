<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Services\HomePageServices;

class HomeController extends Controller
{
    public function index(HomePageServices $homePageServices) {
        $user = Auth::user()->load('referred_users', 'expenses_transactions', 'income_transactions');

        $transactions_rows = DB::table('users')
            ->select( DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d") as date'), DB::raw('count(*) as total'))
            ->where('referer_user_id', Auth::id())
            ->groupBy('date')
            ->get()
            ->groupBy('date')
            ->all();
        
        $transactions = $homePageServices->fillTransactionsCountByDays(days: 14, transactions_rows: $transactions_rows);
        return view('home')->with( compact('transactions', 'user') );
    }
}

