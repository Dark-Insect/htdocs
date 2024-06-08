<?php

namespace App\Http\Controllers\staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class StaffController extends Controller
{
    public function index(){
        return view('layouts.staff.index');
    }
    public function interface(){
        return view('layouts.staff.interface');
    }
    public function print($id){
        $user = User::findOrFail($id);
        $address = explode(', ',$user->permanent_address);
        $street = $address[0];
        $barangay = $address[1];
        $city = $address[2];
        $province = $address[3];
        return view('layouts.staff.print',compact('user','street','barangay','city','province'));
    }
}
