<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class ArchiveController extends Controller
{
    public function archive()
{   
    $users = User::all(); 
    return view('layouts.admin.archive',compact('users'));
} public function restore($id){
    $user = User::findOrFail($id);
        // Assuming you have a column named 'role' in your users table
        $user->role = 'member'; // Change 'user' to the desired role you want to update to
        $user->save();
        $firstName = $user->first_name;

        session()->flash('success', "User $firstName archive successfully!.");

        return redirect()->route('admin.archive', compact('firstName'));
}

}
