<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BerandapageController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }
}
