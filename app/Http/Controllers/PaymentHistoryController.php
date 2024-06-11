<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use App\Mail\NewMemberNotifications as NewMemberNotification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class PaymentHistoryController extends Controller
{
    public function payment(){
        $users = User::all(); // Fetch all users from the database
        $loans = DB::table('loan_request')
        ->join('users', 'loan_request.user_id', '=', 'users.id')
        ->get();
        return view('layouts.admin.paymentHistory', compact('users','loans'));
    }
}
