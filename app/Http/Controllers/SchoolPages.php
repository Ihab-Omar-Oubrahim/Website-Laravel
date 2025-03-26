<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SchoolPages extends Controller
{
    public function Ordiciel()
    {
        return view('Potato.Pages.School_Pages.Ordiciel');
    }
    public function IFPS()
    {
        return view('Potato.Pages.School_Pages.IFPS');
    }
    public function Safwa()
    {
        return view('Potato.Pages.School_Pages.Al_Safwa');
    }
}
