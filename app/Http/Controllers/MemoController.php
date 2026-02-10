<?php

namespace App\Http\Controllers;

use App\Models\Memo;
use Illuminate\Http\Request;

class MemoController extends Controller
{
    public function index()
    {
        $memos = Memo::latest()->paginate(10);
        return view('memos.index', compact('memos'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'body' => ['required', 'string', 'max:255'],
        ]);

        Memo::create([
            'user_id' => auth()->id(),
            'body' => $validated['body'],
        ]);

        return redirect()->route('memos.index');
    }
}
