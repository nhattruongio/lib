<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Hire;

class OrderController extends Controller
{
    public function getOrder(Request $request)
    {
        if (isset($request)) {
            $check = Hire::where('order_code', '=', $request['order_code']);

            if ($check->count() == 0) {
                return response()->json(['msg' => false], 422);
            } else {
                $data = \DB::table('hires')
                    ->where('hires.order_code', '=', $request['order_code'])
                    ->leftJoin('books', 'books.id', '=', 'hires.book_id')
                    ->leftJoin('authors', 'authors.id', '=', 'books.author_id')
                    ->leftJoin('users', 'users.id', '=', 'hires.user_id')
                    ->select('books.*', 'authors.name AS author_name', 'users.name AS user_name', 'users.email AS user_email', 'hires.order_code', 'hires.date_hire', 'hires.date_return')
                    ->first();
                return response()->json($data);
            }
        }
    }
}
