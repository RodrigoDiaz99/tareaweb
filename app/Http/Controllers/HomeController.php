<?php

namespace App\Http\Controllers;

//use App\Article;
use App\Models\Book;
use App\Models\Conference;
use App\Models\Contentevent;
use App\Models\User;
use App\Models\video;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
   
    public function index()
    {
        if(auth()->user()->getRoleNames()[0] == 'Super-Admin' || auth()->user()->getRoleNames()[0] == 'Admin'){
            //if(auth()->getRoleNames == "") {}
            $users_count = User::count();
            $users = User::all();

            $books_count = Book::count();
            $books = Book::all();

            //$articles_count = Article::count();
            $videos_count = video::count();
            $videos = video::all();

            $conference_count = Conference::count();
            $conference = Conference::all();
           // $events_count = Contentevent::count();
            
            return view('dashboards.dashboard_admin', compact('users_count','books_count','videos_count','users','conference_count'));
        }else {
            //if(auth()->getRoleNames == "") {}
            $users_count = User::count();
            $users = User::all();

            $books_count = Book::count();
            $books = Book::all();

            //$articles_count = Article::count();
            $videos_count = video::count();
            $videos = video::all();

            $conference_count = Conference::count();
            $conference = Conference::all();
          
            
            return view('dashboards.dashboard_user', compact('users_count','books_count','videos_count','users','conference_count'));
        }
    }
    public function video(){

        
    }
}
