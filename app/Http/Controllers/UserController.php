<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Hash;
use DB;

use App\Models\User;

class UserController extends Controller
{
    
    public function index()
    {
        return view('userpanel.dashboard.index');
    }


    public function getUsers()
    {
        $users = array();

        $users = DB::table('users')
                    ->select('users.*', 'roles.id as rid')
                    ->join('roles', 'roles.id', '=', 'users.role_id')
                    ->where('roles.is_admin', 0)
                    ->orderBy('users.id', 'DESC')
                    ->paginate(10);
        
        return view('adminpanel.users.index', compact('users'));
    }


    public function createUser()
    {
        return view('adminpanel.users.create');
    }


    public function saveUser(Request $request)
    {
        $validUser  = null;
        $validUser  = $request->validate([
            'username' => 'required|min:4',
            'email' => 'required|unique:users',
            'password' => 'required|min:6'
        ]);

        $user = new User;
        $user->username = $validUser['username'];
        $user->password = Hash::make($validUser['password']);
        $user->email = $validUser['email'];

        if($user->save()) {
            return redirect()->back()->with('successMessage', 'user saved successfully'); 
        } else {
            return redirect()->back()->with('errorMessage', 'something wrong to save user');   
        }
    }


    public function editUser($id)
    {
        $user = User::findOrFail($id);
        return view('adminpanel.users.edit', compact('user'));
    }


    public function updateUser(Request $request)
    {
        $validUser  = $id =  null;
        $id = $request->id;

        $validUser  = $request->validate([
            'username' => 'required|min:4',
            'email' => 'required|unique:users,email,'.$id,
        ]);

        $user = User::findOrFail($id);
        $user->username = $validUser['username'];
        $user->email = $validUser['email'];

        if($user->save()) {
            return redirect()->back()->with('successMessage', 'user update successfully'); 
        } else {
            return redirect()->back()->with('errorMessage', 'something wrong to update user');   
        }
    }


    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        if($user->delete()) {
            return redirect()->back()->with('successMessage', 'user delete successfully'); 
        } else {
            return redirect()->back()->with('errorMessage', 'something wrong to delete user');   
        }
    }
}
