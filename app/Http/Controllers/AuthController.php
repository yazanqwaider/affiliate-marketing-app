<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Database\Seeders\CategorySeeder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;

class AuthController extends Controller
{
    public function viewRegister(Request $request) {
        $referer_user = null;
        if($request->ref) {
            $ref = base64_decode($request->ref);
            $referer_user = User::find($ref);
            $referer_user?->increment('referral_views');
        }

        return view('auth.register')->with( compact('referer_user') );
    } 


    /**
     * @param RegisterRequest $request
     */
    public function register(RegisterRequest $request) {
        $user_role = Role::whereRole("user")->first();

        $image = null;
        if($request->hasFile('image')) {
            $image = $request->file('image')->store('users');
        }

        DB::beginTransaction();
        try {
            $user = $user_role->users()->create(
                $request->only('name', 'email', 'phone', 'birthdate', 'referer_user_id', 'password')
                +
                ["image" => $image]
            );
            $user->referer_user?->increment('referral_registrations');

            $categorySeeder = new CategorySeeder($user);
            $categorySeeder->run();

            Auth::loginUsingId($user->id);
            DB::commit();
        } catch (Exception $exception) {
            DB::rollback();
            Storage::delete($image);
            Log::error($exception);
            return redirect()->back()->with(['messageStatus' => 'danger', 'message' => 'Opps, There are errors !']);
        }
      
        return redirect()->route('home');
    }


    /**
     * 
     * @param LoginRequest $request
     */
    public function login(LoginRequest $request) {
        $user = User::whereEmail($request->email)->first();

        if($user && Hash::check($request->password, $user->password)){
            Auth::loginUsingId($user->id);
            return redirect()->route('home');
        }

        return redirect()->back()->withInput()->withErrors(["Email or password is invalid !"]);
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('home');
    }
}
