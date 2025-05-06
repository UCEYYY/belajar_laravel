<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post; // Perbaikan di sini

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all(); // Perbaikan huruf kapital
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function edit($id)
    {
        $post = Post::find($id); // Perbaikan huruf kapital
        return view('posts.edit', compact('post'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $post = new Post(); // Perbaikan huruf kapital
        $post->title = $request->input('title');
        $post->content = $request->input('content');

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
            $post->gambar = $filename;
        }

        $post->save(); // Hapus Post::create($request->all());

        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $post = Post::find($id); // Perbaikan huruf kapital
        $post->title = $request->input('title');
        $post->content = $request->input('content');

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
            $post->gambar = $filename;
        }

        $post->update($request->all()); // Hapus $post->save();

        return redirect()->route('posts.index')->with('success', 'Post updated successfully.');
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function destroy($id)
    {
        $post = Post::find($id); // Tambahkan pencarian post
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }
}