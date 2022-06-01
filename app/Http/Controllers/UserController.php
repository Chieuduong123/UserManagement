<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequests;
use App\Http\Requests\RegisterRequests;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use PHPMailer\PHPMailer\PHPMailer;

class UserController extends Controller
{
    function getRegister()
    {
        return view('/register');
    }

    function postRegister(RegisterRequests $request)
    {
        $data = [
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ];
        $email = $request->email;
        $user = User::create($data);
        auth()->login($user);

        $phpMailer = new PHPMailer(true);
        $phpMailer->SMTPDebug = 0;
        $phpMailer->isSMTP();
        $phpMailer->Host = env('EMAIL_HOST');
        $phpMailer->SMTPAuth = true;
        $phpMailer->Username = env('EMAIL_USERNAME');
        $phpMailer->Password = env('EMAIL_PASSWORD');
        $phpMailer->SMTPSecure = 'ssl';
        $phpMailer->Port = 465;
        $phpMailer->setFrom('anhd10315@gmail.com', 'anhduong');
        $phpMailer->addAddress($email);
        $phpMailer->isHTML(true);
        $phpMailer->Subject = 'Email verification';
        $phpMailer->Body = "<h2>You have Register! Welcome to here!</h2>";
        $phpMailer->send();

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

    function postLogin(LoginRequests $request)
    {
        $name = $request['name'];
        $password = $request['password'];

        if (Auth::attempt(['name' => $name, 'password' => $password])) {
            return redirect('/managers');
        } else {
            Session::flash('error', 'Email hoặc mật khẩu không đúng!');
            return redirect('/login');
        }
    }
}
