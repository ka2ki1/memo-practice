<x-app-layout>
    <div class="max-w-2xl mx-auto py-8 space-y-6">

        <form method="POST" action="{{ route('memos.store') }}" class="space-y-2">
            @csrf
            <textarea name="body" class="w-full border rounded p-2" rows="3">{{ old('body') }}</textarea>
            @error('body')
                <p class="text-red-600 text-sm">{{ $message }}</p>
            @enderror
            <button class="px-4 py-2 border rounded" type="submit">投稿</button>

            <form method="GET" action="{{ route('memos.index') }}" class="mb-4">
                <input type="text" name="q" value="{{ request('q') }}" placeholder="メモを検索"
                    class="w-full border rounded px-3 py-2">
            </form>

        </form>

        <div class="space-y-2">
            @foreach ($memos as $memo)
                <div class="border rounded p-4 flex items-center justify-between gap-4">
                    {{-- 左：日付＋本文 --}}
                    <div class="min-w-0 flex-1">
                        <div class="text-xs text-gray-500">
                            {{ $memo->created_at->format('Y-m-d H:i') }}
                        </div>
                        <div class="mt-1 break-words">
                            {{ $memo->body }}
                        </div>
                    </div>

                    {{-- 右：アクション --}}
                    <div class="flex items-center gap-2 shrink-0">
                        {{-- ① いいねボタン --}}
                        <form method="POST" action="{{ route('memos.like', $memo) }}">
                            @csrf
                            <button type="submit" class="w-10 h-10 border rounded flex items-center justify-center">
                                @if ($memo->likedUsers->contains(auth()->id()))
                                    ❤️
                                @else
                                    🤍
                                @endif
                            </button>
                        </form>

                        {{-- ② いいね数 --}}
                        <span class="text-xs text-gray-500">
                            {{ $memo->likedUsers->count() }}
                        </span>

                        {{-- ③ 編集・削除（作成者のみ） --}}
                        @can('update', $memo)
                            <a href="{{ route('memos.edit', $memo) }}" class="px-3 py-2 border rounded">
                                編集
                            </a>

                            <form method="POST" action="{{ route('memos.destroy', $memo) }}"
                                onsubmit="return confirm('削除しますか？');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-3 py-2 border rounded">
                                    削除
                                </button>
                            </form>
                        @endcan
                    </div>
                </div>
            @endforeach
        </div>


        {{ $memos->links() }}
    </div>
</x-app-layout>
