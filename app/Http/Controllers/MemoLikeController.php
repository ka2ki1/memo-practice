<?php

namespace App\Http\Controllers;

use App\Models\Memo;

class MemoLikeController extends Controller
{
    public function store(Memo $memo)
    {
        $user = request()->user();

        // すでにいいねしてたら解除、してなければ追加
        $user->likedMemos()->toggle($memo->id);

        return back();
    }
}
