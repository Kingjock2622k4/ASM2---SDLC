<!-- resources/views/music/edit.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            {{ __('Edit Music') }}
        </h2>
    </x-slot>

    <div class="container mx-auto mt-6 p-6">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('music.update', $music->id) }}" method="post" enctype="multipart/form-data" class="max-w-md mx-auto bg-white rounded-lg overflow-hidden shadow-md">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title:</label>
                <input type="text" name="title" value="{{ $music->title }}" required class="appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="mb-4">
                <label for="artist" class="block text-gray-700 text-sm font-bold mb-2">Artist:</label>
                <input type="text" name="artist" value="{{ $music->artist }}" required class="appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="mb-4">
                <label for="genre" class="block text-gray-700 text-sm font-bold mb-2">Genre:</label>
                <input type="text" name="genre" value="{{ $music->genre }}" required class="appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="mb-4">
                <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Image:</label>
                <input type="file" name="image" class="appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="mb-4">
                <label for="audio" class="block text-gray-700 text-sm font-bold mb-2">Audio:</label>
                <input type="file" name="audio" class="appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Update Music</button>
        </form>
    </div>
</x-app-layout>
