<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsForGuestController extends Controller
{
    public function index()
    {
        $news = News::orderBy('created_at', 'desc')->paginate(20);
        return view('guest.news.index', compact('news'));
    }

    public function detail(News $news)
    {
        $allNews = News::orderBy('created_at', 'desc')->get();
        return view('guest.news.detail_news', compact('news', 'allNews'));
    }
}
