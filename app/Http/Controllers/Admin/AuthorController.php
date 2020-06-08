<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Author;
use JWTAuth;

class AuthorController extends Controller
{
    public function store(Request $request)
    {
        if (isset($request)) {
            try {
                $create = Author::create([
                    'user_id' => JWTAuth::toUser()->id,
                    'name' => $request['name_author'],
                    'avatar' => $request['avatar'],
                    'description' => $request['description_author'],
                ]);

                if ($create) {
                    return response()->json(['msg' => 'Tạo thành công']);
                } else {
                    return response()->json(['msg' => 'Có lỗi, vui lòng thử lại'], 400);
                }
            } catch (\Exception $e) {
                return response()->json(['msg' => $e], 422);
            }
        }
    }
}
