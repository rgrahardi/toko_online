<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
 
class SupplierController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('supplier.home', compact('user'));
    }
}
