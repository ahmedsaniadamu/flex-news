<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\Posts;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    // overide show login form method
    public function showLoginForm(){   
          //get trending news 
           $trendingNews = Posts::select(['description','category','slug','source' ,'image','created_at']) 
                     ->  where('category','science') -> take(5) -> get() ; 
          //popular news
          $popularNews = Posts::select(['description','category','slug','source' ,'image','created_at']) 
                       ->  orderBy('slug','ASC') -> take(5) -> get() ;  
               
        return view('auth.login',[
            'trendingNews' => $trendingNews ,
            'popularNews'=> $popularNews,
        ]);
    }
}
