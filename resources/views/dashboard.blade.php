{{-- resources/views/dashboard.blade.php --}}
<x-app-layout>
    <div class="mb-4">
        <form action="{{ route('music.index') }}" method="GET">
            <div class="flex items-center">
                <label for="search" class="mr-2">Search:</label>
                <input type="text" name="search" id="search" class="border rounded-md p-2">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md ml-2">Search</button>
            </div>
        </form>
    </div>
    <div class="all flex flex-wrap -mx-4">
        @foreach ($musics as $music)
            <div class="child w-full sm:w-1/2 md:w-1/3 lg:w-1/4 px-4 mb-8">
                <div class="p-4 border rounded-lg overflow-hidden">
                    <div class="aspect-w-16 aspect-h-9 mb-4">
                        <img src="{{ asset('storage/' . $music->image) }}" alt="{{ $music->title }}" class="w-full h-full object-cover">
                    </div>
                    <h3 class="text-xl font-semibold mb-2">{{ $music->title }}</h3>
                    <p class="text-gray-600 mb-4">{{ $music->artist }}</p>
                    <audio controls class="mb-4 w-full">
                        <source src="{{ asset('storage/' . $music->audio) }}" type="audio/mp3">
                        Your browser does not support the audio element.
                    </audio>
                    <div class="flex justify-between">
                        <!-- Add additional buttons or information here -->
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>
