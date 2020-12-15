<?php

namespace App\Http\Controllers\Admin;


use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function logout(){
    	Auth::logout();
    	return redirect('/');
		}

		public function changePasswordForm(){

    	return view('admin.password.index');
		}

		public function changePassword(Request $request){
			$user = Auth::user();
			$this->validate($request,[
					'login' => 'required',
					'password1' => 'min:1|required_with:password2|same:password2',
					'password2' => 'min:1'
			]);
			$user->name = $request->get('login');
			$user->password = bcrypt($request->get('password1'));
			$user->save();

			return redirect()->back()->with('success', 'Успешно!');
		}
}
