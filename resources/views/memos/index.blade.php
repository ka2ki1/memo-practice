<x-app-layout>
    <div class="max-w-2xl mx-auto py-8 space-y-6">

        <form method="POST" action="{{ route('memos.store') }}" class="space-y-2">
            @csrf
            <textarea name="body" class="w-full border rounded p-2" rows="3">{{ old('body') }}</textarea>
            @error('body')
                <p class="text-red-600 text-sm">{{ $message }}</p>
            @enderror
            <button class="px-4 py-2 border rounded" type="submit">投稿</button>
        </form>

        <div class="space-y-2">
            @foreach($memos as $memo)
                <div class="border rounded p-3">
                    <div class="text-sm text-gray-500">{{ $memo->created_at }}</div>
                    <div>{{ $memo->body }}</div>
                </div>
            @endforeach
        </div>

        {{ $memos->links() }}
    </div>
</x-app-layout>
