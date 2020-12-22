<?php

namespace App\Http\Controllers;

use App\Candidate;
use Illuminate\Http\Request;

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
        
        $candidate = Candidate::all();
        
        $result = [
            'candidatesCount' =>$candidate->count(),
            'candidates' =>$candidate->sortByDesc(function ($product, $key) {
                    return count($product->users);
                }),
        ];
        return view('home',$result);
    }
}