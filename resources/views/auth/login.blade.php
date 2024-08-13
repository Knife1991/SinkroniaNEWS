<x-layout>
    
    
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img class="mx-auto h-15 w-auto" src="{{Storage::url('public/img/images.jpeg')}}" alt="Your Company">
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Registrati</h2>
        </div>
        
        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-6" 
            action="{{route('login')}}" 
            method="POST">
            @csrf
                <div>
                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                    <div class="mt-2">
                        <input id="email" name="email" type="email" autocomplete="email" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                
                <div>
                    <div class="flex items-center justify-between">
                        <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                        <div class="text-sm">
                            <a href="#" class="font-semibold text-red-700 hover:text-red-400">Password dimenticata?</a>
                        </div>
                    </div>
                    <div class="mt-2">
                        <input id="password" name="password" type="password" autocomplete="current-password" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                
                <div>
                    <button type="submit" class="bottone_accedi flex w-full justify-center rounded-md bg-black px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm">Accedi</button>
                </div>
            </form>
            
            <p class="mt-10 text-center text-sm text-gray-500">
                Non sei registrato?
                <a href="{{route('register')}}" class="font-semibold leading-6 text-red-700 hover:text-red-400">Registrati</a>
            </p>
        </div>
    </div>
    
    
    
</x-layout>