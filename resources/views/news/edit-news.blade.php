<x-layout>
  <div class="min-h-screen flex items-center justify-center mt-5">
    <form action="{{ route('news.update', $newsItem->id) }}" method="POST" enctype="multipart/form-data" class="w-full max-w-2xl bg-white p-8 rounded-lg shadow-md">
      @csrf
      @method('PUT')
      <div class="space-y-12">
        <div class="border-b border-gray-900/10 pb-12">
          <h2 class="text-xl text-base font-semibold leading-7 text-gray-900 text-center">Modifica Articolo</h2>

          <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <!-- Titolo -->
            <div class="sm:col-span-4">
              <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Titolo</label>
              <div class="mt-2">
                <input type="text" name="title" id="title" value="{{ old('title', $newsItem->title) }}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Inserisci il titolo dell'articolo">
              </div>
            </div>

            <!-- Corpo dell'articolo -->
            <div class="col-span-full">
              <label for="body" class="block text-sm font-medium leading-6 text-gray-900">Corpo dell'articolo</label>
              <div class="mt-2">
                <textarea id="body" name="body" rows="6" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Scrivi qui il contenuto dell'articolo">{{ old('body', $newsItem->body) }}</textarea>
              </div>
            </div>

            <!-- Immagine -->
            <div class="col-span-full">
              <label for="image" class="block text-sm font-medium leading-6 text-gray-900">Immagine</label>
              <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                <div class="text-center">
                  <!-- Usa l'URL dell'immagine salvata -->
                  <img id="imagePreview" src="{{ $newsItem->img ? asset('storage/' . $newsItem->img) : '' }}" class="h-48 w-48 object-cover mb-4 mx-auto rounded-lg {{ $newsItem->img ? '' : 'hidden' }}">
                  <div class="mt-4 flex text-sm leading-6 text-gray-600">
                    <label for="image" class="relative cursor-pointer rounded-md bg-white font-semibold text-red-700 focus-within:outline-none focus-within:ring-2 focus-within:ring-red-500 focus-within:ring-offset-2 hover:text-red-500">
                      <span>Carica un file</span>
                      <input id="image" name="image" type="file" class="sr-only" accept="image/*" onchange="previewImage(event)">
                    </label>
                    <p class="pl-1">o trascinalo qui</p>
                  </div>
                  <p class="text-xs leading-5 text-gray-600">PNG, JPG, GIF fino a 10MB</p>
                </div>
              </div>
            </div>

            <!-- Categoria -->
            <div class="sm:col-span-4">
              <label for="category" class="block text-sm font-medium leading-6 text-gray-900">Categoria</label>
              <div class="mt-2">
                @if ($categories->isEmpty())
                  <p class="text-sm text-gray-600">Non ci sono categorie al momento.</p>
                @else
                  <select id="category" name="category_id" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                    <option value="" disabled>Seleziona una categoria</option>
                    @foreach ($categories as $category)
                      <option value="{{ $category->id }}" {{ $newsItem->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                  </select>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="mt-6 flex items-center justify-end gap-x-6">
        <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Annulla</button>
        <button type="submit" class="rounded-md bg-green-700 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-500">Salva</button>
      </div>
    </form>
  </div>

  <script>
    function previewImage(event) {
      console.log('onchange event triggered');
      var imagePreview = document.getElementById('imagePreview');
      var file = event.target.files[0];

      if (!file) {
        console.log('Nessun file selezionato');
        return;
      }

      var reader = new FileReader();

      reader.onload = function() {
        imagePreview.src = reader.result;
        imagePreview.classList.remove('hidden');
      }

      reader.onerror = function(error) {
        console.log('Errore nel caricamento dell\'immagine:', error);
      }

      reader.readAsDataURL(file);
    }
  </script>
</x-layout>
