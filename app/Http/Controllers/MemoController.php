<?php

namespace App\Http\Controllers;

use App\Http\Requests\MemoStoreRequest;
use App\Models\Memo;
use Illuminate\Http\Request;

class MemoController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Memo::class, 'memo');
    }

    public function index(Request $request)
    {
        $query = Memo::query();

        if ($request->filled('q')) {
            $query->where('body', 'like', '%' . $request->q . '%');
        }

        $memos = $query->latest()->paginate(10)->withQueryString();

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

    public function edit(Memo $memo)
    {
        return view('memos.edit', compact('memo'));
    }

    public function update(MemoStoreRequest $request, Memo $memo)
    {
        $memo->update([
            'body' => $request->validated()['body'],
        ]);

        return redirect()->route('memos.index');
    }

    public function destroy(Memo $memo)
    {
        $memo->delete();
        return redirect()->route('memos.index');
    }
}
