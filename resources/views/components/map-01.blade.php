<div class="col-span-12 rounded-sm border border-stroke bg-white px-7.5 py-6 shadow-default dark:border-strokedark dark:bg-boxdark w-full mb-3">
  <h4 class="mb-4 text-center text-xl font-bold text-black dark:text-white my-3 pb-3">
    Tutte le News
  </h4>

  <!-- Lista delle News -->
  <div class="space-y-4">
    @foreach ($news as $news)
      <div class="flex justify-between items-center p-4 border border-gray-200 rounded-lg shadow-sm dark:border-strokedark dark:bg-boxdark">
        <div class="flex-1">
          <h5 class="text-lg font-semibold text-black dark:text-white">{{ $news->title }}</h5>
          <p class="text-sm text-gray-600 dark:text-gray-300">{{ Str::limit($news->content, 100) }}</p>
        </div>
        <div class="flex gap-2">
          <a href="{{ route('news.show', $news->id) }}" class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-600">Visualizza</a>
          <a href="{{route('news.edit', $news->id)}}" class="px-4 py-2 text-white bg-green-500 rounded hover:bg-green-600">Modifica</a>
          <form action="" method="POST" onsubmit="return confirm('Sei sicuro di voler eliminare questa notizia?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="px-4 py-2 text-white bg-red-500 rounded hover:bg-red-600">Elimina</button>
          </form>
        </div>
      </div>
    @endforeach
  </div>
</div>
