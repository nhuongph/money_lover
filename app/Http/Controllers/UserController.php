<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UpdateRequest;
use App\User;
use Mail;
use DateTime;
use Session;
use File;

class UserController extends Controller {

    public function __construct () {
        $lang = Session::get ('language');
        if ($lang != null) \App::setLocale($lang);
    }
    
    public function getLogin() {
        if (!Auth::check()) {
            return view("User.login");
        } else {
            return redirect('home');
        }
    }

    public function postLogin(UserRequest $request) {
        $login = array(
            'username' => $request->username,
            'password' => $request->password,
            'active' => 'yes',
        );
        if (Auth::attempt($login)) {
            return redirect('home');
        } else {
            return redirect()->back()->withErrors(trans('money_lover.user_err_1'));
        }
    }

    public function getLogout() {
        Auth::logout();
        return redirect('/');
    }

    public function getRegister() {
        return view('User.register');
    }

    public function postRegister(RegisterRequest $request) {
        $data_input = $request->all();
        if ($request->file('avatar')->isValid()) {
            $file = $request->file('avatar');
            $file_type = substr($file->getMimeType(), strrpos($file->getMimeType(), '/') + 1);
            $file_name = str_random('60').'.'. $file_type;
            $path = "uploads";
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $data_input['avatar'] = $path . $file_name;
            $file->move($path, $file_name);
        }

        $token = str_random('60');
        Mail::send('User.createAccount', ['token' => $token], function ($message) use ($data_input) {

            $message->to($data_input['email'])->subject('We have been send your an email to active account.');
        });

        $data_input["active"] = "no";
        $data_input["remember_token"] = $token;
        if (User::create($data_input)) {
            
            Session::flash('message', trans('money_lover.user_mes_1'));
            return redirect()->route('getLogin');
        } else {
            return redirect()->back();
        }
    }

    public function createAccount($token = null) {
//            var_dump($user);
//            exit(0);
        $user = User::where('remember_token', '=', $token)->first();
        if (!isset($user) || $user == "") {
            return redirect('login')->withErrors(
                            trans('money_lover.user_err_2'));
        } else {
            $user['active'] = 'yes';
            $user->save();
            return redirect('login');
        }
    }

    public function getUpdate($username = null) { 
        $user = User::where('username', $username)->first();
        return view('User.update')->with('user', $user);
    }

    public function postUpdate(UpdateRequest $request) {
        $name = $request->username;
        $email = $request->email;
        $check_user = User::where('id', '!=', $request->id)->where(function($q) use($name,$email){
            $q->where('username',$name)->orWhere('email',$email);
        })->get();
        
        if(count($check_user)){
            return redirect()->back()->withErrors(trans('money_lover.user_err_3'));
        }
        
        $user = User::where('id', '=', $request->id)->first();
        $avatar = '';
        if (!empty($request->file('avatar')) && $request->file('avatar')->isValid()) {
            $file_path = $user->avatar;
            if(File::exists($file_path)){
                File::delete($file_path);
            }
            $file = $request->file('avatar');
            $file_type = substr($file->getMimeType(), strrpos($file->getMimeType(), '/') + 1);
            $file_name = str_random('60').'.'. $file_type;
            $path = "uploads";
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $avatar = $path . '/' . $file_name;
            $file->move($path, $file_name);
        }
        if ($avatar == '') {
            User::where('id', '=', Auth::user()->id)->update([
                'username' => $request->username,
                'password' => bcrypt($request->password),
                'email' => $request->email,
                'updated_at' => new DateTime(),
            ]);
        } else {
            User::where('id', '=', Auth::user()->id)->update([
                'username' => $request->username,
                'password' => bcrypt($request->password),
                'email' => $request->email,
                'avatar' => $avatar,
                'updated_at' => new DateTime(),
            ]);
        }
        return redirect('home');
    }

}
