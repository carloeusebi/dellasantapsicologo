<?php

namespace App\Http\Controllers;

class TemplatesController extends Controller
{
    public function index()
    {
        return view('templates.index');
    }
}
