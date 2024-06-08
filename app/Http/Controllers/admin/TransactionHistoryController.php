<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Mail\LoanApproved as LoanApprovedNotifications;
use App\Mail\DeclineLoanNotifications as DeclineLoanNotification;
use Illuminate\Support\Facades\Mail;

class TransactionHistoryController extends Controller
{
    public function transaction(){
       
        return view('layouts.admin.transaction');
    }
}
