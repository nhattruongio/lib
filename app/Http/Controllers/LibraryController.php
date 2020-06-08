<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JWTAuth;
use App\Book;
use App\Library;

class LibraryController extends Controller
{
    public function loading(Request $request)
    {
        if (isset($request)) {
            $check = Book::where('id', '=', $request['book_id'])->first();
            if ($check) {
                $check_love = Library::where([
                    ['user_id', '=', JWTAuth::toUser()->id],
                    ['book_id', '=', $request['book_id']]
                ])->first();

                if ($check_love) {
                    return response()->json(['msg' => 'true']);
                } else {
                    return response()->json(['msg' => 'false']);
                }
            } else {
                return response()->json(['msg' => 'Sách không tồn tại'], 401);
            }
        }
    }

    public function store(Request $request)
    {
        if (isset($request)) {
            $check = Book::where('id', '=', $request['book_id'])->first();
            if ($check) {
                $check_love = Library::where([
                    ['user_id', '=', JWTAuth::toUser()->id],
                    ['book_id', '=', $request['book_id']]
                ])->first();

                if ($check_love) {
                    $check_love->delete();

                    return response()->json(['msg' => 'Loại bỏ sách thành công']);
                } else {
                    Library::create([
                        'book_id' => $request['book_id'],
                        'user_id' => JWTAuth::toUser()->id,
                    ]);

                    return response()->json(['msg' => 'Thêm thành công']);
                }
            } else {
                return response()->json(['msg' => 'Sách không tồn tại'], 401);
            }
        }
    }

    public function getFavoriteBook(Request $request)
    {
        if (isset($request)) {
            $data = \DB::table('libraries')
                ->leftJoin('books', 'libraries.book_id', '=', 'books.id')
                ->leftJoin('authors', 'books.author_id', '=', 'authors.id')
                ->where('libraries.user_id', '=', JWTAuth::toUser()->id)
                ->select('libraries.id', 'libraries.book_id', 'books.name_book', 'books.image_book', 'books.description_book', 'books.publish_date', 'books.price_book', 'books.hire', 'authors.id AS author_id', 'authors.name AS author_name', 'authors.avatar AS author_avatar')
                ->get();
            return response()->json($data);
        }
    }
}
