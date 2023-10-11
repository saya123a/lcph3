<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;

// Import the required classes at the top of the file
use App\Notifications\CustomResetPasswordNotification;

class ResetPasswordController extends Controller
{
    use ResetsPasswords;

    // Override the sendResetLinkEmail method
    protected function sendResetLinkEmail(Request $request)
    {
        $this->validateEmail($request);

        // We will send the password reset link to this user.
        $user = $this->broker()->getUser($this->credentials($request));

        if ($user && ! $user->isPasswordResetDisabled()) {
            $user->sendPasswordResetNotification(
                $this->broker()->createToken($user)
            );
        }

        return $this->sendResetLinkResponse($request, Password::RESET_LINK_SENT);
    }
}
/**
class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    *

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     *
    protected $redirectTo = RouteServiceProvider::HOME;
}**/
