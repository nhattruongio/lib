<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Validator, DB, Hash, Mail, JWTAuth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        if (isset($request)) {
            $rules = [
                'email' => 'required|exists:users|email|max:255',
                'password' => 'required|min:8',
            ];
            $messages = [
                'email.required' => 'Email không được để trống',
                'email.exists' => 'Email không tồn tại',
                'email.email' => 'Email không đúng định dạng',
                'email.max' => 'Email không được dài hơn 255 ký tự',
                'password.required' => 'Mật khẩu không được để trống',
                'password.min' => 'Mật khẩu không đuợc nhỏ hơn 8 ký tự',
            ];

            $validator = Validator::make($request->all(), $rules, $messages);
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            } else {
                $credentials = $request->only('email', 'password');

                if (!$token = JWTAuth::attempt($credentials))
                    return response()->json([
                        'auth' => 'Email hoặc mật khẩu không đúng'
                    ], 401);

                return response()->json([
                    'access_token' => $token,
                    'token_type' => 'Bearer'
                ]);
            }
        }
    }
}
