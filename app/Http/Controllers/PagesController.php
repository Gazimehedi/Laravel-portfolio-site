<?php

namespace App\Http\Controllers;

use App\Models\Main;
use App\Models\Team;
use App\Models\About;
use App\Models\Service;
use App\Models\Portfolio;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        $result['main'] = Main::first();
        $result['Services'] = Service::all();
        $result['portfolios'] = Portfolio::all();
        $result['abouts'] = About::all();
        $result['teams'] = Team::all();
        return view('pages.index',$result);
    }


}
