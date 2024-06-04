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
    public function transaction($id){
        $data = DB::table('loan_request')
        ->join('users', 'loan_request.user_id', '=', 'users.id')
        ->where('loan_id', $id)
        ->first();

        $loan_term = $data->loan_term;
        $term = "";
        switch($loan_term)
        {
            case 0.30:
                $term = "3 Months";
                break;
            case 0.60:
                $term = "6 Months";
                break;
            case 0.90:
                $term = "9 Months";
                break;
            case 1:
                $term = "12 Months";
                break;
        }
        return view('layouts.admin.transaction',compact('data','term','id'));
    }
}
