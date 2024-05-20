<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke(Request $request)
    {
        $page = $request->path() === '/' ? 'home' : request()->path();
        return view($page);
    }
}
