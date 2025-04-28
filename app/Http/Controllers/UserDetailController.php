<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserDetail; 

class UserDetailController extends Controller
{
    public function loadUsers() {
        $user = auth()->user();
    
        $userDetails = UserDetail::where('user_id', $user->id)->first();
    
        return view('users', compact('userDetails'));
    }
    
    public function AddUser(Request $request) {
        $request->validate([
            'name' => "required|string",
            'dob' => "required|date",
            'gender' => "required|string",
            'course' => "required|string",
        ]);
    
        try {
            $userId = auth()->user()->id;
    
            $user = UserDetail::where('user_id', $userId)->first();
    
            if ($user) {
                $user->name = $request->name;
                $user->dob = $request->dob;
                $user->gender = $request->gender;
                $user->course = $request->course;
                $user->save();
            } else {
                $user = new UserDetail;
                $user->user_id = $userId; 
                $user->name = $request->name;
                $user->dob = $request->dob;
                $user->gender = $request->gender;
                $user->course = $request->course;
                $user->save();
            }
    
            return redirect()->back()->with('success', 'User details saved successfully.');
    
        } catch (\Exception $e) {
            return redirect()->back()->with('fail', 'Error: ' . $e->getMessage());
        }
    }
    
    
    
    public function dashboard()
    {
        $users = UserDetail::all(); 
        return view('dashboard', compact('users')); 
    }

    

    
}