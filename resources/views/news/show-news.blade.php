<x-layout>
    

    <div class="relative container mx-auto px-4 py-8">
        <!-- Pulsante Torna alla home posizionato nel flusso normale del documento -->
        <a href="{{ route('welcome') }}" class="inline-block bg-red-700 text-white font-medium rounded-lg text-m px-5 py-2.5 hover:bg-red-500 focus:outline-none focus:ring-4 focus:ring-red-400 mb-8">
            Torna alla home
        </a>
    
        <!-- Titolo centrato sopra il contenuto -->
        <h1 class="text-4xl font-bold mb-5 text-center">{{ $news->title }}</h1>
    
        <div class="flex flex-col items-center space-y-4">
            <!-- Immagine centrata e grande -->
            <img src="{{ asset('storage/' . $news->img) }}" alt="{{ $news->title }}" class="w-full md:w-2/3 h-auto object-cover">
    
            <!-- Testo sotto l'immagine -->
            <div class="prose lg:prose-xl text-xl px-10 pt-10">
                {!! $news->body !!}
            </div>
        </div>
    </div>
    
    
  
</x-layout>