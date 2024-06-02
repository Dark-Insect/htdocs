<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class PersonalInformationController extends Controller
{
    public function personal($id){
        $user = User::findOrFail($id);
        $address = explode(', ',$user->permanent_address);
        $street = $address[0];
        $barangay = $address[1];
        $city = $address[2];
        $province = $address[3];

        return view('layouts.admin.personal', compact('user','street','barangay','city','province'));
    }
}
