<?php

namespace App\Http\Controllers\staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class StaffController extends Controller
{
    public function index(){
        $users = User::all(); // Fetch all users from the database
        $loans = DB::table('loan_request')
        ->join('users', 'loan_request.user_id', '=', 'users.id')
        ->get();
        return view('layouts.staff.index', compact('users','loans'));
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
