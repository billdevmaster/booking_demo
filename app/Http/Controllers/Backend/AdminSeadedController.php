<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use App\Models\Bookings;

class AdminSeadedController extends Controller
{
    //
    public function index(Request $request)
    {
        $menu = "seaded";
        return view('backend.seaded.index', compact("menu"));
    }

}