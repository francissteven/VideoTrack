<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VideojsController extends Controller
{
    public function index()
    {
        return view('videojs');
    }
}
