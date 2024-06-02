<?php

namespace App\Http\Controllers\staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index(){
        return view('layouts.staff.index');
    }
    public function interface(){
        return view('layouts.staff.interface');
    }
}
