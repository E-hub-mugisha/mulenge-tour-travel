<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\Tour;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function home()
    {
        $locations = Location::all();
        $tours = Tour::all();
        return view('pages.home', compact('locations', 'tours'));
    }
    public function tourPage()
    {
        $tours = Tour::all();
        return view('pages.tour', compact('tours'));
    }
}
