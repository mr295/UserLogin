<?php

namespace App\Http\Controllers;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use App\User;
use PhpParser\Node\Scalar\MagicConst\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;


class UserController extends Controller{
    public function getIndex(){
        return view('welcome');
    }
    public function getRegister(){
        return view('register');
    }
    public function postRegister(){
        $data=Input::get();
        $rules=[
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|confirmed|min:6'
        ];

        $validator = Validator::make($data,$rules);
        if($validator->passes()){
                
            $user=new User();
            $user->name=Input::get('name');
            $user->email=Input::get('email');
            $user->password=Hash::make(Input::get('password'));
            $user->save();
            return redirect('/login')->with('success','User is created SignIn to continue!');
        }
        else{return redirect('/register')->with('error','Failed to create User!');}

    }
    public function getLogin(){
        return view('login');
    }
    public function postLogin(){
        $email=Input::get('email');
        if(Auth::attempt(['email'=>$email, 'password'=>Input::get('password')])){
            return redirect('/admin')->with('success','Login successful');
        }
        else{
            return redirect('/login')->with('error','Username or password do not match');
        }
    }
    public function getLogout(){
        Auth::logout();
        return redirect('/login')->with('success','You are Logged Out');
    }
    public function getAdmin(){
        $user=Auth::User();
        $data=User::all();
        return view('viewuser')->with('user',$user)
                                ->with('data',$data);
    }
    public function getChangepassword(){
        $user=Auth::User();
        return view('changepassword')->with('user',$user);
    }
    public function postChangepassword(){
        if(Hash::check(Input::get('oldpassword'),Auth::user()->password)) {
            $data = Input::get();
            $rules = [
                
                'password' => 'required|confirmed|min:6'
            ];
            $validator = Validator::make($data, $rules);
            if ($validator->passes()) {
                $data=Auth::user();
                $data->password=Hash::make(Input::get('password'));
                $data->save();
                return redirect('/login')->with('success', 'Password changed Successfully!');
            }
            else{
                return redirect('/changepassword')->with('error', 'Password and Confirm Password donot match OR Password should be minimum of 6 character!');
            }
        }
        else{
            return redirect('/changepassword')->with('error', 'Old Password is not correct!');
        }
    }
     public function getChangeprofile(){
        $user=Auth::User();
        return view('editprofile')->with('user',$user);
    }
    public function postChangeprofile(){
       
                $name=Input::get('name');
                $email=Input::get('email');
                $user=Auth::User();
                $filename=null;
                $file = Input::file('picture');
                if ($file) {
                    $filename = str_random(80) . '.' . $file->guessExtension();
                    $file->move(public_path("/uploads"), $filename);
                }
                $data=Auth::user();
                $data->name=$name;
                $data->email=$email;
                $data->image = $filename;
                $data->save();
                return redirect('/changeprofile')->with('success', 'Profile updated Successfully!');
        }
    
}