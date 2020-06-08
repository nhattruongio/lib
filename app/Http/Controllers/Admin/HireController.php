<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Book;
use App\Hire;
use JWTAuth;
use Carbon;


class HireController extends Controller
{
    //Xác nhận thuê sách
    public function submitHire(Request $request)
    {
        if (isset($request)) {
            if (JWTAuth::toUser()->rule == 1) {
                return response()->json(['msg' => 'cscascsa']);
            }
        }
    }
}
