<?php

namespace App\Http\Controllers;

use App\Mail\UserVerification;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public $controller = "RegisterController"; //Controller Name
    public function index(Request $request) {
        /**
         *
         */
        return view("create");

    }

    public function create(Request $request){
        /**
         *
         */

        if($request->isMethod("post")){
            $request->validate(User::rules());

            $data = $request->all();
            $data['password'] = bcrypt($data['password']);
            $data["token"] = Str::random(32);
            if($user = User::create($data)){
                echo (new UserVerification($user))->render(); die;
                Mail::to($data['email'])->send(new UserVerification($user));
                return redirect("/");
            }

        }
        return view("create");

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function checkEmail(Request $request){
        $email = $request->input('email');
        $isExists = User::where('email',$email)->first();
        if($isExists){
            return response()->json(array("exists" => true));
        }else{
            return response()->json(array("exists" => false));
        }
    }

    public function verify($token) {
        $token = User::where("token", $token)->first();
        if($token){
            $token->update(["status" => 1]);
           return redirect("login");
        } else {
            echo "Invalid link";
        }
    }

    public function login(Request $request) {
        if($request->isMethod("post")){
        #    $request->validate(User::rules());
            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {
                // Authentication passed...
                return redirect()->intended('dashboard');
            }

        }
        return view("login");
    }

    public function dashboard() {
        return view("dashboard");
    }
}
