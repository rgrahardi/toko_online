<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $role = Auth::user()->roles;
        if($role == "admin"){
            return redirect()->to('admin');
        } else if($role == "supplier"){
            return redirect()->to('supplier');
        } else {
            return redirect()->to('logout');
        }
    }
}
