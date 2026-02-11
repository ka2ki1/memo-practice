<?php

namespace App\Http\Controllers;

use App\Models\Memo;
use App\Http\Requests\MemoStoreRequest;
use Illuminate\Http\Request;

class MemoController extends Controller
{
    public function index()
    {
        $memos = Memo::latest()->paginate(10);
        return view('memos.index', compact('memos'));
    }

    public function store(MemoStoreRequest $request)
    {
        Memo::create([
            'user_id' => $request->user()->id,
            'body' => $request->validated()['body'],
        ]);

        return redirect()->route('memos.index');
    }
}
