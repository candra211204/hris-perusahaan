<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Read data from table
    public function index() {
        $date = Carbon::now();

        return view('homepage', compact('date'));
    }
}
