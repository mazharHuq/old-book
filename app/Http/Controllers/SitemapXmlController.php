<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class SitemapXmlController extends Controller
{
    public function index() {
        $posts = Category::all();
        return response()->view('index', [
            'posts' => $posts
        ])->header('Content-Type', 'text/xml');
    }
}
