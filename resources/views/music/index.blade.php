<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Music List
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Add your music listing code here -->
            <div class="mb-4">
                <a href="{{ route('music.create') }}" class="bg-blue-500 text-black px-4 py-2 rounded">Add Music</a>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-max bg-white border border-gray-300">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border-b">Title</th>
                            <th class="py-2 px-4 border-b">Artist</th>
                            <th class="py-2 px-4 border-b">Genre</th>
                            <th class="py-2 px-4 border-b">Image</th>
                            <th class="py-2 px-4 border-b">Audio</th>
                            <th class="py-2 px-4 border-b"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($musics as $music)
                            <tr class="{{ $loop->even ? 'bg-f2f2f2' : '' }}">
                                <td class="py-2 px-4 border-b">{{ $music->title }}</td>
                                <td class="py-2 px-4 border-b">{{ $music->artist }}</td>
                                <td class="py-2 px-4 border-b">{{ $music->genre }}</td>
                                <td class="py-2 px-4 border-b"><img src="{{ asset('storage/'.$music->image) }}" class="w-16 h-16 rounded"></td>
                                <td class="py-2 px-4 border-b">
                                    <audio controls class="w-140">
                                        <source src="{{ asset('storage/'.$music->audio)}}" >
                                        Your browser does not support the audio element.
                                    </audio>
                                </td>
                                <td class="py-2 px-4 border-b">
                                    <a href="{{ route('music.edit', $music->id) }}" class="text-blue-500">Edit</a>
                                    |
                                    <form action="{{ route('music.destroy', $music->id) }}" method="post" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500" onclick="return confirm('Are you sure you want to delete this music entry?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
