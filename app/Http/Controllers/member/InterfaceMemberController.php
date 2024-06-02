<?php

namespace App\Http\Controllers\member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InterfaceMemberController extends Controller
{
    public function interface(){
        return view('layouts.member.interface');
    }
}
