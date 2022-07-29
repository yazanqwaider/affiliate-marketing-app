<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index() {
        $user = Auth::user()->load('referred_users', 'expenses_transactions', 'income_transactions');

        $transactions_rows = DB::table('users')
            ->select( DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d") as date'), DB::raw('count(*) as total'))
            ->where('referer_user_id', Auth::id())
            ->groupBy('date')
            ->get()
            ->groupBy('date')->all();
        

        $transactions = [];
        $current = now()->subWeeks(2);
        for ($day=0; $day < 14; $day++) {
            $date = $current->addDay(1)->format('Y-m-d');
            if(array_key_exists($date, $transactions_rows)) {
                $transactions[$date] = $transactions_rows[$date][0]->total;
            }
            else {
                $transactions[$date] = 0;
            }
        }

        return view('home')->with( compact('transactions', 'user') );
    }
}
