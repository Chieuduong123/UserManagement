<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use PHPMailer\PHPMailer\PHPMailer;

class UserController extends Controller
{
    function getRegister()
    {
        return view('/register');
    }

    function postRegister(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|string',
        ]);
        $email = $request->email;
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        auth()->login($user);

        require 'PHPMailer/vendor/autoload.php';
        require 'PHPMailer/PHPMailer.php';

        $PHPMailer = new PHPMailer(true);

        $PHPMailer->SMTPDebug = 0;
        $PHPMailer->isSMTP();
        $PHPMailer->Host = 'smtp.gmail.com';
        $PHPMailer->SMTPAuth = true;
        $PHPMailer->Username = 'anhd10315@gmail.com';
        $PHPMailer->Password = 'vwsypottasjcjkwx';
        $PHPMailer->SMTPSecure = 'ssl';
        $PHPMailer->Port = 465;
        $PHPMailer->setFrom('anhd10315@gmail.com', 'anhduong');
        $PHPMailer->addAddress($email);
        $PHPMailer->isHTML(true);
        $PHPMailer->Subject = 'Email verification';
        $PHPMailer->Body = "<h2>You have Register! Welcome to here!</h2>";
        $PHPMailer->send();
        if ($user) {
            Session::flash('success', 'Register Successfull!');
            return redirect('/login');
        } else {
            Session::flash('error', 'Register Fail!');
            return redirect('/register');
        }
    }

    function getLogin()
    {
        return view('/login');
    }

    function postLogin(Request $request)
    {
        $rules = [
            'name' => 'required',
            'password' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);


        if ($validator->fails()) {
            return redirect('login')->withErrors($validator)->withInput();
        } else {
            $name = $request->input('name');
            $password = $request->input('password');

            if (Auth::attempt(['name' => $name, 'password' => $password])) {
                return redirect('/managers');
            } else {
                Session::flash('error', 'Email hoặc mật khẩu không đúng!');
                return redirect('/login');
            }
        }
    }
}
