<?php

namespace App\Http\Controllers;

use App\Models\EmployeeModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function set(){
        return redirect(route('showLogin'));
    }

    public function loginPage(){
        return view('interface.loginPage');
    }

    public function registerPage(){
        return view('interface.reg');
    }

    public function registerNew(Request $request){
        $request->validate([
            'fname' => 'required|max:50',
            'lname' => 'required|max:50',
            'position' => 'required|max:50',
            'address' => 'required',
            'contactNum' => 'required|max:20',
            'username' => 'required|max:100',
            'password' => 'required'
        ]);

        EmployeeModel::create([
            'e_fname' => $request->fname,
            'e_lname'=> $request->lname,
            'position' => $request->position,
            'e_address' => $request->address,
            'e_contact_number' => $request->contactNum,
            'e_username' => $request->username,
            'e_password' => hash::make($request->password)
        ]);

        return redirect(route('showLogin'));
        
    }

    public function login(Request $request){
        $request->validate([
            'username' => 'required|max:50',
            'pass' => 'required'
        ]);
        //Hash::check($request->pass,$user->e_password);
        $user = EmployeeModel::where('e_username', '=', $request->username)->first();

        if($user){
            if(Hash::check($request->pass,$user->e_password)){
                $request->session()->put('loginId', $user->id);
                $request->session()->regenerate();
                return redirect(route('dashboard.index'));
            }else{
                return back()->with('fail', 'Incorrect Password');
            }
        }else{
            return back()->with('fail', 'Invalid Username');
        }
        return $user;
    }

    public function logout(Request $request){
        $request->session()->invalidate();
        $request->session()->flush();
        return redirect(route('showLogin'));
    }
}
