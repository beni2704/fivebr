<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Gig;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \Illuminate\Foundation\Auth\AuthenticatesUsers;

class UserController extends Controller
{
    //
    public function home(Request $request)
    {
        $categories = Category::where('isPopular', 'LIKE', '1')->get();
        $gigs = Gig::with('user')->orderBy('id','DESC')->paginate(5);
        if ($request->ajax()) {
    		$view = view('data',compact('gigs'))->render();
            return response()->json(['html'=>$view]);
        }
        return view('home', compact('categories','gigs'));
    }

    public function register()
    {
        return view('register');
    }

    public function login()
    {
        return view('login');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->profile_picture = "pp.png";
        $user->save();
        return redirect('/login');
    }

    public function authLogin(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password],$request->remember)) {
            
            return redirect()->intended('/');
        }else{
            return redirect('/login')->with('failed', 'Invalid Credentials');
        }
    }

    public function logout(Request $request){
        Auth::logout();
        
        return redirect('/');
    }
}
