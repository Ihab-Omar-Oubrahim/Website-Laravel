<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EditAccountRoutes extends Controller
{
    public function Edit_Account(){
        return view ('Potato.Account.edit-Account-Info');
    }
}
