<?php

namespace App\Http\Controllers\auth;

use App\User;
use App\Jobs\ProcessPasswordResetMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\JWTAuth;
use App\Mail\Mailer as PassMail;
use Illuminate\Support\Facades\Mail;


class ResetPassword extends Controller
{
    protected $jwt;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(JWTAUTH $jwt)
    {
        //
        $this->jwt = $jwt;
    }

    public function reset(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|exists:users,email',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user)
            return response()->json('user not found', 404);

        $original_string = array_merge(range(0, 9), range('a', 'z'), range('A', 'Z'));
        $original_string = implode("", $original_string);
        $pass = substr(str_shuffle($original_string), 0, 10);
        $user->password = app('hash')->make($pass);
        $result = $user->save();

        if (!$result)
            return response()->json('unable to reset password', 500);

        // try {
        // $this->dispatch(new ProcessPasswordResetMail($user->email, $pass));
        \Queue::push(new ProcessPasswordResetMail($user->email, $pass));

        // } catch (\Throwable $th) {
        //         //throw $th;
        // }

        return response()->json("password reset. Please check your email for your new password.{$pass}", 200);
    }

}
