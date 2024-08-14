<div class="col-span-12 rounded-sm border border-stroke bg-white px-7.5 py-6 shadow-default dark:border-strokedark dark:bg-boxdark w-full mb-3">
  <h4 class="mb-4 text-center text-xl font-bold text-black dark:text-white my-3 pb-3">
      Gestione Categorie
  </h4>

  <!-- Pulsante per creare una nuova categoria -->
  <div class="mb-4 text-right">
      <a href="#" id="show-create-category-form" class="inline-block px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Nuova Categoria</a>
  </div>

  <!-- Form per creare una nuova categoria -->
  <div id="create-category-form" class="hidden mb-6">
      <form action="{{ route('categories.store') }}" method="POST">
          @csrf
          <div class="space-y-4">
              <div>
                  <label for="name" class="block text-sm font-medium text-gray-700">Nome Categoria</label>
                  <input type="text" name="name" id="name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" placeholder="Nome della categoria" required>
              </div>
              <div class="flex items-center justify-end">
                  <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                      Salva
                  </button>
                  <button type="button" id="hide-create-category-form" class="ml-4 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-gray-500 hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                      Annulla
                  </button>
              </div>
          </div>
      </form>
  </div>

  <!-- Messaggio se non ci sono categorie -->
  @if ($categories->isEmpty())
      <div class="text-center text-gray-500">
          <p>Non ci sono categorie.</p>
      </div>
  @else
      <!-- Tabella delle Categorie -->
      <div class="overflow-x-auto">
          <table class="min-w-full bg-white dark:bg-boxdark">
              <thead class="bg-gray-200 dark:bg-strokedark">
                  <tr>
                      <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Nome Categoria</th>
                      <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Azioni</th>
                  </tr>
              </thead>
              <tbody class="bg-white dark:bg-boxdark divide-y divide-gray-200 dark:divide-strokedark">
                  @foreach ($categories as $category)
                      <tr>
                          <td class="py-4 px-6 text-sm font-medium text-gray-900 dark:text-white">{{ $category->name }}</td>
                          <td class="py-4 px-6 text-sm font-medium text-gray-900 dark:text-white flex gap-2">
                              <!-- Modifica Categoria -->
                              <a href="#" onclick="document.getElementById('edit-category-form-{{ $category->id }}').classList.remove('hidden');" class="px-4 py-2 text-white bg-green-500 rounded hover:bg-green-600">Modifica</a>
                              <!-- Elimina Categoria -->
                              <form action="{{ route('categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Sei sicuro di voler eliminare questa categoria?');">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="px-4 py-2 text-white bg-red-500 rounded hover:bg-red-600">Elimina</button>
                              </form>
                          </td>
                      </tr>

                      <!-- Form per modificare una categoria -->
                      <tr id="edit-category-form-{{ $category->id }}" class="hidden">
                          <td colspan="2">
                              <form action="{{ route('categories.update', $category->id) }}" method="POST">
                                  @csrf
                                  @method('PUT')
                                  <div class="space-y-4 p-4">
                                      <div>
                                          <label for="name" class="block text-sm font-medium text-gray-700">Nome Categoria</label>
                                          <input type="text" name="name" id="name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" value="{{ $category->name }}" required>
                                      </div>
                                      <div class="flex items-center justify-end">
                                          <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                              Aggiorna
                                          </button>
                                          <button type="button" id="hide-edit-category-form-{{ $category->id }}" class="ml-4 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-gray-500 hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                                              Annulla
                                          </button>
                                      </div>
                                  </div>
                              </form>
                          </td>
                      </tr>
                  @endforeach
              </tbody>
          </table>
      </div>
  @endif
</div>

<script>
  document.getElementById('show-create-category-form').addEventListener('click', function(event) {
      event.preventDefault();
      document.getElementById('create-category-form').classList.remove('hidden');
  });

  document.getElementById('hide-create-category-form').addEventListener('click', function() {
      document.getElementById('create-category-form').classList.add('hidden');
  });

  @foreach ($categories as $category)
      document.getElementById('hide-edit-category-form-{{ $category->id }}').addEventListener('click', function() {
          document.getElementById('edit-category-form-{{ $category->id }}').classList.add('hidden');
      });
  @endforeach
</script>
