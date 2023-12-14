<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create Music
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Your create music form goes here -->
            <form method="POST" action="{{ route('music.store') }}" enctype="multipart/form-data">
                @csrf
                <!-- Title -->
                <div class="mb-4">
                    <label for="title" class="block text-gray-600">Title:</label>
                    <input type="text" id="title" name="title" class="form-input mt-1 block w-full" />
                </div>

                <!-- Artist -->
                <div class="mb-4">
                    <label for="artist" class="block text-gray-600">Artist:</label>
                    <input type="text" id="artist" name="artist" class="form-input mt-1 block w-full" />
                </div>

                <!-- Genre -->
                <div class="mb-4">
                    <label for="genre" class="block text-gray-600">Genre:</label>
                    <input type="text" id="genre" name="genre" class="form-input mt-1 block w-full" />
                </div>

                <!-- Image -->
                <div class="mb-4">
                    <label for="image" class="block text-gray-600">Image:</label>
                    <input type="file" id="image" name="image" class="form-input mt-1 block w-full" />
                </div>

                <!-- Audio -->
                <div class="mb-4">
                    <label for="audio" class="block text-gray-600">Audio:</label>
                    <input type="file" id="audio" name="audio" accept="audio/*" class="form-input mt-1 block w-full" />
                </div>

                <div class="mt-4 flex justify-center">
                    <button type="submit" class="bg-teal-500 text-black px-6 py-3 rounded-full hover:bg-teal-700 focus:outline-none focus:shadow-outline-teal active:bg-teal-800">
                        Submit
                    </button>
                </div>        
            </form>
        </div>
    </div>
</x-app-layout>
