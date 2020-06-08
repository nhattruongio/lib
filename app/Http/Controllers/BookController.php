<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Hire;
use JWTAuth, Carbon;

class BookController extends Controller
{
    public function getListTenBook(Request $request)
    {
        $data = Book::with('author')->orderBy('id', 'DESC')->take(10)->get();
        return response()->json($data);
    }

    public function getListBook(Request $request)
    {
        $data = Book::where('hire', '=', 0)->with('author')->get();
        return response()->json($data);
    }

    public function store(Request $request)
    {
        if (isset($request)) {
            $rules = [
                'user_id' => 'required',
                'author_id' => 'required',
                'name_book' => 'required',
                'image_book' => 'required',
                'description_book' => 'required',
                'publish_date' => 'required|date_format:d-m-Y',
                'price_book' => 'required',
                'hire' => 'required|boolean'
            ];

            $messages = [
                'user_id.required' => '',
                'author_id.required' => '',
                'name_book.required' => 'Tên sách không được để trống',
                'image_book.required' => 'Ảnh sách không được để trống',
                'description_book.required' => 'Mô tả không được để trống',
                'publish_date.required' => 'Ngày xuất bản chưa được chọn',
                'publish_date.date_format' => 'Định dạng ngày không đúng',
                'price_book.required' => 'Giá sách không được để trống',
                'price_book.numeric' => 'Giá sách phải nhập vào số',
                'hire.required' => 'Giá trị này không được để trống',
                'hire.boolean' => 'Giá trị này phải là 0 hoặc 1',
            ];

            $validator = Validator::make($request->all(), $rules, $messages);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            $credentials = $request->all();
            return response()->json($credentials, 200);
        }
    }

    public function getOnceBook(Request $request)
    {
        $data = Book::where('id', '=', $request['book_id'])->with('author')->first();
        return response()->json($data);
    }

    public function getBookSameAuthor(Request $request)
    {
        $data = Book::where('author_id', '=', $request['author_id'])->with('author')->get();
        return response()->json($data);
    }

    public function getListBookHot()
    {
        $query = \DB::table('hires')
            ->join('books', 'books.id', '=', 'hires.book_id')
            ->where('hires.date_return', '>=', Carbon\Carbon::now())
            ->join('authors', 'authors.id', '=', 'books.author_id')
            ->select('books.*', 'authors.name AS name_author', 'authors.avatar AS avatar_author')
//            ->select('authors.*', 'books.*')
            ->get();

        return response()->json($query);
    }
}
