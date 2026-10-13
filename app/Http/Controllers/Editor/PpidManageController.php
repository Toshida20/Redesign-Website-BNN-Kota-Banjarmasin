<?php

namespace App\Http\Controllers\Editor;

use App\Http\Controllers\Controller;

class PpidManageController extends Controller
{
    public function index()
    {
        return view('editor.ppid.index');
    }
}
