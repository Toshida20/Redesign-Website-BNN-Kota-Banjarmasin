<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class PegawaiController extends Controller
{
    public function index()
    {
        return view('admin.pegawai.index');
    }
}
