<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\Models\User;

class AdminController extends Controller
{
    

    public function index()
    {
        return view('adminpanel.dashboard.index');
    }


    public function switch($id)
    {
        $user = User::findOrFail($id);
        Auth::login($user);
        return redirect()->route('user.index');
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        //
    }
}
