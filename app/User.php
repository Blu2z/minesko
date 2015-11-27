<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    protected static $rules = [
        'email'     => 'required|email|unique:users',
        'password'  => 'required|confirmed|min:6',
    ];

    public function register() {
        $this->password = Hash::make($this->password);
        $this->activationCode = $this->generateCode();
        $this->isActive = false;
        $this->save();

        $this->sendActivationMail();

        return $this->id;
    }

    protected function generateCode() {
        return Str::random();
    }

    public function sendActivationMail() {
        $activationUrl = url(
            'user/activate',
            [
                'userId' => $this->id,
                'activationCode'    => $this->activationCode,
            ]
        );

        $that = $this;
        Mail::send('emails/activation',
            array('activationUrl' => $activationUrl),
            function ($message) use($that) {
                $message->to($that->email)->subject('Thank you for registering!');
            }
        );
    }

    public function activate($activationCode) {
        if ($this->isActive) {
            return false;
        }

        if ($activationCode != $this->activationCode) {
            return false;
        }

        $this->activationCode = '';
        $this->isActive = true;
        $this->save();

        return true;
    }
}
