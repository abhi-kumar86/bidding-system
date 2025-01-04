<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function homepage($id)
    {
        return view('welcome', ['id' => $id]);
    }
}
