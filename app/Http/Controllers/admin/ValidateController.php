<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class ValidateController extends Controller
{
    public function validation(){
        return view('layouts.admin.validate');
    }
}
