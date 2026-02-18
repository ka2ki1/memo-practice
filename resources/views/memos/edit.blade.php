<x-app-layout>
    <div class="max-w-2xl mx-auto py-8 space-y-4">
        <form method="POST" action="{{ route('memos.update', $memo) }}" class="space-y-2">
            @csrf
            @method('PUT')

            <textarea name="body" class="w-full border rounded p-2" rows="3">{{ old('body', $memo->body) }}</textarea>

            @error('body')
                <p class="text-red-600 text-sm">{{ $message }}</p>
            @enderror

            <div class="flex gap-3 mt-4">
                {{-- 更新 --}}
                <button type="submit"
                    class="px-4 py-2 rounded bg-gray-200 text-blue-600 text-sm font-medium
                hover:bg-gray-300 transition">
                    更新
                </button>

                {{-- 戻る --}}
                <a href="{{ route('memos.index') }}"
                    class="px-4 py-2 rounded bg-gray-200 text-gray-800 text-sm font-medium
                hover:bg-gray-300 transition">
                    戻る
                </a>
            </div>
        </form>
    </div>
</x-app-layout>
