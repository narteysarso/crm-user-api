<?php

namespace App\Http\Controllers;

use App\User;
use Tymon\JWTAuth\JWTAuth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    protected $jwt;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(JWTAuth $jwt)
    {
        //
        $this->jwt = $jwt;
    }

    public function profile()
    {
        $user = $this->jwt->user();
        if (!$user)
            return response()->json('user not found', 404);

        $user->profileurl = env('RESCSERV') . "get/profile?image=" . $user->profileurl;
        return response()->json(compact('user'), 200);
    }

    public function edit(Request $request)
    {
        // return response()->json($request);
        $user = $this->jwt->user();

        if (!$user)
            return response()->json('user not found', 404);

        // return response()->json(compact('user'), 200);

        $validator = [];
        $validator['firstname'] = 'string|required';
        $validator['lastname'] = 'string|required';

        if (isset($request->email) && $request->email !== $user->email)
            $validator['email'] = 'email|required|unique:users';
        else
            $validator['email'] = 'email|required';


        if (isset($request->mobile) && $request->mobile !== $user->mobile)
            $validator['mobile'] = 'unique:users';


        $this->validate($request, $validator);

        $imageStr = $request->capturedImageData;
        $path = null;

        if (!is_null($imageStr) && !empty($imageStr) && is_string($imageStr)) {
            //
            $path = time() . ".png";
            //send curl post request 
            //send base64 image
            $cUrl = curl_init();
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

        
            //end curl post request

        }

        if (!is_null($path)) {
            $user->profileurl = $path;
        }

        $result = $user->update($request->except('capturedImageData'));

        if (!$result) {
            return response()->json('failed to edit user', 500);
        }

        return response()->json(compact('user'), 200);
    }

    public function delete(Request $request)
    {
        $user = $this->jwt->user();

        $result = $user->delete();
        if (!$result)
            return response()->json(null);
    }

    public function updatepassword(Request $request)
    {
        $user = $this->jwt->user();
        if (!$user)
            return response()->json('user not found', 404);

        $this->validate($request, [
            'oldpassword' => 'required',
            'confpassword' => 'required',
            'newpassword' => 'required',
        ]);

        $valid = $this->jwt->attempt(array('email' => $user->email, 'password' => $request->oldpassword));

        if (!$valid)
            return response()->json('invalid old password', 401);

        $user->password = Hash::make($request->newpassword);

        $result = $user->save();

        if (!$result)
            return response()->json('unable to change user password', 404);

        return response()->json(compact('user'), 200);
    }

}
