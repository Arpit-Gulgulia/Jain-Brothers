<?php


namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function __construct(){
        $this->middleware('guest:admin');
    }

    public function showLoginForm(){
        return view('admin.auth.login');
    }

    public function login(Request  $request){
        // Vadlidate form data
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        // Attempt to log user in
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)){
            // If successful, then redirect to their intended location
            return redirect()->intended(route('admin.dashboard'));
        }

        // If unsuccessful, then redirect to login with form data
        return redirect()->back()->withErrors(['email' => 'These credentials do not match our records.']);
    }

}
