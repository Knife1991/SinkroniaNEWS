<x-layout>
  <div class="min-h-screen flex items-center justify-center mt-5">
    <form action="{{ route('store.news') }}" method="POST" enctype="multipart/form-data" class="w-full max-w-2xl bg-white p-8 rounded-lg shadow-md">
      @csrf
      <div class="space-y-12">
        <div class="border-b border-gray-900/10 pb-12">
          <h2 class="text-xl text-base font-semibold leading-7 text-gray-900 text-center">Nuovo Articolo</h2>
          <p class="mt-1 text-sm leading-6 text-gray-600 text-center">Compila i campi per creare un nuovo articolo.</p>
          
          <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <!-- Titolo -->
            <div class="sm:col-span-4">
              <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Titolo</label>
              <div class="mt-2">
                <input type="text" name="title" id="title" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Inserisci il titolo dell'articolo">
              </div>
            </div>
            
            <!-- Corpo dell'articolo -->
            <div class="col-span-full">
              <label for="body" class="block text-sm font-medium leading-6 text-gray-900">Corpo dell'articolo</label>
              <div class="mt-2">
                <textarea id="body" name="body" rows="6" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Scrivi qui il contenuto dell'articolo"></textarea>
              </div>
            </div>
            
            <!-- Immagine -->
            <div class="col-span-full">
              <label for="image" class="block text-sm font-medium leading-6 text-gray-900">Immagine</label>
              <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                <div class="text-center">
                  <img id="imagePreview" class="hidden h-48 w-48 object-cover mb-4 mx-auto rounded-lg">
                  <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd" />
                  </svg>
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
                    <option value="" disabled selected>Seleziona una categoria</option>
                    @foreach ($categories as $category)
                      <option value="{{ $category->id }}">{{ $category->name }}</option>
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
      
      reader.onload = function(){
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
