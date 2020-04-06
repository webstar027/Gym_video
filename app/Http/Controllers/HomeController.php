<?php

namespace App\Http\Controllers;
use App\Notifications\RequestAccessNotification;
use Illuminate\Http\Request;
use Notification;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard, gymowner account, student account.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $user = $request->user();

        if ($user->role_id == 2)
        {
            return redirect('/account/gymowner');
        }
        else if ($user->role_id == 3)
        {
            return redirect('/account/student');
        }
        
        return view('home');
    }
       
    /**
     * Show gymowner account.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function gymowner(Request $request)
    {
        $user = $request->user();
        if ($user->role_id == 3)
        {
            return redirect('/account/student');
        }
        return view('gymowneraccount');
        
    }

    /**
     * Show student account.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function student(Request $request)
    {
        $user = $request->user();
        if ($user->role_id == 2)
        {
            return redirect('/account/gymowner');
        }
        return view('memberaccount');
        
    }

    /**
     * Show about.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function about()
    // {
    //     return view('about');
    // }
    // public function studentpage()
    // {
    //     return view('student');
    // }
    // public function pricing()
    // {
    //     return view('pricing');
    // }
    // public function gymownerpage()
    // {
    //     return view('gymowner');
    // }

}
