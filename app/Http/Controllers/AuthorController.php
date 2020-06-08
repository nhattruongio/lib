<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Author;

class AuthorController extends Controller
{

    //Lấy ra danh sách 10 tác giả
    public function getListTenAuthor()
    {
        $data = Author::orderBy('id', 'DESC')->take(10)->get();
        return response()->json($data);
    }
    //lấy danh sách tác dả
    public function getListAuthor()
    {
        $data = Author::orderBy('id', 'DESC')->get();
        return response()->json($data);
    }
    //Lấy sách của 1 tác giả
    public function getOnceAuthor(Request $request)
    {
        if (isset($request)) {
            $data = Author::where('id', '=', $request['author_id'])->first();
            return response()->json($data);
        }
    }
}
