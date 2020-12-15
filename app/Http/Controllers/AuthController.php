<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function loginForm(){

    	return view('cabinet');
		}

		public function login(Request $request){
			$this->validate($request, [
					'login' => 'required',
					'password' => 'required'
			]);

			$res = Auth::attempt([
					'name' => $request->get('login'),
					'password' => $request->get('password')
			]);
			if($res){
				return redirect('/admin');
			}
			return redirect()->back()->with('status', 'Неправильный логин или пароль');
		}
}
