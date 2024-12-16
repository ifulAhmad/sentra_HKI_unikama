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

    public function show(News $news)
    {
        return view('admins.news.show', compact('news'));
    }

    public function create()
    {
        return view('admins.news.create');
    }
    public function store(Request $request)
    {
        $validatedNewsData = $request->validate([
            'image1' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'image2' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'caption1' => 'nullable',
            'caption2' => 'nullable',
            'title' => 'required',
            'content' => 'required',
        ]);
        if ($request->file('image1') || $request->file('image2')) {
            $validatedNewsData['image1'] = $request->file('image1')->store('news-images');
            $validatedNewsData['image2'] = $request->file('image2')->store('news-images');
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
            'image1' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'image2' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'caption1' => 'nullable',
            'caption2' => 'nullable',
            'title' => 'required',
            'content' => 'required',
        ]);
        if ($request->file('image1') || $request->file('image2')) {
            if ($news->image1) {
                Storage::delete($news->image1);
            }
            if ($news->image2) {
                Storage::delete($news->image2);
            }
            $validatedNewsData['image1'] = $request->file('image1')->store('news-images');
            $validatedNewsData['image2'] = $request->file('image2')->store('news-images');
        }
        News::where('uuid', $news->uuid)->update($validatedNewsData);
        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil diperbarui');
    }

    public function delete(News $news)
    {
        if ($news->image1) {
            Storage::delete($news->image1);
        }
        if ($news->image2) {
            Storage::delete($news->image2);
        }
        News::where('uuid', $news->uuid)->delete();
        return redirect()->back()->with('success', 'Berita berhasil dihapus');
    }
}
