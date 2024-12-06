<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::orderBy('created_at', 'desc')->paginate(20);
        return view('admins.news.index', compact('news'));
    }


    public function create()
    {
        return view('admins.news.create');
    }
    public function store(Request $request)
    {
        $validatedNewsData = $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'title' => 'required',
            'content' => 'required',
        ]);
        if ($request->file('image')) {
            $validatedNewsData['image'] = $request->file('image')->store('news-images');
        }
        News::create($validatedNewsData);
        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil ditambahkan');
    }
    public function edit(News $news)
    {
        return view('admins.news.edit', compact('news'));
    }

    public function update(Request $request, News $news)
    {
        $validatedNewsData = $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'title' => 'required',
            'content' => 'required',
        ]);
        if ($request->file('image')) {
            if ($news->image) {
                Storage::delete($news->image);
            }
            $validatedNewsData['image'] = $request->file('image')->store('news-images');
        }
        News::where('uuid', $news->uuid)->update($validatedNewsData);
        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil diperbarui');
    }

    public function delete(News $news)
    {
        if ($news->image) {
            Storage::delete($news->image);
        }
        News::where('uuid', $news->uuid)->delete();
        return redirect()->back()->with('success', 'Berita berhasil dihapus');
    }
}
