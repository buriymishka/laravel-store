<?php

namespace App\Http\Controllers;

use App\Info;
use App\Mail\AdminEmail;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public function sendAdmin(Request $request){
    	$this->validate($request, [
    			'name' => 'required',
    			'email' => 'required|email',
    			'text' => 'required'
			]);
			$admin = Info::first();
			$mail = $request;

			$headers = "MIME-Version: 1.0" . PHP_EOL .
					"Content-Type: text/html; charset=utf-8" . PHP_EOL .
					'From: <'.$mail->email.'>' . PHP_EOL .
					'Reply-To: '.$mail->email.'' . PHP_EOL;

			mail($admin->email, 'Konso', $mail->text, $headers );

//			\Mail::to($admin->email)->send(new AdminEmail($mail));

			return redirect()->back()->with('success', 'Письмо отпралено');
		}
}
