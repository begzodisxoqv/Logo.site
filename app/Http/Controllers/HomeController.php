<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Pages;
use App\Models\Team;
use App\Models\Portfolio;
use App\Models\Pricing;
use Illuminate\Http\Request;
use App\Models\Services;

class HomeController extends Controller
{
    public function index ()
    {
        $abouts = About::all();
        $pricing = Pricing::all();
        $services = Services::all();
        $pages = Pages::all();
        $portfolio = Portfolio::all();
        $team = Team::all();
        return view('site.index',compact('services','abouts','pages','portfolio','team','pricing'));
    }
    
}
