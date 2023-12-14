<!-- resources/views/music/destroy.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            {{ __('Delete Music') }}
        </h2>
    </x-slot>

    <div class="container mx-auto mt-6 p-6">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <p>Are you sure you want to delete the music with the title "{{ $music->title }}"?</p>

        <form action="{{ route('music.destroy', $music->id) }}" method="post">
            @csrf
            @method('DELETE')

            <button type="submit">Yes, delete</button>
        </form>
    </div>
</x-app-layout>
