<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller {
    public function index( Request $request ) {

        if ($request->has('category')) {
            $artikels = Article::with(['media', 'seo', 'category'])
                ->whereHas('category', function ($query) use ($request) {
                    $query->where('slug', $request->category);
                })
                ->latest()
                ->get();
        } else {
            $artikels = Article::with(['seo', 'media', 'category'])
                ->latest()
                ->get();
        }

        return view( 'pages.article', compact( 'artikels' ) );
    }

    public function detail($slug) {
        $artikel = Article::with('seo', 'media', 'category')->where('slug', $slug)->firstOrFail(); 

        return view('pages.article-detail', compact('artikel'));
    }
}