<?php

namespace App\Http\Controllers\member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AccountSettingsController extends Controller
{
    public function account_settings(){

        $users = User::all();
        return view('layouts.member.account-settings', compact('users'));
    }
}
