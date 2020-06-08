<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Book;
use App\Author;
use App\Hire;
use App\User;
use App\Library;

class StatisticController extends Controller
{

    //thống kê sách
    public function getStatistic(Request $request)
    {
        if (isset($request)) {
            $book = Book::count();
            $author = Author::count();
            $hire = Book::where('hire', '=', 1)->count();
            $order = Hire::count();
            $user = User::count();
            $profit = Hire::sum('price');
            $libraries = Library::count();

            return response()->json(['book' => $book, 'author' => $author, 'hiring' => $hire, 'order' => $order, 'user' => $user, 'profit' => $profit, 'library' => $libraries]);
        }
    }
}
