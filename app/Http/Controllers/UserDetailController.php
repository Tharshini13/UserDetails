<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserDetail; 

class UserDetailController extends Controller
{
    public function loadUsers() {
        $users = UserDetail::all();
        return view('users', compact('users')); 
    }
    

    public function AddUser(Request $request) {
        $request->validate([
            'name' => "required|string",
            'dob' => "required|date",
            'gender' => "required|string",
            'course' => "required|string",
        ]);
    
        try {
            $user = new UserDetail;
            $user->name = $request->name;
            $user->dob = $request->dob;
            $user->gender = $request->gender;
            $user->course = $request->course;
    
            $user->save();
    
            return redirect()->back()->with('success', 'User Added successfully');
    
        } catch (\Exception $e) {
            return redirect()->back()->with('fail', 'Error to add data: ' . $e->getMessage());
        }
    }

    
    public function dashboard()
    {
        $users = UserDetail::all(); 
        return view('dashboard', compact('users')); 
    }
}