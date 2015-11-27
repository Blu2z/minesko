<?php

namespace App\Http\Controllers\Admin;

use View;
use Auth;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Response;
use DB;

class UserController extends Controller {

    public function getRegister() {
        return View::make('users/register');
    }

    public function postRegister() {
        $email = Input::get('email');

        $filter = $this->validateRegisterEmail($email);
        if($filter){
            return $filter;
        }

        $filter = $this->validatePassword();
        if($filter){
            return $filter;
        }

        $user = new User();
        $user->fill(Input::all());
        $id = $user->register();

        $this->data = [ 'authenticated' => false, 'role' => 'guest', ];

        return $this->responseAnswer(false, $this->data, trans('rest.register'));
    }

    public function getActivate($userId = null, $activationCode = null) {
        $user = User::find($userId);
        if (!$user) {
            $this->data = [ 'authenticated' => false, 'role' => 'guest', ];
            return $this->responseAnswer(true, $this->data, trans('rest.4'), 4);
        }

        if ($user->activate($activationCode)) {
            Auth::login($user);
            $this->data = [ 'authenticated' => true, 'role' => Auth::user()->isAdmin ? 'admin' : 'user' ];
            return $this->responseAnswer(false, $this->data, trans('rest.activate'));
        }

        $this->data = [ 'authenticated' => false, 'role' => 'guest', ];
        return $this->responseAnswer(true, $this->data, trans('rest.13'), 13);
    }

    public function getLogin()
    {
        if(Auth::check()){
            return redirect('admin/users');
        } else {
            return View::make('login');
        }
    }

    public function postLogin() {
        $email = Input::get('email');
        $password = Input::get('password');

        $filter = $this->validateEmail($email);
        if($filter){
            return $filter;
        }

        $user = DB::table('users')->where('email', $email)->first();

        if($user == NULL) {
            $this->data['code'] = 4;
            $this->data['message'] = trans('rest.4');
            $this->data['data']['authenticated'] = false;
            $this->data['data']['role'] = 'guest';
        } elseif ($user->isActive) {
            if (Auth::attempt(['email' => $email, 'password' => $password, 'isActive' => 1, 'role' => 1], Input::has('remember'))) {
                $this->data['message'] = trans('rest.successfully');
                $this->data['data']['authenticated'] = true;
                $this->data['data']['role'] = Auth::user()->role ? 'admin' : 'user';
                $this->data['data']['user'][] = Auth::user();
            } else {
                $this->data['code'] = 3;
                $this->data['message'] = trans('rest.3');
                $this->data['data']['authenticated'] = false;
                $this->data['data']['role'] = 'guest';
            }
        } else {
            $this->data['code'] = 5;
            $this->data['message'] = trans('rest.5');
            $this->data['data']['authenticated'] = false;
            $this->data['data']['role'] = 'guest';
        }

        return !isset($this->data['code']) ?
            redirect('admin/users')
        :
            view('login', ['errors' => $this->data['message']]);
    }

    public function getLogout() {
        Auth::logout();
        return redirect('/');
    }

    public function getStatus() {
        $this->data['data']['authenticated'] = Auth::check();
        if($this->data['data']['authenticated']){
            $this->data['data']['role'] = Auth::user()->isAdmin ? 'admin' : 'user';
        } else {
            $this->data['data']['role'] = 'guest';
        }

        return $this->responseAnswer(false, $this->data);
    }

    protected function validateRegisterEmail($email) {
        $validator = Validator::make(
            ['email' => $email],
            ['email' => 'required|email|unique:users']
        );
        if ($validator->fails()) {
            $this->data['data'] = [ 'authenticated' => false, 'role' => 'guest', ];
            return $this->responseAnswer(true, $this->data['data'], trans('rest.10'), 10, $validator->errors());
        } else {
            return false;
        }
    }
    
    protected function validateEmail() {
        $email = Input::get('email');
        $validator = Validator::make(
            ['email' => $email],
            ['email' => 'required|email']
        );
        if ($validator->fails()) {
            $this->data = [
                    'authenticated' => false,
                    'role' => 'guest',
                ];
            return $this->responseAnswer(true, $this->data, trans('rest.2', ['email' => $email]), 2, $validator->errors());
        } else {
            return false;
        }
    }

    protected function validatePassword() {
        $rules = ['password' => User::$validation['password']];
        $validator = Validator::make([
                "_token" => Input::get('_token'),
                "password" => Input::get('password'),
                "password_confirmation" => Input::get('password_confirmation')
            ],
            $rules
        );
        if ($validator->fails()) {
            $this->data = [
                    'authenticated' => false,
                    'role' => 'guest',
                ];
            return $this->responseAnswer(true, $this->data, trans('rest.8'), 8, $validator->errors());
        } else {
            return false;
        }
    }
}