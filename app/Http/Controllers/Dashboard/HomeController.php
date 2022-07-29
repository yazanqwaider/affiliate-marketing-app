<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index() {
        $users = User::with('expenses_transactions', 'income_transactions')->get();
        return view('dashboard.index')->with( compact('users') );
    }
}
