<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $user = \Auth::user();
        return view('home' , [
            'user'  => $user
        ]);
    }
}
