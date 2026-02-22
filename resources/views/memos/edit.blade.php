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
                <x-button type="submit" variant="primary">更新</x-button>
                {{-- 戻る --}}
                <x-link-button :href="route('memos.index')">戻る</x-link-button>
            </div>
        </form>
    </div>
</x-app-layout>
