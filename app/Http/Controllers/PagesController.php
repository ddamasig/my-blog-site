<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    // Index function
    public function index() {
        return view('pages.index');
    }
}