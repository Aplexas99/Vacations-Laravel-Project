<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/vacation-requests';

    public function __construct()
    {
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {    
        $email = $request->email;
        $password = $request->password;

        $employee = Employee::where('email', $email)->where('password', $password)->first();

        if ($employee) {
            session(['employee' => $employee]);
            return redirect()->route('vacationRequests');
        } else {
            return redirect()->route('login')->with('error', 'Invalid credentials');
        }

    }

    protected function authenticated(Request $request, $employee)
    {
        if ($employee->role_id == 1) {
            return redirect()->route('vacationRequests');
        } else {
            return redirect()->route('/');
        }
    }

    public function logout(Request $request)
    {

        return redirect('/');
    }

    protected function guard()
    {
        
    }
}
