<x-app-layout>
    <div class="max-w-2xl mx-auto py-8 space-y-4">
        <form method="POST" action="{{ route('memos.update', $memo) }}" class="space-y-2">
            @csrf
            @method('PUT')

            <textarea name="body" class="w-full border rounded p-2" rows="3">{{ old('body', $memo->body) }}</textarea>

            @error('body')
                <p class="text-red-600 text-sm">{{ $message }}</p>
            @enderror

            <button class="px-4 py-2 border rounded" type="submit">更新</button>

            <a href="{{ route('memos.index') }}" class="underline text-sm">戻る</a>

        </form>
    </div>
</x-app-layout>
