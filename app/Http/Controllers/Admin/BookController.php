<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use JWTAuth;
use App\Book;

class BookController extends Controller
{
    //tạo sách mới
    public function store(Request $request)
    {
        if (isset($request)) {
            try {
                $create = Book::create([
                    'user_id' => JWTAuth::toUser()->id,
                    'name_book' => $request['name_book'],
                    'author_id' => $request['author_book'],
                    'image_book' => $request['image_book'],
                    'description_book' => $request['description_book'],
                    'publish_date' => $request['publish_date'],
                    'price_book' => $request['price_book'],
                    'hire' => 0
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
