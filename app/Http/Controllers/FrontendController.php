<?php

namespace CMSTutorial\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    /**
     * Show the welcome / landing page
     *
     * @return view 
     */
    public function welcome() {

        return view('welcome');
    }
}
