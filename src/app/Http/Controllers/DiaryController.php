<?php

namespace App\Http\Controllers;

use App\Models\Diary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiaryController extends Controller
{
    private $diary;

    public function __construct()
    {
        $this->diary = new Diary();
    }

    public function index()
    {
        if (!Auth::check()) {
            return response()->json('ログインしてください', 401);
        }

        $userId = Auth::id();
        $diaries = $this->diary->getAllDiaries($userId);

        return response()->json($diaries, 200);
    }
}
