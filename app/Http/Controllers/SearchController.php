<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class SearchController extends Controller
{
    public function store(Request $request)
    {
        if (isset($request)) {
            if (empty($request['key'])) {
                return response()->json([]);
            } else {
                $key = $request['key'];
                $data = Book::where('name_book', 'LIKE', '%' . $key . '%')->with('author')->get();
                return response()->json($data);
            }
        }
    }
}
