<x-layout>

    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6">{{ $category->name }} - Tutti gli Articoli</h1>

        @if($news->isEmpty())
            <p class="text-center text-gray-500">Non ci sono news appartenenti a questa categoria.</p>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach($news as $newsItem)
                    <div class="bg-white border border-gray-200 rounded-lg shadow-md overflow-hidden">
                        <img src="{{ Storage::url($newsItem->img) }}" alt="{{ $newsItem->title }}" class="w-full h-40 object-cover">
                        <div class="p-4">
                            <h2 class="text-xl font-semibold mb-2">{{ $newsItem->title }}</h2>
                            <p class="text-gray-700 mb-4">{{ Str::limit($newsItem->body, 100) }}</p>
                            <a href="{{ route('news.show', $newsItem->id) }}" class="text-blue-600 hover:underline">Leggi di più</a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
    
</x-layout>
