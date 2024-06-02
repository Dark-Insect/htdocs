<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InterfaceController extends Controller
{
    public function interface(){
        return view('layouts.admin.interface');
    }
}
