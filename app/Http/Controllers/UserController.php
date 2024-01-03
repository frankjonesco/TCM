<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;

use Illuminate\Http\Request;
use Butschster\Head\Facades\Meta;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{


    // VIEW LOGIN FORM

    public function viewLogin() : View
    {
        Meta::setTitle('Log in - '.config('app.name'));

        return view('users/login', [
            'pageHeadings' => [
                'Login',
                'Log in to manage your content.' 
            ]
        ]);

    }




    // AUTHENTICATE USER FOR LOGIN

    public function authenticate(Request $request) : RedirectResponse
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);


        $user = User::where('email', $request->username)->orWhere('username', $request->username)->first();


        if(empty($user))
            return back()->withErrors(['email' => 'Invalid credentials.'])->onlyInput('email');
        
        

        if(
            auth()->attempt(['email' => $user->email, 'password' => $request->password]) || 
            auth()->attempt(['username' => $user->username, 'password' => $request->password])
        ){                
            $request->session()->regenerate();
            return redirect('/admin')->with('toast', 'Welcome back!');
        }

        return back()->withErrors(['email' => 'Invalid credentials.'])->onlyInput('email');

    }




    // LOG USER OUT AND DESTRY SESSION

    public function logout(Request $request) : RedirectResponse
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('toast', 'You are logged out.');

    }




// END OF CLASS

}
