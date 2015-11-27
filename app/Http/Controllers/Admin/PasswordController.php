<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Validator;
use App\Http\Controllers\Controller;

class PasswordController extends Controller
{
    public $redirectTo = '/';

    public static $validator = [
        'token'     => 'required',
        'email'     => 'required|email',
        'password'  => 'required|confirmed|min:6',
    ];

    public function __construct()
    {
//        $this->middleware('guest');
    }

    public function getEmail()
    {
        return view('auth.password');
    }

    public function postEmail(Request $request)
    {
        $email = $request->only('email');
        $validator = Validator::make(
            array('email' => $email['email']),
            array('email' => 'required|email')
        );
        if ($validator->fails()){
            $this->data['email'] = $email['email'];
            return responseAnswer(true, $this->data, trans('rest.2', ['email' => $email]), 7, $validator->errors());
        }

        $response = Password::sendResetLink($email, function (Message $message) {
            $message->subject($this->getEmailSubject());
        });

        switch ($response) {
            case Password::RESET_LINK_SENT:
                return $this->responseAnswer(false, NULL, trans($response));

            case Password::INVALID_USER:
                $this->data['email'] = $email['email'];
                return $this->responseAnswer(true, $this->data, trans($response), 4);
        }
    }

    protected function getEmailSubject()
    {
        return isset($this->subject) ? $this->subject : trans('passwords.resetlink');
    }

    public function getReset($token = null)
    {
        if (is_null($token)) {
            return $this->responseAnswer(true, NULL, trans('rest.11'), 11);
        }

        return view('auth.reset')->with('token', $token);
    }

    public function postReset(Request $request)
    {
        $credentials = $request->only(
            'email', 'password', 'password_confirmation', 'token'
        );

        $filter = $this->validator($credentials);

        if($filter->fails()){
            return $this->responseAnswer(true, NULL, trans('rest.14'), 14, $filter->errors());
        }

        $response = Password::reset($credentials, function ($user, $password) {
            $this->resetPassword($user, $password);
        });

        switch ($response) {
            case Password::PASSWORD_RESET:
                $this->data = [
                            'authenticated' => true,
                            'role' => Auth::user()->isAdmin ? 'admin' : 'user',
                        ];
                return $this->responseAnswer(false, $this->data, trans($response));

            default:
                $this->data = [
                            'email' => $credentials['email'],
                            'token' => $credentials['token'],
                            'authenticated' => false,
                            'role' => 'guest',
                        ];
                return $this->responseAnswer(true, NULL, trans($response), 1);
        }
    }

    protected function resetPassword($user, $password)
    {
        $user->password = bcrypt($password);

        $user->save();

        Auth::login($user);
    }

    public function validator(array $data)
    {
        return Validator::make($data, self::$validator);
    }
}
