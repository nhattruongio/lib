<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use JWTAuth;

class UserController extends Controller
{
    public function refresh($token = null)
    {
        $token = $token ? $token : JWTAuth::getToken();
        if (!$token) {
            throw new BadRequestHtttpException('Token not provided');
        }
        try {
            $token = JWTAuth::refresh($token);
        } catch (TokenInvalidException $e) {
            throw new AccessDeniedHttpException('The token is invalid');
        }
        return response()->json(['refresh_token' => $token], 200);
    }

    public function getUser()
    {
        $user = JWTAuth::toUser();
        return response()->json($user);
    }

    public function changePassword(Request $request)
    {
        if (isset($request)) {
            $rules = [
                'old_password' => 'required',
                'new_password' => 'required|min:8',
            ];
            $messages = [
                'old_password.required' => 'Mật khẩu cũ không được để trống',
                'new_password.required' => 'Mật khẩu mới không được để trống',
                'new_password.min' => 'Mật khẩu mới không đuợc nhỏ hơn 8 ký tự',
            ];

            $validator = Validator::make($request->all(), $rules, $messages);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 401);
            } else {
                if (\Hash::check($request['old_password'], JWTAuth::user()->password)) {

                    $new_password = \str_replace(' ', '', $request['new_password']);
                    $new_password = \Hash::make($new_password);

                    $update = JWTAuth::user()->update([
                        'password' => $new_password,
                    ]);

                    if ($update) {
                        return response()->json([
                            'msg' => 'Cập nhật thành công',
                        ]);
                    } else {
                        return response()->json([
                            'msg' => 'Có lỗi, vui lòng thử lại'
                        ], 401);
                    }
                } else {
                    return response()->json([
                        'old_password' => 'Mật khẩu cũ không chính xác'
                    ], 401);

                }
            }
        }
    }

    public function updateCustomer(Request $request)
    {
        if (isset($request)) {
            try {
                $id = JWTAuth::toUser()->id;
                User::where('id', '=', $id)->update(['name' => $request['name']]);
                return response()->json([
                    'msg' => 'Cập nhật thành công'
                ], 200);
            } catch (\Exception $e) {
                return response()->json([
                    'msg' => $e->getMessage()
                ], 401);
            }
        } else {
            return response()->json([
                'msg' => 'Có lỗi, vui lòng thử lại'
            ], 422);
        }
    }
}
