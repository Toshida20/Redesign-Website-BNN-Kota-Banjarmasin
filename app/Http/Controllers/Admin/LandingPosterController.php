<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class LandingPosterController extends Controller
{
    public function index()
    {
        return view('admin.landing-poster.index');
    }
}
