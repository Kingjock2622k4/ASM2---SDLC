<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Music;


class MusicController extends Controller
{

public function index(Request $request)
{

    $search = $request->input('search');
    
    // Use where clause to filter by search query
    $musics = Music::when($search, function ($query) use ($search) {
        $query->where('title', 'like', '%' . $search . '%')
              ->orWhere('artist', 'like', '%' . $search . '%')
              ->orWhere('genre', 'like', '%' . $search . '%');
    })->get();

    return view('dashboard', ['musics' => $musics, 'search' => $search]);
}


    // Hiển thị form thêm nhạc
    public function create()
    {
        return view('music.create');
    }

    // Xử lý thêm nhạc mới
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'artist' => 'required',
            'genre' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'audio' => 'required|mimes:mp4,mp3,wav',
        ]);

        $imagePath = request('image')->store('images', 'public');
        $audioPath = request('audio')->store('audios', 'public');
         
        Music::create([
            'title' => $request->title,
            'artist' => $request->artist,
            'genre' => $request->genre,
            'image' => $imagePath,
            'audio' => $audioPath,
        ]);

        return redirect()->route('music.index')->with('success', 'Nhạc đã được thêm thành công.');
    }


    public function edit($id)
    {
        $music = Music::findOrFail($id);
        return view('music.edit', compact('music'));
    }

    // Xử lý cập nhật thông tin nhạc
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'artist' => 'required',
            'genre' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'audio' => 'mimes:mp4,mp3,wav',
        ]);

        $music = Music::findOrFail($id);

        // Update fields
        $music->title = $request->title;
        $music->artist = $request->artist;
        $music->genre = $request->genre;

        // Update image if provided
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $music->image = $imagePath;
        }

        // Update audio if provided
        if ($request->hasFile('audio')) {
            $audioPath = $request->file('audio')->store('audios', 'public');
            $music->audio = $audioPath;
        }

        $music->save();

        return redirect()->route('music.index')->with('success', 'Thông tin nhạc đã được cập nhật thành công.');
    }

    // Xử lý xóa nhạc
    public function destroy($id)
    {
        $music = Music::findOrFail($id);
        $music->delete();

        return redirect()->route('music.index')->with('success', 'Nhạc đã được xóa thành công.');
    }
}
