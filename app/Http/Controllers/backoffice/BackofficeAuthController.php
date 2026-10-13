<?php

namespace App\Http\Controllers\backoffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BackofficeAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('backoffice.auth.login');
    }
}
