<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Hire;
use App\User;
use JWTAuth;
use Carbon;

class HireController extends Controller
{
    public function listHiring(Request $request)
    {
        if (isset($request)) {
            $data = \DB::table('hires')
                ->leftJoin('books', 'hires.book_id', '=', 'books.id')
                ->leftJoin('authors', 'books.author_id', '=', 'authors.id')
                ->where('hires.user_id', '=', JWTAuth::toUser()->id)
                ->select('hires.id', 'hires.order_code', 'hires.book_id', 'hires.status', 'books.name_book', 'books.image_book', 'books.description_book', 'books.price_book', 'books.hire', 'hires.date_hire', 'hires.date_return', 'authors.id AS author_id', 'authors.name AS author_name', 'authors.avatar AS author_avatar')
                ->get();
            return response()->json($data);
        }
    }

    public function submitHire(Request $request)
    {
        if (isset($request)) {
            $check = Book::where([
                ['hire', '=', 1],
                ['id', '=', $request['book_id']]
            ])->first();

            if ($check) {
                return response()->json([
                    'msg' => 'Đã có người thuê cuốn sách này'
                ], 401);
            } else {
                Hire::create([
                    'order_code' => $this->v4(),
                    'user_id' => JWTAuth::toUser()->id,
                    'book_id' => $request['book_id'],
                    'price' => $request['total_price'],
                    'date_hire' => Carbon\Carbon::now(),
                    'date_return' => $request['date_return'],
                    'status' => 1
                ]);

                // User::update([
                //     'code' => $this->v4(),
                // ]);
                $qr_code = $this->v4();

                // $update = JWTAuth::user()->update([
                //     'code' => $qr_code,
                // ]);
                // $update->save();


                // User::where('id', '=', JWTAuth::toUser()->id) -> update(['code' => $qr_code]);


                Book::where('id', '=', $request['book_id'])->update(['hire' => 1]);

                return response()->json([
                    'msg' => 'Thuê thành công'
                ]);
            }
        }
    }

    public function checkStatus(Request $request)
    {
        if (isset($request)) {
            $check = Hire::whereDate('date_return', '<', Carbon\Carbon::now()->format('Y-m-d'))->where('user_id', '=', JWTAuth::toUser()->id)->get();
            if ($check->count()) {
                foreach ($check as $item) {
                    Hire::where('id', '=', $item->id)->update(['status' => 0]);
                    Book::where('id', '=', $item->book_id)->update(['hire' => 0]);
                }
                return response()->json(['check' => true]);
            } else {
                return response()->json(['check' => false]);
            }
        }
    }

    public function onceHire(Request $request)
    {
        if (isset($request)) {
            $check = Hire::where([
                ['id', '=', $request['hire_id']],
                ['user_id', '=', JWTAuth::toUser()->id]
            ]);

            if ($check->count()) {
                $data = \DB::table('hires')
                    ->leftJoin('books', 'hires.book_id', '=', 'books.id')
                    ->leftJoin('authors', 'books.author_id', '=', 'authors.id')
                    ->where('hires.user_id', '=', JWTAuth::toUser()->id)
                    ->where('hires.id', '=', $request['hire_id'])
                    ->select('hires.id', 'hires.order_code', 'hires.book_id', 'hires.status', 'books.name_book', 'books.image_book', 'books.description_book', 'books.price_book', 'books.hire', 'hires.date_hire', 'hires.date_return', 'authors.id AS author_id', 'authors.name AS author_name', 'authors.avatar AS author_avatar')
                    ->first();
                return response()->json($data);
            } else {
                return response()->json(['msg' => 'Đơn hàng không tồn tại'], 401);
            }
        }
    }

    public static function v4()
    {
        return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',

            // 32 bits for "time_low"
            mt_rand(0, 0xffff), mt_rand(0, 0xffff),

            // 16 bits for "time_mid"
            mt_rand(0, 0xffff),

            // 16 bits for "time_hi_and_version",
            // four most significant bits holds version number 4
            mt_rand(0, 0x0fff) | 0x4000,

            // 16 bits, 8 bits for "clk_seq_hi_res",
            // 8 bits for "clk_seq_low",
            // two most significant bits holds zero and one for variant DCE1.1
            mt_rand(0, 0x3fff) | 0x8000,

            // 48 bits for "node"
            mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
        );
    }
}
