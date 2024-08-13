<x-layout>
    <div class="container mx-auto px-4">
        <!-- Sezione del titolo -->
        <div class="flex justify-between items-center my-8">
            <h1 class="text-8xl font-bold">NEWS</h1>
            <a href="{{ route('create.news') }}" class="text-white bg-red-700 hover:bg-red-500 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center">
                + Crea Nuovo Articolo
            </a>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Colonna principale - Notizie principali -->
            <div class="lg:col-span-2 space-y-8">
                @if($news->isNotEmpty())
                    <!-- Articolo principale -->
                    @php
                        $mainArticle = $news->first();
                    @endphp
                    <div class="bg-white shadow-md rounded-lg overflow-hidden">
                        <img class="w-full h-65 object-cover" src="{{ asset('storage/' . $mainArticle->img) }}" alt="{{ $mainArticle->title }}">
                        <div class="p-6">
                            <h2 class="text-2xl font-bold mb-2">{{ $mainArticle->title }}</h2>
                            <p class="text-gray-700">{{ Str::limit($mainArticle->body, 150) }}</p>
                            <a href="{{ route('news.show', $mainArticle->id) }}" class="text-blue-500 hover:underline mt-4 block">Leggi di più</a>
                        </div>
                    </div>
                    
                    <!-- Articoli secondari -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        @foreach($news->skip(1)->take(2) as $secondaryArticle)
                            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                                <img class="w-full h-48 object-cover" src="{{ asset('storage/' . $secondaryArticle->img) }}" alt="{{ $secondaryArticle->title }}">
                                <div class="p-6">
                                    <h3 class="text-xl font-semibold mb-2">{{ $secondaryArticle->title }}</h3>
                                    <p class="text-gray-700">{{ Str::limit($secondaryArticle->body, 100) }}</p>
                                    <a href="{{ route('news.show', $secondaryArticle->id) }}" class="text-blue-500 hover:underline mt-4 block">Leggi di più</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p>Nessun articolo disponibile.</p>
                @endif
            </div>
    
            <!-- Sidebar - Ultime Notizie o Più Letti -->
            <div class="space-y-8">
                <!-- Ultime Notizie -->
                <div class="bg-white shadow-md rounded-lg overflow-hidden p-6">
                    <h2 class="text-xl font-bold mb-4">Ultime Notizie</h2>
                    <ul class="space-y-4">
                        @foreach($news->take(3) as $latestArticle)
                            <li>
                                <a href="{{ route('news.show', $latestArticle->id) }}" class="text-lg text-gray-800 hover:underline">
                                    {{ Str::limit($latestArticle->title, 50) }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
    
                <!-- Sezione Più Letti -->
                <div class="bg-white shadow-md rounded-lg overflow-hidden p-6">
                    <h2 class="text-xl font-bold mb-4">Più Letti</h2>
                    <ul class="space-y-4">
                        @foreach($news->sortByDesc('views')->take(3) as $mostReadArticle)
                            <li>
                                <a href="{{ route('news.show', $mostReadArticle->id) }}" class="text-lg text-gray-800 hover:underline">
                                    {{ Str::limit($mostReadArticle->title, 50) }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-layout>
