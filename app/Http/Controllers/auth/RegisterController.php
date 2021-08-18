<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Permission;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\JWTAuth;


class RegisterController extends Controller
{

    /**
     * @var \Tymon\JWTAuth\JWTAuth
     */
    protected $jwt;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(JWTAuth $jwt)
    {
        //
        $this->middleware('auth', ['except' => ['register']]);
        $this->jwt = $jwt;
    }

    //

    public function register(Request $request)
    {

        $this->validate($request, [
            'firstname' => 'string|required',
            'lastname' => 'string|required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);
        
        // dd('reqd id as');

        $path = time() . '.png';
        $imageStr = $request->capturedImageData;
        $credentials = [
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ];


        if (!is_null($imageStr) && !empty($imageStr) && is_string($imageStr)) {
            $credentials['profileurl'] = $path;
            //send curl post request

            $cUrl = curl_init();
            
            //send base64 image
            curl_setopt($cUrl, CURLOPT_URL, "http://192.168.8.100:8006/store/profile");
            curl_setopt($cUrl, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($cUrl, CURLOPT_ENCODING, "");
            curl_setopt($cUrl, CURLOPT_MAXREDIRS, 10);
            curl_setopt($cUrl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($cUrl, CURLOPT_POSTFIELDS, json_encode(["image" => $imageStr, "path" => $path]));
            curl_setopt($cUrl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
            curl_setopt($cUrl, CURLOPT_HTTPHEADER, array(
                "accept: */*",
                "accept-language: en-US, en;q=0.8",
                "content-type: application/json",
            ));

            $response = (curl_exec($cUrl));
            $error = curl_error($cUrl);
            $status_code = curl_getinfo($cUrl, CURLINFO_HTTP_CODE);
            curl_close($cUrl);

            // dd($response);
            if ($status_code !== 200)
                return response()->json('failed to save profile image', 500);
            
            //end curl post request
        }

        $user = User::create($credentials);

        try {
            //
            if (!$user || !$token = $this->jwt->fromUser($user)) {
                //
                response()->json(['errors' => 'user could not be created'], 404);
            }
        } catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

            return response()->json(['token_expired'], 500);

        } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

            return response()->json(['token_invalid'], 500);

        } catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {

            return response()->json(['token_absent' => $e->getMessage()], 500);

        }

        $url = env('COMPNYSERV');
        return response()->json(compact('token'), 200);
    }


}
