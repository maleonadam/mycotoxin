<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class ConfirmationController extends Controller
{

    public function index()
    {
        if (! Session::has('success-message')) {
            return redirect()->route('allproducts');
        }
        
        return view('manage.confirmation.index');
    }
}
