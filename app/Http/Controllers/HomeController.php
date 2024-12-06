<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $news = News::orderBy('created_at', 'desc')->limit(6)->get();
        return view('guest.index', compact('news'));
    }
}
