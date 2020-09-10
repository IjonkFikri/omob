<?php

namespace App\Http\Controllers;

use App\Unit;
use App\Level;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function export()
    {
        $units = Unit::all();
        $levels = Level::all();
        return view('admins.export', compact('units', 'levels'));
    }
}
