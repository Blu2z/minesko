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

    public function getEmail()
    {
        return view('auth.password');
    }

    public function postEmail(Request $request)
    {
        $email = $request->only('email');
        $validator = Validator::make(
            array('email' => $email['email']),
            array('email' => 'required|email|exists:users,email')
        );
        if ($validator->fails()){
            return view('auth.password', ['email' => $email['email'], 'error' => $validator->errors()->toArray()]);
        }

        $response = Password::sendResetLink($email, function (Message $message) {
            $message->subject($this->getEmailSubject());
        });

        switch ($response) {
            case Password::RESET_LINK_SENT:
                return view('auth.success', ['message' => trans($response)]);

            case Password::INVALID_USER:
                return view('auth.password', ['email' => $email['email'], 'message' => trans($response)]);
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
            return view('auth.reset', ['token' => $credentials['token'], 'error' => $filter->errors()->toArray()]);
        }

        $response = Password::reset($credentials, function ($user, $password) {
            $this->resetPassword($user, $password);
        });

        switch ($response) {
            case Password::PASSWORD_RESET:
                return redirect('admin');

            default:
                return view('auth.reset',
                    [
                        'email' => $credentials['email'],
                        'token' => $credentials['token'],
                        'message' => trans($response)
                    ]);
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
