<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GuestBook_Model;

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
        $mGBook = new GuestBook_Model();
        $count  = $mGBook->count();
        $data   = ["total" => $count];
        return view('home', $data);
    }
}
