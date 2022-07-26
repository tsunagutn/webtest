<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use SebastianBergmann\Environment\Console;

class uploadController extends Controller
{
    //画像アップロード
    public function upload(Request $request)
    {
		//完了画面へ遷移
		return view('fin');
    }

    //エラー画面
    public function error(Request $request)
    {
		//完了画面へ遷移
		return view('error');
    }
}